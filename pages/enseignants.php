<?php
include('../includes/session.php'); 

require_once(__DIR__ . '/../config/db.php'); 

$sql = "SELECT * FROM enseignants ORDER BY id_enseignant DESC";
$result = mysqli_query($connexion, $sql);

if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($connexion));
}

include('../includes/header.php');
include('../includes/sidebar.php');
?>

<div class="main-content">
    <div class="header">
        <h1>Gestion des Enseignants</h1>
        <a href="ajouter_l'enseignemant.php" class="add-btn" style="text-decoration:none; background:rgba(76, 201, 240, 0.1); padding:10px 20px; border-radius:8px; border:1px solid #4cc9f0; color:#4cc9f0;">
            + Ajouter Enseignant
        </a>
    </div>

    <div class="table-section">
        <table>
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Postnom</th>
                    <th>Prénom</th>
                    <th>Sexe</th>
                    <th>Téléphone</th>
                    <th>Niveau</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
    </div>
</div>

<?php include('../includes/footer.php'); ?>