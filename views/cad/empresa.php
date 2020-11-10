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
                            <img src="img/logo-empresa.png" class="logo" alt=""><h1> Empresa</h1>
                            <h6>Validação:</h6>
                            <?php 
                            if(isset($_SESSION['empresa-dados'])){
                                echo $_SESSION['empresa-dados'];
                                session_destroy();
                            }
                            ?>
                        </div>
                        <form method="POST" action="../../database/dados-empresa.php">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Tipo de pessoa:</label>
                                     <select class="form-control" name="tipoPessoa" id="">
                                         <option value="0">Selecione</option>
                                         <option value="pessoa_juridica">Pessoa Juridica</option>
                                         <option value="pessoa_fisica">Pessoa Fisica</option>
                                     </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nome da empresa:</label>
                                    <input type="text" class="form-control" name="nome" placeholder="nome da empresa">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Email da empresa</label>
                                <input type="email" class="form-control" name="email" placeholder="Email da empresa">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">CNPJ</label>
                                <input type="text" class="form-control" name="cnpj" placeholder="CNPJ">
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Estado UF:</label>
                                <input type="text" class="form-control" name="uf"id="inputAddress" placeholder="Estado UF" maxlength="11"  required>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Objetivo:</label>
                                <select name="obj" class="form-control" id="">
                                    <option value="0">selecione</option>
                                    <option value="1">Abertura de Oportunidade para estagios</option>
                                    <option value="2">Abetura de Oportunidade para Aprendiz</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputCity">Tipo de empresa:</label>
                                    <select class="form-control" name="tipo_empresa" id="" required>
                                        <option value="0">Selecione</option>
                                        <option value="empresa_privada">Empresa Privada</option>
                                        <option value="empresa_publica">Empresa Publica</option>
                                        <option value="empresa_mista">Empresa Mista</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Senha:</label>
                                    <input type="password" class="form-control" name="senha" placeholder="********" id="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Confirmar senha:</label>
                                    <input type="password" class="form-control" name="conf-senha" placeholder="********" id="">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Cadastrar</button>
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