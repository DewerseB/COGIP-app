<?php

    class Auth {

        public static function isLogged() {
            $isLogged = false;

            return $isLogged;
        }

        public static function login($username, $userpass) {

        }

        public static function logout() {
            session_start();
            session_unset();
            session_destroy();
            //session_id(session_create_id());
        }

    }