<?php 
if(!isset($_SESSION['role'])) header("Location: index.php?action=login");

$editing = isset($r);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $editing ? 'Modifier' : 'Nouveau' ?> Rendez-vous</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<?php include __DIR__ . '/partials/sidebar.php'; ?>

<div class="content">

    <h2><?= $editing ? 'Modifier' : 'Nouveau' ?> Rendez-vous</h2>

    <form method="POST" action="index.php?action=<?= $editing ? 'rendez_update' : 'rendez_create' ?>">

        <?php if($editing): ?>
            <input type="hidden" name="id_rdv" value="<?= $r['id_rdv'] ?>">
        <?php endif; ?>

        <label>Date :</label>
        <input type="date" name="date_rdv" value="<?= $editing ? $r['date_rdv'] : '' ?>" required>

        <label>Heure :</label>
        <input type="time" name="heure_rdv" value="<?= $editing ? $r['heure_rdv'] : '' ?>" required>

        <label>Médecin :</label>
        <select name="id_medecin" required>
            <?php foreach($medecins as $m): ?>
                <option value="<?= $m['id_medecin'] ?>"
                    <?= $editing && $m['id_medecin'] == $r['id_medecin'] ? 'selected' : '' ?>>
                    <?= $m['nom'] . ' ' . $m['prenom'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Secrétaire :</label>
        <select name="id_secretaire" required>
            <?php foreach($secretaires as $s): ?>
                <option value="<?= $s['id_secretaire'] ?>"
                    <?= $editing && $s['id_secretaire'] == $r['id_secretaire'] ? 'selected' : '' ?>>
                    <?= $s['nom'] . ' ' . $s['prenom'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>État :</label>
        <input type="text" name="etat" value="<?= $editing ? $r['etat'] : 'non payer' ?>" required>

        <label>Montant :</label>
        <input type="number" name="montant" value="<?= $editing ? $r['montant'] : '' ?>" required>

        <button type="submit"><?= $editing ? 'Mettre à jour' : 'Créer' ?></button>
    </form>

</div>

</body>
</html>
