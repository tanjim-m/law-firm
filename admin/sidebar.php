<?php
$sidebar_page = $sidebar_page ?? basename($_SERVER['PHP_SELF']);
$nav_items = [
    'index.php' => ['Dashboard', 'fa-gauge-high'],
    'attorneys-admin.php' => ['Attorneys', 'fa-user-tie'],
    'practice-areas-admin.php' => ['Practice Areas', 'fa-scale-balanced'],
    'case-results-admin.php' => ['Case Results', 'fa-trophy'],
    'testimonials-admin.php' => ['Testimonials', 'fa-star'],
    'consultations-admin.php' => ['Consultations', 'fa-calendar-check'],
    'blog-admin.php' => ['Blog Posts', 'fa-newspaper'],
    'messages-admin.php' => ['Messages', 'fa-envelope'],
    'settings-admin.php' => ['Settings', 'fa-gear'],
];
?>
<aside class="admin-sidebar">
    <div class="admin-sidebar-header">
        <h2><i class="fas fa-scale-balanced"></i> Taj Law Admin</h2>
        <p style="font-size:0.8rem;">Logged in as: <?= $_SESSION['admin_username'] ?? 'admin' ?></p>
    </div>
    <nav class="admin-nav">
        <?php foreach ($nav_items as $file => $item):
            $active = $sidebar_page === $file ? 'active' : '';
        ?>
            <a href="<?= ADMIN_URL . '/' . $file ?>" class="<?= $active ?>">
                <i class="fas <?= $item[1] ?>"></i> <?= $item[0] ?>
            </a>
        <?php endforeach; ?>
        <a href="<?= ADMIN_URL ?>/logout.php" style="border-top:1px solid var(--gray-700);margin-top:12px;padding-top:16px;">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </nav>
</aside>
