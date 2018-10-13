<?php	include 'header.template.php';	?> <!-- Importando Header -->

<?php

$IDmateria = $_POST['IDmateria'];

$nome = $_POST['nome'];

$descr = $_POST['descr'];

if (!isset($IDmateria)) {
	echo '
           <div class="alert alert-danger" role="alert">
           Erro: Parâmetros Inválidos!
           </div>
           ';
           exit();
}

include '../conexao.class.php';
$sql = "UPDATE materia SET nome = :nome, descr= :descr WHERE IDmateria= :IDmateria";
          $stm = Conexao::prepare($sql);
          $stm->bindParam(':IDmateria', $IDmateria);
          $stm->bindParam(':nome', $nome);
          $stm->bindParam(':descr', $descr);
          if($stm->execute()){
           echo '
           <div class="alert alert-success" role="alert">
          Matéria Atualizada 
           </div>
           ';
         } else{
           echo '
           <div class="alert alert-danger" role="alert">
           Erro ao tentar alterar Matéria. Verefique se não existe nenhuma ocorrência relacionada a esta matéria e tente novamente.
           </div>
           ';
         } 
       




?>










<?php	include '../footer.php';	?> <!-- Importando Rodapé -->
</body>
</html> 

