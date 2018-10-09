
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


  $datareg = $_POST['datareg'];   
  $idprofessor = $_POST['idprofessor'];
  $idmateria = $_POST['idmateria'];
  $idaluno = $_POST['idaluno'];
  $numaluno = $_POST['numaluno'];
  $idclasse = $_POST['idclasse'];
  $observ = $_POST['observ'];
  $cursosid= $_POST['cursosid'];




$sql = "SELECT idocorrencias FROM ocorrencias";
                  $stm = conexao::prepare($sql);
                  $stm->execute();    
                 

                 
                 

                  while($row=$stm->fetch(PDO::FETCH_ASSOC)){

                    // Cria as Variaveis com o numero de cadastros no banco
                     $declaravariavel = '$check'.$row['idocorrencias'].'= "nada" ;';
                      eval($declaravariavel);  

                       $postsverificados = 1;
                       $postsquetem= 0;
                     


                      $fazascoisas ='
                    if (isset($_POST[\'check'.$row['idocorrencias'].'\'])) 
                    { $check'.$row['idocorrencias'].' = $_POST[\'check'.$row['idocorrencias'].'\']; 
                    $postsquetem = $postsquetem + 1;


                      $sql2 = "INSERT INTO conselho (datareg, professor_id, materia_IDmateria, aluno_idaluno, ocorrencias_idocorrencias, classe_idclasse, observ, numaluno, cursos_id) values (:datareg, :idprofessor, :idmateria, :idaluno, :idocorrencias, :idclasse, :observ, :numaluno, :cursosid)";

    $stm2 = conexao::prepare($sql2);

    $stm2->bindValue(\':datareg\', $datareg);
    $stm2->bindValue(\':idprofessor\', $idprofessor);
    $stm2->bindValue(\':idmateria\', $idmateria);
   $stm2->bindValue(\':idaluno\', $idaluno);
   $stm2->bindValue(\':idocorrencias\', $check'.$row['idocorrencias'].');
   $stm2->bindValue(\':idclasse\', $idclasse);
   $stm2->bindValue(\':observ\', $observ);
   $stm2->bindValue(\':numaluno\', $numaluno);
   $stm2->bindValue(\':cursosid\', $cursosid);   

   if($stm2->execute()){
 echo \'
   <div class="alert alert-success" role="alert">
   Informações Cadastradas!
   </div>
    \'; }

                     } '  ;

                     eval($fazascoisas); 
                    
                    $postsverificados = $postsverificados + 1;


                    //$1 = 1
                    //$2 = 2
                    //$3 = 3                                       

                  }
              

                       


                      
                     




                      

                    

                   
       
                




 // $sql = "INSERT INTO conselho (datareg, professor_id, materia_IDmateria, aluno_idaluno, ocorrencias_idocorrencias, classe_idclasse, observ, cursos_id) values (:datareg, :idprofessor, :idmateria, :idaluno, :idocorrencias, :idclasse, :observ, :cursosid)";

  //  $stm = conexao::prepare($sql);

    //$stm->bindValue(':datareg', $datareg);
  //  $stm->bindValue(':idprofessor', $idprofessor);
   // $stm->bindValue(':idmateria', $idmateria);
 //   $stm->bindValue(':idaluno', $idaluno);
   // $stm->bindValue(':idocorrencias', $idocorrencias);
  //  $stm->bindValue(':idclasse', $idclasse);
   // $stm->bindValue(':observ', $observ);
 //   $stm->bindValue(':cursosid', $cursosid);   

    
//if($stm->execute()){
// echo '
  // <div class="alert alert-success" role="alert">
  // Informações Cadastradas!
  // </div>
 //   ';
//}




  //  ?>	





</div>





<?php	include 'footer.php'; ?> <!-- Importando Rodapé -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html> 