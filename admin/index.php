<?php

$page_name = 'index';

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
    <nav aria-label="breadcrumb">
     <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
       <li class="breadcrumb-item active" aria-current="page">Administration</li>
     </ol>
   </nav>
<h1>Administration</h1> <br />
<p><a class="btn btn-info btn-lg" href="newquestion.php">Créer une nouvelle question</a></p>
<p><a class="btn btn-info btn-lg" href="newtheme.php">Créer un nouveau thème</a></p>
<p><a class="btn btn-info btn-lg" href="managethemes.php">Gestion des questions & thèmes</a></p>
</div>
</div>
</div>
</body>

</html>
