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

						<!-- Modal Editar -->
						<div class="modal fade" id="ModalEdit'.$row['idclasse'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
						<div class="modal-content">
						<div class="modal-header">
						<h4>
						Editar:
						</h4> 
						<hr>
						<button type="button" class="close" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"> </h4>
						</div>
						<div class="modal-body">

						<!-- Colocar Form aqui -->
						<form class="form-cadastro" action="edit.turma.php" method="post"  id="formedit">

						<input type="text" value="'.$row['idclasse'].'" class="form-control" placeholder="Nome da Matéria" required autofocus maxlength="60"  name="IDmateria" hidden="1">';
						$periestuedit = $row['periestu'];

						switch ($periestuedit) {
    case 1:
       echo '

						<div class="col-md-12 pt-3">
						Período Etudantil:
						<select class="form-control form-control-lg" name="periestu">
						<option value="1" selected>Matutino</option>
						<option value="2">Vespertino</option>
						<option value="3">Noturno</option>
						<option value="4">Contraturno</option>
						</select> 
						</div> ';
						break;

    case 2:
       echo '

						<div class="col-md-12 pt-3">
						Período Etudantil:
						<select class="form-control form-control-lg" name="periestu">
						<option value="1">Matutino</option>
						<option value="2" selected>Vespertino</option>
						<option value="3">Noturno</option>
						<option value="4">Contraturno</option>
						</select> 
						</div> ';
						break;

    case 3:
       echo '

						<div class="col-md-12 pt-3">
						Período Etudantil:
						<select class="form-control form-control-lg" name="periestu">
						<option value="1">Matutino</option>
						<option value="2">Vespertino</option>
						<option value="3" selected>Noturno</option>
						<option value="4">Contraturno</option>
						</select> 
						</div> ';
						break;

    case 4:
       echo '

						<div class="col-md-12 pt-3">
						Período Etudantil:
						<select class="form-control form-control-lg" name="periestu">
						<option value="1">Matutino</option>
						<option value="2">Vespertino</option>
						<option value="3">Noturno</option>
						<option value="4" selected>Contraturno</option>
						</select> 
						</div> ';
						break;

       



}




						echo '


						 <div class="col-md-6 pt-3">
        Número:
                <input type="number" class="form-control" max="99" placeholder="Número da Turma" required autofocus name="numero"  value="'.$row['numero'].'">
        </div>
                
                <div class="col-md-6 pt-3">
				Letra:
                <input type="text" class="form-control" maxlength="2"  placeholder="Letra da Turma" onblur="evento(this);" value="'.$row['letra'].'" required autofocus name="letra"/>

                <input type="text" class="form-control"   placeholder="Letra da Turma" hidden value="'.$row['idclasse'].'" required autofocus name="idclasse"/>

                </div>


                <script type="text/javascript">

function evento(obj) {
  obj.value = obj.value.toUpperCase();
}

</script>

                


						</div>

						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-danger" type="submit"><img src="../images/edit.png" width="15px"/> Alterar</button>            
						</div>
						</div>
						</div>
						</div>
						</form>

						<!-- Fim Modal Editar -->

						<!-- Modal Deletar -->
						<div class="modal fade" id="ModalDel'.$row['idclasse'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
						<div class="modal-content">
						<div class="modal-header">
						<h4>
						Deletar:
						</h4> 
						<hr>
						<button type="button" class="close" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"> </h4>
						</div>
						<div class="modal-body">

						<h4> Você tem certeza que deseja deletar a turma '.$row['numero'] .$row['letra'].'?
						<h5> A ação não pode ser revertida... </h5>
						<hr>
						<h5> Obs: Só é possível deletar a turma caso nenhum professor tenha registrado uma ocorrência relacionada a ela, certifique-se de deletar todas as ocorrências relacionadas com a mesma antes. </h5>

						<!-- Colocar Form aqui -->
						<form class="form-cadastro" action="del.turma.php" method="post" id="formdel">

						<input type="text" value="'.$row['idclasse'].'" class="form-control" placeholder=" " required autofocus maxlength="60"  name="idclasse" hidden="1">					




						</div>

						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-danger" type="submit"><img src="../images/del.png" width="15px"/> Deletar</button>            
						</div>
						</div>
						</div>
						</div>
						</form>

						<!-- Fim Modal Deletar -->

						<!-- Inicio Card-->
						<div class="card cardbg" style="width: 18rem;">
						<img class="m-1" src="../images/class.png" alt="Card image cap" width="140px;">
						<div class="card-body">

						<p class="card-text">'.$row['numero'] .$row['letra'].'</p>
						<h5 class="btn-dacor p-1">'.$periestu.'</h5>
						<center>


						<div class="btn btn-dacor mt-2"  style="color: #fff;" data-toggle="modal" data-target="#ModalEdit'.$row['idclasse'].'"><img src="../images/edit.png" width="20px" /></div>
						<div class="btn btn-dacor mt-2"  style="color: #fff;" data-toggle="modal" data-target="#ModalDel'.$row['idclasse'].'"><img src="../images/del.png" width="20px" /></div>
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



		<?php	include '../footer.php';




							if (isset($_SESSION['editresultid'])) {
								

								if ($_SESSION['editresultid'] == 1){
									echo "<script>

									$.notify(\"Atualizações realizadas com sucesso!\", {
										type: 'success',


										animate: {

											enter: 'animated lightSpeedIn',
											exit: 'animated lightSpeedOut'
										}
										});




										</script> ";
										unset ($_SESSION ['editresultid']);
									}
								}

								if (isset($_SESSION['editresultid'])) {
									if ($_SESSION['editresultid'] == 0){
										echo "<script>
										$.notify(\"Um erro ocorreu durante a atualização...\", {
											type: 'danger',
										//showProgressbar: true,


											animate: {

												enter: 'animated lightSpeedIn',
												exit: 'animated lightSpeedOut'
											}
										}); ";
										unset ($_SESSION ['editresultid']);
									}
								}






								if (isset($_SESSION['delresultid'])) {
								

								if ($_SESSION['delresultid'] == 1){
									echo "<script>

									$.notify(\"Informações deletadas com sucesso!\", {
										type: 'success',


										animate: {

											enter: 'animated lightSpeedIn',
											exit: 'animated lightSpeedOut'
										}
										});




										</script> ";
										unset ($_SESSION ['delresultid']);
									}
								}

								if (isset($_SESSION['delresultid'])) {
									if ($_SESSION['delresultid'] == 0){
										echo "<script>
										$.notify(\"Um erro ocorreu ao tentar deletar as informações: Verifique se as mesmas não estão sendo utilizadas.\", {
											type: 'danger',
										//showProgressbar: true,


											animate: {

												enter: 'animated lightSpeedIn',
												exit: 'animated lightSpeedOut'
											}
										}); ";
										unset ($_SESSION ['delresultid']);
									}
								}











			?> <!-- Importando Rodapé -->


	</body>
	</html> 

