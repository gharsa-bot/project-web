<?php if(!isset($_SESSION['role'])) header("Location: index.php?action=login"); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="public/css/style.css">
    <title><?php echo isset($medecin) ? 'Modifier Médecin' : 'Nouveau Médecin'; ?></title>
</head>
<body>
<?php include __DIR__ . '/partials/sidebar.php'; ?>
<div class="content">
    <?php $editing = isset($medecin); ?>
    <h2><?php echo $editing ? 'Modifier Médecin' : 'Nouveau Médecin'; ?></h2>
    <form method="POST" action="index.php?action=<?php echo $editing ? 'medecin_update' : 'medecin_create'; ?>">
        <?php if($editing): ?>
            <input type="hidden" name="id_medecin" value="<?php echo $medecin['id_medecin']; ?>">
        <?php endif; ?>
        <label>Nom</label><input type="text" name="nom" value="<?php echo $editing ? $medecin['nom'] : ''; ?>" required>
        <label>Prénom</label><input type="text" name="prenom" value="<?php echo $editing ? $medecin['prenom'] : ''; ?>" required>
        <label>Spécialité</label><input type="text" name="specialite" value="<?php echo $editing ? $medecin['specialite'] : ''; ?>" required>
        <label>Téléphone</label><input type="number" name="telephone" value="<?php echo $editing ? $medecin['telephone'] : ''; ?>" required>
        <label>Mail</label><input type="email" name="mail" value="<?php echo $editing ? $medecin['mail'] : ''; ?>" required>
        <button type="submit"><?php echo $editing ? 'Mettre à jour' : 'Créer'; ?></button>
    </form>
</div>
</body>
</html>
