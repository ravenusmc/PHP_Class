<?php
    $dsn = 'mysql:host=localhost;dbname=students';
    $username = 'root';
    $password = 'root';

    try {
        $db = new PDO($dsn, $username, $password);
        //echo 'connected';
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>