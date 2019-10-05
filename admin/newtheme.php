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
<!DOCTYPE html>
<html>

<head>


  <link rel="stylesheet" type="text/css" href="styles.css">
  <meta charset="utf-8"/>

<title>Administration</title>


</head>

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
