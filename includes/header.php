<?php
require_once __DIR__ . '/config.php';
$page_title = $page_title ?? getSiteName();
$page_description = $page_description ?? getTagline();
?><!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= sanitize($page_description) ?>">
    <title><?= sanitize($page_title) ?> - <?= getSiteName() ?></title>
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>const SITE_URL = '<?= SITE_URL ?>';</script>
</head>
<body>
<header class="site-header">
    <div class="header-top">
        <div class="container header-top-inner">
            <div class="header-contact">
                <span><i class="fas fa-phone"></i> <?= sanitize(getSetting('phone')) ?></span>
                <span><i class="fas fa-envelope"></i> <?= sanitize(getSetting('email')) ?></span>
                <span><i class="fas fa-clock"></i> <?= sanitize(getSetting('office_hours')) ?></span>
            </div>
            <div class="header-actions">
                <button id="themeToggle" class="theme-toggle" aria-label="Toggle dark mode">
                    <i class="fas fa-moon"></i>
                </button>
                <div class="language-switch">
                    <select id="langSelect" aria-label="Select language">
                        <option value="en">English</option>
                        <option value="bn">বাংলা</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main">
        <div class="container header-main-inner">
            <a href="<?= SITE_URL ?>/" class="logo">
                <img src="<?= SITE_URL ?>/assets/images/logo.svg" alt="<?= getSiteName() ?> Logo" width="60" height="60">
                <div class="logo-text">
                    <span class="logo-name"><?= getSiteName() ?></span>
                    <span class="logo-tagline"><?= getTagline() ?></span>
                </div>
            </a>
            <nav class="main-nav" id="mainNav">
                <button class="nav-close" id="navClose" aria-label="Close menu"><i class="fas fa-times"></i></button>
                <ul>
                    <li><a href="<?= SITE_URL ?>/" class="<?= basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : '' ?>">Home</a></li>
                    <li><a href="<?= SITE_URL ?>/about.php" class="<?= basename($_SERVER['PHP_SELF']) === 'about.php' ? 'active' : '' ?>">About</a></li>
                    <li><a href="<?= SITE_URL ?>/attorneys.php" class="<?= basename($_SERVER['PHP_SELF']) === 'attorneys.php' ? 'active' : '' ?>">Attorneys</a></li>
                    <li><a href="<?= SITE_URL ?>/practice-areas.php" class="<?= basename($_SERVER['PHP_SELF']) === 'practice-areas.php' ? 'active' : '' ?>">Practice Areas</a></li>
                    <li><a href="<?= SITE_URL ?>/case-results.php" class="<?= basename($_SERVER['PHP_SELF']) === 'case-results.php' ? 'active' : '' ?>">Case Results</a></li>
                    <li><a href="<?= SITE_URL ?>/testimonials.php" class="<?= basename($_SERVER['PHP_SELF']) === 'testimonials.php' ? 'active' : '' ?>">Testimonials</a></li>
                    <li><a href="<?= SITE_URL ?>/faq.php" class="<?= basename($_SERVER['PHP_SELF']) === 'faq.php' ? 'active' : '' ?>">FAQ</a></li>
                    <li><a href="<?= SITE_URL ?>/blog.php" class="<?= basename($_SERVER['PHP_SELF']) === 'blog.php' ? 'active' : '' ?>">Blog</a></li>
                    <li><a href="<?= SITE_URL ?>/contact.php" class="<?= basename($_SERVER['PHP_SELF']) === 'contact.php' ? 'active' : '' ?>">Contact</a></li>
                </ul>
                <a href="<?= SITE_URL ?>/book-consultation.php" class="btn btn-primary mobile-only">Book Consultation</a>
            </nav>
            <div class="header-right">
                <a href="<?= SITE_URL ?>/book-consultation.php" class="btn btn-primary desktop-only">Book Consultation</a>
                <button class="nav-toggle" id="navToggle" aria-label="Open menu"><i class="fas fa-bars"></i></button>
            </div>
        </div>
    </div>
</header>
<main>
