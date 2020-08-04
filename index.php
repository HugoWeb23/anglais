<?php

session_start();

require("config.php");

$_SESSION['questions'] = array();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/css/styles.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/notify.js"></script>
<title>Anglais V.1</title>
</head>
<body>
<?php include('header.php'); ?>
  <div class="container-xl">
<h1>Bienvenue</h1>
<h4>Lancer une partie</h4> <br>
<form id="lancerPartie">
<p>Choisis un thème : </p>
<p><select class="form-control form-control" id="theme"></p>
  <option value="0">Choisis un thème</option>
  <option value="auto">Questions quotidiennes</option>
  <option value="random">Questions sur tous les thèmes</option>
  <?php
  $reponse = $bdd->query('SELECT * FROM themes');


while ($donnees = $reponse->fetch())
{

  echo '<option value="'.$donnees['id'].'">'.$donnees['theme'].'</option>';
}

?>
</select>
<div class="themes-speciaux">
<p>Questions quotidiennes : </p>
<p><select class="form-control form-control" id="special_questions"></p>
  <option value="0">Choisis un thème</option>
  <?php
  $reponse = $bdd->query('SELECT * FROM parties WHERE type IN (1, 2)');


while($donnees = $reponse->fetch()) {

  switch($donnees['type']) {
    case 1:
    $type = 'À améliorer';
    break;
    case 2:
    $type = 'Non joué depuis 1 semaine';
    break;
    }

  echo '<option value="'.$donnees['id'].'">'.$type.' ('.$donnees['date_partie'].')</option>';
}
?>
</select>
</div>
<p>Nombre de questions à poser :</p>
<p><input class="form-control form-control" type="number" class="button" id="nb_questions" size="5px">
<p><button class="btn btn-warning" type="button" id="manual-selection">Sélection manuelle</button></p>
<p><button class="btn btn-primary btn-lg" class="button" id="start_button">Lancer la partie</button></p>
</form>
<!-- Modal -->
<div class="modal fade" id="select_questions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sélection des questions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="selectSpecificQuestions" data-id="">Confirmer</button>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
