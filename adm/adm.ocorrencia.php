<?php	include 'header.template.php';	?> <!-- Importando Header -->

<script type="text/javascript">
	
	



	$('#formedit').submit(function(e) {
		var dados = jQuery( this ).serialize();
		e.preventDefault();
		$.ajax({
        url: 'edit.ocorrencia.php', // caminho para o script que vai processar os dados
        type: 'POST',
        data: { dados:dados, },
        success: function(response) {
            $("#resultados").load("adm.ocorrencia.php #resultados"); //parte da mesma página
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
        url: 'del.ocorrencia.php', // caminho para o script que vai processar os dados
        type: 'POST',
        data: { dados:dados, },
        success: function(response) {
            $("#resultados").load("adm.ocorrencia.php #resultados"); //parte da mesma página
        },
        error: function(xhr, status, error) {
        	alert(xhr.responseText);
        }
    });
		return false;
	}); 




</script>


<div class="jumbotron">
	<div class="container">
		<div class="row"> 
			<div class="col-md-12">

				<h2 class="text-center login-title">Adminstração - Ocorrências</h2>
				<hr>				

				
					<!-- Script do Datatables -->
					<script type="text/javascript">
						

						$(document).ready( function () {
							$('#resultados').DataTable({responsive: true, info: false});
						} );

						
					</script>

					<table id="resultados" class=" table table-bordered table-hover">
						<thead class="thead-light">
							<tr>

								<th>ID</th>
								<th>Nome Matéria</th>
								<th>Descrição</th>
								<th>Ações</th>



							</tr>


						</thead>

						<tbody style="background-color: #fff;">
							<?php

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






								include '../conexao.class.php';
								$sql = "SELECT * FROM materia";
								$stm = conexao::prepare($sql);
								$stm->execute(); 

								while ($row=$stm->fetch(PDO::FETCH_ASSOC)) {


									echo '<!-- Modal Editar -->
									<div class="modal fade" id="ModalEdit'.$row['IDmateria'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
									<form class="form-cadastro" action="edit.materia.php" method="post"  id="formedit">

									<input type="text" value="'.$row['IDmateria'].'" class="form-control" placeholder="Nome da Matéria" required autofocus maxlength="60"  name="IDmateria" hidden="1">


									<div class="col-md-5 pt-3">
									Nome:
									<input type="" value="'.$row['nome'].'" class="form-control" placeholder="Nome da Matéria" required autofocus maxlength="60"  name="nome">
									</div>


									<div class="col-md-7 pt-3">
									Descrição:
									<textarea type="text" class="form-control" placeholder="Descrição" required autofocus name="descr" maxlength="100" >'.$row['descr'].' </textarea>
									</div>


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
									<div class="modal fade" id="ModalDel'.$row['IDmateria'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

									<h4> Você tem certeza que deseja deletar a Matéria '.$row['nome'].'?
									<h5> A ação não pode ser revertida... </h5>
									<hr>
									<h5> Obs: Só é possível deletar a matéria caso nenhum professor tenha registrado uma ocorrência relacionada a ela, certifique-se de deletar todas as ocorrências relacionadas com a mesma antes.

									<!-- Colocar Form aqui -->
									<form class="form-cadastro" action="del.materia.php" method="post" id="formdel">

									<input type="text" value="'.$row['IDmateria'].'" class="form-control" placeholder="Nome da Matéria" required autofocus maxlength="60"  name="IDmateria" hidden="1">					




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








									';


									echo "
									<tr> 
									<td> ".$row['IDmateria']." </td>
									<td> ".$row['nome']." </td>
									<td> ".$row['descr']." </td>





									";

									echo '

									<td>
									<!-- Button trigger modal -->
									<div class="btn btn-dacor mt-2"  style="color: #fff;" data-toggle="modal" data-target="#ModalEdit'.$row['IDmateria'].'">  <img src="../images/edit.png" width="20px"/>  </div> 
									<!-- Fim Button trigger modal -->

									<a href="../materia.form.php" class="btn btn-dacor mt-2"  style="color: #fff;" ">   <img src="../images/add.png" width="20px"/> </div> 
									<!-- Fim Button trigger modal --></a>

									<div class="btn btn-danger mt-2"  style="color: #fff;" data-toggle="modal" data-target="#ModalDel'.$row['IDmateria'].'">  <img src="../images/del.png" width="20px"/>  </div> 
									<!-- Fim Button trigger modal -->


									</td>
									</tr>';

								}

								?>											

							</tbody>

						</table>




					</div>


				</div>	
			</div>    
		</div> 





	<?php	include '../footer.php';	?> <!-- Importando Rodapé -->
</body>
</html> 

