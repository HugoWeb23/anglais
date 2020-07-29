<?php

require('../../config.php');
require('../functions/functions.php');

if(isset($_POST['action']) && $_POST['action'] == 'update_question') {

$intitule = secure_str($_POST['intitule']);
$question = secure_str($_POST['question']);
$reponse = secure_str($_POST['reponse']);
$id_theme = secure_str($_POST['theme']);
$id_question = secure_str($_POST['id_question']);

$req = $bdd->prepare('UPDATE questions SET question = :question, reponse = :reponse, id_theme = :id_theme, intitule_question = :intitule WHERE id = :id_question');
$req->execute(array('question' => $question, 'reponse' => $reponse, 'id_theme' => $id_theme, 'intitule' => $intitule, 'id_question' => $id_question));
$message = array('type' => 'success');
echo json_encode($message);
}