<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

require_once(__DIR__ . '/../config/db.php');
/** @var mysqli $connexion */
$user_name = $_SESSION['user'];
$sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = ?";
$stmt = mysqli_prepare($connexion, $sql);
mysqli_stmt_bind_param($stmt, "s", $user_name);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("Erreur : Utilisateur introuvable.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - DYNACOPE</title>
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
            <li><a href="statistiques.php">Statistiques</a></li>
            <li><a href="rapports.php">Rapports</a></li>
            <li><a href="utilisateurs.php">Utilisateurs</a></li>
            <li><a href="profil.php" class="active">Profil</a></li>
            <li><a href="../logout.php">Déconnexion</a></li>
        </ul>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="header">
            <h1>Mon Profil</h1>
        </div>

        <div class="profile-container">
            <div class="profile-card">
                <div class="profile-info">
                    <div class="info-field">
                        <label>Nom d'utilisateur</label>
                        <span><?php echo htmlspecialchars($user['nom_utilisateur']); ?></span>
                    </div>
                    <div class="info-field">
                        <label>Rôle</label>
                        <span><?php echo htmlspecialchars($user['role']); ?></span>
                    </div>
                    <div class="info-field">
                        <label>Date d'inscription</label>
                        <span><?php echo date('d/m/Y H:i', strtotime($user['date_creation'])); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>

<?php
mysqli_close($connexion);
?>
