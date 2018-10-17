
<?php	


include 'header.template.php';	?> <!-- Importando Header -->

<?php

$idocorrencias = $_POST['idocorrencias'];



if (!isset($idocorrencias)) {  // Verifica se o usuário pode ter acesso a essa função
	echo '
           <div class="alert alert-danger" role="alert">
           Erro: Parâmetros Inválidos!
           </div>
           ';
           exit();
}






include '../conexao.class.php';




$sql = "DELETE FROM ocorrencias  WHERE idocorrencias= :idocorrencias"; // Apague da Tabela Materia onde ID materia seja igual a ID materia...
          $stm = Conexao::prepare($sql);
          $stm->bindParam(':idocorrencias', $idocorrencias);          
          if($stm->execute()){
          
          $_SESSION ['delresultid'] =  "1" ; // Gera Session se deu certo
          header('Location: adm.ocorrencia.php'); // Manda pra página de onde o user veio
          exit(); // Para o Script   
          
           
           ;
         } else{
          $_SESSION ['delresultid'] =  "0" ; // Gera Session se deu errado
          header('Location: adm.ocorrencia.php'); // Manda pra página de onde o user veio
          exit(); // Para o Script              
         } 
       
 		$_SESSION ['delresultid'] =  "0" ;
// 1 = Deu certo
// 0 = Erro

 		// Os Sessions são usados para gerar a notificação na página de origem

?>










<?php	include '../footer.php';	?> <!-- Importando Rodapé -->
</body>
</html> 

