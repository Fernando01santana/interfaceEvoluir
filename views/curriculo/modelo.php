<?php
include('database/conection.php');
session_start();
$usuario = $_SESSION['user'];

$query2 = $pdo->prepare("SELECT * FROM alunos WHERE email = :email");
$query2->bindValue(':email', $usuario);
$query2->execute();
$dados2 = $query2->fetchAll();

$query = $pdo->prepare("SELECT * FROM curriculos WHERE id_aluno = :id");
$query->bindValue(':id', $dados2[0]['id']);
$query->execute();
$dados = $query->fetchAll();


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        @font-face{
            font-family:kelp:
            src:url('fonts/keep.ttf')
        }
        body{
            
        }
        h3{
            font-family:kelp;
        }
        ul { list-style-type: none; }
        ol { list-style-type: none; }
        li { list-style-type: none; }
    </style>
  </head>
  <body>
    <div class="content">
        <div class="row">
            <div class="col-3">
                <ul>
                    <li><h3><?php echo $dados2[0]['nome'];?></h3></li>   
                    <li><?php echo $dados2[0]['nacionalidade'];?></li>
                    <li><?php echo $dados2[0]['rua']." ,".$dados2[0]['numero'].", ".$dados2[0]['bairro'];?></li>
                    <li><?php echo $dados2[0]['cidade']." - ".$dados2[0]['estado'];?></li>
                    <li><?php echo "Telefone: ".$dados2[0]['telefone1']." / ".$dados2[0]['telefone2'];?></li>
                    <li>E-mail: <?php echo $dados2[0]['email'];?></li>
                    
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul>
                    <li>
                    <h3>PERFIL PROFISSIONAL E HABILIDADES</h3>
                    <li><p><?php echo $dados[0]['objetivo']?></p></li>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul>
                    <li>
                    <h3>FORMAÇÃO</h3>
                    <li><b><?php echo $dados[0]['nivel']."- conclusão em </b>".$dados[0]['ano_conclusao']?></li>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul>
                    <li>
                    <h3>Cursos:</h3>
                    <?php $cursos = json_decode($dados[0]['curso']);
                          $entidade = json_decode($dados[0]['entidade_curso']);
                          $tamanho = count($cursos);
                          $data_inicio_curso = json_decode($dados[0]['data_inicio_curso']);
                          $data_termino_curso = json_decode($dados[0]['data_termino_curso']);
                          for($i = 0;$i < $tamanho;$i++){
                    ?>
                    <li><?php echo $cursos[$i]." - ".$entidade[$i];?></li>
                    <li>Periodo: <?php echo $data_inicio_curso[0]." - ".$data_termino_curso[0];?></li>
                    <?php }  ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul>
                    <li>
                    <h3>Experiencia profissional:</h3>
                    
                    <?php $empresa = json_decode($dados[0]['empresa']);
                   
                          $cargo = json_decode($dados[0]['cargo']);
                          $tamanho_empresa = count($empresa);
                          $data_inicio_empresa = json_decode($dados[0]['data_inicio_empresa']);
                          $data_termino_empresa = json_decode($dados[0]['data_termino_empresa']);
                          for($i = 0;$i < $tamanho_empresa;$i++){
                    ?>
                    <li><?php echo $empresa[$i]." - ".$cargo[$i];?></li>
                    <li>Periodo: <?php echo $data_inicio_empresa[0]." - ".$data_termino_empresa[0];?></li>
                    <?php }  ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  </body>
</html>
