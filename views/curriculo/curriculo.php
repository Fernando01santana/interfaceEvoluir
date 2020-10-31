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
    </style>
  </head>
  <body>
 
    <div class="container">
      
            <form class="curriculo" method="POST" action="../../../database/updates_aluno/curriculo.php">
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
                      <option value="ingles">Basico</option>
                      <option value="Espanhol">Intermediario</option>
                      <option value="Frances">Avançado</option>
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
                <div class="row">
                  <div class="col-12">
                    <label for="">Empresa</label>
                    <input type="text" class="form-control" name="empresa" id="exp_empresa[]">
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="">cargo</label>
                    <input type="text" name="cargos[]" id="exp_cargo" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="">data de inicio</label>
                    <input type="date" name="data_inicio_empresa" id="data_inicio_empresa[]" class="form-control">
                  </div>
                  <div class="col-6">
                    <label for="">data de termino</label>
                    <input type="date" name="data_termino_empresa" id="data_termino_empresa[]" class="form-control">
                  </div>
                </div>
                <div class="new-exp">

                </div>
                <button type="button" class="btn btn-info btn-block add-exp">adicionar outra</button>
                <button type="submit" class="btn btn-primary btn-block" id="atualizar_curriculo">cadastrar</button>
                <button type="button" class="btn btn-danger btn-block">Voltar</button>
              </form>
        </div>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>