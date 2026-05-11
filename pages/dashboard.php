<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
}

include('../config/db.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - DINACOPE</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard-container">

    <div class="sidebar">
        <h2>DINACOPE</h2>

        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="enseignants.php">Enseignants</a></li>
            <li><a href="etablissements.php">Etablissements</a></li>
            <li><a href="affectation.php"> Affectations</a></li>
            <li><a href="documents.php"> Documents</a></li>
            <li><a href="statistiques.php"> Statistiques</a></li>
            <li><a href="rapports.php"> Rapports</a></li>
            <li><a href="utilisateurs.php"> Utilisateurs</a></li>
            <li><a href="profil.php"> Profil</a></li>
            <li><a href="../logout.php">Déconnexion</a></li>
        </ul>
    </div>

    <div class="main-content">

        <!-- HEADER -->
        <div class="header">
            <h1>Dashboard</h1>

            <div class="user-info">
                Bienvenue,
                <?php echo $_SESSION['user']; ?>
            </div>
        </div>

        
        <div class="cards">

            

        </div>

        <div class="table-section">

            <h2>Derniers Enseignants Ajoutés</h2>

            <table>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Sexe</th>
                    <th>Téléphone</th>
                </tr>

      

            </table>

        </div>

    </div>

</div>

</body>
</html>