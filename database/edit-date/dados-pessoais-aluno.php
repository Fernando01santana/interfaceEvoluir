<?php 
include('../conection.php');
$nome = $_POST['nome'];
$data = $_POST['data'];
$sexo = $_POST['sexo'];
$estado_civil = $_POST['estado-civil'];
$telefone1 = $_POST['telefone1'];
$telefone2 = $_POST['telefone2'];
$cpf = $_POST['cpf'];



try {
    //$update = mysqli_query($link,"UPDATE alunos SET nome = ´$nome´,data_nascimento = ´´,sexo = '$sexo',estado_civil = '$estado_civil',telefone1 = '$telefone1',telefone2 = '$telefone2' WHERE nome =".$nome);
    //$estado = mysqli_num_rows($update);

$stmt = $pdo->prepare("UPDATE alunos SET nome = :nome,data_nascimento = :datanascimento,sexo = :sexo,estado_civil = :estadocivil,telefone1 = :telefone,telefone2 = :telefone2 WHERE nome = :nome");
$stmt -> bindValue(':nome',$nome);
$stmt -> bindValue(':datanascimento',$data);
$stmt -> bindValue(':sexo',$sexo);
$stmt -> bindValue(':estadocivil',$estado_civil);
$stmt -> bindValue(':telefone',$telefone1);
$stmt -> bindValue(':telefone2',$telefone2);
$stmt -> execute();
$result_query1 = $stmt->rowCount();
header('Location: ../../views/start/aluno.php');
} catch (PDOException $th) {
    echo $th;
}

?>