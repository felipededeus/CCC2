<?php 

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
  <title>Cadastro de Aluno</title>
  <!-- CSS Links -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/login.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap4.css">
</head>
<body>



   
      <div class="row"> 
        <div class="col-xs-12">
         <div class="col-sm-6 col-md-offset-2 col-md-8">
          <h2 class="text-center login-title"><h2>Cadastro de Alunos</h2> Preencha corretamente as informações abaixo:</h2>
         
            <img class="profile-img" src="images/aluno.png">
            <form class="form-cadastro" action="aluno.controller.php" method="post">

              <div class="col-md-5 pt-3">
                Nome:
                <input type="text" class="form-control" placeholder="Nome" name="nome" required autofocus>
              </div>
              
              
              <div class="col-md-7 pt-3">
                Sobrenome:
                <input type="text" class="form-control" placeholder="Sobrenome" name="snome" required autofocus>
              </div>

              <div class="col-md-12 pt-3">
                Nome Do Responsável:
                <input type="text" class="form-control" placeholder="Rose" name="nomeresp" required autofocus>
              </div>

              <div class="col-md-12 pt-3">
                Telefone Do Responsável:
                <input type="numeric" class="form-control" placeholder="" name="teleresp" required autofocus>
              </div>




              <div class="col-md-12 pt-3">
                Sexo:



                <label class=" radio-inline"><input type="radio" name="sexo" value="1"> Masculino </label>
                <label class="radio-inline"><input type="radio" name="sexo" value="0"> Feminino  </label>

              </div>


              <div class="col-md-12 pt-3">
                Data de Nascimento:
                <input type="date" class="form-control" placeholder="" name="dtnasc" required autofocus>
              </div>


              <div class="col-md-12 pt-3">
                Matrícula Escolar:
                <input type="numeric" class="form-control" placeholder="1454" name="matriescol" required autofocus>
              </div>

              <div class="col-md-12 pt-3">
                Cadastro Geral de Matrícula (CGM):
                <input type="numeric" class="form-control" placeholder="23912" name="cgm" required autofocus>
              </div>
                <!--
              <div class="col-md-12 pt-3">
                Turma Associada:
                <select name="turma" class="form-control form-control-lg"> 
                  <?php

                  include "conexao.class.php";
                  $sql = "SELECT * FROM classe";
                  $stm = conexao::prepare($sql);
                  $stm->execute();    

                  while($row=$stm->fetch(PDO::FETCH_ASSOC)){
                   echo '<option value="'.$row['idclasse'].'">'.$row['nomeclasse'].'</option>';

                 }
                 ?>
               </select>  
             </div> -->



             <div class="col-md-12 pt-3">
              E-mail Responsavel:
              <input type="E-mail" class="form-control" placeholder="Sobrenome" name="emailresp" required autofocus>
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









<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html> 

