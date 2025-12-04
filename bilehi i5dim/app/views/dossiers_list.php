<?php 
if(!isset($_SESSION['role'])) header("Location: index.php?action=login");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des dossiers</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<?php include __DIR__ . '/partials/sidebar.php'; ?>

<div class="content">
    <h2>Dossiers Médicaux 
        <a class="btn" href="index.php?action=dossier_new">+ Nouveau dossier</a>
    </h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Diagnostic</th>
                <th>Traitement</th>
                <th>Observation</th>
                <th>ID Patient</th>
                <th>ID Médecin</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach($dossiers as $d): ?>
            <tr>
                <td><?= $d['id_dossier'] ?></td>
                <td><?= $d['diagnostic'] ?></td>
                <td><?= $d['traitement'] ?></td>
                <td><?= $d['observation'] ?></td>
                <td><?= $d['id_patient'] ?></td>
                <td><?= $d['id_medecin'] ?></td>

                <td>
                    <a href="index.php?action=dossier_edit&id=<?= $d['id_dossier'] ?>">Modifier</a> |
                    <a href="index.php?action=dossier_delete&id=<?= $d['id_dossier'] ?>" 
                       onclick="return confirm('Supprimer ce dossier ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>

</div>

</body>
</html>
