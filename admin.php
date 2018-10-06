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
<html lang="pt-br">
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administração</title>
  <!-- CSS Links -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/login.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap4.css">

  <script src="js/jquery-ui.min.js"></script> 
  
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="js/bootstrap.js"></script>

  <script>
    $( function() {
      $( "#accordion" ).accordion();
    } );
  </script>

</head>
<body>
  <div class="container-fluid bgnav">
    <?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->
  </div>


  <div class="jumbotron m-5" >
  
    <!-- Modal -->
    <div class="modal fade" id="ModalCadastros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           <h4>
             Cadastros
            </h4> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"> </h4>
          </div>
          <div class="modal-body">
              <!-- Button trigger modal -->
          <a href="admin.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>  Adminstrador
          </a>

          <!-- Button trigger modal -->
          <a href="pedagogo.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>  Pedagogo
          </a>

          <!-- Button trigger modal -->
          <a href="aluno.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>  Aluno
          </a>

          <!-- Button trigger modal -->
          <a href="turma.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>Turma
          </a>

          <!-- Button trigger modal -->
          <a href="cadocorren.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>Ocorrência
          </a>
          <!-- Button trigger modal -->

          <a href="materia.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
           <img src="images/add.png" width="18px"/> Matéria
         </a>

         <!-- Button trigger modal -->
         <a href="curso.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
          <img src="images/add.png" width="18px"/>  Curso
             
           <!-- Button trigger modal -->
         <a href="professor.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
          <img src="images/add.png" width="18px"/>  Professor
        </a>
      </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>            
          </div>
        </div>
      </div>
    </div>

    <!-- Fim Modal -->
      
        <!-- Modal -->
    <div class="modal fade" id="ModalRelatorios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           <h4>
             Relatórios
            </h4> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"> </h4>
          </div>
          <div class="modal-body">
              <!-- Button trigger modal -->
          <a href="admin.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>  Adminstrador
          </a>

          <!-- Button trigger modal -->
          <a href="pedagogo.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>  Pedagogo
          </a>

          <!-- Button trigger modal -->
          <a href="aluno.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>  Aluno
          </a>

          <!-- Button trigger modal -->
          <a href="turma.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>Turma
          </a>

          <!-- Button trigger modal -->
          <a href="cadocorren.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>Ocorrência
          </a>
          <!-- Button trigger modal -->

          <a href="materia.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
           <img src="images/add.png" width="18px"/> Matéria
         </a>

         <!-- Button trigger modal -->
         <a href="curso.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
          <img src="images/add.png" width="18px"/>  Curso
             
           <!-- Button trigger modal -->
         <a href="professor.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
          <img src="images/add.png" width="18px"/>  Professor
        </a>
      </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>            
          </div>
        </div>
      </div>
    </div>

    <!-- Fim Modal -->


    <h2 class="display-4 pb-5 ml-5">Painel Administrativo:</h2>
      
      <center>
        <!-- Button trigger modal -->
    <div class="btn btn-dacor"  style="color: #fff;" data-toggle="modal" data-target="#ModalCadastros"> <h4>   Cadastros    </h4>   </div>
        <!-- Fim Button trigger modal -->
        
         <!-- Button trigger modal -->
    <div class="btn btn-dacor"  style="color: #fff;" data-toggle="modal" data-target="#ModalRelatorios"> <h4>  Relatórios    </h4>   </div>
        <!-- Fim Button trigger modal -->
        
        </center>
      
    </button>





  


</div> <!-- /jumbotron-->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
<?php	include 'footer.php';	?> <!-- Importando Rodapé -->


</body>
</html> 

