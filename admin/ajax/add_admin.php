<?php

require('../../config.php');
require('../functions/functions.php');

if(isset($_POST['action']) && $_POST['action'] == 'new_admin') {

$first_name = isset($_POST['first_name']) ? secure_str($_POST['first_name']) : '';
$last_name = isset($_POST['last_name']) ? secure_str($_POST['last_name']) : '';
$mail = isset($_POST['email']) ? secure_str(strtolower($_POST['email'])) : '';
$password = isset($_POST['password']) ? secure_str($_POST['password']) : '';

if(!empty($first_name) && !empty($last_name) && !empty($mail) && !empty($password)) {
$req = $bdd->prepare('SELECT COUNT(*) as compteur FROM admin WHERE email = :email');
$req->execute(array('email' => $mail));
$resultat = $req->fetch();
if($resultat['compteur'] > 0) {
$message = array('type' => 'error', 'message' => "L'adresse email ".$mail." est déjà utilisée");
} else {
$req = $bdd->prepare('INSERT INTO admin (first_name, last_name, email, password, last_connexion) VALUES (:first_name, :last_name, :mail, :password, :last_connexion)');
$req->execute(array('first_name' => $first_name, 'last_name' => $last_name, 'mail' => $mail, 'password' => mdp_hash($password), 'last_connexion' => 0));
$id_admin = $bdd->lastInsertId();
$message = array('type' => 'success', 'message' => 'Le compte administrateur a été créé', 'id_admin' => $id_admin);
}
} else {
$message = array('type' => 'error', 'message' => 'Certains champs sont vides');
}
echo json_encode($message);
}

