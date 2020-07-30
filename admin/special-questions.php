<?php

session_start();
require('../config.php');
require('functions/functions.php');
isConnected();

$page_name = 'special-questions';

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
<h2>Gestion des parties quotidiennes</h2>
</div>
<p>Parties contenant des questions qui sont sélectionnées automatiquement en fonction des erreurs des autres parties.</p>
</div>
<table class="table">
<thead>
<th>ID</th>
<th>Nombre de questions</th>
<th>Création</th>
<th>Type</th>
<th>Action</th>
</thead>
<tbody>
<?php
$req = $bdd->prepare('SELECT COUNT(b.id) as compteur, a.id as id_partie, a.date_partie as date_partie, a.type FROM parties as a LEFT JOIN questions_quotidiennes as b ON a.id = b.id_partie WHERE a.type IN(1, 2) GROUP BY a.id, a.date_partie');
$req->execute();
while($afficher = $req->fetch()) {
switch($afficher['type']) {
case 1:
$type = 'À améliorer';
break;
case 2:
$type = 'Non joué depuis 1 semaine';
break;
}
?>
<tr>
<td><?= $afficher['id_partie']; ?></td>
<td><?= $afficher['compteur']; ?></td>
<td><?= $afficher['date_partie']; ?></td>
<td><?= $type; ?></td>
<td><button type="button" class="btn btn-danger deletepart" data-toggle="modal" data-target="#supprimerTheme" data-id="<?= $afficher['id_partie']; ?>">Supprimer</button></td>
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
          Voulez-vous vraiment supprimer ceci ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
        <button type="button" class="btn btn-success" id="confirmDeletePart" data-id="">Oui</button>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>