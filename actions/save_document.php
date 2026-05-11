<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

include('../config/db.php');

$enseignants = mysqli_query($connexion, "SELECT id_enseignant, nom, postnom FROM enseignants");
$etablissements = mysqli_query($connexion, "SELECT id_etablissement, nom_etablissement FROM etablissements");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archiver un Document - DINACOPE</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .form-container {
            background: rgba(255, 255, 255, 0.02);
            padding: 30px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            max-width: 800px;
            margin: 0 auto;
        }
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-group label {
            color: #4cc9f0;
            font-size: 13px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        .form-group input, .form-group select {
            padding: 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: white;
            outline: none;
        }
        .full-width {
            grid-column: span 2;
        }
        .file-input {
            border: 1px dashed rgba(76, 201, 240, 0.5) !important;
            padding: 20px !important;
            cursor: pointer;
        }
        .submit-btn {
            margin-top: 20px;
            padding: 15px;
            background: linear-gradient(135deg, #0f1c3f 0%, #050a18 100%);
            border: 1px solid rgba(76, 201, 240, 0.4);
            color: #4cc9f0;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-transform: uppercase;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <div class="sidebar">
        <h2>DYNACOPE</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="enseignant.php">Enseignants</a></li>
            <li><a href="etablissements.php">Etablissements</a></li>
            <li><a href="documents.php">Documents</a></li>
            <li><a href="../logout.php">Déconnexion</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Archivage de Document</h1>
            <a href="documents.php" style="color:#4cc9f0; text-decoration:none;">Retour</a>
        </div>

        <div class="form-container">
            <form action="../actions/save_document.php" method="POST" enctype="multipart/form-data">
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label>Titre du document</label>
                        <input type="text" name="titre" required placeholder="Ex: Acte de naissance, Diplôme, etc.">
                    </div>

                    <div class="form-group">
                        <label>Type de document</label>
                        <select name="type_document" required>
                            <option value="Administratif">Administratif</option>
                            <option value="Académique">Académique</option>
                            <option value="Identité">Identité</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Concerne un enseignant (Optionnel)</label>
                        <select name="id_enseignant">
                            <option value="">-- Sélectionner --</option>
                            <?php while($e = mysqli_fetch_assoc($enseignants)) { ?>
                                <option value="<?php echo $e['id_enseignant']; ?>">
                                    <?php echo $e['nom'] . " " . $e['postnom']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Concerne un établissement (Optionnel)</label>
                        <select name="id_etablissement">
                            <option value="">-- Sélectionner --</option>
                            <?php while($et = mysqli_fetch_assoc($etablissements)) { ?>
                                <option value="<?php echo $et['id_etablissement']; ?>">
                                    <?php echo $et['nom_etablissement']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Fichier (PDF, JPG, PNG)</label>
                        <input type="file" name="fichier" class="file-input" required>
                    </div>
                </div>
                <button type="submit" class="submit-btn">Uploader et Archiver</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>