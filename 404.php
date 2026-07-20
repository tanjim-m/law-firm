<?php
$page_title = 'Page Not Found';
require_once __DIR__ . '/includes/header.php';
?>
<section class="page-banner">
    <div class="container"><h1>404 - Page Not Found</h1><p>The page you're looking for doesn't exist.</p></div>
</section>
<section class="section" style="text-align:center;">
    <div class="container">
        <p style="font-size:1.2rem;margin-bottom:24px;">The page you are looking for might have been removed or is temporarily unavailable.</p>
        <a href="<?= SITE_URL ?>/" class="btn btn-primary btn-lg">Go to Homepage</a>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
