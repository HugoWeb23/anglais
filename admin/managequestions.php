<?php

session_start();
require('../config.php');
require('functions/functions.php');
isConnected();

$page_name = 'managequestions';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/css/styles.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/notify.js"></script>
<title>Admin: Gestion des thèmes</title>
</head>
<body>
<?php include('header.php'); ?>
<div class="container-xl">
<nav aria-label="breadcrumb">
     <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
       <li class="breadcrumb-item"><a href="index.php">Administration</a></li>
       <li class="breadcrumb-item active" aria-current="page">Gestion des questions</li>
     </ol>
   </nav>
<div class="titre-section">
<div class="d-flex bd-highlight mb-3">
<h2>Gestion des questions</h2>
<a href="newquestion.php" class="ml-auto"><button type="button" class="btn btn-outline-primary btn-perso">Créer une question</button></a>
</div>
<?php
if(!isset($_GET['themeid']) || $_GET['themeid'] == null) {
?>
<input class="form-control form-control-lg search" type="text" id="searchQuestion" placeholder="Recherche une question">
<div class="resultat"></div>
<?php
} else {
$id_theme = $_GET['themeid'];
$req = $bdd->prepare('SELECT a.id as id_question, a.question as question, a.reponse as reponse, a.id_theme as question_id_theme, intitule_question, b.id as id_theme, b.theme as nom_theme FROM questions as a LEFT JOIN themes as b ON a.id_theme = b.id WHERE a.id_theme = :id_theme');
$req->execute(array('id_theme' => $id_theme)) or die(print_r($req->errorInfo(), TRUE));
$resultat = $req->fetchAll();
if(empty($resultat)) {
header('location: managequestions.php');
exit;
}
?>
<p>Thème sélectionné : <?= $resultat[0]['nom_theme']; ?></p>
</div>
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
<?php
foreach($resultat as $afficher) {
?>
<tr>
<td><?= $afficher['id_question']; ?></td>
<td><?= $afficher['intitule_question']; ?></td>
<td><?= $afficher['question']; ?></td>
<td><?= $afficher['reponse']; ?></td>
<td><?= $afficher['nom_theme']; ?></td>
<td><button type="button" class="btn btn-primary editquestion" data-toggle="modal" data-id_question="<?= $afficher['id_question']; ?>" data-id_theme="<?= $afficher['id_theme']; ?>" data-target="#editQuestion">Modifier</button> - <button type="button" class="btn btn-danger deletequestion" data-toggle="modal" data-target="#supprimerQuestion" data-id="<?= $afficher['id_question']; ?>">Supprimer</button></td>
</tr>
<?php
}
?>
</tbody>
</table>
<?php } ?>
<!-- Modal -->
<div class="modal fade" id="supprimerQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Voulez-vous vraiment supprimer cette question ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
        <button type="button" class="btn btn-success" id="confirmDeleteQuestion" data-id="">Oui</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Éditer une question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <label for="intitule" class="col-form-label">Intitulé:</label>
            <input type="text" class="form-control" id="intitule">
          </div>
          <div class="form-group">
            <label for="question" class="col-form-label">Question:</label>
            <input type="text" class="form-control" id="question">
          </div>
          <div class="form-group">
            <label for="reponse" class="col-form-label">Réponse:</label>
            <input type="text" class="form-control" id="reponse">
          </div>
          <div class="form-group">
            <label for="theme" class="col-form-label">Thème:</label>
           <select name="theme" id="theme" class="form-control">
             <?php
             $req = $bdd->prepare('SELECT * FROM themes');
             $req->execute();
             while($afficher = $req->fetch()) {
            echo '<option data-id_theme="'.$afficher['id'].'">'.$afficher['theme'].'';
             }
             ?>
           </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" id="confirmUpdateQuestion" data-id="">Éditer</button>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>