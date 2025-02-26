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
    <title>Moradores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include_once('conexoes/crudMoradores.php');
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
                    <h1><i class="bi bi-people-fill"></i> Moradores</h1>
                </div>
                <form action="" method="post" id="moradorForm">
                    <div class="row">
                        <div class="col-sm-5 mt-2">
                            <label for="txtNome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Digite o nome completo" value="<?= htmlspecialchars($nome) ?>" required>
                        </div>
                        <div class="col-sm-2 mt-2">
                            <label for="txtRg" class="form-label">RG:</label>
                            <input type="text" class="form-control" id="txtRg" name="txtRg" placeholder="Digite o n° do RG" value="<?= htmlspecialchars($rg) ?>" required oninput="formatarRG(this)">
                        </div>
                        <div class="col-sm-3 mt-2">
                            <label for="txtCpf" class="form-label">CPF:</label>
                            <input type="text" class="form-control" id="txtCpf" name="txtCpf" placeholder="Digite o n° do CPF" value="<?= htmlspecialchars($cpf) ?>" required oninput="formatarCPF(this)">
                        </div>
                        <div class="col-sm-2 mt-2">
                            <label for="txtNascimento" class="form-label">Nascimento:</label>
                            <input type="date" class="form-control" id="txtNascimento" name="txtNascimento" value="<?= htmlspecialchars($nascimento) ?>" required>
                        </div>
                        <div class="col-sm-2 mt-2">
                            <label for="txtApartamento" class="form-label">Apartamento:</label>
                            <input type="number" class="form-control" id="txtApartamento" name="txtApartamento" placeholder="Apto" value="<?= htmlspecialchars($apartamento) ?>" required oninput="limitarNúmero(this)">
                        </div>
                        <div class="col-sm-2 mt-2">
                            <label for="txtBloco" class="form-label">Bloco:</label>
                            <select name="txtBloco" id="txtBloco" class="form-select">
                                <option value="A" <?= ($bloco == "A") ? "selected" : "" ?>>A</option>
                                <option value="B" <?= ($bloco == "B") ? "selected" : "" ?>>B</option>
                                <option value="C" <?= ($bloco == "C") ? "selected" : "" ?>>C</option>
                                <option value="D" <?= ($bloco == "D") ? "selected" : "" ?>>D</option>
                            </select>
                        </div>
                        <div class="col-sm-5 mt-2">
                            <label for="txtEmail" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Digite o email" value="<?= htmlspecialchars($email) ?>" required>
                        </div>
                        <div class="col-sm-3 mt-2">
                            <label for="txtTelefone" class="form-label">Telefone:</label>
                            <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="(00) 00000-0000" value="<?= htmlspecialchars($telefone) ?>" required oninput="formatarTelefone(this)">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 mt-4 text-center">
                            <button class="btn btn-dark" name="btoAdicionar" <?php echo ($bloquearAdicionar) ? 'disabled' : ''; ?>><i class="bi bi-person-plus"></i> Adicionar</button>
                            <button class="btn btn-dark" name="btoLimpar"><i class="bi bi-x-lg"></i> Limpar</button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="number" class="form-control" id="txtPesquisar" name="txtPesquisar" placeholder="Pesquisar" value="<?= htmlspecialchars($codigo) ?>">
                                <button class="btn btn-dark" name="btoPesquisar"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-sm table-secondary table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Apto</th>
                                        <th>Bloco</th>
                                        <th>Alterar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($moradores as $morador) { ?>
                                    <tr>
                                        <td><?php echo $morador['id']; ?></td>
                                        <td><?php echo $morador['nome']; ?></td>
                                        <td><?php echo $morador['apartamento']; ?></td>
                                        <td><?php echo $morador['bloco']; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-warning" name="btoAlterar"><i class="bi bi-arrow-repeat"></i> Alterar</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-danger" name="btoExcluir"><i class="bi bi-trash3"></i> Excluir</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal fade" id="mensagemModal" tabindex="-1" aria-labelledby="mensagemModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mensagemModalLabel">Mensagem</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="mensagemContent"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        <?php if (!empty($mensagem)): ?>
            window.onload = function() {
                // Passa a mensagem para o modal
                document.getElementById('mensagemContent').innerHTML = '<?php echo $mensagem; ?>';
                // Exibe o modal
                var myModal = new bootstrap.Modal(document.getElementById('mensagemModal'));
                myModal.show();
            };
        <?php endif; ?>
    </script>

    <script src="javascript/validation.js"></script>
    <script src="javascript/manipulation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>