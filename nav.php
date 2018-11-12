﻿
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
            <li class="nav-item active"> <a class="nav-link" href="telapedagogo.php">Painel Pedagogo |<span class="sr-only">(current)</span></a></li>
            ' ;   
          }     ?>  


              <?php
          if (isset($_SESSION['professor'])) {
            echo ' 
            <li class="nav-item active"> <a class="nav-link" href="telaprofessor.php">Suas Ocorrências<span class="sr-only">(current)</span></a></li>

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

                echo "<script>

                  $.notify(\"Você está Deslogado: Por Favor, Faça Login!\", {
                    type: 'danger',


                    animate: {

                      enter: 'animated lightSpeedIn',
                      exit: 'animated lightSpeedOut'
                    }
                    });




                    </script> ";
              }
              ?>

            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="novasenha.form.php">Mudar Senha</a>
              <a class="dropdown-item" href="logout.php">Trocar de Usuário</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Sair</a>
            </div>
          </li>

        </ul>

      </div>
    </nav>
  </div>
