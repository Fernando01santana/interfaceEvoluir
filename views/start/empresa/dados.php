<?php
include("../../../database/conection.php");
session_start();
$user = $_SESSION['user'];
$_SESSION['msg'] = '';
//pegando dados do formulário de Dados da Empresa
$nome = $_POST['nome_empresa'];
$cnpj = $_POST['cnpj'];
$estado = $_POST['estado'];
$objetivo = $_POST['objetivo'];
$tipo = $_POST['tipo_empresa'];


try{
    //enviando os dados para a tabela EMPRESA
    $stmt = $pdo->prepare("UPDATE `empresa` SET `nome` = :nome, `cnpj` = :cnpj, `estado` = :estado, `objetivo` = :objetivo, `tipo_empresa` = :tipo_empresa WHERE email = :user");

    $stmt->bindValue(':nome',$nome);
    $stmt->bindValue(':cnpj',$cnpj);
    $stmt->bindValue(':estado',$estado);
    $stmt->bindValue(':objetivo',$objetivo);
    $stmt->bindValue(':tipo_empresa',$tipo);
    $stmt->bindValue(':user',$user);
    $stmt->execute();
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Informações atualizadas com sucesso!!</div>";
    header('Location: empresa.php');
} catch (\Throwable $th) {
    echo $th->getMessage();
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Erro:".$th."</div>";
    header('Location: empresa.php');
}
?>