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

	<?php  include 'imp.java.php';  ?> <!-- Importando Scripts -->

	<div class="container-fluid bgnav">
		<?php	include 'nav.php';	?> <!-- Importando Barra de Navegação -->
	</div>

	<div class="jumbotron">
		<div class="container">
			<div class="row"> 
				<div class="col-xs-12">

					<h2 class="text-center login-title"><h2>Suas Ocorrências:</h2> <hr>
				</h2>
				<h4> Exibindo suas ocorrências dos últimos 10 (dez) dias... </h4>

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
         api.cells('tr', [1,2,3,4,5,6,7,8,9]).every(function(){
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


						

					</script>

					<form method="POST" action="del.check.geral.php">
					

					
					<table id="resultados" class="table table-hover ">

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
