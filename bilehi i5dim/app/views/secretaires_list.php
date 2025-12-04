<?php if(!isset($_SESSION['role'])) header("Location: index.php?action=login"); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<?php include __DIR__ . '/partials/sidebar.php'; ?>
<div class="content">
    <h2>Secrétaires <a class="btn" href="index.php?action=secretaire_new">+ Nouveau</a></h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Mail</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($secretaires as $s): ?>
                <tr>
                    <td><?php echo $s['id_secretaire']; ?></td>
                    <td><?php echo $s['nom']; ?></td>
                    <td><?php echo $s['prenom']; ?></td>
                    <td><?php echo $s['telephone']; ?></td>
                    <td><?php echo $s['mail']; ?></td>
                    <td>
                        <a href="index.php?action=secretaire_edit&id=<?php echo $s['id_secretaire']; ?>">Edit</a> |
                        <a href="index.php?action=secretaire_delete&id=<?php echo $s['id_secretaire']; ?>" onclick="return confirm('Supprimer ?')">Del</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>

