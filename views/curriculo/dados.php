<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<?php 
include('../../database/conection.php');

session_start();
$email = $_SESSION['user'];
$_SESSION['curriculo'] = '';
try {
    //validar pelo email ou identificador
   $consulta = $pdo->prepare("SELECT id FROM alunos WHERE email = :email");
   $consulta->bindValue(':email',$email);
   $consulta->execute();
   $row = $consulta->fetchAll();
   $id = $row[0]['id'];
   
}catch (PDOException $th) {
    echo $th;
}

if(isset($_POST['nivel_escola'])){
    $nivel_escola = $_POST['nivel_escola'];
    $instituicao = $_POST['instituicao'];
    //pegando valor dos radios de ensino medio
    $progresso_curso =$_POST['radio_encino'];
    $ano_conclusao = $_POST['ano_conclusao'];
    $periodo = $_POST['periodo'];
    $idioma = $_POST['idioma'];
    $nivel_idioma = $_POST['nivel_idioma'];
}

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
     }else{
        $entidade = '';
        $cursos = '';
        $data_inicio = '';
        $data_fim = '';
     }

//dados da empresa
if(isset($_POST['empresa'])){
    $empresa = $_POST['empresa'];
    $cargos_array = $_POST['cargo_empresa'];
    $data_inicio_empresa = $_POST['data_inicio_empresa'];
    $data_termino_empresa = $_POST['data_termino_empresa'];

    $txt_empresa = json_encode($empresa);
    $txt_cargos = json_encode($cargos_array);
    $txt_data_inicio = json_encode($data_inicio_empresa);
    $txt_data_termino = json_encode($data_termino_empresa);
}else{
    $txt_empresa = '';
    $txt_cargos = '';
    $txt_data_inicio = '';
    $txt_data_termino = '';
}

//mandando os dados para o banco de dados
try {
    $stmt = $pdo->prepare("INSERT INTO `curriculos`(`id_aluno`, `nivel`, `entidade`, `estado`, `ano_conclusao`, `periodo`, `idioma`, `nivel_idioma`, `curso`, `entidade_curso`, `data_inicio_curso`, `data_termino_curso`, `empresa`, `cargo`, `data_inicio_empresa`, `data_termino_empresa`) VALUES (:id_aluno, :nivel, :entidade, :estado, :ano_conclusao, :periodo, :idioma, :nivel_idioma, :curso, :entidade_curso, :data_inicio_curso, :data_termino_curso, :empresa, :cargo, :data_inicio_empresa, :data_termino_empresa)");


        $stmt->bindValue(':id_aluno',$id);  //ok
        $stmt->bindValue(':nivel',$nivel_escola);
        $stmt->bindValue(':entidade',$instituicao);
        $stmt->bindValue(':estado',$progresso_curso);
        $stmt->bindValue(':ano_conclusao',$ano_conclusao);
        $stmt->bindValue(':periodo',$periodo);
        $stmt->bindValue(':idioma',$idioma);
        $stmt->bindValue(':nivel_idioma',$nivel_idioma);
        $stmt->bindValue(':curso',$cursos);
        $stmt->bindValue(':entidade_curso',$entidade);
        $stmt->bindValue(':data_inicio_curso',$data_inicio);
        $stmt->bindValue(':data_termino_curso',$data_fim);
        $stmt->bindValue(':empresa',$txt_empresa);
        $stmt->bindValue(':cargo',$txt_cargos);
        $stmt->bindValue(':data_inicio_empresa',$txt_data_inicio);
        $stmt->bindValue(':data_termino_empresa',$txt_data_termino);
        $stmt->execute();
        echo "<div class='alert alert-success' role='alert'>Cadastro de currículo efetuado com successo!</div>";
        $_SESSION['curriculo'] = '<div class="alert alert-success" role="alert">
        Curriculo cadastrado com sucesso!!
                                </div>';
        header('Location:./curriculo');
} catch (PDOException $th) {
    
    $_SESSION['curriculo'] = '<div class="alert alert-danger" role="alert">
        Erro ao cadastrar curriculo!!'.$th.'
                                </div>';
}
?>