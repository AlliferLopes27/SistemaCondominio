<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST['txtUsuario'];
        $senha = $_POST['txtSenha'];

        // Conectar ao banco de dados
        $host="localhost";
        $bd="sistema_condominio";
        $user="root";
        $pass="";

        $conn = new mysqli($host, $user, $password, $bd);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Verificar as credenciais do usuário
        $sql = "SELECT * FROM tab_usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Usuário autenticado com sucesso
            $_SESSION['usuario'] = $usuario;
            header("Location: ../dashboard.php");
        } else {
            // Usuário ou senha inválidos
            header("Location: ../index.php?erro=1");
        }

        $conn->close();
    }
?>