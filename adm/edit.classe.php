<?php	include 'header.template.php';	?> <!-- Importando Header -->

<?php

$idclasse = $_POST['idclasse'];

$letra = $_POST['letra'];

$numero = $_POST['numero'];

$periestu = $_POST['periestu'];


if (!isset($idclasse)) {
	echo '
           <div class="alert alert-danger" role="alert">
           Erro: Parâmetros Inválidos!
           </div>
           ';
           exit();
}

include '../conexao.class.php';
$sql = "UPDATE aluno SET idaluno = :idaluno, nome = :nome, snome= :snome, nomeresp= :nomeresp, teleresp= :teleresp, dtnasc= :dtnasc, sexo= :sexo, matriescol= :matriescol, emailresp= :emailresp, cgm= :cgm WHERE idaluno= :idaluno";
// Atualize na Tabela aluno definindo nome antigo por nome novo e assim Sucessivamente onde idaluno seja igual a idaluno solicitada pelo usuário

          $stm = Conexao::prepare($sql);
          $stm->bindParam(':idaluno', $idaluno);
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

