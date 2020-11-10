<?php

session_start();
$_SESSION['result'] =  "<div class='alert alert-primary' role='alert'>Usuario cadastrado com sucesso!</div>";
include('conection.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$data_nascimento = $_POST['data_nascimento'];
$estado_civil = $_POST['estado-civil'];
$cep = $_POST['cep'];
$estado = $_POST['estado'];
$cidade =  $_POST['cidade'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$email = $_POST['email'];
$telefone1 = $_POST['tel1'];
$telefone2 = $_POST['tel2'];
$senha = $_POST['senha'];
$conf_senha = $_POST['conf-senha'];
$nacionalidade = $_POST['nacionalidade'];
//$cpfmd5 = md5($cpf);
$state = 0;
try {
        $stmt = $pdo->prepare("SELECT * FROM alunos WHERE email = :email");
        $stmt->bindParam(':email',$email);
        if ($stmt->execute()) {
            if($senha === $conf_senha){
                if ($stmt->rowCount() > 0) {
                    $_SESSION['result'] =  "<div class='alert alert-primary' role='alert'>E-mail já cadastrado!</div>";
                    header('Location: ../views/cad/aluno.php');
                } else {
                    try {
                        $stmt2 = $pdo->prepare("INSERT INTO alunos(id,nome,senha,sexo,data_nascimento,estado,estado_civil,cidade,rua,numero,bairro,email,telefone1,telefone2,cep,nacionalidade) VALUES(:id,:nome,:senha,:sexo,:data_nascimento,:estado,:estado_civil,:cidade,:rua,:numero,:bairro,:email,:telefone1,:telefone2,:cep,:nacionalidade)");
                        $stmt2->bindValue(':id',null);
                        $stmt2->bindValue(':nome',$nome);
                        $stmt2->bindValue(':senha',$senha);
                        $stmt2->bindValue(':sexo',$sexo);
                        $stmt2->bindValue(':data_nascimento',$data_nascimento);
                        $stmt2->bindValue(':estado',$estado);
                        $stmt2->bindValue(':estado_civil',$estado_civil);
                        $stmt2->bindValue(':cidade',$cidade);
                        $stmt2->bindValue(':rua',$rua);
                        $stmt2->bindValue(':numero',$numero);
                        $stmt2->bindValue(':bairro',$bairro);
                        $stmt2->bindValue(':email',$email);
                        $stmt2->bindValue(':telefone1',$telefone1);
                        $stmt2->bindValue(':telefone2',$telefone2);
                        $stmt2->bindValue(':cep',$cep);
                        $stmt2->bindValue(':nacionalidade',$nacionalidade);
                        $stmt2->execute();
                        $_SESSION['result'] =  "<div class='alert alert-success' role='alert'>Usuario cadastrado com sucesso!</div>";
                        header('Location: ../views/login/index.php');
                    } catch (\Throwable $th) {
                        echo $th->getMessage();
                    }
                }
            }else{
                $_SESSION['result'] =  "<div class='alert alert-warning' role='alert'>Os camposs senhas tem que ter o mesmo valor!</div>";
                header('Location: ../views/cad/aluno.php');
            }
        } else {
               throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}
/*
$stmt = $pdo->prepare("SELECT * FROM alunos WHERE nome= :nome");
$stmt->execute(['nome' => $nome]);
$result = mysqli_num_rows($stmt);


$verifica_email = $pdo->prepare("SELECT * FROM alunos WHERE `email`=:email");
$stmt->execute(['email' => $email]);
$result_email = mysqli_num_rows($stmt);
echo $result_email;

if ($result_email > 0) {
    
}else{
    if($senha === $conf_senha){
        if($result > 0){
            $_SESSION['result'] =  "<div class='alert alert-danger' role='alert'>Usuario já existente!</div>";
            header('Location: ../views/cad/aluno.php');
        }else{
            try {
                $query = mysqli_query($link,"INSERT INTO alunos(id,nome,senha,sexo,cpf,data_nascimento,estado,estado_civil,cidade,rua,numero,bairro,email,telefone1,telefone2) VALUES(null,'$nome','$senha','$sexo','$cpfmd5','$data_nascimento','$estado','$estado_civil','$cidade','$rua','$numero','$bairro','$email','$telefone1','$telefone2')");
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
            $_SESSION['result'] =  "<div class='alert alert-success' role='alert'>Usuario cadastrado com sucesso!</div>";
            header('Location: ../views/login/index.php');
        }
        }else{
        $_SESSION['result'] =  "<div class='alert alert-warning' role='alert'>Os camposs senhas tem que ter o mesmo valor!</div>";
        header('Location: ../views/cad/aluno.php');
        }
}
*/
?>