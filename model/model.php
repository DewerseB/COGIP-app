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
            if (!Auth::isLogged()) {
                $this->message = "Vous devez être connecté, retour au dashboard";
                $this->path = 'dashboard';
            } else {
                if ($this->require === 'admin') {
                    if ($_SESSION['usertype'] !== 'admin') {
                        $this->message = "Vous devez être admin, retour au dashboard";
                        $this->path = 'dashboard';
                    }
                }
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
                if ($dataPath[1] === 'list') {
                    $data = Data::read($dataPath[0], $dataPath[1]);
                } elseif ($dataPath[1] === 'add') {
                    $data = Data::read($dataPath[0], $dataPath[1]);
                    if (isset($_POST['submit'])) {
                        try {
                            switch ($dataPath[0]) {
                                case 'invoices':
                                    $this->message = "Facture ajoutée";
                                    break;
                                case 'companies':
                                    $this->message = "Société ajoutée";
                                    break;
                                case 'contacts':
                                    $this->message = "Contact ajouté";
                                    break;
                            }
                            Data::create($dataPath[0]);
                            $this->path = $dataPath[0] . '/list';
                            $data = Data::read($dataPath[0], 'list');
                        } catch (Exception $e) {
                            $this->message = $e->getMessage();
                            $this->path = $dataPath[0] . '/list';
                            $data = Data::read($dataPath[0], 'list');
                        }
                    }
                } elseif ($dataPath[1] === 'admin') {
                    try {
                        $data = Auth::getUsers();
                    } catch (Exception $e) {
                        $this->message = $e->getMessage();
                    }
                }
                break;
            case 3:
                if ($dataPath[1] === 'details') {
                    try {
                        $data = Data::read($dataPath[0], $dataPath[1], 0, $dataPath[2]); // table/action/id

                    } catch (Exception $e) {
                        $this->message = $e->getMessage();
                        $this->path = $dataPath[0] . '/list';
                        $data = Data::read($dataPath[0], 'list');
                    }
                } elseif ($dataPath[1] === 'delete') {
                    try {
                        switch ($dataPath[0]) {
                            case 'invoices':
                                $primaryKey = 'invoice_id';
                                $this->message = "Facture supprimée";
                                break;
                            case 'companies':
                                $primaryKey = 'company_id';
                                $this->message = "Société supprimée";
                                break;
                            case 'contacts':
                                $primaryKey = 'contact_id';
                                $this->message = "Contact supprimé";
                                break;
                            case 'admin':
                                $primaryKey = 'id';
                                $this->message = "utilisateur supprimé";
                                break;
                        }
                        Data::delete($dataPath[0], $dataPath[2], $primaryKey);
                        $this->path = $dataPath[0] . '/list';
                        $data = Data::read($dataPath[0], 'list');
                    } catch (Exception $e) {
                        $this->message = $e->getMessage();
                        $this->path = $dataPath[0] . '/list';
                        $data = Data::read($dataPath[0], 'list');
                    }
                } elseif ($dataPath[1] === 'update') {
                    if (isset($_POST['submit'])) {
                        try {
                            switch ($dataPath[0]) {
                                case 'invoices':
                                    $primaryKey = 'invoice_id';
                                    $this->message = "Facture modifiée";
                                    break;
                                case 'companies':
                                    $primaryKey = 'company_id';
                                    $this->message = "Société modifiée";
                                    break;
                                case 'contacts':
                                    $primaryKey = 'contact_id';
                                    $this->message = "Contact modifié";
                                    break;
                                case 'admin':
                                    $primaryKey = 'id';
                                    $this->message = "utilisateur modifié";
                                    break;
                            }
                            Data::update($dataPath[0], $dataPath[2], $primaryKey);
                            $this->path = $dataPath[0] . '/list';
                            $data = Data::read($dataPath[0], 'list');
                        } catch (Exception $e) {
                            $this->message = $e->getMessage();
                            $this->path = $dataPath[0] . '/list';
                            $data = Data::read($dataPath[0], 'list');
                        }
                    } else {

                        if ($dataPath[0] === "admin") {
                            $data = Data::read($dataPath[0], 'details', 1, $dataPath[2]);
                        } else {
                            $data0 = Data::read($dataPath[0], 'details', 1, $dataPath[2]);
                            $data1 = Data::read($dataPath[0], $dataPath[1]);
                            array_push($data, $data0, $data1);
                        }
                    }
                }
                break;
            default:

                break;
        }

        return $data;
    }
}
