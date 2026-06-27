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

    $id_enseignant = $_POST['id_enseignant'] ?? '';
    $id_etablissement = $_POST['id_etablissement'] ?? '';

    if (!empty($id_enseignant) && !empty($id_etablissement)) {

        $sql = "UPDATE enseignants SET id_etablissement = ? WHERE id_enseignant = ?";
        
        $stmt = mysqli_prepare($connexion, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ii", $id_etablissement, $id_enseignant);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                mysqli_close($connexion);
                header("Location: ../pages/rapports.php?success=affectation");
                exit();
            } else {
                die("Erreur SQL : " . mysqli_stmt_error($stmt));
            }
        }
    }
} else {
    header("Location: ../pages/affectation.php");
    exit();
}

if (isset($connexion)) {
    mysqli_close($connexion);
}
?>