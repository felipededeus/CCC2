<?php session_start(); 

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;}


  if (!isset($_SESSION['senha'])) {
    header("Location: index.php");
    exit; }
?>

<?php
if (!isset($_POST['checkbox'])) {
	 header('Location: telaprofessor.php'); // Manda pra página de onde o user veio
}

include 'conexao.class.php';

foreach($_POST['checkbox'] as $checks)
{
  





$sql = "DELETE FROM conselho  WHERE conselho= :id"; // Apague da Tabela professor onde ID seja igual a ID...
          $stm = Conexao::prepare($sql);
          $stm->bindParam(':id', $checks);          
         if($stm->execute()){
          
          $_SESSION ['delresultid'] =  "1" ; // Gera Session se deu certo
          
          
          
           
           ;
         } else{
          $_SESSION ['delresultid'] =  "0" ; // Gera Session se deu errado        
         } 
         
         


}

header('Location: telaprofessor.php'); // Manda pra página de onde o user veio
?>