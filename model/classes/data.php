<?php

class Data
{

    public static function Read($table, $case, $limit = 0, $id = TRUE) // -1 means unlimited
    {
        $data = array();
        switch ($case) {
            case "add":
                require './model/config/sql-data.php';
                $getData = $pdo->prepare("SELECT contacts.contact_id,contacts.lastname, contacts.firstname, companies.name, companies.company_id FROM contacts INNER JOIN companies ON contacts.company_id = companies.company_id");

                $getData->execute();
                $data = $getData->fetchAll(PDO::FETCH_ASSOC);
                $getData = NULL;
                break;
            case "list":

                require './model/config/sql-data.php';
                switch ($table) {
                    case "invoices":
                        $getData = ($limit > 0) ? $pdo->prepare("SELECT invoices.invoice_id, invoices.invoice_number, invoices.date, companies.name, contacts.lastname FROM invoices INNER JOIN companies ON invoices.company_id = companies.company_id INNER JOIN contacts ON invoices.contact_id = contacts.contact_id LIMIT $limit") : $pdo->prepare("SELECT invoices.invoice_id, invoices.invoice_number, invoices.date, companies.name, contacts.lastname FROM invoices INNER JOIN companies ON invoices.company_id = companies.company_id INNER JOIN contacts ON invoices.contact_id = contacts.contact_id ORDER BY invoices.date DESC");
                        break;
                    case "companies":
                        $getData = ($limit > 0) ? $pdo->prepare("SELECT companies.company_id, companies.name, companies.VAT, companies.country, company_type.company_type FROM companies INNER JOIN company_type ON companies.company_type_id = company_type.company_type_id LIMIT $limit") : $pdo->prepare("SELECT companies.company_id, companies.name, companies.VAT, companies.country, company_type.company_type FROM companies INNER JOIN company_type ON companies.company_type_id = company_type.company_type_id ORDER BY companies.name");
                        break;
                    case "contacts":
                        $getData = ($limit > 0) ? $pdo->prepare("SELECT contacts.contact_id, contacts.lastname, contacts.firstname, contacts.email, contacts.phone, companies.name FROM contacts INNER JOIN companies ON contacts.company_id = companies.company_id LIMIT $limit") : $pdo->prepare("SELECT  contacts.contact_id,contacts.lastname, contacts.firstname, contacts.email, contacts.phone, companies.name FROM contacts INNER JOIN companies ON contacts.company_id = companies.company_id ORDER BY contacts.lastname");
                        break;
                }

                $getData->execute();
                $data = $getData->fetchAll(PDO::FETCH_ASSOC);
                $getData = NULL;
                break;

            case "details":

                require './model/config/sql-data.php';

                switch ($table) {
                    case "invoices":
                        $getData =  $pdo->prepare("SELECT invoices.invoice_id, invoices.invoice_number, invoices.date, companies.name, companies.VAT ,company_type.company_type,contacts.lastname, contacts.firstname,contacts.phone, contacts.email FROM invoices INNER JOIN companies ON invoices.company_id = companies.company_id INNER JOIN contacts ON invoices.contact_id = contacts.contact_id INNER JOIN company_type ON companies.company_type_id = company_type.company_type_id where invoice_id =$id");
                        break;
                    case "companies":
                        $getData =  $pdo->prepare("SELECT invoices.invoice_id, invoices.invoice_number, invoices.date,   companies.name,company_type.company_type, companies.VAT,contacts.lastname, companies.country,contacts.firstname, contacts.phone, contacts.email  FROM invoices INNER JOIN companies ON invoices.company_id = companies.company_id INNER JOIN contacts ON invoices.contact_id = contacts.contact_id INNER JOIN company_type ON companies.company_type_id = company_type.company_type_id where companies.company_id =$id");
                        break;
                    case "contacts":
                        $getData =  $pdo->prepare("SELECT invoices.invoice_id, invoices.invoice_number, invoices.date, contacts.firstname, contacts.phone , contacts.email,companies.name ,contacts.lastname FROM invoices INNER JOIN companies ON invoices.company_id = companies.company_id INNER JOIN contacts ON invoices.contact_id = contacts.contact_id where contacts.contact_id = $id");
                        break;
                }

                $getData->execute();
                $data = $getData->fetchAll(PDO::FETCH_ASSOC);
                $getData = NULL;

                if (!$data) {
                    throw new Exception("Details introuvables, retour à la liste");
                }
                break;
        }
        return $data;
    }

