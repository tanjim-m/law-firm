<?php
require_once __DIR__ . '/../includes/config.php'; requireAdmin();
$store = store('contact_messages'); $alert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action'])) {
    if ($_POST['action'] === 'mark_read' && !empty($_POST['id'])) {
        $item = $store->find((int)$_POST['id']);
        if ($item) { $item['is_read'] = true; $store->update((int)$_POST['id'], $item); $alert = displayAlert('Marked as read.', 'success'); }
    } elseif ($_POST['action'] === 'delete' && !empty($_POST['id'])) {
        $store->delete((int)$_POST['id']); $alert = displayAlert('Deleted.', 'success');
    }
}
$items = $store->all('created_at', 'DESC');
$sidebar_page = 'messages-admin.php';
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Messages</title><link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></head>
<body class="admin-body"><div class="admin-layout"><?php include __DIR__ . '/sidebar.php'; ?>
<main class="admin-main"><h1>Messages</h1><?= $alert ?>
<div class="admin-card"><table class="admin-table"><thead><tr><th>Status</th><th>Name</th><th>Email</th><th>Subject</th><th>Date</th><th>Actions</th></tr></thead><tbody>
<?php if ($items): foreach ($items as $m): ?>
<tr style="<?= !($m['is_read'] ?? true) ? 'font-weight:600;' : '' ?>">
<td><?= ($m['is_read'] ?? true) ? '📖' : '🔵' ?></td>
<td><?= sanitize($m['name'] ?? '') ?></td><td><?= sanitize($m['email'] ?? '') ?></td><td><?= sanitize($m['subject'] ?? 'N/A') ?></td>
<td><?= date('M j, Y', strtotime($m['created_at'] ?? 'now')) ?></td>
<td class="table-actions">
<?php if (!($m['is_read'] ?? true)): ?><form method="POST" style="display:inline;"><input type="hidden" name="action" value="mark_read"><input type="hidden" name="id" value="<?= $m['id'] ?>"><button class="btn btn-sm btn-success"><i class="fas fa-check"></i></button></form><?php endif; ?>
<a href="?view=<?= $m['id'] ?>" class="btn btn-sm btn-outline"><i class="fas fa-eye"></i></a>
<form method="POST" style="display:inline;" onsubmit="return confirm('Delete?')"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $m['id'] ?>"><button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></form>
</td></tr>
<?php endforeach; else: ?><tr><td colspan="6" style="text-align:center;">No messages.</td></tr><?php endif; ?>
</tbody></table></div>
<?php if (!empty($_GET['view'])): $msg = $store->find((int)$_GET['view']);
if ($msg): if (!($msg['is_read'] ?? true)) { $msg['is_read'] = true; $store->update((int)$_GET['view'], $msg); } ?>
<div class="admin-card" style="margin-top:24px;"><h3>Message from <?= sanitize($msg['name']) ?></h3>
<p><strong>Email:</strong> <?= sanitize($msg['email']) ?></p><p><strong>Phone:</strong> <?= sanitize($msg['phone'] ?? 'N/A') ?></p>
<p><strong>Subject:</strong> <?= sanitize($msg['subject'] ?? 'N/A') ?></p>
<div style="background:var(--bg-secondary);padding:16px;border-radius:8px;margin-top:12px;"><?= nl2br(sanitize($msg['message'] ?? '')) ?></div></div>
<?php endif; endif; ?>
</main></div></body></html>
