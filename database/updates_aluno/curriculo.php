<?php
include('../conection.php');
session_start();
//escolaridade
$nivel_escola = $_POST['nivel_escola'];
$instituicao = $_POST['instituicao'];
$ano_conclusao = $_POST['ano_conclusao'];
$periodo = $_POST['periodo'];

//pegando valor dos radios de encino medio
$progresso_curso ='';
if(isset( $_POST['radio_encino']) === "incompleto"){
    $progresso_curso = $_POST['radio_encino'];
}else{
    if (isset($_POST['radio_encino']) === "completo") {
        $progresso_curso = $_POST['radio_encino'];
    }else{
        if (isset($_POST['radio_encino']) === "cursando") {
            $progresso_curso = $_POST['radio_encino'];
        }
}
}
//pegando valor de idioma e nivel de idioma
     $idioma = $_POST['idioma'];
     $nivel_idioma = $_POST['nivel_idioma'];
     $qtdeEntidade = '';
     $data_inicio_conhecimento = '';
     $data_termino_conhecimento = '';

     //adicionando ao banco os dados com array dos cursos, todos convertidos em json
if (isset($_POST['qtdeCurso']) && isset($_POST['qtdeEntidade']) && isset($_POST['data_inicio_conhecimento'])&& isset($_POST['data_termino_conhecimento']) ) {
     $qtdeEntidade = $_POST['qtdeCurso'];
     $data_inicio_conhecimento = $_POST['data_inicio_conhecimento'];
     $data_termino_conhecimento = $_POST['data_termino_conhecimento'];  
     $entidade_curso = $_POST['qtdeEntidade'];
     $email = $_SESSION['user'];

     $entidade = json_encode($entidade_curso);
     $cursos = json_encode($qtdeEntidade);
     $data_inicio = json_encode($data_inicio_conhecimento);
     $data_fim = json_encode($data_termino_conhecimento);
     echo $cursos;

     try {
        $consulta = $pdo->prepare("UPDATE curriculos SET curso = :curso,data_inicio_curso = :data_inicio,data_termino_curso = :data_termino,entidade_curso = :entidade_curso WHERE id = :id");
        $consulta->bindValue(':curso',$cursos);
        $consulta->bindValue(':data_inicio',$data_inicio);
        $consulta->bindValue(':data_termino',$data_fim);
        $consulta->bindValue(':entidade_curso',$entidade);
        $consulta->bindValue(':id',1);
        $consulta->execute();
    }catch (PDOException $th) {
        echo $th;
    }

}

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
    $stmt = $pdo->prepare("UPDATE curriculo SET id = :id, id_aluno = :id_aluno, nivel = :nivel, entidade = :entidade,estado = :estado, ano_conclusao = :ano_conclusao, periodo = :periodo, idioma = :idioma, nivel_idioma:nivel_idioma,emrpesa = :empresa,cargo = :cargo,data_inicio_empresa = :data_inicio_empresa,data_termino_empresa = :data_empresa_curso  WHERE cpf = :cpf");

    $stmt->bindValue(':id',null);
    $stmt->bindValue(':id_curriculo',$id_aluno);
    $stmt->bindValue(':nivel',$nivel_escola);
    $stmt->bindValue(':entidade',$instituicao);
    $stmt->bindValue(':estado',$progresso_curso);
    $stmt->bindValue(':ano_conclusao',$ano_conclusao);
    $stmt->bindValue(':periodo',$periodo);
    $stmt->bindValue(':idioma',$idioma);
    $stmt->bindValue(':nivel_idioma',$nivel_idioma);
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