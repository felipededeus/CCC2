<?php session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
  }

  else{
          if (!isset($_SESSION['senha'])) {
    header("Location: index.php");
    exit;

  }
}

   if (!isset($_SESSION['admin'])) {
                  header("Location: index.php");    
                  exit;      

          }
?> <!-- Verificando se o infeliz tah logado e pode ver essa página-->


<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastro de Turmas</title>
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
    <div class="container">
      <div class="row"> 
        <div class="col-xs-12">
           <div class="col-sm-6 col-md-offset-2 col-md-8">
			   <h2 class="text-center login-title"><h2>Cadastro de Turmas</h2> Preencha corretamente as informações abaixo:</h2>
             <div class="account-wall">
                <img class="profile-img" src="images/class.png">
                <form class="form-cadastro" action="turma.controller.php" method="post">

                    <div class="col-md-5 pt-3">
        Número
                <input type="number" class="form-control" max="99" placeholder="Número da Turma" required autofocus name="numero">
        </div>
                
                <div class="col-md-5 pt-3">
				Letra:
                <input type="text" class="form-control" maxlength="2"  placeholder="Letra da Turma" onblur="evento(this);"  required autofocus name="letra">

                <script type="text/javascript">

function evento(obj) {
  obj.value = obj.value.toUpperCase();
}

</script>
				</div>

       
              
              
               <div class="col-md-7 pt-3">
                Período Estudantil:
                <select class="form-control form-control-lg" name="periestu">
                <option value="1">Matutino</option>
                <option value="2">Vespertino</option>
                <option value="3">Noturno</option>
                <option value="4">Contraturno</option>
</select> 
				</div>
            	
                            
               <div class="col-md-12 pt-3">
                <button class="btn btn-lg btn-primary btn-block pt-3" type="submit">
                    Cadastrar</button>
					</div>
               
             <span class="clearfix"></span>
                </form>
            </div>
        
        </div>
        </div>
      </div>
    </div>
  </div>

  

   

<?php	include 'footer.php';	?> <!-- Importando Rodapé -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html> 

