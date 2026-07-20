<?php
require_once __DIR__ . '/../includes/config.php'; requireAdmin();
$alert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $store = store('settings');
    foreach ($_POST as $key => $value) {
        if (str_starts_with($key, 'setting_')) {
            $setting_key = substr($key, 8);
            $existing = $store->find($setting_key);
            if ($existing) {
                $existing['value'] = $value;
                $store->update($setting_key, $existing);
            } else {
                $store->insert(['id' => $setting_key, 'value' => $value]);
            }
        }
    }
    $alert = displayAlert('Settings saved.', 'success');
}
$settings = store('settings')->all();
$s = [];
foreach ($settings as $row) $s[$row['id']] = $row['value'] ?? '';
$sidebar_page = 'settings-admin.php';
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Settings</title><link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></head>
<body class="admin-body"><div class="admin-layout"><?php include __DIR__ . '/sidebar.php'; ?>
<main class="admin-main"><h1>Site Settings</h1><?= $alert ?>
<div class="admin-card"><form method="POST">
<h3>Firm Information</h3>
<div class="admin-form-grid">
<div class="form-group"><label>Firm Name</label><input type="text" name="setting_firm_name" value="<?= sanitize($s['firm_name'] ?? '') ?>"></div>
<div class="form-group"><label>Tagline</label><input type="text" name="setting_tagline" value="<?= sanitize($s['tagline'] ?? '') ?>"></div>
<div class="form-group"><label>Year Established</label><input type="text" name="setting_year_established" value="<?= sanitize($s['year_established'] ?? '') ?>"></div>
<div class="form-group"><label>Phone</label><input type="text" name="setting_phone" value="<?= sanitize($s['phone'] ?? '') ?>"></div>
<div class="form-group"><label>Email</label><input type="email" name="setting_email" value="<?= sanitize($s['email'] ?? '') ?>"></div>
<div class="form-group"><label>Office Hours</label><input type="text" name="setting_office_hours" value="<?= sanitize($s['office_hours'] ?? '') ?>"></div>
<div class="form-group full-width"><label>Address</label><input type="text" name="setting_address" value="<?= sanitize($s['address'] ?? '') ?>"></div>
</div>
<h3 style="margin-top:24px;">About</h3>
<div class="admin-form-grid">
<div class="form-group full-width"><label>Introduction</label><textarea name="setting_about_intro" rows="3"><?= sanitize($s['about_intro'] ?? '') ?></textarea></div>
<div class="form-group full-width"><label>Mission</label><textarea name="setting_mission" rows="2"><?= sanitize($s['mission'] ?? '') ?></textarea></div>
<div class="form-group"><label>Values</label><input type="text" name="setting_values" value="<?= sanitize($s['values'] ?? '') ?>"></div>
<div class="form-group full-width"><label>Why Choose Us</label><textarea name="setting_why_choose_us" rows="2"><?= sanitize($s['why_choose_us'] ?? '') ?></textarea></div>
<div class="form-group full-width"><label>History</label><textarea name="setting_history" rows="3"><?= sanitize($s['history'] ?? '') ?></textarea></div>
</div>
<h3 style="margin-top:24px;">Social & Calendar</h3>
<div class="admin-form-grid">
<div class="form-group"><label>Facebook</label><input type="text" name="setting_facebook" value="<?= sanitize($s['facebook'] ?? '') ?>"></div>
<div class="form-group"><label>LinkedIn</label><input type="text" name="setting_linkedin" value="<?= sanitize($s['linkedin'] ?? '') ?>"></div>
<div class="form-group"><label>Twitter</label><input type="text" name="setting_twitter" value="<?= sanitize($s['twitter'] ?? '') ?>"></div>
<div class="form-group"><label>Calendly URL</label><input type="text" name="setting_calendly_url" value="<?= sanitize($s['calendly_url'] ?? '') ?>"></div>
</div>
<div class="admin-btn-group"><button type="submit" class="btn btn-primary btn-lg">Save All Settings</button></div>
</form></div></main></div></body></html>
