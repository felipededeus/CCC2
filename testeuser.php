 
<?php

$username = $_GET['username'];


include 'conexao.class.php';

  //Verificando se Já existe um user com o mesmo nome cadastrado no sistema
        $sql = "SELECT username FROM admin WHERE username= :username UNION SELECT username FROM professor WHERE username= :username UNION SELECT username FROM pedagogo WHERE username= :username";
        $stm = Conexao::prepare($sql);
        $stm->bindParam(':username', $username);
        $stm->execute();


 if ($stm->rowCount()> 0) {     

 echo '<div class="alert alert-danger col-md-12">Este Usuário Já existe! </div>';
  }

  else{

 echo '<div class="alert alert-success col-md-12">Usuário Disponível! </div>';



}



   ?>