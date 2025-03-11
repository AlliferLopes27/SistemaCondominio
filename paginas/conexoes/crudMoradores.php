<?php
    include_once('conexao.php');

    $nome = "";
    $rg = "";
    $cpf = "";
    $nascimento = "";
    $apartamento = "";
    $bloco = "";
    $email = "";
    $telefone = "";
    $codigo = "";
    $mensagem = "";
    $bloquearAdicionar = false;

    // Buscar todos os moradores cadastrados para exibição na tabela
    try {
        $sql = $conn->query('
            SELECT 
                m.id_morador,
                m.nome,
                m.apartamento,
                m.bloco
            FROM 
                tab_moradores m
        ');
        $moradores = $sql->fetchAll();
    } catch (PDOException $erro) {
        $mensagem = $erro->getMessage();
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pesquisar os dados do morador    
    if (isset($_POST['btoPesquisar'])) {
        try {
            $sql = $conn->query('SELECT * FROM tab_moradores WHERE id_morador=' . $_POST['txtPesquisar']);

            if ($sql->rowCount() > 0) {
                foreach ($sql as $linha) {
                    $codigo = $linha[0];
                    $nome = $linha[1];
                    $rg = $linha[2];
                    $cpf = $linha[3];
                    $nascimento = $linha[4];
                    $apartamento = $linha[5];
                    $bloco = $linha[6];
                    $email = $linha[7];
                    $telefone = $linha[8];
                }

                // Definir a variável para bloquear o botão Adicionar
                $bloquearAdicionar = true;               
            }

        } catch (PDOException $erro) {
            $mensagem = $erro->getMessage();
        }
    }
    // Adicionar novo morador
    elseif (isset($_POST['btoAdicionar'])) {
        try {
            $sql = $conn->prepare('
                INSERT INTO tab_moradores
                    (nome, rg, cpf, nascimento, apartamento, bloco, email, telefone)
                VALUES
                    (:nome, :rg, :cpf, :nascimento, :apartamento, :bloco, :email, :telefone)
            ');

            $sql->execute(array(
                ':nome' => $_POST['txtNome'],
                ':rg' => $_POST['txtRg'],
                ':cpf' => $_POST['txtCpf'],
                ':nascimento' => $_POST['txtNascimento'],
                ':apartamento' => $_POST['txtApartamento'],
                ':bloco' => $_POST['txtBloco'],
                ':email' => $_POST['txtEmail'],
                ':telefone' => $_POST['txtTelefone']
            ));

            if ($sql->rowCount() > 0) {
                // Redirecionar após o processamento bem-sucedido
                header("Location: formMoradores.php?success=1");
                exit();
            }

        } catch (PDOException $erro) {
            $mensagem = $erro->getMessage();
        }
    }
    // Atualizar os dados do morador
    elseif (isset($_POST['btoAlterar'])) {
        try {
            $sql = $conn->prepare('
                UPDATE tab_moradores SET
                    nome = :nome,
                    rg = :rg,
                    cpf = :cpf,
                    nascimento = :nascimento,
                    apartamento = :apartamento,
                    bloco = :bloco,
                    email = :email,
                    telefone = :telefone
                WHERE id_morador = :id_morador
            ');

            $sql->execute(array(
                ':id_morador' => $_POST['txtPesquisar'],
                ':nome' => $_POST['txtNome'],
                ':rg' => $_POST['txtRg'],
                ':cpf' => $_POST['txtCpf'],
                ':nascimento' => $_POST['txtNascimento'],
                ':apartamento' => $_POST['txtApartamento'],
                ':bloco' => $_POST['txtBloco'],
                ':email' => $_POST['txtEmail'],
                ':telefone' => $_POST['txtTelefone']
            ));

            if ($sql->rowCount() > 0) {
                // Redirecionar após o processamento bem-sucedido
                header("Location: formMoradores.php?success=2");
                exit();
            }

        } catch (PDOException $erro) {
            $mensagem = $erro->getMessage();
        }
    }
    // Excluir todos os dados do morador
    elseif (isset($_POST['btoExcluir'])) {
        try {
            $sql = $conn->prepare('DELETE FROM tab_moradores WHERE id_morador = :id_morador');

            $sql->execute(array(':id_morador' => $_POST['txtPesquisar']));

            if ($sql->rowCount() > 0) {
                // Redirecionar após o processamento bem-sucedido
                header("Location: formMoradores.php?success=3");
                exit();
            }

        } catch (PDOException $erro) {
            $mensagem = $erro->getMessage();
        }
    }
    // Limpar todos os campos digitados
    elseif (isset($_POST['btoLimpar'])) {
        $nome = "";
        $rg = "";
        $cpf = "";
        $nascimento = "";
        $apartamento = "";
        $bloco = "";
        $email = "";
        $telefone = "";
        $codigo = "";
    }
}
?>