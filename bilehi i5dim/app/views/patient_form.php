<?php if(!isset($_SESSION['role'])) header("Location: index.php?action=login"); ?>
<!DOCTYPE html><html><head><link rel="stylesheet" href="public/css/style.css"></head><body>
<?php include __DIR__ . '/partials/sidebar.php'; ?>
<div class="content">
  <?php $editing = isset($patient); ?>
  <h2><?php echo $editing ? 'Modifier Patient' : 'Nouveau Patient'; ?></h2>
  <form method="POST" action="index.php?action=<?php echo $editing ? 'patient_update' : 'patient_create'; ?>">
    <?php if($editing): ?><input type="hidden" name="id_patient" value="<?php echo $patient['id_patient']; ?>"><?php endif; ?>
    <label>Nom</label><input type="text" name="nom" value="<?php echo $editing ? $patient['nom'] : ''; ?>" required>
    <label>Prénom</label><input type="text" name="prenom" value="<?php echo $editing ? $patient['prenom'] : ''; ?>" required>
    <label>Date de naissance</label><input type="date" name="date_naissance" value="<?php echo $editing ? $patient['date_naissance'] : ''; ?>" required>
    <label>Adresse</label><input type="text" name="adresse" value="<?php echo $editing ? $patient['adresse'] : ''; ?>" required>
    <label>Téléphone</label><input type="number" name="telephone" value="<?php echo $editing ? $patient['telephone'] : ''; ?>" required>
    <label>Mail</label><input type="email" name="mail" value="<?php echo $editing ? $patient['mail'] : ''; ?>" required>
    <button type="submit"><?php echo $editing ? 'Mettre à jour' : 'Créer'; ?></button>
  </form>
</div>
</body></html>
