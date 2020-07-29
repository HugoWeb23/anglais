<?php

session_start();
require('../config.php');
require('functions/functions.php');
isConnected();

$page_name = 'managethemes';

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
       <li class="breadcrumb-item active" aria-current="page">Gestion des thèmes</li>
     </ol>
   </nav>
<div class="titre-section">
<div class="d-flex bd-highlight mb-3">
<h2>Gestion des thèmes</h2>
<a href="newtheme.php" class="ml-auto"><button type="button" class="btn btn-outline-primary btn-perso">Créer un thème</button></a>
</div>
</div>
<table class="table">
<thead>
<th>ID</th>
<th>Nom</th>
<th>Nombre de questions</th>
<th>Actions</th>
</thead>
<tbody>
<?php
$req = $bdd->prepare('SELECT COUNT(b.id) as compteur, a.id as id, theme FROM themes as a LEFT JOIN questions as b ON a.id = b.id_theme GROUP BY a.id, theme');
$req->execute();
while($afficher = $req->fetch()) {
?>
<tr>
<td><?= $afficher['id']; ?></td>
<td><?= $afficher['theme']; ?></td>
<td><?= $afficher['compteur']; ?></td>
<td><a href="managequestions.php?themeid=<?= $afficher['id']; ?>"><button type="button" class="btn btn-primary" <?php if($afficher['compteur'] == 0) { echo 'disabled'; } ?>>Questions</button></a> <button type="button" class="btn btn-danger deletetheme" data-toggle="modal" data-target="#supprimerTheme" data-id="<?= $afficher['id']; ?>">Supprimer</button></td>
</tr>
<?php
}
?>
</tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="supprimerTheme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="custom-control custom-checkbox mr-sm-2">
      <input type="checkbox" class="custom-control-input" id="deleteallquestions">
    <label class="custom-control-label" for="deleteallquestions">Supprimer toutes les questions associées à ce thème</label>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" id="confirmDeleteTheme" data-id="">Confirmer</button>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>