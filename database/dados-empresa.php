<?php
session_start();
//$_SESSION['empresa-dados'] =  "<div class='alert alert-primary' role='alert'>Usuario cadastrado com sucesso!</div>";
include('conection.php');

$tipo = $_POST['tipoPessoa'];
$cnpj = $_POST['cnpj'];
$estado = $_POST['uf'];
$objetivo = $_POST['obj'];
$tipo_empresa = $_POST['tipo_empresa'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$conf_senha = $_POST['conf-senha'];
$email = $_POST['email'];

try {
    //verifica se o cnpj foi cadastrada
    $stmt_email = $pdo->prepare("SELECT cnpj FROM empresa WHERE cnpj =:cnpj");
    $stmt_email -> bindValue(':cnpj',$cnpj);
    $stmt_email->execute();
} catch (PDOException $Error) {
    echo $Error;
}

if ($stmt_email->rowCount() > 0){
    //$_SESSION['empresa-dados'] =  "<div class='alert alert-primary' role='alert'>CNPJ já cadastrado!</div>";
    //header('Location: ../views/cad/empresa.php');
    }else{
        if($senha === $conf_senha){
            try {
                //echo "Entrou no try";
                $query = $pdo->prepare("INSERT INTO empresa(nome,tipoPessoa,cnpj,estado,objetivo,tipo_empresa,senha,email) VALUES(:nome,:tipoPessoa,:cnpj,:estado,:objetivo,:tipo_empresa,:senha,:email)");
               
                $query -> bindValue(':nome',$nome);
                $query -> bindValue(':tipoPessoa',$tipo);
                $query -> bindValue(':cnpj',$cnpj);
                $query -> bindValue(':estado',$estado);
                $query -> bindValue(':objetivo',$objetivo);
                $query -> bindValue(':tipo_empresa',$tipo_empresa);
                $query -> bindValue(':senha',$senha);
                $query -> bindValue(':email',$email);
                $query->execute();
                //$_SESSION['empresa-dados'] =  "<div class='alert alert-success' role='alert'>Usuario cadastrado com sucesso!</div>";
                //header('Location: ../views/cad/empresa.php');
                } catch (PDOException $th) {
                echo $th->getMessage();
                }
            }else{
                //$_SESSION['empresa-dados'] =  "<div class='alert alert-warning' role='alert'>Os campos senhas tem que ter o mesmo valor!</div>";
                //header('Location: ../views/cad/empresa.php');
            };
}
?>