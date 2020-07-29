<?php

session_start();
require('../config.php');
require('functions/functions.php');
isConnected();

$page_name = 'admin-access';

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
       <li class="breadcrumb-item active" aria-current="page">Accès à l'administration</li>
     </ol>
   </nav>
<div class="titre-section">
<div class="d-flex bd-highlight mb-3">
<h2>Gestion des accès à l'administration</h2>
<button type="button" class="btn btn-outline-primary btn-perso ml-auto" data-toggle="modal" data-target="#createAdmin">Créer un accès</button>
</div>
<?php
$req = $bdd->prepare('SELECT * FROM admin ORDER BY id_user ASC');
$req->execute() or die(print_r($req->errorInfo(), TRUE));
$resultat = $req->fetchAll();
?>
</div>
<table class="table">
<thead>
<th>ID</th>
<th>Nom</th>
<th>Prénom</th>
<th>E-mail</th>
<th>Dernière connexion</th>
<th>Actions</th>
</thead>
<tbody>
<?php
foreach($resultat as $afficher) {
?>
<tr>
<td><?= $afficher['id_user']; ?></td>
<td><?= $afficher['first_name']; ?></td>
<td><?= $afficher['last_name']; ?></td>
<td><?= $afficher['email']; ?></td>
<td><?= $afficher['last_connexion']; ?></td>
<td><button type="button" class="btn btn-primary editAdmin" data-toggle="modal" data-id="<?= $afficher['id_user']; ?>" data-target="#editAdmin">Modifier</button> - <button type="button" class="btn btn-danger deleteAdmin" data-toggle="modal" data-target="#deleteAdmin" data-id="<?= $afficher['id_user']; ?>">Supprimer</button></td>
</tr>
<?php
}
?>
</tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="createAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Créer un accès administrateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <label for="first_name" class="col-form-label">Prénom:</label>
            <input type="text" class="form-control" id="first_name">
          </div>
          <div class="form-group">
            <label for="last_name" class="col-form-label">Nom:</label>
            <input type="text" class="form-control" id="last_name">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Adresse e-mail:</label>
            <input type="text" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Mot de passe:</label>
            <input type="password" class="form-control" id="password">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" id="adminCreate" data-id="">Créer le compte</button>
      </div>
    </div>
    </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="deleteAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Voulez-vous vraiment supprimer ce compte administrateur ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
        <button type="button" class="btn btn-success" id="confirmDeleteAdmin" data-id="">Oui</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification d'un compte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <label for="first_name" class="col-form-label">Prénom:</label>
            <input type="text" class="form-control" id="first_name">
          </div>
          <div class="form-group">
            <label for="last_name" class="col-form-label">Nom:</label>
            <input type="text" class="form-control" id="last_name">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Adresse e-mail:</label>
            <input type="text" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Mot de passe:</label>
            <input type="password" class="form-control" id="password">
            <small class="form-text text-muted">Laisser vide pour ne pas modifier.</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" id="confirmUpdateAdmin" data-id="">Éditer</button>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>