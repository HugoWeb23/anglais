<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('config.php');
require('mailer/src/Exception.php');
require('mailer/src/PHPMailer.php');
require('mailer/src/SMTP.php');

date_default_timezone_set("Europe/Paris");
$year = date('y');
$day = date('d');
$month = date('m');

$yesterday = date("d/m/Y", mktime(0, 0, 0, $month, $day-1, $year));
$current_date = date('d/m/Y');
$last_week = date("d/m/Y", mktime(0, 0, 0, $month, $day-7, $year));
$subject = 'Tes questions quotidiennes';


// Sélection des questions erronées de la veille

$req = $bdd->prepare('SELECT DISTINCT b.id as id_question, b.question as question, b.reponse as reponse FROM historique_reponses as a INNER JOIN questions as b ON a.id_question = b.id LEFT JOIN parties as c ON a.id_partie = c.id WHERE c.date_partie = :date_partie AND a.correct = 0');
$req->execute(array('date_partie' => $yesterday)) or die(print_r($req->errorInfo(), TRUE));
$afficher = $req->fetchAll();
if(count($afficher) > 0) {

$req = $bdd->prepare('INSERT INTO parties (id_theme, date_partie, score, type) VALUES (:id_theme, :date_partie, :score, :type)');
$req->execute(array('id_theme' => 'random', 'date_partie' => $current_date, 'score' => 0, 'type' => 1)) or die(print_r($req->errorInfo(), TRUE));
$id_partie = $bdd->lastInsertId();

$req = $bdd->prepare('INSERT INTO questions_quotidiennes (id_partie, id_question) VALUES (:id_partie, :id_question)');

foreach($afficher as $affich) {

$req->execute(array('id_partie' => $id_partie, 'id_question' => $affich['id_question'])) or die(print_r($req->errorInfo(), TRUE));

}
$body = '<p>Bonjour Hugo,</p><p>Des nouvelles questions basées sur les réponses fausses sont disponibles dans l\'APP Anglais.</p>';
} else {
$body = '<p>Bonjour Hugo,</p><p>Il n\'y a aucune question de disponible aujourd\'hui car tu ne t\'es pas entraîné hier.</p>';
}

// Sélection des question qui n'ont pas été jouées depuis 1 semaine

$req = $bdd->prepare('SELECT DISTINCT id as id_question FROM questions WHERE id NOT IN (SELECT id_question FROM historique_reponses as a INNER JOIN parties as b ON a.id_partie = b.id WHERE b.date_partie > :last_week)');
$req->execute(array('last_week' => $last_week)) or die(print_r($req->errorInfo(), TRUE));
$afficher = $req->fetchAll();
if(count($afficher) > 0) {
$req = $bdd->prepare('INSERT INTO parties (id_theme, date_partie, score, type) VALUES (:id_theme, :date_partie, :score, :type)');
$req->execute(array('id_theme' => 'random', 'date_partie' => $current_date, 'score' => 0, 'type' => 2)) or die(print_r($req->errorInfo(), TRUE));
$id_partie = $bdd->lastInsertId();

$req = $bdd->prepare('INSERT INTO questions_quotidiennes (id_partie, id_question) VALUES (:id_partie, :id_question)');

foreach($afficher as $affich) {

$req->execute(array('id_partie' => $id_partie, 'id_question' => $affich['id_question'])) or die(print_r($req->errorInfo(), TRUE));

}
$body .= '<p>Il y a également des anciennes questions non jouées depuis 1 semaine.</p>';
}

$mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                                            
    $mail->Host       = 'mail.hugo-hourriez.be';                   
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'news@hugo-hourriez.be';                     
    $mail->Password   = 'AAbbcc774411@';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 587;      
    $mail->CharSet = 'UTF-8';                             

    //Recipients
    $mail->setFrom('news@hugo-hourriez.be', 'Hugo Hourriez');
    $mail->addBCC('hugohourriez@live.be');
    

    // Content
    $mail->isHTML(true);                                  
    $mail->Subject = $subject;
    $mail->Body    =  $body;

    $mail->send();