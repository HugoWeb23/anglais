<?php

require('../../config.php');

if(isset($_POST['action']) && $_POST['action'] == 'delete_theme') {

$id_theme = $_POST['id_theme'];
$deleteAllQuestions = $_POST['deleteAllQuestions'];

if($deleteAllQuestions == true) {
$req = $bdd->prepare('DELETE FROM questions WHERE id_theme = :id_theme');
$req->execute(array('id_theme' => $id_theme));
}
$req = $bdd->prepare('DELETE FROM themes WHERE id = :id_theme');
$req->execute(array('id_theme' => $id_theme));
$message = array('type' => 'success');
echo json_encode($message);

}