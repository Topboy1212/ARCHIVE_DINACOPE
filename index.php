<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail Officiel - DINACOPE Selembao 3</title>
    
    <style>
        /* ==========================================
   HOME PAGE - INDEX STYLES
   Palette: Bleu Nuit Technologique
   ========================================== */

:root {
    --primary-dark: #05122e;
    --accent-gold: #ffb703;
    --text-dark: #1a2a40;
    --text-light: #ffffff;
    --text-muted: #aeb9cc;
    --text-secondary: #2b3a4a;
    --bg-light: #d2e4f7;
    --button-blue: #0d6efd;
    --button-blue-hover: #0b5ed7;
    --overlay-dark: rgba(5, 18, 46, 0.92);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Arial, sans-serif;
}

body {
    background-color: var(--bg-light);
    color: var(--text-dark);
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* ==========================================
   HEADER / BANNER SECTION
   ========================================== */

.top-banner {
    background: linear-gradient(var(--overlay-dark), rgba(5, 18, 46, 0.95)), 
                url('../../uploads/WhatsApp%20Image%202026-05-24%20at%2000.02.38.jpeg');
    background-size: cover;
    background-position: center;
    padding: 40px 20px;
    text-align: center;
    border-bottom: 4px solid var(--text-light);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.header-container {
    max-width: 1100px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.logo-rdc {
    width: 120px;
    height: auto;
}

.ministry-title {
    text-align: left;
    color: var(--text-light);
    border-left: 3px solid var(--text-light);
    padding-left: 20px;
    max-width: 650px;
}

.ministry-title h2 {
    font-size: 1.1rem;
    font-weight: 400;
    letter-spacing: 1px;
    text-transform: uppercase;
    line-height: 1.3;
}

.ministry-title h1 {
    font-size: 3rem;
    font-weight: 700;
    color: var(--text-light);
    letter-spacing: 2px;
    margin: 5px 0;
}

.ministry-title p {
    font-size: 0.75rem;
    color: var(--text-muted);
    line-height: 1.4;
    text-transform: uppercase;
}

.welcome-text {
    color: var(--accent-gold);
    font-size: 0.9rem;
    font-weight: 600;
    letter-spacing: 1.5px;
    margin-top: 35px;
    text-transform: uppercase;
}

/* ==========================================
   MISSIONS SECTION
   ========================================== */

.missions-section {
    flex: 1;
    max-width: 1000px;
    margin: 0 auto;
    padding: 50px 20px;
    width: 100%;
}

.missions-container {
    background: rgba(255, 255, 255, 0.4);
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.missions-container h2 {
    font-size: 1.8rem;
    color: var(--primary-dark);
    text-transform: uppercase;
    margin-bottom: 25px;
    letter-spacing: 0.5px;
    font-weight: 700;
}

.missions-list {
    list-style: none;
}

.missions-list li {
    position: relative;
    padding-left: 25px;
    margin-bottom: 15px;
    font-size: 1.05rem;
    line-height: 1.6;
    color: var(--text-secondary);
    text-align: justify;
}

.missions-list li::before {
    content: "•";
    position: absolute;
    left: 5px;
    top: -2px;
    color: var(--primary-dark);
    font-size: 1.5rem;
}

/* ==========================================
   BUTTON SECTION
   ========================================== */

.btn-container {
    margin-top: 35px;
}

.btn-start {
    display: inline-block;
    background-color: var(--button-blue);
    color: var(--text-light);
    text-decoration: none;
    padding: 14px 40px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 6px;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 4px 10px rgba(13, 110, 253, 0.3);
    transition: all 0.2s ease-in-out;
    border: none;
    cursor: pointer;
}

.btn-start:hover {
    background-color: var(--button-blue-hover);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(13, 110, 253, 0.4);
}

.btn-start:active {
    transform: translateY(0);
}

/* ==========================================
   RESPONSIVE DESIGN
   ========================================== */

@media (max-width: 768px) {
    .header-container {
        flex-direction: column;
        text-align: center;
    }

    .ministry-title {
        border-left: none;
        padding-left: 0;
        text-align: center;
    }

    .ministry-title h1 {
        font-size: 2.2rem;
    }

    .missions-container {
        padding: 25px 15px;
    }

    .missions-container h2 {
        font-size: 1.4rem;
    }
}

@media (max-width: 480px) {
    .top-banner {
        padding: 25px 15px;
    }

    .header-container {
        gap: 15px;
    }

    .logo-rdc {
        width: 80px;
    }

    .ministry-title h1 {
        font-size: 1.8rem;
    }

    .ministry-title h2 {
        font-size: 0.9rem;
    }

    .missions-list li {
        font-size: 0.95rem;
    }

    .btn-start {
        padding: 12px 30px;
        font-size: 0.95rem;
    }
}
    </style>
</head>
<body>

    <header class="top-banner">
        <div class="header-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Emblem_of_the_Democratic_Republic_of_the_Congo.svg" alt="Armoiries RDC" class="logo-rdc">
            
            <div class="ministry-title">
                <h2>Ministère de l'Éducation Nationale et de la Nouvelle Citoyenneté</h2>
                <h1>DINACOPE</h1>
                <p>Direction Nationale de Contrôle, de la Préparation de la Paie et de la Maîtrise des Effectifs des Enseignants et du Personnel Administratif des Établissements Scolaires</p>
            </div>
        </div>
    </header>

    <div class="welcome-bar">
        <div class="welcome-text">
            Bienvenu(e) au portail officiel de la DINACOPE - Selembao 3
        </div>
    </div>

    <main class="missions-section">
        <div class="missions-container">
            <h2>Les Missions de la DINACOPE</h2>
            
            <ul class="missions-list">
                <li>Préparation de la Paie et de la Maîtrise des Effectifs des Enseignants et du Personnel administratif des Établissements Scolaires ;</li>
                <li>Mettre à jour mensuellement le fichier paie par le contrôle physique mensuel dans les établissements scolaires ;</li>
                <li>Assurer la maîtrise des effectifs et de la masse salariale du personnel enseignant des établissements scolaires publics du secteur de l'Enseignement Primaire, Secondaire et Technique ;</li>
                <li>Contrôler la viabilité des établissements scolaires en vue de leur prise en charge par le Trésor Public ;</li>
                <li>Gérer le processus de mécanisation et de budgétisation du personnel et des établissements scolaires publics du secteur de l'Enseignement Primaire, Secondaire et Technique ;</li>
                <li>Gérer la base de données de préparation de la paie des enseignants et des frais de fonctionnement des établissements scolaires du secteur de l'Enseignement Primaire, Secondaire et Technique.</li>
            </ul>
            
            <div class="btn-container">
                <a href="login.php" class="btn-start">Démarrer</a>
            </div>
        </div>
    </main>

</body>
</html>