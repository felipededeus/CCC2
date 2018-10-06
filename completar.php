<?php

include "conexao.class.php";

$acao= $_GET['acao'];

if ($acao != 'autocomplete' ) { exit;}


 
// get what user typed in autocomplete input
$term = trim($_GET['term']);
 
$a_json = array();
$a_json_row = array();
 
$a_json_invalid = array(array("id" => "#", "value" => $term, "label" => "Only letters and digits are permitted..."));
$json_invalid = json_encode($a_json_invalid);
 
// replace multiple spaces with one
$term = preg_replace('/\s+/', ' ', $term);
 
// SECURITY HOLE ***************************************************************
// allow space, any unicode letter and digit, underscore and dash
if(preg_match("/[^\040\pL\pN_-]/u", $term)) {
  print $json_invalid;
  exit;}









$sql = "SELECT idaluno, nome, snome FROM aluno WHERE nome LIKE '%".$term."%' ORDER BY nome ASC ";
        $stm = Conexao::prepare($sql);
        $stm->bindValue(1, $term);     
        $stm->execute();


          while($row=$stm->fetch(PDO::FETCH_ASSOC)){
         
               $a_json_row["value"] = $row['idaluno'];
               $a_json_row["label"] = $row['nome'].' '.$row['snome'];
               array_push($a_json, $a_json_row);

          }

         

          $json = json_encode($a_json);

          echo $json;


?>