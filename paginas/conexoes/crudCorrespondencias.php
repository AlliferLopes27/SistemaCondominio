<?php
    include_once('conexao.php');

    $moradores = "";
    $tipo = "";
    $datahora = "";
    $mensagem = "";

    // Buscar todas as correspondências enviadas para exibição na tabela
    try {
        $sql = $conn->query('SELECT id, tipo, datahora FROM tab_correspondencias');
        $correspondencias = $sql->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $erro) {
        $mensagem = $erro->getMessage();
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Enviar mensagem ou email
    if (isset($_POST['btoEnviar'])) {
        try {
            $sql = $conn->prepare('
                INSERT INTO tab_correspondencias
                    (id_moradores, tipo, datahora)
                VALUES
                    (:id_moradores, :tipo, :datahora)
            ');

            $sql->execute(array(
                ':id_moradores' => $_POST['txtMoradores'],
                ':tipo' => $_POST['txtTipo'],
                ':datahora' => $_POST['txtDatahora']
            ));

            if ($sql->rowCount() > 0) {
                // Redirecionar após o processamento bem-sucedido
                header("Location: formCorrespondencias.php?success=1");
                exit();
            }

        } catch (PDOException $erro) {
            $mensagem = $erro->getMessage();
        }
    }
    // Limpar todos os campos digitados
    elseif (isset($_POST['btoLimpar'])) {
        $moradores = "";
        $tipo = "";
        $datahora = "";
    }
}
?>