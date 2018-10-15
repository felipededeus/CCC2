<?php	include 'header.template.php';	?> <!-- Importando Header -->

<?php

$idaluno = $_POST['idaluno'];

$nome = $_POST['nome'];

$snome = $_POST['snome'];

$nomeresp = $_POST['nomeresp'];

$teleresp = $_POST['teleresp'];

$dtnasc = $_POST['dtnasc'];

$sexo = $_POST['sexo'];

$matriescol = $_POST['matriescol'];

$emailresp = $_POST['emailresp'];

$cgm = $_POST['cgm'];

if (!isset($idaluno)) {
	echo '
           <div class="alert alert-danger" role="alert">
           Erro: Parâmetros Inválidos!
           </div>
           ';
           exit();
}

include '../conexao.class.php';
$sql = "UPDATE aluno SET nome = :nome, snome= :snome, nomeresp= :nomeresp, teleresp= :teleresp, dtnasc= :dtnasc, sexo= :sexo, matriescol= :matriescol, emailresp= :emailresp, cgm= :cgm WHERE idaluno= :idaluno";
// Atualize na Tabela aluno definindo nome antigo por nome novo e assim Sucessivamente onde idaluno seja igual a idaluno solicitada pelo usuário

          $stm = Conexao::prepare($sql);
          $stm->bindParam(':IDmateria', $IDmateria);
          $stm->bindParam(':nome', $nome);
          $stm->bindParam(':snome', $snome);
           $stm->bindParam(':nomeresp', $nomeresp);
          $stm->bindParam(':teleresp', $teleresp);
          $stm->bindParam(':dtnasc', $dtnasc);
           $stm->bindParam(':sexo', $sexo);
          $stm->bindParam(':matriescol', $matriescol);
          $stm->bindParam(':emailresp', $emailresp);
          $stm->bindParam(':cgm', $cgm);
          if($stm->execute()){
            
           $_SESSION ['editresultid'] =  "1" ; // Gera Session se deu certo
           header('Location: adm.aluno.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script     



         } else{

          $_SESSION ['editresultid'] =  "0" ; // Gera Session se deu certo
          header('Location: adm.aluno.php'); // Manda pra página de onde o user veio
          exit(); // Para o Script       
         } 



         // Os Sessions são usados para gerar a notificação na página de origem
       




?>










<?php	include '../footer.php';	?> <!-- Importando Rodapé -->
</body>
</html> 

