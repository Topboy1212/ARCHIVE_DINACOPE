<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$password = "root";
$dbname = "dynacope_db";
$port = 3306;

$connexion = mysqli_connect($host, $user, $password, $dbname, $port);
if (!$connexion) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}

