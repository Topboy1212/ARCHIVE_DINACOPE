<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

require_once(__DIR__ . '/../config/db.php');
/** @var mysqli $connexion */
$sql = "SELECT 
            e.matricule, 
            e.nom, 
            e.postnom, 
            e.prenom, 
            et.nom_ecole
        FROM enseignants AS e
        LEFT JOIN etablissements AS et ON e.id_etablissement = et.id_etablissement";

$result = mysqli_query($connexion, $sql);

if (!$result) {
    die("Erreur SQL : " . mysqli_error($connexion));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapports - DYNACOPE</title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/pages/rapports.css">
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
            <li><a href="rapports.php" class="active">Rapports</a></li>
            <li><a href="utilisateurs.php">Utilisateurs</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="../logout.php">Déconnexion</a></li>
        </ul>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="header">
            <h1>Rapport des Affectations</h1>
            <button onclick="window.print()" class="submit-btn">Imprimer le rapport</button>
        </div>

        <div class="table-section" id="printable">
            <table>
                <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom Complet</th>
                        <th>Etablissement Affecté</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['matricule']; ?></td>
                        <td><?php echo $row['nom'] . " " . $row['postnom'] . " " . $row['prenom']; ?></td>
                        <td><?php echo !empty($row['nom_ecole']) ? $row['nom_ecole'] : "Non affecté"; ?></td>
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
