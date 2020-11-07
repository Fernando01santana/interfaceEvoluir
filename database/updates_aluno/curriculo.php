<?php
include('../conection.php');
session_start();
//escolaridade



//pegando id do usuario ativo fazendo uma pesquisa no banco
$email = $_SESSION['user'];
try {
    //validar pelo email ou identificador
   $consulta = $pdo->prepare("SELECT * FROM alunos WHERE email = :email");
   $consulta->bindValue(':email',$email);
   $consulta->execute();
   $row = $consulta->fetchAll();
   $id = $row[0]['id'];

}catch (PDOException $th) {
   echo $th;
}

//pegando valor dos radios de ensino medio
$progresso_curso ='';
if(isset($_POST['radio_encino'])){
    $progresso_curso = $_POST['radio_encino'];
}


     //adicionando ao banco os dados com array dos cursos, todos convertidos em json
     $data_inicio_empresa = '';
        $data_termino_empresa = '';
     if (isset($_POST['empresa']) && isset($_POST['cargos']) && isset($_POST['data_inicio_empresa'])&& isset($_POST['data_termino_empresa']) ) {
        $exp_empresa = $_POST['empresa'];
        $cargos = $_POST['cargos'];
        $data_inicio_empresa = $_POST['data_inicio_empresa'];
        $data_terminou_empresa = $_POST['data_termino_empresa'];
        
        $qtdeCurso = $_POST['qtdeCurso'];
        $entidade_curso = $_POST['qtdeEntidade'];
        $inicio_curso = $_POST['data_inicio_conhecimento'];
        $termino_curso = $_POST['data_termino_conhecimento'];
        
        $exp_empresa_txt = json_encode($exp_empresa);
        $cargos_txt = json_encode($cargos);
        $data_inicio_emp = json_encode($data_inicio_empresa);
        $data_termino_emp = json_encode($data_inicio_empresa);

        $qtdeCurso_txt = json_encode($qtdeCurso);
        $entidade_curso_txt = json_encode($entidade_curso);
        $inicio_curso_txt = json_encode($inicio_curso);
        $termino_curso_txt = json_encode($termino_curso);
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
try {
    $stmt = $pdo->prepare("UPDATE `curriculos` SET `id_aluno`=:id_aluno,`nivel`=:nivel,`entidade`=:entidade,`estado`=:estado,`ano_conclusao`=:ano_conclusao,`periodo`=:periodo,`idioma`=:idioma,`nivel_idioma`=:nivel_idioma,`curso`=:curso,`entidade_curso`=:entidade_curso,`data_inicio_curso`=:data_inicio_curso,`data_termino_curso`=:data_termino_curso,`empresa`=:empresa,`cargo`=:cargo,`data_inicio_emrpesa`=:data_inicio_empresa,`data_termino_empresa`=:data_termino_empresa WHERE id=:id");


    $stmt->bindValue(':id_aluno',$id); //ok
    $stmt->bindValue(':nivel',$nivel_escola); //ok
    $stmt->bindValue(':entidade',$instituicao); //ok
    $stmt->bindValue(':estado',$progresso_curso); //ok
    $stmt->bindValue(':ano_conclusao',$ano_conclusao); //ok
    $stmt->bindValue(':periodo',$periodo); //ok
    $stmt->bindValue(':idioma',$idioma); //ok
    $stmt->bindValue(':nivel_idioma',$nivel_idioma); //ok
    $stmt->bindValue(':curso',$qtdeCurso_txt); //ok
    $stmt->bindValue(':entidade_curso',$entidade_curso_txt); //ok
    $stmt->bindValue(':data_inicio_curso',$inicio_curso_txt); //ok
    $stmt->bindValue(':data_termino_curso',$termino_curso_txt); //ok
    $stmt->bindValue(':empresa',$exp_empresa_txt); //ok
    $stmt->bindValue(':cargo',$cargos_txt); //ok
    $stmt->bindValue(':data_inicio_empresa',$data_inicio_emp); //ok
    $stmt->bindValue(':data_termino_empresa',$data_termino_emp); //ok
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
