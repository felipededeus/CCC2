
<?php	


include 'header.template.php';	?> <!-- Importando Header -->

<?php

$idadmin = $_POST['idadmin'];



if (!isset($idadmin)) {  // Verifica se o usuário pode ter acesso a essa função
	echo '
           <div class="alert alert-danger" role="alert">
           Erro: Parâmetros Inválidos!
           </div>
           ';
           exit();
}






include '../conexao.class.php';




$sql = "DELETE FROM admin  WHERE idadmin= :idadmin"; // Apague da Tabela admin onde ID seja igual a ID...
          $stm = Conexao::prepare($sql);
          $stm->bindParam(':idadmin', $idadmin);          
          if($stm->execute()){
          
          $_SESSION ['delresultid'] =  "1" ; // Gera Session se deu certo
          header('Location: adm.admin.php'); // Manda pra página de onde o user veio
          exit(); // Para o Script   
          
           
           ;
         } else{
          $_SESSION ['delresultid'] =  "0" ; // Gera Session se deu errado
          header('Location: adm.admin.php'); // Manda pra página de onde o user veio
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

