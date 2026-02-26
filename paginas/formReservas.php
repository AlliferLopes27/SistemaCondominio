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
    <title>Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include_once('conexoes/crudReservas.php');
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
            <div class="col-sm-10 mx-auto sombraFundo">
                <div class="mt-4 mb-4 text-center">
                    <h1><i class="bi bi-calendar-event-fill"></i> Reservas</h1>
                </div>
                <form action="formReservas.php" method="post">
                    <div class="row">
                        <div class="col-sm-5 mt-2">
                            <label for="txtMoradores" class="form-label">Moradores:</label>
                            <select class="form-select" id="txtMoradores" name="txtMoradores" required>
                                <option selected></option>
                                <?php
                                    $sql = $conn->query('SELECT id_morador, nome FROM tab_moradores');
                                    foreach($sql as $linha){
                                        $selected = ($linha['id_morador'] == $moradores) ? 'selected' : '';
                                        echo "<option value='{$linha['id_morador']}' {$selected}>{$linha['nome']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3 mt-2">
                            <label for="txtReserva" class="form-label">Reserva:</label>
                            <select class="form-select" id="txtReserva" name="txtReserva" required>
                                <option selected></option>
                                <option value="Salão de Festa Infantil" <?= ($reserva == "Salão de Festa Infantil") ? "selected" : "" ?>>Salão de Festa Infantil</option>
                                <option value="Salão de Festa Adulto" <?= ($reserva == "Salão de Festa Adulto") ? "selected" : "" ?>>Salão de Festa Adulto</option>
                                <option value="Salão de Jogos" <?= ($reserva == "Salão de Jogos") ? "selected" : "" ?>>Salão de Jogos</option>
                            </select>
                        </div>
                        <div class="col-sm-4 mt-2">
                            <label for="txtData" class="form-label">Data:</label>
                            <input type="date" class="form-control" id="txtData" name="txtData" value="<?= htmlspecialchars($data_reserva) ?>" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12 mt-4 text-center">
                            <button class="btn btn-primary" name="btoReservar"><i class="bi bi-calendar-plus"></i> Reservar</button>
                            <button class="btn btn-secondary" name="btoLimpar" onclick="window.location.href='formReservas.php?success=2'"><i class="bi bi-x-lg"></i> Limpar</button>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                                <div class="alert alert-success" role="alert">
                                    Reserva concluída com sucesso!
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-sm table-secondary table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th>Moradores</th>
                                        <th>Apto</th>
                                        <th>Bloco</th>
                                        <th>Reserva</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reservas as $reserva) { ?>
                                    <tr>
                                        <td><?php echo $reserva['moradores']; ?></td>
                                        <td><?php echo $reserva['apto']; ?></td>
                                        <td><?php echo $reserva['bloco']; ?></td>
                                        <td><?php echo $reserva['reserva']; ?></td>
                                        <td><?php echo $reserva['data_reserva']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>