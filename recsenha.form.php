<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Recuperar Senha</title>
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
			   <h2 class="text-center login-title"><h2>Recuperar</h2> Insira seu nome de usuário em seguida, um link de recuperação de senha será enviado para seu email:</h2>
             <div class="account-wall">
                <img class="profile-img" src="images/logosmallblack.png">
                <form class="form-signin" action="recsenha.controller.php" method="post">

                <input type="text" class="form-control" placeholder="Nome de Usuário" name="username" required autofocus>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Recuperar</button>

                <h5 class=" text-danger alert-danger">
                      <?php if (isset($_SESSION['nexiste'])){
                        echo $_SESSION['nexiste'];
                        unset ($_SESSION ['nexiste']);
                       
                        //Avisa que deu Falha na Recuperação
                      } ?>
              
                </form>

                 
                    </h5>

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

