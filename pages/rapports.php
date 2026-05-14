<?php
include('../includes/session.php');
require_once(__DIR__ . '/../config/db.php');

$sql = "SELECT 
            e.matricule, 
            e.nom, 
            e.postnom, 
            e.prenom, 
            et.nom_ecole
        FROM enseignants AS e
        LEFT JOIN etablissements AS et ON e.id_etablissement = et.id_etablissement";

$result = mysqli_query($connexion, $sql);

if (!$result) {
    die("Erreur SQL : " . mysqli_error($connexion));
}

include('../includes/header.php');
include('../includes/sidebar.php');
?>

<div class="main-content">
    <div class="header">
        <h1>Rapport des Affectations</h1>
        <button onclick="window.print()" style="background: #4cc9f0; color: #050a18; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; font-weight: bold;">
            Imprimer le rapport
        </button>
    </div>

    <div class="table-section" id="printable">
        <table>
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom Complet</th>
                    <th>Etablissement Affecté</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['matricule']; ?></td>
                    <td><?php echo $row['nom'] . " " . $row['postnom'] . " " . $row['prenom']; ?></td>
                    <td><?php echo !empty($row['nom_etablissement']) ? $row['nom_etablissement'] : "Non affecté"; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../includes/footer.php'); ?>