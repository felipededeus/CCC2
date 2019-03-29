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
<html lang="pt-br">
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administração</title>
 <?php  include 'imp.css.php';  ?> <!-- Importando CSS -->

</head>
<body>

  <?php  include 'imp.java.php';  ?> <!-- Importando Scripts -->

  <div class="container-fluid bgnav">
    <?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->
  </div>


  <div class="jumbotron" >
  
    <!-- Modal -->
    <div class="modal fade" id="ModalCadastros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           <h4>
             Cadastros
            </h4> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"> </h4>
          </div>
          <div class="modal-body">
              <!-- Button trigger modal -->
          <a href="admin.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>  Adminstrador
          </a>

          <!-- Button trigger modal -->
          <a href="pedagogo.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>  Pedagogo
          </a>

          <!-- Button trigger modal -->
          <a href="resp.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>  Responsável
          </a>

          <!-- Button trigger modal -->
          <a href="aluno.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>  Aluno
          </a>

          <!-- Button trigger modal -->
          <a href="turma.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>Turma
          </a>

          <!-- Button trigger modal -->
          <a href="cadocorren.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/add.png" width="18px"/>Ocorrência
          </a>
          <!-- Button trigger modal -->

          <a href="materia.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
           <img src="images/add.png" width="18px"/> Matéria
         </a>

         <!-- Button trigger modal -->
         <a href="curso.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
          <img src="images/add.png" width="18px"/>  Curso
             
           <!-- Button trigger modal -->
         <a href="professor.form.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
          <img src="images/add.png" width="18px"/>  Professor
        </a>
      </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>            
          </div>
        </div>
      </div>
    </div>

    <!-- Fim Modal -->
      
        <!-- Modal -->
    <div class="modal fade" id="ModalRelatorios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           <h4>
             Relatórios
            </h4> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"> </h4>
          </div>
          <div class="modal-body">
              <!-- Button trigger modal -->
          <a href="sol.rel.turma.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">            
            Relatório por Turma
          </a>

           <!-- Button trigger modal -->
          <a href="sol.rel.geral.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">            
            
             Relatório Geral
          </a>

         
      </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>            
          </div>
        </div>
      </div>
    </div>

    <!-- Fim Modal -->


        <!-- Modal -->
    <div class="modal fade" id="ModalFerramentas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           <h4>
             Ferramentas Administrativas
            </h4> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"> </h4>
          </div>
          <div class="modal-body">


                  <!-- Button trigger modal -->
          <a href="adm/adm.admin.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/see.png" width="18px"/> Gerenciar Adminstradores
          </a>

          <!-- Button trigger modal -->
          <a href="adm/adm.pedagogo.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/see.png" width="18px"/> Gerenciar Pedagogos
          </a>

          <!-- Button trigger modal -->
          <a href="adm/adm.aluno.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/see.png" width="18px"/>  Gerenciar Alunos
          </a>

          <!-- Button trigger modal -->
          <a href="adm/adm.turma.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/see.png" width="18px"/> Gerenciar Turmas
          </a>

          <!-- Button trigger modal -->
          <a href="adm/adm.ocorrencia.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
            <img src="images/see.png" width="18px"/> Gerenciar Ocorrências
          </a>
          <!-- Button trigger modal -->

          <a href="adm/adm.materia.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
           <img src="images/see.png" width="18px"/> Gerenciar Matérias
         </a>

         <!-- Button trigger modal -->
         <a href="adm/adm.curso.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
          <img src="images/see.png" width="18px"/>  Gerenciar Cursos
             
           <!-- Button trigger modal -->
         <a href="adm/adm.professor.php" class="btn btn-dacor col-md-12 m-1 text-left"  style="color: #fff;">
          <img src="images/see.png" width="18px"/>  Gerenciar Professores
        </a>
         
      </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>            
          </div>
        </div>
      </div>
    </div>

    <!-- Fim Modal -->



    <h2 class="display-4 pb-5 ml-5">Painel Administrativo:</h2> <hr>

  </div>


      
      <center>
        <!-- Button trigger modal -->
    <div class="btn btn-dacor mt-4"  style="color: #fff;" data-toggle="modal" data-target="#ModalCadastros"> <h4>   Cadastros    </h4>   </div> 
        <!-- Fim Button trigger modal -->
        
         <!-- Button trigger modal -->
    <div class="btn btn-dacor mt-4"  style="color: #fff;" data-toggle="modal" data-target="#ModalRelatorios"> <h4>  Relatórios    </h4>   </div> 
        <!-- Fim Button trigger modal -->

         <!-- Button trigger modal -->
    <div class="btn btn-dacor mt-4"  style="color: #fff;" data-toggle="modal" data-target="#ModalFerramentas"> <h4>  Ferramentas Administrativas   </h4>   </div> <hr>
        <!-- Fim Button trigger modal -->
        
        </center>
      
    </button>


