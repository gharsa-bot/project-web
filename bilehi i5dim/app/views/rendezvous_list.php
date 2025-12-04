<?php 
if(!isset($_SESSION['role'])) header("Location: index.php?action=login");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des rendez-vous</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<?php include __DIR__ . '/partials/sidebar.php'; ?>

<div class="content">

    <h2>Rendez-vous
        <a class="btn" href="index.php?action=rendez_new">+ Nouveau</a>
    </h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date RDV</th>
                <th>Heure RDV</th>
                <th>ID Médecin</th>
                <th>ID Secrétaire</th>
                <th>État</th>
                <th>Montant</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach($rendez as $rdv): ?>
            <tr>
                <td><?= $rdv['id_rdv'] ?></td>
                <td><?= $rdv['date_rdv'] ?></td>
                <td><?= $rdv['heure_rdv'] ?></td>
                <td><?= $rdv['id_medecin'] ?></td>
                <td><?= $rdv['id_secretaire'] ?></td>
                <td><?= $rdv['etat'] ?></td>
                <td><?= $rdv['montant'] ?></td>

                <td>
                    <a href="index.php?action=rendez_edit&id=<?= $rdv['id_rdv'] ?>">Modifier</a> |
                    <a href="index.php?action=rendez_delete&id=<?= $rdv['id_rdv'] ?>"
                       onclick="return confirm('Supprimer ce rendez-vous ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>

</div>

</body>
</html>
