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

$nome = preg_replace('/[À-Úà-ú]/','', $_POST['nome']);
$snome = preg_replace('/[À-Úà-ú]/','', $_POST['snome']);
$nomeresp = preg_replace('/[À-Úà-ú]/','', $_POST['teleresp']);
$teleresp = preg_replace('/[À-Úà-ú]/','', $_POST['teleresp']);
$matriescol = preg_replace('/[0-9]/','', $_POST['matriescol']);
$cgm = preg_replace('/[0-9]/','', $_POST['cgm']);
$emailresp = preg_replace('/[À-Úà-ú]/','', $_POST['emailresp']);
		

//Pegar dados do Form

		$nome = $_POST['nome'];

		$snome = $_POST['snome'];

		$nomeresp = $_POST ['nomeresp'];

		$teleresp = $_POST ['teleresp'];

		$sexo = $_POST ['sexo'];

		$dtnasc = $_POST['dtnasc'];

		$matriescol = $_POST['matriescol'];

		$cgm = $_POST ['cgm'];

		$emailresp = $_POST ['emailresp'];

		

		

	

//Criando conexão com Banco de Dados

		$sql = "INSERT INTO aluno (nome, snome, nomeresp, teleresp, sexo, dtnasc, matriescol, emailresp, cgm) values (?,?,?,?,?,?,?,?,?)";

		$stm = conexao::prepare($sql);

		$stm->bindValue(1, $nome);
		$stm->bindValue(2, $snome);
		$stm->bindValue(3, $nomeresp);
		$stm->bindValue(4, $teleresp);	
		$stm->bindValue(5, $sexo);
		$stm->bindValue(6, $dtnasc);
		$stm->bindValue(7, $matriescol);
		$stm->bindValue(8, $emailresp);
		$stm->bindValue(9, $cgm);	


		
		if($stm->execute()){
			echo '
			<div class="alert alert-success centralizar aumentar" role="alert">
			Aluno Cadastrado
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