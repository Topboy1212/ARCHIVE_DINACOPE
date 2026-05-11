<?php
include('../includes/session.php');
include('../config/db.php');

$nb_ens = mysqli_fetch_assoc(mysqli_query($connexion, "SELECT COUNT(*) as total FROM enseignants"))['total'];
$nb_etab = mysqli_fetch_assoc(mysqli_query($connexion, "SELECT COUNT(*) as total FROM etablissements"))['total'];
$nb_docs = mysqli_fetch_assoc(mysqli_query($connexion, "SELECT COUNT(*) as total FROM documents"))['total'];

include('../includes/header.php');
include('../includes/sidebar.php');
?>

<div class="main-content">
    <h1>Statistiques Générales</h1>
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
        <div style="background: #0f1c3f; padding: 20px; border-radius: 10px; border: 1px solid #4cc9f0;">
            <h3>Enseignants</h3>
            <p style="font-size: 24px; color: #4cc9f0;"><?php echo $nb_ens; ?></p>
        </div>
        <div style="background: #0f1c3f; padding: 20px; border-radius: 10px; border: 1px solid #4cc9f0;">
            <h3>Etablissements</h3>
            <p style="font-size: 24px; color: #4cc9f0;"><?php echo $nb_etab; ?></p>
        </div>
        <div style="background: #0f1c3f; padding: 20px; border-radius: 10px; border: 1px solid #4cc9f0;">
            <h3>Documents Archivés</h3>
            <p style="font-size: 24px; color: #4cc9f0;"><?php echo $nb_docs; ?></p>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>