    public static function create($table)
    {
        require './model/config/sql-data.php';
        switch ($table) {
            case "invoices":
                $sql = $pdo->prepare("INSERT INTO $table ( `invoice_number`, `date`, `contact_id`, `company_id`) VALUES (?,?,?,?)");
                $sql->bindParam(1, $_POST['invoice_number']);
                $sql->bindParam(2, $_POST['date']);
                $sql->bindParam(3, $_POST['contact']);
                $sql->bindParam(4, $_POST['company']);
                break;
            case "companies":
                $sql = $pdo->prepare("INSERT INTO `companies`( `name`, `VAT`, `country`, `company_type_id`) VALUES (?,?,?,?)");
                $sql->bindParam(1, $_POST['name']);
                $sql->bindParam(2, $_POST['tva']);
                $sql->bindParam(3, $_POST['country']);
                $sql->bindParam(4, $_POST['company_type']);
                break;
            case "contacts":
                $sql = $pdo->prepare("INSERT INTO `contacts`( `firstname`, `lastname`, `email`, `phone`, `company_id`)  VALUES (?,?,?,?,?)");
                $sql->bindParam(1, $_POST['firstname']);
                $sql->bindParam(2, $_POST['lastname']);
                $sql->bindParam(3, $_POST['email']);
                $sql->bindParam(4, $_POST['phone']);
                $sql->bindParam(5, $_POST['company']);
                break;
        }

        $sql->execute();
        $sql = NULL;
    }

    public static function delete($table, $id, $primaryKey)
    {
        require './model/config/sql-data.php';
        $delRow = "DELETE FROM $table WHERE $primaryKey = ?;";
        $prepDelReq = $pdo->prepare($delRow);
        //$prepDelReq->bindValue(1, $table, PDO::PARAM_STR);
        $prepDelReq->bindValue(1, $id, PDO::PARAM_INT);
        $prepDelReq->execute();
        if ($prepDelReq->rowCount() === 0) {
            $prepDelReq = NULL;
            throw new Exception("Id introuvable, retour à la liste");
        }
        $prepDelReq = NULL;
    }


    public static function update($table, $id, $primaryKey)
    {

        require './model/config/sql-data.php';
        switch ($table) {
            case "invoices":
                $sql = $pdo->prepare("UPDATE `invoices` SET `invoice_number`=?,`date`=?,`contact_id`=?,`company_id`=? WHERE $primaryKey = ?");
                $sql->bindParam(1, $_POST['invoice_number']);
                $sql->bindParam(2, $_POST['date']);
                $sql->bindParam(3, $_POST['contact']);
                $sql->bindParam(4, $_POST['company']);
                $sql->bindParam(5, $id);
                break;
            case "companies":
                $sql = $pdo->prepare("UPDATE `companies` SET `name`=?,`VAT`=?,`country`=?,`company_type_id`=? WHERE $primaryKey = ?");
                $sql->bindParam(1, $_POST['name']);
                $sql->bindParam(2, $_POST['tva']);
                $sql->bindParam(3, $_POST['country']);
                $sql->bindParam(4, $_POST['company_type']);
                $sql->bindParam(5, $id);
                break;
            case "contacts":
                $sql = $pdo->prepare("UPDATE `contacts` SET `firstname`=?,`lastname`=?,`email`=?,`phone`=?,`company_id`=? WHERE $primaryKey = ?");
                $sql->bindParam(1, $_POST['firstname']);
                $sql->bindParam(2, $_POST['lastname']);
                $sql->bindParam(3, $_POST['email']);
                $sql->bindParam(4, $_POST['phone']);
                $sql->bindParam(5, $_POST['company']);
                $sql->bindParam(6, $id);
                break;
        }

        $sql->execute();
        $sql = NULL;
    }
}
