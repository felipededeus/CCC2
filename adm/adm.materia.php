<?php	include 'header.template.php';	?> <!-- Importando Header -->




<div class="jumbotron">
	<div class="container">
		<div class="row"> 
			<div class="col-xs-12">

				<h2 class="text-center login-title">Adminstração - Matéria</h2>
				<hr>

				<div class="account-wall">
					<!-- Script do Datatables -->
					<script type="text/javascript">
						

						$(document).ready( function () {
							$('#resultados').DataTable();
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

						<tbody>
							<?php
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
								<form class="form-cadastro" action="edit.materia.php" method="post">
								
								<input type="text" value="'.$row['IDmateria'].'" class="form-control" placeholder="Nome da Matéria" required autofocus maxlength="60"  name="IDmateria" hidden="1">
								

								<div class="col-md-5 pt-3">
								Nome:
								<input type="text" value="'.$row['nome'].'" class="form-control" placeholder="Nome da Matéria" required autofocus maxlength="60"  name="nome">
								</div>


								<div class="col-md-7 pt-3">
								Descrição:
								<input type="text" class="form-control" placeholder="Descrição" required autofocus name="descr" maxlength="100" value="'.$row['descr'].'">
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

								<!-- Colocar Form aqui -->
								<form class="form-cadastro" action="del.materia.php" method="post">
								
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
								<div class="btn btn-dacor"  style="color: #fff;" data-toggle="modal" data-target="#ModalEdit'.$row['IDmateria'].'">  <img src="../images/edit.png" width="20px"/>  </div> 
								<!-- Fim Button trigger modal -->

								<div class="btn btn-dacor"  style="color: #fff;" data-toggle="modal" data-target="#ModalDel'.$row['IDmateria'].'">  <img src="../images/del.png" width="20px"/>  </div> 
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
</div>




<?php	include '../footer.php';	?> <!-- Importando Rodapé -->
</body>
</html> 

