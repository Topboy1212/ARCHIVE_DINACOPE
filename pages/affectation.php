<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

include('../config/db.php');

$enseignants = mysqli_query($connexion, "SELECT id_enseignant, nom, postnom, prenom FROM enseignants ORDER BY nom ASC");
$etablissements = mysqli_query($connexion, "SELECT id_etablissement, nom_ecole FROM etablissements ORDER BY nom_ecole ASC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affectations - DYNACOPE</title>
    <link rel="stylesheet" href="../assets/css/pages/affectation.css">
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
            <li><a href="affectation.php" class="active">Affectations</a></li>
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
            <h1>Affectation du Personnel</h1>
        </div>

        <div class="form-container">
            <form action="../actions/save_affectation.php" method="POST">
                <div class="form-grid">
                    
                    <div class="form-group full-width">
                        <label>Sélectionner l'Enseignant</label>
                        <select name="id_enseignant" required>
                            <option value="">-- Choisir un enseignant --</option>
                            <?php while($e = mysqli_fetch_assoc($enseignants)) { ?>
                                <option value="<?php echo $e['id_enseignant']; ?>">
                                    <?php echo $e['nom'] . " " . $e['postnom'] . " (" . $e['prenom'] . ")"; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label>Établissement de destination</label>
                        <select name="id_etablissement" required>
                            <option value="">-- Choisir une école --</option>
                            <?php while($et = mysqli_fetch_assoc($etablissements)) { ?>
                                <option value="<?php echo $et['id_etablissement']; ?>">
                                    <?php echo $et['nom_ecole']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="submit-btn">Valider l'affectation</button>
                    </div>
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