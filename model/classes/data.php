<?php

class Data
{

    public static function Read($table, $case, $limit = 0, $id = TRUE) // -1 means unlimited
    {
        $data = array();
        switch ($case) {
            
            case "list":

                require './model/config/sql-data.php';
                switch ($table) {
                    case "invoices":
                        $getData = ($limit > 0) ? $pdo->prepare("SELECT invoices.invoice_id, invoices.invoice_number, invoices.date, companies.name, contacts.lastname FROM invoices INNER JOIN companies ON invoices.company_id = companies.company_id INNER JOIN contacts ON invoices.contact_id = contacts.contact_id LIMIT $limit") : $pdo->prepare("SELECT invoices.invoice_id, invoices.invoice_number, invoices.date, companies.name, contacts.lastname FROM invoices INNER JOIN companies ON invoices.company_id = companies.company_id INNER JOIN contacts ON invoices.contact_id = contacts.contact_id");
                        break;
                    case "companies":
                        $getData = ($limit > 0) ? $pdo->prepare("SELECT companies.company_id, companies.name, companies.VAT, companies.country, company_type.company_type FROM companies INNER JOIN company_type ON companies.company_type_id = company_type.company_type_id LIMIT $limit") : $pdo->prepare("SELECT companies.company_id, companies.name, companies.VAT, companies.country, company_type.company_type FROM companies INNER JOIN company_type ON companies.company_type_id = company_type.company_type_id");
                        break;
                    case "contacts":
                        $getData = ($limit > 0) ? $pdo->prepare("SELECT contacts.contact_id, contacts.lastname, contacts.firstname, contacts.email, contacts.phone, companies.name FROM contacts INNER JOIN companies ON contacts.company_id = companies.company_id LIMIT $limit") : $pdo->prepare("SELECT  contacts.contact_id,contacts.lastname, contacts.firstname, contacts.email, contacts.phone, companies.name FROM contacts INNER JOIN companies ON contacts.company_id = companies.company_id");
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
                        $getData =  $pdo->prepare("SELECT invoices.invoice_id, invoices.invoice_number, companies.name, companies.VAT ,company_type.company_type,contacts.lastname, contacts.firstname,contacts.phone, contacts.email FROM invoices INNER JOIN companies ON invoices.company_id = companies.company_id INNER JOIN contacts ON invoices.contact_id = contacts.contact_id INNER JOIN company_type ON companies.company_type_id = company_type.company_type_id where invoice_id =$id");
                        break;
                    case "companies":
                        $getData =  $pdo->prepare("SELECT invoices.invoice_id, invoices.invoice_number, invoices.date,   companies.name,company_type.company_type, companies.VAT,contacts.lastname, contacts.firstname, contacts.phone, contacts.email  FROM invoices INNER JOIN companies ON invoices.company_id = companies.company_id INNER JOIN contacts ON invoices.contact_id = contacts.contact_id INNER JOIN company_type ON companies.company_type_id = company_type.company_type_id where companies.company_id =$id");
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

    public static function create($table, $data)
    {
    }

    public static function delete($table, $id, $primaryKey) {
        require './model/config/sql-data.php';
        $delRow = "DELETE FROM $table WHERE $primaryKey = ?;";
        $prepDelReq = $pdo->prepare($delRow);
        //$prepDelReq->bindValue(1, $table, PDO::PARAM_STR);
        $prepDelReq->bindValue(1, $id, PDO::PARAM_INT);
        $prepDelReq->execute();
        if ($prepDelReq->rowCount() === 0) {
            $prepDelReq = NULL;
            throw new Exception ("Id introuvable, retour à la liste");
        }
        $prepDelReq = NULL;
    }


    public static function update($table, $id, $data)
    {
    }
}
