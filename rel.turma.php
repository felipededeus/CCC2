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

if (!isset($_SESSION['admin'])) {
	header("Location: index.php");    
	exit;      

}
?> <!-- Verificando se o infeliz tah logado e pode ver essa página-->



<?php

// Recuperando os dados solicitados para realizar a consulta

$dataini = $_POST['dataini'];

$datafim = $_POST['datafim'];
// Transformando em DateTime para modificar o Formato de Exebição
$datai = new DateTime ($dataini);
$dataf = new DateTime ($datafim);

$cursosid = $_POST['cursosid'];

$idmateria = $_POST['idmateria'];

$idclasse = $_POST['idclasse'];

$professor = $_POST['professor'];

$idprofessor = $_POST['idprofessor'];


?>


<?php
//Nomeia a ID da Matéria
include "conexao.class.php";
$sqlm = "SELECT * FROM materia WHERE IDmateria = :idmateria ";
$stmm = conexao::prepare($sqlm);
$stmm->bindParam(':idmateria', $idmateria);
$stmm->execute();    

while($rowm=$stmm->fetch(PDO::FETCH_ASSOC)){


	$nmateria=$rowm['nome'];

}

?>

<?php
//Nomeia As turmas

$matu = 1;
$vesp = 2;
$notu = 3;
$contra = 4;  

$sqlt = "SELECT * FROM classe WHERE idclasse = :idclasse";
$stmt = conexao::prepare($sqlt);
$stmt->bindParam(':idclasse', $idclasse);
$stmt->execute();   



while($rowt=$stmt->fetch(PDO::FETCH_ASSOC)){

	if ($rowt['periestu'] == $matu) {
		$periestu = "Matutino";
	}

	if ($rowt['periestu'] == $vesp) {
		$periestu = "Vespertino";
	}

	if ($rowt['periestu'] == $notu) {
		$periestu = "Noturno";
	}

	if ($rowt['periestu'] == $contra) {
		$periestu = "Contraturno";
	}





	$nometurma= ''.$rowt['numero'].'º'.$rowt['letra'].' - '.$periestu.'';
        //print_r($row); 
}
?>

<?php
// Nomeia Os Cursos
                  
                  $sqlc = "SELECT * FROM cursos WHERE id = :cursosid";
                  $stmc = conexao::prepare($sqlc);
                  $stmc->bindParam(':cursosid', $cursosid);
                  $stmc->execute();    

                  while($rowc=$stmc->fetch(PDO::FETCH_ASSOC)){
                  $nomecurso = $rowc['nome'];
        
                  }
                  ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Relatório por Turma</title>
	<?php  include 'imp.css.php';  ?> <!-- Importando CSS -->

</head>
<body style="background-color: #ffffff; background-image: none;">

	<?php  include 'imp.java.php';  ?> <!-- Importando Scripts -->


	<?php
	echo '<h4> Pré Conselho: '. $datai->format('Y').' | '. $datai->format('d-m-Y').' – Até - '. $dataf->format('d-m-Y').'<br>  Professor: '.$professor.' | Matéria: '.$nmateria.'  <br>Turma: '.$nometurma.' | Curso: '.$nomecurso.' </h4> ';
	?>
	<hr>

	<table class="table table-bordered table-hover table-striped">
		<thead class="thead-light">
			<tr>

				<th>Nº e Nome</th>
				<th colspan="150">Ocorrências Registradas:</th>



			</tr>


		</thead>

		<?php

//include "conexao.class.php";
 //Define a Query Sql
		$sql = "SELECT conselho.* ,
		professor.nome AS profnome,
		professor.snome AS profsnome,
		aluno.nome as alnome,
		aluno.idaluno as idaluno,
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
		WHERE professor.id = :idprofessor AND conselho.materia_IDmateria = :idmateria AND conselho.datareg BETWEEN :dataini AND :datafim
		GROUP BY conselho.aluno_idaluno
		ORDER BY conselho.numaluno ASC ";

// Executa a Query 
		$stm = conexao::prepare($sql); 
		$stm->bindParam(':idprofessor', $idprofessor);
		$stm->bindParam(':idmateria', $idmateria);
		$stm->bindParam(':dataini', $dataini);
		$stm->bindParam(':datafim', $datafim);
		$stm->execute(); 

		while($row=$stm->fetch(PDO::FETCH_ASSOC)){
			$nomealuno= $row['alnome'].' '.$row['alsnome'];
			$numaluno= $row['numaluno'];
			$idaluno= $row['aluno_idaluno'];
			echo '<tr> 

			<td> '.$numaluno. ' - '.$nomealuno.' </td> 

			
			';


			$sql2 = "SELECT conselho.* ,
			professor.nome AS profnome,
			professor.snome AS profsnome,
			aluno.nome as alnome,
			aluno.idaluno as idaluno,
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
			WHERE professor.id = :idprofessor AND conselho.materia_IDmateria = :idmateria AND conselho.datareg BETWEEN :dataini AND :datafim AND conselho.aluno_idaluno = :idaluno
			GROUP BY conselho.ocorrencias_idocorrencias

			";

           // Executa a Query 
			$stm2 = conexao::prepare($sql2); 
			$stm2->bindParam(':idprofessor', $idprofessor);
			$stm2->bindParam(':idmateria', $idmateria);
			$stm2->bindParam(':dataini', $dataini);
			$stm2->bindParam(':datafim', $datafim);
			$stm2->bindParam(':idaluno', $idaluno);
			$stm2->execute(); 

			while($row2=$stm2->fetch(PDO::FETCH_ASSOC)){ echo 	'<td> '.$row2['oconome'].'</td>';  }

			echo '</tr>';




		}

		?>
		

	</table>



</body>
</html>
