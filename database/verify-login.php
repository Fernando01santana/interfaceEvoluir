<?php
session_start();
include_once('conection.php');

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$stmt = $pdo->prepare("SELECT email,senha,nome FROM alunos WHERE email = :usuario AND senha = :senha");
$stmt->bindValue(':usuario', $usuario);
$stmt->bindValue(':senha', $senha);
$stmt->execute();
$result_query1 = $stmt->rowCount();

$stmt3 = $pdo->prepare("SELECT email,senha FROM empresa WHERE email = :usuario AND senha = :senha");
$stmt3->bindValue(':usuario', $usuario);
$stmt3->bindValue(':senha', $senha);
$stmt3->execute();
 $result_query3 = $stmt3->rowCount();

$_SESSION['estate'] = "<div class='alert alert-info' role='alert'>Login ou senha incorretos!</div>";
$_SESSION['user'] = "";
$_SESSION['pass'] = "";

//verifica os usuarios
 function verifica($usuario,$senha,$result_query1,$result_query3){
    if($result_query1 === 1){
        $_SESSION['user'] = $usuario;
        $_SESSION['pass'] = $senha;
        header('location: ../views/start/aluno/aluno.php');
    } elseif($result_query3 === 1){
        $_SESSION['user'] = $usuario;
        $_SESSION['pass'] = $senha;
        header('location: ../views/start/empresa/empresa.php');
    }elseif($usuario === 'teste' && $senha === '123'){
        $_SESSION['user'] = $usuario;
        $_SESSION['pass'] = $senha;
        header('location: ../views/Dashboard/');
    }else{
        header('location: ../views/login/');
    }
 };

 verifica($usuario,$senha,$result_query1,$result_query3);