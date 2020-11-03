<!doctype html>
<html lang="pt-br">
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
      .empresa{
        padding-left:2rem;
        padding-right:2rem;
        padding-top:1rem;
        padding-bottom:1rem;
        margin-top:3rem;
        margin-bottom: 2rem;
        border-radius:10px;
        background: white;
      }
      .button_sub{
        padding-left:2rem;
        padding-right:2rem;
        padding-top:1rem;
        padding-bottom:1rem;
        margin-top:3rem;
        margin-bottom: 2rem;
        border-radius:10px;
      }
      .um{
          margin-top:1rem;
      }
      #add-requisito{
          margin-top:1rem;
      }
      .req{
          margin-top:1rem;
      }
    </style>
  </head>
  <body>
 <?php
 include("../../../database/conection.php");
 session_start();
 $usuario = $_SESSION['user'];
 try {
    //validar pelo email ou identificador
   $consulta = $pdo->prepare("SELECT * FROM empresa WHERE email = :email");
   $consulta->bindValue(':email',$usuario);
   $consulta->execute();
   $row = $consulta->fetchAll();
   
    $obj = '';
    if($row[0]['objetivo'] === 1){
    $obj = "Abertura de Oportunidade para estagios"; 
    }else{
        $obj = "Abetura de Oportunidade para Aprendiz";
    }

}catch (PDOException $th) {
   echo $th;
}
 ?>
    <form method="POST" action="dados.php">
        <div class="container empresa">
            <h5 class="titulo-black">Dados da Empresa</h5>
            <div class="row">
                <div class="col-12">
                    <?php 
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                    }
                    ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                <label>Nome</label>
                <input type="text" name="nome_empresa" class="form-control" id="nome" value="<?php echo $row[0]['nome'];?>" placeholder="Ex: Instituto Evoluir..."/>
                </div>
                <div class="col-6">
                <label>CNPJ</label>
                <input type="text" name="cnpj" class="form-control" id="cnpj"placeholder="CNPJ aqui..." value="<?php echo $row[0]['cnpj'];?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                <label>Estado</label><br>
                <select name="estado" id="estado" class="form-control">
                    <option value="0">Selecione</option>
                    <option value="parceiro">parceiro evoluir</option>
                    <option value="externo">externo</option>
                </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                <label for="objetivo">Objetivo</label>
                <input type="text" name="objetivo" id="objetivo" class="form-control"value="<?php echo $obj;?>" placeholder="Objetivo aqui...">
                </div>
                <div class="col-6">
                <label for="tipo_empresa">Tipo de Empresa</label>
                <select name="tipo_empresa" class="form-control" id="tipo_empresa">
                    <option value="0">Selecione</option>
                    <option value="juridica">Pessoa juridica</option>
                    <option value="fisica">Pessoa fisica</option>
                </select>
                </div>
            </div>
            <br>
            <div class="row">

                <div class="col-6">
                <label for="">Email</label>
                <input type="text" name="email" id="email"value="<?php echo $row[0]['email'];?>" class="form-control" placeholder="exemplo123@email.com" disabled>
                </div>
                <div class="col-6">
                <label for="">Senha</label>
                <input type="text" name="senha" id="senha" class="form-control" value="<?php echo $row[0]['senha'];?>" placeholder="Digite sua senha..." disabled>
                </div>
            </div>
            <button class="btn btn-primary btn-block um">Atualizar dados da empresa</button>
        </div>
    </form>





<form action="dados_vaga.php" method="POST">
        <div class="container empresa">
            <h5 class="titulo-black">Dados da Vaga</h5>
            <div class="row">
                <div class="col-12">
                    <?php 
                    if(isset($_SESSION['msgVaga'])){
                        echo $_SESSION['msgVaga'];
                    }
                    ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <label for="nome_vaga">Nome</label>
                    <input type="text" name="nome_vaga" id="nome_vaga"value="<?php echo $row[0]['nome'];?>" class="form-control" placeholder="Nome da vaga...">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                <label for="">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição da vaga aqui...">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-2">
                <label for="idade">Idade</label>
                <input type="number" name="idade" id="idade" class="form-control" placeholder="Idade exigida...">
                </div>
                <div class="col-3">
                <label for="horario">Data e Horário</label>
                <input type="date" name="horario" id="horario" class="form-control">
                </div>
                <div class="col-3">
                <label for="tipo_vaga">Tipo de Vaga</label>
                <input type="text" name="tipo_vaga" id="tipo_vaga" class="form-control" placeholder="Ex: Estágio...">
                </div>
                <div class="col-4">
                <label for="salario">Salário</label>
                <input type="text" name="salario" id="salario" class="form-control" placeholder="Ex: 500.00">
                </div>
            </div>
            <br>
            <label for="add-requisito">Requisitos para a vaga</label>
            
            <div class="row requisitos">
            </div>
            <input type="button" id="add-requisito" name="add-requisito" class="btn btn-primary btn-block add-requisito" value="Adicionar requisitos para a vaga">
            <div class="row">
                <div class="col-6">
                <label for="nome_empresa">Nome da Empresa</label>
                <input type="text" name="nome_emp" id="nome_emp" class="form-control" placeholder="Nome da Empresa aqui...">
                </div>
                <div class="col-6">
                <label for="contato">Contato</label>
                <input type="tel" name="contato" id="contato" class="form-control" placeholder="Número para Contato...">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block um">Cadastrar vagas</button>
        </div>
    </form>
    
    <script src="jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
       $(document).ready(function(){
      $('.add-requisito').click(function(){
           $('.requisitos').append('<div class="col-12"><input type="text" name="requisitos[]" class="form-control req" placeholder="informe um requisito"></div>');
      })
      setTimeout(function(){
     $('.alert').fadeOut("slow");
        },2000);
    })
    </script>
  </body>
</html>