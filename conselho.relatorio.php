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
  <title>Relatório de Ocorrências</title>
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
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="js/bootstrap.js"></script>

</head>
<body>
  <div class="container-fluid bgnav">
    <?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->
  </div>
  
  <div class="jumbotron">
    <div class="container">
      <div class="row"> 
        <div class="col-xs-12">
         
          <h2 class="text-center login-title"><h2>Relatório de Ocorrências</h2>
          </h2>

          <div class="account-wall">



           
              <!-- Data da Ocorrência -->

              <div class="col-md-2 pt-3">
                Data Inicial:
                <input name="dataini" class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" />
              </div>

               <div class="col-md-2 pt-3">
                Data Final:
                <input name="datafim" class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" />
              </div>





              <div class="col-md-2 pt-3">
                
                Curso
                <select name="cursosid" class="form-control form-control-lg"> 
                  <?php

                  include "conexao.class.php";
                  $sql = "SELECT * FROM cursos";
                  $stm = conexao::prepare($sql);
                  $stm->execute();    

                  while($row=$stm->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
        //print_r($row); 
                  }
                  ?>
                </select>  

              </div>





              <div class="col-md-2 pt-3">
                Matéria:
                <select name="idmateria" class="form-control form-control-lg"> 
                  <?php

                  
                  $sql = "SELECT * FROM materia";
                  $stm = conexao::prepare($sql);
                  $stm->execute();    

                  while($row=$stm->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="'.$row['IDmateria'].'">'.$row['nome'].'</option>';
        //print_r($row); 
                  }
                  ?>
                </select>  

              </div>



              <div class="col-md-2 pt-3">
                Turma
                <select name="idclasse" class="form-control form-control-lg"> 
                  <?php


                  $matu = 1;
                  $vesp = 2;
                  $notu = 3;
                  $contra = 4;  
                  
                  $sql = "SELECT * FROM classe";
                  $stm = conexao::prepare($sql);
                  $stm->execute();   



                  while($row=$stm->fetch(PDO::FETCH_ASSOC)){

                    if ($row['periestu'] == $matu) {
                      $periestu = "Matutino";
                    }

                    if ($row['periestu'] == $vesp) {
                      $periestu = "Vespertino";
                    }

                    if ($row['periestu'] == $notu) {
                      $periestu = "Noturno";
                    }

                    if ($row['periestu'] == $contra) {
                      $periestu = "Contraturno";
                    }





                    echo '<option value="'.$row['idclasse'].'">'.$row['numero'].'º'.$row['letra'].' '.$periestu.'</option>';
        //print_r($row); 
                  }
                  ?>
                </select>  

              </div>
<!-- Inserir aqui professor -->

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






<?php	include 'footer.php';	?> <!-- Importando Rodapé -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html> 

