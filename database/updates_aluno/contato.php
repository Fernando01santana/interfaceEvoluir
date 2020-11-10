<?php
include('../conection.php');
session_start();
$usuario = $_SESSION['user'];
$_SESSION['state'] = '';
$rua = $_POST['rua'];
$telefone1 = $_POST['telefone1'];
$telefone2 = $_POST['telefone2'];
$email = $_POST['email'];
$senha = $_POST['senha1'];
$conf_senha = $_POST['senha2'];

$query = $pdo->prepare("SELECT id FROM alunos WHERE email = :email");
$query->bindValue(':email',$usuario);
$query->execute();
$dados_aluno = $query->fetchAll();
$id_aluno = $dados_aluno[0]['id'];
$senhaFinal = '';
if($senha === $conf_senha){
    $senhaFinal = $senha;
    try {
        $stmt = $pdo->prepare("UPDATE alunos SET  rua = :rua, telefone1 = :telefone1, telefone2 = :telefone2,email = :email, senha = :senha WHERE id = :id_aluno");
        
        $stmt->bindValue(':rua',$rua);
        $stmt->bindValue(':telefone1',$telefone1);
        $stmt->bindValue(':telefone2',$telefone2);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':senha',$senhaFinal);
        $stmt->bindValue(':id_aluno',$id_aluno);
        $stmt->execute();
        $_SESSION['state'] = '<div class="alert alert-success" role="alert">Dados atualizados com sucesso!</div>';
        header('Location: ../../views/data/aluno/informacoes.php');
    } catch (\Throwable $th) {
        $_SESSION['state'] = '<div class="alert alert-danger" role="alert">Erro ao atualziar dados!</div>';
        echo $th->getMessage();
    }
}else{
    $_SESSION['state'] = '<div class="alert alert-danger" role="alert">As senhas devem ter o mesmo formato! vá ate a aba contato para corrigir os dados informados!</div>';
    header('Location: ../../views/data/aluno/informacoes.php');
}


?>

