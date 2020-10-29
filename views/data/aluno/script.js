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



//adicionar variaveis em um array e no backend fazer um for contando cada item e girar de acordo com a quantidade
//de itens presente dentro do array e executar a query com pdo




  $(document).ready(function(){
    //botao de adicionar curso
    $('.add-curso').click(function(){
      $('.curso-adicional').append('<div class="row esp" id="curso-basico"><div class="col-6"><input type="text" name="qtdeCurso[]" class="form-control" placeholder="curso" ></div><div class="col-6"><input type="text" name="qtdeEndidade[]" class="form-control" placeholder="entidade" id="instituicao"></div></div><div class="row"><div class="col-6"><label for="">Data de inicio</label><input type="date" class="form-control" name="data_inicio_conhecimento[]" id="data_inicio[]"></div><div class="col-6"><label for="">Data de termino</label><input type="date" class="form-control" name="data_termino_conhecimento[]" id="data_inicio"></div></div> ');
      var qtdeCurso = $("#qtdeCurso[]").val()
      var qtdeEntidade = $('#qtdeEntidade[]').val()
    });

    

    //botao de adicionar experiencia profissional
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
      $('.new-exp').append('<div class="row"><div class="col-12"><label for="">Empresa</label><input type="text" class="form-control" name="empresa[]" id=""></div></div><div class="row"><div class="col-12"><label for="">cargo</label><input type="text" name="cargo_empresa[]" id="" class="form-control"></div></div><div class="row"><div class="col-6"><label for="">data de inicio</label><input type="date" name="dade_inicio_empresa[]" id="" class="form-control"></div><div class="col-6"><label for="">data de termino</label><input type="date" name="data_termino_empresa[]" id="" class="form-control"></div></div>');
    });
  });