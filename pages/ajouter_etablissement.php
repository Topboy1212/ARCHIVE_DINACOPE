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
    <title>Ajouter Etablissement - DYNACOPE</title>
    <link rel="stylesheet" href="../assets/css/pages/ajouter_etablissement.css">
</head>
<body>

<div class="dashboard-container">

    <!-- SIDEBAR -->
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
            <h1>Ajouter Etablissement</h1>
            <a href="etablissements.php" class="btn-retour">← Retour</a>
        </div>

        <div class="form-container">
            <form action="../actions/save_etablissements.php" method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Code École</label>
                        <input type="text" name="code_ecole" required placeholder="Ex: 10234">
                    </div>

                    <div class="form-group">
                        <label>Nom de l'École</label>
                        <input type="text" name="nom_ecole" required placeholder="Nom de l'établissement">
                    </div>

                    <div class="form-group">
                        <label>Province Éducationnelle</label>
                        <input type="text" name="province_educationnelle" required placeholder="Ex: Kinshasa-Lukunga">
                    </div>

                    <div class="form-group">
                        <label>Commune</label>
                        <input type="text" name="commune" required placeholder="Commune">
                    </div>

                    <div class="form-group full-width">
                        <label>Type d'établissement</label>
                        <select name="type_ecole" required>
                            <option value="">-- Choisir un type --</option>
                            <option value="EP">Ecole Primaire (EP)</option>
                            <option value="INSTITUT">Institut / Secondaire</option>
                            <option value="BUREAU">Bureau Administratif</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="submit-btn">Enregistrer l'établissement</button>
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>

<?php
mysqli_close($connexion);
?>