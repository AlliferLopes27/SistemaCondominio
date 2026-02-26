<?php
    include_once('conexao.php');

    $moradores = "";
    $reserva = "";
    $data_reserva = "";
    $mensagem = "";

    // Buscar todas as reservas enviadas para exibição na tabela
    try {
        $sql = $conn->query('
            SELECT 
                r.id_reserva,
                m.nome AS moradores,
                m.apartamento AS apto,
                m.bloco,
                r.reserva,
                r.data_reserva
            FROM 
                tab_reservas r
            JOIN 
                tab_moradores m 
            ON 
                r.id_moradores_reserva = m.id_morador
        ');
        $reservas = $sql->fetchAll();
    } catch (PDOException $erro) {
        $mensagem = $erro->getMessage();
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Adicionar uma nova reserva
    if (isset($_POST['btoReservar'])) {
        try {
            $sql = $conn->prepare('
                INSERT INTO tab_reservas
                    (id_moradores_reserva, reserva, data_reserva)
                VALUES
                    (:id_moradores_reserva, :reserva, :data_reserva)
            ');

            $sql->execute(array(
                ':id_moradores_reserva' => $_POST['txtMoradores'],
                ':reserva' => $_POST['txtReserva'],
                ':data_reserva' => $_POST['txtData']
            ));

            if ($sql->rowCount() > 0) {
                // Redirecionar após o processamento bem-sucedido
                header("Location: formReservas.php?success=1");
                exit();
            }

        } catch (PDOException $erro) {
            $mensagem = $erro->getMessage();
        }
    }
    // Limpar todos os campos digitados
    elseif (isset($_POST['btoLimpar'])) {
        $moradores = "";
        $reserva = "";
        $data_reserva = "";
    }
}
?>