<?php

include "conexao.class.php";
$acao= $_GET['acao'];

if ($acao != 'autocomplete' ) { exit;}

$search=($_GET['term']);


$sql = "SELECT idaluno, nome, snome FROM aluno WHERE nome LIKE '%".$search."%' ORDER BY nome ASC ";
        $stm = Conexao::prepare($sql);
        $stm->bindValue(1, $search);     
        $stm->execute();


        $resJson = '[';
        $first = true;

          while($row=$stm->fetchAll(PDO::FETCH_ASSOC)){

          	if (!$first) {
          		$resJson .= ', ';
          	} else {
          		$first = false;
          	}

          	$resJson .= json_encode($row['nome'].' '.$row['snome']);
         


          }

          $resJson .= ']';

          echo $resJson;


?>