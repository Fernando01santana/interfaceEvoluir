<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo.css">

    <div class="container-fluid bd-dark">

<div class="row">
    <div class="col-md-5 area">
        <div class="esquerda">
        <div class="titulo">
                    <h4 align="center" class="welcome">WELCOMME</h4>
               </div>
               <div class="campos">
                   <form action="../../database/verify-login.php" method="POST">
                   <input type="text" class="form-control input" name="usuario" placeholder="email:">
                   <input type="password" class="form-control input" name="senha" placeholder="senha:">
                   <p><a href="">esqueceu sua senha?</a></p>
                   <button class="btn btn-blackBlue btn-block" ><h4>Entrar</h4></button>
                   <a href="../../index.php"><img src="../cad/img/logotipo.png" alt=""></a>
                   </form>
               </div>
        </div>
    </div>
    <div class="col-md-7 area">
        <div class="direita">
            <a href="../../index.php"><img src="img/login.svg" alt=""></a>
    </div>
</div>

</div>