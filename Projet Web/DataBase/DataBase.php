<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "biscottino";

    try {
        $dsn = "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
        $conn = new PDO($dsn, $db_user, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>