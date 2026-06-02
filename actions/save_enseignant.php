<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

require_once(__DIR__ . '/../config/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Récupération sécurisée des données avec l'opérateur ??
    $matricule      = $_POST['matricule'] ?? '';
    $nom            = $_POST['nom'] ?? '';
    $postnom        = $_POST['postnom'] ?? '';
    $prenom         = $_POST['prenom'] ?? '';
    $sexe           = $_POST['sexe'] ?? '';
    $telephone      = $_POST['telephone'] ?? '';
    $niveau_etude   = $_POST['niveau_etude'] ?? '';
    $date_naissance = $_POST['date_naissance'] ?? '';

    // Vérification des champs obligatoires pour éviter les entrées vides en base
    if (empty($matricule) || empty($nom) || empty($prenom) || empty($date_naissance)) {
        die("Erreur : Les champs Matricule, Nom, Prénom et Date de naissance sont obligatoires.");
    }

    $sql = "INSERT INTO enseignants (matricule, nom, postnom, prenom, sexe, telephone, niveau_etude, date_naissance) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($connexion, $sql);
    
    if ($stmt) {
        // Liaison des 8 paramètres (tous en chaînes de caractères "s")
        mysqli_stmt_bind_param($stmt, "ssssssss", 
            $matricule, 
            $nom, 
            $postnom, 
            $prenom, 
            $sexe, 
            $telephone, 
            $niveau_etude, 
            $date_naissance
        );

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($connexion);
            header("Location: ../pages/enseignant.php?success=1");
            exit();
        } else {
            die("Erreur SQL lors de l'exécution : " . mysqli_stmt_error($stmt));
        }
    } else {
        die("Erreur de préparation : " . mysqli_error($connexion));
    }
} else {
    // Si quelqu'un tente d'accéder au fichier directement sans formulaire
    header("Location: ../pages/ajouter_l'enseignemant.php");
    exit();
}
?>