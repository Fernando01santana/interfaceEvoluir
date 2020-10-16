<?php include('../../public/header.php') ?>
<?php session_start()?>
<link rel="stylesheet" href="css/style.css">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 area">
            <div class="esquerda">

                <div class="form">
                    <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                        <div class="cima">
                            <img src="img/logo-educacao.png" class="logo" alt=""><h1> Cadastro de acesso</h1>
                            <h6>Dados da instituição:</h6>
                            <?php 
                            if(isset($_SESSION['conf-dados'])){
                                echo $_SESSION['conf-dados'];
                                session_destroy();
                            }
                            ?>
                        </div>
                        <form  method="POST" action="../../database/dados-escolas.php">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Nome da Instituição de Ensino *</label>
                                    <input type="text" class="form-control" name="nome" id="inputEmail4" placeholder="Nome" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Nível da Instituição *</label>
                                <select class="form-control"name="nivel_instituicao" id="" required>
                                    <option value="">Selecione</option>
                                    <option value="">Superior</option>
                                    <option value="">Técnico</option>
                                    <option value="">Educação especial</option>
                                    <option value="">Habilitação Básica</option>
                                    <option value="">Ensino médio</option>
                                    <option value="">Encino fundamental</option>
                                </select>
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Cursos autorizados para Estágio *</label>
                                <input type="text" name="curso-autorizado" class="form-control" id="inputAddress" placeholder="Informe o curso" required>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Informar tipode escola *</label>
                                <select name="tipo_escola" id="" class="form-control">
                                    <option value="0">Selecione</option>
                                    <option value="">Estadual</option>
                                    <option value="">Federal</option>
                                    <option value="">Municipal</option>
                                    <option value="">Particular</option>
                                </select>
                            </div>
                           
                           

                            <h6>Contato:</h6>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nome contato</label>
                                    <input type="text" name="nome_contato"class="form-control" placeholder="nome para contato" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Departamento contato:</label>
                                    <input type="text" name="departamento" class="form-control" placeholder="departamento para contato" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Tipo</label>
                                   <select name="contato_tipo"class="form-control" id="">
                                       <option value="">selecione</option>
                                       <option value="">FIXO</option>
                                       <option value="">CELULAR</option>
                                   </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">DDD</label>
                                    <input type="number" name="DDD" class="form-control" placeholder="(ddd)" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Bairro:</label>
                                    <input type="text" name="bairro" class="form-control" placeholder="Bairro" required>
                                </div>
                            </div>
                         
                            <div class="form-row">
                            <div class="form-group col-6">
                                    <label for="">Cargo contato *</label>
                                    <input type="text" name="cargo-contato" placeholder="Cargo contato" class="form-control" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Email * </label>
                                    <input type="email" name="email_contato" placeholder="Email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Fone:</label>
                                    <input type="number" name="fone" class="form-control" placeholder="fone" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ramal:</label>
                                    <input type="number" name="ramal" class="form-control" placeholder="ramal" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Senha de acesso:</label>
                                    <input type="password" name="senha" class="form-control" id="" placeholder="********">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="">Confirmar senha de acesso:</label>
                                    <input type="password" name="conf-senha" class="form-control" id="" placeholder="********">
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