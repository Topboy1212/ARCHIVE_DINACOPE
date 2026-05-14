<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Etablissement - DINACOPE</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .form-container {
            background: rgba(255, 255, 255, 0.02);
            padding: 30px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            max-width: 800px;
            margin: 0 auto;
        }
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-group label {
            color: #4cc9f0;
            font-size: 13px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        .form-group input, .form-group select {
            padding: 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: white;
            outline: none;
        }
        .submit-btn {
            margin-top: 20px;
            padding: 15px;
            background: linear-gradient(135deg, #0f1c3f 0%, #050a18 100%);
            border: 1px solid rgba(76, 201, 240, 0.4);
            color: #4cc9f0;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-transform: uppercase;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <div class="sidebar">
        <h2>DYNACOPE</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="enseignant.php">Enseignants</a></li>
            <li><a href="etablissements.php">Etablissements</a></li>
            <li><a href="../logout.php">Déconnexion</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Nouvel Etablissement</h1>
            <a href="etablissements.php" style="color:#4cc9f0; text-decoration:none;">Retour</a>
        </div>

        <div class="form-container">
            <form action="../actions/save_etablissements.php" method="POST">
    <div class="form-grid">
        <div class="form-group">
            <label>Code École</label>
            <input type="text" name="code_ecole" required placeholder="Ex: 10234">
        </div>

        <div class="form-group">
            <label>Nom de l'École</label>
            <input type="text" name="nom_ecole" required placeholder="Nom de l'établissement">
        </div>

        <div class="form-group">
            <label>Province Éducationnelle</label>
            <!-- Changé de 'province' à 'province_educationnelle' -->
            <input type="text" name="province_educationnelle" required placeholder="Ex: Kinshasa-Lukunga">
        </div>

        <div class="form-group">
            <label>Commune</label>
            <input type="text" name="commune" required placeholder="Commune">
        </div>

        <div class="form-group">
            <label>Type d'établissement</label>
            <!-- Changé de 'type_etablissement' à 'type_ecole' -->
            <select name="type_ecole" required>
                <option value="EP">Ecole Primaire (EP)</option>
                <option value="INSTITUT">Institut / Secondaire</option>
                <option value="BUREAU">Bureau Administratif</option>
            </select>
        </div>
    </div>
    
    <button type="submit" class="submit-btn">Enregistrer l'établissement</button>
</form>
                    <div class="form-group">
        </div>
    </div>
</div>

</body>
</html>