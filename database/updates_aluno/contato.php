<?php
include('../conection.php');


$rua = $_POST['rua'];
$telefone1 = $_POST['telefone1'];
$telefone2 = $_POST['telefone2'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$conf_senha = $_POST['conf_senha'];
$cpf = $_POST['cpf'];

try {
    $stmt = $pdo->prepare("UPDATE alunos SET id = :id, rua = :rua, telefone1 = :telefone1, telefone2 = :telefone2,email = :email, senha = :senha WHERE cpf = :cpf");
    $stmt->bindValue(':id',null);
    $stmt->bindValue(':rua',$rua);
    $stmt->bindValue(':telefone1',$telefone1);
    $stmt->bindValue(':telefone2',$telefone2);
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':senha',$senha);
    $stmt->bindValue(':cpf',$cpf);
    $stmt->execute();
} catch (\Throwable $th) {
    echo $th->getMessage();
}

?>

