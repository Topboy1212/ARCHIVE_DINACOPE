<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

include('../config/db.php');

// Correction de la requête : on utilise 'nom_ecole' au lieu de 'nom_etablissement'
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
    <title>Archives Documents - DYNACOPE</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard-container">

    <div class="sidebar">
        <h2>DYNACOPE</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="enseignants.php">Enseignants</a></li>
            <li><a href="etablissements.php">Etablissements</a></li>
            <li><a href="documents.php">Documents</a></li>
            <li><a href="../logout.php">Déconnexion</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Archives Numériques</h1>
            <a href="ajouter_document.php" class="add-btn" style="text-decoration:none; background:rgba(76, 201, 240, 0.1); padding:10px 20px; border-radius:8px; border:1px solid #4cc9f0; color:#4cc9f0;">
                + Archiver un Document
            </a>
        </div>

        <div class="table-section">
            <table>
                <tr>
                    <th>Titre du Document</th>
                    <th>Type</th>
                    <th>Concerne</th>
                    <th>Date d'ajout</th>
                    <th>Action</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['titre']); ?></td>
                    <td><?php echo htmlspecialchars($row['type_document']); ?></td>
                    <td>
                        <?php 
                            // Correction ici aussi pour utiliser nom_ecole
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
                        <a href="../assets/uploads/<?php echo $row['fichier_path']; ?>" target="_blank" style="color:#4cc9f0; text-decoration:none;">👁 Voir</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>