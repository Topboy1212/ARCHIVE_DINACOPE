<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="enseignants.php">Enseignants</a></li>
<li><a href="etablissements.php">Etablissements</a></li>

<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') : ?>
    <li><a href="utilisateurs.php">Utilisateurs</a></li>
<?php endif; ?>

<li><a href="profil.php">Profil</a></li>