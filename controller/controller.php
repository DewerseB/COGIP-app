<?php

    function goToPage($path = 'dashboard') {

        require_once './model/model.php';

        $model = new Model($path);
        var_dump($path);

        require_once './view/template.php';

        var_dump($model);
        var_dump($_POST);
        if (isset($_SESSION)) var_dump($_SESSION);
    }