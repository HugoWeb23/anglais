<?php

require('../../config.php');
require('../functions/functions.php');

if(isset($_POST['action']) && $_POST['action'] == 'update_admin') {

$id_admin = isset($_POST['id_admin']) ? secure_str($_POST['id_admin']) : 0;
$first_name = isset($_POST['first_name']) ? secure_str($_POST['first_name']) : '';
$last_name = isset($_POST['last_name']) ? secure_str($_POST['last_name']) : '';
$email = isset($_POST['email']) ? secure_str($_POST['email']) : '';
$password = isset($_POST['password']) ? secure_str($_POST['password']) : '';

$req = $bdd->prepare('UPDATE admin SET first_name = :first_name, last_name = :last_name, email = :email WHERE id_user = :id_admin');
$req->execute(array('first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'id_admin' => $id_admin));

if(strlen($password) > 0) {
$req = $bdd->prepare('UPDATE admin SET password = :password');
$req->execute(array('password' => mdp_hash($password)));
}
$message = array('type' => 'success', 'message' => 'Le compte a été modifié');
echo json_encode($message);
}