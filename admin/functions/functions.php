<?php

function isConnected() {
if(!isset($_SESSION['admin-username'])) {
header('location: connexion.php');
}
}

function secure_str($str = null) {
if($str != null) {
$str = strip_tags($str);
return htmlspecialchars($str);
} else {
return null;
}
}

function mdp_hash($pass) {
$cout = ['cost' => 10];
$pass  = password_hash($pass, PASSWORD_DEFAULT, $cout);
return $pass;
}