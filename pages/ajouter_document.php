<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

require_once(__DIR__ . '/../config/db.php');

$enseignants = mysqli_query($connexion, "SELECT id_enseignant, nom, postnom FROM enseignants ORDER BY nom ASC");
$etablissements = mysqli_query($connexion, "SELECT id_etablissement, nom_ecole FROM etablissements ORDER BY nom_ecole ASC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Document - DYNACOPE</title>
    <link rel="stylesheet" href="../assets/css/pages/ajouter_document.css">
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
            <h1>Archivage de Document</h1>
            <a href="documents.php" class="btn-retour">← Retour aux archives</a>
        </div>

    <div class="form-container">
        <form action="../actions/save_document.php" method="POST" enctype="multipart/form-data">
            <div class="form-grid">
                
                <div class="form-group full-width">
                    <label for="titre">Titre du document</label>
                    <input type="text" name="titre" id="titre" required placeholder="Ex: Acte de naissance, Diplôme d'État, etc.">
                </div>

                <div class="form-group">
                    <label for="type_document">Type de document</label>
                    <select name="type_document" id="type_document" required>
                        <option value="Administratif">Administratif</option>
                        <option value="Académique">Académique</option>
                        <option value="Identité">Identité</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fichier">Fichier (PDF, JPG, PNG)</label>
                    <input type="file" name="fichier" id="fichier" class="file-input" required>
                </div>

                <div class="form-group">
                    <label for="id_enseignant">Concerne un enseignant (Optionnel)</label>
                    <select name="id_enseignant" id="id_enseignant">
                        <option value="">-- Aucun --</option>
                        <?php while($e = mysqli_fetch_assoc($enseignants)) : ?>
                            <option value="<?php echo $e['id_enseignant']; ?>">
                                <?php echo htmlspecialchars($e['nom'] . " " . $e['postnom']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_etablissement">Concerne une école (Optionnel)</label>
                    <select name="id_etablissement" id="id_etablissement">
                        <option value="">-- Aucune --</option>
                        <?php while($et = mysqli_fetch_assoc($etablissements)) : ?>
                            <option value="<?php echo $et['id_etablissement']; ?>">
                                <?php echo htmlspecialchars($et['nom_ecole']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

            </div>
            
            <div class="form-actions">
                <button type="submit" class="submit-btn">Lancer l'archivage numérique</button>
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