<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

include('../config/db.php');

// 1. On vérifie TOUS les champs, y compris date_naissance qui causait l'erreur
if (
    isset($_POST['matricule']) && 
    isset($_POST['nom']) && 
    isset($_POST['postnom']) && 
    isset($_POST['prenom']) && 
    isset($_POST['sexe']) && 
    isset($_POST['telephone']) && 
    isset($_POST['niveau_etude']) &&
    isset($_POST['date_naissance'])
) {

    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $postnom = $_POST['postnom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $telephone = $_POST['telephone'];
    $niveau_etude = $_POST['niveau_etude'];
    $date_naissance = $_POST['date_naissance']; // Nouvelle variable

    // 2. On ajoute 'date_naissance' dans la requête SQL et un 8ème point d'interrogation
    $sql = "INSERT INTO enseignants (matricule, nom, postnom, prenom, sexe, telephone, niveau_etude, date_naissance) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($connexion, $sql);
    
    if ($stmt) {
        // 3. On ajoute un "s" supplémentaire dans le format (8 au total)
        mysqli_stmt_bind_param($stmt, "ssssssss", $matricule, $nom, $postnom, $prenom, $sexe, $telephone, $niveau_etude, $date_naissance);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($connexion);
            header("Location: ../pages/enseignant.php?success=1");
            exit();
        } else {
            echo "Erreur lors de l'exécution : " . mysqli_error($connexion);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur de préparation : " . mysqli_error($connexion);
    }
} else {
    echo "Erreur : Certains champs sont manquants (vérifiez bien la date de naissance).";
}

mysqli_close($connexion);
?>