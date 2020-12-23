<?php

session_start();
require('../config.php');

if(isset($_POST['action']) && $_POST['action'] == 'restart_part') {

$date = date("d/m/Y");
$last_part = isset($_POST['last_part']) ? $_POST['last_part'] : '';
$id_theme = isset($_POST['id_theme']) ? $_POST['id_theme'] : '';

if(!empty($last_part) && !empty($id_theme)) {

$req = $bdd->prepare('SELECT id_question FROM historique_reponses WHERE id_partie = :id_partie');
$req->execute(array('id_partie' => $last_part));
$afficher = $req->fetchAll(PDO::FETCH_COLUMN, 0);

$req = $bdd->prepare('INSERT INTO parties (id_theme, date_partie) VALUES (:id_theme, :date_partie)');
$req->execute(array('id_theme' => $id_theme, 'date_partie' => $date)) or die(print_r($req->errorInfo(), TRUE));
$id_partie = $bdd->lastInsertId();

$_SESSION['questions'] = $afficher;
shuffle($_SESSION['questions']);
$_SESSION['questions']['id_partie'] = $id_partie;
$_SESSION['questions']['nb_questions'] = count($_SESSION['questions']) - 1;
$_SESSION['questions']['current_question'] = 1;
$_SESSION['questions']['score'] = 0;
$_SESSION['questions']['theme'] = $id_theme;
$message = array('type' => 'success');
} else {
$message = array('type' => 'error', 'message' => 'ID de partie ou de thème invalide');
}
echo json_encode($message);
}