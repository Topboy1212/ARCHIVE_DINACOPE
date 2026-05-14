<?php
include('../includes/session.php'); 

require_once(__DIR__ . '/../config/db.php'); 

function getCount($conn, $table) {
    $res = mysqli_query($conn, "SELECT COUNT(*) as total FROM $table");
    if ($res) {
        $data = mysqli_fetch_assoc($res);
        return $data['total'];
    }
    return 0;
}

$nb_ens  = getCount($connexion, "enseignants");
$nb_etab = getCount($connexion, "etablissements");
$nb_docs = getCount($connexion, "documents");

include('../includes/header.php');
include('../includes/sidebar.php');
?>

<div class="main-content">
    <div class="header">
        <h1>Statistiques Générales</h1>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 20px;">
        
        <div style="background: #0f1c3f; padding: 25px; border-radius: 10px; border: 1px solid #4cc9f0; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
            <h3 style="margin-top: 0; color: #fff; font-weight: 300;">Enseignants</h3>
            <p style="font-size: 32px; color: #4cc9f0; font-weight: bold; margin-bottom: 0;"><?php echo $nb_ens; ?></p>
        </div>

        <div style="background: #0f1c3f; padding: 25px; border-radius: 10px; border: 1px solid #4cc9f0; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
            <h3 style="margin-top: 0; color: #fff; font-weight: 300;">Établissements</h3>
            <p style="font-size: 32px; color: #4cc9f0; font-weight: bold; margin-bottom: 0;"><?php echo $nb_etab; ?></p>
        </div>

        <div style="background: #0f1c3f; padding: 25px; border-radius: 10px; border: 1px solid #4cc9f0; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
            <h3 style="margin-top: 0; color: #fff; font-weight: 300;">Documents Archivés</h3>
            <p style="font-size: 32px; color: #4cc9f0; font-weight: bold; margin-bottom: 0;"><?php echo $nb_docs; ?></p>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?> 