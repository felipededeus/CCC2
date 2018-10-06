
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Professor</title>
	<!-- CSS Links -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/login.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap4.css">
</head>
<body>

	<div class="container-fluid bgnav">
		<?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->
	</div>

	<div class="jumbotron">


		<?php
         include("conexao.class.php");   //verifica se existe conexão com bd; caso não tenta, cria uma nova


    $username= preg_replace('/[À-Úà-ú]/','', $_POST['username']);
      


//Pegar dados do Form


    $chave = $_POST['chave'];

    $username = $_POST['username'];

    $senha = md5($_POST['senha']);

    $rsenha = md5( $_POST['rsenha']);



//Verifica se as duas senhas são iguais

    if ($senha != $rsenha) {
    	echo' <div class="alert alert-danger" role="alert">
      <h3>Atenção: Senhas Diferentes!</h3><br>
      <a href="novarecsenha.php?chave='.$chave.'"> <h4>Voltar</h4></a>
      </div>'; exit;
     
    }


    $sql = "SELECT email, username, senha FROM admin WHERE username= :username UNION SELECT email, username, senha FROM professor WHERE username= :username UNION SELECT email, username, senha FROM pedagogo WHERE username= :username";
    $stm = Conexao::prepare($sql);
    $stm->bindParam(':username', $username);
    $stm->execute();

    if ($stm->rowCount()> 0) {  


     $sql = "SELECT email, username, senha FROM professor WHERE username= :username UNION SELECT email, username, senha FROM admin WHERE username= :username UNION SELECT email, username, senha FROM pedagogo WHERE username= :username";
     $stm = Conexao::prepare($sql);
     $stm->bindParam(':username', $username);
     $stm->execute();


     $row=$stm->fetch(PDO::FETCH_ASSOC);
     $str= implode("", $row);
     $novo_valor= md5($str);
     $chavecerta= $novo_valor;

   } else {echo '
           <div class="alert alert-danger" role="alert">
           Erro ao tentar alterar senha. Verefique se as informações estão corretas e tente novamente. </div>
           '; exit(); 
         }




     if ($chave == $chavecerta) {




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
      //Sql para verificar se o usuário realmente solicitou a troca de senha
        $sql = "SELECT hashrec FROM admin WHERE username= :username";                  
        $stm = Conexao::prepare($sql);
        $stm->bindParam(':username', $username);
        $stm->execute();    

        $row=$stm->fetch(PDO::FETCH_ASSOC);
        if ($row['hashrec'] == $chave){
        // Sql para Trocar Senha do Administrador
        $nsolci= 'N';

          $sql = "UPDATE admin SET senha = :senha, hashrec= :nsolci WHERE username= :username";
          $stm = Conexao::prepare($sql);
          $stm->bindParam(':username', $username);
          $stm->bindParam(':nsolci', $nsolci);
          $stm->bindParam(':senha', $senha);
          if($stm->execute()){
           echo '
           <div class="alert alert-success" role="alert">
           Senha alterada com sucesso! <a href="index.php">Clique aqui para fazer login.</a>
           </div>
           ';
         } else{
           echo '
           <div class="alert alert-danger" role="alert">
           Erro ao tentar alterar senha. Verefique se as informações estão corretas e tente novamente. <a href="index.php">Clique aqui para voltar a página de login.</a>
           </div>
           ';
         } 
       }
         //FIM PROCEDIMENTO ADMIN---------------------------------------------------------------------------------------------------

      }// If Admin

       if ($tipouser == "professor") {    
       //Prodedimento Professor ----------------------------------------------------------------------------------------------------
         //Sql para verificar se o usuário realmente solicitou a troca de senha
        $sql = "SELECT hashrec FROM professor WHERE username= :username";                  
        $stm = Conexao::prepare($sql);
        $stm->bindParam(':username', $username);
        $stm->execute();    

        $row=$stm->fetch(PDO::FETCH_ASSOC);
        if ($row['hashrec'] == $chave){
        // Sql para Trocar Senha do Professor
        $nsolci= 'N';

          $sql = "UPDATE professor SET senha = :senha, hashrec= :nsolci WHERE username= :username";
          $stm = Conexao::prepare($sql);
          $stm->bindParam(':username', $username);
          $stm->bindParam(':nsolci', $nsolci);
          $stm->bindParam(':senha', $senha);
          if($stm->execute()){
           echo '
           <div class="alert alert-success" role="alert">
           Senha alterada com sucesso! <a href="index.php">Clique aqui para fazer login.</a>
           </div>
           ';
         } else{
           echo '
           <div class="alert alert-danger" role="alert">
           Erro ao tentar alterar senha. Verefique se as informações estão corretas e tente novamente. <a href="index.php">Clique aqui para voltar a página de login.</a>
           </div>
           ';
         } 
       }
         //FIM PROCEDIMENTO PROFESSOR-------------------------------------------------------------------------------------------
       }//If Professor

        if ($tipouser == "pedagogo") {    
       //Prodedimento Pedagogo ----------------------------------------------------------------------------------------------------
         //Sql para verificar se o usuário realmente solicitou a troca de senha
        $sql = "SELECT hashrec FROM pedagogo WHERE username= :username";                  
        $stm = Conexao::prepare($sql);
        $stm->bindParam(':username', $username);
        $stm->execute();    

        $row=$stm->fetch(PDO::FETCH_ASSOC);
        if ($row['hashrec'] == $chave){
        // Sql para Trocar Senha do Pedagogo
        $nsolci= 'N';

          $sql = "UPDATE pedagogo SET senha = :senha, hashrec= :nsolci WHERE username= :username";
          $stm = Conexao::prepare($sql);
          $stm->bindParam(':username', $username);
          $stm->bindParam(':nsolci', $nsolci);
          $stm->bindParam(':senha', $senha);
          if($stm->execute()){
           echo '
           <div class="alert alert-success" role="alert">
           Senha alterada com sucesso! <a href="index.php">Clique aqui para fazer login.</a>
           </div>
           ';
         } else{
           echo '
           <div class="alert alert-danger" role="alert">
           Erro ao tentar alterar senha. Verefique se as informações estão corretas e tente novamente. <a href="index.php">Clique aqui para voltar a página de login.</a>
           </div>
           ';
         }
         }
         //FIM PROCEDIMENTO PEDAGOGO-------------------------------------------------------------------------------------------
       }//If PEDAGOGO

        if ($tipouser == "none") {    
       //Procedimento pra nada--------------------------------------------------------------------------------------------------
           echo '
           <div class="alert alert-danger" role="alert">
           Erro ao tentar alterar senha. Verefique se as informações estão corretas e tente novamente. <a href="index.php">Clique aqui para voltar a página de login.</a>
           </div>
           ';
         
         //FIM PROCEDIMENTO NONE------------------------------------------------------------------------------------------------
       }//If NONE








      }//If do Hash 















?>	





</div>





<?php	include 'footer.php'; ?> <!-- Importando Rodapé -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html> 