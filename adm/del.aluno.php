
<?php	


include 'header.template.php';	?> <!-- Importando Header -->

<?php

$idaluno = $_POST['idaluno'];



if (!isset($idaluno)) {  // Verifica se o usuário pode ter acesso a essa função
	echo '
           <div class="alert alert-danger" role="alert">
           Erro: Parâmetros Inválidos!
           </div>
           ';
           exit();
}






include '../conexao.class.php';




$sql = "DELETE FROM aluno WHERE idaluno= :idaluno"; // Apague da Tabela aluno onde idaluno seja igual a idaluno...
          $stm = Conexao::prepare($sql);
          $stm->bindParam(':idaluno', $idaluno);          
          if($stm->execute()){
          
          $_SESSION ['delresultid'] =  "1" ; // Gera Session se deu certo
          header('Location: adm.aluno.php'); // Manda pra página de onde o user veio
          exit(); // Para o Script   
          
           
           ;
         } else{
          $_SESSION ['delresultid'] =  "0" ; // Gera Session se deu errado
          header('Location: adm.aluno.php'); // Manda pra página de onde o user veio
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

