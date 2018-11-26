<?php session_start(); 

if (isset($_SESSION['admin'])) {
  header("Location: admin.php");
  exit;
}

else{
  if (isset($_SESSION['professor'])) {
    header("Location: telaprofessor.php");
    exit;
  }
}
if (isset($_SESSION['pedagogo'])) {
    header("Location: telapedagogo.php");
    exit; }
?> <!-- Verificando se o user tah logado pra mandar pra sua página-->




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOGIN</title>

  <?php  include 'imp.css.php';  ?> <!-- Importando CSS -->
  
</head>
<body>

  <?php  include 'imp.java.php';  ?> <!-- Importando Scripts -->
  <div class="container-fluid bgnav">
    <?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->

  </div>
  <!-- HEADER --> 
  

  <header>
    <div class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
           <div class="col-sm-6 col-md-offset-4 col-md-5">
            <h2 class="text-center login-title"><h2>Bem Vindo!</h2> Entre com seu usuário e senha ou peça ajuda para um administrador.</h2>
            <div class="account-wall">
              <img class="profile-img" src="images/logosmallblack.png">


              <form class="form-signin" action="valida.php" method="post">


                <input type="text" class="form-control" id="seg1" placeholder="Usuário" name="username"  required autofocus>
                <input type="password" class="form-control" id="seg2" placeholder="Senha" name="senha"  required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                Entrar</button>

                <h5 class=" text-danger alert-danger">
                  <?php if (isset($_SESSION['ErroLogin'])){
                    echo $_SESSION['ErroLogin'];
                    unset ($_SESSION ['ErroLogin']);
                    
                        //Avisa que deu Falha no Login
                  } ?>
                </h5>



                <label class="checkbox pull-left">
                  <input type="checkbox" value="remember-me" name="manter">
                Continuar Conectado</label>
                <a href="recsenha.form.php" class="pull-right need-help">Esqueceu a Senha? </a><span class="clearfix"></span>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- / HEADER --> 

<!--  SECTION-1 -->
<?php	include 'footer.php';	?> <!-- Importando Rodapé -->
<!-- / FOOTER --> 


</body>
</html> 

