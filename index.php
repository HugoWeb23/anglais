<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" type="text/css" href="styles.css">

<title>Anglais V.1</title>

</head>
<?php

require("config.php");


	if(isset($_POST['envoyer'])) {

$pseudo = ($_POST['pseudo']);
$theme = ($_POST['theme']);
$nb_questions = ($_POST['nb_questions']);
$date = date("d/m/Y à H:i");

$failure = false;

if($nb_questions > 20) {

echo 'Tu ne peux pas afficher plus de 20 questions';
$failure = true;

}

if($nb_questions < 2) {

echo 'Tu dois au moins afficher 2 questions !';

$failure = true;

}

	if($failure == false){

$req = $bdd->prepare('INSERT INTO parties(prenom_joueur, date_partie) VALUES(:prenom_joueur, :date_partie)');
$req->execute(array('prenom_joueur' => $pseudo, 'date_partie' => $date));
$id_requete = $bdd->lastInsertId() ;



$req1 = $bdd->query('SELECT * FROM questions WHERE id_theme='.$theme.' ORDER BY RAND( ) LIMIT '.++$nb_questions.'');

$resultat = $req1->fetch();


while ($resultat = $req1->fetch())
{


$req2 = $bdd->prepare('INSERT INTO selection_questions(id_question, id_partie, resultat) VALUES(:id_question, :id_partie, :resultat)');
$req2->execute(array('id_question' => $resultat['id'], 'id_partie' => $id_requete, 'resultat' => '1'));


    $joueur_questions++;
}

header('Location: /partie.php?id='.$id_requete.'');
exit();


}
}


 ?>




<body>

<form method='post' action="">
<h1>Salut</h1>
<h4>Lancer une partie</h4> <br>
<p>Renseigne un pseudo: </p>
<p><input type="text" name="pseudo"></input>
<p>Choisis un thème: </p>
<p><select name="theme"></p>
  <option value="0">Choisis un thème</option>
  <?php
  $reponse = $bdd->query('SELECT * FROM themes');


while ($donnees = $reponse->fetch())
{

  echo '<option value="'.$donnees['id'].'">'.$donnees['theme'].'</option>';
}



$reponse->CloseCursor();

?>
</select>
<p>Nombre de questions à poser (max 20):</p>
<p><input type="text" class="button" name="nb_questions" size="5px"></input>
<p><button type="submit" class="button" name="envoyer">Lancer</button></p>



</body>

</html>
