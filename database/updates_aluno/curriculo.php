<?php 
//conecxao com o banco
include '../../database/conection.php';
//iniciando sessao
session_start();

$usuario = $_SESSION['user'];
//pegando id do usuario na tabela alunos
$stmt = $pdo->prepare("SELECT id FROM alunos WHERE `email`=:email");
$stmt->bindValue('email',$usuario);
$stmt->execute();
$data_id = $stmt->fetchAll();
$id_user = $data_id[0]['id'];

//pegando valores das variaveis contidas no formulario

//dados sobre formação
$nivel_escola = $_POST['nivel_escola'];
$instituicao = $_POST['instituicao'];
$ensino = $_POST['radio_ensino'];
$ano_conclusao = $_POST['ano_conclusao'];
$periodo = $_POST['periodo'];

echo $nivel_escola."<br>".$instituicao."<br>".$ensino."<br>".$ano_conclusao."<br>".$periodo;
//dados idioma
$idioma = $_POST['idioma'];
$nivel_idioma = $_POST['nivel_idioma'];

//dados sobre conhecimentos
if(isset($_POST['qtdeCurso'])){
    $curso = $_POST['qtdeCurso'];
    $entidade = $_POST['qtdeEntidade'];
    $data_inicio_conhecimento = $_POST['data_inicio_conhecimento'];
    $data_termino_conhecimento = $_POST['data_termino_conhecimento'];

    //transformando tudo em JSON
    $curso_json = json_encode($curso);
    $entidade_json = json_encode($entidade);
    $data_inicio_json = json_encode($data_inicio_conhecimento);
    $data_termino_json = json_encode($data_termino_conhecimento);

}else{
    $curso_json = '';
    $entidade_json = '';
    $data_inicio_json = '';
    $data_termino_json = '';
}

//dados da experiencia
if(isset($_POST['empresa'])){
    $empresas = $_POST['empresa'];
    $cargo_empresa = $_POST['cargos'];
    $data_inicio_empresa = $_POST['data_inicio_empresa'];
    $data_termino_empresa = $_POST['data_termino_empresa'];

    //transformando tudo em JSON
    $empresa_json = json_encode($empresas);
    $cargo_empresas_json = json_encode($cargo_empresa);
    $data_inicio_empresa_json = json_encode($data_inicio_empresa);
    $data_termino_empresa_json = json_encode($data_termino_empresa);
}else{
    $empresa_json = '';
    $cargo_empresas_json = '';
    $data_inicio_empresa_json = '';
    $data_termino_empresa_json = '';
}

//atualizando dados da tabela curriculo
try {
    $stmt = $pdo->prepare("UPDATE curriculos SET `id_aluno`=:id_aluno,`nivel`=:nivel,`entidade`=:entidade,`estado`=:estado,`ano_conclusao`=:ano_conclusao,`periodo`=:periodo,`idioma`=:idioma,`nivel_idioma`=:nivel_idioma,`curso`=:curso,`entidade_curso`=:entidade_curso,`data_inicio_curso`=:data_inicio_curso,`data_termino_curso`=:data_termino_curso,`empresa`=:empresa,`cargo`=:cargo,`data_inicio_empresa`=:data_inicio_empresa,`data_termino_empresa`=:data_termino_empresa WHERE id_aluno =".$id_user);
    $stmt->bindValue(':id_aluno',$usuario);
    $stmt->bindValue(':nivel',$nivel_escola);
    $stmt->bindValue(':entidade',$instituicao);
    $stmt->bindValue(':estado',$ensino);
    $stmt->bindValue(':ano_conclusao',$ano_conclusao);
    $stmt->bindValue(':periodo',$periodo);
    $stmt->bindValue(':idioma',$idioma);
    $stmt->bindValue(':nivel_idioma',$nivel_idioma);
    $stmt->bindValue(':curso',$curso_json);
    $stmt->bindValue(':entidade_curso',$entidade_json);
    $stmt->bindValue(':data_inicio_curso',$data_inicio_json);
    $stmt->bindValue(':data_termino_curso',$data_termino_json);
    $stmt->bindValue(':empresa',$empresa_json);
    $stmt->bindValue(':cargo',$cargo_empresas_json);
    $stmt->bindValue(':data_inicio_empresa',$data_inicio_empresa_json);
    $stmt->bindValue(':data_termino_empresa',$data_termino_empresa_json);
    $stmt->execute();
    $_SESSION['msg-curriculo'] = '<div class="alert alert-success" role="alert">Informações atualizadas!</div>';
    header('Location: ../../views/data/aluno/informacoes.php');
} catch (\Throwable $th) {
    $_SESSION['msg-curriculo'] = '<div class="alert alert-danger" role="alert">Erro ao atualizar informações</div>';
    header('Location: ../../views/data/aluno/informacoes.php');
}
?>

