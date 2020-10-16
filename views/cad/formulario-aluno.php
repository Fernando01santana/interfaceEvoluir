<?php include('../../public/header.php');?>
<?php include('../../public/navbar.php');?>
<div class="container">
   
            <form method="POST" action="../../database/dados-alunos.php" class="shadow-lg p-3 mb-5 bg-white rounded formulario">
                <h3 align="center">Realize  seu cadastro</h3>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1">Nome completo:</label>
                        <input type="email" class="form-control" id="validationTooltip04" aria-describedby="emailHelp" placeholder="Nome" required>
                        <small id="emailHelp" class="form-text text-muted">Utilize apenas letras maiusculas</small>
                       
                    </div>
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Nome da mãe:</label>
                        <input type="email" class="form-control" id="validationTooltip04" aria-describedby="emailHelp" placeholder="Nome da mãe" required>
                        <small id="emailHelp" class="form-text text-muted">Utilize apenas letras maiusculas</small>
                       
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">Data de nacimento:</label>
                        <input type="date" class="form-control" id="validationTooltip04" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">Utilize apenas letras maiusculas</small>
                       
                    </div>
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Instituição de ensino:</label>
                        <input type="email" class="form-control" id="validationTooltip04" aria-describedby="emailHelp" placeholder="Instituição de ensino" required>
                        <small id="emailHelp" class="form-text text-muted">Utilize apenas letras maiusculas</small>
                       
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1">Numero de matricula na instituição</label>
                        <input type="email" class="form-control" id="validationTooltip04" aria-describedby="emailHelp" placeholder="Matricula" required>
                        <small id="emailHelp" class="form-text text-muted">Utilize apenas letras maiusculas</small>
                       
                    </div>
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Ano de conclusão da formação:</label>
                        <input type="date" class="form-control" id="validationTooltip04" aria-describedby="emailHelp" placeholder="Ano de formação" required>
                        
                        <small id="emailHelp" class="form-text text-muted">Utilize apenas letras maiusculas</small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-block">cadastrar</button>
                    </div>
                </div>
            </form>

</div>

<?php include('../../public/footer.php');?>