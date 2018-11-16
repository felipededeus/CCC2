
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Ocorrências</title>
	<!-- CSS Links -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/login.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap4.css">
</head>
<body>

	<div class="container-fluid bgnav">
		<?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->
	</div>

	<div class="jumbotron">


		<?php


include "conexao.class.php";
  //verifica se existe conexão com bd; caso não tenta, cria uma nova


//Pegar dados do Form

  $conselho = $_POST['conselho'];
  $datareg = $_POST['datareg'];   
  $idprofessor = $_POST['idprofessor'];
  $idmateria = $_POST['idmateria'];
  $idaluno = $_POST['idaluno'];
  $numaluno = $_POST['numaluno'];
  $idclasse = $_POST['idclasse'];
  $observ = $_POST['observ'];
  $cursosid= $_POST['cursosid'];
  $idocorrencias= $_POST['idocorrencias'];
                      

                    

                   
       
                




  $sql = "UPDATE conselho SET datareg = :datareg , professor_id = :idprofessor , materia_IDmateria = :idmateria, aluno_idaluno = :idaluno, ocorrencias_idocorrencias = :idocorrencias, classe_idclasse = :idclasse, observ = :observ, cursos_id = :cursosid ";

   $stm = conexao::prepare($sql);

  $stm->bindValue(':datareg', $datareg);
 $stm->bindValue(':idprofessor', $idprofessor);
 $stm->bindValue(':idmateria', $idmateria);
 $stm->bindValue(':idaluno', $idaluno);
$stm->bindValue(':idocorrencias', $idocorrencias);
$stm->bindValue(':idclasse', $idclasse);
$stm->bindValue(':observ', $observ);
$stm->bindValue(':cursosid', $cursosid);   

    
if($stm->execute()){
 echo '
 <div class="alert alert-success" role="alert">
 Informações Cadastradas!
 </div>
 ';

 $_SESSION ['editok'] =  "1" ; 

}

 header('Location: index.php'); // Manda o cara pra outro lugar pq ficar aqui vai ser meio improdutivo
           exit(); // Para o Script                          
                     


  ?>	





</div>





<?php	include 'footer.php'; ?> <!-- Importando Rodapé -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html> 