<?php
include('../conection.php');
session_start();
$usuario = $_SESSION['user'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];

echo $cep,$cidade,$estado,$rua,$bairro,$numero;


try {
    $query = $pdo->prepare("SELECT id FROM alunos WHERE email = :email");
    $query->bindValue(':email',$usuario);
    $query->execute();
    $dados_aluno = $query->fetchAll();
    $id_aluno = $dados_aluno[0]['id'];

    echo $id_aluno;

    $stmt = $pdo->prepare("UPDATE alunos SET  cep = :cep, cidade = :cidade, estado = :estado,rua = :rua, bairro = :bairro, numero = :numero WHERE id = :id_user");
    $stmt->bindValue(':cep',$cep);
    $stmt->bindValue(':cidade',$cidade);
    $stmt->bindValue(':estado',$estado);
    $stmt->bindValue(':rua',$rua);
    $stmt->bindValue(':bairro',$bairro);
    $stmt->bindValue(':numero',$numero);
    $stmt->bindValue(':id_user',$id_aluno);
    $stmt->execute();
    $_SESSION['state'] = '<div class="alert alert-success" role="alert">Dados atualizados com sucesso!</div>';
    header('Location: ../../views/data/aluno/informacoes.php');
} catch (Exception $th) {
    echo $th->getMessage();
    $_SESSION['state'] = '<div class="alert alert-danger" role="alert">Erro ao atualizar dados!</div>';
    header('Location: ../../views/data/aluno/informacoes.php');
}
?>

