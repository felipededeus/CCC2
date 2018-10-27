﻿<?php session_start(); 

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
	<title>Turmas</title>
	<?php  include 'imp.css.php';  ?> <!-- Importando CSS -->
</head>
<body>


 <?php  include 'imp.java.php';  ?> <!-- Importando Scripts -->

<script type="text/javascript">
	
	



	$('#formedit').submit(function(e) {
		var dados = jQuery( this ).serialize();
		e.preventDefault();
		$.ajax({
        url: 'edit.turma.php', // caminho para o script que vai processar os dados
        type: 'POST',
        data: { dados:dados, },
        success: function(response) {
            $("#resultados").load("adm.curso.php #resultados"); //parte da mesma página
        },
        error: function(xhr, status, error) {
        	alert(xhr.responseText);
        }
    });
		return false;
	}); 



	$('#formdel').submit(function(e) {
		var dados = jQuery( this ).serialize();
		e.preventDefault();
		$.ajax({
        url: 'del.curso.php', // caminho para o script que vai processar os dados
        type: 'POST',
        data: { dados:dados, },
        success: function(response) {
            $("#resultados").load("adm.curso.php #resultados"); //parte da mesma página
        },
        error: function(xhr, status, error) {
        	alert(xhr.responseText);
        }
    });
		return false;
	}); 




</script>

	<div class="container-fluid bgnav">
		<?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->
	</div>


	<div class="jumbotron" >
		<center><h2 class="display-4 pb-1 recuar">Turmas<div class="bodir"></h2> </center>

			<!-- Inicio Card -->
			<?php if (isset($_SESSION['admin'])) {
		echo '
			<div class="" style="width: 100%;">
				
				<div class="card-body">
					
										<center>
					<a href="../turma.form.php" class="btn btn-dacor m-1" style="width: 100%;"><img src="../images/edit.png" width="20px" /> Cadastrar Nova Turma</a>
				</center>
				</div>
			</div> ';}
			?>
			<!--Fim Card-->

		


		<div class="card-columns cards" > <center>

			


			<?php

			include "../conexao.class.php";
			$sql = "SELECT * FROM classe";
			$stm = conexao::prepare($sql);
			$stm->execute();  
			$matu = 1;
			$vesp = 2;
			$notu = 3;
			$contra = 4;  

			

			while($row=$stm->fetch(PDO::FETCH_ASSOC)){
				if ($row['periestu'] == $matu) {
					$periestu = "Matutino";
				}

				if ($row['periestu'] == $vesp) {
					$periestu = "Vespertino";
				}

				if ($row['periestu'] == $notu) {
					$periestu = "Noturno";
				}

				if ($row['periestu'] == $contra) {
					$periestu = "Contraturno";
				}

				echo ' 

				<!-- Inicio Card-->
				<div class="card cardbg" style="width: 18rem;">
				<img class="m-1" src="../images/class.png" alt="Card image cap" width="140px;">
				<div class="card-body">
				
				<p class="card-text">'.$row['numero'] .$row['letra'].'</p>
				<h5 class="btn-dacor p-1">'.$periestu.'</h5>
				<center>
				

				<a href="#" class="btn btn-dacor m-1"><img src="../images/edit.png" width="20px" /></a>
				<a href="#" class="btn btn-dacor m-1"><img src="../images/del.png" width="20px" /></a>
				</center>
				</div>
				</div>
				<!-- Fim Card-->






				';
        //print_r($row); 
			}
			?>
 </center>



		</div> <!-- /card-deck-->



	</div> <!-- /jumbotron-->



	<?php	include '../footer.php';	?> <!-- Importando Rodapé -->

	
</body>
</html> 

