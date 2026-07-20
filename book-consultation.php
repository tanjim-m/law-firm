<?php
$page_title = 'Book Consultation';
$page_description = 'Schedule a free legal consultation with Taj Law Firm.';
require_once __DIR__ . '/includes/header.php';

$alert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize($_POST['name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $phone = sanitize($_POST['phone'] ?? '');
    $area = sanitize($_POST['practice_area'] ?? '');
    $date = $_POST['preferred_date'] ?? '';
    $time = $_POST['preferred_time'] ?? '';
    $message = sanitize($_POST['message'] ?? '');
    if ($name && $email && $phone) {
        store('consultations')->insert([
            'name' => $name, 'email' => $email, 'phone' => $phone,
            'practice_area' => $area, 'preferred_date' => $date,
            'preferred_time' => $time, 'message' => $message, 'status' => 'pending',
        ]);
        $alert = displayAlert('Your consultation request has been submitted! We will contact you within 24 hours.', 'success');
    } else {
        $alert = displayAlert('Please fill in all required fields.', 'warning');
    }
}
$selectedArea = $_GET['area'] ?? '';
?>
<section class="page-banner">
    <div class="container"><h1>Book a Consultation</h1><p>Schedule your free legal consultation today</p></div>
</section>
<section class="section">
    <div class="container">
        <div class="consultation-options">
            <div class="card consultation-option"><i class="fas fa-phone" style="font-size:2rem;color:var(--cyan);display:block;margin-bottom:12px;"></i><h3>Phone</h3><p style="color:var(--text-secondary);font-size:0.9rem;">Speak from your home or office.</p></div>
            <div class="card consultation-option"><i class="fas fa-video" style="font-size:2rem;color:var(--cyan);display:block;margin-bottom:12px;"></i><h3>Video</h3><p style="color:var(--text-secondary);font-size:0.9rem;">Secure video conference.</p></div>
            <div class="card consultation-option"><i class="fas fa-building" style="font-size:2rem;color:var(--cyan);display:block;margin-bottom:12px;"></i><h3>In-Person</h3><p style="color:var(--text-secondary);font-size:0.9rem;">Visit our Gulshan-2 office.</p></div>
        </div>
        <div class="card" style="padding:32px;max-width:700px;margin:0 auto;">
            <?= $alert ?>
            <h2 style="text-align:center;">Request an Appointment</h2>
            <p style="text-align:center;color:var(--text-secondary);margin-bottom:28px;">Free initial consultation. No obligation.</p>
            <form method="POST" data-validate>
                <div class="form-row"><div class="form-group"><label>Full Name *</label><input type="text" name="name" required></div><div class="form-group"><label>Email *</label><input type="email" name="email" required></div></div>
                <div class="form-row"><div class="form-group"><label>Phone *</label><input type="tel" name="phone" required></div>
                <div class="form-group"><label>Practice Area</label><select name="practice_area"><option value="">Select</option>
                <?php foreach (['Criminal Defense','Family Law','Personal Injury','Divorce','Immigration','Corporate Law','Real Estate','Employment Law','Tax Law','Estate Planning'] as $a): ?>
                    <option <?= $selectedArea === $a ? 'selected' : '' ?>><?= $a ?></option>
                <?php endforeach; ?></select></div></div>
                <div class="form-row"><div class="form-group"><label>Preferred Date</label><input type="date" name="preferred_date" min="<?= date('Y-m-d', strtotime('+1 day')) ?>"></div><div class="form-group"><label>Preferred Time</label><input type="time" name="preferred_time" min="09:00" max="22:00"></div></div>
                <div class="form-group"><label>Brief Description</label><textarea name="message" placeholder="Tell us about your legal matter..."></textarea></div>
                <div style="background:var(--bg-secondary);padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:0.85rem;color:var(--text-secondary);">
                    <i class="fas fa-info-circle" style="color:var(--cyan);margin-right:8px;"></i>
                    We integrate with <strong>Calendly</strong> — <a href="<?= getSetting('calendly_url', '#') ?>" target="_blank" rel="noopener">schedule directly</a>.
                </div>
                <button type="submit" class="btn btn-accent btn-lg" style="width:100%;">Submit Request</button>
            </form>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
