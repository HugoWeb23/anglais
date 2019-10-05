<?php

require('config.php');

 ?>
<!DOCTYPE html>

<head>


<title>partie</title>

  <link rel="stylesheet" type="text/css" href="styles.css">

</head>


<body>

<form method="post" action="">
<?php



$id = ($_GET['id']);
$q = ($_GET['q']);


if($id != "") {

  if($q != "") {

  $req1 = $bdd->query('SELECT * FROM selection_questions WHERE id_partie='.$id.' AND id ='.$q.' AND resultat = 1 ORDER BY id');
if (($req1->rowCount()) == 0) {

  header('Location: /resultats.php?id='.$id.'');


} else {
$resultat = $req1->fetch();



$req2 = $bdd->query('SELECT * FROM questions WHERE id='.$resultat['id_question'].' ORDER BY id');

$resultat1 = $req2->fetch();


	if(isset($_POST['valider'])) {

    $reponse = ($_POST['reponse']);

    if (strlen($reponse) < 1) {

$reponse = 'Réponse vide !';


    }

if ($resultat1['reponse'] == $reponse) {


$req3 = $bdd->query('UPDATE selection_questions SET resultat=3 WHERE id='.$resultat['id'].' ORDER by id LIMIT 1');
$req4 = $bdd->query('UPDATE parties SET points=points+1 WHERE id='.$id.' ORDER by id LIMIT 1');
header('Location: /partie.php?id='.$id.'&q='.++$q.'');
exit();

} else {

$req4 = $bdd->query('UPDATE selection_questions SET resultat=2 WHERE id='.$resultat['id'].' ORDER by id LIMIT 1');
$req5 = $bdd->prepare('INSERT INTO historique_reponses(id_question, id_partie, reponse) VALUES(:id_question, :id_partie, :reponse)');
$req5->execute(array('id_question' => $resultat['id_question'], 'id_partie' => $id, 'reponse' => $reponse));
header('Location: /partie.php?id='.$id.'&q='.++$q.'');
exit();

   }
   }

}

  }





 ?>


<?php

 $stmt = $bdd -> prepare ( "SELECT count(*) FROM selection_questions WHERE id_partie = ?" );
 $stmt -> execute ([ $id ]);
 $count = $stmt -> fetchColumn ();

 $stmt2 = $bdd -> prepare ( "SELECT count(*) FROM selection_questions WHERE id_partie = ? AND resultat >1" );
 $stmt2 -> execute ([ $id ]);
 $count2 = $stmt2 -> fetchColumn ();


 ?>
<h1>Question <?php echo ++$count2; ?> sur <?php echo $count; ?> :</h1>

<p>Réponds à la question suivante : <font size="5px"><b><?php echo $resultat1['question']; ?></b></font>
  <p><input type="text" name="reponse"></input>
    <p><input type="submit" name="valider" value="Valider la réponse"></input>



<?php } ?>
<?php









 ?>

</body>
