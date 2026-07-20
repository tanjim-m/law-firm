<?php
require_once __DIR__ . '/../includes/config.php'; requireAdmin();
$store = store('attorneys'); $alert = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'delete' && !empty($_POST['id'])) {
        $store->delete((int)$_POST['id']);
        $alert = displayAlert('Attorney deleted.', 'success');
    } elseif ($action === 'save') {
        $id = $_POST['id'] ?? null;
        $row = [
            'full_name' => sanitize($_POST['full_name']), 'position' => sanitize($_POST['position']),
            'bio' => sanitize($_POST['bio']), 'education' => sanitize($_POST['education']),
            'experience' => sanitize($_POST['experience']), 'licenses' => sanitize($_POST['licenses']),
            'specialties' => sanitize($_POST['specialties']), 'awards' => sanitize($_POST['awards']),
            'email' => sanitize($_POST['email']), 'phone' => sanitize($_POST['phone']),
            'linkedin' => sanitize($_POST['linkedin']), 'display_order' => (int)($_POST['display_order'] ?? 0),
            'photo' => sanitize($_POST['photo'] ?? 'default-attorney.jpg'),
        ];
        if ($id) {
            $store->update((int)$id, $row);
            $alert = displayAlert('Attorney updated.', 'success');
        } else {
            $store->insert($row);
            $alert = displayAlert('Attorney added.', 'success');
        }
    }
}

$edit = null;
if (!empty($_GET['edit'])) $edit = $store->find((int)$_GET['edit']);
$attorneys = $store->all('display_order');
$sidebar_page = 'attorneys-admin.php';
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Manage Attorneys</title><link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></head>
<body class="admin-body"><div class="admin-layout">
<?php include __DIR__ . '/sidebar.php'; ?>
<main class="admin-main">
<h1><?= $edit ? 'Edit Attorney' : 'Manage Attorneys' ?></h1>
<?= $alert ?>
<?php if ($edit || isset($_GET['add'])): ?>
<div class="admin-card">
    <h3><?= $edit ? 'Edit: ' . sanitize($edit['full_name']) : 'Add New Attorney' ?></h3>
    <form method="POST">
        <input type="hidden" name="action" value="save">
        <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
        <div class="admin-form-grid">
            <div class="form-group"><label>Full Name *</label><input type="text" name="full_name" value="<?= sanitize($edit['full_name'] ?? '') ?>" required></div>
            <div class="form-group"><label>Position</label><input type="text" name="position" value="<?= sanitize($edit['position'] ?? '') ?>"></div>
            <div class="form-group full-width"><label>Biography</label><textarea name="bio" rows="4"><?= sanitize($edit['bio'] ?? '') ?></textarea></div>
            <div class="form-group"><label>Education</label><textarea name="education" rows="3"><?= sanitize($edit['education'] ?? '') ?></textarea></div>
            <div class="form-group"><label>Experience</label><input type="text" name="experience" value="<?= sanitize($edit['experience'] ?? '') ?>"></div>
            <div class="form-group"><label>Licenses</label><textarea name="licenses" rows="3"><?= sanitize($edit['licenses'] ?? '') ?></textarea></div>
            <div class="form-group"><label>Awards</label><textarea name="awards" rows="3"><?= sanitize($edit['awards'] ?? '') ?></textarea></div>
            <div class="form-group"><label>Specialties</label><input type="text" name="specialties" value="<?= sanitize($edit['specialties'] ?? '') ?>"></div>
            <div class="form-group"><label>Email</label><input type="email" name="email" value="<?= sanitize($edit['email'] ?? '') ?>"></div>
            <div class="form-group"><label>Phone</label><input type="text" name="phone" value="<?= sanitize($edit['phone'] ?? '') ?>"></div>
            <div class="form-group"><label>LinkedIn</label><input type="text" name="linkedin" value="<?= sanitize($edit['linkedin'] ?? '') ?>"></div>
            <div class="form-group"><label>Photo</label><input type="text" name="photo" value="<?= sanitize($edit['photo'] ?? '') ?>"></div>
            <div class="form-group"><label>Order</label><input type="number" name="display_order" value="<?= $edit['display_order'] ?? 0 ?>"></div>
        </div>
        <div class="admin-btn-group">
            <button type="submit" class="btn btn-primary"><?= $edit ? 'Update' : 'Add' ?></button>
            <a href="attorneys-admin.php" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
<?php else: ?>
<a href="?add=1" class="btn btn-primary" style="margin-bottom:20px;"><i class="fas fa-plus"></i> Add Attorney</a>
<div class="admin-card">
    <table class="admin-table">
        <thead><tr><th>Name</th><th>Position</th><th>Email</th><th>Actions</th></tr></thead>
        <tbody>
        <?php if ($attorneys): foreach ($attorneys as $a): ?>
            <tr>
                <td><?= sanitize($a['full_name']) ?></td>
                <td><?= sanitize($a['position']) ?></td>
                <td><?= sanitize($a['email']) ?></td>
                <td class="table-actions">
                    <a href="?edit=<?= $a['id'] ?>" class="btn btn-sm btn-outline"><i class="fas fa-edit"></i></a>
                    <form method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                        <input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $a['id'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; else: ?><tr><td colspan="4" style="text-align:center;">No attorneys.</td></tr><?php endif; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
</main></div></body></html>
