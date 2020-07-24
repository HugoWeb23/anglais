<?php

session_start();

require('config.php');

 ?>
 <!DOCTYPE html>
<html lang="fr">
 <head>


 <title>Tes résultats</title>

<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="css/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


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
      $infos_partie = $req->fetch();
      ?>
      <h1>Résultats de la partie #<?= $id; ?></h1>
     <p><font size="5px">Score : <?= $infos_partie['score']; ?></font></p>
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
   <a href="index.php"><button class="btn btn-primary btn-lg" class="button">Nouvelle partie</button></a>
 </div>
 </div>
</div>
 </body>
</html>
