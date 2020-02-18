<!DOCTYPE html>
<html lang="fr">

<head>

  <link rel="stylesheet" href="css/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<title>Anglais V.1</title>

</head>
<meta charset="utf-8">
<body id="LoginForm">

<form method='post' action="">
  <div class="container">
    <div class="login-form">
    <div class="main-div">
<?php

require("config.php");


    if (isset($_POST['envoyer'])) {
        $pseudo = ($_POST['pseudo']);
        $theme = ($_POST['theme']);
        $nb_questions = ($_POST['nb_questions']);
        $date = date("d/m/Y à H:i");



        $failure = false;

        if (strlen($pseudo) < 2) {
            echo "
  <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
  Merci de saisir un pseudo !
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
            $failure = true;
        }

        if (preg_match('#^[a-zA-Z0-9]*$#', $pseudo)) {
        } else {
            echo "
    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
    Ton pseudo ne peut contenir que des lettres et des chiffres !
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
      <span aria-hidden=\"true\">&times;</span>
    </button>
  </div>";
            $failure = true;
        }

        if ($theme == 0) {
            echo "
    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
  Choisis un thème !
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
      <span aria-hidden=\"true\">&times;</span>
    </button>
  </div>";
            setcookie('pseudo', $_POST['pseudo']);
            $failure = true;
        }



        if ($nb_questions < 2) {
            echo "
    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
  Tu dois afficher au moins 2 questions !
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
      <span aria-hidden=\"true\">&times;</span>
    </button>
  </div>";
            setcookie('pseudo', $_POST['pseudo']);
            $failure = true;
        }

        if ($failure == false) {
            $req = $bdd->prepare('INSERT INTO parties(prenom_joueur, date_partie) VALUES(:prenom_joueur, :date_partie)');
            $req->execute(array('prenom_joueur' => $pseudo, 'date_partie' => $date));
            $id_requete = $bdd->lastInsertId();
            setcookie('pseudo', $_POST['pseudo']);

            if ($theme == 999999) {
                $req1 = $bdd->query('SELECT * FROM questions ORDER BY RAND() LIMIT 1,'.++$nb_questions.'');

                $resultat = $req1->fetch();
            } else {
                $req1 = $bdd->query('SELECT * FROM questions WHERE id_theme='.$theme.' ORDER BY RAND() LIMIT 1,'.++$nb_questions.'');

                $resultat = $req1->fetch();
            }

            while ($resultat = $req1->fetch()) {
                $req2 = $bdd->prepare('INSERT INTO selection_questions(id_question, id_partie, resultat) VALUES(:id_question, :id_partie, :resultat)');
                $req2->execute(array('id_question' => $resultat['id'], 'id_partie' => $id_requete, 'resultat' => '1'));
            }

            $req22 = $bdd->query('SELECT * FROM selection_questions WHERE id_partie='.$id_requete.' ORDER BY id');

            $resultat11 = $req22->fetch();

            header('Location: /partie.php?id='.$id_requete.'&q='.$resultat11['id'].'');
            exit();
        }
    }


?>

<h1>Bienvenue</h1>
<h4>Lancer une partie</h4> <br>
<p>Renseigne un pseudo: </p>
<p><input class="form-control form-control-lg" type="text" name="pseudo" value="<?php if (isset($_COOKIE["pseudo"])) {
    echo $_COOKIE['pseudo'];
} ?>"></input>
<p>Choisis un thème: </p>
<p><select class="form-control form-control-lg" name="theme"></p>
  <option value="0">Choisis un thème</option>
  <option value="999999">Questions sur tous les thèmes</option>
  <?php
  $reponse = $bdd->query('SELECT * FROM themes');


while ($donnees = $reponse->fetch()) {
    echo '<option value="'.$donnees['id'].'">'.$donnees['theme'].'</option>';
}



$reponse->CloseCursor();

?>
</select>
<p>Nombre de questions à poser (max 20):</p>
<p><input class="form-control form-control-lg" type="text" class="button" name="nb_questions" size="5px"></input>
<p><button class="btn btn-primary btn-lg" type="submit" class="button" name="envoyer">Lancer la partie</button></p>

</div>
</div>
</div>

</body>

</html>
