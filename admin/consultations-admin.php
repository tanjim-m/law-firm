<?php
require_once __DIR__ . '/../includes/config.php'; requireAdmin();
$store = store('consultations'); $alert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action'])) {
    if ($_POST['action'] === 'status' && !empty($_POST['id'])) {
        $item = $store->find((int)$_POST['id']);
        if ($item) { $item['status'] = $_POST['status']; $store->update((int)$_POST['id'], $item); $alert = displayAlert('Updated.', 'success'); }
    } elseif ($_POST['action'] === 'delete' && !empty($_POST['id'])) {
        $store->delete((int)$_POST['id']); $alert = displayAlert('Deleted.', 'success');
    }
}
$items = $store->all('created_at', 'DESC');
$sidebar_page = 'consultations-admin.php';
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Consultations</title><link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></head>
<body class="admin-body"><div class="admin-layout"><?php include __DIR__ . '/sidebar.php'; ?>
<main class="admin-main"><h1>Consultations</h1><?= $alert ?>
<div class="admin-card"><table class="admin-table"><thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead><tbody>
<?php if ($items): foreach ($items as $c): ?>
<tr><td><?= sanitize($c['name'] ?? '') ?></td><td><?= sanitize($c['email'] ?? '') ?></td><td><?= sanitize($c['phone'] ?? '') ?></td>
<td><?= ($c['preferred_date'] ?? '') . ' ' . ($c['preferred_time'] ?? '') ?></td>
<td><span class="status-badge status-<?= $c['status'] ?? 'pending' ?>"><?= ucfirst($c['status'] ?? 'pending') ?></span></td>
<td class="table-actions">
<form method="POST" style="display:inline;"><input type="hidden" name="action" value="status"><input type="hidden" name="id" value="<?= $c['id'] ?>">
<select name="status" onchange="this.form.submit()" style="font-size:0.8rem;padding:4px 8px;border-radius:4px;">
<option <?= ($c['status']??'pending')==='pending'?'selected':'' ?>>pending</option>
<option <?= ($c['status']??'')==='confirmed'?'selected':'' ?>>confirmed</option>
<option <?= ($c['status']??'')==='cancelled'?'selected':'' ?>>cancelled</option></select></form>
<form method="POST" style="display:inline;" onsubmit="return confirm('Delete?')"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $c['id'] ?>"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></form>
<?php if (!empty($c['message'])): ?><p style="font-size:0.85rem;color:var(--text-secondary);margin-top:4px;"><?= sanitize($c['message']) ?></p><?php endif; ?>
</td></tr>
<?php endforeach; else: ?><tr><td colspan="6" style="text-align:center;">No consultations.</td></tr><?php endif; ?>
</tbody></table></div></main></div></body></html>
