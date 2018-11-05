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
$sql = "UPDATE aluno SET idclasse = :idclasse, letra = :letra, numero= :numero, periestu= :periestu";
// Atualize na Tabela aluno definindo nome antigo por nome novo e assim Sucessivamente onde idaluno seja igual a idaluno solicitada pelo usuário

          $stm = Conexao::prepare($sql);
          $stm->bindParam(':idclasse', $idclasse);
          $stm->bindParam(':letra', $letra);
          $stm->bindParam(':numero', $numero);
           $stm->bindParam(':periestu', $periestu);
          
          if($stm->execute()){
            
           $_SESSION ['editresultid'] =  "1" ; // Gera Session se deu certo
           header('Location: adm.turma.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script     



         } else{

          $_SESSION ['editresultid'] =  "0" ; // Gera Session se deu certo
          header('Location: adm.turma.php'); // Manda pra página de onde o user veio
          exit(); // Para o Script       
         } 



         // Os Sessions são usados para gerar a notificação na página de origem
       




?>










<?php	include '../footer.php';	?> <!-- Importando Rodapé -->
</body>
</html> 

