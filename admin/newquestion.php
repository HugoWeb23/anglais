<?php

session_start();
require('../config.php');
require('functions/functions.php');
isConnected();

$page_name = 'newquestion';

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
<title>Administration</title>
</head>
<body>
<?php include('header.php'); ?>
<div class="container-xl">
	<div class="login-form">
	<div class="main-div3">
<?php

	if(isset($_POST['creer'])) {

$intitule_question = ($_POST['intitule_question']);
$question = ($_POST['question']);
$reponse = ($_POST['reponse']);
$theme = ($_POST['theme']);

$failure = false;

if(strlen($intitule_question) < 1){
	echo "
		<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
	Il faut saisir un intitulé de question !
		<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
			<span aria-hidden=\"true\">&times;</span>
		</button>
	</div>";
$failure = true;
		 }

	if(strlen($question) < 1){
		echo "
			<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
			Il faut saisir une question !
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
				<span aria-hidden=\"true\">&times;</span>
			</button>
		</div>";
$failure = true;
		   }

	if(strlen($reponse) < 1){
		echo "
	    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
	    Il faut saisir une réponse !
	    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
	      <span aria-hidden=\"true\">&times;</span>
	    </button>
	  </div>";
  $failure = true;
		 		}

				if ($theme == 0){
					echo "
				    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
				    Il faut choisir un thème !
				    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
				      <span aria-hidden=\"true\">&times;</span>
				    </button>
				  </div>";
			  $failure = true;
					 		}


	if($failure == false){

$req = $bdd->prepare('INSERT INTO questions(question, reponse, id_theme, intitule_question) VALUES(:question, :reponse, :id_theme, :intitule_question)');
$req->execute(array('question' => mb_convert_case($question, MB_CASE_LOWER, "UTF-8"), 'reponse' => mb_convert_case($reponse, MB_CASE_LOWER, "UTF-8"), 'id_theme' => $theme, 'intitule_question' => $intitule_question));

echo "
	<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
	La question a été créée !
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
		<span aria-hidden=\"true\">&times;</span>
	</button>
</div>";

}





}

 ?>
<?php

$req2 = $bdd->query('SELECT * FROM questions ORDER BY id DESC LIMIT 1');

$selected = $req2->fetch();

 ?>
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
		 <li class="breadcrumb-item"><a href="index.php">Administration</a></li>
    <li class="breadcrumb-item active" aria-current="page">Créer une question</li>
  </ol>
</nav>
<h1>Créer une nouvelle question</h1> <br />
<form method='post' action="">
<p>Intitulé de la question:</p>
<p><input class="form-control form-control" type="text" name="intitule_question" value="<?php echo $selected['intitule_question']; ?>" size="50"></input></p>
<p>Question:</p>
<p><input class="form-control form-control" type="text" id="question" name="question" size="50"></input></p>

<p>Réponse:</p>
<p><input class="form-control form-control" type="text" name="reponse" size="50"></input></p>
<p>Thème:  <a href="newtheme.php">Créer un nouveau thème</a></p>
<select class="form-control form-control" name="theme">
	  <?php

  $reponse = $bdd->query('SELECT * FROM themes');

$selectedValue = ' selected';

while ($donnees = $reponse->fetch())
{

  echo '<option value="'.$donnees['id'].'"'; if ($selected['id_theme'] == $donnees['id']) { echo  $selectedValue; }   echo '>'.$donnees['theme'].'</option>';
}



$reponse->CloseCursor();

?>

</select>
<br />
<p><button class="btn btn-success btn-lg" type="submit" class="bouton" name="creer">Créer une question</button></p>
</form>

</div>
</div>
</div>
</body>
<script>
document.querySelector('#question').focus();
</script>
</html>
