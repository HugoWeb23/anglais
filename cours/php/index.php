<?php

$host = 'localhost';
$db   = 'app_ecole';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
     $db = new \PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}



$r = $db->query('SELECT * FROM contact', PDO::FETCH_ASSOC);


print_r($r->fetch());


?>
