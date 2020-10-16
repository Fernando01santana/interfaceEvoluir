<?php
session_start();
$_SESSION['conf-dados'] =  "<div class='alert alert-primary' role='alert'>Usuario cadastrado com sucesso!</div>";
include('conection.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$nome = $_POST['nome'];
$nivel_instituicao = $_POST['nivel_instituicao'];
$curso_autorizado = $_POST['curso-autorizado'];
$tipo_escola = $_POST['tipo_escola'];
$nome_contato = $_POST['nome_contato'];
$departamento = $_POST['departamento'];
$contato_tipo = $_POST['contato_tipo'];
$DDD = $_POST['DDD'];
$bairro = $_POST['bairro'];
$cargo_contato = $_POST['cargo-contato'];
$email = $_POST['email_contato'];
$fone = $_POST['fone'];
$ramal = $_POST['ramal'];
$senha = $_POST['senha'];
$conf_senha = $_POST['conf-senha'];

//verifica se o nome da escola ja esta cadastrado
try {
    $stmt = $pdo->prepare("SELECT * FROM escola WHERE nome_instituicao = :nome");
    $stmt->bindValue(':nome',$nome);
    $stmt->execute();
} catch (PDOException $th) {
    echo $th;
}

try {
    $stmt_email = $pdo->prepare("SELECT * FROM escola WHERE email = :email");
    $stmt_email->bindValue(':email',$email);
    $stmt_email->execute();
} catch (PDOException $thEmail) {
    echo $thEmail;
}


if ($stmt_email->rowCount() > 0){
    $_SESSION['conf-dados'] =  "<div class='alert alert-primary' role='alert'>E-mail já cadastrado!</div>";
    header('Location: ../views/cad/escola.php');
}else{
    if($senha === $conf_senha){
        if($stmt->rowCount() > 0){
            $_SESSION['conf-dados'] =  "<div class='alert alert-danger' role='alert'>Usuario já existente!</div>";
            header('Location: ../views/cad/escola.php');
        }else{
            try {
                $stmt_cad = $pdo->prepare("INSERT INTO escola(id,nome_instituicao,nivel_instituicao,curso_autorizado,tipo,nome_contato,departamento,tipo_contato,ddd,bairro,cargo_contato,email,fone,ramal,senha) VALUES(:id,:nome,:nivel_instituicao,:curso_autorizado,:tipo_escola,:nome_contato,:departamento,:contato_tipo,:DDD,:bairro,:cargo_contato,:email,:fone,:ramal,:senha)");
                $stmt_cad -> bindValue(':id',null);
                $stmt_cad -> bindValue(':nome',$nome);
                $stmt_cad -> bindValue(':nivel_instituicao',$nivel_instituicao);
                $stmt_cad -> bindValue(':curso_autorizado',$curso_autorizado);
                $stmt_cad -> bindValue(':tipo_escola',$tipo_escola);
                $stmt_cad -> bindValue(':nome_contato',$nome_contato);
                $stmt_cad -> bindValue(':departamento',$departamento);
                $stmt_cad -> bindValue(':contato_tipo',$contato_tipo);
                $stmt_cad -> bindValue(':DDD',$DDD);
                $stmt_cad -> bindValue(':bairro',$bairro);
                $stmt_cad -> bindValue(':cargo_contato',$cargo_contato);
                $stmt_cad -> bindValue(':email',$email);
                $stmt_cad -> bindValue(':fone',$fone);
                $stmt_cad -> bindValue(':ramal',$ramal);
                $stmt_cad -> bindValue(':senha',$senha);
                $stmt_cad -> execute();
                $_SESSION['conf-dados'] =  "<div class='alert alert-success' role='alert'>Usuario cadastrado com sucesso!</div>";
                header('Location: ../views/cad/escola.php');
               
            } catch (PDOException $th) {
                echo $th->getMessage();
            }

        }
        }else{
        $_SESSION['conf-dados'] =  "<div class='alert alert-warning' role='alert'>Os campos senhas tem que ter o mesmo valor!</div>";
        header('Location: ../views/cad/escola.php');
        }
}
?>