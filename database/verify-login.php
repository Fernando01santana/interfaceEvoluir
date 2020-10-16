<?php
session_start();
include_once('conection.php'); 
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$stmt = $pdo->prepare("SELECT email,senha,nome FROM alunos WHERE email = :usuario AND senha = :senha");
$stmt -> bindValue(':usuario',$usuario);
$stmt -> bindValue(':senha',$senha);
$stmt -> execute();
$result_query1 = $stmt->rowCount();

$stmt2  = $pdo->prepare("SELECT email,senha FROM escola WHERE email = :usuario AND senha = :senha");
$stmt2 -> bindValue(':usuario',$usuario);
$stmt2 -> bindValue(':senha',$senha);
$stmt2 -> execute();
$result_query2 = $stmt2->rowCount();

$stmt3 = $pdo->prepare("SELECT email,senha FROM empresa WHERE email = :usuario AND senha = :senha");
$stmt3 -> bindValue(':usuario',$usuario);
$stmt3 -> bindValue(':senha',$senha);
$stmt3 -> execute();
$result_query3 = $stmt3->rowCount();

$_SESSION['estate'] = "<div class='alert alert-info' role='alert'>Login ou senha incorretos!</div>";
$_SESSION['user'] = "";
$_SESSION['pass'] = "";

switch ($result_query1) {
    case 1:
        $_SESSION['user'] =$usuario;
        $_SESSION['pass'] = $senha;
        header('location: ../views/start/aluno/aluno.php');
        break;
    case 0:
        switch ($result_query2) {
            case 1:
                 $_SESSION['user'] = $usuario;
                 $_SESSION['pass'] = $senha;
                 header('location: ../views/start/escola/escola.php');
             break;
            case 0:
             switch ($result_query3) {
                case 1:
                     $_SESSION['user'] =$usuario;
                     $_SESSION['pass'] = $senha;
                     
                     header('location: ../views/start/empresa/empresa.php');
                break;
                case 0:
                    
                        header('location: ../views/login/index.php');
                     break;
             }
        }
        break;

    }

?>