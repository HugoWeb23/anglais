<?php

session_start();

require('config.php');

 ?>
<!DOCTYPE html>
<html lang="fr">
<head>

<title>Partie</title>

<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="js/jquery.js"></script>
<script src="js/functions.js"></script>

</head>

<?php

$all_questions = $_SESSION['questions'];
if(isset($all_questions) == false || empty($all_questions)) {
header('location: index.php');
exit;
}
reset($all_questions);
$current_question = current($all_questions);
$current_key = key($all_questions);


$req2 = $bdd->prepare('SELECT * FROM questions as a INNER JOIN themes as b ON a.id_theme = b.id WHERE a.id = :id_question');
$req2->execute(array('id_question' => $current_question));
$resultat1 = $req2->fetch();
	
?>


<?php


 ?>
 <body id="LoginForm">
   <div class="container">
     <div class="login-form">
     <div class="main-div">
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Partie n° <?= $all_questions['id_partie']; ?></li>
  </ol>
</nav>
<h1>Question <span id="current_question"><?= $_SESSION['questions']['current_question']; ?></span> sur <?= $all_questions['nb_questions'] ?></h1>
<p><span id="theme">Thème : <?= $resultat1['theme']; ?></span></p>
<p><span id="intitule"><?php echo $resultat1['intitule_question']; ?> :</span> <font size="5px"><b><span id="text_question"><?php echo $resultat1['question']; ?></span></b></font>
<p><button class="btn btn-success" id="indice">Indice</button></p>
  <p><input class="form-control form-control-lg" type="text" id="reponse" name="reponse" autocomplete="off" autofocus></input>
    <p><input class="btn btn-primary btn-lg" id="valider_reponse" type="button" data-id_question="<?= $current_question; ?>" name="valider" value="Valider la réponse"></input>


</body>
</html>
