<?php

session_start();

require('../config.php');

$current_key = key($_SESSION['questions']);
$id_question = $_POST['id_question'];
$reponse = $_POST['reponse'];

$req = $bdd->prepare('SELECT * FROM questions WHERE id = :id_question');
$req->execute(array('id_question' => $id_question));
$resultat = $req->fetch();

if ($resultat['reponse'] == (mb_convert_case($reponse, MB_CASE_LOWER, "UTF-8"))) {
$req = $bdd->prepare('INSERT INTO historique_reponses(id_question, id_partie, reponse, correct) VALUES(:id_question, :id_partie, :reponse, :correct)');
$req->execute(array('id_question' => $id_question, 'id_partie' => $_SESSION['questions']['id_partie'], 'reponse' => $reponse, 'correct' => 1));
$_SESSION['questions']['score'] += 1;
} else {
$req = $bdd->prepare('INSERT INTO historique_reponses(id_question, id_partie, reponse, correct) VALUES(:id_question, :id_partie, :reponse, :correct)');
$req->execute(array('id_question' => $id_question, 'id_partie' => $_SESSION['questions']['id_partie'], 'reponse' => $reponse, 'correct' => 0));
}
unset($_SESSION['questions'][$current_key]);
$_SESSION['questions']['current_question'] += 1;




