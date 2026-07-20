<?php
$attorneys = [
    'Barrister Rafiq Hassan' => ['pos' => 'Senior Partner', 'spec' => ['Criminal Defense', 'Constitutional Law'], 'img' => 'attorney1.jpg', 'bio' => 'With 25 years of litigation experience, Barrister Rafiq Hassan is one of Bangladesh\'s most respected criminal defense attorneys. He has argued over 200 cases before the Supreme Court and secured acquittals in numerous high-profile cases. Rafiq began his career at the Old Bailey in London before returning to Bangladesh to establish what would become Taj Law Firm. His courtroom presence, meticulous preparation, and strategic thinking have earned him a reputation as the go-to defense attorney for complex criminal matters.', 'edu' => 'LL.B (Hons), University of Dhaka\nBar-at-Law, Lincoln\'s Inn, UK', 'exp' => '25+ years of litigation experience', 'lic' => 'Bangladesh Bar Council\nSupreme Court of Bangladesh\nInternational Criminal Court', 'awards' => 'Bangladesh Law Award 2019\nLegal Excellence Medal 2015\nCriminal Defense Attorney of the Decade (2010-2020)', 'email' => 'rafiq@tajlawfirm.com', 'phone' => '+880 1712-345678', 'linkedin' => '#'],
    'Advocate Sabrina Chowdhury' => ['pos' => 'Managing Partner', 'spec' => ['Family Law', 'Divorce', 'Child Custody'], 'img' => 'attorney2.jpg', 'bio' => 'Advocate Sabrina Chowdhury is a leading family law practitioner known for her compassionate yet strategic approach to sensitive family matters. She has mediated over 500 family disputes and is a certified family mediator. Sabrina pioneered the firm\'s family law mediation program, which has successfully resolved over 80% of cases without litigation. She is a frequent speaker at legal conferences on women\'s rights and family law reform in South Asia.', 'edu' => 'LL.M, University of Dhaka\nDiploma in Family Mediation, UK\nCertificate in Child Psychology & Law', 'exp' => '18+ years in family law', 'lic' => 'Bangladesh Bar Council\nFamily Court\nCertified Family Mediator', 'awards' => 'Women in Law Award 2021\nMediator of the Year 2018\nOutstanding Contribution to Family Justice 2020', 'email' => 'sabrina@tajlawfirm.com', 'phone' => '+880 1712-345679', 'linkedin' => '#'],
    'Barrister Tanvir Islam' => ['pos' => 'Partner', 'spec' => ['Corporate Law', 'Tax Law', 'M&A'], 'img' => 'attorney3.jpg', 'bio' => 'Barrister Tanvir Islam specializes in corporate transactions and tax planning. He has advised on over 100 mergers and acquisitions and is a trusted advisor to major corporations in Bangladesh. Before joining private practice, Tanvir worked at the National Board of Revenue, giving him unique insight into tax law. He has structured some of the largest cross-border transactions in Bangladesh\'s history.', 'edu' => 'LL.B, University of London\nBar-at-Law, Gray\'s Inn, UK\nMBA, IBA, University of Dhaka', 'exp' => '15+ years in corporate law', 'lic' => 'Bangladesh Bar Council\nNBR Tax Advisor Registration\nDhaka Stock Exchange Advisor', 'awards' => 'Corporate Lawyer of the Year 2020\nTop 40 Under 40 Legal Professional\nBest Tax Advisory Firm (Team Lead) 2022', 'email' => 'tanvir@tajlawfirm.com', 'phone' => '+880 1712-345680', 'linkedin' => '#'],
    'Advocate Nusrat Jahan' => ['pos' => 'Senior Associate', 'spec' => ['Immigration', 'Employment Law'], 'img' => 'attorney4.jpg', 'bio' => 'Advocate Nusrat Jahan has helped hundreds of individuals and families navigate the complex immigration system. She also represents employees in workplace disputes with a strong track record of successful outcomes. Nusrat has particular expertise in employment-based visas and has successfully appealed numerous deportation cases. She volunteers with migrant worker support organizations.', 'edu' => 'LL.M in International Law, BRAC University\nLL.B, University of Dhaka', 'exp' => '10+ years', 'lic' => 'Bangladesh Bar Council\nImmigration Practitioners Association', 'awards' => 'Human Rights Advocate Award 2022', 'email' => 'nusrat@tajlawfirm.com', 'phone' => '+880 1712-345681', 'linkedin' => '#'],
    'Barrister Kamal Hossain' => ['pos' => 'Senior Associate', 'spec' => ['Personal Injury', 'Real Estate'], 'img' => 'attorney5.jpg', 'bio' => 'Barrister Kamal Hossain has recovered millions in compensation for personal injury victims. He is also a leading real estate attorney handling complex property transactions and land disputes. Kamal has successfully litigated against major corporations and insurance companies. His real estate practice covers everything from residential conveyancing to large commercial development projects.', 'edu' => 'LL.B (Hons), University of Dhaka\nBar-at-Law, Middle Temple, UK', 'exp' => '12+ years', 'lic' => 'Bangladesh Bar Council\nReal Estate Regulatory Authority', 'awards' => 'Consumer Rights Award 2020', 'email' => 'kamal@tajlawfirm.com', 'phone' => '+880 1712-345682', 'linkedin' => '#'],
    'Advocate Farzana Akhter' => ['pos' => 'Associate', 'spec' => ['Estate Planning', 'Corporate Law'], 'img' => 'attorney6.jpg', 'bio' => 'Advocate Farzana Akhter brings fresh perspective and energy to estate planning and corporate matters. She has assisted in drafting complex wills and trusts and serves startup and established businesses. Farzana is passionate about digital innovation in legal services and leads the firm\'s technology initiatives.', 'edu' => 'LL.M in Business Law, North South University\nLL.B, University of Dhaka', 'exp' => '7+ years', 'lic' => 'Bangladesh Bar Council', 'awards' => 'Emerging Legal Talent 2023', 'email' => 'farzana@tajlawfirm.com', 'phone' => '+880 1712-345683', 'linkedin' => '#'],
];
$name = $_GET['name'] ?? '';
$attorney = $attorneys[$name] ?? null;
if (!$attorney) { header('Location: attorneys.php'); exit; }
$page_title = $name;
require_once __DIR__ . '/includes/header.php';
?>
<section class="page-banner">
    <div class="container"><h1><?= $name ?></h1><p><?= $attorney['pos'] ?></p></div>
