<?php

require('config.php');

 ?>
 <!DOCTYPE html>

 <head>


 <title>Tes résultats</title>


   <link rel="stylesheet" type="text/css" href="styles.css">

 </head>


 <body>

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


     ?>

<p>Question: <b><?php echo $question['question']; ?> <?php if ($afficher['resultat'] == 3) { ?><font color="green">(Correct)</font> <?php  } else { ?><font color="red">(Incorrect)</font><?php } ?> </p></b>
<p>Bonne réponse: <b><?php echo $question['reponse']; ?></b></p>
<p><?php if ($afficher['resultat'] == 2) { ?><font color="red">Ta réponse: <b><?php echo $mauvaisereponse['reponse']; ?></font></b> <?php  } ?></p><br>
<?php

} }

  ?>

 </body>
