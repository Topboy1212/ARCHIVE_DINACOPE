<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

require_once(__DIR__ . '/../config/db.php');

/** @var mysqli $connexion */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nom = $_POST['nom'] ?? '';
    $nom_utilisateur = $_POST['nom_utilisateur'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';
    $role = $_POST['role'] ?? 'Agent'; // Rôle par défaut

    if (!empty($nom_utilisateur) && !empty($mot_de_passe)) {
        
        // C'est ici qu'on sécurise le mot de passe avant l'insertion
        $mot_de_passe_hashe = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        $sql = "INSERT INTO utilisateurs (nom, nom_utilisateur, mot_de_passe, role, date_creation) VALUES (?, ?, ?, ?, NOW())";
        $stmt = mysqli_prepare($connexion, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $nom, $nom_utilisateur, $mot_de_passe_hashe, $role);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                mysqli_close($connexion);
                header("Location: ../pages/utilisateurs.php?success=add");
                exit();
            } else {
                die("Erreur lors de l'inscription : " . mysqli_stmt_error($stmt));
            }
        }
    }
} else {
    header("Location: ../pages/utilisateurs.php");
    exit();
}
?>