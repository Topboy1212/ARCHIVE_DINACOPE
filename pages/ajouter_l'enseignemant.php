<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

include('../config/db.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Enseignant - DINACOPE</title>
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
            letter-spacing: 1px;
        }

        .form-group input, .form-group select {
            padding: 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: white;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #4cc9f0;
        }

        .full-width {
            grid-column: span 2;
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
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #4cc9f0;
            color: #050a18;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="dashboard-container">

    <div class="sidebar">
        <h2>DYNACOPE</h2>
        <ul>
            <li><a href="dashboard.php">🏠 Dashboard</a></li>
            <li><a href="enseignant.php">👨‍🏫 Enseignants</a></li>
            <li><a href="etablissements.php">🏫 Etablissements</a></li>
            <li><a href="documents.php">📂 Documents</a></li>
            <li><a href="../logout.php">🚪 Déconnexion</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Nouvel Enseignant</h1>
            <a href="enseignant.php" class="btn-retry" style="text-decoration: none; padding: 10px; border: 1px solid #4cc9f0; border-radius: 5px; color: #4cc9f0;">Retour</a>
        </div>

        <div class="form-container">
            <form action="../actions/save_enseignant.php" method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Matricule</label>
                        <input type="text" name="matricule" required placeholder="Ex: ENS100">
                    </div>

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" required>
                    </div>

                    <div class="form-group">
                        <label>Postnom</label>
                        <input type="text" name="postnom" required>
                    </div>

                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" name="prenom" required>
                    </div>

                    <div class="form-group">
                        <label>Sexe</label>
                        <select name="sexe" required>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="text" name="telephone" required>
                    </div>

                    <div class="form-group full-width">
                        <label>Niveau d'étude</label>
                        <input type="text" name="niveau_etude" required placeholder="Ex: Licencié en Informatique">
                    </div>
                    <div class="form-group">
                        <label>Date de naissance</label>
                        <input type="date" name="date_naissance" required>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Enregistrer l'enseignant</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>