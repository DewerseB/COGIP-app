<?php

    class Route {

        public static function getViewPath($path) {
            // $path est une string
            // ex: 'dashboard', 'invoices/list', 'login', 'companies/add'



            $viewPath = $path . '.php';



            return $viewPath;
        }
        
        public static function getDataPath($path) {



            $dataPath = explode('/', str_replace('.php', '', $path));


            return $dataPath;
        }
    }