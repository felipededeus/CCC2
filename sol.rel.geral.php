<?php session_start(); 

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;}


  if (!isset($_SESSION['senha'])) {
    header("Location: index.php");
    exit; }



date_default_timezone_set('America/Sao_Paulo'); // Definindo Zona de Tempo para Preencher Sozinho no Form
?> <!-- Verificando se o infeliz tah logado -->

<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Relatório Geral</title>
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
         
          <h2 class="text-center login-title"><h2>Relatório Geral: Solicitar</h2> <hr>
          </h2>

          <div class="account-wall">


              <form method="post" action="rel.geral.php">
           
              <!-- Data da Ocorrência -->

              <div class="col-md-6 pt-3">
                Data Inicial:
                <input name="dataini" class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" required />
              </div>

               <div class="col-md-6 pt-3">
                Data Final:
                <input name="datafim" class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" required/>
              </div>

              <div class="col-md-12 pt-3">
                
                <input id="quebrar" name="quebrar" class="" type="checkbox" value="sim" />
                <label for="quebrar">Imprimir cada relatório em uma página separada (Pode gerar maior custo de impressão)</label>
              </div>





 <button type="submit" class="btn btn-primary col-md-12 mt-3  ">Gerar relatório
 </button>






<span class="clearfix">

</span>


</form>
</div>
</div>
</div>
</div>
</div>






<?php	include 'footer.php';	?> <!-- Importando Rodapé -->


</body>
</html> 

