<?php include("../../database/conection.php"); ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
<?php include('menu.php');?>
<link rel="stylesheet" href="estilo.css">
<div class="container">
    <div class="row">
        <div class="col-md-12 area">
            <div class="esquerda">
                <div class="titulo-vagas"><h3>Vagas disponiveis:</h3></div>
                <?php 
                try {
                    $stmt = $pdo->prepare("SELECT * FROM vagas");
                    $stmt->execute();
                   
                    while ($row_message_acount = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="vagas">'.$row_message_acount['id'].'</div>';
                    }
                    //var_dump($retorno);
                } catch (PDOException $th) {
                    echo $th;
                }
                ?>
                
            </div>
        </div>  
    </div>
</div>
<?php include('../../public/footer.php') ?>