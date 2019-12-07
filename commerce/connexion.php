
<style>
/* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
</style>
<!------ Include the above in your HEAD tag ---------->
<?php require_once'header.php';?>
<form method='post' action="">
<div class="container">
<style>
.blocktext {
    margin-left: 400px;
    margin-right: auto;
    width: 70em
}
</style>
<div class="blocktext">
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

			<h2>Connexion <small></small></h2>
			<hr />

			<div class="form-group">
				<input type="text" name="adresse" id="display_name" class="form-control input-lg" placeholder="Adresse e-mail" tabindex="3">
			</div>

			<div class="form-group">
				<input type="email" name="mail" id="email" class="form-control input-lg" placeholder="Mot de passe" tabindex="4">
			</div>
			<div class="form-group">
          <hr />
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" name="inscription" value="Connexion" class="btn btn-warning btn-block btn-lg" tabindex="7"></div>
				<div class="col-xs-12 col-md-6"><a href="/index.php" class="btn btn-danger btn-block btn-lg">Annuler</a></div>
			</div>

	</div>
</div>
</div>
<!-- Modal -->

</div>
</section>
