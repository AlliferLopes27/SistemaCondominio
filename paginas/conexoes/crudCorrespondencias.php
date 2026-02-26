<?php
    include_once('conexao.php');

    $moradores = "";
    $tipo = "";
    $data_hora = "";
    $mensagem = "";

    // Buscar todas as correspondências enviadas para exibição na tabela
    try {
        $sql = $conn->query('
            SELECT 
                c.id_correspondencia,
                m.nome AS moradores,
                m.apartamento AS apto,
                m.bloco,
                c.tipo,
                c.data_hora
            FROM 
                tab_correspondencias c
            JOIN 
                tab_moradores m 
            ON 
                c.id_moradores_correspondencia = m.id_morador
        ');
        $correspondencias = $sql->fetchAll();
    } catch (PDOException $erro) {
        $mensagem = $erro->getMessage();
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Enviar mensagem ou email
    if (isset($_POST['btoEnviar'])) {
        try {
            $sql = $conn->prepare('
                INSERT INTO tab_correspondencias
                    (id_moradores_correspondencia, tipo, data_hora)
                VALUES
                    (:id_moradores_correspondencia, :tipo, :data_hora)
            ');

            $sql->execute(array(
                ':id_moradores_correspondencia' => $_POST['txtMoradores'],
                ':tipo' => $_POST['txtTipo'],
                ':data_hora' => $_POST['txtDatahora']
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
        $data_hora = "";
    }
}
?>