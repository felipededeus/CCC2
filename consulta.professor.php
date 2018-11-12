					
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
// Busca Informações Para Criar Form ----------------------------------------------------------




  // Busca Alunos Cadastrados
include "conexao.class.php";
$sqlaluno = "SELECT * FROM aluno";
$stmaluno = conexao::prepare($sqlaluno);
$stmaluno->execute();
echo '<datalist id="alunos">';
 while($rowaluno=$stmaluno->fetch(PDO::FETCH_ASSOC)){

 	echo '<option value="'.$rowaluno['idaluno'].'">COD: '.$rowaluno['idaluno'].' '.$rowaluno['nome'].' '.$rowaluno['snome'].'</option>';



 	}

echo '</datalist>';

// Busca Cursos Cadastrados
//include "conexao.class.php";
$sqlcursos = "SELECT * FROM cursos";
$stmcursos = conexao::prepare($sqlcursos);
$stmcursos->execute();    


//Fim Busca Cursos Cadastrados


// Busca Matérias

$sqlmateria = "SELECT * FROM materia";
$stmmateria = conexao::prepare($sqlmateria);
$stmmateria->execute();    



//Fim Busca MAtérias


// Busca Turmas

$matu = 1;
$vesp = 2;
$notu = 3;
$contra = 4;  

$sqlturma = "SELECT * FROM classe";
$stmturma = conexao::prepare($sqlturma);
$stmturma->execute();   




// Fim Busca Turmas

// Busca Ocorrências

	$sqloco = "SELECT * FROM ocorrencias";
	$stmoco = conexao::prepare($sqloco);
	$stmoco->execute();    

	




// Fim Busca Informações para criar form -------------------------------------------------






	?>


	<?php




//Fazendo conexão com o Banco de Dados Ativar só se for o primeiro da página a usar o Banco
					//include "conexao.class.php";






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

	WHERE conselho.professor_id = :professor_id AND conselho.datareg BETWEEN CURRENT_DATE()-10 AND CURRENT_DATE() ORDER BY conselho.datareg DESC";

// Executa a Query 
	$stm = conexao::prepare($sql); 
	$stm->bindParam(':professor_id', $_SESSION['idprofessor']);
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

// Selecionados por padrão no Form

$defaultcurso = $row['cursos_id'];
$defaultmateria = $row['materia_IDmateria'];
$defaultturma = $row['classe_idclasse'];
$defaultocorren = $row['ocorrencias_idocorrencias'];



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
		<form class="form-cadastro" action="edit.ocorrencia.php" method="post"  id="formedit">

		';




echo '
                                       <div class="col-md-7 pt-3">
                                         Data da Ocorrência:
                                         <input name="datareg" class="form-control" type="date" value="'.$data->format('Y-m-d').'" />
                                       </div>

                                       <div class="col-md-5 pt-3">
                                         <br>
                                         Curso
                                         <select name="cursosid" class="form-control form-control-lg"> 

                                         ';

                                         while($rowcursos=$stmcursos->fetch(PDO::FETCH_ASSOC)){
										 echo '<option value="'.$rowcursos['id'].'">'.$rowcursos['nome'].'</option>'; }
										 echo '


                                        
                                         </select>  



                                         </div>


                                         <div class="col-md-6 pt-3">
               							     Matéria:
               							   <select name="idmateria" class="form-control form-control-lg"> 
               							   ';


               							   while($rowmateria=$stmmateria->fetch(PDO::FETCH_ASSOC)){
										 echo '<option value="'.$rowmateria['IDmateria'].'">'.$rowmateria['nome'].'</option>';

																				}





               							   echo '

                 
                						   </select>  

             							 </div>



             							  <div class="col-md-6 pt-3">
                						  Turma:
                						 <select name="idclasse" class="form-control form-control-lg"> 


                						 ';

                						 while($rowturma=$stmturma->fetch(PDO::FETCH_ASSOC)){

	if ($rowturma['periestu'] == $matu) {
		$periestuturma = "Matutino";
	}

	if ($rowturma['periestu'] == $vesp) {
		$periestuturma = "Vespertino";
	}

	if ($rowturma['periestu'] == $notu) {
		$periestuturma = "Noturno";
	}

	if ($rowturma['periestu'] == $contra) {
		$periestuturma = "Contraturno";
	}





	echo '<option value="'.$rowturma['idclasse'].'">'.$rowturma['numero'].'º'.$rowturma['letra'].' '.$periestuturma.'</option>'; }



	echo '

	 <div class="col-md-12 pt-3">

                <input hidden="1" name="idprofessor" class="form-control" value="'.$_SESSION['idprofessor'].'"> </input>

              </div>

               <div class="col-md-2 pt-3">
                Número:

                <input type="number"  name="numaluno" class="form-control" id="numaluno" min="1" max="100" />
              </div>

              
              <div class="col-md-10 pt-3">
               <div id="mydiv'.$count.'">
                Nome do Aluno: (Convertido para código ao clicar)

                <input type="text" name="idaluno" class="form-control aluno " list="alunos"/ >
                
                </div>

              </div>      


              




 <div class="col-md-12 pt-3">
                Ocorrências:
                <select name="idocorrencias" class="form-control form-control-lg"> ';


                while($rowoco=$stmoco->fetch(PDO::FETCH_ASSOC)){
		echo '<option value="'.$rowoco['idocorrencias'].'">'.$rowoco['nome'].'</option>';

	}
echo ' </select>  

              </div>

                


              <div class="col-md-12 pt-3">
  Observações:



  <textarea name="observ" class="form-control" maxlength="200"></textarea>

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

             echo '
         </div>    
         <!--Fim do Accordion -->
         ';








         ?>
