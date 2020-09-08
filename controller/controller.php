<?php

    function goToPage($path = 'dashboard') {

        require_once './model/model.php';

        session_start();

        $message = "";

        if (!Auth::isLogged() && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])) {
            if ($_POST['submit'] === 'login') {
                try {
                    Auth::login($_POST['username'], $_POST['password']);
                    $message = "Bienvenue " . $_POST['username'];
                    $path = 'dashboard';
                } catch (Exception $e) {
                    $message = $e->getMessage();
                    $path = 'login';
                }
            }
        }

        $route = new Route($path);

        var_dump($route->getPath());
        var_dump($_POST);
        if (isset($_SESSION)) var_dump($_SESSION);

        require_once './view/template.php';
    }