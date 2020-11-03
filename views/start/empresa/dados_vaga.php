<?php 
include("../../../database/conection.php");
session_start();
$user = $_SESSION['user'];
$_SESSION['msgVaga'] = '';
try {
        //pegando dados do formulário de Vagas
        $nome_vaga = $_POST['nome_vaga'];
        $descricao = $_POST['descricao'];
        $idade = $_POST['idade'];
        $horario = $_POST['horario'];
        $tipo_vaga = $_POST['tipo_vaga'];
        $salario = $_POST['salario'];
        $nome_emp = $_POST['nome_emp'];
        $contato = $_POST['contato'];
        $requisitos_bruto = $_POST['requisitos'];
        $requisitos_txt = json_encode($requisitos_bruto);
        //pegar id da empresa e inserir no campo de chave estrangeira na tabela vagas
        $busca = $pdo->prepare("SELECT id FROM `empresa` WHERE email = :email");
        $busca->bindValue(':email',$user);
        $busca->execute();
        $array_empresa = $busca->fetchAll();
        $id_empresa = $array_empresa[0]['id'];

        //enviando os dados para a tabela VAGAS
        $stmt = $pdo->prepare("INSERT INTO `vagas`(`id_empresa`,`nome`, `descricao`, `idade`, `horario`, `tipo`, `salario`, `empresa`, `contato`,`requisitos`) VALUES (:id_empresa,:nome_vaga, :descricao, :idade, :horario, :tipo_vaga, :salario, :empresa, :contato,:requisitos)");

        $stmt->bindValue(':id_empresa', $id_empresa);
        $stmt->bindValue(':nome_vaga', $nome_vaga);
        $stmt->bindValue(':descricao', $descricao);
        $stmt->bindValue(':idade', $idade);
        $stmt->bindValue(':horario', $horario);
        $stmt->bindValue(':tipo_vaga', $tipo_vaga);
        $stmt->bindValue(':salario', $salario);
        $stmt->bindValue(':empresa', $nome_emp);
        $stmt->bindValue(':contato', $contato);
        $stmt->bindValue(':requisitos', $requisitos_txt);
        $stmt->execute();
        $_SESSION['msgVaga'] = "<div class='alert alert-success' role='alert'>Vaga cadastrada com sucesso!!</div>";
        header('Location: empresa.php');
} catch (PDOException $th) {
        $_SESSION['msgVaga'] = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar vaga!!</div>";
        header('Location: empresa.php');
     }
?>