<?php

function fibo($n)
{
    return(($n < 2) ? 1 : fibo($n - 1) + fibo($n - 2));
}
$n = ($argc == 2) ? $argv[1] : 1;
$r = fibo($n);
print "$r\n";


fibo(55);
?>
