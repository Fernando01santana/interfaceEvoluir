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
                <div class="col-12">
                <?php 
                if(isset($_SESSION['status'])){
                    echo $_SESSION['status'];
                }
                ?>
                </div>
                <?php 
                try {
                    $stmt = $pdo->prepare("SELECT * FROM vagas");
                    $stmt->execute();
                    
                    while ($row_message_acount = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $o = 0;
                        $requisitos = json_decode($row_message_acount['requisitos']);
                       
                        echo '<div class="vagas"><form action="dados_vagas.php" method="POST"><div class="row"><div class="col-12"><h2>'.$row_message_acount['empresa'].'</h2></div></div><div class="row"><div class="col-12"><label for="area">Descrição da vaga:</label><p class="descricao">'.$row_message_acount['descricao'].'</p></div></div><div class="row"><div class="col-6"><label for="">Requisitos:</label><ul><li>';
                        
                        while($o < count($requisitos)){
                            echo $requisitos[$o++].'<br>';
                        }
                        
                        echo '</li></ul></div><div class="col-6"><label for="">Idade exigida:</label><p>'.$row_message_acount['idade'].'anos</p></div></div><div class="row"><div class="col-6"><label for="">Tipo da vaga:</label><p>'.$row_message_acount['tipo'].'</p></div></div><div class="row"><div class="col-6"><label for="">Remuneração:</label><p>'.$row_message_acount['salario'].'</p></div><div class="col-6"><label for="">Contato:</label><p>'.$row_message_acount['contato'].'</p></div></div>
                        <div class="row"><div class="col-12">
                        <input type="hidden" class="form-control id" name="id_vaga" id="" value="'.$row_message_acount['id'].'">
                        </div></div>
                        <div class="row"><div class="col-12"><input type="submit" class="btn btn-success btn-block" value="me candidatar!"></div></div></form></div>';
                    
                    }
               } catch (PDOException $th) {
                    echo $th;
                }
                ?>
                
                
            </div>
        </div>  
    </div>
</div>
<?php include('../../public/footer.php') ?>