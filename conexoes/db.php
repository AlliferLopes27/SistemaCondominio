<?php
    $host="localhost";
    $bd="condominio";
    $user="root";
    $pass="";

    try {
        $conn = new PDO("mysql:dbname=$bd;host=$host", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");

    } catch (PDOException $erro) {
        echo $erro->getMessage();
    }
?>