﻿<?php

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


//Segurança de SQL INJECTION  

		

//Pegar dados do Form

		$nome = $_POST['nome'];

		$snome = $_POST['snome'];

		$sexo = $_POST ['sexo'];

		$dtnasc = $_POST['dtnasc'];

		$cgm = $_POST ['cgm'];

		$idresponsavel = $_POST ['idresponsavel'];

		$idresponsavel2 = $_POST ['idresponsavel2'];
		

	

//Criando conexão com Banco de Dados

		$sql = "INSERT INTO aluno (nome, snome, sexo, dtnasc, cgm) values (?,?,?,?,?)";

		$stm = conexao::prepare($sql);
		

		$stm->bindValue(1, $nome);
		$stm->bindValue(2, $snome);
		$stm->bindValue(3, $sexo);
		$stm->bindValue(4, $dtnasc);
		$stm->bindValue(5, $cgm);	


		
		if($stm->execute()){


			$lastid = conexao::ultid("idaluno");

			
			
			$sqlresp = "INSERT INTO responsavel_has_aluno (responsavel_idresponsavel, aluno_idaluno) values (?,?)";

			$stmresp = conexao::prepare($sqlresp);

			$stmresp->bindValue(1, $idresponsavel);
			$stmresp->bindValue(2, $lastid);

			$stmresp->execute();

			if ($idresponsavel2 != null) {

					$sqlresp2 = "INSERT INTO responsavel_has_aluno (responsavel_idresponsavel, aluno_idaluno) values (?,?)";

			$stmresp2 = conexao::prepare($sqlresp);

			$stmresp2->bindValue(1, $idresponsavel2);
			$stmresp2->bindValue(2, $lastid);
			$stmresp->execute2();

			}



			 $_SESSION ['cadok'] =  "1" ; // Gera Session se deu certo
           header('Location: aluno.form.php'); // Manda pra página de onde o user veio
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