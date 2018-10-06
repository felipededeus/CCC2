
<meta charset="utf-8">
<!-- CSS Links -->
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/login.css">

  <!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap4.css">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

  <script src="js/jquery-ui.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="js/bootstrap.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <div class="bgnav">
    <nav class="navbar navbar-expand-lg navbar-light ">
      <a href="#"> <img src="images/logosistema.png" width="90px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


          <!-- ////////////////////////////////////////////// Nav pra cada tipo de user ///////////////////////////////////// -->      

          <?php
          if (isset($_SESSION['admin'])) {
            echo ' 
            <li class="nav-item active"> <a class="nav-link" href="admin.php">Painel de Administração  |<span class="sr-only">(current)</span></a></li>
            ' ;   
          }     ?>  



           <?php
          if (isset($_SESSION['pedagogo'])) {
            echo ' 
            <li class="nav-item active"> <a class="nav-link" href="turmas.php">Turmas<span class="sr-only">(current)</span></a></li>
            ' ;   
          }     ?>  


              <?php
          if (isset($_SESSION['professor'])) {
            echo ' 
            <li class="nav-item active"> <a class="nav-link" href="turmas.php">Turmas<span class="sr-only">(current)</span></a></li>

             <li class="nav-item active"> <a class="nav-link" href="ocorrencia.form.php">| Cadastrar Novas Informações |<span class="sr-only">(current)</span></a></li>


            ' ;   
          }     ?>  







          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

              <?php if (isset($_SESSION['username'])){
                echo 'Logado com o Usuário: '.$_SESSION['username'];


              } 

              else{

                echo "Por Favor, Faça Login!";
              }
              ?>

            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Mudar Senha</a>
              <a class="dropdown-item" href="logout.php">Trocar de Usuário</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Sair</a>
            </div>
          </li>

        </ul>

      </div>
    </nav>
  </div>
