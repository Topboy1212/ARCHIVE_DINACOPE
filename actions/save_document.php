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

    // 1. Récupération des données textuelles
    $titre            = $_POST['titre'] ?? '';
    $type_document    = $_POST['type_document'] ?? 'Autre';
    $id_enseignant    = !empty($_POST['id_enseignant']) ? $_POST['id_enseignant'] : NULL;
    $id_etablissement = !empty($_POST['id_etablissement']) ? $_POST['id_etablissement'] : NULL;

    // 2. Vérification du fichier
    if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] === 0) {
        
        $nom_origine = $_FILES['fichier']['name'];
        $temp_path   = $_FILES['fichier']['tmp_name'];
        
        // Génération d'un nom unique pour éviter les doublons sur le serveur
        $extension   = pathinfo($nom_origine, PATHINFO_EXTENSION);
        $nouveau_nom = "DOC_" . time() . "_" . uniqid() . "." . $extension;
        
        // Chemin de destination (Assure-toi que ce dossier existe)
        $destination = "../assets/uploads/" . $nouveau_nom;

        // Validation des champs obligatoires
        if (empty($titre)) {
            die("Erreur : Le titre du document est obligatoire.");
        }

        // 3. Déplacement du fichier vers le dossier uploads
        if (move_uploaded_file($temp_path, $destination)) {
            
            // 4. Insertion en base de données avec requête préparée
            $sql = "INSERT INTO documents (titre, type_document, id_enseignant, id_etablissement, fichier_path, date_upload) 
                    VALUES (?, ?, ?, ?, ?, NOW())";
            
            $stmt = mysqli_prepare($connexion, $sql);

            if ($stmt) {
                // Liaison des paramètres (s = string, i = integer)
                // Note : On utilise "ssiis" car id_enseignant et id_etablissement sont des entiers
                mysqli_stmt_bind_param($stmt, "ssiis", $titre, $type_document, $id_enseignant, $id_etablissement, $nouveau_nom);

                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_close($stmt);
                    mysqli_close($connexion);
                    header("Location: ../pages/documents.php?success=1");
                    exit();
                } else {
                    die("Erreur SQL lors de l'enregistrement : " . mysqli_stmt_error($stmt));
                }
            } else {
                die("Erreur de préparation SQL : " . mysqli_error($connexion));
            }

        } else {
            die("Erreur : Impossible de déplacer le fichier vers le dossier de destination. Vérifiez les permissions de 'assets/uploads/'.");
        }

    } else {
        die("Erreur : Aucun fichier sélectionné ou erreur lors du transfert.");
    }

} else {
    header("Location: ../pages/ajouter_document.php");
    exit();
}
?>