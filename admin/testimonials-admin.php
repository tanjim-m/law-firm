<?php
require_once __DIR__ . '/../includes/config.php'; requireAdmin();
$store = store('testimonials'); $alert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'delete' && !empty($_POST['id'])) { $store->delete((int)$_POST['id']); $alert = displayAlert('Deleted.', 'success'); }
    elseif ($action === 'save') {
        $id = $_POST['id'] ?? null;
        $row = ['client_name' => sanitize($_POST['client_name']), 'review' => sanitize($_POST['review']), 'rating' => (float)($_POST['rating'] ?? 5), 'display_order' => (int)($_POST['display_order'] ?? 0), 'is_approved' => isset($_POST['is_approved'])];
        if ($id) { $store->update((int)$id, $row); $alert = displayAlert('Updated.', 'success'); }
        else { $store->insert($row); $alert = displayAlert('Added.', 'success'); }
    } elseif ($action === 'approve' && !empty($_POST['id'])) {
        $item = $store->find((int)$_POST['id']);
        if ($item) { $item['is_approved'] = true; $store->update((int)$_POST['id'], $item); $alert = displayAlert('Approved.', 'success'); }
    }
}
$edit = !empty($_GET['edit']) ? $store->find((int)$_GET['edit']) : null;
$items = $store->all('display_order');
$sidebar_page = 'testimonials-admin.php';
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Testimonials</title><link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></head>
<body class="admin-body"><div class="admin-layout"><?php include __DIR__ . '/sidebar.php'; ?>
<main class="admin-main"><h1><?= $edit ? 'Edit' : 'Testimonials' ?></h1><?= $alert ?>
<?php if ($edit || isset($_GET['add'])): ?>
<div class="admin-card"><h3><?= $edit ? 'Edit' : 'Add New' ?></h3>
<form method="POST"><input type="hidden" name="action" value="save"><input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
<div class="admin-form-grid">
<div class="form-group"><label>Client Name *</label><input type="text" name="client_name" value="<?= sanitize($edit['client_name'] ?? '') ?>" required></div>
<div class="form-group"><label>Rating (1-5)</label><input type="number" name="rating" min="1" max="5" step="0.1" value="<?= $edit['rating'] ?? 5 ?>"></div>
<div class="form-group full-width"><label>Review *</label><textarea name="review" rows="4" required><?= sanitize($edit['review'] ?? '') ?></textarea></div>
<div class="form-group"><label>Order</label><input type="number" name="display_order" value="<?= $edit['display_order'] ?? 0 ?>"></div>
<div class="form-group"><label><input type="checkbox" name="is_approved" <?= ($edit && ($edit['is_approved'] ?? true)) ? 'checked' : '' ?>> Approved</label></div>
</div>
<div class="admin-btn-group"><button type="submit" class="btn btn-primary"><?= $edit ? 'Update' : 'Add' ?></button><a href="testimonials-admin.php" class="btn btn-outline">Cancel</a></div>
</form></div>
<?php else: ?>
<a href="?add=1" class="btn btn-primary" style="margin-bottom:20px;"><i class="fas fa-plus"></i> Add</a>
<div class="admin-card"><table class="admin-table"><thead><tr><th>Client</th><th>Rating</th><th>Approved</th><th>Actions</th></tr></thead><tbody>
<?php if ($items): foreach ($items as $i): ?>
<tr><td><?= sanitize($i['client_name']) ?></td><td><?= str_repeat('★', (int)$i['rating']) ?></td><td><?= ($i['is_approved'] ?? true) ? '✅' : '⏳' ?></td>
<td class="table-actions"><a href="?edit=<?= $i['id'] ?>" class="btn btn-sm btn-outline"><i class="fas fa-edit"></i></a>
<form method="POST" style="display:inline;" onsubmit="return confirm('Delete?')"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $i['id'] ?>"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></form></td></tr>
<?php endforeach; else: ?><tr><td colspan="4" style="text-align:center;">No items.</td></tr><?php endif; ?>
</tbody></table></div><?php endif; ?></main></div></body></html>
