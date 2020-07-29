<?php

session_start();
if(!isset($_SESSION['admin-username'])) {

    $_SESSION['admin-username'] = 'Hugo';
    header('location: index.php');
} else {
    header('location: index.php');
}