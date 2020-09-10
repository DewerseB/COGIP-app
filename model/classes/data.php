<?php

    class Data {

        public static function list($table, $limit = NULL) {
            
            require './model/config/sql-auth.php';

            $selectAll = 'SELECT * FROM ? LIMIT ?';
            $prepSelectReq = $pdo->prepare($selectAll);
            $prepSelectReq->bindValue(1, $table, PDO::PARAM_STR);
            $prepSelectReq->bindValue(2, $limit, PDO::PARAM_STR);
            $prepSelectReq->execute();
            //return [];  //renvoi le tableau de données que getData() renverra au controleur pour la vue
        }

        public static function del($table, $id) {



        }

        public static function add($table, $data) {


            
        }

        public static function update($table, $id, $data) {

        }

    }