<!DOCTYPE html>

<header>
<title>Devoir 09/10/19</title>

</header>



<body>

<<<<<<< HEAD
<h1>Exercice 1</h1>98999999999999999999
=======
<h1>Exercice 1</h1>
>>>>>>> test

<?php

$moyenDeTransport = 'train';

if($moyenDeTransport == 'voiture') {

echo 'Vous voyagez en voiture';


}

elseif($moyenDeTransport == 'train') {

echo 'Vous voyagez en train';

} else {

echo 'Vous n\'avez pas de moyen de transport';

}
?>
<br>
<hr />
<h1>Exercice 2</h1>

<?php


$argentDePoche= 20;
$ajouterCinqEuros = true;


if($ajouterCinqEuros) {

$argentDePoche = $argentDePoche + 5;

echo 'Mon argent de poche: '. $argentDePoche . '€';

}
?>
<br>
<hr />
<h1>Exercice 3 </h1>

<?php

$age =  19;

if($age >= 18) {

echo 'Je suis majeur en Europe<br>';

} if ($age >= 21) {

echo 'Je suis majeur aux USA';

}





 ?>

</body>

</html>
