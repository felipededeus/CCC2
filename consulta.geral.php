					
<?php 

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



<?php




//Fazendo conexão com o Banco de Dados Ativar só se for o primeiro da página a usar o Banco
					include "conexao.class.php";

					




  //Define a Query Sql
					$sql = "SELECT conselho.* ,
					professor.nome AS profnome,
					professor.snome AS profsnome,
					aluno.nome as alnome,
					aluno.snome as alsnome, 
					materia.nome as matnome,
					ocorrencias.nome as oconome,
					cursos.nome as curnome,
					classe.letra, classe.numero, classe.periestu



					FROM conselho 
					INNER JOIN professor ON id = professor_id 
					INNER JOIN aluno ON idaluno = aluno_idaluno
					INNER JOIN classe ON idclasse = classe_idclasse
					INNER JOIN ocorrencias ON idocorrencias = ocorrencias_idocorrencias
					INNER JOIN cursos ON cursos.id = cursos_id
					INNER JOIN materia ON IDmateria = materia_IDmateria  

					ORDER BY conselho.datareg DESC";

// Executa a Query 
					$stm = conexao::prepare($sql); 
					
					$stm->execute();   
// Define Para controle de Períodos
					$matu = 1;
					$vesp = 2;
					$notu = 3;
					$contra = 4;  






					echo '
					<!-- Começo Accordion -->
					<div id="accordion">      


					';
					$count = 1;
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
						$data = new DateTime ($row['datareg']);

							echo '<!-- Modal Editar -->
									<div class="modal fade" id="ModalEdit'.$row['conselho'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
									<form class="form-cadastro" action="edit.ocorrencia.php" method="post"  id="formedit"> ';


									



									echo '



									


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
									<div class="modal fade" id="ModalDel'.$row['conselho'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

									<h4> Você tem certeza que deseja deletar a Ocorrência?
									<h5> A ação não pode ser revertida... </h5>
									<hr>									

									<!-- Colocar Form aqui -->
									<form class="form-cadastro" action="del.ocorrencia.telaprofessor.php" method="post" id="formdel">

									<input type="text" value="'.$row['conselho'].'" class="form-control" placeholder="Nome da Matéria" required autofocus maxlength="60"  name="conselho" hidden="1">					




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





						echo '

						<tr>
						<td>

						<div class="card mt-2">
						<div class="card-header" id="heading'.$count.'">      
						<div class=" text-right ">          '.$data->format('d-m-Y').'     </div>

						<div  data-toggle="collapse" data-target="#collapse'.$count.'" aria-expanded="true" aria-controls="collapse'.$count.'" style="margin-top: -15px;">

						<h4>  

						'.$row['alnome'].' '.$row['alsnome'].'  </h4>

						</div>
						<input type="checkbox" name="checkbox[]" value="'.$row['conselho'].'" />
						Nº: '.$row['numaluno'].' 
						| '.$row['oconome'].'



						</div>

						<div id="collapse'.$count.'" class="collapse" aria-labelledby="heading'.$count.'" data-parent="#accordion">
						<div class="card-body">

						<ul class="list-group list-group-flush">
						<li class="list-group-item">Professor: '.$row['profnome'].' '.$row['profsnome'].'</li>
						<li class="list-group-item"> Matéria: '.$row['matnome'].'</li>
						<li class="list-group-item"> Curso: '.$row['curnome'].' </li>
						<li class="list-group-item"> Turma:  '.$row['numero'].'º '.$row['letra'].' - '.$periestu.'</li>

						<li class="list-group-item"> Observações: '.$row['observ'].' </li>
						</ul>
						</div>
						<div class="card-footer text text-right">						
						<!-- Button trigger modal -->
									<div class="btn btn-dacor mt-2"  style="color: #fff;" data-toggle="modal" data-target="#ModalEdit'.$row['conselho'].'">  <img src="images/edit.png" width="20px"/>  </div> 
									<!-- Fim Button trigger modal -->
						<div class="btn btn-danger mt-2"  style="color: #fff;" data-toggle="modal" data-target="#ModalDel'.$row['conselho'].'">  <img src="../images/del.png" width="20px"/>  </div> 
									<!-- Fim Button trigger modal -->
						</div>

						</div>
						</div>
						<!--Fim Card do Accordion -->
						</td>
						<td style="display: none;">Matéria: '.$row['matnome'].' </td>
						<td style="display: none;">Curso: '.$row['curnome'].' </td>
						<td style="display: none;">Turma: '.$row['numero'].'º '.$row['letra'].' </td>
						<td style="display: none;"> Período Estudantil: '.$periestu.' </td>
						<td style="display: none;">Observações: '.$row['observ'].' </td>
						<td style="display: none;"> Nº: '.$row['numaluno'].'  </td>
						<td style="display: none;">Aluno(a): '.$row['alnome'].' '.$row['alsnome'].' </td>
						<td style="display: none;">Data Registro: '.$data->format('d-m-Y').' </td>

						</tr>


						';

						$count = $count + 1;

					}

					echo "
					</div>    
					<!--Fim do Accordion -->
					";








					?>
