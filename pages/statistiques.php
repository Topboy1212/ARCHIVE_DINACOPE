<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

require_once(__DIR__ . '/../config/db.php');
/** @var mysqli $connexion */
function getCount($connexion, $table) {
    $res = mysqli_query($connexion, "SELECT COUNT(*) as total FROM $table");
    if ($res) {
        $data = mysqli_fetch_assoc($res);
        return $data['total'];
    }
    return 0;
}

$nb_ens  = getCount($connexion, "enseignants");
$nb_etab = getCount($connexion, "etablissements");
$nb_docs = getCount($connexion, "documents");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques - DYNACOPE</title>
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
            <li><a href="documents.php">Documents</a></li>
            <li><a href="statistiques.php" class="active">Statistiques</a></li>
            <li><a href="rapports.php">Rapports</a></li>
            <li><a href="utilisateurs.php">Utilisateurs</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="../logout.php">Déconnexion</a></li>
        </ul>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="header">
            <h1>Statistiques Générales</h1>
        </div>
        
        <div class="stats-container">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="label">Enseignants</div>
                    <div class="value"><?php echo $nb_ens; ?></div>
                </div>

                <div class="stat-card">
                    <div class="label">Établissements</div>
                    <div class="value"><?php echo $nb_etab; ?></div>
                </div>

                <div class="stat-card">
                    <div class="label">Documents Archivés</div>
                    <div class="value"><?php echo $nb_docs; ?></div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>

<?php
/** @var mysqli $connexion */
mysqli_close($connexion);
?>
