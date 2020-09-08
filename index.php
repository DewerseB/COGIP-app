<?php

    require_once './controller/controller.php';

    if (isset($_GET['path'])) {
        goToPage($_GET['path']);
    } else {
        goToPage();
    }