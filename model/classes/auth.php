<?php

    class Auth {

        public static function isLogged() {
            return (isset($_SESSION['username']) && isset($_SESSION['usertype']));
        }

        public static function login($username, $password) {

            require './model/config/sql-auth.php';

            $selectPass = 'SELECT users.password, usertypes.usertype FROM users INNER JOIN usertypes ON users.usertype_id = usertypes.usertype_id AND username = ?';
            $prepPassReq = $pdo->prepare($selectPass);
            $prepPassReq->execute([$username]);

            if ($prepPassReq) {
                $response = $prepPassReq->fetch();
                $prepPassReq = NULL;
                if ($response) {
                    if (password_verify($password, $response['password'])) {
                        $_SESSION['username'] = $username;
                        $_SESSION['usertype'] = $response['usertype'];
                    } else {
                        throw new Exception("Mot de passe invalide");
                    }
                } else {
                    throw new Exception("Nom d'utilisateur invalide");
                }
            } else {
                $prepPassReq = NULL;
            }
        }

        public static function logout() {
            session_unset();
            session_destroy();
            session_id(session_create_id());
            session_start();
        }

    }