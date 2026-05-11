<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

include('../config/db.php');

if (isset($_POST['id_enseignant']) && isset($_POST['id_etablissement'])) {

    $id_enseignant = $_POST['id_enseignant'];
    $id_etablissement = $_POST['id_etablissement'];

    $sql = "UPDATE enseignants SET id_etablissement = ? WHERE id_enseignant = ?";
    
    $stmt = mysqli_prepare($connexion, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $id_etablissement, $id_enseignant);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../pages/rapport.php?success=affectation");
        exit();
    } else {
        echo "Erreur lors de l'affectation : " . mysqli_error($connexion);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connexion);
?>