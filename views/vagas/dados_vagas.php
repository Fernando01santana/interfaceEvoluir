<?php 
include('../../database/conection.php');
session_start();
$user = $_SESSION['user'];
$_SESSION['status']='';
$id_vaga = $_POST['id_vaga'];
echo $id_vaga;
try {
$stmt1 = $pdo->prepare("SELECT id FROM alunos WHERE email = :user");
$stmt1->bindValue(':user',$user);
$stmt1->execute();
$dado_usuario = $stmt1->fetchAll();
$id_usuario = $dado_usuario[0]['id'];
echo $id_usuario;
$stmt = $pdo->prepare("INSERT INTO `candidato` (`id_vaga`, `id_aluno`) VALUES (:id_vaga, :id_aluno);");
$stmt->bindValue(':id_vaga',$id_vaga);
$stmt->bindValue(':id_aluno',$id_usuario);
$stmt->execute();
$_SESSION['status'] = '<div class="alert alert-success" role="alert">Candidato atribuido com sucesso!!</div>';
header('Location:vagas.php');
} catch (PDOException $th) {
    $_SESSION['status'] = '<div class="alert alert-danger" role="alert">erro:'.$th.'</div>';
    header('Location:vagas.php');
}
?>