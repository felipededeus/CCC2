


<?php 

//	Pegar Session do Username Senha Atual e Senha Nova Que o User novo Quer

session_start(); 



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

$senha = md5($_POST['senha']); 

$senhanova = md5($_POST['senhanova']); 

$senhanovar = md5($_POST['senhanovar']); 

$username = $_SESSION['username'];



 if ($senhanova != $senhanovar) {
    	   $_SESSION ['altsenha'] =  3 ; // Gera Session se deu errado
           header('Location: novasenha.form.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script   
     
    }



include("conexao.class.php");  

$sql = "SELECT username, senha FROM admin WHERE username= :username AND senha= :senha UNION SELECT username, senha FROM professor WHERE username= :username AND senha= :senha UNION SELECT username, senha FROM pedagogo WHERE username= :username AND senha= :senha";
    $stm = Conexao::prepare($sql);
    $stm->bindParam(':username', $username);
    $stm->bindParam(':senha', $senha);
    $stm->execute();


if ($stm->rowCount()> 0) { 	


        //DEFININDO TIPO DE USER ---------------------------------------------------------------------------
       $tipouser= "none";
       // Verifica se é Pedagogo

      $sql = "SELECT email, username, senha FROM pedagogo WHERE username= :username";
      $stm = Conexao::prepare($sql);
      $stm->bindParam(':username', $username);
      $stm->execute();

      if ($stm->rowCount()> 0) { $tipouser= "pedagogo"; }

      // Verifica se é Admin

      $sql = "SELECT email, username, senha FROM admin WHERE username= :username";
      $stm = Conexao::prepare($sql);
      $stm->bindParam(':username', $username);
      $stm->execute();

      if ($stm->rowCount()> 0) { $tipouser= "admin"; }

      // Verifica se é Professor

      $sql = "SELECT email, username, senha FROM professor WHERE username= :username";
      $stm = Conexao::prepare($sql);
      $stm->bindParam(':username', $username);
      $stm->execute();

      if ($stm->rowCount()> 0) { $tipouser= "professor"; }

      //FIM DEFININDO TIPO DE USER -------------------------------------------------------------------------

      if ($tipouser == "admin") {    
      //Prodedimento Admin --------------------------------------------------------------------------------------------------------
      

          $sql = "UPDATE admin SET senha = :senhanova WHERE username= :username";
          $stm = Conexao::prepare($sql);
          $stm->bindParam(':username', $username);
          $stm->bindParam(':senhanova', $senhanova);
          if($stm->execute()){
           $_SESSION ['altsenha'] =  "Senha Alterada com Sucesso!" ; // Gera Session se deu certo
           header('Location: novasenha.form.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script     ;
         } else{
           $_SESSION ['altsenha'] =  0 ; // Gera Session se deu errado
           header('Location: novasenha.form.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script    
         } 
       
         //FIM PROCEDIMENTO ADMIN---------------------------------------------------------------------------------------------------

      }// If Admin


      if ($tipouser == "professor") {    
      //Prodedimento professor --------------------------------------------------------------------------------------------------------
      

          $sql = "UPDATE professor SET senha = :senhanova WHERE username= :username";
          $stm = Conexao::prepare($sql);
          $stm->bindParam(':username', $username);
          $stm->bindParam(':senhanova', $senhanova);
          if($stm->execute()){
           $_SESSION ['altsenha'] =  "Senha Alterada com Sucesso!" ; // Gera Session se deu certo
           header('Location: novasenha.form.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script     ;
         } else{
           $_SESSION ['altsenha'] =  0 ; // Gera Session se deu errado
           header('Location: novasenha.form.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script    
         } 
       
         //FIM PROCEDIMENTO professor---------------------------------------------------------------------------------------------------

      }// If Professor

      if ($tipouser == "pedagogo") {    
      //Prodedimento pedagogo --------------------------------------------------------------------------------------------------------
      

          $sql = "UPDATE pedagogo SET senha = :senhanova WHERE username= :username";
          $stm = Conexao::prepare($sql);
          $stm->bindParam(':username', $username);
          $stm->bindParam(':senhanova', $senhanova);
          if($stm->execute()){
           $_SESSION ['altsenha'] =  "Senha Alterada com Sucesso!" ; // Gera Session se deu certo
           header('Location: novasenha.form.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script     ;
         } else{
           $_SESSION ['altsenha'] =  0 ; // Gera Session se deu errado
           header('Location: novasenha.form.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script    
         } 
       
         //FIM PROCEDIMENTO pedagogo---------------------------------------------------------------------------------------------------

      }// If pedagogo







    

}// IF Senha Anterior Certa 
else
{
		   $_SESSION ['altsenha'] =  "Erro ao Alterar Senha, Verifique as Informações e tente novamente... " ; // Gera Session se deu errado
           header('Location: novasenha.form.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script    
}

?>



