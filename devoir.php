<h1>Exercice 1</h1>
<br>

<?php

$number = 20;
$boolean = 1;

$number1 = (string) $number;
$boolean1 = (boolean) $boolean;

var_dump($number1);
var_dump($boolean1);

 ?>
 <h1>Exercice 2</h1>
 <br>
<?php

$number_one = 30;
$number_two = 25;

echo $number_one + $number_two;

 ?>
 <h1>Exercice 3</h1>
 <br>
 <?php

$humain = false;
$animal = true;

if ($humain XOR $animal) {

echo 'Ok';

}

  ?>
  <h1>Exercice 3</h1>
  <br>
  <?php

  $fruits = [
  'Abricot',
  'Airelle',
  'Amande',
  'Ananas',
  'Avocat',
  'Banane',
  'Cassis',
  'Cerise',
  'Châtaigne',
  'Citron',
  'Clémentine',
  'Coing',
  'Datte',
  'Figue fraîche',
  'Fraise',
  'Fraise des bois',
  'Framboise',
  'Fruit de la passion',
  'Grenade',
  'Groseille',
  'Groseille à maquereau',
  'Kaki',
  'Kiwi',
  'Kumquat',
  ];

  foreach ($fruits as $fruits) {


if (substr($fruits,0,1) == "A") {

echo $fruits. '<br>';


}


  }

   ?>
   <h1>Exercice 4</h1>
   <br>
<?php

$fruits = [
'Abricot',
'Airelle',
'Amande',
'Ananas',
'Avocat',
'Banane',
'Cassis',
'Cerise',
'Châtaigne',
'Citron',
'Clémentine',
'Coing',
'Datte',
'Figue fraîche',
'Fraise',
'Fraise des bois',
'Framboise',
'Fruit de la passion',
'Grenade',
'Groseille',
'Groseille à maquereau',
'Kaki',
'Kiwi',
'Kumquat',
];

  foreach ($fruits as $nb => $fruits) {



    if (($nb % 2) == 0) {


echo $fruits. '<br>';

    }



}


 ?>
