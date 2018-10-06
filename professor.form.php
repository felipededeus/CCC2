<?php session_start(); 

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;
}

else{
  if (!isset($_SESSION['senha'])) {
    header("Location: index.php");
    exit;
  }


}
?> <!-- Verificando se o infeliz tah logado -->

<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro de Professor</title>
  <!-- CSS Links -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/login.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap4.css">
</head>
<body>
  <div class="container-fluid bgnav">
    <?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->
  </div>
  
  <div class="jumbotron">
    <div class="container">
      <div class="row"> 
        <div class="col-xs-12">
         <div class="col-sm-6 col-md-offset-2 col-md-8">
          <h2 class="text-center login-title"><h2>Cadastro de Professor</h2> Preencha corretamente as informações abaixo:</h2>
          <div class="account-wall">
            <img class="profile-img" src="images/prof.ico">
            
            
            <form class="form-cadastro" action="professor.controller.php" method="post">
              
              <div class="col-md-5 pt-3">
                Nome:
                <input type="text" class="form-control" placeholder="Nome" required autofocus maxlength="60" name="nome">
              </div>
              
              
              <div class="col-md-7 pt-3">
                Sobrenome:
                <input type="text" class="form-control" placeholder="Sobrenome" required autofocus maxlength="150" name="snome">
              </div>

              <div class="col-md-12 pt-3">
                Email:
                <input type="email" class="form-control" placeholder="Email" required autofocus maxlength="100" name="email">
              </div>

                            
              <div class="col-md-12 pt-3">
                Nome de Usuário:
                
                <h5 class=" text-danger alert-danger">
                  <?php if (isset($_SESSION['jaexiste'])){
                    echo $_SESSION['jaexiste'];
                    unset ($_SESSION ['jaexiste']);
                    
                        //Avisa que User Já Existe
                  } ?>
                </h5>
                
                <input type="text" class="form-control" placeholder="Nome para efetuar login no sistema..." maxlength="60"  required autofocus name="username">
              </div>
              
              <div class="col-md-12 pt-3">
                Data de Nascimento:
                <input type="date" class="form-control" placeholder="" required autofocus maxlength="8" name="dtnasc">
              </div>
                















              <div class="col-md-6 pt-3">
                Senha:
                <input type="password" class="form-control" placeholder="Senha" required name="senha">
              </div>
              
              <div class="col-md-6 pt-3">
                Repita a Senha:
                <input type="password" class="form-control" placeholder="Repita a Senha" required name="rsenha">
              </div>
              
              <div class="col-md-12 pt-3">
                <button class="btn btn-lg btn-primary btn-block pt-3" type="submit">
                Cadastrar</button> 

              </div>
              
              <span class="clearfix"></span>
            </form>
          </div>
          <a href="#" class="text-center new-account">Criar uma conta</a>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>





<?php	include 'footer.php';	?> <!-- Importando Rodapé -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html> 

