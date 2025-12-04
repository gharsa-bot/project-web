<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TBIBY</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body class="login-page">
  <div class="login-box">
    <h2>Connexion</h2>
    <form method="POST" action="index.php?action=login">
      <img src="logo.png" alt="" widhth="150" height="150">
      <h1>tbiby platform</h1>
      <input type="text" name="username" placeholder="Nom d'utilisateur" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <button type="submit">Se connecter</button>
    </form>
    <?php if(isset($error)): ?><p class="error"><?php echo $error; ?></p><?php endif; ?>
  </div>
</body>
</html>
