<!-- Edita isso Aí Igoooor



            .--------._
           (`--'       `-.
            `.______      `.
         ___________`__     \
      ,-'           `-.\     |
     //                \|    |\
    (`  .'~~~~~---\     \'   | |
     `-'           )     \   | |
        ,---------' - -.  `  . '
      ,'             `%`\`     |
     /                      \  |
    /     \-----.         \    `
   /|  ,_/      '-._            |
  (-'  /           /            `     (Hehehhe)
  ,`--<           |        \     \
  \ |  \         /%%             `\
   |/   \____---'--`%        \     \
   |    '           `               \
   |
    `--.__
          `---._______
                      `.mano
teste

                        \             
-->
<style type="text/css">        table thead td{
            
            background: #333;
            color:#FFF;            
            text-align:center;
        }

        table tbody td{
            font-family: arial;
            
        }
</style>
<?php
   include ('conexao.class.php');
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
           INNER JOIN materia ON IDmateria = materia_IDmateria";

    $stm = conexao::prepare($sql);
    $stm->execute();   

     $matu = 1;
     $vesp = 2;
     $notu = 3;
     $contra = 4;  




        

        echo "
            <table>
                <thead>
                    <tr>
                        <td>Data da Ocorrência</td>
                        <td>Professor</td>
                        <td>Aluno</td>
                        <td>Matéria</td>
                        <td>Turma</td>                        
                        <td>Curso</td>
                        <td>Ocorrência</td>
                        <td>Observações</td>
                        <td>Ações</td>
                    </tr>
                </thead>

                <tbody>
        ";

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


        echo '
            <tr>
                <td>'.$row['datareg'].'</td>
                <td>'.$row['profnome'].' '.$row['profsnome'].'</td>
                <td>'.$row['alnome'].' '.$row['alsnome'].'</td>
                <td>'.$row['matnome'].'</td>
                <td>'.$row['numero'].'º '.$row['letra'].'-'.$periestu.'</td>
                <td>'.$row['curnome'].'</td>
                <td>'.$row['oconome'].'</td>
                <td>'.$row['observ'].'</td>
                 <td>EDITAR EXCLUIR  EMAIL</td>
               
            </tr>
        ';
        }

        echo "
            </tbody>
        </table>
        ";



?>

   </div>


<!-- Edita isso Aí Igoooor



            .--------._
           (`--'       `-.
            `.______      `.
         ___________`__     \
      ,-'           `-.\     |
     //                \|    |\
    (`  .'~~~~~---\     \'   | |
     `-'           )     \   | |
        ,---------' - -.  `  . '
      ,'             `%`\`     |
     /                      \  |
    /     \-----.         \    `
   /|  ,_/      '-._            |
  (-'  /           /            `     (Mais um aqui pra largar de ser trouxa)
  ,`--<           |        \     \
  \ |  \         /%%             `\
   |/   \____---'--`%        \     \
   |    '           `               \
   |
    `--.__
          `---._______
                      `.
                        \             
-->
