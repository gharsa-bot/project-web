<div class="sidebar">
    <h3>Cabinet</h3>
    <a href="index.php?action=dashboard_<?php echo $_SESSION['role'] ?? 'patient'; ?>">Dashboard</a>

    <?php if($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'secretaire'): ?>
        <a href="index.php?action=patients">Patients</a>
        <a href="index.php?action=medecins">Médecins</a>
        <a href="index.php?action=secretaires">Secrétaires</a>
        <a href="index.php?action=rendezvous">Rendez-vous</a>
        <a href="index.php?action=dossiers">Dossiers</a>
    <?php endif; ?>

    <?php if($_SESSION['role'] === 'medecin'): ?>
        <a href="index.php?action=dossiers">Mes dossiers</a>
        <a href="index.php?action=rendezvous">Mes rendez-vous</a>
    <?php endif; ?>

    <?php if($_SESSION['role'] === 'patient'): ?>
        <a href="index.php?action=rendezvous">Mes rendez-vous</a>
    <?php endif; ?>

    <a href="index.php?action=logout">Logout</a>
</div>
