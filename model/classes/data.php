<?php

class Data
{

    public static function Read($table, $limit = -1)
    {

        require './model/config/sql-data.php';

        $getData = ($limit > 0) ? $pdo->prepare("SELECT * FROM $table LIMIT $limit") : $pdo->prepare("SELECT * FROM $table");
        $getData->execute();
        $data = $getData->fetchAll(PDO::FETCH_ASSOC);

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
