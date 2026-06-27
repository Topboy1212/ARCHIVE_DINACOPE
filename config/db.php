<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$password = "root";
$dbname = "dynacope_db";
$port = 3306;

$connexion = null;

// mysqli extension may be disabled on the server.
if (function_exists('mysqli_connect')) {
    $connexion = mysqli_connect($host, $user, $password, $dbname, $port);

    if (!$connexion) {
        die("Erreur de connexion à la base de données : " . (function_exists('mysqli_connect_error') ? mysqli_connect_error() : 'mysqli_connect failed'));
    }
} else {
    // Hard error with clear message (so login.php doesn't break silently)
    die('Erreur: l\'extension PHP mysqli n\'est pas activée. Activez mysqli dans votre configuration MAMP/PHP, puis redémarrez Apache.');
}



