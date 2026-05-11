<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

include('../config/db.php');

$sql = "SELECT * FROM etablissements ORDER BY id_etablissement DESC";
$result = mysqli_query($connexion, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etablissements - DYNACOPE</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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
            <h1>Gestion des Etablissements</h1>
            <a href="ajouter_etablissement.php" class="add-btn" style="text-decoration:none; background:rgba(76, 201, 240, 0.1); padding:10px 20px; border-radius:8px; border:1px solid #4cc9f0; color:#4cc9f0;">
                + Ajouter Etablissement
            </a>
        </div>

        <div class="table-section">
            <table>
                <tr>
                    <th>Code</th>
                    <th>Nom de l'Etablissement</th>
                    <th>Province</th>
                    <th>Commune</th>
                    <th>Type</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['code_etablissement']; ?></td>
                    <td><?php echo $row['nom_etablissement']; ?></td>
                    <td><?php echo $row['province']; ?></td>
                    <td><?php echo $row['commune']; ?></td>
                    <td><?php echo $row['type_etablissement']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>