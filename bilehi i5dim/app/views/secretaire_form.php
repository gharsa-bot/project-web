<?php if(!isset($_SESSION['role'])) header("Location: index.php?action=login"); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<?php include __DIR__ . '/partials/sidebar.php'; ?>
<div class="content">
    <?php $editing = isset($secretaire); ?>
    <h2><?php echo $editing ? 'Modifier Secrétaire' : 'Nouvelle Secrétaire'; ?></h2>
    <form method="POST" action="index.php?action=<?php echo $editing ? 'secretaire_update' : 'secretaire_create'; ?>">
        <?php if($editing): ?>
            <input type="hidden" name="id_secretaire" value="<?php echo $secretaire['id_secretaire']; ?>">
        <?php endif; ?>

        <label>Nom</label>
        <input type="text" name="nom" value="<?php echo $editing ? $secretaire['nom'] : ''; ?>" required>

        <label>Prénom</label>
        <input type="text" name="prenom" value="<?php echo $editing ? $secretaire['prenom'] : ''; ?>" required>

        <label>Téléphone</label>
        <input type="number" name="telephone" value="<?php echo $editing ? $secretaire['telephone'] : ''; ?>" required>

        <label>Mail</label>
        <input type="email" name="mail" value="<?php echo $editing ? $secretaire['mail'] : ''; ?>" required>

        <button type="submit"><?php echo $editing ? 'Mettre à jour' : 'Créer'; ?></button>
    </form>
</div>
</body>
</html>
