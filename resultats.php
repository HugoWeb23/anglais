<?php

session_start();

require('config.php');

 ?>
 <!DOCTYPE html>
<html lang="fr">
 <head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/css/bootstrap.min.css">
<link rel="stylesheet" href="css/css/styles.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/notify.js"></script>
<title>Tes résultats</title>
</head>
<body id="LoginForm">
      <div class="container">
        <div class="login-form">
        <div class="main-div2">
   <?php

   $id = ($_GET['id']);
   if(isset($id) && !empty($id)) {

     ?>
     <?php
     $req = $bdd->prepare('SELECT * FROM parties as a LEFT JOIN themes as b ON a.id_theme = b.id WHERE a.id = :id_partie');
      $req->execute(array('id_partie' => $id));
      if($req->rowCount() == 0) {
      header('location: index.php');
      exit;
      }
      $infos_partie = $req->fetch();
      ?>
      <h1>Résultats de la partie #<?= $id; ?></h1>
     <p><h3>Score : <?= $infos_partie['score']; ?></h3></p>
     <?php
    

      if($infos_partie['id_theme'] != 'random') { 
      
       
    ?>

      <p>Thème sélectionné : <?= $infos_partie['theme']; ?></p>
     <?php } ?>

   <table class="table">
   <thead>
   <tr>
   <?php if($infos_partie['id_theme'] == 'random') { ?>
  <th scope="col">Thème</th>
   <?php } ?>
  
    <th scope="col">Question</th>
    <th scope="col">Bonne réponse</th>
    <th scope="col">Ta réponse</th>
   </tr>
   </thead>
     <tbody>


     <?php
     $req = $bdd->prepare('SELECT a.reponse as rep_saisie, a.correct as correct, b.question as question, b.reponse as reponse, b.intitule_question as intitule, d.theme as theme FROM historique_reponses as a INNER JOIN questions as b ON a.id_question = b.id INNER JOIN parties as c ON a.id_partie = c.id INNER JOIN themes as d ON b.id_theme = d.id WHERE a.id_partie = :id_partie');
     $req->execute(array('id_partie' => $id));
     while($afficher = $req->fetch()) {
  ?>
      

<tr>
<?= $a = $infos_partie['id_theme'] == 'random' ? '<td>'.$afficher['theme'].'</td>' : ''; ?>
  <td><?= $afficher['question']; ?></td>
  <td><?= $afficher['reponse']; ?></td>
  <td><?= $afficher['rep_saisie']; ?>
  <?php
  if ($afficher['correct'] == 1) { echo "<span class=\"badge badge-success\">Correct</span>"; } else { echo "<span class=\"badge badge-danger\">Incorrect</span>"; } ?>
   
</tr>
<?php
}
   } else {
    header('location: index.php');
    exit;
   }

?>

</tbody>
   </table>
   <div class="result-options">
   <a href="index.php"><button class="btn btn-primary btn-lg" class="button">Nouvelle partie</button></a>
  <button class="btn btn-primary success" class="button" id="restart-part" data-id="<?= $id; ?>" data-id_theme="<?= $infos_partie['id_theme']; ?>">Recommencer</button>
   </div>
 </div>
 </div>
</div>
 </body>
</html>
