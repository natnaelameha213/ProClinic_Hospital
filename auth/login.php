<?php
require_once __DIR__ . '/../config/config.php';

if (isset($_SESSION['user'])) {
    header('Location: ' . base_url('index.php'));
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $s = $pdo->prepare("SELECT * FROM users WHERE email = ? AND status = 'active'");
    $s->execute([$email]);
    $u = $s->fetch();
    if ($u && password_verify($password, $u['password'])) {
        $_SESSION['user'] = [
            'id'    => $u['id'],
            'name'  => $u['name'],
            'email' => $u['email'],
            'role'  => $u['role'],
        ];
        header('Location: ' . base_url('index.php'));
        exit;
    }
    $error = 'Invalid email or password.';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>ProClinic Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body class="login-page">
<div class="card login-card p-4">
  <h2>🏥 ProClinic</h2>
  <p class="text-muted">Hospital & Clinic Management</p>
  <?php if ($error): ?>
  <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <form method="post">
    <label class="form-label">Email</label>
    <input name="email" type="email" value="admin@proclinic.local" class="form-control mb-3" required autofocus>
    <label class="form-label">Password</label>
    <input name="password" type="password" value="Admin123!" class="form-control mb-3" required>
    <button class="btn btn-primary w-100" type="submit">Login</button>
  </form>
  <small class="text-muted mt-3 d-block">Demo: admin@proclinic.local / Admin123!</small>
</div>
</body>
</html>
