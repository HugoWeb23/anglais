<h1>Exercice 2</h1>
<br>
<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['envoyer'])) {

  $email = $_POST['email'];
  $sujet = $_POST['sujet'];
  $message = $_POST['message'];

  if(!empty($email) && !empty($sujet) && !empty($message)) {
    $req = $bdd->prepare('INSERT INTO contact (email, sujet, message) VALUES (:email, :sujet, :message)');
    $req->execute(array('email' => $email, 'sujet' => $sujet, 'message' => $message));
    $error = false;
  } else {

    $error = true;
  }
}

  ?>
<style>
.form {
  position: relative;
  width: 500px;
  border: 2px solid #a1614a;
  height: 300px;
}
.title {
  font-size: 25px;
  text-align: center;
  text-transform: uppercase;
}
label {
  display: inline-block;
  margin-bottom: 1em;
  width: 200px;
  text-align: left;
  font-size: 18px;
}
input, textarea {
  font: 18px sans-serif;
  width: 300px;
  box-sizing: border-box;
  border: 1px solid #999;
}
input[type="text"]:focus, textarea:focus {
  border: 1.5px solid #4c545d;
}
textarea {
  vertical-align: top;
}
.button {
  margin-top: 15px;
  width: 100%;
  height: 30px;
}
.validation {
  margin-top: 0;
  width: 100%;
  background: #42963d;
  text-transform: uppercase;
  font-size: 20px;
  text-align: center;
  color: #FFF;
}
.error {
  margin-top: 0;
  width: 100%;
  background: #cd2015;
  text-transform: uppercase;
  font-size: 20px;
  text-align: center;
  color: #FFF;
}
.boxmessages {
	width: 500px;
	border: 2px solid #000000;
	margin: 0 0 10px 0;
}
.boxmessages p {
	margin-left: 5px;
}
.boxmessages:nth-child(odd) {
 background: #dadada;
}
</style>
<form action="" method="post">
<div class="form">
<?php if(isset($_POST['envoyer'])) { if($error == false) { ?> <h2 class="validation">Votre message a été envoyé !</h2><?php } if($error == true) { ?> <h2 class="error">Vous devez remplir tous les champs !</h2> <?php } } ?></h2>
<h2 class="title">Formulaire de contact</h2>
<label for="email">Adresse e-mail :</label><input type="text" id="email" name="email" placeholder="Adresse e-mail"/>
<label for="sujet">Sujet :</label><input type="text" id="sujet" name="sujet" placeholder="Sujet de votre message"/>
<label for="message">Message :</label><textarea id="message" name="message" placeholder="Votre message"></textarea>
<input class="button" type="submit" name="envoyer" value="Envoyer"/>
</div>
</form>
<h1>Aperçu des 10 derniers messages</h1>

<?php
$query = $bdd->query('SELECT * FROM contact ORDER BY id DESC LIMIT 0,10');

while ($afficher = $query->fetch()) {
?>

<div class="boxmessages">
<p>E-mail: <?= $afficher['email']; ?></p>
<p>Sujet: <?= $afficher['sujet']; ?></p>
<p>Message: <?= $afficher['message']; ?></p>
</div>
<?php
}
?>
