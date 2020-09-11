<?php

class Data
{

    public static function Read($table, $case, $limit = -1, $id = null) // -1 means unlimited
    {

        switch ($case) {
            case "list":

                require './model/config/sql-data.php';

                $getData = ($limit > 0) ? $pdo->prepare("SELECT * FROM $table LIMIT $limit") : $pdo->prepare("SELECT * FROM $table");
                $getData->execute();
                $data = $getData->fetchAll(PDO::FETCH_ASSOC);

                return $data;

            case "details":

                switch ($table) {

                    case "companies":
                        require './model/config/sql-data.php';

                        $getData =  $pdo->prepare("SELECT * FROM $table where company_id=$id");
                        $getData->execute();
                        $data1 = $getData->fetch(PDO::FETCH_ASSOC);

                        // TO DO get contact and invoice for the company details with INNER JOIN

                        $data2 = $getData->fetch(PDO::FETCH_ASSOC);

                        var_dump($data1);

                        return ['companies/details']; // Return a array with all the data for the invoices details

                    case "invoices":
                        require './model/config/sql-data.php';

                        $getData =  $pdo->prepare("SELECT * FROM $table where invoice_id=$id");
                        $getData->execute();
                        $data1 = $getData->fetch(PDO::FETCH_ASSOC);

                        var_dump($data1);

                        // TO DO get company and his contact for the invoice with INNER JOIN

                        return ['invoices/details']; // Return a array with all the data for the invoices details


                    case "contacts":
                        require './model/config/sql-data.php';

                        $getData =  $pdo->prepare("SELECT * FROM $table where contact_id=$id");
                        $getData->execute();
                        $data1 = $getData->fetch(PDO::FETCH_ASSOC);

                        // TO DO get all the invoice for the contact with INNER JOIN


                        var_dump($data1);
                        return ['contacts/details']; // Return a array with all the data for the contact details
                        
                }
        }
    }

    public static function create($table, $data)
    {
    }

    public static function delete($table, $id)
    {
    }
   

    public static function update($table, $id, $data)
    {
    }
}
