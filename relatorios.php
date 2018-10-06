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
<title>Relatórios</title>
  <!-- CSS Links -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/jquery-ui.min.css">
  <link rel="stylesheet" href="jquery-ui.structure.min.css">
  <link rel="stylesheet" href="jquery-ui.theme.min.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap4.css">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="js/jquery-3.3.1.min.js"></script> 
  <script src="js/jquery-ui.min.js"></script> 
  <!-- Include all compiled plugins (below), or in


</head>
<body>
<div class="container-fluid bgnav">
  <?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->
</div>


<div class="jumbotron" >
  <center><h2 class="display-4 pb-1 recuar">Relatórios<div class="bodir"></h2> </center>
    
    
    
    
    <form method="get" action="relatorios.php">
        <hr>
     <h4>
       
       Pesquisa por aluno: </h4>
    
  <div class="form-row">
    
    <div class="col-md-12 pt-3">
                Nome do Aluno:

                <input type="text" name="aluno" class="form-control" id="aluno"/>
                <input type="text" hidden="1" name="idaluno" class="form-control" id="idaluno"/>
                <div id="mydiv"> </div>

              </div>      


              <script>

                $('#aluno').autocomplete({ source: 'completar.php?acao=autocomplete', minLength: 2, autoFocus: true, appendTo: '#formoco',


                  select: function(e,ui){
                    e.preventDefault();
    // set value in your element
    $(this).val(ui.item.label);
    // set value in the hidden field
    $('#idaluno').val(ui.item.value);
  },



});



</script>
    
  </div> <hr>
      
      <button type="submit">
        Enviar
      </button>
      
      
</form>
    


    <div id="resultado"> <?php
      
      
      $idal= $_GET['idaluno'];      
      include 'relatorios.controller.php'; ?></div>








</div> <!-- /jumbotron-->



<?php	include 'footer.php';	?> <!-- Importando Rodapé -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html> 

