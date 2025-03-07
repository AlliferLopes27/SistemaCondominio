<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include_once('conexoes/crudServicos.php');
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">
                <i class="bi bi-buildings-fill"></i> Condomínio
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Alinhamento à esquerda -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="formMoradores.php"><i class="bi bi-people-fill"></i> Moradores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formCorrespondencias.php"><i class="bi bi-envelope-open-fill"></i> Correspondências</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formReservas.php"><i class="bi bi-calendar-event-fill"></i> Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formServicos.php"><i class="bi bi-wrench-adjustable"></i> Prestação de Serviços</a>
                    </li>
                </ul>
                <!-- Alinhamento à direita -->
                <span class="navbar-text ms-auto">
                    Logado: <?php echo htmlspecialchars($_SESSION['usuario']);?> | 
                    <a href="conexoes/logout.php" class="text-light text-decoration-none">Sair</a>
                </span>
            </div>
        </div>
    </nav>

    <div class="container mt-5 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-sm-10 mx-auto sombraFundo2">
                <div class="mt-4 mb-4 text-center">
                    <h1><i class="bi bi-wrench-adjustable"></i> Prestação de Serviços</h1>
                </div>
                <form action="" method="post" id="moradorForm">
                    <div class="row">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>