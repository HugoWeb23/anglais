<?php

require('../../config.php');

$id_question = $_POST['id_question'];

if(isset($_POST['action']) && $_POST['action'] == 'delete_question') {

$req = $bdd->prepare('DELETE FROM questions WHERE id = :id_question');
$req->execute(array('id_question' => $id_question));
$message = array('type' => 'success');
echo json_encode($message); 

}