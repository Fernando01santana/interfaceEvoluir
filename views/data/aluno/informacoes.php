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
<style>
  #curso-basico{
    margin-top:1rem;
}
form{
  padding:2rem;
}
</style>


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

                  <form  method="POST" action="../../../database/updates_aluno/informacoes.php">
                    <div class="row">
                      <div class="col-12 alerta">
                        <?php 
                          if (isset($_SESSION['state'])) {
                            echo $_SESSION['state'];
                          }
                        ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nome completo:</label>
                      <input type="text" name="nome" id="nomeUsuario" class="form-control" value='<?php echo $dados[0]['nome']; ?>' id="exampleInputEmail1" placeholder="nome completo" aria-describedby="emailHelp">

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
                          <option value="Solteiro">Solteiro</option>
                          <option value="Casado">Casado</option>
                          <option value="Viuvo(a)">viuvo(a)</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="exampleInputPassword1">Nacionalidade:</label>
                        <input type="text" name="nacionalidade" id="nacionalidade" class="form-control" placeholder="nacionalidade">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <label for="">Data nascimento</label>
                        <input type="date" value='<?php echo $dados[0][5]; ?>' name="data" class="form-control" id="data_nascimento">
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

                   <input type="submit" value="atualizar dados" class="btn btn-primary btn-block">
                    <a href="../../start/aluno/aluno.php"><button type="button" class="btn btn-danger btn-block">Voltar</button></a>
                  </form>

                </div>
              </div>
              <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="profile-tab">

                <div class="form-date">
                  <div class="row">
                    <div class="col-12 estado">

                    </div>
                  </div>
                  <form method="POST" action="../../../database/updates_aluno/endereco.php">
                    <div class="row">
                      <div class="col-6">
                        <label for="exampleInputEmail1">CEP</label>
                        <input type="text" class="form-control" name="cep" id="cep"value="<?php echo $dados[0]['cep'] ?>" placeholder="CEP" aria-describedby="emailHelp">

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
                        <input type="text" name="numero" value="<?php echo $dados[0]['numero'] ?>" class="form-control" placeholder="Numero" id="numero">
                      </div>
                      <div class="col">
                        <label for="">Bairro</label>
                        <input type="text" name="bairro" value="<?php echo $dados[0]['bairro'] ?>" class="form-control" placeholder="Bairro" id="bairro">
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" id="update-endereco">atualizar</button>
                    <a href="../../start/aluno/aluno.php"><button type="button" class="btn btn-danger btn-block">Voltar</button></a>
                  </form>

                </div>
              </div>
              <div class="tab-pane fade" id="curriculo" role="tabpanel" aria-labelledby="contact-tab">
                <div class="form-date">
                  <form class="curriculo" method="POST" action="../../../database/updates_aluno/curriculo.php">
                    <h5 class="titulo-black">Escolaridade</h5>
                    <div class="row">
                      <div class="col-12 sucesso-envio">
                        <?php 
                          if(isset($_SESSION['msg-curriculo'])){
                            echo $_SESSION['msg-curriculo'];
                          }
                        ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <label>Nivel de ensino</label>
                        <select name="nivel_escola" id="nivel_escola" name="nivel_escola" class="form-control">
                          <option value="0">Selecione</option>
                          <option value="ensino medio">Médio</option>
                          <option value="ensino fundamental">Fundamental</option>
                          <option value="ensino superior">Superior</option>
                        </select>
                      </div>
                      <div class="col-6">
                        <label>Entidade</label>
                        <input type="text" name="instituicao" id="entidade_escola" class="form-control" placeholder="entidade">
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-12">
                        <label>Selecione o progresso da sua formação:</label><br>
                        <input type="radio" name="radio_ensino" id="radio1" value="incompleto">
                        <label>Incompleto</label>

                        <input type="radio" name="radio_ensino" id="radio2" value="completo">
                        <label>Completo</label>

                        <input type="radio" name="radio_ensino" id="radio3" value="cursando">
                        <label>Cursando</label>
                      </div>
                    </div>
                    <div class="row periodo">
                      <div class='col-6'>
                        <label for='ano de conclusao'>Ano de conclusao</label>
                        <input type='date' name='ano_conclusao' class='form-control' id='ano_conclusao'>
                      </div>
                      <div class='col-6'>
                        <label for='periodo'>Periodo</label>
                        <select name='periodo' class='form-control' id='periodo'>
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
                        <select name="nivel_idioma" id="nivel_idioma" class="form-control">
                          <option value="0">Selecione</option>
                          <option value="Basico">Basico</option>
                          <option value="Intermediario">Intermediario</option>
                          <option value="avançado">Avançado</option>
                        </select>
                      </div>
                    </div>

                    <h5 class="titulo-black">Conhecimentos</h5>
                    <div class="curso-adicional"></div>
                    <div class="row">
                      <div class="col-12">
                      <button type="button" class="btn btn-info btn-block add-curso">adicionar curso</button>
                      </div>
                    </div>



                    <h5 class="titulo-black">Experiencia profissional</h5>
                    <div class="new-exp">

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="objetivo">Objetivo Profissional:</label>
                            <textarea name="objetivo" id="objetivo" class="form-control" cols="30" rows="6"></textarea>
                        </div>
                    </div>
                    <button type="button" class="btn btn-info btn-block add-exp">adicionar outra</button>
                    <button type="submit" class="btn btn-primary btn-block" id="atualizar_curriculo">atualizar</button>
                    <a href="../../../gerarpdf.php"><button type="button" class="btn btn-success btn-block">Gerar PDF</button></a>
                    <a href="../../start/aluno/aluno.php"><button type="button" class="btn btn-danger btn-block">Voltar</button></a>
                  </form>
                </div>
              </div>

              <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contact-tab">
                <div class="form-date">
                  <div class="row">
                    <div class="col-12 estado3">

                    </div>
                  </div>

                  <form method="POST" action="../../../database/updates_aluno/contato.php">
                    <div class="row">
                      <div class="col-6">
                        <label for="exampleInputEmail1">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" aria-describedby="emailHelp">

                      </div>

                      <div class="col-6">
                        <label for="exampleInputEmail1">telefone1</label>
                        <input type="text" class="form-control" value="<?php echo $dados[0]['telefone1'] ?>" name="telefone1" id="telefone1_c" placeholder="Telefone1" aria-describedby="emailHelp">

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">telefone2</label>
                      <input type="text" class="form-control" name="telefone2" value="<?php echo $dados[0]['telefone2'] ?>" id="telefone2_c" placeholder="Telefone2" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                      <label for="">Rua</label>
                      <input type="text" name="rua" placeholder="Rua" value="<?php echo $dados[0]['rua'] ?>" class="form-control" id="rua_c">
                    </div>

                    <div class="row">
                      <div class="col">
                        <label for="">Senha:</label>
                        <input type="password" id="senha" class="form-control" name="senha1">
                      </div>
                      <div class="col">
                        <label for="">Confirmar senha:</label>
                        <input type="password" id="senha-conf" class="form-control" name="senha2">
                      </div>
                    </div>



                    <button type="submit" class="btn btn-primary btn-block" id="update-contato">atualizar</button>
                    <a href="../../start/aluno/aluno.php"><button type="button" class="btn btn-danger btn-block">Voltar</button></a>
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
  <script src="script.js">

  </script>
  <?php include('../../../public/footer.php') ?>