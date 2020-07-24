<?php

session_start();

$_SESSION['questions'] = array();

?>

<!DOCTYPE html>
<html lang="fr">

<head>

<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>
<script src="js/functions.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<title>Anglais V.1</title>

</head>
<meta charset="utf-8">
<body id="LoginForm">

<form method='post' action="">
  <div class="container">
    <div class="login-form">
    <div class="main-div">
<?php

require("config.php");


	if(isset($_POST['envoyer'])) {

$theme = ($_POST['theme']);
$nb_questions = ($_POST['nb_questions']);
$date = date("d/m/Y à H:i");



$failure = false;

if($theme === 0) {

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

<h1>Bienvenue</h1>
<h4>Lancer une partie</h4> <br>
<p>Choisis un thème: </p>
<p><select class="form-control form-control-lg" name="theme"></p>
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
<p><input class="form-control form-control-lg" type="text" class="button" name="nb_questions" size="5px"></input>
<p><button class="btn btn-primary btn-lg" type="submit" class="button" name="envoyer">Lancer la partie</button></p>

</div>
</div>
</div>

</body>

</html>
