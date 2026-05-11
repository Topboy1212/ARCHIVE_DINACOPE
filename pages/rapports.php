<?php
include('session.php');
include('../config/db.php');

$sql = "SELECT 
            e.matricule, 
            e.nom, 
            e.postnom, 
            e.prenom, 
            et.nom_ecole 
        FROM enseignants AS e
        LEFT JOIN etablissements AS et ON e.id_etablissement = et.id_etablissement";

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
                    <td><?php echo $row['nom_ecole'] ? $row['nom_ecole'] : "Non affecté"; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<style>
@media print {
    .sidebar, .header button { display: none; }
    .main-content { margin: 0; width: 100%; }
    body { background: white; color: black; }
    table { border: 1px solid #000; width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #000; padding: 8px; color: black; }
}
</style>

<?php include('footer.php'); ?>