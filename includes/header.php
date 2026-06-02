<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DINACOPE - Système de Gestion</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    
    <style>
        
        .mobile-bar {
            display: none;
            background: #0f1c3f;
            padding: 15px;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(76, 201, 240, 0.2);
            position: sticky;
            top: 0;
            z-index: 1001;
        }

        .burger-icon {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .burger-icon span {
            display: block;
            width: 25px;
            height: 3px;
            background: #4cc9f0;
            border-radius: 3px;
            transition: 0.3s;
        }

        @media (max-width: 768px) {
            .mobile-bar { display: flex; }
            
           
            .sidebar {
                position: fixed;
                left: -260px;
                top: 0;
                height: 100vh;
                z-index: 1000;
                transition: 0.3s;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0 !important;
                width: 100% !important;
            }
        }
    </style>
</head>
<body>

<div class="mobile-bar">
    <div class="burger-icon" id="btn-burger">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="mobile-logo" style="color: #4cc9f0; font-weight: bold; letter-spacing: 1px;">
        DINACOPE
    </div>
    <div style="width: 25px;"></div> </div>

<div class="dashboard-container">

<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        const btnBurger = document.getElementById('btn-burger');
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');

        if (btnBurger && sidebar) {
            btnBurger.addEventListener('click', function(e) {
                e.stopPropagation();
                sidebar.classList.toggle('active');
            });

            // Ferme le menu si on clique sur le contenu principal
            mainContent.addEventListener('click', function() {
                if (sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                }
            });
        }
    });
</script>