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
  <?php  include 'imp.css.php';  ?> <!-- Importando CSS -->
</head>
<body>
 <?php  include 'imp.java.php';  ?> <!-- Importando Scripts -->
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
              Nome de Usuário:   <span id="name_status"></span>

              <h5 class=" text-danger alert-danger">
                <?php if (isset($_SESSION['jaexiste'])){
                  echo $_SESSION['jaexiste'];
                   echo "<script>

                  $.notify(\"Erro ao Cadastrar: Nome de Usuário já existe!\", {
                    type: 'danger',


                    animate: {

                      enter: 'animated lightSpeedIn',
                      exit: 'animated lightSpeedOut'
                    }
                    });




                    </script> ";
                  unset ($_SESSION ['jaexiste']);

                        //Avisa que User Já Existe
                } ?>
              </h5>

               <input type="text" class="form-control" placeholder="Nome para efetuar login no sistema..." required autofocus maxlength="60" id="UserName" name="username" onkeyup="checkname();">
             </div>

            <div class="col-md-12 pt-3">
              Data de Nascimento:
              <input type="date" class="form-control" placeholder="" required autofocus maxlength="8" name="dtnasc">
            </div>


           









            <div class="col-md-6 pt-3">
              Senha:
              <input type="password" class="form-control" placeholder="Senha" id="password" required name="senha">
            </div>

            <div class="col-md-6 pt-3">
              Repita a Senha:
              <input type="password" class="form-control" placeholder="Repita a Senha" id="confirm_password" required name="rsenha">
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


<?php if (isset($_SESSION['cadok'])){                        
  echo "<script>

  $.notify(\"Professor Cadastrado com Sucesso!\", {
    type: 'success',


    animate: {

      enter: 'animated lightSpeedIn',
      exit: 'animated lightSpeedOut'
    }
    });




    </script> ";
    unset ($_SESSION ['cadok']);

                        //Avisa que deu certo
  } ?>


<?php if (isset($_SESSION['cadsenhad'])){                        
  echo "<script>

  $.notify(\"Erro ao tentar cadastrar: Senhas diferentes!\", {
    type: 'danger',


    animate: {

      enter: 'animated lightSpeedIn',
      exit: 'animated lightSpeedOut'
    }
    });




    </script> ";
    unset ($_SESSION ['cadsenhad']);

                        //Avisa que deu certo
  } ?>



  <?php	include 'footer.php';	?> <!-- Importando Rodapé -->


</body>
</html> 

