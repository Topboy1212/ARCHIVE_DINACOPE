<?php
include('../includes/session.php');
include('../config/db.php');

$user_name = $_SESSION['user'];
$sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = ?";
$stmt = mysqli_prepare($connexion, $sql);
mysqli_stmt_bind_param($stmt, "s", $user_name);
mysqli_stmt_execute($stmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

include('../includes/header.php');
include('../includes/sidebar.php');
?>

<div class="main-content">
    <h1>Mon Profil</h1>
    <div class="form-container" style="background: rgba(255, 255, 255, 0.02); padding: 30px; border-radius: 15px; border: 1px solid rgba(255, 255, 255, 0.1);">
        <p><strong>Nom d'utilisateur :</strong> <?php echo $user['nom_utilisateur']; ?></p>
        <p><strong>Rôle :</strong> <?php echo $user['role']; ?></p>
        <p><strong>Dernière connexion :</strong> <?php echo date('d/m/Y H:i'); ?></p>
    </div>
</div>

<?php include('../includes/footer.php'); ?>