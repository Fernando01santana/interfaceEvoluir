<?php
session_start();
include('../conection.php');

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$estado_civil = $_POST['estado-civil'];
$data_nascimento = $_POST['data'];
$telefone1 = $_POST['telefone1'];
$telefone2 = $_POST['telefone2'];
$nacionalidade = $_POST['nacionalidade'];
$usuario = $_SESSION['user'];
echo $usuario;

$query = $pdo->prepare("SELECT id FROM alunos WHERE email = :email");
$query->bindValue(':email',$usuario);
$query->execute();
$dados_aluno = $query->fetchAll();
$id_aluno = $dados_aluno[0]['id'];

echo $id_aluno;
try {
    $stmt = $pdo->prepare("UPDATE alunos SET nome = :nome,sexo = :sexo,data_nascimento = :data_nascimento,estado_civil =:estado_civil,telefone1 = :telefone1,telefone2 = :telefone2,nacionalidade=:nacionalidade  WHERE id = :usuario");
    $stmt->bindValue(':nome',$nome);
    $stmt->bindValue(':sexo',$sexo);
    $stmt->bindValue(':data_nascimento',$data_nascimento);
    $stmt->bindValue(':estado_civil',$estado_civil);
    $stmt->bindValue(':telefone1',$telefone1);
    $stmt->bindValue(':telefone2',$telefone2);
    $stmt->bindValue(':nacionalidade',$nacionalidade);
    $stmt->bindValue(':usuario',$id_aluno);
    $stmt->execute();

    $_SESSION['state'] = '<div class="alert alert-success" role="alert">Dados atualizados com sucesso!</div>';
    header('Location: ../../views/data/aluno/informacoes.php');
} catch (\Throwable $th) {
    echo $th->getMessage();
    $_SESSION['state'] = '<div class="alert alert-danger" role="alert">Erro ao atualizar dados!</div>';
    header('Location: ../../views/data/aluno/informacoes.php');
}
?>

