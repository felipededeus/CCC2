
<?php

$username = $_POST['username'];


include '../conexao.class.php';

  //Verificando se Já existe um user com o mesmo nome cadastrado no sistema
        $sql = "SELECT username FROM admin WHERE username= :username UNION SELECT username FROM professor WHERE username= :username UNION SELECT username FROM pedagogo WHERE username= :username";
        $stm = Conexao::prepare($sql);
        $stm->bindParam(':username', $username);
        $stm->execute();


 if ($stm->rowCount()> 0) {     

 echo '




 <span class=" badge-danger"><strong>Este Usuário Já existe! </strong></span> ';
  }

  else{

 echo '<span class=" badge-success"><strong>Usuário Disponível!</strong> </span>';



}



   ?>

