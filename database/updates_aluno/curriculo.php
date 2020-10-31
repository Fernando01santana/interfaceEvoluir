<?php
include('../conection.php');
session_start();
//escolaridade



//pegando id do usuario ativo fazendo uma pesquisa no banco
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


/*
mandar dados para o banco usando PDO
fazer busca no banco e pegar o id do aluno para inserir na chave primaria
*/
/*
echo $usuario;
try {
    $consulta = $pdo->prepare("SELECT * FROM alunos WHERE email = :email");
    $consulta->bindValue(':email',$usuario);
    $consulta->execute();
    $dados_aluno = $consulta->fetchAll();
    $id_aluno = $dados_aluno[0]['id'];
   // echo $id_aluno;
}catch (PDOException $th) {
    echo $th;
}*/
//pegando valores da empresa e transformando em json
     //adicionando ao banco os dados com array dos cursos, todos convertidos em json
     $data_inicio_empresa = '';
        $data_termino_empresa = '';
     if (isset($_POST['exp_empresa']) && isset($_POST['cargos']) && isset($_POST['data_inicio_empresa'])&& isset($_POST['data_termino_empresa']) ) {
        $exp_empresa = $_POST['qtdeCurso'];
        $data_inicio_conhecimento = $_POST['data_inicio_conhecimento'];
        $data_termino_conhecimento = $_POST['data_termino_conhecimento'];  
        $entidade_curso = $_POST['qtdeEntidade'];
       
   
        $exp_empresa = json_encode($entidade_curso);
        $cargos = json_encode($qtdeEntidade);
        $data_inicio_empresa = json_encode($data_inicio_conhecimento);
        $data_termino_empresa = json_encode($data_termino_conhecimento);
     }else{
        $exp_empresa = '';
        $cargos = '';
        $data_inicio_empresa = '';
        $data_termino_empresa = '';
     }
        $nivel_escola = $_POST['nivel_escola'];
        $instituicao = $_POST['instituicao'];
        $ano_conclusao = $_POST['ano_conclusao'];
        $periodo = $_POST['periodo'];
        //pegando valor de idioma e nivel de idioma
        $idioma = $_POST['idioma'];
        $nivel_idioma = $_POST['nivel_idioma'];
        $qtdeEntidade = '';
        $data_inicio_conhecimento = '';
        $data_termino_conhecimento = '';
try {
    $stmt = $pdo->prepare("INSERT INTO curriculos SET  
    id_aluno = :id_aluno, 
    nivel = :nivel, 
    entidade = :entidade,
    estado = :estado, 
    ano_conclusao = :ano_conclusao,
    periodo = :periodo, 
    idioma = :idioma,
    nivel_idioma = :nivel_idioma,
    empresa = :empresa,
    cargo = :cargo,
    data_inicio_empresa = :data_inicio_empresa,
    data_termino_empresa = :data_empresa_curso 
    WHERE id = :id");


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



     //adicionando ao banco os dados com array dos cursos, todos convertidos em json
     if (isset($_POST['qtdeCurso']) && isset($_POST['qtdeEntidade']) && isset($_POST['data_inicio_conhecimento'])&& isset($_POST['data_termino_conhecimento']) ) {
        $qtdeEntidade = $_POST['qtdeCurso'];
        $data_inicio_conhecimento = $_POST['data_inicio_conhecimento'];
        $data_termino_conhecimento = $_POST['data_termino_conhecimento'];  
        $entidade_curso = $_POST['qtdeEntidade'];
       
   
        $entidade = json_encode($entidade_curso);
        $cursos = json_encode($qtdeEntidade);
        $data_inicio = json_encode($data_inicio_conhecimento);
        $data_fim = json_encode($data_termino_conhecimento);
        echo $cursos;
   
        try {
            //validar pelo email ou identificador
           $consulta = $pdo->prepare("UPDATE curriculos SET curso = :curso,data_inicio_curso = :data_inicio,data_termino_curso = :data_termino,entidade_curso = :entidade_curso WHERE id = :id");
           $consulta->bindValue(':curso',$cursos);
           $consulta->bindValue(':data_inicio',$data_inicio);
           $consulta->bindValue(':data_termino',$data_fim);
           $consulta->bindValue(':entidade_curso',$entidade);
           $consulta->bindValue(':id',$id);
           $consulta->execute();
       }catch (PDOException $th) {
           echo $th;
       }
   
   }
