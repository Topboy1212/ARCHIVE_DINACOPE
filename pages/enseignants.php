<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

include('../config/db.php');

$sql = "SELECT * FROM enseignants ORDER BY id_enseignant DESC";
$result = mysqli_query($connexion, $sql);

if(!$result){
    die('Erreur dans la requête: ' . mysqli_error($connexion));
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enseignants</title>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard-container">


    <div class="sidebar">

        <h2>DYNACOPE</h2>

        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="enseignants.php"> Enseignants</a></li>
            <li><a href="etablissements.php"> Etablissements</a></li>
            <li><a href="documents.php"> Documents</a></li>
            <li><a href="../logout.php">Déconnexion</a></li>
        </ul>

    </div>

    <div class="main-content">

        <div class="header">

            <h1>Gestion des Enseignants</h1>

            <a href="ajouter_enseignemant.php" class="add-btn">
                + Ajouter Enseignant
            </a>

        </div>

        <div class="table-section">

            <table>

                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Postnom</th>
                    <th>Prénom</th>
                    <th>Sexe</th>
                    <th>Téléphone</th>
                    <th>Niveau</th>
                </tr>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <tr>

                    <td><?php echo $row['matricule']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['postnom']; ?></td>
                    <td><?php echo $row['prenom']; ?></td>
                    <td><?php echo $row['sexe']; ?></td>
                    <td><?php echo $row['telephone']; ?></td>
                    <td><?php echo $row['niveau_etude']; ?></td>

                </tr>

                <?php } ?>

            </table>

        </div>

    </div>

</div>

</body>
</html>