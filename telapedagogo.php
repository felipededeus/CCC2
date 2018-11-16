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

if (!isset($_SESSION['pedagogo'])) {
		header("Location: index.php");
		exit;
	}


?> <!-- Verificando se o infeliz tah logado -->

<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CCC - Pedagogo</title>
	<?php  include 'imp.css.php';  ?> <!-- Importando CSS -->

</head>
<body>

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

	<?php  include 'imp.java.php';  ?> <!-- Importando Scripts -->

	<div class="container-fluid bgnav">
		<?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->
	</div>

	<div class="jumbotron">
		<div class="container">
			<div class="row"> 
				<div class="col-xs-12">

					<!-- Button trigger modal -->
    <div class="btn btn-dacor mt-4"  style="color: #fff;" data-toggle="modal" data-target="#ModalRelatorios"> <h4> Outros Relatórios    </h4>   </div> <hr>
        <!-- Fim Button trigger modal -->

					<h2 class="text-center login-title"><h2>Relatório de Ocorrências</h2> <hr>
				</h2>
				<h4> Exibindo todas as ocorrências registradas no sistema...</h4>

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
