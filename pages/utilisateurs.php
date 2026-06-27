<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION['role'] !== 'Admin') {
    header("Location: dashboard.php");
    exit();
}

require_once(__DIR__ . '/../config/db.php');

/** @var mysqli $connexion */

$sql = "SELECT id_user, nom_utilisateur, role FROM utilisateurs ORDER BY nom_utilisateur ASC";
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
    <title>Utilisateurs - DYNACOPE</title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/pages/utilisateurs.css">
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
            <li><a href="utilisateurs.php" class="active">Utilisateurs</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="../logout.php">Déconnexion</a></li>
        </ul>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="header">
            <h1>Gestion des Utilisateurs</h1>
        </div>

        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom d'utilisateur</th>
                        <th>Rôle / Privilège</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id_user']); ?></td>
                        <td><?php echo htmlspecialchars($user['nom_utilisateur']); ?></td>
                        <td>
                            <span style="padding: 5px 10px; background: rgba(76, 201, 240, 0.2); border-radius: 5px; color: #4cc9f0;">
                                <?php echo htmlspecialchars($user['role']); ?>
                            </span>
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