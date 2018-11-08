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




<!DOCTYPE html>
<html lang="pt-br">
<head>

  <style>
                @media print { 
                    #noprint { display:none; } 
                    body { background: #fff; }
                }


 
.quebra { page-break-before:always;
  
} 
            </style>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Relatório Geral</title>
  <?php  include 'imp.css.php';  ?> <!-- Importando CSS -->

</head>
<body style="background-color: #ffffff; background-image: none;">

  <?php  include 'imp.java.php';  ?> <!-- Importando Scripts -->
<div id="noprint">
  <br>
  <center>
<form><input type="button" name="imprimir" class="btn btn-lg btn-success" style="width: 100%;" value="Imprimir" onclick="window.print();">
<br>
<br>


<?php 
 
 if (isset($_POST['quebrar'])) {
   # code...
 
 if ($_POST['quebrar'] == 'sim') {

     echo '<div class="alert alert-danger" role="alert"><strong>Atenção:</strong> Cada Relatório será impresso em uma folha separada!</div> ';
    } 
}


 ?>



</form>
</center>
</div>





<?php 

$dataini = $_POST['dataini'];
$datafim = $_POST['datafim'];
 
include "conexao.class.php";

$sqlcursos = "SELECT cursos_id FROM conselho  WHERE conselho.datareg BETWEEN :dataini AND :datafim GROUP BY conselho.cursos_id";
// Executa a Query 
//Pega todas os Cursos
    $stmcursos = conexao::prepare($sqlcursos);   
    $stmcursos->bindParam(':dataini', $dataini);
    $stmcursos->bindParam(':datafim', $datafim);
    $stmcursos->execute(); 


    while($rowcursos=$stmcursos->fetch(PDO::FETCH_ASSOC)){




$sqlturma = "SELECT classe_idclasse FROM conselho WHERE conselho.cursos_id = :cursos_id AND conselho.datareg BETWEEN :dataini AND :datafim GROUP BY conselho.classe_idclasse";
// Executa a Query 
//Pega todas as Turmas
    $stmturma = conexao::prepare($sqlturma);  
    $stmturma->bindParam(':cursos_id', $rowcursos['cursos_id']); 
    $stmturma->bindParam(':dataini', $dataini);
    $stmturma->bindParam(':datafim', $datafim);
    $stmturma->execute(); 


    while($rowturma=$stmturma->fetch(PDO::FETCH_ASSOC)){

      $sqlmateria = "SELECT materia_IDmateria FROM conselho WHERE conselho.cursos_id = :cursos_id AND conselho.classe_idclasse = :classe_idclasse AND conselho.datareg BETWEEN :dataini AND :datafim GROUP BY conselho.materia_IDmateria";
// Executa a Query 
//Pega todas matérias            
    $stmmateria = conexao::prepare($sqlmateria); 
    $stmmateria->bindParam(':cursos_id', $rowcursos['cursos_id']);   
    $stmmateria->bindParam(':classe_idclasse', $rowturma['classe_idclasse']);   
    $stmmateria->bindParam(':dataini', $dataini);
    $stmmateria->bindParam(':datafim', $datafim);
    $stmmateria->execute(); 


    while($rowmateria=$stmmateria->fetch(PDO::FETCH_ASSOC)){

      $sqlprofessor = "SELECT professor_id FROM conselho WHERE conselho.cursos_id = :cursos_id AND conselho.classe_idclasse = :classe_idclasse AND conselho.materia_IDmateria = :IDmateria AND conselho.datareg BETWEEN :dataini AND :datafim GROUP BY conselho.professor_id";
// Executa a Query 
    $stmprofessor = conexao::prepare($sqlprofessor);   
    $stmprofessor->bindParam(':cursos_id', $rowcursos['cursos_id']);   
    $stmprofessor->bindParam(':classe_idclasse', $rowturma['classe_idclasse']);  
    $stmprofessor->bindParam(':IDmateria', $rowmateria['materia_IDmateria']); 
    $stmprofessor->bindParam(':dataini', $dataini);
    $stmprofessor->bindParam(':datafim', $datafim);
    $stmprofessor->execute(); 


    while($rowprofessor=$stmprofessor->fetch(PDO::FETCH_ASSOC)){



      //-------------------------------- Nomeia As turmas---------------------------------

$matu = 1;
$vesp = 2;
$notu = 3;
$contra = 4;  


$idclasse= $rowturma['classe_idclasse'];

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
       

        // ---------------------- FIM NOMEIA TURMAS -----------------------------------

  //----------------------------Nomeia a ID da Matéria---------------------------------

$idmateria = $rowmateria['materia_IDmateria'];

$sqlm = "SELECT * FROM materia WHERE IDmateria = :idmateria ";
$stmm = conexao::prepare($sqlm);
$stmm->bindParam(':idmateria', $idmateria);
$stmm->execute();    

while($rowm=$stmm->fetch(PDO::FETCH_ASSOC)){


  $nmateria=$rowm['nome'];

}

//----------------------------------FIM NOMEIA MATERIA---------------------------------

  // -----------------------------Nomeia Cursos ---------------------------------------

$cursosid = $rowcursos['cursos_id'];

$sqlc = "SELECT * FROM cursos WHERE id = :cursosid";
$stmc = conexao::prepare($sqlc);
$stmc->bindParam(':cursosid', $cursosid);
$stmc->execute();    

while($rowc=$stmc->fetch(PDO::FETCH_ASSOC)){
  $nomecurso = $rowc['nome'];

      

    }


  //--------------------------FIM NOMEIA CURSOS -------------------------------------------



  // -----------------------------Nomeia Professor ---------------------------------------

$professorid = $rowprofessor['professor_id'];

$sqlp = "SELECT * FROM professor WHERE id = :professorid";
$stmp = conexao::prepare($sqlp);
$stmp->bindParam(':professorid', $professorid);
$stmp->execute();    

while($rowp=$stmp->fetch(PDO::FETCH_ASSOC)){
  


  $professor = $rowp['nome'].' '.$rowp['snome'];

      

    }


  //--------------------------FIM NOMEIA Professor -------------------------------------------



    $dt = new DateTime();
    $datai = new DateTime($dataini);
    $dataf = new DateTime($datafim);
    
     if (isset($_POST['quebrar'])) {
   # code...
    if ($_POST['quebrar'] == 'sim') {

     echo '<div class="quebra"></div> ';
    } 

}

  echo ' <hr> <h3>Pré Conselho '. $datai->format('Y').' <small class="text-muted">( '.  $datai->format('d-m-Y').' – Até - '. $dataf->format('d-m-Y').') </small>  </h3><h4> '.$nometurma.'</h4>  Professor: <strong> '.$professor.' </strong>| Matéria: <strong>  '.$nmateria.'</strong> | Curso: <strong>  '.$nomecurso.'</strong> <br> Relatório Gerado em '.$dt->format('d/m/Y H:i').' <hr>';







  // -------------------------------------Exibe ocorrencias--------------------------


     echo   '<table class=" table-bordered table-hover table-sm table-striped" style="width: 100%;">
          <thead class="thead-light">
            <tr>
      
              <th>Nº e Nome</th>
              <th colspan="150">Ocorrências Registradas:</th>
      
      
      
            </tr>
      
      
          </thead>';

$idmateria = $rowmateria['materia_IDmateria'];
$idclasse = $rowturma['classe_idclasse'];

$cursosid = $rowcursos['cursos_id'];

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
    WHERE conselho.cursos_id = :cursos_id AND professor.id = :idprofessor AND conselho.classe_idclasse = :idclasse AND conselho.materia_IDmateria = :idmateria AND conselho.datareg BETWEEN :dataini AND :datafim
    GROUP BY conselho.aluno_idaluno
    ORDER BY conselho.numaluno ASC ";

// Executa a Query 
    $stm = conexao::prepare($sql); 
    $stm->bindParam(':idprofessor', $professorid);
    $stm->bindParam(':idmateria', $idmateria);
    $stm->bindParam(':idclasse', $idclasse);
    $stm->bindParam(':cursos_id', $cursosid);
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
      WHERE conselho.cursos_id = :cursos_id AND professor.id = :idprofessor AND conselho.materia_IDmateria = :idmateria AND  conselho.classe_idclasse = :idclasse AND conselho.aluno_idaluno = :idaluno AND conselho.datareg  BETWEEN :dataini AND :datafim 
      GROUP BY conselho.ocorrencias_idocorrencias     ";

           // Executa a Query 
      $stm2 = conexao::prepare($sql2); 
      $stm2->bindParam(':idprofessor', $professorid);
      $stm2->bindParam(':idmateria', $idmateria);
      $stm2->bindParam(':idclasse', $idclasse);
      $stm2->bindParam(':cursos_id', $cursosid);
      $stm2->bindParam(':dataini', $dataini);
      $stm2->bindParam(':datafim', $datafim);
      $stm2->bindParam(':idaluno', $idaluno);
      $stm2->execute(); 

      //Inicio da Table


 



      while($row2=$stm2->fetch(PDO::FETCH_ASSOC)){ echo   '<td> '.$row2['oconome'].'</td>';   }

      




    }


echo '</tr> </table>';






  //------------------------------FIM EXIBE OCORRENCIAS---------------------------------


 




      

    }



    }



   }

}

}



 ?>









<?php
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
    WHERE conselho.datareg BETWEEN :dataini AND :datafim
    GROUP BY conselho.aluno_idaluno
    ORDER BY conselho.numaluno ASC ";

// Executa a Query 
  //  $stm = conexao::prepare($sql);
   // $stm->bindParam(':dataini', $dataini);
  //  $stm->bindParam(':datafim', $datafim);
  //  $stm->execute(); 

   ?>


 </bory>