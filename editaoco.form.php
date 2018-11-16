<?php session_start(); 

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;}


  if (!isset($_SESSION['senha'])) {
    header("Location: index.php");
    exit; }

   if (!isset($_GET['conselho'])) {
    header("Location: index.php");
    exit; }



// Busca Informações do Conselho Solicitado

    $conselho = $_GET['conselho'];
     include "conexao.class.php";
                  $sqlconselho = "SELECT * FROM conselho WHERE conselho = :conselho";
                  $stmconselho = conexao::prepare($sqlconselho);
                  $stmconselho->bindParam(':conselho', $conselho);
                  $stmconselho->execute();  

                  $rowconselho=$stmconselho->fetch(PDO::FETCH_ASSOC);

                    if (!isset($_SESSION['pedagogo']) or !isset($_SESSION['admin'])) {
                      if (isset($_SESSION['idprofessor'])) {
                        
                      
                       if ($_SESSION['idprofessor'] != $rowconselho['professor_id']) {
                        
                        header("Location: index.php"); // Manda embora se a ocorrência não for dele quando o usuário for do tipo professor
                        exit; 
                       }
                        
                      }
                    }
                   
     
                  


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
  <title>Edição de Ocorrência</title>
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
          <h2 class="text-center login-title"><h2>Edição de Ocorrência</h2> <hr>
          <h4>Preencha corretamente as informações abaixo:</h4>

          <div class="account-wall">



            <form id="formoco" class="form-cadastro" action="editaoco.controller.php" method="post">
              <!-- Data da Ocorrência -->

              <div class="col-md-7 pt-3">
                Data da Ocorrência: <br/>
                <input name="datareg" class="form-control" type="date" value="<?php
                $data = new DateTime ($rowconselho['datareg']);echo $data->format('Y-m-d'); ?>" />
              </div>





              <div class="col-md-5 pt-3">
                <br>
                Curso
                <select name="cursosid" class="form-control form-control-lg"> 
                  <?php

//                  include "conexao.class.php";
                  $sql = "SELECT * FROM cursos";
                  $stm = conexao::prepare($sql);
                  $stm->execute();    

                  while($row=$stm->fetch(PDO::FETCH_ASSOC)){

                    if ($rowconselho['cursos_id'] == $row['id']) {
                      echo '<option selected value="'.$row['id'].'">'.$row['nome'].'</option>';
                    } else {
                      echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                    }
                    
        //print_r($row); 
                  }
                  ?>
                </select>  

              </div>





              <div class="col-md-6 pt-3">
                Matéria:
                <select name="idmateria" class="form-control form-control-lg"> 
                  <?php

                  
                  $sql = "SELECT * FROM materia";
                  $stm = conexao::prepare($sql);
                  $stm->execute();    

                  while($row=$stm->fetch(PDO::FETCH_ASSOC)){
                  

                      if ($rowconselho['materia_IDmateria'] == $row['IDmateria']) {
                      echo '<option selected value="'.$row['IDmateria'].'">'.$row['nome'].'</option>';
                    } else {
                      echo '<option value="'.$row['IDmateria'].'">'.$row['nome'].'</option>';
                    }


                  }
                  ?>
                </select>  

              </div>



              <div class="col-md-6 pt-3">
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





                   
        //print_r($row); 

                      if ($rowconselho['classe_idclasse'] == $row['idclasse']) {
                      echo '<option selected value="'.$row['idclasse'].'">'.$row['numero'].'º'.$row['letra'].' '.$periestu.'</option>';
                    } else {
                      echo '<option value="'.$row['idclasse'].'">'.$row['numero'].'º'.$row['letra'].' '.$periestu.'</option>';
                    }





                  }
                  ?>
                </select>  

              </div>

              <div class="col-md-12 pt-3">

                <?php 


                 echo '<input hidden="1" name="idprofessor" class="form-control" value="'.$rowconselho['professor_id'].'"> </input>'; ?>
                 <?php  echo '<input hidden="1" name="conselho" class="form-control" value="'.$rowconselho['conselho'].'"> </input>'; ?>


              </div>

               <div class="col-md-2 pt-3">
                Número:

                <input type="number" <?php echo 'value="'.$rowconselho['numaluno'].'"';?> name="numaluno" class="form-control" id="numaluno" min="1" max="100" />
              </div>

              <?php

                  $sqlaluno = "SELECT idaluno, nome, snome FROM aluno WHERE idaluno = :idaluno";
                  $stmaluno = conexao::prepare($sqlaluno);
                  $stmaluno->bindParam(':idaluno', $rowconselho['aluno_idaluno']);
                  $stmaluno->execute();  

                  $rowaluno=$stmaluno->fetch(PDO::FETCH_ASSOC);
                  //print_r($rowaluno);


              ?>

              <div class="col-md-10 pt-3">
                Nome do Aluno:

                <input value="<?php echo $rowaluno['nome'].' '.$rowaluno['snome'];?>" type="text" name="aluno" class="form-control" id="aluno"/>
                <input value="<?php echo $rowaluno['idaluno'];?>" type="text" hidden="1" name="idaluno" class="form-control" id="idaluno"/>
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
                Ocorrências:
                <select name="idocorrencias" class="form-control form-control-lg"> 
                  <?php

                  
                  $sql = "SELECT * FROM ocorrencias";
                  $stm = conexao::prepare($sql);
                  $stm->execute();    

                  while($row=$stm->fetch(PDO::FETCH_ASSOC)){
                    
        //print_r($row); 

                     if ($rowconselho['ocorrencias_idocorrencias'] == $row['idocorrencias']) {
                      echo '<option selected value="'.$row['idocorrencias'].'">'.$row['nome'].'</option>';
                    } else {
                      echo '<option value="'.$row['idocorrencias'].'">'.$row['nome'].'</option>';
                    }

                  }
                  ?>
                </select>  

              </div>


<div class="col-md-12 pt-3">









</div>


<div class="col-md-12 pt-3">
  Observações:



  <textarea name="observ" class="form-control" maxlength="200"><?php echo $rowconselho['observ'];?></textarea>

</div>













<div class="col-md-12 pt-3">
  <button class="btn btn-lg btn-primary btn-block pt-3" type="submit">
 Atualizar</button> 

</div>

<span class="clearfix"></span>
</form>
</div>
</div>
</div>
</div>
</div>
</div>





<?php	include 'footer.php';	?> <!-- Importando Rodapé -->

</body>
</html> 

