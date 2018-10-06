<?php
//Fazendo conexão com o Banco de Dados
include "conexao.class.php";


	//Recupera oque foi selecionado
	if (!isset($idal)) {
    
     //Define a Query Sql
    $sql = "SELECT conselho.* ,
         professor.nome AS profnome,
         professor.snome AS profsnome,
          aluno.nome as alnome,
           aluno.snome as alsnome, 
           materia.nome as matnome,
           ocorrencias.nome as oconome,
           cursos.nome as curnome,
           classe.letra, classe.numero, classe.periestu



           FROM conselho 
           INNER JOIN professor ON id = professor_id 
           INNER JOIN aluno ON idaluno = aluno_idaluno
           INNER JOIN classe ON idclasse = classe_idclasse
           INNER JOIN ocorrencias ON idocorrencias = ocorrencias_idocorrencias
           INNER JOIN cursos ON cursos.id = cursos_id
           INNER JOIN materia ON IDmateria = materia_IDmateria            
           ORDER BY conselho.datareg DESC";

// Executa a Query 
 $stm = conexao::prepare($sql); 
   
 $stm->execute();   
// Define Para controle de Períodos
     $matu = 1;
     $vesp = 2;
     $notu = 3;
     $contra = 4;  




        

        echo '
            <!-- Começo Accordion -->
    <div id="accordion">      

              
        ';
        $count = 1;
        while($row=$stm->fetch(PDO::FETCH_ASSOC)){
 if ($row['periestu'] == $matu) {
                      $periestu = "Matutino";
                    }

                    if ($row['periestu'] == $vesp) {
                      $periestu = "Vespertino";
                    }

                    if ($row['periestu'] == $notu) {
                      $periestu = "Noturno";
                    }

                    if ($row['periestu'] == $contra) {
                      $periestu = "Contraturno";
                    }
$data = new DateTime ($row['datareg']);

        echo '
           
            <div class="card mt-2">
    <div class="card-header" id="heading'.$count.'">      
        <div class=" text-right ">          '.$data->format('d-m-Y').'     </div>
        
      <div  data-toggle="collapse" data-target="#collapse'.$count.'" aria-expanded="true" aria-controls="collapse'.$count.'" style="margin-top: -15px;">
      <h4>       
        '.$row['alnome'].' '.$row['alsnome'].' </h4>

      </div>

       '.$row['oconome'].'


  </div>

  <div id="collapse'.$count.'" class="collapse" aria-labelledby="heading'.$count.'" data-parent="#accordion">
    <div class="card-body">

       <ul class="list-group list-group-flush">
  <li class="list-group-item">Professor: '.$row['profnome'].' '.$row['profsnome'].'</li>
  <li class="list-group-item"> Matéria: '.$row['matnome'].'</li>
  <li class="list-group-item"> Curso: '.$row['curnome'].' </li>
  <li class="list-group-item"> Turma:  '.$row['numero'].'º '.$row['letra'].' - '.$periestu.'</li>
  
  <li class="list-group-item"> Observações: '.$row['observ'].' </li>
</ul>
    </div>
            <div class="card-footer text text-right">
              <a href="#" class="btn btn-primary">Enviar</a>
              <a href="#" class="btn btn-primary">Editar</a>
              <a href="#" class="btn btn-primary">Excluir</a>
              </div>
              
  </div>
</div>
      <!--Fim Card do Accordion -->
            
            
        ';
          
          $count = $count + 1;
          
        }

        echo "
           </div>    
    <!--Fim do Accordion -->
        ";


    
    
    
  }

  
  //Define a Query Sql
    $sql = "SELECT conselho.* ,
         professor.nome AS profnome,
         professor.snome AS profsnome,
          aluno.nome as alnome,
           aluno.snome as alsnome, 
           materia.nome as matnome,
           ocorrencias.nome as oconome,
           cursos.nome as curnome,
           classe.letra, classe.numero, classe.periestu



           FROM conselho 
           INNER JOIN professor ON id = professor_id 
           INNER JOIN aluno ON idaluno = aluno_idaluno
           INNER JOIN classe ON idclasse = classe_idclasse
           INNER JOIN ocorrencias ON idocorrencias = ocorrencias_idocorrencias
           INNER JOIN cursos ON cursos.id = cursos_id
           INNER JOIN materia ON IDmateria = materia_IDmateria  
           WHERE aluno.idaluno = ".$idal." 
           ORDER BY conselho.datareg DESC";

// Executa a Query 
 $stm = conexao::prepare($sql); 
   
 $stm->execute();   
// Define Para controle de Períodos
     $matu = 1;
     $vesp = 2;
     $notu = 3;
     $contra = 4;  




        

        echo '
            <!-- Começo Accordion -->
    <div id="accordion">      

              
        ';
        $count = 1;
        while($row=$stm->fetch(PDO::FETCH_ASSOC)){
 if ($row['periestu'] == $matu) {
                      $periestu = "Matutino";
                    }

                    if ($row['periestu'] == $vesp) {
                      $periestu = "Vespertino";
                    }

                    if ($row['periestu'] == $notu) {
                      $periestu = "Noturno";
                    }

                    if ($row['periestu'] == $contra) {
                      $periestu = "Contraturno";
                    }
$data = new DateTime ($row['datareg']);

        echo '
           
            <div class="card mt-2">
    <div class="card-header" id="heading'.$count.'">      
        <div class=" text-right ">          '.$data->format('d-m-Y').'     </div>
        
      <div  data-toggle="collapse" data-target="#collapse'.$count.'" aria-expanded="true" aria-controls="collapse'.$count.'" style="margin-top: -15px;">
      <h4>       
        '.$row['alnome'].' '.$row['alsnome'].' </h4>

      </div>

       '.$row['oconome'].'


  </div>

  <div id="collapse'.$count.'" class="collapse" aria-labelledby="heading'.$count.'" data-parent="#accordion">
    <div class="card-body">

       <ul class="list-group list-group-flush">
  <li class="list-group-item">Professor: '.$row['profnome'].' '.$row['profsnome'].'</li>
  <li class="list-group-item"> Matéria: '.$row['matnome'].'</li>
  <li class="list-group-item"> Curso: '.$row['curnome'].' </li>
  <li class="list-group-item"> Turma:  '.$row['numero'].'º '.$row['letra'].' - '.$periestu.'</li>
  
  <li class="list-group-item"> Observações: '.$row['observ'].' </li>
</ul>
    </div>
            <div class="card-footer text text-right">
              <a href="#" class="btn btn-primary">Enviar</a>
              <a href="#" class="btn btn-primary">Editar</a>
              <a href="#" class="btn btn-primary">Excluir</a>
              </div>
              
  </div>
</div>
      <!--Fim Card do Accordion -->
            
            
        ';
          
          $count = $count + 1;
          
        }

        echo "
           </div>    
    <!--Fim do Accordion -->
        ";








?>