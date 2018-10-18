<?php include 'header.template.php';  ?> <!-- Importando Header -->

<?php

$idadmin = $_POST['idadmin'];

$nome = $_POST['nome'];

$snome = $_POST['snome'];

$email = $_POST['email'];

$username = $_POST['username'];

$usernameold = $_POST['usernameold'];

$dtnasc = $_POST['dtnasc'];


include '../conexao.class.php';

if (!isset($idadmin)) {
  echo '
           <div class="alert alert-danger" role="alert">
           Erro: Parâmetros Inválidos!
           </div>
           ';
           exit();
}



if ($username != $usernameold) {
   //Verificando se Já existe um user com o mesmo nome cadastrado no sistema
        
        $sqli = "SELECT username FROM admin WHERE username= :username UNION SELECT username FROM professor WHERE username= :username UNION SELECT username FROM pedagogo WHERE username= :username";
        $stmi = Conexao::prepare($sqli);
        $stmi->bindParam(':username', $username);
        $stmi->execute();


 if ($stmi->rowCount()> 0) {     

    $_SESSION ['jaexiste'] = "Erro[046]: Esse nome de usuário já existe!";  
    header('Location: adm.admin.php');
    exit();

  }
}




$sql = "UPDATE admin SET nome= :nome, snome= :snome, email= :email, username= :username, dtnasc= :dtnasc  WHERE idadmin= :idadmin";
// Atualize na Tabela Pedagogo definindo nome antigo por nome novo sobrenome antigo por sobrenome novo, e assim sucessivamente,onde id seja igual a id solicitada pelo usuário

          $stm = Conexao::prepare($sql);
          $stm->bindParam(':idadmin', $idadmin);
          $stm->bindParam(':nome', $nome);
          $stm->bindParam(':snome', $snome);
           $stm->bindParam(':email', $email);
          $stm->bindParam(':username', $username);
          $stm->bindParam(':dtnasc', $dtnasc);



          if($stm->execute()){
            
           $_SESSION ['editresultid'] =  "1" ; // Gera Session se deu certo
           header('Location: adm.admin.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script     



         } else{

          $_SESSION ['editresultid'] =  "0" ; // Gera Session se deu certo
          header('Location: adm.admin.php'); // Manda pra página de onde o user veio
          exit(); // Para o Script       
         } 



         // Os Sessions são usados para gerar a notificação na página de origem
      

?>

<?php include '../footer.php';  ?> <!-- Importando Rodapé -->
</body>
</html> 

