<?php 
session_start();
include("conexao.class.php");

$username = preg_replace('/[À-Úà-ú]/','', $_POST['username']);
$senha =  addslashes ($_POST['senha']); 
$senhash = md5($senha);

$sql = "SELECT username, senha FROM admin WHERE username= :username and senha= :senha ";

$stm = Conexao::prepare($sql);
$stm->bindParam(':username', $username);
$stm->bindParam(':senha', $senhash);

$stm->execute();


if ($stm->rowCount()> 0) { 		
	$admin= "yes";
	$_SESSION ['admin'] = $admin;
	$_SESSION ['username'] = $_POST['username'];
	$_SESSION ['senha'] = $senha; 		
	header('Location: admin.php');

} else {

	$sql = "SELECT id, username, senha FROM professor WHERE username= :username and senha= :senha ";

	$stm = Conexao::prepare($sql);
	$stm->bindParam(':username', $username);
	$stm->bindParam(':senha', $senhash);
	$stm->execute();


	if ($stm->rowCount()> 0) { 		
		$_SESSION ['username'] = $_POST['username'];
		$_SESSION ['professor'] = $_POST['username'];
		$row=$stm->fetch(PDO::FETCH_ASSOC);
		$_SESSION ['idprofessor'] = $row['id'];
		$_SESSION ['senha'] = $senha; 		
		header('Location: telaprofessor.php');

	} else {

		$sql = "SELECT username, senha FROM pedagogo WHERE username= :username and senha= :senha ";

		$stm = Conexao::prepare($sql);
		$stm->bindParam(':username', $username);
		$stm->bindParam(':senha', $senhash);
		$stm->execute();


		if ($stm->rowCount()> 0) { 
			$pedagogo= "yes";
			$_SESSION ['pedagogo'] = $pedagogo;		
			$_SESSION ['username'] = $_POST['username'];
			$_SESSION ['senha'] = $senha; 		
			header('Location: telapedagogo.php');
		} else { 


			$_SESSION['ErroLogin'] = "Erro ao tentar logar, Verifique se as Informações digitadas estão corretas. <br>Erro [041]";
 				header("location: index.php"); //Redireciona pra caso o infeliz clique em logar e deixe tudo em branco ou tente copiar a url de validação
 			}
 		}



 	}




//else
 	//$_SESSION['ErroLogin'] = "Erro ao tentar logar, Verifique se as Informações digitadas estão corretas. <br>Erro [042]";
 	//header("Location: index.php"); //Redireciona pra caso o infeliz clique em logar e deixe tudo em branco ou tente copiar a url de validação

 	?>