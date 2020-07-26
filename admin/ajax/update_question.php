<?php

require('../../config.php');

if(isset($_POST['action']) && $_POST['action'] == 'update_question') {

$intitule = $_POST['intitule'];
$question = $_POST['question'];
$reponse = $_POST['reponse'];
$id_theme = $_POST['theme'];
$id_question = $_POST['id_question'];

$req = $bdd->prepare('UPDATE questions SET question = :question, reponse = :reponse, id_theme = :id_theme, intitule_question = :intitule WHERE id = :id_question');
$req->execute(array('question' => $question, 'reponse' => $reponse, 'id_theme' => $id_theme, 'intitule' => $intitule, 'id_question' => $id_question));
$message = array('type' => 'success');
echo json_encode($message);
}