<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

include('../config/db.php');

if (
    isset($_POST['code_etablissement']) && 
    isset($_POST['nom_etablissement']) && 
    isset($_POST['province']) && 
    isset($_POST['commune']) && 
    isset($_POST['type_etablissement'])
) {

    $code = $_POST['code_etablissement'];
    $nom = $_POST['nom_etablissement'];
    $province = $_POST['province'];
    $commune = $_POST['commune'];
    $type = $_POST['type_etablissement'];

    $sql = "INSERT INTO etablissements (code_etablissement, nom_etablissement, province, commune, type_etablissement) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($connexion, $sql);
    
    mysqli_stmt_bind_param($stmt, "sssss", $code, $nom, $province, $commune, $type);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../pages/etablissements.php?success=1");
        exit();
    } else {
        echo "Erreur lors de l'enregistrement : " . mysqli_error($connexion);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connexion);

?>