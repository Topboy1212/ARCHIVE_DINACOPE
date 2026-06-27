<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

require_once(__DIR__ . '/../config/db.php');

/** @var mysqli $connexion */

$sql = "SELECT d.*, e.nom AS nom_enseignant, et.nom_ecole 
        FROM documents d 
        LEFT JOIN enseignants e ON d.id_enseignant = e.id_enseignant 
        LEFT JOIN etablissements et ON d.id_etablissement = et.id_etablissement 
        ORDER BY d.date_upload DESC";
        
$result = mysqli_query($connexion, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents - DYNACOPE</title>
    <link rel="stylesheet" href="../assets/css/global.css">
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
            <li><a href="documents.php" class="active">Documents</a></li>
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
            <h1>Archives Numériques</h1>
            <a href="ajouter_document.php" class="add-btn">+ Archiver un Document</a>
        </div>

        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>Titre du Document</th>
                        <th>Type</th>
                        <th>Concerne</th>
                        <th>Date d'ajout</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['titre']); ?></td>
                        <td><?php echo htmlspecialchars($row['type_document']); ?></td>
                        <td>
                            <?php 
                                if(!empty($row['nom_enseignant'])) {
                                    echo "Enseignant: " . htmlspecialchars($row['nom_enseignant']);
                                } elseif(!empty($row['nom_ecole'])) {
                                    echo "Ecole: " . htmlspecialchars($row['nom_ecole']);
                                } else {
                                    echo "Général";
                                }
                            ?>
                        </td>
                        <td><?php echo date('d/m/Y', strtotime($row['date_upload'])); ?></td>
                        <td>
                            <a href="../assets/uploads/<?php echo htmlspecialchars($row['fichier_path']); ?>" target="_blank" style="color:#4cc9f0; text-decoration:none;">👁 Voir</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>

<?php 
mysqli_close($connexion);
?>
