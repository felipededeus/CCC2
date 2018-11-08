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

?> <!-- Verificando se o infeliz tah logado e pode ver essa página-->


<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastro de Administrador</title>
<?php  include 'imp.css.php';  ?> <!-- Importando CSS -->

</head>
<body>

    <?php  include 'imp.java.php';  ?> <!-- Importando Scripts -->
    
<div class="container-fluid bgnav">
<?php include 'nav.php';  ?> <!-- Importando Barra de Navegação -->
</div>

 <div class="jumbotron">
    <div class="container">
      <div class="row"> 
        <div class="col-xs-12">
           <div class="col-sm-6 col-md-offset-2 col-md-8">
         <h2 class="text-center login-title"><h2>Troca de Senha:</h2> Preencha corretamente as informações abaixo:</h2>
             <div class="account-wall">
                <img class="profile-img" src="images/adm.png">
                <form class="form-cadastro" action="novasenha.controller.php" method="post">
                
           <div class="col-md-12 pt-3">
                Senha Antiga:
                <input type="password" class="form-control" placeholder="Senha" maxlength="60" required name="senha">
        </div>      
               

          <div class="col-md-6 pt-3">
                Senha:
                <input type="password" class="form-control" placeholder="Senha" maxlength="60" required name="senhanova">
        </div>
              

               <div class="col-md-6 pt-3">
                Repita a Senha:
                <input type="password" class="form-control" placeholder="Repita a Senha"  maxlength="60" required name="senhanovar">
        </div>

               
               
               
               
               <div class="col-md-12 pt-3">
                <button class="btn btn-lg btn-primary btn-block pt-3" type="submit">
                    Alterar</button>
          </div>
               
             <span class="clearfix"></span>
                </form>
            </div>
            
        </div>
        </div>
      </div>
    </div>
  </div>

  

   <?php 


                if (isset($_SESSION['altsenha'])) {
                

                if ($_SESSION['altsenha'] == "Senha Alterada com Sucesso!"){
                  echo "<script>

                  $.notify(\"Senha Alterada com Sucesso!\", {
                    type: 'success',


                    animate: {

                      enter: 'animated lightSpeedIn',
                      exit: 'animated lightSpeedOut'
                    }
                    });




                    </script> ";
                    unset ($_SESSION ['altsenha']);
                  }
                }

               if (isset($_SESSION['altsenha'])) {
                

                if ($_SESSION['altsenha'] == 0){
                  echo "<script>

                  $.notify(\"Erro ao Tentar Alterar a Senha: Verifique se as informações estão corretas e tente novamente...\", {
                    type: 'danger',


                    animate: {

                      enter: 'animated lightSpeedIn',
                      exit: 'animated lightSpeedOut'
                    }
                    });





                    </script> ";
                    unset ($_SESSION ['altsenha']);
                  }
                }

                if (isset($_SESSION['altsenha'])) {
                

                if ($_SESSION['altsenha'] == 3){
                  echo "<script>

                  $.notify(\"Atenção: Senhas Diferentes!\", {
                    type: 'danger',


                    animate: {

                      enter: 'animated lightSpeedIn',
                      exit: 'animated lightSpeedOut'
                    }
                    });





                    </script> ";
                    unset ($_SESSION ['altsenha']);
                  }
                }



                








    ?>

   

<?php include 'footer.php'; ?> <!-- Importando Rodapé -->


</body>
</html> 

