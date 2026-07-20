<?php
require_once __DIR__ . '/../includes/config.php'; requireAdmin();
$store = store('blog_posts'); $alert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'delete' && !empty($_POST['id'])) { $store->delete((int)$_POST['id']); $alert = displayAlert('Deleted.', 'success'); }
    elseif ($_POST['action'] === 'save') {
        $id = $_POST['id'] ?? null;
        $row = ['title' => sanitize($_POST['title']), 'slug' => sanitize($_POST['slug']) ?: strtolower(str_replace(' ', '-', sanitize($_POST['title']))), 'excerpt' => sanitize($_POST['excerpt']), 'content' => $_POST['content'], 'category' => sanitize($_POST['category']), 'is_published' => isset($_POST['is_published'])];
        if ($id) { $store->update((int)$id, $row); $alert = displayAlert('Updated.', 'success'); }
        else { $store->insert($row); $alert = displayAlert('Added.', 'success'); }
    }
}
$edit = !empty($_GET['edit']) ? $store->find((int)$_GET['edit']) : null;
$items = $store->all('created_at', 'DESC');
$sidebar_page = 'blog-admin.php';
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Blog</title><link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></head>
<body class="admin-body"><div class="admin-layout"><?php include __DIR__ . '/sidebar.php'; ?>
<main class="admin-main"><h1><?= $edit ? 'Edit Post' : 'Blog Posts' ?></h1><?= $alert ?>
<?php if ($edit || isset($_GET['add'])): ?>
<div class="admin-card"><h3><?= $edit ? 'Edit' : 'Add New' ?></h3>
<form method="POST"><input type="hidden" name="action" value="save"><input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
<div class="admin-form-grid">
<div class="form-group full-width"><label>Title *</label><input type="text" name="title" value="<?= sanitize($edit['title'] ?? '') ?>" required></div>
<div class="form-group"><label>Slug</label><input type="text" name="slug" value="<?= sanitize($edit['slug'] ?? '') ?>"></div>
<div class="form-group"><label>Category</label><select name="category"><?php foreach (['news','article','case-update'] as $c): ?><option <?= ($edit['category']??'')===$c?'selected':'' ?>><?= $c ?></option><?php endforeach; ?></select></div>
<div class="form-group full-width"><label>Excerpt</label><textarea name="excerpt" rows="2"><?= sanitize($edit['excerpt'] ?? '') ?></textarea></div>
<div class="form-group full-width"><label>Content (HTML)</label><textarea name="content" rows="12"><?= htmlspecialchars($edit['content'] ?? '') ?></textarea></div>
<div class="form-group"><label><input type="checkbox" name="is_published" <?= ($edit && ($edit['is_published']??true))||!$edit?'checked':'' ?>> Published</label></div>
</div>
<div class="admin-btn-group"><button type="submit" class="btn btn-primary"><?= $edit ? 'Update' : 'Add' ?></button><a href="blog-admin.php" class="btn btn-outline">Cancel</a></div>
</form></div>
<?php else: ?>
<a href="?add=1" class="btn btn-primary" style="margin-bottom:20px;"><i class="fas fa-plus"></i> Add</a>
<div class="admin-card"><table class="admin-table"><thead><tr><th>Title</th><th>Category</th><th>Published</th><th>Actions</th></tr></thead><tbody>
<?php if ($items): foreach ($items as $i): ?>
<tr><td><?= sanitize($i['title']) ?></td><td><?= ucfirst(str_replace('-',' ',$i['category'])) ?></td><td><?= ($i['is_published']??true)?'✅':'❌' ?></td>
<td class="table-actions"><a href="?edit=<?= $i['id'] ?>" class="btn btn-sm btn-outline"><i class="fas fa-edit"></i></a>
<form method="POST" style="display:inline;" onsubmit="return confirm('Delete?')"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $i['id'] ?>"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></form></td></tr>
<?php endforeach; else: ?><tr><td colspan="4" style="text-align:center;">No posts.</td></tr><?php endif; ?>
</tbody></table></div><?php endif; ?></main></div></body></html>
