<h1>Exercice 1</h1>
<br />
<?php

$nombre1 = 1;
$nombre2 = 1;

while ($nombre1 < 11) {



while ($nombre2 < 11) {

  if($nombre2 == 1) {

  echo '<h3>Table de '.$nombre1.'</h3>';
  }

$resultat = $nombre2 * $nombre1;

$nombre2++;


echo $resultat;
echo '<br />';

}


if($nombre2 == 11) {

$nombre1++;
$nombre2 = 1;
echo '<br />';
}

}
?>
<br />
<h1>Exercice 2 </h2>
<?php

$a = '*';
$b = 1;

while ($b < 10) {



  echo $a;
  $b++;



}



 ?>
