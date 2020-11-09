<?php
include('database/conection.php');
session_start();
$usuario = $_SESSION['user'];

$query = $pdo->prepare("SELECT * FROM curriculos WHERE id_aluno = :id");
$query->bindValue(':id', $usuario);
$query->execute();
$dados = $query->fetchAll();

$query2 = $pdo->prepare("SELECT * FROM alunos WHERE id = :id");
$query2->bindValue(':id', $usuario);
$query2->execute();
$dados2 = $query2->fetchAll();
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
    </style>
</head>
<body>
    <h3><?php echo $dados2[0]['nome']?></h3>
    <p></p>

    <h3>Escolaridade:</h3>

    <ul>
        <li><b>Nível de Ensino: $</b>
            <ul>
                <li>Entidade: $</li>
                <li>Estado: $</li>
                <li>Ano de Conclusão: $</li>
                <li>Período: $</li>
            </ul>
        </li>
    </ul>

    <h3>Idioma:</h3>

    <ul>
        <li><b>$idioma</b>
            <ul>
                <li>Nível de Fluência: $</li>
            </ul>
        </li>
    </ul>

    <h3>Conhecimentos:</h3>

    <ul>
        <li><b>Curso: $</b>
            <ul>
                <li>Entidade: $</li>
                <li>Data de Início: $</li>
                <li>Data de Término: $</li>
            </ul>
        </li>
    </ul>

    <h3>Experiência Profissional:</h3>

    <ul>
        <li><b>Empresa: $</b>
            <ul>
                <li>Cargo: $</li>
                <li>Data de Início: $</li>
                <li>Data de Término: $</li>
            </ul>
        </li>
    </ul>
</body>
</html>