<?php

    require_once './model/classes/auth.php';
    require_once './model/classes/route.php';
    require_once './model/classes/data.php';

    class Model {
        function __construct($path) {
            $this->message = '';
            $this->path = $path;
            $this->handleSession();
            $this->realPath = Route::getRealPath($this->path);
            //$this->data = $this->getData();
        }

        private function handleSession() {
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

        private function getData() {
            return [];
        }
    }