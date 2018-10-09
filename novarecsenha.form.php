<?php session_start(); ?> 


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recuperação de Senha</title>
  <?php  include 'imp.css.php';  ?> <!-- Importando CSS -->

</head>
<body>
 <?php  include 'imp.java.php';  ?> <!-- Importando Scripts -->
 <div class="container-fluid bgnav">
  <?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->

</div>
<!-- HEADER --> 

<?php $chave = "";
if ($_GET["chave"]) {
  $chave = $_GET["chave"];  ?>


  <header>
    <div class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
           <div class="col-sm-6 col-md-offset-4 col-md-5">
            <h2 class="text-center login-title"><h2>Recuperar Senha:</h2> Prencha as Informações Abaixo:</h2>
            <div class="account-wall">
              <img class="profile-img" src="images/logosmallblack.png">


              <form class="form-signin" action="novarecsenha.controller.php" method="post">

                <input type="hidden" name="chave" value="<?php echo $chave; ?>">
                <input type="text" class="form-control" placeholder="Usuário" name="username" required autofocus>
                <input type="password" class="form-control" placeholder="Nova Senha" name="senha" required>
                <input type="password" class="form-control" placeholder="Repita a Senha" name="rsenha" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                Alterar</button>

                



                
                
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- / HEADER --> 

<?php } else {

  echo '<h1> Erro 404 </h1>';

}

?>

<!--  SECTION-1 -->
<?php	include 'footer.php';	?> <!-- Importando Rodapé -->
<!-- / FOOTER --> 

</body>
</html> 

