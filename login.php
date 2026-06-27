<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('config/db.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - DYNACOPE</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/pages/login.css">
</head>
<body>

<div class="login-container">

    <form action="actions/login_action.php" method="POST" class="login-box">

        <h2>DYNACOPE WEB SYSTEM</h2>
        <p>Connexion Administrateur</p>

        <input 
            type="text" 
            name="nom_utilisateur" 
            placeholder="Nom utilisateur"
            required
        >

        <input 
            type="password" 
            name="mot_de_passe" 
            placeholder="Mot de passe"
            required
        >

        <button type="submit">
            Se connecter
        </button>

    </form>

</div>

</body>
</html>
