<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biy.db";

    $connection = new mysqli($servername, $username, $password, $dbname);

    if ($connection->connect_error) {
        die("Conexão falhou: " . $connection->connect_error);
    }
?>