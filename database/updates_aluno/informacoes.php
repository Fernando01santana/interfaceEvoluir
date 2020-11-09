<?php
session_start();
include('../conection.php');
var_dump($_POST);
$usuario = $_SESSION['user'];
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$estado_civil = $_POST['estado_civil'];
$data_nascimento = $_POST['data_nascimento'];

$telefone1 = $_POST['telefone1'];
$telefone2 = $_POST['telefone2'];
$_SESSION['cpf'] = $cpf;
try {
    $stmt = $pdo->prepare("UPDATE alunos SET id = :id,nome = :nome,sexo = :sexo,data_nascimento = :data_nascimento,estado_civil = :estado_civil,telefone1 = :telefone1,telefone2 = :telefone2 WHERE id = :id_aluno");
    $stmt->bindValue(':id',null);
    $stmt->bindValue(':nome',$nome);
    $stmt->bindValue(':sexo',$sexo);
    $stmt->bindValue(':data_nascimento',$data_nascimento);
    $stmt->bindValue(':estado_civil',$estado_civil);
    $stmt->bindValue(':telefone1',$telefone1);
    $stmt->bindValue(':telefone2',$telefone2);
    $stmt->bindValue(':id_aluno',$usuario);
    $stmt->execute();
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>

