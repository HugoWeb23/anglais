<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy">

<title>Tout pour l'ordi : boutique </title>

<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">

<!-- plugin: owl carousel  -->
<link href="plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="plugins/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">
<script src="plugins/owlcarousel/owl.carousel.min.js"></script>

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<!-- custom javascript -->
<script src="js/script.js" type="text/javascript"></script>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

});
// jquery end
</script>

</head>
<header class="section-header">
<form method='post' action="index.php">
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
  	<a class="navbar-brand" href="/index.php"><img class="logo" src="https://i.gyazo.com/883e78742a37af94e8a81b2f57210ed1.png" alt="" title=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


  </div>
</nav>

<section class="header-main shadow-sm">
	<div class="container">
<div class="row-sm align-items-center">
	<div class="col-lg-4-24 col-sm-3">
	<div class="category-wrap dropdown py-1">
		<button type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-bars"></i> Catégories d'articles</button>
		<div class="dropdown-menu">
		<a class="dropdown-item" href="#">Toutes les catégories </a>
			<a class="dropdown-item" href="index.php?cat=1">Pièces d'ordinateurs </a>
			<a class="dropdown-item" href="index.php?cat=2">Périphériques </a>
			<a class="dropdown-item" href="index.php?cat=3">Ordinateurs de bureau</a>
			<a class="dropdown-item" href="#">Ordinateurs de jeux </a>
			<a class="dropdown-item" href="#">Licences logiciels </a>

		</div>
	</div>
	</div>
	<div class="col-lg-11-24 col-sm-8">
			<form action="#" class="py-1">
				<div class="input-group w-100">

				    <input type="text" class="form-control" style="width:50%;" placeholder="Chercher un article">
				    <div class="input-group-append">
				      <button class="btn btn-warning" type="submit">
				        <i class="fa fa-search"></i> Chercher
				      </button>
				    </div>
			    </div>
			</form> <!-- search-wrap .end// -->
	</div> <!-- col.// -->
	<div class="col-lg-9-24 col-sm-12">
		<div class="widgets-wrap float-right row no-gutters py-1">
			<div class="col-auto">
			<div class="widget-header dropdown">
				<a href="#" data-toggle="dropdown" data-offset="20,10">
					<div class="icontext">
						<div class="icon-wrap"><i class="text-warning icon-sm fa fa-user"></i></div>
						<div class="text-wrap text-dark">
						Connectez-vous
							 <i class="fa fa-caret-down"></i>
						</div>
					</div>
				</a>
				<div class="dropdown-menu">
					<div class="px-4 py-3">




						<div class="form-group">
						  <label>Adresse e-mail</label>
						  <input type="email" class="form-control" name="email"  placeholder="email@exemple.com">
						</div>
						<div class="form-group">
						  <label>Mot de passe</label>
						  <input type="password" class="form-control" name="mdp"  placeholder="Password">
						</div>
						<button type="submit" name="connexion" class="btn btn-warning">Connexion</button>

						</div>


						<hr class="dropdown-divider">
						<a class="dropdown-item" href="/inscription.php">Pas encore de compte ? Inscrivez-vous</a>
						<a class="dropdown-item" href="#">Mot de passe oublié ?</a>


						 <hr class="dropdown-divider">
						<a class="dropdown-item" href="#">Gestion du compte</a>
						<a class="dropdown-item" href="#">ee</a>

				</div> <!--  dropdown-menu .// -->
			</div>  <!-- widget-header .// -->
			</div> <!-- col.// -->
			<div class="col-auto">
				<a href="/panier.php" class="widget-header">
					<div class="icontext">
						<div class="icon-wrap"><i class="text-warning icon-sm fa fa-shopping-cart"></i></div>
						<div class="text-wrap text-dark">

							Panier (0 articles)
						</div>
					</div>
				</a>
			</div> <!-- col.// -->
			 <!-- col.// -->
		</div> <!-- widgets-wrap.// row.// -->
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->
