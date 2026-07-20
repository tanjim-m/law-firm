<?php
require_once __DIR__ . '/../includes/config.php';

if (isAdminLoggedIn()) {
    redirect(ADMIN_URL . '/index.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $admins = store('admins');
    $admin = $admins->find($username);
    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $admin['username'];
        redirect(ADMIN_URL . '/index.php');
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Taj Law Firm</title>
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="admin-login">
    <div class="admin-login-card">
        <h2><i class="fas fa-scale-balanced" style="color:var(--primary);"></i> Taj Law Firm</h2>
        <p style="text-align:center;color:var(--text-secondary);margin-bottom:24px;">Admin Panel Login</p>
        <?php if ($error): ?>
            <div style="background:#fee2e2;color:#991b1b;padding:12px;border-radius:6px;margin-bottom:16px;"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-lg" style="width:100%;">Login</button>
        </form>
        <p style="text-align:center;margin-top:16px;font-size:0.85rem;color:var(--text-muted);">
            Default: admin / password
        </p>
    </div>
</body>
</html>
