<?php 
if(!isset($_SESSION['role'])) header("Location: index.php?action=login");

$editing = isset($d); // $d vient du controller edit()
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $editing ? 'Modifier' : 'Nouveau' ?> Dossier Médical</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<?php include __DIR__ . '/partials/sidebar.php'; ?>

<div class="content">

    <h2><?= $editing ? 'Modifier' : 'Nouveau' ?> Dossier Médical</h2>

    <form method="POST" action="index.php?action=<?= $editing ? 'dossier_update' : 'dossier_create' ?>">

        <?php if($editing): ?>
            <input type="hidden" name="id_dossier" value="<?= $d['id_dossier'] ?>">
        <?php endif; ?>

        <label>Diagnostic :</label>
        <textarea name="diagnostic" required><?= $editing ? $d['diagnostic'] : '' ?></textarea>

        <label>Traitement :</label>
        <textarea name="traitement" required><?= $editing ? $d['traitement'] : '' ?></textarea>

        <label>Observation :</label>
        <textarea name="observation"><?= $editing ? $d['observation'] : '' ?></textarea>

        <label>Patient :</label>
        <select name="id_patient" required>
            <?php foreach($patients as $p): ?>
                <option value="<?= $p['id_patient'] ?>"
                    <?= $editing && $p['id_patient'] == $d['id_patient'] ? 'selected' : '' ?>>
                    <?= $p['nom'] . ' ' . $p['prenom'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Médecin :</label>
        <select name="id_medecin" required>
            <?php foreach($medecins as $m): ?>
                <option value="<?= $m['id_medecin'] ?>"
                    <?= $editing && $m['id_medecin'] == $d['id_medecin'] ? 'selected' : '' ?>>
                    <?= $m['nom'] . ' ' . $m['prenom'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit"><?= $editing ? 'Mettre à jour' : 'Créer le dossier' ?></button>
    </form>

</div>

</body>
</html>
