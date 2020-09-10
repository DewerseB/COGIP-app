<?php

    require_once './model/classes/auth.php';
    require_once './model/classes/route.php';
    require_once './model/classes/data.php';

    class Model {
        function __construct($path) {
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
        // $dataPath est un tableau contenant le résultat de l'explode sur l'url
        // ex: ['companies', 'list']  ['dashboard']  ['invoices', 'add']
        // Si il ne contient qu'un élément, soit c'est le login et getData ne fait rien, sinon c'est le dashboard qui doit charger 5 lignes de chaque table
        // Dans les autres cas, le 1er élément est la table, le 2eme la requête a appeller dans la classe Data

        if (count($dataPath) == 1 && $dataPath[0] == 'dashboard') {
            $data = array();

            $company = Data::Read("company", 5);
            $invoices = Data::Read("invoices", 5);
            $contacts = Data::Read("contacts", 5);

            array_push($data, $company, $invoices, $contacts);
            return $data;
        } else {

            if ($dataPath[0] == 'invoices' && $dataPath[1] == 'list') {
                return $invoices = Data::Read("invoices");
            }
            if ($dataPath[0] == 'companies' && $dataPath[1] == 'list') {
                return $invoices = Data::Read("company");
            }
            if ($dataPath[0] == 'contacts' && $dataPath[1] == 'list') {
                return $invoices = Data::Read("contacts");
            }
    
        } 

        // return []; // Doit retourner un tableau vide si la requête appelée dans Data.php échoue, ou un tableau a 2 dimensions avec l'ensemble des données à afficher
    }
}
