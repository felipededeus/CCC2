<?php session_start(); 

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;}


  if (!isset($_SESSION['senha'])) {
    header("Location: index.php");
    exit; }

if (!isset($_SESSION['idprofessor'])) {
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
  <title>Cadastro de Ocorrência</title>
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
          <h2 class="text-center login-title"><h2>Cadastro de Ocorrência</h2>
          <?php if (!isset($_SESSION['idprofessor'])) {
            echo '<div class="alert-danger col-md-12"><h2> Atenção:</h2><h4> Você não está logado como professor, Portanto não será possível cadastrar informações corretamente.</h4> <a href="logout.php"> Clique aqui para trocar de usuário </a> </div> '; exit;
          }
          ?> Preencha corretamente as informações abaixo:</h2>

          <div class="account-wall">



            <form id="formoco" class="form-cadastro" action="ocorrencia.controller.php" method="post">
              <!-- Data da Ocorrência -->

              <div class="col-md-7 pt-3">
                Data da Ocorrência: <br/>(Preenchido Automaticamente com o dia atual)
                <input name="datareg" class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" />
              </div>





              <div class="col-md-5 pt-3">
                <br>
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





              <div class="col-md-6 pt-3">
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





                    echo '<option value="'.$row['idclasse'].'">'.$row['numero'].'º'.$row['letra'].' '.$periestu.'</option>';
        //print_r($row); 
                  }
                  ?>
                </select>  

              </div>

              <div class="col-md-12 pt-3">

                <?php  echo '<input hidden="1" name="idprofessor" class="form-control" value="'.$_SESSION['idprofessor'].'"> </input>'; ?>

              </div>

               <div class="col-md-2 pt-3">
                Número:

                <input type="number"  name="numaluno" class="form-control" id="numaluno" min="1" max="100" />
              </div>

              <div class="col-md-10 pt-3">
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
<!--

 <div class="col-md-12 pt-3">
                Ocorrências:
                <select name="idocorrencias" class="form-control form-control-lg"> 
                  <?php

                  
                  $sql = "SELECT * FROM ocorrencias";
                  $stm = conexao::prepare($sql);
                  $stm->execute();    

                  while($row=$stm->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="'.$row['idocorrencias'].'">'.$row['nome'].'</option>';
        //print_r($row); 
                  }
                  ?>
                </select>  

              </div>
-->

<div class="col-md-12 pt-3">









 <div class="col-md-12 pt-3">
                Ocorrências:
                
                  <?php

                  
                  $sql = "SELECT * FROM ocorrencias";
                  $stm = conexao::prepare($sql);
                  $stm->execute();    

                  while($row=$stm->fetch(PDO::FETCH_ASSOC)){
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="checkbox" value="'.$row['idocorrencias'].'" id="check'.$row['idocorrencias'].'" name="check'.$row['idocorrencias'].'"/>';

                    echo ' <label for="check'.$row['idocorrencias'].'" class=" form-check form-check-label "  ><h4>'.$row['nome'].'</h4></label>';
                    echo '</div>';
        //print_r($row); 
                  }
                  ?>
                

              </div> </div>


<div class="col-md-12 pt-3">
  Observações:



  <textarea name="observ" class="form-control" maxlength="200"></textarea>

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

                  $.notify(\"informações cadastradas com sucesso!\", {
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