</section>
<section class="section">
    <div class="container">
        <div class="attorney-detail">
            <div class="attorney-sidebar">
                <img src="<?= SITE_URL ?>/assets/images/<?= $attorney['img'] ?>" alt="<?= $name ?>" onerror="this.src='<?= SITE_URL ?>/assets/images/default-attorney.svg'">
                <ul class="attorney-info-list">
                    <li><i class="fas fa-envelope"></i> <?= $attorney['email'] ?></li>
                    <li><i class="fas fa-phone"></i> <?= $attorney['phone'] ?></li>
                    <li><i class="fab fa-linkedin"></i> <a href="<?= $attorney['linkedin'] ?>">LinkedIn Profile</a></li>
                    <li><i class="fas fa-gavel"></i> <?= $attorney['exp'] ?></li>
                </ul>
            </div>
            <div>
                <h2>Biography</h2>
                <p style="color:var(--text-secondary);line-height:1.8;margin-bottom:24px;"><?= nl2br($attorney['bio']) ?></p>
                <h3>Education</h3>
                <p style="color:var(--text-secondary);margin-bottom:20px;white-space:pre-line;"><?= $attorney['edu'] ?></p>
                <h3>Licenses & Bar Admissions</h3>
                <p style="color:var(--text-secondary);margin-bottom:20px;white-space:pre-line;"><?= $attorney['lic'] ?></p>
                <h3>Awards & Recognitions</h3>
                <p style="color:var(--text-secondary);margin-bottom:20px;white-space:pre-line;"><?= $attorney['awards'] ?></p>
                <h3>Practice Specialties</h3>
                <div class="attorney-specialties" style="justify-content:flex-start;">
                    <?php foreach ($attorney['spec'] as $s): ?><span class="specialty-tag" style="font-size:0.9rem;padding:6px 16px;"><?= $s ?></span><?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
