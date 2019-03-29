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
?> 
<!-- Verificando se o infeliz tah logado e pode ver essa página-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Aluno
    </title>
    <?php  include 'imp.css.php';  ?> 
    <!-- Importando CSS -->
  </head>
  <body>
    <?php  include 'imp.java.php';  ?> 
    <!-- Importando Scripts -->
    <div class="container-fluid bgnav">
      <?php include 'nav.php';  ?> 
      <!-- Importando Barra de Navegação -->
    </div>
    <div class="jumbotron">
      <div class="container">
        <div class="row"> 
          <div class="col-xs-12">
            <div class="col-sm-6 col-md-offset-2 col-md-8">
              <h2 class="text-center login-title">
                <h2>Cadastro de Alunos
                </h2> Preencha corretamente as informações abaixo:
              </h2>
              <div class="account-wall">
                <img class="profile-img" src="images/aluno.png">
                <form class="form-cadastro" action="aluno.controller.php" method="post">
                  <div class="col-md-5 pt-3">
                    Nome:
                    <input type="text" class="form-control" placeholder="Nome" name="nome" maxlength="60"  required autofocus>
                  </div>
                  <div class="col-md-7 pt-3">
                    Sobrenome:
                    <input type="text" class="form-control" placeholder="Sobrenome" name="snome" maxlength="150" required autofocus>
                  </div>
                  <div class="col-md-12 pt-3">
                    Sexo:
                    <label class=" radio-inline">
                      <input type="radio" name="sexo" value="1"> Masculino 
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="sexo" value="0"> Feminino  
                    </label>
                  </div>
                  <div class="col-md-12 pt-3">
                    Data de Nascimento:
                    <input type="date" class="form-control" placeholder="" name="dtnasc" maxlength="12" required autofocus>
                  </div>
                  <div class="col-md-12 pt-3">
                    Cadastro Geral de Matrícula (CGM):
                    <input type="numeric" class="form-control" placeholder="23912" name="cgm" maxlength="8" required autofocus>
                  </div>
                  <!--
<div class="col-md-12 pt-3">
Turma Associada:
<select name="turma" class="form-control form-control-lg"> 
<?php
include "conexao.class.php";
$sql = "SELECT * FROM classe";
$stm = conexao::prepare($sql);
$stm->execute();    
while($row=$stm->fetch(PDO::FETCH_ASSOC)){
echo '<option value="'.$row['idclasse'].'">'.$row['nomeclasse'].'</option>';
}
?>
</select>  
</div> -->
                  <script type="text/javascript">
                    $(document).ready(function () {
                      //Inicialmente desmarca o CheckBox
                      $('#checkoculta').removeAttr('checked');
                      // Inicialmente , oculta o textbox CPF quando o form for carregado
                      $('#oculta').hide();
                      $('#checkoculta').change(function () {
                        if (this.checked) {
                          $('#oculta').show();
                        }
                        else {
                          $('#oculta').hide();
                        }
                      }
                                              );
                    }
                                     );
                  </script>
                  <div class="col-md-12 pt-3">
                    Responsável
                    <input type="text" name="responsavel" class="form-control" id="responsavel"/>
                    <input type="text" hidden="1" name="idresponsavel" class="form-control" id="idresponsavel"/>
                    <div id="mydiv"> 
                    </div>
                  </div>
                  <input type="checkbox" class="form" id="checkoculta" name="checkoculta" value="Bike">
                  <label for="checkoculta">Inserir mais um responsável: 
                  </label>
                  <div id="oculta" class="col-md-12 pt-3" style="">
                    <div class="col-md-12 pt-3">
                      Responsável 2
                      <input type="text" name="responsavel2" class="form-control" id="responsavel2"/>
                      <input type="text" hidden="1" name="idresponsavel2" class="form-control" id="idresponsavel2"/>
                      <div id="mydiv"> 
                      </div>
                    </div>  
                  </div>      
                  <script>
                    $('#responsavel').autocomplete({
                      source: 'completar.resp.php?acao=autocomplete', minLength: 2, autoFocus: true, appendTo: '#formoco',
                      select: function(e,ui){
                        e.preventDefault();
                        // set value in your element
                        $(this).val(ui.item.label);
                        // set value in the hidden field
                        $('#idresponsavel').val(ui.item.value);
                      }
                      ,
                    }
                                                  );
                    $('#responsavel2').autocomplete({
                      source: 'completar.resp.php?acao=autocomplete', minLength: 2, autoFocus: true, appendTo: '#formoco',
                      select: function(e,ui){
                        e.preventDefault();
                        // set value in your element
                        $(this).val(ui.item.label);
                        // set value in the hidden field
                        $('#idresponsavel2').val(ui.item.value);
                      }
                      ,
                    }
                                                   );
                  </script>
                  <div class="col-md-12 pt-3">
                    <button class="btn btn-lg btn-primary btn-block pt-3" type="submit">
                      Cadastrar
                    </button>
                  </div>
                  <span class="clearfix">
                  </span>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_SESSION['cadok'])){                        
echo "<script>
$.notify(\"Aluno Cadastrado com Sucesso!\", {
type: 'success',
animate: {
enter: 'animated lightSpeedIn',
exit: 'animated lightSpeedOut'
}
});
</script> ";
unset ($_SESSION ['cadok']);
//Avisa que deu certo
} ?>
    <?php include 'footer.php'; ?> 
    <!-- Importando Rodapé -->
  </body>
</html> 
