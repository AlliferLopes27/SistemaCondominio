<?php
    include_once('conexao.php');

    $nome="";
    $rg="";
    $cpf="";
    $nascimento="";
    $apartamento="";
    $bloco="";
    $email="";
    $telefone="";
    $codigo="";
    $mensagem="";
    $bloquearAdicionar = false;

// Buscar todos os moradores cadastrados para exibição na tabela
try {
    $sql = $conn->query('SELECT id, nome, apartamento, bloco FROM tab_moradores');
    $moradores = $sql->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $erro) {
    $mensagem = $erro->getMessage();
}

if ($_POST) {
    // Pesquisar os dados do morador    
    if (isset($_POST['btoPesquisar'])) {
        
        try {
            $sql = $conn->query('select * from tab_moradores where id='.$_POST['txtPesquisar']);

            if ($sql->rowCount() > 0) {
                foreach ($sql as $linha) {
                    $codigo=$linha[0];
                    $nome=$linha[1];
                    $rg=$linha[2];
                    $cpf=$linha[3];
                    $nascimento=$linha[4];
                    $apartamento=$linha[5];
                    $bloco=$linha[6];
                    $email=$linha[7];
                    $telefone=$linha[8];
                }

                // Definir a variável para bloquear o botão Adicionar
                $bloquearAdicionar = true;
                
            } else {
                $mensagem='<p>Morador não encontrado</p>';
            }

        } catch (PDOException $erro) {
            $mensagem=$erro->getMessage();
        }
    }
    // Adicionar novo morador
    elseif (isset($_POST['btoAdicionar'])){

        try {
            $sql = $conn->prepare('
                insert into tab_moradores
                    (nome,rg,cpf,nascimento,apartamento,bloco,email,telefone)
                values
                    (:nome,:rg,:cpf,:nascimento,:apartamento,:bloco,:email,:telefone)
                ');

                $sql->execute(array(
                    ':nome'=>$_POST['txtNome'],
                    ':rg'=>$_POST['txtRg'],
                    ':cpf'=>$_POST['txtCpf'],
                    ':nascimento'=>$_POST['txtNascimento'],
                    ':apartamento'=>$_POST['txtApartamento'],
                    ':bloco'=>$_POST['txtBloco'],
                    ':email'=>$_POST['txtEmail'],
                    ':telefone'=>$_POST['txtTelefone']
                ));

                if ($sql->rowCount() > 0){
                    $mensagem='<p>Morador adicionado com sucesso</p>';
                }

        } catch (PDOException $erro) {
            $mensagem=$erro->getMessage();
        }
    }
    // Atualizar os dados do morador
    elseif (isset($_POST['btoAlterar'])){

        try {
            $sql = $conn->prepare('
                update tab_moradores set
                    nome=:nome,
                    rg=:rg,
                    cpf=:cpf,
                    nascimento=:nascimento,
                    apartamento=:apartamento,
                    bloco=:bloco,
                    email=:email,
                    telefone=:telefone
                    where id=:id
            ');

            $sql->execute(array(
                ':id'=>$_POST['txtPesquisar'],
                ':nome'=>$_POST['txtNome'],
                ':rg'=>$_POST['txtRg'],
                ':cpf'=>$_POST['txtCpf'],
                ':nascimento'=>$_POST['txtNascimento'],
                ':apartamento'=>$_POST['txtApartamento'],
                ':bloco'=>$_POST['txtBloco'],
                ':email'=>$_POST['txtEmail'],
                ':telefone'=>$_POST['txtTelefone']
            ));

            if ($sql->rowCount() > 0){
                $mensagem='<p>Dados alterados com sucesso</p>';
            }

        } catch (PDOException $erro) {
            $mensagem=$erro->getMessage();
        }
    }
    //Excluir todos os dados do morador
    elseif (isset($_POST['btoExcluir'])) {
        
        try {
            $sql = $conn->prepare('delete from tab_moradores where id=:id');

            $sql->execute(array(':id'=>$_POST['txtPesquisar']));

            if ($sql->rowCount() > 0) {
                $mensagem='<p>Dados excluidos com sucesso</p>';
            }

        } catch (PDOException $erro) {
            $mensagem=$erro->getMessage();
        }
    }
    // Limpar todos os campos digitados
    elseif (isset($_POST['btoLimpar'])) {
        
        $nome="";
        $rg="";
        $cpf="";
        $nascimento="";
        $apartamento="";
        $bloco="";
        $email="";
        $telefone="";
        $codigo="";
    }
}
?>