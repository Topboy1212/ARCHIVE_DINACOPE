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
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: #050a18;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #e0e6ed;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.03);
            padding: 40px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            text-align: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
        }

        .login-box h2 {
            margin-bottom: 10px;
            font-weight: 300;
            letter-spacing: 2px;
            color: #4cc9f0;
            text-transform: uppercase;
            font-size: 22px;
        }

        .login-box p {
            color: #aeb9cc;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .login-box input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: white;
            outline: none;
            box-sizing: border-box;
            transition: 0.3s;
        }

        .login-box input:focus {
            border-color: #4cc9f0;
            background: rgba(255, 255, 255, 0.08);
        }

        .login-box button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #0f1c3f 0%, #050a18 100%);
            border: 1px solid rgba(76, 201, 240, 0.4);
            color: #4cc9f0;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .login-box button:hover {
            transform: translateY(-3px);
            background: #4cc9f0;
            color: #050a18;
        }
    </style>
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