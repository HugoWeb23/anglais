<?php

/* try {
    $bdd = new PDO('mysql:host=localhost;dbname=app_ecole;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['envoyer'])) {
    $email = $_POST['email'] ?? 'N/A';
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];
    if (!empty($email) && !empty($sujet) && !empty($message)) {
        $req = $bdd->prepare('INSERT INTO contact (email, sujet, message, date) VALUES (:email, :sujet, :message, :datejour)');
        $req->execute(array('email' => $email, 'sujet' => $sujet, 'message' => $message, 'datejour' => date('Y-m-d')));
        $error = false;
    } else {
        $error = true;
    }
}
if(isset($_GET['supprimer'])) {
  $supprimer = $_GET['supprimer'];
  $exist = $bdd->prepare('SELECT id FROM contact WHERE id = :id');
  $exist->execute(array('id' => $supprimer));
   if ($exist->fetchColumn() > 0) {
     $req = $bdd->prepare('DELETE FROM contact WHERE id = :id');
     $req->execute(array('id' => $supprimer));
     $error = false;
} else {
  $error = true;
}
}
*/
  ?>
  <!DOCTYPE html>
  <html lang="fr">
<head>
<title>Ajouter un étudiant</title>
<style>
.box {
  width: 600px;
  border: 2px solid green;
}
.nom {
display: flex;
}
.nom input {
  justify-content: space-around;
}
</style>
</head>
<body>
<div class="box">
<h2>Ajouter un étudiant</h2>
<div class="formulaire">
  <div class="nom">
<label for="nom">Nom :</label> <input class="nom" type="text" name="nom" id="nom" placeholder="Nom de l'étudiant"/>
<label for="prenom">Prénom :</label> <input class="nom" type="text" name="prenom" id="prenom" placeholder="Prénom de l'étudiant"/>
</div>
<br />
<label for="adresse">Adresse :</label> <input type="text" name="adresse" id="adresse" placeholder="Adresse de l'étudiant"/>
<label for="code_postal">Code_postal :</label> <input type="text" name="code_postal" id="code_postal" placeholder="Code_postal de l'étudiant"/>
<br />
<label for="ville">Ville :</label> <input type="text" name="ville" id="ville" placeholder="Ville de l'étudiant"/>

</div>
</div>
</body>

  </html>
