<?php

session_start();
require('../config.php');

if(isset($_POST['action']) && $_POST['action'] == 'start_part') {

    $_SESSION['questions'] = array();
    $special_part = isset($_POST['special_part']) ? $_POST['special_part'] : '';
    $theme = isset($_POST['theme']) ? $_POST['theme'] : '';
    $nb_questions = isset($_POST['nb_questions']) ? $_POST['nb_questions'] : '';
    $manual_questions = isset($_POST['manual_questions']) ? $_POST['manual_questions'] : array();
    if(empty($manual_questions)) {
    $manual_questions = array();
    }
    $date = date("d/m/Y");
    
    if($special_part == 0 && $theme == 0) {
    
      $message = array('type' => 'error', 'message' => 'Il faut choisir un thème !');
  
    } elseif($theme == 'auto' && $special_part == 0) {
      $message = array('type' => 'error', 'message' => 'Il faut choisir un sous-thème !');
    
    } elseif(count($manual_questions) == 0 && $nb_questions < 1) {
    
    $message = array('type' => 'error', 'message' => 'Choisis au moins une question !');
    
    } else {

     if(count($manual_questions) == 0) {

    if($theme == 'auto') {
        $req1 = $bdd->prepare('SELECT * FROM questions_quotidiennes WHERE id_partie = :partie');
        $req1->execute(array('partie' => $special_part)) or die(print_r($req->errorInfo(), TRUE));
        $resultat = $req1->fetchAll(PDO::FETCH_COLUMN, 2);
        $id_partie = $special_part;

    } else {

    $req = $bdd->prepare('INSERT INTO parties (id_theme, date_partie) VALUES (:id_theme, :date_partie)');
    $req->execute(array('id_theme' => $theme, 'date_partie' => $date)) or die(print_r($req->errorInfo(), TRUE));
    $id_partie = $bdd->lastInsertId();
    
    if($theme == 'random') {
    
      $req1 = $bdd->query('SELECT * FROM questions');
    
      $resultat = $req1->fetchAll(PDO::FETCH_COLUMN, 0);
    
    } else {
    
    $req1 = $bdd->prepare('SELECT * FROM questions WHERE id_theme = :theme');
    $req1->execute(array('theme' => $theme)) or die(print_r($req->errorInfo(), TRUE));
    
    $resultat = $req1->fetchAll(PDO::FETCH_COLUMN, 0);
    }
}
     } else {

    $req = $bdd->prepare('INSERT INTO parties (id_theme, date_partie) VALUES (:id_theme, :date_partie)');
    $req->execute(array('id_theme' => $theme, 'date_partie' => $date)) or die(print_r($req->errorInfo(), TRUE));
    $id_partie = $bdd->lastInsertId();
    $resultat = $manual_questions;
     }

    $array_lenght = count($resultat);
    $i = 0;
    if(count($manual_questions) == 0) {
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
  } else {
    $_SESSION['questions'] = $resultat;
    shuffle($_SESSION['questions']);

  }
    $_SESSION['questions']['id_partie'] = $id_partie;
    $_SESSION['questions']['nb_questions'] = count($_SESSION['questions']) - 1;
    $_SESSION['questions']['current_question'] = 1;
    $_SESSION['questions']['score'] = 0;
    $_SESSION['questions']['theme'] = $theme;
    $message = array('type' => 'success');
    }
    echo json_encode($message);
}