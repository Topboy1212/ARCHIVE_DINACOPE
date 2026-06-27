<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

require_once(__DIR__ . '/../config/db.php');
/** @var mysqli $connexion */
$sql = "SELECT * FROM etablissements ORDER BY id_etablissement DESC";
$result = mysqli_query($connexion, $sql);

if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($connexion));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etablissements - DYNACOPE</title>
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
            <li><a href="etablissements.php" class="active">Etablissements</a></li>
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
            <h1>Gestion des Etablissements</h1>
            <a href="ajouter_etablissement.php" class="add-btn">+ Ajouter Etablissement</a>
        </div>

        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nom de l'Etablissement</th>
                        <th>Province</th>
                        <th>Commune</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['code_ecole']; ?></td>
                        <td><?php echo $row['nom_ecole']; ?></td>
                        <td><?php echo $row['province_educationnelle']; ?></td>
                        <td><?php echo $row['commune']; ?></td>
                        <td><?php echo $row['type_ecole']; ?></td>
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
