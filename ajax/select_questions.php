<?php

session_start();
require('../config.php');

if(isset($_POST['action']) && $_POST['action'] == 'select_questions') {
$id_theme = isset($_POST['id_theme']) ? $_POST['id_theme'] : '';

$req = $bdd->prepare('SELECT id, question FROM questions WHERE id_theme = :id_theme');
$req->execute(array('id_theme' => $id_theme));
$questions = $req->fetchAll();
echo json_encode($questions);
}