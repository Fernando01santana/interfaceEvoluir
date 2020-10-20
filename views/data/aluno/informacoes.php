<?php
session_start();
include('../../../database/conection.php');
if ((!isset($_SESSION['user']) == true) and (!isset($_SESSION['pass']) == true)) {
  unset($_SESSION['user']);
  unset($_SESSION['pass']);
  header('location:index.php');
}
try {
  $nome = $_SESSION['user'];

  $stmt = $pdo->prepare("SELECT * FROM alunos WHERE email = :nome");
  $stmt->bindValue(':nome', $nome);
  $stmt->execute();
  $dados = $stmt->fetchAll();
  //var_dump($dados[0]['telefone1']);
} catch (PDOException $th) {
  echo $th;
}

?>
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<link rel="stylesheet" href="style.css">

<?php include('menu.php'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-5 area">

      <div class="esquerda">

        <div class="menu2">
          <h3 class="titulo-info">Atualize suas informações</h3>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#dados" role="tab" aria-controls="home" aria-selected="true">Informações pessoais</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#endereco" role="tab" aria-controls="profile" aria-selected="false">Endereço</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#curriculo" role="tab" aria-controls="contact" aria-selected="false">Curriculo</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contato" role="tab" aria-controls="contact" aria-selected="false">Contato</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="home-tab">
              <div class="form-date">

                <form method="POST">
                <div class="row">
                  <div class="col-12 alerta">
                  
                  </div>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome completo:</label>
                    <input type="text" name="nome" id="nomeUsuario" class="form-control" value='<?php echo $dados[0][1]; ?>' id="exampleInputEmail1" placeholder="nome completo" aria-describedby="emailHelp">
                    
                  </div>

                  <div class="row">
                    <div class="col">
                      <label for="exampleInputPassword1">Sexo</label>
                      <select name="sexo" class="form-control" id="sexo">
                        <option value="0">selecione uma opção</option>
                        <option value="feminino">Feminino</option>
                        <option value="masculino">Masculino</option>
                      </select>
                    </div>
                    <div class="col">
                      <label for="exampleInputPassword1">Estado civil:</label>
                      <select name="estado-civil" class="form-control" id="estado_civil">
                        <option value="0">selecione uma opção</option>
                        <option value="feminino">Solteiro</option>
                        <option value="masculino">Casado</option>
                        <option value="viuvo(a)">viuvo(a)</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <label for="">Data nascimento</label>
                      <input type="date" value='<?php echo $dados[0][5]; ?>' name="data" class="form-control" id="data_nascimento">
                    </div>
                    <div class="col">
                      <label for="">CPF:</label>
                      <input type="text" class="form-control" value='<?php echo $dados[0]['cpf']; ?>' placeholder="cpf" name="cpf" id="cpf">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label for="">Telefone 1:</label>
                      <input type="text" name="telefone1" class="form-control" value='<?php echo $dados[0]['telefone1']; ?>' id="telefone1" placeholder="telefone1">
                    </div>
                    <div class="col">
                      <label for="">Telefone 2</label>
                      <input type="text" name="telefone2" class="form-control" value='<?php echo $dados[0]['telefone2']; ?>' id="telefone2" placeholder="telefone2">
                    </div>
                  </div>

                  <button type="button" id="updade-info" class="btn btn-primary btn-block">atualizar</button>
                  <a href="../../../index.php"><button class="btn btn-danger btn-block">Voltar</button></a>
                </form>

              </div>
            </div>
            <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="profile-tab">

              <div class="form-date">
              <div class="row">
                <div class="col-12 estado">

                </div>
              </div>
                <form>
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">CEP</label>
                      <input type="text" class="form-control" name="cep" id="cep" placeholder="CEP" aria-describedby="emailHelp">

                    </div>

                    <div class="col-6">
                      <label for="exampleInputEmail1">Estado</label>
                      <input type="text" class="form-control" value="<?php echo $dados[0]['estado'] ?>" name="estado" id="estado" placeholder="Estado" aria-describedby="emailHelp">

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Cidade</label>
                    <input type="text" class="form-control" name="cidade" value="<?php echo $dados[0]['cidade'] ?>" id="cidade" placeholder="Cidade" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="">Rua</label>
                    <input type="text" name="rua" placeholder="Rua" value="<?php echo $dados[0]['rua'] ?>" class="form-control" id="rua">
                  </div>
                  <div class="row">
                    <div class="col">
                      <label for="">Numero:</label>
                      <input type="text" name="numero"  value="<?php echo $dados[0]['numero'] ?>" class="form-control" placeholder="Numero" id="numero">
                    </div>
                    <div class="col">
                      <label for="">Bairro</label>
                      <input type="text" name="bairro" value="<?php echo $dados[0]['bairro'] ?>" class="form-control" placeholder="Bairro" id="bairro">
                    </div>
                  </div>

                  <button type="button" class="btn btn-primary btn-block" id="update-endereco">atualizar</button>
                  <a href="../../../index.php"><button class="btn btn-danger btn-block">Voltar</button></a>
                </form>

              </div>

            </div>
            <div class="tab-pane fade" id="curriculo" role="tabpanel" aria-labelledby="contact-tab">
                <div class="form-date">
                <form class="curriculo">
                  <h5 class="titulo-black">Escolaridade</h5>
                    <div class="row">
                      <div class="col-6">
                        <label>Nivel escolar</label>
                        <select name="nivel-escolar" id="nivel_escola" class="form-control">
                          <option value="0">Selecione</option>
                          <option value="medio">Médio</option>
                          <option value="fundamental">Fundamental</option>
                          <option value="superior">Superior</option>
                        </select>
                      </div>
                      <div class="col-6">
                        <label>Entidade</label>
                        <input type="text" name="entidade" id="entidade_escola" class="form-control" placeholder="entidade">
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-12">
                        <label>Selecione o progresso da sua formação:</label><br>
                        <input type="radio" name="radio" id="radio1"  value="incomplpeto">
                        <label>Incompleto</label>
                        
                        <input type="radio" name="radio" id="radio2"  value="completo">
                        <label>Completo</label>
                        
                        <input type="radio" name="radio"  id="radio3" value="cursando">
                        <label>Cursando</label>
                      </div>
                    </div>
                    <div class="row periodo">
                      <div class='col-6'>
                        <label for='ano de conclusao'>Ano de conclusao</label>
                        <input type='date' name='ano_conclusao' class='form-control' id='ano_conclusao'>
                      </div>
                      <div class='col-6'>
                        <label for='periodo'>Perioso</label>
                          <select name='perioso' class='form-control' id='periodo'>
                            <option value='0'>Selecione</option>
                            <option value='1'>1º ano</option>
                            <option value='2'>2º ano</option>
                            <option value='3'>3º ano</option>
                            <option value='4'>4º ano</option>
                            <option value='5'>5º ano</option>
                            <option value='6'>6º ano</option>
                          </select>
                      </div>
                  </div>
                  <h5 class="titulo-black">Idioma</h5>
                  <div class="row">

                    <div class="col-6">
                      <label for="">Idioma</label>
                    <select name="idioma" id="idioma" class="form-control">
                    <option value="0">Selecione</option>
                    <option value="ingles">Ingles</option>
                    <option value="Espanhol">Esánhol</option>
                    <option value="Frances">Francês</option>
                  </select>
                    </div>
                    <div class="col-6">
                      <label for="">Nivel</label>
                      <select name="idioma" id="nivel_idioma" class="form-control">
                    <option value="0">Selecione</option>
                    <option value="ingles">Basico</option>
                    <option value="Espanhol">Intermediario</option>
                    <option value="Frances">Avançado</option>
                  </select>
                    </div>
                  </div>
                 
                  <h5 class="titulo-black">Conhecimentos</h5>
                  <div class="row">
                    <div class="col-6">
                      <input type="text" name="curso" class="form-control" placeholder="curso" id="curso_basico">
                    </div>
                    <div class="col-6">
                      <input type="text" name="entidade" class="form-control" placeholder="entidade" id="instituicao">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <input type="radio" name="cursando" id="cursando">
                      <label>Cursando</label>
                    </div>
                    <div class="col-6">
                      <input type="radio" name="completo" id="completo">
                      <label>Completo</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label for="">Carga horaria</label>
                      <input type="number" class="form-control" name="" id="carga_horaria_conhecimentos">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label for="">Data de inicio</label>
                      <input type="date" class="form-control" name="data_inicio_conhecimento" id="data_inicio">
                    </div>
                    <div class="col-6">
                      <label for="">Data de termino</label>
                      <input type="date" class="form-control" name="data_termino_conhecimento" id="data_termino">
                    </div>
                  </div>

                  <h5 class="titulo-black">Experiencia profissional</h5>
                  <div class="row">
                    <div class="col-12">
                      <label for="">Empresa</label>
                      <input type="text" class="form-control" name="empresa" id="exp_empresa">
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-12">
                        <label for="">cargo</label>
                        <input type="text" name="" id="exp_cargo" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <label for="">data de inicio</label>
                        <input type="date" name="data_inicio_empresa" id="data_inicio_empresa" class="form-control">
                      </div>
                      <div class="col-6">
                        <label for="">data de termino</label>
                        <input type="date" name="data_termino_empresa" id="data_termino_empresa" class="form-control">
                      </div>
                    </div>
                     <div class="new-exp">
                     
                     </div>
                    <button type="button" class="btn btn-info btn-block add-exp" >adicionar outra</button>
                  <button type="button" class="btn btn-primary btn-block" id="updade_curriculo">atualizar</button>
                  <a href="../../../index.php"><button class="btn btn-danger btn-block">Voltar</button></a>
                </form>
              </div>
            </div>

            <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contact-tab">
              <div class="form-date">
              <div class="row">
              <div class="col-12 estado3">
              
              </div>
              </div>
            
                <form>
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">Email:</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" aria-describedby="emailHelp">

                    </div>

                    <div class="col-6">
                      <label for="exampleInputEmail1">telefone1</label>
                      <input type="text" class="form-control" value="<?php echo $dados[0]['telefone1'] ?>" name="estado" id="telefone1_c" placeholder="Telefone1" aria-describedby="emailHelp">

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">telefone2</label>
                    <input type="text" class="form-control" name="estado" value="<?php echo $dados[0]['telefone2'] ?>" id="telefone2_c" placeholder="Telefone2" aria-describedby="emailHelp">
                  </div>
                  
                  <div class="form-group">
                    <label for="">Rua</label>
                    <input type="text" name="rua" placeholder="Rua" value="<?php echo $dados[0]['rua'] ?>" class="form-control" id="rua_c">
                  </div>

                  <div class="row">
                    <div class="col">
                      <label for="">Senha:</label>
                      <input type="password" id="senha"  class="form-control">
                    </div>
                    <div class="col">
                      <label for="">Confirmar senha:</label>
                      <input type="password" id="senha-conf" class="form-control">
                    </div>
                  </div>

                 

                  <button type="button" class="btn btn-primary btn-block" id="update-contato">atualizar</button>
                  <a href="../../../index.php"><button class="btn btn-danger btn-block">Voltar</button></a>
                </form>
              </div>
            </div>

          </div>
          
        </div>
        
      </div>
    </div>
    <div class="col-md-7 area">
      <div class="direita">
        <img src="icons/imagem.svg" class="imagem" alt="">
      </div>
    </div>
  </div>
</div>
<script>
  var cpf = $('#cpf').val();
$('#updade-info').click(()=>{
  var nome =$('#nomeUsuario').val();
  var sexo = $('#sexo').val();
  var estado_civil = $('#estado_civil').val();
  var data_nascimento = $('#data_nascimento').val();
  var cpf = $('#cpf').val();
  var telefone1 = $('#telefone1').val();
  var telefone2 = $('#telefone2').val();
 

  if((nome === "") || (sexo === undefined) || (estado_civil === undefined) || (data_nascimento === undefined) || (cpf === undefined) || (telefone1 === undefined) || (telefone2 === undefined)){
    $('.alerta').append('<div class="alert alert-danger state" role="alert">preencha todos os campos corretamente!!</div>');
    setTimeout(function(){
      $('.state').fadeOut("slow");
    },3000);
  }else{
    
    $.ajax({
        method: 'POST',
        url: '../../../database/updates_aluno/informacoes.php',
        
        data:{
          nome:nome,
          sexo:sexo,
          estado_civil:estado_civil,
          data_nascimento:data_nascimento,
          cpf:cpf,
          telefone1:telefone1,
          telefone2:telefone2
        },
        dataType: 'html',
            success: function(response) {
                $('.alerta').append('<div class="alert alert-success state" role="alert">Informações atualizadas com sucesso!!</div>');
                setTimeout(function(){
                  $('.state').fadeOut("slow");
                },3000);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              $('.alerta').append('<div class="alert alert-secondary state" role="alert">Erro ao atualizar seus dados!!</div>');
              setTimeout(function(){
                $('.state').fadeOut("slow");
              },3000);
            }
        
          });
        }
});
$('#update-endereco').click(()=>{
  var cep = $('#cep').val();
  var estado = $('#estado').val();
  var cidade = $('#cidade').val();
  var rua =  $('#rua').val();
  var bairro = $('#bairro').val();
  var numero = $('#numero').val();


  if((cep === "") || (estado === "") || (cidade === "") || (rua === "") || (bairro === "") || (numero === "")){
    $('.estado').append('<div class="alert alert-danger" role="alert">preencha todos os campos corretamente!!</div>');
    setTimeout(function(){
      $('.estado').fadeOut("slow");
    },3000);
  }else{
    $.ajax({
        method: 'POST',
        url: '../../../database/updates_aluno/endereco.php',
        data:{
          cpf:cpf,
          cep:cep,
          estado:estado,
          cidade:cidade,
          rua:rua,
          bairro:bairro,
          numero:numero,
        },
        dataType: 'html',
            success: function(response) {
                $('.estado').append('<div class="alert alert-primary state2" role="alert">Informações atualizadas com sucesso!!</div>');
                setTimeout(function(){
                  $('.state2').fadeOut("slow");
                },3000);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              $('.estdo').append('<div class="alert alert-danger state2" role="alert">Erro ao atualizar seus dados!!</div>');
              setTimeout(function(){
                $('.state2').fadeOut("slow");
              },3000);
            }
        
          });
  }

})

$('#update-contato').click(()=>{
  var rua = $('#rua').val();
  var telefone1 = $('#telefone1_c').val();
  var telefone2 = $('#telefone2_c').val();
  var email =  $('#email').val();
  var senha = $('#senha').val();
  var conf_senha = $('#senha-conf').val();

  if((rua === "") || (telefone1 === "") || (telefone2 === "") || (email === "") || (senha === "") || (conf_senha === "")){
    $('.estado3').append('<div class="alert alert-danger" role="alert">preencha todos os campos corretamente!!</div>');
    setTimeout(function(){
      $('.estado3').fadeOut("slow");
    },3000);
  }else{
    if(senha === conf_senha){
    $.ajax({
        method: 'POST',
        url: '../../../database/updates_aluno/contato.php',
        data:{
          cpf:cpf,
          rua:rua,
          telefone1:telefone1,
          telefone2:telefone2,
          email:email,
          senha:senha,
          conf_senha:conf_senha,
        },
        dataType: 'html',
            success: function(response) {
                $('.estado3').append('<div class="alert alert-primary state3" role="alert">Informações atualizadas com sucesso!!</div>');
                setTimeout(function(){
                  $('.state3').fadeOut("slow");
                },3000);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              $('.estado3').append('<div class="alert alert-danger state3" role="alert">Erro ao atualizar seus dados!!</div>');
              setTimeout(function(){
                $('.state3').fadeOut("slow");
              },3000);
            }
        
          });
  }else{
    $('.estado3').append('<div class="alert alert-danger" role="alert">preencha todos os campos corretamente!!</div>');
     setTimeout(function(){
                $('.state3').fadeOut("slow");
              },3000);
  }
  }

})

$('#updade_curriculo').click(()=>{
  //escolaridade
  var escola_nivel = $('#nivel_escola').val();
  var entidade = $('#entidade_escola').val();
  var progresso_incompleto = $('#radio1').val();
  var progresso_completo = $('#radio2').val();
  var progresso_cursando = $('#radio3').val();
  var progresso_total;
if(progresso_cursando === undefined){
  if(progresso_incompleto === undefined){
    progresso_total = progresso_incompleto;
  }else{
    progresso_total = progresso_completo;
  }
}else{
  var ano_conclusao = $('#ano_conclusao').val();
  var periodo = $("#periodo").val();
}
alert(progresso_total);
//idioma
  var idioma = $('#idioma').val();
  var nivel_idioma = $('#nivel_idioma').val();
//conhecimenos
  var curso_basico = $('#curso_basico').val();
  var entidade_curso_basico = $('#instituicao').val();
  var cursando = $('#cursando').val();
  var completo = $('#cmpleto').val();
  var carga_horaria = $('#carga_horaria_conhecimentos');
  var data_inicio_curso = $('#data_inicio_conhecimento').val();
  var data_fim_curso = $('#data_termino_conhecimento');
//experiencia profissional
  var empresa = $('#exp_empresa').val();
  var cargo = $('#exp_cargo').val();
  var data_inicio_experiencia = $('#data_inicio_empresa').val();
  var data_fim_experiencia = $('#data_termino_empresa').val();
})

  $(document).ready(function(){
    $('.periodo').hide();
    $('#radio3').click(function(){
        $('.periodo').show();
    });
    $('#radio2').click(function(){
        $('.periodo').hide();
    });
    $('#radio1').click(function(){
        $('.periodo').hide();
    });
    $('.add-exp').click(function(){
      $('.new-exp').append('<div class="row"><div class="col-12"><label for="">Empresa</label><input type="text" class="form-control" name="empresa" id=""></div></div><div class="row"><div class="col-12"><label for="">cargo</label><input type="text" name="" id="" class="form-control"></div></div><div class="row"><div class="col-6"><label for="">data de inicio</label><input type="date" name="dade_inicio_empresa" id="" class="form-control"></div><div class="col-6"><label for="">data de termino</label><input type="date" name="data_termino_empresa" id="" class="form-control"></div></div>');
    });
  });
</script>
<?php include('../../../public/footer.php') ?>