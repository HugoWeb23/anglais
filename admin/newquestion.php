<?php

require('../config.php');

	if(isset($_POST['creer'])) {

$question = ($_POST['question']);
$reponse = ($_POST['reponse']);
$theme = ($_POST['theme']);

$failure = false;

	if(strlen($question) < 5){
echo 'Il faut saisir une question ! <br>';
$failure = true;
		   }

	if(strlen($reponse) < 1){
	echo 'Il faut saisir une réponse ! <br>';
  $failure = true;
		 		}

				if ($theme == 0){
				echo 'Il faut choisir un thème !';
			  $failure = true;
					 		}


	if($failure == false){

$req = $bdd->prepare('INSERT INTO questions(question, reponse, id_theme) VALUES(:question, :reponse, :id_theme)');
$req->execute(array('question' => $question, 'reponse' => $reponse, 'id_theme' => $theme));

echo 'Question créée !';

}





}

 ?>
<!DOCTYPE html>
<html>

<head>


  <link rel="stylesheet" type="text/css" href="styles.css">

<title>Administration</title>


</head>

<body>

<h1>Créer une nouvelle question</h1> <br />
<form method='post' action="">
<p>Question:</p>
<p><input type="text" name="question"></input></p>

<p>Réponse:</p>
<p><input type="text" name="reponse"></input></p>

<select name="theme">
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
<p><button type="submit" class="bouton" name="creer">Créer une question</button></p>
</body>

</html>
