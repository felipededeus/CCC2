<?php	include 'header.template.php';	?> <!-- Importando Header -->

<?php

$IDmateria = $_POST['IDmateria'];

echo "<h3>Obs: Apenas é possível excluir a matéria caso nenhuma ocorrência relacionada com a mesma tenha sido cadastrada.</h3>";

if (!isset($IDmateria)) {
	echo '
           <div class="alert alert-danger" role="alert">
           Erro: Parâmetros Inválidos!
           </div>
           ';
           exit();
}

include '../conexao.class.php';
$sql = "DELETE FROM materia  WHERE IDmateria= :IDmateria";
          $stm = Conexao::prepare($sql);
          $stm->bindParam(':IDmateria', $IDmateria);
          
          if($stm->execute()){
           echo '
           <div class="alert alert-success" role="alert">
          Matéria Deletada
           </div>
           ';
         } else{
           echo '
           <div class="alert alert-danger" role="alert">
           Erro ao tentar deletar Matéria. Verefique se não existe nenhuma ocorrência relacionada a esta matéria e tente novamente.
           </div>
           ';
         } 
       




?>










<?php	include '../footer.php';	?> <!-- Importando Rodapé -->
</body>
</html> 

