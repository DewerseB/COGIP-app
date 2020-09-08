<?php

    class Auth {

        public static function isLogged() {
            return (isset($_SESSION['username']));
        }

        public static function login($username, $password) {

            require './model/config/sql-auth.php';

            $selectPass = 'SELECT password FROM users WHERE username = ?';
            $prepPassReq = $pdo->prepare($selectPass);
            $prepPassReq->execute([$username]);

            if ($prepPassReq) {
                $response = $prepPassReq->fetch();
                if ($response) {
                    if (password_verify($password, $response['password'])) {
                        $_SESSION['username'] = $username;
                    } else {
                        throw new Exception("Mot de passe invalide");
                    }
                } else {
                    throw new Exception("Nom d'utilisateur invalide");
                }
            }

            $prepPassReq = NULL;
        }

        public static function logout() {
            session_start();
            session_unset();
            session_destroy();
            //session_id(session_create_id());
        }

    }