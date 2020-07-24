<?php

session_start();

require('../config.php');

reset($_SESSION['questions']);
$current_key = key($_SESSION['questions']);
$current_question = current($_SESSION['questions']);

if($current_key != 'id_partie') {
$req = $bdd->prepare('SELECT * FROM questions as a INNER JOIN themes as b ON a.id_theme = b.id WHERE a.id = :id_question');
$req->execute(array('id_question' => $current_question));
$resultat = $req->fetch();
$message = array('check' => true, 'id_question' => $current_question, 'intitule' => $resultat['intitule_question'], 'question' => $resultat['question'], 'theme' => $resultat['theme']);
} else {
$req = $bdd->prepare('UPDATE parties SET score = :score WHERE id = :id_partie');
$req->execute(array('score' => $_SESSION['questions']['score'].'/'.$_SESSION['questions']['nb_questions'], 'id_partie' =>$_SESSION['questions']['id_partie']));
$message = array('check' => false, 'id_partie' => $_SESSION['questions']['id_partie']);
}
echo json_encode($message);