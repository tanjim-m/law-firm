</main>
<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-col footer-about">
            <h3><?= getSiteName() ?></h3>
            <p><?= sanitize(getSetting('about_intro')) ?></p>
            <div class="footer-social">
                <a href="<?= sanitize(getSetting('facebook', '#')) ?>" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="<?= sanitize(getSetting('linkedin', '#')) ?>" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="<?= sanitize(getSetting('twitter', '#')) ?>" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
            </div>
        </div>
        <div class="footer-col">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="<?= SITE_URL ?>/about.php">About Us</a></li>
                <li><a href="<?= SITE_URL ?>/attorneys.php">Our Attorneys</a></li>
                <li><a href="<?= SITE_URL ?>/practice-areas.php">Practice Areas</a></li>
                <li><a href="<?= SITE_URL ?>/case-results.php">Case Results</a></li>
                <li><a href="<?= SITE_URL ?>/blog.php">Blog</a></li>
                <li><a href="<?= SITE_URL ?>/faq.php">FAQ</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Practice Areas</h4>
            <ul>
                <?php
                $areas = array_slice(store('practice_areas')->all('display_order'), 0, 6);
                foreach ($areas as $area): ?>
                    <li><a href="<?= SITE_URL ?>/practice-areas.php"><?= sanitize($area['title']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="footer-col footer-contact">
            <h4>Contact Us</h4>
            <p><i class="fas fa-map-marker-alt"></i> <?= sanitize(getSetting('address')) ?></p>
            <p><i class="fas fa-phone"></i> <?= sanitize(getSetting('phone')) ?></p>
            <p><i class="fas fa-envelope"></i> <?= sanitize(getSetting('email')) ?></p>
            <p><i class="fas fa-clock"></i> <?= sanitize(getSetting('office_hours')) ?></p>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <p>&copy; <?= date('Y') ?> <?= getSiteName() ?>. All rights reserved.</p>
            <div class="footer-newsletter">
                <form id="newsletterForm" class="newsletter-form">
                    <input type="email" name="email" placeholder="Your email for newsletter" required>
                    <button type="submit" class="btn btn-sm btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</footer>

<div class="chat-widget" id="chatWidget">
    <button class="chat-toggle" id="chatToggle" aria-label="Open live chat">
        <i class="fas fa-comments"></i>
    </button>
    <div class="chat-box" id="chatBox">
        <div class="chat-header">
            <span>Live Chat - <?= getSiteName() ?></span>
            <button class="chat-close" id="chatClose" aria-label="Close chat"><i class="fas fa-times"></i></button>
        </div>
        <div class="chat-messages" id="chatMessages">
            <div class="chat-msg bot">Hello! Welcome to <?= getSiteName() ?>. How can I help you today?</div>
        </div>
        <div class="chat-input-area">
            <input type="text" id="chatInput" placeholder="Type your message..." aria-label="Chat message">
            <button id="chatSend" class="btn btn-sm btn-primary" aria-label="Send message"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
</div>

<script src="<?= SITE_URL ?>/assets/js/main.js"></script>
</body>
</html>
