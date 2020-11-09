<?php include('public/header.php') ?>
<?php 
if((isset($_SESSION['user']) == true) and (isset($_SESSION['pass']) == true))
{
  unset($_SESSION['user']);
  unset($_SESSION['pass']);
}
?>
<style>
.butons{
    align-items:center;
}
</style>
<div class="container-fluid bd-dark">

    <div class="row">
        <div class="col-md-5 area">
            <div class="esquerda">
                <nav class="navbar navbar-expand-lg navbar-dark bd-dark">
                    <a class="navbar-brand " href="#"><img class="logo" src="views/cad/img/logotipo.png" alt=""></a>
                </nav>
                <div class="apresentacao">
                    <h1 align="center" class="color-white3">Seja bem vindo!</h1>
                    <h4 class="color-white" align="center">Se você ainda não tem login,  cadastre-se primeiro</h4>
                    <a href="views/login/"><button class=" btn-white"><b>Entrar</b></button></a>
                </div>
                <img src="views/cad/img/1.svg" class="img-esquerda" alt="">
                <h4 class="color-white4" align="center">Se você ainda não tem login,  cadastre-se primeiro</h4>
            </div>
            
        </div>
        <div class="col-md-7 area">
            <div class="direita">
               <div class="apresentacao2">
                   <h1 align="center" class="color-blue">Crie já sua conta!</h1>
                   <img src="views/cad/img/2.svg" class="img-direito" alt="">
               </div>
               
               <div class="butons" align=center>
                    <button class=""><a href="views/cad/aluno.php"><img src="views/cad/img/aluno2.png" alt=""><b><h5>Aluno</h5></b></button></a>
                    <button class=""><a href="views/cad/empresa.php"><img src="views/cad/img/empresa.png" alt=""><b><h5>Empresa</h5></b></a> </button>
               </div>
               <div class="seguimento" align=center>
                   <h5 align=center class="titulo">Escolha qual seu seguimento</h5>
               </div>
            </div>
        </div>
    </div>

</div>
<?php include('public/footer.php') ?>