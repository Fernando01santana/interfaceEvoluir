$(document).ready(function(){
    //botao de adicionar curso
    $('.add-curso').click(function(){
      $('.curso-adicional').append('<div class="row esp" id="curso-basico"><div class="col-6"><input type="text" name="qtdeCurso[]" class="form-control" placeholder="curso" ></div><div class="col-6"><input type="text" name="qtdeEntidade[]" class="form-control" placeholder="entidade" id="instituicao"></div></div><div class="row"><div class="col-6"><label for="">Data de inicio</label><input type="date" class="form-control" name="data_inicio_conhecimento[]" id="data_inicio[]"></div><div class="col-6"><label for="">Data de termino</label><input type="date" class="form-control" name="data_termino_conhecimento[]" id="data_inicio"></div></div> ');
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