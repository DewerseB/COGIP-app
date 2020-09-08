<?php

    function goToPage($path = 'dashboard') {

        require_once './model/classes/route.php';
        $route = new Route($path);

        var_dump($route->getPath());

        require './view/template.php';
    }