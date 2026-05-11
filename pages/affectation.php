<?php
include('session.php');
include('../config/db.php');

$enseignants = mysqli_query($connexion, "SELECT id_enseignant, nom, postnom, prenom FROM enseignants ORDER BY nom ASC");
$etablissements = mysqli_query($connexion, "SELECT id_etablissement, nom_ecole FROM etablissements ORDER BY nom_ecole ASC");

include('../includes/header.php');
include('../includes/sidebar.php');
?>

<div class="main-content">
    <div class="header">
        <h1>Affectation du Personnel</h1>
    </div>

    <div class="form-container" style="background: rgba(255, 255, 255, 0.02); padding: 30px; border-radius: 20px; border: 1px solid rgba(255, 255, 255, 0.05); max-width: 700px;">
        <form action="../actions/save_affectation.php" method="POST">
            <div style="display: flex; flex-direction: column; gap: 25px;">
                
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <label style="color: #4cc9f0; text-transform: uppercase; font-size: 13px;">Sélectionner l'Enseignant</label>
                    <select name="id_enseignant" required style="padding: 12px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; color: white; outline: none;">
                        <option value="">-- Choisir un enseignant --</option>
                        <?php while($e = mysqli_fetch_assoc($enseignants)) { ?>
                            <option value="<?php echo $e['id_enseignant']; ?>">
                                <?php echo $e['nom'] . " " . $e['postnom'] . " (" . $e['prenom'] . ")"; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <label style="color: #4cc9f0; text-transform: uppercase; font-size: 13px;">Établissement de destination</label>
                    <select name="id_etablissement" required style="padding: 12px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; color: white; outline: none;">
                        <option value="">-- Choisir une école --</option>
                        <?php while($et = mysqli_fetch_assoc($etablissements)) { ?>
                            <option value="<?php echo $et['id_etablissement']; ?>">
                                <?php echo $et['nom_etablissement']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" style="padding: 15px; background: linear-gradient(135deg, #0f1c3f 0%, #050a18 100%); border: 1px solid rgba(76, 201, 240, 0.4); color: #4cc9f0; border-radius: 8px; cursor: pointer; font-weight: 600; text-transform: uppercase;">
                    Valider l'affectation
                </button>
            </div>
        </form>
    </div>
</div>

<?php include('../includes/footer.php'); ?>