<?php require_once __DIR__ . '/../includes/config.php'; requireAdmin(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Taj Law Firm</title>
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="admin-body">
<div class="admin-layout">
    <?php $sidebar_page = 'index.php'; include __DIR__ . '/sidebar.php'; ?>
    <main class="admin-main">
        <h1>Dashboard</h1>
        <?php
        $stats = [
            ['label' => 'Attorneys', 'value' => store('attorneys')->count(), 'icon' => 'fa-user-tie', 'color' => 'var(--cyan)'],
            ['label' => 'Practice Areas', 'value' => store('practice_areas')->count(), 'icon' => 'fa-scale-balanced', 'color' => 'var(--orange)'],
            ['label' => 'Consultations', 'value' => store('consultations')->countWhere('status', 'pending'), 'icon' => 'fa-calendar-check', 'color' => '#f59e0b'],
            ['label' => 'Messages', 'value' => store('contact_messages')->countWhere('is_read', false), 'icon' => 'fa-envelope', 'color' => '#10b981'],
        ];
        ?>
        <div class="admin-stats">
            <?php foreach ($stats as $stat): ?>
                <div class="admin-stat">
                    <div style="display:flex;justify-content:space-between;align-items:center;">
                        <div class="admin-stat-number"><?= $stat['value'] ?></div>
                        <i class="fas <?= $stat['icon'] ?>" style="font-size:1.5rem;opacity:0.2;"></i>
                    </div>
                    <div class="admin-stat-label"><?= $stat['label'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="grid-2">
            <div class="admin-card">
                <h3>Recent Consultations</h3>
                <table class="admin-table">
                    <thead><tr><th>Name</th><th>Email</th><th>Date</th><th>Status</th></tr></thead>
                    <tbody>
                    <?php
                    $consults = array_slice(store('consultations')->all('created_at', 'DESC'), 0, 5);
                    if ($consults):
                        foreach ($consults as $c): ?>
                            <tr>
                                <td><?= sanitize($c['name'] ?? '') ?></td>
                                <td><?= sanitize($c['email'] ?? '') ?></td>
                                <td><?= $c['preferred_date'] ?? 'N/A' ?></td>
                                <td><span class="status-badge status-<?= $c['status'] ?? 'pending' ?>"><?= ucfirst($c['status'] ?? 'pending') ?></span></td>
                            </tr>
                        <?php endforeach;
                    else: ?>
                        <tr><td colspan="4" style="text-align:center;color:var(--text-muted);">No consultations yet.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="admin-card">
                <h3>Recent Messages</h3>
                <table class="admin-table">
                    <thead><tr><th>Name</th><th>Subject</th><th>Date</th></tr></thead>
                    <tbody>
                    <?php
                    $msgs = array_slice(store('contact_messages')->all('created_at', 'DESC'), 0, 5);
                    if ($msgs):
                        foreach ($msgs as $m): ?>
                            <tr>
                                <td><?= sanitize($m['name'] ?? '') ?></td>
                                <td><?= sanitize($m['subject'] ?? 'N/A') ?></td>
                                <td><?= date('M j, Y', strtotime($m['created_at'] ?? 'now')) ?></td>
                            </tr>
                        <?php endforeach;
                    else: ?>
                        <tr><td colspan="3" style="text-align:center;color:var(--text-muted);">No messages yet.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</body>
</html>
