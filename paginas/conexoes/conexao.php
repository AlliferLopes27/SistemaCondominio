<?php
    // Dados de conexão
    $host="localhost";
    $bd="sistema_condominio";
    $user="root";
    $pass="";

    try {
        // Conectando ao banco de dados com PDO
        $conn = new PDO("mysql:dbname=$bd;host=$host", $user, $pass);
         // Configurando o modo de erro para exceções
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         // Definindo a codificação de caracteres
        $conn->exec("set names utf8");

    } catch (PDOException $erro) {
        // Exibindo mensagem de erro
        echo $erro->getMessage();
    }
?>