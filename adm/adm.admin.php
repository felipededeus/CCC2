<?php	include 'header.template.php';	?> <!-- Importando Header -->

<script type="text/javascript">
	
	



	$('#formedit').submit(function(e) {
		var dados = jQuery( this ).serialize();
		e.preventDefault();
		$.ajax({
        url: 'edit.admin.php', // caminho para o script que vai processar os dados
        type: 'POST',
        data: { dados:dados, },
        success: function(response) {
            $("#resultados").load("adm.admin.php #resultados"); //parte da mesma página
        },
        error: function(xhr, status, error) {
        	alert(xhr.responseText);
        }
    });
		return false;
	}); 



	$('#formdel').submit(function(e) {
		var dados = jQuery( this ).serialize();
		e.preventDefault();
		$.ajax({
        url: 'del.admin.php', // caminho para o script que vai processar os dados
        type: 'POST',
        data: { dados:dados, },
        success: function(response) {
            $("#resultados").load("adm.admin.php #resultados"); //parte da mesma página
        },
        error: function(xhr, status, error) {
        	alert(xhr.responseText);
        }
    });
		return false;
	}); 




</script>


<div class="jumbotron">
	<div class="container">
		<div class="row"> 
			<div class="col-md-12">

				<h2 class="text-center login-title">Adminstração - Administradores</h2>
				<hr>				

				
					<!-- Script do Datatables -->
					<script type="text/javascript">
						

						$(document).ready( function () {
							$('#resultados').DataTable({responsive: true, info: false});
						} );

						
					</script>

					<table id="resultados" class=" table table-bordered table-hover">
						<thead class="thead-light">
							<tr>

								<th>ID</th>
								<th>Nome </th>
								<th>Sobrenome </th>
								<th>E-mail</th>
								<th>Nome de Usuario</th>
								<th>Data de Nascimento</th>
								<th>Ações:</th>


								
									



							</tr>


						</thead>

						<tbody style="background-color: #fff;">
							<?php

							if (isset($_SESSION['editresultid'])) {
								

								if ($_SESSION['editresultid'] == 1){
									echo "<script>

									$.notify(\"Atualizações realizadas com sucesso!\", {
										type: 'success',


										animate: {

											enter: 'animated lightSpeedIn',
											exit: 'animated lightSpeedOut'
										}
										});




										</script> ";
										unset ($_SESSION ['editresultid']);
									}
								}

								if (isset($_SESSION['editresultid'])) {
									if ($_SESSION['editresultid'] == 0){
										echo "<script>
										$.notify(\"Um erro ocorreu durante a atualização...\", {
											type: 'danger',
										//showProgressbar: true,


											animate: {

												enter: 'animated lightSpeedIn',
												exit: 'animated lightSpeedOut'
											}
										}); ";
										unset ($_SESSION ['editresultid']);
									}
								}






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






								include '../conexao.class.php';
								$sql = "SELECT * FROM admin";
								$stm = conexao::prepare($sql);
								$stm->execute(); 

								while ($row=$stm->fetch(PDO::FETCH_ASSOC)) {


									echo '<!-- Modal Editar -->
									<div class="modal fade" id="ModalEdit'.$row['idadmin'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
									<h4>
									Editar:
									</h4> 
									<hr>
									<button type="button" class="close" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel"> </h4>
									</div>
									<div class="modal-body">

									<!-- Colocar Form aqui -->
									<form class="form-cadastro" action="edit.admin.php" method="post"  id="formedit">
									<script type="text/javascript">
             
             $(document).ready(function () {
                 //Inicialmente desmarca o CheckBox
                 $(\'#checkoculta'.$row['idadmin'].'\').removeAttr(\'checked\');
                 // Inicialmente , oculta o textbox CPF quando o form for carregado
                 $(\'#oculta'.$row['idadmin'].'\').hide();
                $(\'#checkoculta'.$row['idadmin'].'\').change(function () {
                    if (this.checked) {
                    $(\'#oculta'.$row['idadmin'].'\').show();
                    }
                    else {
                    $(\'#oculta'.$row['idadmin'].'\').hide();
                   }
             });
             });
    </script>

									<input type="text" value="'.$row['idadmin'].'" class="form-control" placeholder="Nome da Matéria" required autofocus maxlength="60"  name="idadmin" hidden="1">


									<div class="col-md-12 pt-3">
									Nome:
									<input type="text" value="'.$row['nome'].'" class="form-control" placeholder="Nome do professor" required autofocus maxlength="60"  name="nome">
									</div>

									<div class="col-md-12 pt-3">
									Sobrenome:
									<input type="text" value="'.$row['snome'].'" class="form-control" placeholder="Sobrenome" required autofocus maxlength="150"  name="snome">
									</div>

									

									<div class="col-md-12 pt-3">
									E-mail:
									<input type="email" value="'.$row['email'].'" class="form-control" placeholder="Nome da Matéria" required autofocus maxlength="100"  name="email">
									</div>

									<div class="col-md-12 pt-3">
									Data de Nascimento:
									<input type="date" value="'.$row['dtnasc'].'" class="form-control" placeholder="" required autofocus maxlength="100"  name="dtnasc">
									<hr>
									</div>

									<hr>

										<input type="checkbox" class="form" id ="checkoculta'.$row['idadmin'].'" name="checkoculta'.$row['idadmin'].'" value="Bike"> <label for="checkoculta'.$row['idadmin'].'">Alterar Nome de Usuário </label>

									<div id="oculta'.$row['idadmin'].'" class="col-md-12 pt-3">

									<script>







function checkname'.$row['idadmin'].'()
{
 var name=document.getElementById( "UserName'.$row['idadmin'].'" ).value;
 

 if(name.length >0)
 {
      $.ajax({
          type: \'post\',
          url: \'checkdata.php\',
          data: {
           username:name,
          },
          success: function (response) {
               
               $( \'#name_status'.$row['idadmin'].'\' ).html(response);

                
               if(response=="OK")   
               {
                return true; 


               }
               else
               {
                return false;  

               }
          }
      });
 }
 else
 {
  $( \'#name_status'.$row['idadmin'].'\' ).html("");
  return false;
 }

}

function checkall()
{
 var namehtml=document.getElementById("name_status'.$row['idadmin'].'").innerText;
 alert(namehtml);

 if(namehtml=="OK")
 {
  return true;
 }
 else
 {
  return false;
 }
}








									</script> 


									<h5> Obs: Ignorar Mensagem de nome de usuário já existente se o user digitado for o atual. O Nome atual é: <strong>'.$row['username'].' </strong> </h5>


									Nome de Usuário: <span id="name_status'.$row['idadmin'].'" ></span>
									<input type="text" class="form-control" placeholder="Nome para efetuar login no sistema..." required autofocus maxlength="60" id="UserName'.$row['idadmin'].'" name="username" onkeyup="checkname'.$row['idadmin'].'();" value="'.$row['username'].'">
									</div>

										<input type="text" value="'.$row['username'].'" class="form-control" placeholder="Nome da Matéria" required autofocus maxlength="60"  name="usernameold" hidden="1">
									
									
									
									



								

									</div>

									<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
									<button class="btn btn-danger" type="submit"><img src="../images/edit.png" width="15px"/> Alterar</button>            
									</div>
									</div>
									</div>
									</div>
									</form>

									<!-- Fim Modal Editar -->

									<!-- Modal Deletar -->
									<div class="modal fade" id="ModalDel'.$row['idadmin'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
									<h4>
									Deletar:
									</h4> 
									<hr>
									<button type="button" class="close" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel"> </h4>
									</div>
									<div class="modal-body">

									<h4> Você tem certeza que deseja deletar o(a) administrador(a) '.$row['nome'].'?  </h4>
									<h5> A ação não pode ser revertida... </h5>
									<hr>
								

									<!-- Colocar Form aqui -->
									<form class="form-cadastro" action="del.admin.php" method="post" id="formdel">

									<input type="text" value="'.$row['idadmin'].'" class="form-control" placeholder="Nome da Matéria" required autofocus maxlength="60"  name="idadmin" hidden="1">					




									</div>

									<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
									<button class="btn btn-danger" type="submit"><img src="../images/del.png" width="15px"/> Deletar</button>            
									</div>
									</div>
									</div>
									</div>
									</form>

									<!-- Fim Modal Deletar -->






									';


									echo "
									<tr> 
									<td> ".$row['idadmin']." </td>
									<td> ".$row['nome']." </td>
									<td> ".$row['snome']." </td>
									<td> ".$row['email']." </td>
									<td> ".$row['username']." </td>
									<td> ".$row['dtnasc']." </td>
									





									";

									echo '

									<td>
									<!-- Button trigger modal -->
									<div class="btn btn-dacor mt-2"  style="color: #fff;" data-toggle="modal" data-target="#ModalEdit'.$row['idadmin'].'">  <img src="../images/edit.png" width="20px"/>  </div> 
									<!-- Fim Button trigger modal -->

									<a href="../admin.form.php" class="btn btn-dacor mt-2"  style="color: #fff;" ">   <img src="../images/add.png" width="20px"/> </div> 
									<!-- Fim Button trigger modal --></a>

									<div class="btn btn-danger mt-2"  style="color: #fff;" data-toggle="modal" data-target="#ModalDel'.$row['idadmin'].'">  <img src="../images/del.png" width="20px"/>  </div> 
									<!-- Fim Button trigger modal -->


									</td>
									</tr>';

								}

								?>											

							</tbody>

						</table>




					</div>


				</div>	
			</div>    
		</div> 


<?php if (isset($_SESSION['jaexiste'])){
                        echo $_SESSION['jaexiste'];
                        echo "<script>

                  $.notify(\"Erro ao Editar: Nome de Usuário já existe!\", {
                    type: 'danger',


                    animate: {

                      enter: 'animated lightSpeedIn',
                      exit: 'animated lightSpeedOut'
                    }
                    });




                    </script> ";
                        unset ($_SESSION ['jaexiste']);
                       
                        //Avisa que User Já Existe
                      } ?>


	<?php	include '../footer.php';	?> <!-- Importando Rodapé -->
</body>
</html> 

