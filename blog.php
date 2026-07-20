<?php
$page_title = 'Blog';
$page_description = 'Legal insights, news, and articles from Taj Law Firm.';
require_once __DIR__ . '/includes/header.php';
?>
<section class="page-banner">
    <div class="container"><h1>Blog</h1><p>Legal insights, news, and updates from our attorneys</p></div>
</section>
<section class="section">
    <div class="container">
        <div class="blog-grid">
            <?php
            $posts = [
                ['title' => 'Understanding Your Rights During Police Questioning in Bangladesh', 'cat' => 'article', 'date' => '2026-07-05', 'img' => '', 'excerpt' => 'Know your fundamental rights when interacting with law enforcement. From the right to remain silent to the right to legal counsel, understanding these protections can significantly impact the outcome of any criminal matter.'],
                ['title' => 'Taj Law Firm Wins Landmark Supreme Court Case on Corporate Liability', 'cat' => 'case-update', 'date' => '2026-06-28', 'img' => '', 'excerpt' => 'In a precedent-setting decision, the Supreme Court of Bangladesh ruled in favor of our client, establishing important new guidelines for corporate liability in environmental matters.'],
                ['title' => 'New Immigration Rules for 2026: What Foreign Workers Need to Know', 'cat' => 'news', 'date' => '2026-06-20', 'img' => '', 'excerpt' => 'The government has announced significant changes to work visa regulations effective July 2026. Here\'s a comprehensive breakdown of what these changes mean for foreign workers and their employers.'],
                ['title' => '5 Essential Estate Planning Documents Every Bangladeshi Family Should Have', 'cat' => 'article', 'date' => '2026-06-15', 'img' => '', 'excerpt' => 'Estate planning is not just for the wealthy. From wills to healthcare directives, these five documents form the foundation of a sound estate plan that protects your family\'s future.'],
                ['title' => 'Taj Law Firm Expands with New Chattogram Office', 'cat' => 'news', 'date' => '2026-06-10', 'img' => '', 'excerpt' => 'We are pleased to announce the opening of our new branch office in Chattogram, making our legal services more accessible to clients in the southeastern region of Bangladesh.'],
                ['title' => 'Divorce Mediation vs. Litigation: Which Path Is Right for You?', 'cat' => 'article', 'date' => '2026-06-05', 'img' => '', 'excerpt' => 'Exploring the key differences between mediation and litigation in divorce cases. Learn about the costs, timelines, and emotional impacts of each approach to make an informed decision.'],
                ['title' => 'Personal Injury Compensation: How Much Is Your Case Worth?', 'cat' => 'article', 'date' => '2026-05-28', 'img' => '', 'excerpt' => 'Understanding how personal injury compensation is calculated in Bangladesh. We break down the factors that determine case value including medical expenses, lost wages, and non-economic damages.'],
                ['title' => 'Success Story: BDT 2.8 Crore Recovery in Workplace Accident Case', 'cat' => 'case-update', 'date' => '2026-05-20', 'img' => '', 'excerpt' => 'Our personal injury team secured one of the largest workplace accident settlements this year for a client who suffered severe injuries due to employer negligence.'],
                ['title' => 'Digital Evidence in Criminal Cases: The New Frontier', 'cat' => 'article', 'date' => '2026-05-15', 'img' => '', 'excerpt' => 'As digital evidence becomes increasingly central to criminal cases, understanding its admissibility, collection standards, and potential challenges is crucial for both prosecutors and defense attorneys.'],
            ];
            $catClasses = ['news' => 'cat-news', 'article' => 'cat-article', 'case-update' => 'cat-case-update'];
            $catLabels = ['news' => 'News', 'article' => 'Article', 'case-update' => 'Case Update'];
            foreach ($posts as $post): ?>
                <div class="card blog-card">
                    <div style="height:200px;background:var(--gradient);display:flex;align-items:center;justify-content:center;color:#fff;font-size:2rem;">
                        <i class="fas <?= ['news' => 'fa-newspaper', 'article' => 'fa-file-lines', 'case-update' => 'fa-scale-balanced'][$post['cat']] ?>"></i>
                    </div>
                    <div class="card-body">
                        <span class="blog-category <?= $catClasses[$post['cat']] ?>"><?= $catLabels[$post['cat']] ?></span>
                        <h3><?= $post['title'] ?></h3>
                        <p class="blog-date"><i class="far fa-calendar"></i> <?= date('F j, Y', strtotime($post['date'])) ?></p>
                        <p style="color:var(--text-secondary);font-size:0.9rem;line-height:1.6;"><?= $post['excerpt'] ?></p>
                        <a href="#" style="margin-top:12px;display:inline-flex;align-items:center;gap:6px;font-weight:600;font-size:0.9rem;">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
