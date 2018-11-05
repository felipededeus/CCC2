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
?> <!-- Verificando se o infeliz tah logado -->

<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Relatório Geral</title>
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

					<h2 class="text-center login-title"><h2>Suas Ocorrências:</h2> <hr>
				</h2>

				<div class="account-wall">

					


					
							<?php  include 'consulta.professor.php';  ?>



				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
