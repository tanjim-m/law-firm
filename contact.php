<?php
$page_title = 'Contact Us';
$page_description = 'Get in touch with Taj Law Firm.';
require_once __DIR__ . '/includes/header.php';

$alert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize($_POST['name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $phone = sanitize($_POST['phone'] ?? '');
    $subject = sanitize($_POST['subject'] ?? '');
    $message = sanitize($_POST['message'] ?? '');
    if ($name && $email && $message) {
        store('contact_messages')->insert([
            'name' => $name, 'email' => $email, 'phone' => $phone,
            'subject' => $subject, 'message' => $message, 'is_read' => false,
        ]);
        $alert = displayAlert('Your message has been sent! We will respond within 24 hours.', 'success');
    } else {
        $alert = displayAlert('Please fill in all required fields.', 'warning');
    }
}
?>
<section class="page-banner">
    <div class="container"><h1>Contact Us</h1><p>We're here to help — reach out today</p></div>
</section>
<section class="section">
    <div class="container">
        <div class="contact-grid">
            <div>
                <h2>Get In Touch</h2>
                <div class="section-divider" style="margin:0 0 32px;"></div>
                <div class="contact-info-list">
                    <div class="contact-info-item"><div class="contact-info-icon"><i class="fas fa-map-marker-alt"></i></div><div><strong>Address</strong><p style="color:var(--text-secondary);"><?= getSetting('address') ?></p></div></div>
                    <div class="contact-info-item"><div class="contact-info-icon"><i class="fas fa-phone"></i></div><div><strong>Phone</strong><p style="color:var(--text-secondary);"><?= getSetting('phone') ?></p></div></div>
                    <div class="contact-info-item"><div class="contact-info-icon"><i class="fas fa-envelope"></i></div><div><strong>Email</strong><p style="color:var(--text-secondary);"><?= getSetting('email') ?></p></div></div>
                    <div class="contact-info-item"><div class="contact-info-icon"><i class="fas fa-clock"></i></div><div><strong>Office Hours</strong><p style="color:var(--text-secondary);"><?= getSetting('office_hours') ?></p></div></div>
                </div>
                <div class="footer-social">
                    <a href="<?= getSetting('facebook', '#') ?>" aria-label="Facebook" style="width:40px;height:40px;border-radius:50%;background:var(--primary);color:#fff;display:inline-flex;align-items:center;justify-content:center;margin-right:8px;"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?= getSetting('linkedin', '#') ?>" aria-label="LinkedIn" style="width:40px;height:40px;border-radius:50%;background:var(--primary);color:#fff;display:inline-flex;align-items:center;justify-content:center;margin-right:8px;"><i class="fab fa-linkedin-in"></i></a>
                    <a href="<?= getSetting('twitter', '#') ?>" aria-label="Twitter" style="width:40px;height:40px;border-radius:50%;background:var(--primary);color:#fff;display:inline-flex;align-items:center;justify-content:center;"><i class="fab fa-x-twitter"></i></a>
                </div>
            </div>
            <div class="card" style="padding:32px;">
                <?= $alert ?>
                <h2>Send a Message</h2>
                <p style="color:var(--text-secondary);margin-bottom:20px;">Fill out the form and we'll respond within 24 hours.</p>
                <form method="POST" data-validate>
                    <div class="form-row"><div class="form-group"><label>Full Name *</label><input type="text" name="name" required></div><div class="form-group"><label>Email *</label><input type="email" name="email" required></div></div>
                    <div class="form-row"><div class="form-group"><label>Phone</label><input type="tel" name="phone"></div><div class="form-group"><label>Subject</label><input type="text" name="subject"></div></div>
                    <div class="form-group"><label>Message *</label><textarea name="message" required></textarea></div>
                    <button type="submit" class="btn btn-primary btn-lg" style="width:100%;">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0!2d90.4125!3d23.7949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a0f70f9f0f%3A0x0!2sGulshan-2!5e0!3m2!1sen!2sbd!4v1234567890" allowfullscreen="" loading="lazy"></iframe>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
