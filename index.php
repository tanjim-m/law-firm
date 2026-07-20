<?php
$page_title = 'Home';
$page_description = 'Taj Law Firm - Expert legal services in Bangladesh since 1998. Criminal Defense, Family Law, Personal Injury, and more.';
require_once __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="container hero-inner">
        <div class="hero-content">
            <h1>Your Trusted <span>Legal Partner</span> in Bangladesh</h1>
            <p>With over 25 years of experience, Taj Law Firm delivers exceptional legal representation across diverse practice areas. We fight for your rights with integrity and dedication.</p>
            <div class="hero-buttons">
                <a href="<?= SITE_URL ?>/book-consultation.php" class="btn btn-accent btn-lg">Free Consultation</a>
                <a href="<?= SITE_URL ?>/about.php" class="btn btn-outline-light btn-lg">Learn More</a>
            </div>
            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="hero-stat-number">25+</div>
                    <div class="hero-stat-label">Years Experience</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-number">5000+</div>
                    <div class="hero-stat-label">Cases Won</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-number">98%</div>
                    <div class="hero-stat-label">Client Satisfaction</div>
                </div>
            </div>
        </div>
        <div class="hero-image">
            <img src="<?= SITE_URL ?>/assets/images/hero-scales.svg" alt="Scales of Justice" width="450" height="450">
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h2>Our Practice Areas</h2>
            <p>Comprehensive legal services tailored to meet your needs across Bangladesh.</p>
            <div class="section-divider"></div>
        </div>
        <div class="practice-grid">
            <?php
            $practiceAreas = [
                ['title' => 'Criminal Defense', 'icon' => 'fa-gavel', 'desc' => 'Vigorous defense for individuals facing criminal charges. We protect your rights at every stage of the legal process, from investigation to trial.'],
                ['title' => 'Family Law', 'icon' => 'fa-heart', 'desc' => 'Compassionate guidance through sensitive family matters including custody, support, and domestic relations with dignity and discretion.'],
                ['title' => 'Personal Injury', 'icon' => 'fa-hand-fist', 'desc' => 'Maximum compensation for accident victims. We handle auto accidents, workplace injuries, and wrongful death claims with proven results.'],
                ['title' => 'Divorce', 'icon' => 'fa-ring', 'desc' => 'Strategic representation in divorce proceedings, asset division, and alimony negotiations to secure your financial future.'],
                ['title' => 'Immigration', 'icon' => 'fa-globe', 'desc' => 'Expert guidance through the complex immigration system, from visa applications to citizenship and deportation defense.'],
                ['title' => 'Corporate Law', 'icon' => 'fa-building', 'desc' => 'Full-service business legal support including incorporation, contracts, mergers, compliance, and corporate governance.'],
                ['title' => 'Real Estate', 'icon' => 'fa-house', 'desc' => 'Complete real estate legal services covering property transactions, disputes, title issues, and development projects.'],
                ['title' => 'Employment Law', 'icon' => 'fa-briefcase', 'desc' => 'Protecting workplace rights in discrimination, harassment, wrongful termination, and wage disputes for employees and employers.'],
                ['title' => 'Tax Law', 'icon' => 'fa-calculator', 'desc' => 'Strategic tax planning, compliance, and dispute resolution for individuals and businesses navigating complex tax regulations.'],
                ['title' => 'Estate Planning', 'icon' => 'fa-file-signature', 'desc' => 'Comprehensive estate planning including wills, trusts, power of attorney, and probate administration to protect your legacy.'],
            ];
            foreach ($practiceAreas as $area): ?>
                <div class="card practice-card">
                    <div class="card-icon icon-cyan"><i class="fas <?= $area['icon'] ?>"></i></div>
                    <h3><?= $area['title'] ?></h3>
                    <p><?= $area['desc'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section bg-secondary">
    <div class="container">
        <div class="section-header">
            <h2>Our Attorneys</h2>
            <p>Meet the dedicated legal professionals committed to achieving the best outcomes for our clients.</p>
            <div class="section-divider"></div>
        </div>
        <div class="attorney-grid">
            <?php
            $attorneys = [
                ['name' => 'Barrister Rafiq Hassan', 'pos' => 'Senior Partner', 'spec' => ['Criminal Defense', 'Constitutional Law'], 'img' => 'attorney1.jpg'],
                ['name' => 'Advocate Sabrina Chowdhury', 'pos' => 'Managing Partner', 'spec' => ['Family Law', 'Divorce'], 'img' => 'attorney2.jpg'],
                ['name' => 'Barrister Tanvir Islam', 'pos' => 'Partner', 'spec' => ['Corporate Law', 'Tax Law'], 'img' => 'attorney3.jpg'],
                ['name' => 'Advocate Nusrat Jahan', 'pos' => 'Senior Associate', 'spec' => ['Immigration', 'Employment Law'], 'img' => 'attorney4.jpg'],
                ['name' => 'Barrister Kamal Hossain', 'pos' => 'Senior Associate', 'spec' => ['Personal Injury', 'Real Estate'], 'img' => 'attorney5.jpg'],
                ['name' => 'Advocate Farzana Akhter', 'pos' => 'Associate', 'spec' => ['Estate Planning', 'Corporate Law'], 'img' => 'attorney6.jpg'],
            ];
            foreach ($attorneys as $att): ?>
                <div class="card attorney-card">
                    <img src="<?= SITE_URL ?>/assets/images/<?= $att['img'] ?>" alt="<?= $att['name'] ?>" onerror="this.src='<?= SITE_URL ?>/assets/images/default-attorney.svg'">
                    <div class="card-body">
                        <h3 class="attorney-name"><?= $att['name'] ?></h3>
                        <p class="attorney-position"><?= $att['pos'] ?></p>
                        <div class="attorney-specialties">
                            <?php foreach ($att['spec'] as $s): ?>
                                <span class="specialty-tag"><?= $s ?></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="attorney-social">
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" aria-label="Email"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h2>Case Results</h2>
            <p>Proven outcomes that demonstrate our commitment to excellence.</p>
            <div class="section-divider"></div>
        </div>
        <div class="grid-2">
            <?php
            $caseResults = [
                ['title' => 'High-Profile Criminal Acquittal', 'desc' => 'Successfully defended a client in a complex criminal case involving multiple charges. Through meticulous investigation and strategic courtroom advocacy, all charges were dismissed.', 'outcome' => 'Acquitted on All Charges', 'amount' => '', 'icon' => '⚖️'],
                ['title' => 'Multi-Crore Corporate Settlement', 'desc' => 'Represented a major corporation in a breach of contract dispute. Negotiated a favorable settlement that saved the client from lengthy litigation.', 'outcome' => 'Settlement Reached', 'amount' => 'BDT 5.2 Crore', 'icon' => '🏛️'],
                ['title' => 'Landmark Personal Injury Victory', 'desc' => 'Secured compensation for a workplace accident victim who sustained severe injuries. The case set a new precedent for worker safety standards.', 'outcome' => 'Judgment for Plaintiff', 'amount' => 'BDT 2.8 Crore', 'icon' => '🏥'],
                ['title' => 'Complex Divorce Asset Protection', 'desc' => 'Protected client assets in a high-net-worth divorce involving cross-border properties and business interests.', 'outcome' => 'Favorable Asset Division', 'amount' => '', 'icon' => '💍'],
            ];
            foreach ($caseResults as $cr): ?>
                <div class="card case-result">
                    <div class="case-result-icon"><?= $cr['icon'] ?></div>
                    <div>
                        <h3 style="font-size:1.1rem"><?= $cr['title'] ?></h3>
                        <p style="color:var(--text-secondary);font-size:0.9rem"><?= $cr['desc'] ?></p>
                        <p class="case-result-outcome"><?= $cr['outcome'] ?></p>
                        <?php if ($cr['amount']): ?>
                            <p class="case-result-settlement"><?= $cr['amount'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section bg-secondary">
    <div class="container">
        <div class="section-header">
            <h2>What Our Clients Say</h2>
            <p>Real feedback from real people we've had the privilege to serve.</p>
            <div class="section-divider"></div>
        </div>
        <div class="testi-grid">
            <?php
            $testimonials = [
                ['name' => 'Mohammad Ali', 'role' => 'Business Owner', 'stars' => 5, 'text' => 'Taj Law Firm handled my corporate case with exceptional professionalism. Their strategic approach saved my business millions. I highly recommend them for any legal matter.'],
                ['name' => 'Fatema Begum', 'role' => 'Teacher', 'stars' => 5, 'text' => 'Going through a divorce was incredibly difficult, but the team at Taj Law Firm provided compassionate support and secured a fair settlement for me and my children.'],
                ['name' => 'Rahim Uddin', 'role' => 'Engineer', 'stars' => 5, 'text' => 'I was facing serious criminal charges and thought my life was over. Barrister Rafiq and his team fought tirelessly and got me acquitted. I owe them everything.'],
                ['name' => 'Ayesha Sultana', 'role' => 'Entrepreneur', 'stars' => 5, 'text' => 'As a startup founder, I needed reliable legal guidance. Taj Law Firm handled our incorporation, contracts, and IP protection flawlessly. They are our go-to legal partner.'],
                ['name' => 'Karim Mahmud', 'role' => 'Doctor', 'stars' => 4, 'text' => 'After my accident, I struggled with insurance companies. The personal injury team secured compensation that covered all my medical expenses and more. Very grateful.'],
            ];
            foreach ($testimonials as $t): ?>
                <div class="card testi-card">
                    <div class="testi-stars"><?= str_repeat('★', (int)$t['stars']) ?><?= str_repeat('☆', 5 - (int)$t['stars']) ?></div>
                    <p class="testi-text">"<?= $t['text'] ?>"</p>
                    <div class="testi-author">
                        <div class="testi-avatar"><?= $t['name'][0] ?></div>
                        <div>
                            <div class="testi-name"><?= $t['name'] ?></div>
                            <div class="testi-role"><?= $t['role'] ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" style="background: var(--gradient); color: #fff; text-align: center;">
    <div class="container">
        <h2 style="color:#fff;">Ready to Discuss Your Case?</h2>
        <p style="color:rgba(255,255,255,0.85); max-width:600px; margin:0 auto 24px; font-size:1.1rem;">
            Schedule a confidential consultation with one of our experienced attorneys. Your first consultation is free.
        </p>
        <div style="display:flex; gap:12px; justify-content:center; flex-wrap:wrap;">
            <a href="<?= SITE_URL ?>/book-consultation.php" class="btn btn-accent btn-lg">Book Consultation</a>
            <a href="tel:<?= getSetting('phone') ?>" class="btn btn-outline-light btn-lg">Call Now</a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
