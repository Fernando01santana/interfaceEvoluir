<?php 
include('../../database/conection.php');
session_start();
$email = $_SESSION['user'];
try {
    //validar pelo email ou identificador
   $consulta = $pdo->prepare("SELECT id FROM alunos WHERE email = :email");
   $consulta->bindValue(':email',$email);
   $consulta->execute();
   $row = $consulta->fetchAll();
   $id = $row[0]['id'];
   echo $id;

}catch (PDOException $th) {
   echo $th;
}

$nivel_escola = $_POST['nivel_escola'];
$instituicao = $_POST['instituicao'];
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
$ano_conclusao = $_POST['ano_conclusao'];
$periodo = $_POST['periodo'];
$idioma = $_POST['idioma'];
$nivel_idioma = $_POST['nivel_idioma'];

//pegando dados dos cursos e trasnformando em json para mandar para o banco
     if (isset($_POST['qtdeCurso']) && isset($_POST['qtdeEntidade']) && isset($_POST['data_inicio_conhecimento'])&& isset($_POST['data_termino_conhecimento']) ) {
        $qtdeEntidade = $_POST['qtdeCurso'];
        $data_inicio_conhecimento = $_POST['data_inicio_conhecimento'];
        $data_termino_conhecimento = $_POST['data_termino_conhecimento'];  
        $entidade_curso = $_POST['qtdeEntidade'];
       
        $entidade = json_encode($entidade_curso);
        $cursos = json_encode($qtdeEntidade);
        $data_inicio = json_encode($data_inicio_conhecimento);
        $data_fim = json_encode($data_termino_conhecimento);
     }

//dados da empresa
$empresa = $_POST['empresa'];
$experiencia_empresa = $_POST['exp_cargo'];
$data_inicio_empresa = $_POST['data_inicio_empresa'];
$data_termino_empresa = $_POST['data_termino_empresa'];

$txt_empresa = json_encode($empresa);
$txt_experiencia = json_encode($experiencia_empresa);
$txt_data_inicio = json_encode($data_inicio_empresa);
$txt_data_termino = json_encode($data_termino_empresa);

//mandando os dados para o banco de dados
try {
    $stmt = $pdo->prepare("INSERT INTO curriculos(id_aluno,  nivel, entidade,estado, ano_conclusao,periodo, idioma,nivel_idioma,empresa,cargo,data_inicio_empresa,data_termino_empresa)VALUES(:id_aluno,:nivel,:entidade,:estado,:ano_conclusao,:periodo,:idioma,:nivel_idioma,:empresa,:cargo,:data_inicio_empresa, :data_empresa_curso)WHERE id = :id");


    $stmt->bindValue(':id_aluno',$id);
    $stmt->bindValue(':nivel',$nivel_escola);
    $stmt->bindValue(':entidade',$instituicao);
    $stmt->bindValue(':estado',$progresso_curso);
    $stmt->bindValue(':ano_conclusao',$ano_conclusao);
    $stmt->bindValue(':periodo',$periodo);
    $stmt->bindValue(':idioma',$idioma);
    $stmt->bindValue(':nivel_idioma',$nivel_idioma);
    $stmt->bindValue(':empresa',$exp_empresa);
    $stmt->bindValue(':cargo',$cargos);
    $stmt->bindValue(':data_inicio_empresa',$data_inicio_empresa);
    $stmt->bindValue(':data_inicio_empresa',$data_termino_empresa);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>