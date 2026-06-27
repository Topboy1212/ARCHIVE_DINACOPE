<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

require_once(__DIR__ . '/../config/db.php');
/** @var mysqli $connexion */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Utilisation de l'opérateur ?? pour éviter les "Undefined array key"
    // Si la clé n'existe pas, on met une chaîne vide par défaut
    $code     = $_POST['code_ecole'] ?? ''; 
    $nom      = $_POST['nom_ecole'] ?? '';
    $province = $_POST['province_educationnelle'] ?? '';
    $commune  = $_POST['commune'] ?? '';
    $type     = $_POST['type_ecole'] ?? '';

    // Vérification de sécurité : on ne procède pas si les champs critiques sont vides
    if (empty($nom) || empty($type) || empty($province)) {
        die("Erreur : Les champs Nom, Province et Type d'école sont obligatoires.");
    }

    $sql = "INSERT INTO etablissements (code_ecole, nom_ecole, province_educationnelle, commune, type_ecole) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connexion, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $code, $nom, $province, $commune, $type);
        
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../pages/etablissements.php?success=1");
            exit();
        } else {
            // Ici, mysqli_sql_exception sera capturé si la colonne est NOT NULL
            die("Erreur SQL lors de l'exécution : " . mysqli_stmt_error($stmt));
        }
    } else {
        die("Erreur de préparation : " . mysqli_error($connexion));
    }
}
?>