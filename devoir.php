<?php

// Exercice 1

$note = 11;

if ($note >= 1 AND $note <= 10) {

  echo 'Vous devez réviser vos cours !';

}

if ($note >= 11 AND $note <= 12) {

  echo 'Vous devez faire un effort !';

}

if ($note >= 13 AND $note <= 19) {

  echo 'Bien joué !';

}

if ($note == 0 OR $note == 20) {

  echo 'Chapeau !';

}
echo '<br />';
// Exercice 2

$age = 17;
$taille = 155;

if ($age >= 0 AND $age <= 17) {

  echo 'Vous êtes mineur';
}

if ($age >= 18) {

  echo 'Vous êtes majeur';
}

if ($taille < 100) {

  echo ' et de très petite taille !';
}

if ($taille >= 100 AND $taille <= 140) {

  echo ' et de petite taille !';
}

if ($taille >= 141 AND $taille <= 175) {

  echo ' et de taille moyenne !';
}

if ($taille > 175) {

  echo ' et de grande taille !';
}
echo '<br />';

// Exercice 3

/* Dans la condition 1 on ajoute 1 à $i, donc $i devient true. La condition affiche le résultat seulement si $i est true.

Dans la condition 2, $e est incrémenté après la condition, il est donc false et ne s'affiche pas. */

$i = 0;
if(++$i){
  echo 'ça fonctionne !';
}

$e = 0;

if($e++){
  echo 'ça fonctionne !';
}

 ?>
