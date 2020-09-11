<?php

require_once './model/classes/auth.php';
require_once './model/classes/route.php';
require_once './model/classes/data.php';

class Model
{
    function __construct($path)
    {
        $this->message = "";
        $this->path = $path;
        $this->handleSession();
        $this->viewPath = Route::getViewPath($this->path);
        $this->dataPath = Route::getDataPath($this->viewPath);
        $this->data = $this->getData($this->dataPath);
    }

    private function handleSession()
    {
        session_start();

        if (Auth::isLogged() && isset($_POST['submit']) && $_POST['submit'] === 'logout') {
            Auth::logout();
            $this->message = "A bientôt";
            $this->path = 'dashboard';
        }

        if (!Auth::isLogged() && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])) {
            if ($_POST['submit'] === 'login') {
                try {
                    Auth::login($_POST['username'], $_POST['password']);
                    $this->message = "Bienvenue " . $_POST['username'];
                    $this->path = 'dashboard';
                } catch (Exception $e) {
                    $this->message = $e->getMessage();
                    $this->path = 'login';
                }
            }
        }
    }

    private function getData($dataPath)
    {
        if (count($dataPath) == 1 && $dataPath[0] == 'dashboard') {

            define("NB_MAX_OF_RECORD", 5);

            $data = array();
            $companies = Data::read("companies", "list", NB_MAX_OF_RECORD);
            $invoices = Data::read("companies", "list", NB_MAX_OF_RECORD);
            $contacts = Data::read("companies", "list", NB_MAX_OF_RECORD);
            array_push($data, $companies, $invoices, $contacts);

            return $data;
        }

        if (count($dataPath) == 2 && $dataPath[1] == 'list') {

            define("NB_MAX_OF_RECORD", -1); // -1 means unlimited

            switch ($dataPath[0]) {
                case 'invoices':
                    return Data::read($dataPath[0], $dataPath[1], NB_MAX_OF_RECORD,);
                case 'companies':
                    return Data::read($dataPath[0], $dataPath[1], NB_MAX_OF_RECORD,);
                case 'contacts':
                    return Data::read($dataPath[0], $dataPath[1], NB_MAX_OF_RECORD,);
            }
        }

        if (count($dataPath) == 3 && $dataPath[1] == 'details') {

            define("NB_MAX_OF_RECORD", -1);
            define("ID", $dataPath[2]);

            switch ($dataPath[0]) {
                case 'invoices':
                    return Data::read($dataPath[0], $dataPath[1], NB_MAX_OF_RECORD, ID);
                case 'companies':
                    return Data::read($dataPath[0], $dataPath[1], NB_MAX_OF_RECORD, ID);
                case 'contacts':
                    return Data::read($dataPath[0], $dataPath[1],  NB_MAX_OF_RECORD, ID);
            }
        }

        if (count($dataPath) == 3 && $dataPath[1] == 'add') {

            define("NB_MAX_OF_RECORD", -1);

            switch ($dataPath[0]) {
                case 'invoices':
                    return Data::create($dataPath[0], NB_MAX_OF_RECORD, $dataPath[1]);
                case 'companies':
                    return Data::create($dataPath[0], NB_MAX_OF_RECORD, $dataPath[1]);
                case 'contacts':
                    return Data::create($dataPath[0], NB_MAX_OF_RECORD,  $dataPath[1]);
            }
        }

        if (count($dataPath) == 3 && $dataPath[1] == 'delete') {
            switch ($dataPath[0]) {
                case 'invoices':
                    return Data::delete($dataPath[0], NB_MAX_OF_RECORD, $dataPath[1]);
                case 'companies':
                    return Data::delete($dataPath[0], NB_MAX_OF_RECORD, $dataPath[1]);
                case 'contacts':
                    return Data::delete($dataPath[0], NB_MAX_OF_RECORD,  $dataPath[1]);
            }
        }

        return [];
    }
}
