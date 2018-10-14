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

if (!isset($_SESSION['admin'])) {
  header("Location: index.php");    
  exit;      

}
?> <!-- Verificando se o infeliz tah logado e pode ver essa página-->


<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro de Matérias</title>
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
          <h2 class="text-center login-title"><h2>Cadastro de Matérias</h2> Preencha corretamente as informações abaixo:</h2>
          <div class="account-wall">
            <img class="profile-img" src="images/book.png">
            <form class="form-cadastro" action="materia.controller.php" method="post">
              
              <div class="col-md-5 pt-3">
                Nome:
                <input type="text" class="form-control" placeholder="Nome da Matéria" required autofocus maxlength="60"  name="nome">
              </div>
              
              
              <div class="col-md-7 pt-3">
                Descrição:
                <input type="text" class="form-control" placeholder="Descrição" required autofocus name="descr" maxlength="100">
              </div>
              
              
              <div class="col-md-12 pt-3">
                <button class="btn btn-lg btn-primary btn-block pt-3" type="submit">
                Cadastrar</button>
              </div>
              
              <span class="clearfix"></span>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>

<?php if (isset($_SESSION['cadok'])){                        
                        echo "<script>

                  $.notify(\"Matéria Cadastrada com Sucesso!\", {
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
   



<?php	include 'footer.php';	?> <!-- Importando Rodapé -->


</body>
</html> 

