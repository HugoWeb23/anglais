<?php

require('../../config.php');
require('../functions/functions.php');

if(isset($_POST['action']) && $_POST['action'] == 'search') {

$search = secure_str($_POST['search']);

$req = $bdd->prepare('SELECT a.id as id_question, a.question as question, a.reponse as reponse, a.id_theme as question_id_theme, a.intitule_question, b.id as id_theme, b.theme as nom_theme FROM questions as a LEFT JOIN themes as b ON a.id_theme = b.id WHERE a.question LIKE :question OR a.reponse LIKE :reponse OR b.theme LIKE :nom_theme');
$req->execute(array('question' => '%'.$search.'%', 'reponse' => '%'.$search.'%', 'nom_theme' => '%'.$search.'%')) or die(print_r($req->errorInfo(), TRUE));
echo '
<table class="table">
<thead>
<th>ID</th>
<th>Intitulé</th>
<th>Question</th>
<th>Réponse</th>
<th>Thème</th>
<th>Actions</th>
</thead>
<tbody>
';
while($afficher = $req->fetch()) {
echo '
<tr>
<td>'.$afficher['id_question'].'</td>
<td>'.$afficher['intitule_question'].'</td>
<td>'.$afficher['question'].'</td>
<td>'.$afficher['reponse'].'</td>
<td>'.$afficher['nom_theme'].'</td>
<td><button type="button" class="btn btn-primary editquestion" data-id_question="'.$afficher['id_question'].'" data-id_theme="'.$afficher['id_theme'].'" data-toggle="modal" data-target="#editQuestion">Modifier</button> - <button type="button" class="btn btn-danger deletequestion" data-toggle="modal" data-target="#supprimerQuestion" data-id="'.$afficher['id_question'].'">Supprimer</button></td>
</tr>
';
}
echo '
</tbody>
</table>
';
}
