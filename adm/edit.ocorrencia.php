<?php	include 'header.template.php';	?> <!-- Importando Header -->

<?php

$idocorrencias = $_POST['idocorrencias'];

$nome = $_POST['nome'];

$descr = $_POST['descr'];

if (!isset($idocorrencias)) {
	echo '
           <div class="alert alert-danger" role="alert">
           Erro: Parâmetros Inválidos!
           </div>
           ';
           exit();
}

include '../conexao.class.php';
$sql = "UPDATE ocorrencias SET nome = :nome, descr= :descr WHERE idocorrencias= :idocorrencias";
// Atualize na Tabela   definindo nome antigo por nome novo descr antiga por descr nova onde ID eja igual a ID  solicitada pelo usuário

          $stm = Conexao::prepare($sql);
          $stm->bindParam(':idocorrencias', $idocorrencias);
          $stm->bindParam(':nome', $nome);
          $stm->bindParam(':descr', $descr);
          if($stm->execute()){
            
           $_SESSION ['editresultid'] =  "1" ; // Gera Session se deu certo
           header('Location: adm.ocorrencia.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script     



         } else{

          $_SESSION ['editresultid'] =  "0" ; // Gera Session se deu certo
          header('Location: adm.ocorrencia.php'); // Manda pra página de onde o user veio
          exit(); // Para o Script       
         } 



         // Os Sessions são usados para gerar a notificação na página de origem
       




?>










<?php	include '../footer.php';	?> <!-- Importando Rodapé -->
</body>
</html> 

