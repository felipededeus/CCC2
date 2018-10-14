﻿
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Professor</title>
	<!-- CSS Links -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/login.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap4.css">
</head>
<body>

	<div class="container-fluid bgnav">
		<?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->
	</div>

	<div class="jumbotron">


  <?php 

include("conexao.class.php");   //verifica se existe conexão com bd; caso não tenta, cria uma nova


//Pegar dados do Form

    $nome = $_POST['nome'];

    $snome = $_POST['snome'];

    $username = $_POST['username'];

    $dtnasc = $_POST['dtnasc'];

    $email = $_POST['email'];    

    $senha = md5($_POST['senha']);

    $rsenha = md5( $_POST['rsenha']);



//Verifica se as duas senhas são iguais

    if ($senha != $rsenha) {
    $_SESSION ['cadsenhad'] = "1";  
    header('Location: pedagogo.form.php');
    exit();

    }

    else {

        //Verificando se Já existe um user com o mesmo nome cadastrado no sistema
         $sql = "SELECT username FROM admin WHERE username= :username UNION SELECT username FROM professor WHERE username= :username UNION SELECT username FROM pedagogo WHERE username= :username";
        $stm = Conexao::prepare($sql);
        $stm->bindParam(':username', $username);
        $stm->execute();


 if ($stm->rowCount()> 0) {     

    $_SESSION ['jaexiste'] = "Erro[046]: Esse nome de usuário já existe!";  
    header('Location: pedagogo.form.php');
    exit();

  }

  else{
              

//Criando conexão com Banco de Dados
 
    $sql = "INSERT INTO pedagogo (nome, snome, username, dtnasc, email, senha) values (?,?,?,?,?,?)";

	$stm = conexao::prepare($sql);

$stm->bindValue(1, $nome);
$stm->bindValue(2, $snome);
$stm->bindValue(3, $username);
$stm->bindValue(4, $dtnasc);
$stm->bindValue(5, $email);
$stm->bindValue(6, $senha);



  
if($stm->execute()){
 $_SESSION ['cadok'] =  "1" ; // Gera Session se deu certo
           header('Location: pedagogo.form.php'); // Manda pra página de onde o user veio
           exit(); // Para o Script     ;
}//End desse If aí de Cima





   
} //End do Else dos Users
}  // End do Else das duas Senhas
    ?>	





</div>





<?php	include 'footer.php'; ?> <!-- Importando Rodapé -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html> 