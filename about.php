<?php
$page_title = 'About Us';
$page_description = 'Learn about Taj Law Firm - 25+ years of legal excellence in Bangladesh.';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-banner">
    <div class="container">
        <h1>About Taj Law Firm</h1>
        <p>Over 25 years of dedication to justice and client advocacy</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="about-grid">
            <div>
                <h2>Our Story</h2>
                <div class="section-divider" style="margin: 0 0 20px;"></div>
                <p style="margin-bottom:16px; color:var(--text-secondary); line-height:1.8;">
                    Founded in 1998 by a group of passionate legal professionals, Taj Law Firm started as a small practice in Old Dhaka with a singular mission: to provide accessible, high-quality legal representation to the people of Bangladesh.
                </p>
                <p style="margin-bottom:16px; color:var(--text-secondary); line-height:1.8;">
                    Over the years, we have grown into one of the most respected full-service law firms in the country. From landmark constitutional cases to complex corporate transactions, our attorneys have consistently delivered results that exceed expectations.
                </p>
                <p style="color:var(--text-secondary); line-height:1.8;">
                    Today, with a team of 25+ dedicated legal professionals, we serve individuals, families, and businesses across Bangladesh from our office in Gulshan-2, Dhaka.
                </p>
            </div>
            <div style="display:flex; flex-direction:column; gap:20px;">
                <div class="card" style="padding:28px;">
                    <div class="card-icon icon-cyan" style="width:48px;height:48px;"><i class="fas fa-bullseye"></i></div>
                    <h3>Our Mission</h3>
                    <p style="color:var(--text-secondary);">To provide accessible, ethical, and effective legal representation to individuals, families, and businesses across Bangladesh, ensuring that justice is not just an ideal but a reality for every client we serve.</p>
                </div>
                <div class="card" style="padding:28px;">
                    <div class="card-icon icon-orange" style="width:48px;height:48px;"><i class="fas fa-star"></i></div>
                    <h3>Why Choose Us</h3>
                    <p style="color:var(--text-secondary);">With over 25 years of legal practice, 98% client satisfaction rate, and attorneys recognized by leading legal publications, Taj Law Firm offers unmatched expertise. We treat every case with the attention it deserves.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-secondary">
    <div class="container">
        <div class="section-header">
            <h2>Our Core Values</h2>
            <p>The principles that guide every decision we make.</p>
            <div class="section-divider"></div>
        </div>
        <div class="values-grid">
            <?php
            $values = [
                ['icon' => 'fa-shield-halved', 'color' => 'icon-cyan', 'title' => 'Integrity', 'desc' => 'We uphold the highest ethical standards in every engagement.'],
                ['icon' => 'fa-trophy', 'color' => 'icon-orange', 'title' => 'Excellence', 'desc' => 'We relentlessly pursue the best outcomes for our clients.'],
                ['icon' => 'fa-hand-holding-heart', 'color' => 'icon-cyan', 'title' => 'Compassion', 'desc' => 'We understand the human impact of every legal matter.'],
                ['icon' => 'fa-hourglass-half', 'color' => 'icon-orange', 'title' => 'Diligence', 'desc' => 'We leave no stone unturned in case preparation.'],
                ['icon' => 'fa-lightbulb', 'color' => 'icon-cyan', 'title' => 'Innovation', 'desc' => 'We embrace modern legal strategies and technology.'],
            ];
            foreach ($values as $v): ?>
                <div class="card value-card">
                    <div class="card-icon <?= $v['color'] ?>" style="margin:0 auto 16px;">
                        <i class="fas <?= $v['icon'] ?>"></i>
                    </div>
                    <h3 style="font-size:1.1rem;"><?= $v['title'] ?></h3>
                    <p style="color:var(--text-secondary); font-size:0.9rem;"><?= $v['desc'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
