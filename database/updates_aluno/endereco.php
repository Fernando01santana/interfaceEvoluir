<?php
include('../conection.php');

$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$cpf = $_POST['cpf'];

try {
    $stmt = $pdo->prepare("UPDATE alunos SET id = :id, cep = :cep, cidade = :cidade, estado = :estado,rua = :rua, bairro = :bairro, numero = :numero WHERE cpf = :cpf");
    $stmt->bindValue(':id',null);
    $stmt->bindValue(':cep',$cep);
    $stmt->bindValue(':cidade',$cidade);
    $stmt->bindValue(':estado',$estado);
    $stmt->bindValue(':rua',$rua);
    $stmt->bindValue(':bairro',$bairro);
    $stmt->bindValue(':numero',$numero);
    $stmt->bindValue(':cpf',$cpf);
    $stmt->execute();
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>

