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

$theme = ($_POST['theme']);

$failure = false;

	if(strlen($theme) < 2){
echo 'Il faut saisir un thème !';
$failure = true;
		   }


	if($failure == false){

$req = $bdd->prepare('INSERT INTO themes(theme) VALUES(:theme)');
$req->execute(array('theme' => $theme));

echo 'Thème créé !';

}





}
if(isset($_POST['creer2'])) {

$theme = ($_POST['theme']);

echo 'Le thème est : '.$theme.' ! ';

}


 ?>
 <body>

<h1>Créer un nouveau thème</h1> <br />
<form method='post' action="">
<p>Nouveau thème:</p>
<p><input type="text" name="theme"></input></p>

<p><button type="submit" class="bouton" name="creer">Créer un thème</button></p>
</form>
<br>
<p><a href="/admin/">Retour à l'accueil</a></p>
</body>

</html>
