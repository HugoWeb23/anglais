<h1>Suite de Fibonacci (for)</h1>
<br>

<?php
    function Fibonacci($p) {
        if($p <= 0) return 0;
        if($p == 1) return 1;
        $u = 0;
        $v = 1;
        for($i=2; $i <= $p; $i++) {
            $w = $u+$v;
            $u = $v;
            $v = $w;
        }
        return $v;
    }

    for($i=0;$i<=20;$i++) {
        echo ''.Fibonacci($i).'<br>';
    }
    ?>
<br>
<h1>Suite de Fibonacci (while)</h1>
<br>
<?php


function Fibonacci2($p) {
    if($p <= 0) return 0;
    if($p == 1) return 1;
    $u = 0;
    $v = 1;
      $i = 2;
      while ($i <= $p) {
        $w = $u+$v;
        $u = $v;
        $v = $w;

        $i++;
    }
    return $v;
}



$i = 0;
  while ($i <= 20) {
    echo ''.Fibonacci2($i).'<br>';

    $i++;
}
 ?>
 <br>
 <h1>Exercice 3</h1>
 <br>
 <?php


 $prenom = [
  'David',
  'Véronique',
  'Valentin',
  'Roger',
  'Maurice'
];

for($num=0; $num < 5; $num++) {

echo $prenom[$num]. '<br>';

}

  ?>
