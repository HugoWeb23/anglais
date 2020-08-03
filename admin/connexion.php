<?php

session_start();


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
    <title>Administration: connexion</title>
</head>
<body>
<div class="container-md">
<form id="connexion">
  <div class="form-group">
    <label for="email">Adresse e-mail :</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="password">Mot de passe :</label>
    <input type="password" class="form-control" id="password">
  </div>
  <button type="submit" class="btn btn-primary" id="submit">Connexion</button>
</form>
</div>
</body>
</html>