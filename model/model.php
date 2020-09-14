<?php

require_once './model/classes/auth.php';
require_once './model/classes/route.php';
require_once './model/classes/data.php';

class Model
{
    function __construct($path)
    {
        $this->message = "";
        $this->require = 'guest';
        $this->path = Route::checkPath($path, $this->message, $this->require);
        $this->handleSession();
        $this->dataPath = Route::getDataPath($this->path);
        $this->data = $this->getData($this->dataPath);
        $this->viewPath = Route::getViewPath($this->path);
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

        if ($this->require !== 'guest') {
            if (!Auth::isLogged())  {
                $this->message = "Vous devez être connecté, retour au dashboard";
                $this->path = 'dashboard';
            }
        }
    }

    private function getData($dataPath)
    {
        $data = array();

        switch (count($dataPath)) {

            case 1:
                if ($dataPath[0] == 'dashboard') {
                    define("NB_MAX_OF_RECORD", 5);

                    $companies = Data::read("companies", "list", NB_MAX_OF_RECORD);
                    $invoices = Data::read("invoices", "list", NB_MAX_OF_RECORD);
                    $contacts = Data::read("contacts", "list", NB_MAX_OF_RECORD);
                    array_push($data, $companies, $invoices, $contacts);
                }
                break;
            case 2:
                if ($dataPath[1] == 'list') {
                    $data = Data::read($dataPath[0], $dataPath[1]);
                }
                break;
            case 3:
                if ($dataPath[1] == 'details') {
                    try {
                        $data = Data::read($dataPath[0], $dataPath[1], 0, $dataPath[2]); // table/action/id
                        // switch ($dataPath[0]) {
                        //     case 'invoices':

                        //         $data = Data::read($dataPath[0], $dataPath[1], 0, $dataPath[2]);
                        // $data1 = Data::read('companies', 'details', 0, $data0[0]['company_id']);
                        // $data2 = Data::read('contacts', 'details', 0, $data0[0]['contact_id']);
                        // array_push($data, $data0, $data1, $data2);
                        // break;
                        // case 'companies':

                        // $data = Data::read($dataPath[0], $dataPath[1], 0, $dataPath[2]);

                        // $data1 = Data::read('invoices', 'details', 0, $data0[0]['company_id']);
                        // $data2 = Data::read('contacts', 'details', 0, $data0[0]['company_id']);
                        // array_push($data, $data0, $data1, $data2);
                        // break;
                        // case 'contacts':
                        //     $data = Data::read($dataPath[0], $dataPath[1], 0, $dataPath[2]);
                        // $data1 = Data::read('invoices', 'details', 0, $data0[0]['contact_id']);
                        // $data2 = Data::read('companies', 'details', 0, $data0[0]['company_id']);
                        // array_push($data, $data0, $data1, $data2);
                        //     break;
                        // }
                    } catch (Exception $e) {
                        $this->message = $e->getMessage();
                        $this->path = $dataPath[0] . '/list';
                        $data = Data::read($dataPath[0], 'list');
                    }
                }
                break;
            default:

                break;
        }

        return $data;



        // if (count($dataPath) == 1 && $dataPath[0] == 'dashboard') {

        //     define("NB_MAX_OF_RECORD", 5);

        //     $data = array();
        //     $companies = Data::read("companies", "list", NB_MAX_OF_RECORD);
        //     $invoices = Data::read("companies", "list", NB_MAX_OF_RECORD);
        //     $contacts = Data::read("companies", "list", NB_MAX_OF_RECORD);
        //     array_push($data, $companies, $invoices, $contacts);

        //     return $data;
        // }

        // if (count($dataPath) == 2 && $dataPath[1] == 'list') {

        //     return Data::read($dataPath[0], $dataPath[1]);
        // }

        // if (count($dataPath) == 3 && $dataPath[1] == 'details') {

        //     try {
        //         $data = Data::read($dataPath[0], $dataPath[1], -1, $dataPath[2]);
        //     } catch (Exception $e) {
        //         $this->message = $e->getMessage();
        //         $this->path = $dataPath[0] . '/list';
        //         $data = Data::read($dataPath[0], 'list');
        //     }
        //     return $data;
        // }

        // if (count($dataPath) == 3 && $dataPath[1] == 'add') {

        //     define("NB_MAX_OF_RECORD", -1);

        //     switch ($dataPath[0]) {
        //         case 'invoices':
        //             return Data::create($dataPath[0], NB_MAX_OF_RECORD, $dataPath[1]);
        //         case 'companies':
        //             return Data::create($dataPath[0], NB_MAX_OF_RECORD, $dataPath[1]);
        //         case 'contacts':
        //             return Data::create($dataPath[0], NB_MAX_OF_RECORD,  $dataPath[1]);
        //     }
        // }

        // if (count($dataPath) == 3 && $dataPath[1] == 'delete') {
        //     switch ($dataPath[0]) {
        //         case 'invoices':
        //             return Data::delete($dataPath[0], NB_MAX_OF_RECORD, $dataPath[1]);
        //         case 'companies':
        //             return Data::delete($dataPath[0], NB_MAX_OF_RECORD, $dataPath[1]);
        //         case 'contacts':
        //             return Data::delete($dataPath[0], NB_MAX_OF_RECORD,  $dataPath[1]);
        //     }
        // }
        // return [];
    }
}
