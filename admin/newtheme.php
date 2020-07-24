<?php

$page_name = 'newtheme';

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

require('../config.php');

	if(isset($_POST['creer'])) {

$theme = ($_POST['theme']);

$failure = false;

	if(strlen($theme) < 2){
		echo "
			<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
			Il faut saisir un nom de thème !
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
				<span aria-hidden=\"true\">&times;</span>
			</button>
		</div>";
$failure = true;
		   }


	if($failure == false){

$req = $bdd->prepare('INSERT INTO themes(theme) VALUES(:theme)');
$req->execute(array('theme' => $theme));

echo "
	<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
	Le thème a été créé !
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
		<span aria-hidden=\"true\">&times;</span>
	</button>
</div>";

}





}
if(isset($_POST['creer2'])) {

$theme = ($_POST['theme']);

echo 'Le thème est : '.$theme.' ! ';

}


 ?>
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
		 <li class="breadcrumb-item"><a href="../admin/">Administration</a></li>
    <li class="breadcrumb-item active" aria-current="page">Créer un thème</li>
  </ol>
</nav>
<h1>Créer un nouveau thème</h1> <br />
<form method='post' action="">
<p>Nouveau thème:</p>
<p><input class="form-control form-control-lg" type="text" name="theme"></input></p>

<p><button class="btn btn-success btn-lg" type="submit" class="bouton" name="creer">Créer un thème</button></p>
</form>
<br>
</div>
</div>
</div>
</body>

</html>
