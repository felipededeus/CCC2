 <?php

 session_start();
$username = $_POST['username'];

include("conexao.class.php");

//-----------------------------------------------------------------------------------------------------------------------------------------
      //Verificando se existe esse user cadastrado
$sql = "SELECT email, username FROM admin WHERE username= :username UNION SELECT email, username FROM professor WHERE username= :username  UNION SELECT email, username FROM pedagogo WHERE username= :username";
$stm = Conexao::prepare($sql);
$stm->bindParam(':username', $username);
$stm->execute();


if (!$stm->rowCount()> 0) {   $_SESSION ['nexiste'] = "Erro[047]: Esse nome de usuário não existe!";  
      header('Location: recsenha.form.php');
           exit();}

//FIM Verificando se existe esse user cadastrado --------------------------------------------------------------------------------------


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

      //FIM DEFININDO TIPO DE USER -------------------------------------------------------------------------------

         if ($tipouser == "none") {    
       //Procedimento pra nada--------------------------------------------------------------------------------------------------
           echo '
           <div class="alert alert-danger" role="alert">
           Erro ao tentar alterar senha. Verefique se as informações estão corretas e tente novamente. <a href="index.php">Clique aqui para voltar a página de login.</a>
           </div>
           '; 
         
         //FIM PROCEDIMENTO NONE------------------------------------------------------------------------------------------------
       }//If NONE




 if ($tipouser == "professor") {    
       //Prodedimento Professor ----------------------------------------------------------------------------------------------------
        

         $sql = "SELECT email, username, senha FROM professor WHERE username= :username";
         $stm = Conexao::prepare($sql);
         $stm->bindParam(':username', $username);
         $stm->execute();
  

             $row=$stm->fetch(PDO::FETCH_ASSOC);
             $str = implode("", $row);
             $novo_valor= md5($str);
             $chave= $novo_valor; 

  echo '<h2>Você solicitou a troca de sua senha?</h2> <a href="novarecsenha.php?chave='.$chave.'">Clique aqui para recuperar sua senha</a>';

                  //Gravando Hash no Banco
                   $sql = "UPDATE professor SET hashrec= :chave WHERE username= :username";
                   $stm = conexao::prepare($sql);
                   $stm->bindParam(':chave', $chave);
                   $stm->bindParam(':username', $username);
                   $stm->execute();
         //FIM PROCEDIMENTO PROFESSOR-------------------------------------------------------------------------------------------
       }//If Professor



if ($tipouser == "pedagogo") {    
       //Prodedimento PEDAGOGO ----------------------------------------------------------------------------------------------------
        

         $sql = "SELECT email, username, senha FROM pedagogo WHERE username= :username";
         $stm = Conexao::prepare($sql);
         $stm->bindParam(':username', $username);
         $stm->execute();
  

             $row=$stm->fetch(PDO::FETCH_ASSOC);
             $str = implode("", $row);
             $novo_valor= md5($str);
             $chave= $novo_valor; 

  echo '<h2>Você solicitou a troca de sua senha?</h2> <a href="novarecsenha.php?chave='.$chave.'">Clique aqui para recuperar sua senha</a>';

                  //Gravando Hash no Banco
                   $sql = "UPDATE pedagogo SET hashrec= :chave WHERE username= :username";
                   $stm = conexao::prepare($sql);
                   $stm->bindParam(':chave', $chave);
                   $stm->bindParam(':username', $username);
                   $stm->execute();
         //FIM PROCEDIMENTO PEDAGOGO-------------------------------------------------------------------------------------------
       }//If PEDAGOGO


if ($tipouser == "admin") {    
       //Prodedimento ADMIN----------------------------------------------------------------------------------------------------
        

         $sql = "SELECT email, username, senha FROM admin WHERE username= :username";
         $stm = Conexao::prepare($sql);
         $stm->bindParam(':username', $username);
         $stm->execute();
  

             $row=$stm->fetch(PDO::FETCH_ASSOC);
             $str = implode("", $row);
             $novo_valor= md5($str);
             $chave= $novo_valor; 

  echo '<h2>Você solicitou a troca de sua senha?</h2> <a href="novarecsenha.php?chave='.$chave.'">Clique aqui para recuperar sua senha</a>';

                  //Gravando Hash no Banco
                   $sql = "UPDATE admin SET hashrec= :chave WHERE username= :username";
                   $stm = conexao::prepare($sql);
                   $stm->bindParam(':chave', $chave);
                   $stm->bindParam(':username', $username);
                   $stm->execute();
         //FIM PROCEDIMENTO ADMIN-------------------------------------------------------------------------------------------
       }//If Admin







?>