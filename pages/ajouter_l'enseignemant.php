<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

include('../config/db.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Enseignant - DYNACOPE</title>
    <link rel="stylesheet" href="../assets/css/global.css">

    <link rel="stylesheet" href="../assets/css/pages/ajouter_enseignant.css">
</head>
<body>

<div class="dashboard-container">

    
    <div class="sidebar">
        <h2>DYNACOPE</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="enseignants.php">Enseignants</a></li>
            <li><a href="etablissements.php">Etablissements</a></li>
            <li><a href="affectation.php">Affectations</a></li>
            <li><a href="documents.php">Documents</a></li>
            <li><a href="statistiques.php">Statistiques</a></li>
            <li><a href="rapports.php">Rapports</a></li>
            <li><a href="utilisateurs.php">Utilisateurs</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="../logout.php">Déconnexion</a></li>
        </ul>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="header">
            <h1>Ajouter Enseignant</h1>
            <a href="enseignants.php" class="btn-retour">← Retour</a>
        </div>

        <div class="form-container">
            <form action="../actions/save_enseignant.php" method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Matricule</label>
                        <input type="text" name="matricule" required placeholder="Ex: ENS100">
                    </div>

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" required>
                    </div>

                    <div class="form-group">
                        <label>Postnom</label>
                        <input type="text" name="postnom" required>
                    </div>

                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" name="prenom" required>
                    </div>

                    <div class="form-group">
                        <label>Sexe</label>
                        <select name="sexe" required>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="text" name="telephone" required>
                    </div>

                    <div class="form-group full-width">
                        <label>Niveau d'étude</label>
                        <input type="text" name="niveau_etude" required placeholder="Ex: Licencié en Informatique">
                    </div>

                    <div class="form-group">
                        <label>Date de naissance</label>
                        <input type="date" name="date_naissance" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="submit-btn">Enregistrer l'enseignant</button>
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>