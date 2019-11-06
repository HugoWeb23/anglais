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
<h1>Exercice 2</h1>
<?php
$i = 0;

while ($i < 9) {

$i++;

$j = $i;



while ($j > 0) {

$j--;
echo '*';

}
echo '<br />';
}
 ?>
<br />
<h1>Exercice 3</h1>

<?php

for ($nb = 1; $nb <= 100; $nb++) {

  if ($nb > 50 AND $nb < 70) {
continue;

  }

echo $nb;
echo '<br>';
}
?>
<br />
<h1>Exercice 4</h1>
