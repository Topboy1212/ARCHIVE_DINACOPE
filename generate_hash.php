<?php
// Script temporaire pour générer un hash de mot de passe
// À utiliser une seule fois puis à supprimer

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $password = $_POST['password'];
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $message = "Hash généré: <code>" . htmlspecialchars($hashed) . "</code>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générer Hash de Mot de Passe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f0f0f0;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
        }
        input, button {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            background: #4cc9f0;
            color: white;
            border: none;
            cursor: pointer;
        }
        code {
            background: #f4f4f4;
            padding: 10px;
            display: block;
            word-break: break-all;
        }
    </style>
</head>
<body>
    <h1>Générer un Hash de Mot de Passe</h1>
    
    <form method="POST">
        <input type="password" name="password" placeholder="Entrez le mot de passe" required>
        <button type="submit">Générer le Hash</button>
    </form>

    <?php if (isset($message)): ?>
        <div style="background: white; padding: 20px; margin-top: 20px; border-radius: 5px;">
            <p><?php echo $message; ?></p>
            <p style="color: red; font-size: 12px;">⚠️ Copier ce hash et l'insérer dans la base de données dans la colonne <strong>mot_de_passe</strong></p>
        </div>
    <?php endif; ?>
</body>
</html>
