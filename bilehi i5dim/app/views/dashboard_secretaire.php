<?php if(!isset($_SESSION['role'])) header("Location: index.php?action=login"); ?>
<!DOCTYPE html><html><head><link rel="stylesheet" href="public/css/style.css"></head><body>
<?php include __DIR__ . '/partials/sidebar.php'; ?>
<div class="content"><h1>Dashboard Secrétaire</h1><p>Bienvenue secrétaire.</p></div>
</body></html>
