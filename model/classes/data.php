<?php

class Data
{

    public static function Read($table, $case, $limit = 0, $id = TRUE) // -1 means unlimited
    {
        $data = array();
        switch ($case) {
            case "list":

                require './model/config/sql-data.php';

                $getData = ($limit > 0) ? $pdo->prepare("SELECT * FROM $table LIMIT $limit") : $pdo->prepare("SELECT * FROM $table");
                $getData->execute();
                $data = $getData->fetchAll(PDO::FETCH_ASSOC);
                $getData = NULL;

            break;
            case "details":
                
                require './model/config/sql-data.php';

                switch ($table) {
                    case "invoices":
                        $getData =  $pdo->prepare("SELECT * FROM $table where invoice_id=$id");
                    break;
                    case "companies":
                        $getData =  $pdo->prepare("SELECT * FROM $table where company_id=$id");
                    break;
                    case "contacts":
                        $getData =  $pdo->prepare("SELECT * FROM $table where contact_id=$id");
                    break;
                }
                
                $getData->execute();
                $data = $getData->fetchAll(PDO::FETCH_ASSOC);
                $getData = NULL;

                if (!$data) {
                    throw new Exception ("Details introuvables, retour à la liste");
                }
            break;
                // TO DO get company and his contact for the invoice with INNER JOIN
                // TO DO get contact and invoice for the company details with INNER JOIN
                // TO DO get all the invoice for the contact with INNER JOIN

                //$data2 = $getData->fetch(PDO::FETCH_ASSOC);
        }
        return $data;
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
