<?php if(!isset($_SESSION['role'])) header("Location: index.php?action=login"); ?>
<!DOCTYPE html><html><head><link rel="stylesheet" href="public/css/style.css"></head><body>
<?php include __DIR__ . '/partials/sidebar.php'; ?>
<div class="content">
  <h2>Patients <a class="btn" href="index.php?action=patient_new">+ Nouveau</a></h2>
  <table>
    <thead><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Téléphone</th><th>Mail</th><th>Actions</th></tr></thead>
    <tbody>
      <?php foreach($patients as $p): ?>
        <tr>
          <td><?php echo $p['id_patient']; ?></td>
          <td><?php echo $p['nom']; ?></td>
          <td><?php echo $p['prenom']; ?></td>
          <td><?php echo $p['telephone']; ?></td>
          <td><?php echo $p['mail']; ?></td>
          <td>
            <a href="index.php?action=patient_edit&id=<?php echo $p['id_patient']; ?>">Edit</a> |
            <a href="index.php?action=patient_delete&id=<?php echo $p['id_patient']; ?>" onclick="return confirm('Supprimer ?')">Del</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body></html>
