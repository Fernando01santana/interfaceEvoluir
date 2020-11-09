<?php include('../../public/header.php');?>
<?php session_start();?>
<script>
        $(document).ready(function() {
            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#Rua").val("");
                $("#Bairro").val("");
                $("#Cidade").val("");
                $("#Estado").val("");
            }
            //Quando o campo cep perde o foco.
            $("#Cep").blur(function() {
                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');
                //Verifica se campo cep possui valor informado.
                if (cep != "") {
                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;
                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {
                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#Rua").val("...");
                        $("#Bairro").val("...");
                        $("#Cidade").val("...");
                        $("#Estado").val("...");
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#Rua").val(dados.logradouro);
                                $("#Bairro").val(dados.bairro);
                                $("#Cidade").val(dados.localidade);
                                $("#Estado").val(dados.uf);
                               
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 area">
            <div class="esquerda">

                <div class="form" >
                    <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                        <div class="cima">
                            <img src="img/logo-estudante(2).png" class="logo" alt=""><h1> Cadastro</h1>
                            <h6>Dados Pessoais:</h6>
                            <?php 
                            if(isset($_SESSION['result'])){
                                echo $_SESSION['result'];
                                session_destroy();
                            }
                            ?>
                        </div>
                        <form method="POST" action="../../database/dados-alunos.php">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Nome:</label>
                                    <input type="name" class="form-control" name="nome" id="inputEmail4" placeholder="Nome completo" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Sexo:</label>
                                <select class="form-control"name="sexo" id="" name="sexo" required>
                                    <option value="0">Selecione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                    <option value="O">outro</option>
                                </select>
                                </div>
                                <div class="col">
                        <label for="exampleInputPassword1">Nacionalidade:</label>
                        <input type="text" name="nacionalidade" id="nacionalidade" class="form-control" placeholder="nacionalidade">
                      </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputAddress2">Data de nascimento:</label>
                                <input type="date" class="form-control" name="data_nascimento" id="inputAddress2" placeholder="data de nascimento" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputCity">Estado civil:</label>
                                    <select class="form-control" name="estado-civil" name="" id="" required>
                                        <option value="0">Selecione</option>
                                        <option value="C">Casado(a)</option>
                                        <option value="S">Solteiro(a)</option>
                                        <option value="V">Viuvo(a)</option>
                                    </select>
                                </div>
                            </div>
                            <h6>Endereço:</h6>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>CEP:</label>
                                    <input type="cep" name="cep" id="Cep" class="form-control" placeholder="CEP" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Estado:</label>
                                    <input type="text" name="estado" id="Estado" class="form-control" placeholder="Estado" disable>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Cidade:</label>
                                    <input type="text" name="cidade" id="Cidade" class="form-control" placeholder="Cidade" disable>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Rua:</label>
                                    <input type="text" name="rua" id="Rua" class="form-control" placeholder="Rua" disable>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Numero:</label>
                                    <input type="number" name="numero" class="form-control" placeholder="Numero" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Bairro:</label>
                                    <input type="text" name="bairro" id="Bairro" class="form-control" placeholder="Bairro" required>
                                </div>
                            </div>
                            <h6>Contato:</h6>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Email</label>
                                    <input type="email" name="email" placeholder="Email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Tel 1:</label>
                                    <input type="tel" name="tel1" class="form-control" placeholder="Tel 1" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Tel 1:</label>
                                    <input type="tel" name="tel2" class="form-control" placeholder="Tel 2" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> senha</label>
                                    <input type="password" class="form-control" name="senha" placeholder="********">
                                </div>
                                <div class="form-group col-md-6">
                                <label>confirmar senha</label>
                                    <input type="password" class="form-control" name="conf-senha" placeholder="********">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block">Cadastrar</button>
                        </form>
                        <a href="../../index.php"><button class="btn btn-dark btn-block voltar">Voltar</button></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-7 area">
            <div class="direita">
                <img src="img/celular.svg" alt="">
            </div>
        </div>
    </div>
</div>
<?php include('../../public/footer.php') ?>
