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
            <div class="col-sm-10 mx-auto sombraFundo">
                <div class="mt-4 mb-4 text-center">
                    <h1><i class="bi bi-wrench-adjustable"></i> Prestação de Serviços</h1>
                </div>
                <form action="formServicos.php" method="post">
                    <div class="row">
                        <div class="col-sm-4 mt-2">
                            <label for="txtServico" class="form-label">Serviço:</label>
                            <select class="form-control" id="txtServico" name="txtServico" required>
                                <option value="">Selecione um serviço</option>
                                <optgroup label="Manutenção e Reparos">
                                    <option value="Eletrica">Elétrica</option>
                                    <option value="Hidraulica">Hidráulica</option>
                                    <option value="Pintura">Pintura</option>
                                    <option value="Jardinagem">Jardinagem</option>
                                    <option value="Dedetizacao">Dedetização</option>
                                </optgroup>
                                <optgroup label="Serviços de Segurança">
                                    <option value="Monitoramento">Monitoramento e Vigilância</option>
                                    <option value="Portaria">Portaria</option>
                                </optgroup>
                                <optgroup label="Serviços Administrativos">
                                    <option value="Contabilidade">Contabilidade</option>
                                    <option value="Consultoria Juridica">Consultoria Jurídica</option>
                                </optgroup>
                                <optgroup label="Serviços Gerais">
                                    <option value="Coleta de Lixo">Coleta de Lixo</option>
                                    <option value="Lavanderia">Lavanderia</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-sm-5 mt-2">
                            <label for="txtPrestador" class="form-label">Prestador:</label>
                            <input type="text" class="form-control" id="txtPrestador" name="txtPrestador" placeholder="Digite o nome do Prestador de Serviços" required>
                        </div>
                        <div class="col-sm-3 mt-2">
                            <label for="txtCnpj" class="form-label">CNPJ:</label>
                            <input type="text" class="form-control" id="txtCnpj" name="txtCnpj" placeholder="Digite o n° do CNPJ" required oninput="formatarCNPJ(this)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 mt-2">
                            <label for="txtData" class="form-label">Data:</label>
                            <input type="date" class="form-control" id="txtData" name="txtData" required>
                        </div>
                        <div class="col-sm-2 mt-2">
                            <label for="txtValor" class="form-label">Valor:</label>
                            <input type="number" class="form-control" id="txtValor" name="txtValor" placeholder="Digite o valor" step="0.01" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mt-2">
                            <label for="txtDescricao" class="form-label">Descrição:</label>
                            <textarea class="form-control" id="txtDescricao" name="txtDescricao" placeholder="Digite a descrição sobre o serviço prestador ao condomínio" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12 mt-4 text-center">
                            <button class="btn btn-primary" name="btoAdicionar"><i class="bi bi-building-add"></i> Adicionar</button>
                            <button class="btn btn-secondary" name="btoLimpar" onclick="window.location.href='formServicos.php?success=2'"><i class="bi bi-x-lg"></i> Limpar</button>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                                <div class="alert alert-success" role="alert">
                                    Adicionado com sucesso!
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-sm table-secondary table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th>Serviços</th>
                                        <th>Prestadores</th>
                                        <th>CNPJ</th>
                                        <th>Data</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($servicos as $servico) { ?>
                                    <tr>
                                        <td><?php echo $servico['servico']; ?></td>
                                        <td><?php echo $servico['prestador']; ?></td>
                                        <td><?php echo $servico['cnpj']; ?></td>
                                        <td><?php echo $servico['data_servico']; ?></td>
                                        <td><?php echo $servico['valor']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th colspan="5">Descrição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($servicos as $servico) { ?>
                                    <tr>
                                        <td colspan="3"><?php echo $servico['prestador']; ?></td> 
                                        <td colspan="3"><?php echo $servico['descricao']; ?></td> 
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

    <script src="javascript/validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>