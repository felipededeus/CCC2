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
  <title>Cadastro de Responsável</title>



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
          <h2 class="text-center login-title"><h2>Cadastro de Pais ou Responsáveis</h2> Preencha corretamente as informações abaixo:</h2>
          <div class="account-wall">
            <img class="profile-img" src="images/users-1.png">
            <form class="form-cadastro" action="resp.controller.php" method="post">

              <div class="col-md-5 pt-3">
                Nome:
                <input type="text" class="form-control" placeholder="Nome" name="nome" maxlength="60"  required autofocus>
              </div>
              
              
              <div class="col-md-7 pt-3">
                Sobrenome:
                <input type="text" class="form-control" placeholder="Sobrenome" name="snome" maxlength="150" required autofocus>
              </div>    

            
             

            <script type="text/javascript">

              $(document).ready(function(){
                $('#movel').mask('(00) 0 0000-0000');
              })

              $(document).ready(function(){
                $('#fixo').mask('(00) 0000-0000');
              })
            </script>



            <div class="col-md-12 pt-3">
              Telefone Móvel Do Responsável:
              <input type="numeric" id="movel" class="form-control" placeholder="(00) 0 0000-0000" name="movel" maxlength="17" autofocus>
            </div>

            <div class="col-md-12 pt-3">
              Telefone Fixo Do Responsável:
              <input type="numeric" id="fixo" class="form-control" placeholder="(00) 0000-0000" name="telfixo" maxlength="14" autofocus>
            </div>


            <div class="col-md-12 pt-3">
              E-mail Responsável:
              <input type="email" class="form-control" placeholder="exemplo@provedor.com" name="email" maxlength="100" required autofocus>
            </div>


              <div class="col-md-12 row-md-5 pt-3">
              Endereço:
              <textarea class="form-control" name="endr" maxlength="250">Rua e Número:
Bairro:
Complemento:
Cidade: Cascavel - PR          
              </textarea>
            </div>

             <div class="col-md-12 pt-3">
              Observações:
              <textarea class="form-control" name="obsvr" maxlength="250"></textarea>
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

  $.notify(\"Responsável Cadastrado com Sucesso!\", {
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

