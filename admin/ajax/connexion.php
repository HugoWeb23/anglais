<?php

session_start();

require('../../config.php');
require('../functions/functions.php');

if(isset($_POST['action']) && $_POST['action'] == 'connexion') {

$email = isset($_POST['email']) ? secure_str($_POST['email']) : '';
$password = isset($_POST['password']) ? secure_str($_POST['password']) : '';

$req = $bdd->prepare('SELECT password, first_name FROM admin WHERE email = :email');
$req->execute(array('email' => $email));
$connexion = $req->fetch();
if($req->rowCount() == 0) {
$message = array('type' => 'error', 'message' => 'Adresse e-mail incorrecte');
} else {
$check = password_verify($password, $connexion['password']);
if($check == true) {
$_SESSION['admin-username'] = $connexion['first_name'];
$message = array('type' => 'success');
} else {
$message = array('type' => 'error', 'message' => 'Email ou mot de passe incorrect');
}
}
echo json_encode($message);
}