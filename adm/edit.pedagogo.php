<?php	include 'header.template.php';	?> <!-- Importando Header -->

<?php

$Iid = $_POST['id'];

$nome = $_POST['nome'];

$snome = $_POST['snome'];

$email = $_POST['email'];

$username = $_POST['username'];

$dtnasc = $_POST['dtnasc'];

if (!isset($id)) {
	echo '
           <div class="alert alert-danger" role="alert">
           Erro: Parâmetros Inválidos!
           </div>
           ';
           exit();
}

include '../conexao.class.php';
$sql = "UPDATE pedagogo SET nome= :nome, snome= :snome, email= :email, username= :username, dtnasc= :dtnasc  WHERE id= :id";
// Atualize na Tabela Pedagogo definindo nome antigo por nome novo sobrenome antigo por sobrenome novo, e assim sucessivamente,onde id seja igual a id solicitada pelo usuário

          $stm = Conexao::prepare($sql);
          $stm->bindParam(':id', $id);
          $stm->bindParam(':nome', $nome);
          $stm->bindParam(':snome', $snome);
           $stm->bindParam(':email', $email);
          $stm->bindParam(':username', $username);
          $stm->bindParam(':dtnasc', $dtnasc);



          if($stm->execute()){
            
           $_SESSION ['editresultid'] =  "1" ; // Gera Session se deu certo
           header('Location: adm.materia.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script     



         } else{

          $_SESSION ['editresultid'] =  "0" ; // Gera Session se deu certo
          header('Location: adm.materia.php'); // Manda pra página de onde o user veio
          exit(); // Para o Script       
         } 



         // Os Sessions são usados para gerar a notificação na página de origem
      

?>

<?php	include '../footer.php';	?> <!-- Importando Rodapé -->
</body>
</html> 

