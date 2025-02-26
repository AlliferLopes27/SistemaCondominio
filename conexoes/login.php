<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST['txtUsuario'];
        $senha = $_POST['txtSenha'];

        // Conectar ao banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "condominio";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Verificar as credenciais do usuário
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Usuário autenticado com sucesso
            $_SESSION['usuario'] = $usuario;
            header("Location: ../paginas/dashboard.php");
        } else {
            // Usuário ou senha inválidos
            header("Location: ../paginas/index.php?erro=1");
        }

        $conn->close();
    }
?>