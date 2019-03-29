<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Alunos</title>
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

		$snome = $_POST['snome'];

		$telfixo = $_POST ['telfixo'];

		$movel = $_POST ['movel'];		

		$endr = $_POST['endr'];

		$obsvr = $_POST ['obsvr'];

		$email = $_POST ['email'];

		

		

	

//Criando conexão com Banco de Dados

		$sql = "INSERT INTO responsavel (nome, snome, telfixo, movel, email, endr, obsvr) values (?,?,?,?,?,?,?)";

		$stm = conexao::prepare($sql);

		$stm->bindValue(1, $nome);
		$stm->bindValue(2, $snome);
		$stm->bindValue(3, $telfixo);
		$stm->bindValue(4, $movel);	
		$stm->bindValue(5, $email);
		$stm->bindValue(6, $endr);
		$stm->bindValue(7, $obsvr);
		
		if($stm->execute()){
			 $_SESSION ['cadok'] =  "1" ; // Gera Session se deu certo
           header('Location: resp.form.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script     ;
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