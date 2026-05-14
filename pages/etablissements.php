<?php
include('../includes/session.php'); 

require_once(__DIR__ . '/../config/db.php'); 

$sql = "SELECT * FROM etablissements ORDER BY id_etablissement DESC";
$result = mysqli_query($connexion, $sql);

if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($connexion));
}

include('../includes/header.php');
include('../includes/sidebar.php');
?>

<div class="main-content">
    <div class="header">
        <h1>Gestion des Etablissements</h1>
        <a href="ajouter_etablissement.php" class="add-btn" style="text-decoration:none; background:rgba(76, 201, 240, 0.1); padding:10px 20px; border-radius:8px; border:1px solid #4cc9f0; color:#4cc9f0;">
            + Ajouter Etablissement
        </a>
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

<?php include('../includes/footer.php'); ?>