<?php

require('../../config.php');
require('../functions/functions.php');

if(isset($_POST['action']) && $_POST['action'] == 'delete_part') {

$id_partie = secure_str($_POST['id_partie']);

$req = $bdd->prepare('DELETE FROM parties WHERE id = :id_partie');
$req->execute(array('id_partie' => $id_partie));
$message = array('type' => 'success');
echo json_encode($message); 
}