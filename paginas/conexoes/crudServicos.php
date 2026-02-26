<?php
    include_once('conexao.php');

    $servico = "";
    $data_servico = "";
    $prestador = "";
    $cnpj = "";
    $valor = "";
    $descricao ="";
    $mensagem = "";

    // Buscar todos os prestadores de serviços cadastrados para exibição na tabela
    try {
        $sql = $conn->query('
            SELECT 
                s.id_servico,
                s.servico,
                s.data_servico,
                s.prestador,
                s.cnpj,
                s.valor,
                s.descricao
            FROM 
                tab_servicos s
        ');
        $servicos = $sql->fetchAll();
    } catch (PDOException $erro) {
        $mensagem = $erro->getMessage();
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Adicionar um novo prestador de serviços
    if (isset($_POST['btoAdicionar'])) {
        try {
            $sql = $conn->prepare('
                INSERT INTO tab_servicos
                    (servico, data_servico, prestador, cnpj, valor, descricao)
                VALUES
                    (:servico, :data_servico, :prestador, :cnpj, :valor, :descricao)
            ');

            $sql->execute(array(
                ':servico' => $_POST['txtServico'],
                ':data_servico' => $_POST['txtData'],
                ':prestador' => $_POST['txtPrestador'],
                ':cnpj' => $_POST['txtCnpj'],
                ':valor' => $_POST['txtValor'],
                ':descricao' => $_POST['txtDescricao']
            ));

            if ($sql->rowCount() > 0) {
                // Redirecionar após o processamento bem-sucedido
                header("Location: formServicos.php?success=1");
                exit();
            }

        } catch (PDOException $erro) {
            $mensagem = $erro->getMessage();
        }
    }
    // Limpar todos os campos digitados
    elseif (isset($_POST['btoLimpar'])) {
        $servico = "";
        $data_servico = "";
        $prestador = "";
        $cnpj = "";
        $valor = "";
        $descricao = "";
    }
}
?>