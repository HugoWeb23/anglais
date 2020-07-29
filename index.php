<?php

session_start();

$_SESSION['questions'] = array();

require("config.php");


	if(isset($_POST['envoyer'])) {

$theme = ($_POST['theme']);
$nb_questions = ($_POST['nb_questions']);
$date = date("d/m/Y à H:i");



$failure = false;

if($theme == 0) {

  echo "
    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
  Choisis un thème !
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
      <span aria-hidden=\"true\">&times;</span>
    </button>
  </div>";
  $failure = true;
}



if($nb_questions < 1) {

  echo "
    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
  Tu dois afficher au moins 1 question !
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
      <span aria-hidden=\"true\">&times;</span>
    </button>
  </div>";
$failure = true;

}

	if($failure == false){

$req = $bdd->prepare('INSERT INTO parties(id_theme, date_partie) VALUES(:id_theme, :date_partie)');
$req->execute(array('id_theme' => $theme, 'date_partie' => $date));
$id_partie = $bdd->lastInsertId();

if ($theme == 'random') {

  $req1 = $bdd->query('SELECT * FROM questions');

  $resultat = $req1->fetchAll(PDO::FETCH_COLUMN, 0);

} else {

$req1 = $bdd->prepare('SELECT * FROM questions WHERE id_theme = :theme');
$req1->execute(array('theme' => $theme));

$resultat = $req1->fetchAll(PDO::FETCH_COLUMN, 0);
}
$array_lenght = count($resultat);
$i = 0;
while($i < $nb_questions) {
$number_random = rand(0, $array_lenght - 1);
if(empty($resultat)) {
break;
}
if(array_key_exists($number_random, $resultat)) {
array_push($_SESSION['questions'], $resultat[$number_random]);
unset($resultat[$number_random]);
shuffle($_SESSION['questions']);
$i++;
}
}
$_SESSION['questions']['id_partie'] = $id_partie;
$_SESSION['questions']['nb_questions'] = count($_SESSION['questions']) - 1;
$_SESSION['questions']['current_question'] = 1;
$_SESSION['questions']['score'] = 0;
$_SESSION['questions']['theme'] = $theme;
header('location: partie.php');
}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/css/styles.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/notify.js"></script>
<title>Anglais V.1</title>
</head>
<body>
<?php include('header.php'); ?>
<form method='post' action="">
  <div class="container-xl">
<h1>Bienvenue</h1>
<h4>Lancer une partie</h4> <br>
<p>Choisis un thème: </p>
<p><select class="form-control form-control" name="theme"></p>
  <option value="0">Choisis un thème</option>
  <option value="random">Questions sur tous les thèmes</option>
  <?php
  $reponse = $bdd->query('SELECT * FROM themes');


while ($donnees = $reponse->fetch())
{

  echo '<option value="'.$donnees['id'].'">'.$donnees['theme'].'</option>';
}



$reponse->CloseCursor();

?>
</select>
<p>Nombre de questions à poser:</p>
<p><input class="form-control form-control" type="text" class="button" name="nb_questions" size="5px"></input>
<p><button class="btn btn-primary" type="submit" class="button" name="envoyer">Lancer la partie</button></p>

</div>
</body>
</html>
