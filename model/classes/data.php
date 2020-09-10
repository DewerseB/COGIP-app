<?php

class Data
{

    public static function Read($table, $limit = NULL)
    {

        require './model/config/sql-data.php';

        $getData = $pdo->prepare("SELECT * FROM $table LIMIT $limit");
        $getData->execute();
        $data = $getData->fetchAll();

        return $data;  //renvoi le tableau de données que getData() renverra au controleur pour la vue
    }

    public static function delete($table, $id)
    {
    }

    public static function create($table, $data)
    {
    }

    public static function update($table, $id, $data)
    {
    }

   
}
