<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$password = "";
$dbname = "dynacope_db";
$port = 3306;

$connexion = mysqli_connect('localhost', 'root', 'root', 'dynacope_db', 3306);
if (!$connexion) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}

?>