<?php
include('../conection.php');
session_start();
//escolaridade
$nivel_escola = $_POST['nivel_escola'];
$instituicao = $_POST['instituicao'];
$ano_conclusao = $_POST['ano_conclusao'];
$periodo = $_POST['periodo'];
//radios
$progresso_curso ='';
if(isset( $_POST['radio1']) === true){
    $progresso_curso = $_POST['radio1'];
}else{
    if (isset($_POST['radio2']) === true) {
        $progresso_curso = $_POST['radio2'];
    }else{
        if (isset($_POST['radio3']) === true) {
            $progresso_curso = $_POST['radio3'];
        }
}
}
//idioma
$idioma = $_POST['idioma'];
$nivel_idioma = $_POST['nivel_idioma'];

//conhecimento   $_POST['data_inicio_conhecimento[]'] 
if(isset( $_POST['qtdeEntidade[]']) === true && isset($_POST['qtdeEntidade[]']) === true  && isset($_POST['data_termino_conhecimento[]']) === true &&  isset($_POST['data_inicio_conhecimento[]']) === true   ){
 $qtdeCurso = $_POST['qtdeCurso[]'];
 $qtdeEntidade = $_POST['qtdeEntidade[]'];
 $data_inicio_conhecimento = $_POST['data_inicio_conhecimento[]'];
 $data_termino_conhecimento = $_POST['data_termino_conhecimento[]'];
}
//dados empresa
$empresa = $_POST['empresa'];
$cargo = $_POST['cargos'];
$data_inicio_empresa = $_POST['data_inicio_empresa'];
$data_termino_empresa = $_POST['data_termino_empresa'];
/* 
mandar dados para o banco usando PDO

fazer busca no banco e pegar o id do aluno para inserir na chave primaria
*/
$usuario = $_SESSION['user'];
$senha = $_SESSION['pass'];
echo $usuario;
try {
    $consulta = $pdo->prepare("SELECT * FROM alunos WHERE email = :email");
    $consulta->bindValue(':email',$usuario);
    $consulta->execute();
    $dados_aluno = $consulta->fetchAll();
    $id_aluno = $dados_aluno{0}['id'];
   // echo $id_aluno;
}catch (PDOException $th) {
    echo $th;
}
try {
    $stmt = $pdo->prepare("UPDATE curriculo SET id = :id, id_aluno = :id_aluno, nivel = :nivel, entidade = :entidade,estado = :estado, ano_conclusao = :ano_conclusao, periodo = :periodo, idioma = :idioma, nivel_idioma:nivel_idioma,curso = :curso,entidade_curso = :entidade_curso,data_inicio_curso = :data_inicio_curso,data_termino_curso = :data_termino_curso,emrpesa = :empresa,cargo = :cargo,data_inicio_empresa = :data_inicio_empresa,data_termino_empresa = :data_empresa_curso  WHERE cpf = :cpf");

    $stmt->bindValue(':id',null);
    $stmt->bindValue(':id_curriculo',$id_aluno);
    $stmt->bindValue(':nivel',$nivel_escola);
    $stmt->bindValue(':entidade',$instituicao);
    $stmt->bindValue(':estado',$progresso_curso);
    $stmt->bindValue(':ano_conclusao',$ano_conclusao);
    $stmt->bindValue(':periodo',$periodo);
    $stmt->bindValue(':idioma',$idioma);
    $stmt->bindValue(':nivel_idioma',$nivel_idioma);
    $stmt->bindValue(':curso',$curso);
    $stmt->bindValue(':entidade_curso',$entidade_curso);
    $stmt->bindValue(':data_inicio_curso',$data_inicio_curso);
    $stmt->bindValue(':data_termino_curso',$data_termino_curso);
    $stmt->bindValue(':empresa',$empresa);
    $stmt->bindValue(':cargo',$cargo);
    $stmt->bindValue(':data_inicio_empresa',$data_inicio_empresa);
    $stmt->bindValue(':cpf',$cpf);
    $stmt->execute();
} catch (\Throwable $th) {
    echo $th->getMessage();
}

?>