<?php
require_once __DIR__ . '/../includes/config.php'; requireAdmin();
$store = store('practice_areas'); $alert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'delete' && !empty($_POST['id'])) { $store->delete((int)$_POST['id']); $alert = displayAlert('Deleted.', 'success'); }
    elseif ($action === 'save') {
        $id = $_POST['id'] ?? null;
        $row = ['title' => sanitize($_POST['title']), 'description' => sanitize($_POST['description']), 'services' => sanitize($_POST['services']), 'display_order' => (int)($_POST['display_order'] ?? 0), 'icon' => sanitize($_POST['icon'] ?? 'fa-balance-scale')];
        if ($id) { $store->update((int)$id, $row); $alert = displayAlert('Updated.', 'success'); }
        else { $store->insert($row); $alert = displayAlert('Added.', 'success'); }
    }
}
$edit = !empty($_GET['edit']) ? $store->find((int)$_GET['edit']) : null;
$items = $store->all('display_order');
$sidebar_page = 'practice-areas-admin.php';
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Practice Areas</title><link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></head>
<body class="admin-body"><div class="admin-layout"><?php include __DIR__ . '/sidebar.php'; ?>
<main class="admin-main"><h1><?= $edit ? 'Edit' : 'Practice Areas' ?></h1><?= $alert ?>
<?php if ($edit || isset($_GET['add'])): ?>
<div class="admin-card"><h3><?= $edit ? 'Edit: '.sanitize($edit['title']) : 'Add New' ?></h3>
<form method="POST"><input type="hidden" name="action" value="save"><input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
<div class="admin-form-grid">
<div class="form-group"><label>Title *</label><input type="text" name="title" value="<?= sanitize($edit['title'] ?? '') ?>" required></div>
<div class="form-group"><label>Icon</label><input type="text" name="icon" value="<?= sanitize($edit['icon'] ?? 'fa-balance-scale') ?>"></div>
<div class="form-group full-width"><label>Description</label><textarea name="description" rows="3"><?= sanitize($edit['description'] ?? '') ?></textarea></div>
<div class="form-group full-width"><label>Services</label><textarea name="services" rows="5"><?= sanitize($edit['services'] ?? '') ?></textarea></div>
<div class="form-group"><label>Order</label><input type="number" name="display_order" value="<?= $edit['display_order'] ?? 0 ?>"></div>
</div>
<div class="admin-btn-group"><button type="submit" class="btn btn-primary"><?= $edit ? 'Update' : 'Add' ?></button><a href="practice-areas-admin.php" class="btn btn-outline">Cancel</a></div>
</form></div>
<?php else: ?>
<a href="?add=1" class="btn btn-primary" style="margin-bottom:20px;"><i class="fas fa-plus"></i> Add</a>
<div class="admin-card"><table class="admin-table"><thead><tr><th>Icon</th><th>Title</th><th>Actions</th></tr></thead><tbody>
<?php if ($items): foreach ($items as $i): ?>
<tr><td><i class="fas <?= sanitize($i['icon'] ?: 'fa-balance-scale') ?>"></i></td><td><?= sanitize($i['title']) ?></td>
<td class="table-actions"><a href="?edit=<?= $i['id'] ?>" class="btn btn-sm btn-outline"><i class="fas fa-edit"></i></a>
<form method="POST" style="display:inline;" onsubmit="return confirm('Delete?')"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $i['id'] ?>"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></form></td></tr>
<?php endforeach; else: ?><tr><td colspan="3" style="text-align:center;">No items.</td></tr><?php endif; ?>
</tbody></table></div>
<?php endif; ?>
</main></div></body></html>
