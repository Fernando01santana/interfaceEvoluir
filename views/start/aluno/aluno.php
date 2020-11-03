<?php 
session_start();
include('../../../public/header.php');
if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['pass']) == true))
{
  unset($_SESSION['user']);
  unset($_SESSION['pass']);
  header('location:index.php');
  }
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<link rel="stylesheet" href="style-aluno.css">
<style>
 
</style>
<?php include('../../../public/menu.php');?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-5 area">
          
            <div class="esquerda">
            <div class="container">
            <div class="cabecalho">
              <h1>Seja bem vindo!</h1>
              <h5>Escolha a opção que desejar.</h5>
              
              </div>
              <div class="botoes">
                  <a href="../../data/aluno/informacoes.php"><button class="btn btn-primary"><i class=" icone fas fa-user"></i><br><p> Dados </p></button></a>
                  <a href="../../curriculo/curriculo.php"><button class="btn btn-primary curriculo"><i class=" icone fas fa-edit"></i><br><p>Curriculo</p></button></a>
              </div>
              <div class="botoes">
                  <a href="../../data/aluno/recovery-pass.php"><button class="btn btn-primary curriculo"><i class=" icone fas fa-unlock-alt"></i><br><p>Senha</p></button></a>
                  <a href="../../vagas/vagas.php"><button class="btn btn-primary "><i class="icone fas fa-search"></i><br><p>Vagas</p></button></a>
              </div>
              <div class="exit">
                <a href="../../../index.php"><button class="btn btn-danger icone-exit" ><i class="fas fa-sign-out-alt"></i> Sair</button></a>
              </div>
            </div>
            </div>
        </div>
        <div class="col-md-7 area">
            <div class="direita">
              <div class="imgs">
             
              <img src="icons/imagem.png" id="arts" alt="">
              </div>
              
            </div>
        </div> 
    </div>       
</div> 
<?php include('../../../public/footer.php') ?>