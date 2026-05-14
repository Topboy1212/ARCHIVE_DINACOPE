<?php

include('session.php'); 

 
require_once(__DIR__ . '/../config/db.php'); 


$sql = "SELECT id_user, nom_utilisateur, role FROM utilisateurs ORDER BY nom_utilisateur ASC";
$result = mysqli_query($connexion, $sql);

if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($connexion));
}


include('../includes/header.php');
include('../includes/sidebar.php');
?>


<div class="main-content">
    <div class="header">
        <h1>Gestion des Utilisateurs</h1>
    </div>

    <div class="table-section">
        <table>
            <tr>
                <th>ID</th>
                <th>Nom d'utilisateur</th>
                <th>Rôle / Privilège</th>
            </tr>
            <?php while($user = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $user['id_user']; ?></td>
                <td><?php echo $user['nom_utilisateur']; ?></td>
                <td>
                    <span style="padding: 5px 10px; background: rgba(76, 201, 240, 0.2); border-radius: 5px; color: #4cc9f0;">
                        <?php echo $user['role']; ?>
                    </span>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php include('../includes/footer.php'); ?>