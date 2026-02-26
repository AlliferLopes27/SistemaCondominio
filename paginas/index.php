<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row w-100">
            <div class="col-sm-4 mx-auto sombraFundo">
                <div class="mt-4 mb-4 text-center">
                    <i class="bi bi-buildings-fill" style="font-size: 3em;"></i>
                    <h1>Login</h1>
                </div>
                <form action="conexoes/login.php" method="post">
                    <div class="mb-3">
                        <label for="txtUsuario" class="form-label">Usuário</label>
                        <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtSenha" class="form-label">Senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="txtSenha" name="txtSenha" required>
                            <span class="input-group-text" onclick="togglePasswordVisibility()">
                                <i class="bi bi-eye" id="togglePasswordIcon"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark">Entrar</button>
                    </div>
                    <?php if (isset($_GET['erro']) && $_GET['erro'] == 1): ?>
                        <div class="alert alert-danger" role="alert">
                            Usuário ou senha inválidos.
                        </div>
                    <?php endif; ?>
                </form>
                <div class="text-center">
                    <h6>&copy; 2026 Sistema de Condomínio. Todos os direitos reservados.</h6>
                </div>
            </div>
        </div>
    </div>

    <script src="javascript/password.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>