<div class="jumbotron" >


<hr>
<h3>Exibindo Todas as Ocorrências Cadastradas no Sistema...</h3>


  <div class="account-wall">


    <script type="text/javascript">

            $(document).ready(function() {
   var dataSrc = [];

   var table = $('#resultados').DataTable({
     "order": [[ 8, "desc" ]],
      'initComplete': function(){
         var api = this.api();

         // Populate a dataset for autocomplete functionality
         // using data from first, second and third columns
         api.cells('tr', [1,2,3,4,5,6,7,8,9,10]).every(function(){
            // Get cell data as plain text
            var data = $('<div>').html(this.data()).text();           
            if(dataSrc.indexOf(data) === -1){ dataSrc.push(data); }
         });
         
         // Sort dataset alphabetically
         dataSrc.sort();
        
         // Initialize Typeahead plug-in
         $('.dataTables_filter input[type="search"]', api.table().container())
            .typeahead({
               source: dataSrc,
               afterSelect: function(value){
                  api.search(value).draw();
               }
            }
         );
      }
   });
});


$(function(){

    // add multiple select / deselect functionality
    $("#selectall").click(function () {
          $('.case').attr('checked', this.checked);
    });

    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
    $(".case").click(function(){

        if($(".case").length == $(".case:checked").length) {
            $("#selectall").attr("checked", "checked");
        } else {
            $("#selectall").removeAttr("checked");
        }

    });
});

            

          </script>

          <form method="POST" action="del.check.geral.php">
          

          
          <table id="resultados" class="table table-hover ">
          <input class="form-check-input ml-2" name="seltudo" type="checkbox" id="selectall"/> <label for="selectall">Selecionar Tudo</label>

            <thead>
              <tr>
                <th > </th>
                <th style="display: none;"> </th>
                <th style="display: none;"> </th>
                <th style="display: none;"> </th>
                <th style="display: none;"> </th>
                <th style="display: none;"> </th>
                <th style="display: none;"> </th>
                <th style="display: none;"> </th>
                <th style="display: none;"> </th>
                <th style="display: none;"> </th>
                <th style="display: none;"> </th>

              </tr>
            </thead>
            <tbody>


              <?php  include 'consulta.geral.php';  ?>

            </tbody>
          </table>
          <input class="btn btn-danger" type="submit" value="Apagar Selecionados">
          <input class="btn btn-secondary" type="reset" value="Limpar Seleção">
        </form>



        </div>
      </div>
    </div>
  </div>
</div>


</div> <!-- /jumbotron-->


<?php	include 'footer.php';	

if (isset($_SESSION['delresultid'])) {
                

                if ($_SESSION['delresultid'] == 1){
                  echo "<script>

                  $.notify(\"Informações deletadas com sucesso!\", {
                    type: 'success',


                    animate: {

                      enter: 'animated lightSpeedIn',
                      exit: 'animated lightSpeedOut'
                    }
                    });




                    </script> ";
                    unset ($_SESSION ['delresultid']);
                  }
                }

                if (isset($_SESSION['delresultid'])) {
                  if ($_SESSION['delresultid'] == 0){
                    echo "<script>
                    $.notify(\"Um erro ocorreu ao tentar deletar as informações: Verifique se as mesmas não estão sendo utilizadas.\", {
                      type: 'danger',
                    //showProgressbar: true,


                      animate: {

                        enter: 'animated lightSpeedIn',
                        exit: 'animated lightSpeedOut'
                      }
                    }); ";
                    unset ($_SESSION ['delresultid']);
                  }
                }



?> <!-- Importando Rodapé -->


</body>
</html> 

