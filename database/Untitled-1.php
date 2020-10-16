<?php
session_start();
include_once('conection.php'); 
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$senha_full = md5($senha);



$query_1 = mysqli_query($link,"SELECT email,senha,nome FROM alunos WHERE email = '$usuario' AND senha = '$senha'");
$result_query1 = mysqli_num_rows($query_1);
echo $result_query1;

$dadosAluno = mysqli_fetch_array($query_1);
//echo $dados['nome'];

$query_2 = mysqli_query($link,"SELECT email,senha FROM escola WHERE email = '$usuario' AND senha= '$senha'");
$result_query2 = mysqli_num_rows($query_2);

$query_3 = mysqli_query($link,"SELECT email,senha FROM empresa WHERE email = '$usuario' AND senha= '$senha'");
$result_query3 = mysqli_num_rows($query_3);

$_SESSION['user'] = "";
$_SESSION['pass'] = "";
if($result_query1 > 0){
    $_SESSION['user'] = $dadosAluno['nome'];
    $_SESSION['pass'] = $senha;
    header('location: ../views/start/aluno.php');
}else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location: ../index.php');
    }

if($result_query2 > 0){
    $_SESSION['login'] = $usuario;
    $_SESSION['senha'] = $senha;
    
    //header('Location: ../views/start/escolas.php');
}else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    //header('location: ../index.php');
    }

if($result_query3 > 0){
    $_SESSION['login'] = $usuario;
    $_SESSION['senha'] = $senha;
    header('Location: ../views/start/empresa.php');
}else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    //header('location: ../index.php');
    }
?>