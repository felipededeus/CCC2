<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Turma</title>
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

include("conexao.class.php");   //verifica se existe conexão com bd; caso não tenta, cria uma nova


//Segurança de SQL INJECTION  

$letra = preg_replace('/[À-Úà-ú]/','', $_POST['letra']);
$numero = preg_replace('/[0-9]/','', $_POST['numero']);

//Pegar dados do Form

    $letra = $_POST['letra'];

    $numero = $_POST['numero'];

    $periestu = $_POST['periestu'];

    


//Criando conexão com Banco de Dados

    $sql = "INSERT INTO classe (letra, numero, periestu) values (?,?,?)";

	$stm = conexao::prepare($sql);

$stm->bindValue(1, $letra);
$stm->bindValue(2, $numero);
$stm->bindValue(3, $periestu);

  
if($stm->execute()){
  echo '
  <div class="alert alert-success" role="alert">
  Turma Cadastrada
  </div>
    ';
}

   


    ?>	





</div>





<?php	include 'footer.php'; ?> <!-- Importando Rodapé -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html> 