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

 <?php  include 'imp.css.php';  ?> <!-- Importando CSS -->

  

</head>
<body>

 <?php  include 'imp.java.php';  ?> <!-- Importando Scripts -->


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
    
    <div class="col-md-6 pt-3">
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
    


    <div id="resultado"> </div>








</div> <!-- /jumbotron-->



<?php	include 'footer.php';	?> <!-- Importando Rodapé -->



</body>
</html> 

