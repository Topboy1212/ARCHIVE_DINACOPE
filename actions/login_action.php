<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once(__DIR__ . '/../config/db.php');

/** @var mysqli $connexion */

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nom_utilisateur = $_POST['nom_utilisateur'] ?? '';
    $mot_de_passe    = $_POST['mot_de_passe'] ?? '';

    if (!empty($nom_utilisateur) && !empty($mot_de_passe)) {
        
        $sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = ?";
        $stmt = mysqli_prepare($connexion, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $nom_utilisateur);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);

            if ($user = mysqli_fetch_assoc($result)) {
                
                // Utilisation de password_verify pour valider le hash
                if (password_verify($mot_de_passe, $user['mot_de_passe'])) {
                    
                    $_SESSION['user'] = $user['nom_utilisateur'];
                    $_SESSION['role'] = $user['role'];

                    header("Location: ../pages/dashboard.php");
                    exit();
                    
                } else {
                    $error_message = "Nom utilisateur ou mot de passe incorrect.";
                }
            } else {
                $error_message = "Nom utilisateur ou mot de passe incorrect.";
            }
            mysqli_stmt_close($stmt);
        }
    }
}

if (!empty($error_message)): 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur de connexion</title>
    <style>
        body { background: #050a18; color: #e0e6ed; font-family: 'Segoe UI', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .error-box { background: rgba(255, 255, 255, 0.03); padding: 30px; border-radius: 15px; border: 1px solid rgba(76, 201, 240, 0.4); text-align: center; backdrop-filter: blur(10px); }
        .error-box p { color: #4cc9f0; font-size: 18px; margin-bottom: 20px; }
        .btn-retry { display: inline-block; padding: 10px 20px; background: linear-gradient(180deg, #0f1c3f 0%, #050a18 100%); color: #4cc9f0; text-decoration: none; border-radius: 8px; border: 1px solid rgba(255, 255, 255, 0.1); transition: 0.3s; }
        .btn-retry:hover { transform: translateY(-3px); border-color: #4cc9f0; }
    </style>
</head>
<body>
    <div class="error-box">
        <p><?php echo htmlspecialchars($error_message); ?></p>
        <a href="../login.php" class="btn-retry">Réessayer</a>
    </div>
</body>
</html>
<?php 
endif;

if (isset($connexion)) {
    mysqli_close($connexion);
}
?>