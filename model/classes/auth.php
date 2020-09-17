<?php

    class Auth {

        public static function isLogged() {
            return (isset($_SESSION['username']) && isset($_SESSION['usertype']));
        }

        public static function login($username, $password) {

            $response = Auth::read($username);

            if ($response) {
                if (password_verify($password, $response[0]['password'])) {
                    $_SESSION['username'] = $response[0]['username'];
                    $_SESSION['usertype'] = $response[0]['usertype'];
                } else {
                    throw new Exception("Mot de passe invalide");
                }
            } else {
                throw new Exception("Nom d'utilisateur invalide");
            }
        }

        public static function logout() {
            session_unset();
            session_destroy();
            session_id(session_create_id());
            session_start();
        }

        public static function getUsers() {

            $response = Auth::read();

            if ($response) {
                return $response;
            } else {
                throw new Exception("Aucun utilisateur dans la base de données");
            }
        }

        private static function read($username = FALSE) {

            require './model/config/sql-auth.php';

            $selectUsers = 'SELECT users.id, users.username, users.password, usertypes.usertype FROM users INNER JOIN usertypes ON users.usertype_id = usertypes.usertype_id';
            if ($username) {
                $selectUsers .= ' AND username = ?';
            } else {
                $selectUsers .= ' AND FALSE = ?';
            }
            $prepUserReq = $pdo->prepare($selectUsers);
            $prepUserReq->execute([$username]);

            if ($prepUserReq) {
                $response = $prepUserReq->fetchAll(PDO::FETCH_ASSOC);
                $prepUserReq = NULL;
                return $response;
            } else {
                $prepUserReq = NULL;
                throw new Exception("Impossible de se connecter à la base de données");
            }
        }

        public static function update() {

            require './model/config/sql-auth.php';


        }
    }