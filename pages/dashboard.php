<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

include('../config/db.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DINACOPE</title>
    <link rel="stylesheet" href="../assets/css/global.css">
</head>
<body>

<div class="dashboard-container">

    <div class="sidebar">
        <h2>DINACOPE</h2>
        <ul>
            <li><a href="dashboard.php" class="active">Dashboard</a></li>
            <li><a href="enseignants.php">Enseignants</a></li>
            <li><a href="etablissements.php">Etablissements</a></li>
            <li><a href="affectation.php">Affectations</a></li>
            <li><a href="documents.php">Documents</a></li>
            <li><a href="statistiques.php">Statistiques</a></li>
            <li><a href="rapports.php">Rapports</a></li>
            <li><a href="utilisateurs.php">Utilisateurs</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="../logout.php" style="color: var(--ministry-red);">Déconnexion</a></li>
        </ul>
    </div>

    <div class="main-content">

        <div class="header">
            <div class="header-left">
                <img src="../assets/images/rdc-armoiries.jpg" alt="Armoiries de la RDC" class="logo-rdc">
                <div class="ministry-info">
                    <h1>Direction Nationale de Controle de la Preparation de la Paie</h1>
                    <p>DINACOPE — Espace de Contrôle et de Gestion</p>
                </div>
            </div>

            <div class="user-info">
                Utilisateur connecté : <span><?php echo htmlspecialchars($_SESSION['user']); ?></span>
            </div>

            <!-- Photo armoiries (RDC) - ajout dans la zone visuellement “vide” -->
            <div class="header-armoiries" aria-hidden="true">
                <img src="../assets/images/rdc-armoiries.jpg" alt="" />
            </div>
        </div>


        <div class="cards">
            <section class="photo-feature">
                <div>
                    <h2>Suivi scolaire et gestion du personnel enseignant</h2>
                    <p>Un espace centralisé pour accompagner les écoles, les enseignants et les documents administratifs.</p>
                </div>
            </section>

            <div class="photo-stack">
                <section class="photo-card teacher">
                    <h3>Education et encadrement</h3>
                </section>

                <section class="photo-card flag">
                    <h3>Service public national</h3>
                </section>
            </div>
        </div>

        <div class="table-section">
            <h2>Derniers Enseignants Ajoutés</h2>
            <table>
                <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Sexe</th>
                        <th>Téléphone</th>
                    </tr>
                </thead>
                <tbody>
                    
                   
                </tbody>
            </table>
        </div>

    </div>
</div>

</body>
</html>
