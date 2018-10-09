<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Professor</title>
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


		



//Pegar dados do Form

    $nome = $_POST['nome'];

    $desc = $_POST['descr'];

    


//Criando conexão com Banco de Dados

    $sql = "INSERT INTO materia (nome, descr) values (?,?)";

	$stm = conexao::prepare($sql);

$stm->bindValue(1, $nome);
$stm->bindValue(2, $desc);

  
if($stm->execute()){
  echo '
  <div class="alert alert-success" role="alert">
  Matéria Cadastrada
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