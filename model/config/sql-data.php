<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=cogip_data;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        throw new Exception('Cannot connect to database');
        // die('Erreur : '.$e->getMessage());
    }