<?php if(!isset($_SESSION['role'])) header("Location: index.php?action=login"); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Liste des Médecins</title>
</head>
<body>
<?php include __DIR__ . '/partials/sidebar.php'; ?>
<div class="content">
    <h2>Médecins <a class="btn" href="index.php?action=medecin_new">+ Nouveau</a></h2>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Nom</th><th>Prénom</th><th>Spécialité</th><th>Téléphone</th><th>Mail</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($medecins as $m): ?>
                <tr>
                    <td><?php echo $m['id_medecin']; ?></td>
                    <td><?php echo $m['nom']; ?></td>
                    <td><?php echo $m['prenom']; ?></td>
                    <td><?php echo $m['specialite']; ?></td>
                    <td><?php echo $m['telephone']; ?></td>
                    <td><?php echo $m['mail']; ?></td>
                    <td>
                        <a href="index.php?action=medecin_edit&id=<?php echo $m['id_medecin']; ?>">Edit</a> |
                        <a href="index.php?action=medecin_delete&id=<?php echo $m['id_medecin']; ?>" onclick="return confirm('Supprimer ?')">Del</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
