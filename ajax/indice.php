<?php

session_start();

require('../config.php');

$id_question = $_POST['id_question'];

$req = $bdd->prepare('SELECT reponse FROM questions WHERE id = :id_question');
$req->execute(array('id_question' => $id_question));
$afficher = $req->fetch();
$reponse = $afficher['reponse'];
$calcul = strlen($reponse) / 3;
$message = array('reponse' => substr($reponse, 0, abs(ceil($calcul))));
echo json_encode($message);