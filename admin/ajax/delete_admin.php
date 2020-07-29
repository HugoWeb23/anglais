<?php

require('../../config.php');
require('../functions/functions.php');

if(isset($_POST['action']) && $_POST['action'] == 'delete_admin') {

$id_admin = isset($_POST['id_admin']) ? secure_str($_POST['id_admin']) : '';

$req = $bdd->prepare('SELECT id_user FROM admin WHERE id_user = :id_admin');
$req->execute(array('id_admin' => $id_admin));
$valid = $req->rowCount();
if($valid > 0) {
$req = $bdd->prepare('DELETE FROM admin WHERE id_user = :id_user');
$req->execute(array('id_user' => $id_admin));
$message = array('type' => 'success', 'message' => 'Le compte a été supprimé');
} else {
$message = array('type' => 'error', 'message' => 'Le compte est introuvable');
}
echo json_encode($message);
}