<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
      body{
        background: #DCDCDC;
      }
      .curriculo{
        padding-left:2rem;
        padding-right:2rem;
        padding-top:1rem;
        padding-bottom:1rem;
        margin-top:3rem;
        margin-bottom: 2rem;
        border-radius:10px;
        background: white;
      }
      .add-exp{
        margin-top:0.5rem;
      }
      button{
        margin-top:1rem;
      }
    </style>
  </head>
  <body>
 
    <div class="container">
      
            <form class="curriculo" method="POST" action="dados.php">
            <div class="row">
              <div class="col-12">
              <?php 
              session_start();
              if(isset($_SESSION['curriculo'])){
                echo $_SESSION['curriculo'];
              }
              ?>
              </div>
            </div>
                <h5 class="titulo-black">Escolaridade</h5>
                <div class="row">
                  <div class="col-12 sucesso-envio">

                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Nivel de ensino</label>
                    <select name="nivel_escola" id="nivel_escola" name="nivel_escola" class="form-control">
                      <option value="0">Selecione</option>
                      <option value="medio">Médio</option>
                      <option value="fundamental">Fundamental</option>
                      <option value="superior">Superior</option>
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
                    <input type="radio" name="radio_encino" id="radio1" value="incompleto">
                    <label>Incompleto</label>

                    <input type="radio" name="radio_encino" id="radio2" value="completo">
                    <label>Completo</label>

                    <input type="radio" name="radio_encino" id="radio3" value="cursando">
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
                      <option value="basico">Basico</option>
                      <option value="intermediario">Intermediario</option>
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
                <button type="button" class="btn btn-info btn-block add-exp">adicionar experiencia</button>
                <div class="row">
                  <div class="col-6">
                  <button type="submit" class="btn btn-primary btn-block" id="atualizar_curriculo">cadastrar</button>
                  </div>
                  <div class="col-6">
                  <a href="../start/aluno/aluno.php"><button type="button" class="btn btn-danger btn-block">Voltar</button></a>
                  </div>
                </div>
                
                
              </form>
        </div>
  
    <script src="jquery-3.5.1.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="script.js">
          setTimeout(function(){
      $('.alert').fadeOut("slow");
    },3000);
    </script>
  </body>
</html>