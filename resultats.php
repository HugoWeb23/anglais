<?php

require('config.php');

 ?>
 <!DOCTYPE html>
<html lang="fr">
 <head>


 <title>Tes résultats</title>


<link rel="stylesheet" href="css/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="css/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


 </head>


 <body>
      <div class="container">
   <?php

   $id = ($_GET['id']);
   if($id != "") {

     ?>

     <h1>Voici tes résultats</h1>

     <?php

     $req22 = $bdd->query('SELECT * FROM parties WHERE id='.$id.' ORDER BY id');

     $score = $req22->fetch();

     $stmt = $bdd -> prepare ( "SELECT count(*) FROM selection_questions WHERE id_partie = ?" );
     $stmt -> execute ([ $id ]);
     $count = $stmt -> fetchColumn ();


      ?>

     <p><font size="5px">Ton score : <?php echo ' '.$score['points']. '/'.$count. ''; ?></font></p>
     <h3>Lorsqu'une tu n'as pas bien répondu à une question, ta réponse s'affiche pour que tu puisses visualiser ton erreur.</h3>

   <table class="table">
   <thead>
   <tr>
    <th scope="col">Question</th>
    <th scope="col">Bonne réponse</th>
    <th scope="col">Ta réponse</th>
   </tr>
   </thead>
     <tbody>


     <?php

     $resultats = $bdd->query('SELECT * FROM selection_questions WHERE id_partie='.$id.' ');


   while ($afficher = $resultats->fetch())
   {

     $req1 = $bdd->query('SELECT * FROM questions WHERE id='.$afficher['id_question'].' ORDER BY id');
   $question = $req1->fetch();

   if ($afficher['resultat'] == 2) {

     $req2 = $bdd->query('SELECT * FROM historique_reponses WHERE id_partie='.$id.' AND id_question='.$afficher['id_question'].' ORDER BY id');
    $mauvaisereponse = $req2->fetch();

   }



echo '


<tr>
  <td>'.$question['question'].' '; ?> <?php if ($afficher['resultat'] == 3) { ?><span class="badge badge-success">Correct</span> <?php  } else { ?><span class="badge badge-danger">Incorrect</span><?php } echo ' </td>
  <td>'.$question['reponse'].'</td>
   <td>'; if ($afficher['resultat'] == 2) { echo ' '.$mauvaisereponse['reponse'].' '; } else { echo ''.$question['reponse'].''; } if ($afficher['resultat'] == 3) { echo " <span class=\"badge badge-success\">Correct</span>"; } else { echo " <span class=\"badge badge-danger\">Incorrect</span>"; }  echo '</td>
</tr>

'; 
} }

?>

</tbody>
   </table>
 </div>
 </body>
</html>
