<!DOCTYPE html>
<html lang="fr">

<head>


	<link rel="stylesheet" href="css/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="css/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<title>Administration</title>


</head>
<?php

require('../config.php');

	if(isset($_POST['creer'])) {

$intitule_question = ($_POST['intitule_question']);
$question = ($_POST['question']);
$reponse = ($_POST['reponse']);
$theme = ($_POST['theme']);

$failure = false;

if(strlen($intitule_question) < 1){
echo 'Il faut saisir un intitulé de question ! <br>';
$failure = true;
		 }

	if(strlen($question) < 1){
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

$req = $bdd->prepare('INSERT INTO questions(question, reponse, id_theme, intitule_question) VALUES(:question, :reponse, :id_theme, :intitule_question)');
$req->execute(array('question' => $question, 'reponse' => $reponse, 'id_theme' => $theme, 'intitule_question' => $intitule_question));

echo 'Question créée !';

}





}

 ?>
<body>
<?php

$req2 = $bdd->query('SELECT * FROM questions ORDER BY id DESC LIMIT 1');

$selected = $req2->fetch();

 ?>
<h1>Créer une nouvelle question</h1> <br />
<form method='post' action="">
<p>Intitulé de la question:</p>
<p><input type="text" name="intitule_question" value="<?php echo $selected['intitule_question']; ?>" size="50"></input></p>
<p>Question:</p>
<p><input type="text" name="question" size="50"></input></p>

<p>Réponse:</p>
<p><input type="text" name="reponse" size="50"></input></p>
<p>Thème:</p>
<select name="theme">
	  <?php

  $reponse = $bdd->query('SELECT * FROM themes');

$selectedValue = ' selected';

while ($donnees = $reponse->fetch())
{

  echo '<option value="'.$donnees['id'].'"'; if ($selected['id_theme'] == $donnees['id']) { echo  $selectedValue; }   echo '>'.$donnees['theme'].'</option>';
}



$reponse->CloseCursor();

?>

</select> <a href="/admin/newtheme.php">Créer un nouveau thème</a>
<p><button type="submit" class="bouton" name="creer">Créer une question</button></p>
</form>
<br>
<p><a href="/admin/">Retour à l'accueil</a></p>
</body>

</html>
