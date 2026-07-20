<?php
$page_title = 'Our Attorneys';
$page_description = 'Meet the dedicated legal team at Taj Law Firm.';
require_once __DIR__ . '/includes/header.php';
?>
<section class="page-banner">
    <div class="container">
        <h1>Our Attorneys</h1>
        <p>Experienced legal professionals dedicated to your success</p>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="search-bar">
            <input type="text" id="attorneySearch" placeholder="Search by name or specialty...">
        </div>
        <div class="attorney-grid">
        <?php
        $attorneys = [
            ['name' => 'Barrister Rafiq Hassan', 'pos' => 'Senior Partner', 'spec' => ['Criminal Defense', 'Constitutional Law'], 'img' => 'attorney1.jpg', 'bio' => 'With 25 years of litigation experience, Barrister Rafiq Hassan is one of Bangladesh\'s most respected criminal defense attorneys. He has argued over 200 cases before the Supreme Court and secured acquittals in numerous high-profile cases.', 'edu' => 'LL.B (Hons), University of Dhaka; Bar-at-Law, Lincoln\'s Inn, UK', 'exp' => '25+ years', 'lic' => 'Bangladesh Bar Council, Supreme Court of Bangladesh', 'awards' => 'Bangladesh Law Award 2019, Legal Excellence Medal 2015', 'email' => 'rafiq@tajlawfirm.com', 'phone' => '+880 1712-345678', 'linkedin' => 'https://linkedin.com/in/rafiq-hassan', 'region' => 'Dhaka, Chattogram, Sylhet'],
            ['name' => 'Advocate Sabrina Chowdhury', 'pos' => 'Managing Partner', 'spec' => ['Family Law', 'Divorce', 'Child Custody'], 'img' => 'attorney2.jpg', 'bio' => 'Advocate Sabrina Chowdhury is a leading family law practitioner known for her compassionate yet strategic approach to sensitive family matters. She has mediated over 500 family disputes and is a certified family mediator.', 'edu' => 'LL.M, University of Dhaka; Diploma in Family Mediation, UK', 'exp' => '18+ years', 'lic' => 'Bangladesh Bar Council, Family Court', 'awards' => 'Women in Law Award 2021, Mediator of the Year 2018', 'email' => 'sabrina@tajlawfirm.com', 'phone' => '+880 1712-345679', 'linkedin' => 'https://linkedin.com/in/sabrina-chowdhury', 'region' => 'Dhaka, Rajshahi, Khulna'],
            ['name' => 'Barrister Tanvir Islam', 'pos' => 'Partner', 'spec' => ['Corporate Law', 'Tax Law', 'Mergers & Acquisitions'], 'img' => 'attorney3.jpg', 'bio' => 'Barrister Tanvir Islam specializes in corporate transactions and tax planning. He has advised on over 100 mergers and acquisitions and is a trusted advisor to major corporations in Bangladesh.', 'edu' => 'LL.B, University of London; Bar-at-Law, Gray\'s Inn, UK; MBA, IBA, Dhaka', 'exp' => '15+ years', 'lic' => 'Bangladesh Bar Council, NBR Tax Advisor Registration', 'awards' => 'Corporate Lawyer of the Year 2020, Top 40 Under 40 Legal Professional', 'email' => 'tanvir@tajlawfirm.com', 'phone' => '+880 1712-345680', 'linkedin' => 'https://linkedin.com/in/tanvir-islam', 'region' => 'Dhaka, Chattogram'],
            ['name' => 'Advocate Nusrat Jahan', 'pos' => 'Senior Associate', 'spec' => ['Immigration', 'Employment Law'], 'img' => 'attorney4.jpg', 'bio' => 'Advocate Nusrat Jahan has helped hundreds of individuals and families navigate the complex immigration system. She also represents employees in workplace disputes with a strong track record of successful outcomes.', 'edu' => 'LL.M in International Law, BRAC University; LL.B, University of Dhaka', 'exp' => '10+ years', 'lic' => 'Bangladesh Bar Council, Immigration Practitioners Association', 'awards' => 'Human Rights Advocate Award 2022', 'email' => 'nusrat@tajlawfirm.com', 'phone' => '+880 1712-345681', 'linkedin' => 'https://linkedin.com/in/nusrat-jahan', 'region' => 'Dhaka, Barishal'],
            ['name' => 'Barrister Kamal Hossain', 'pos' => 'Senior Associate', 'spec' => ['Personal Injury', 'Real Estate'], 'img' => 'attorney5.jpg', 'bio' => 'Barrister Kamal Hossain has recovered millions in compensation for personal injury victims. He is also a leading real estate attorney handling complex property transactions and land disputes.', 'edu' => 'LL.B (Hons), University of Dhaka; Bar-at-Law, Middle Temple, UK', 'exp' => '12+ years', 'lic' => 'Bangladesh Bar Council, Real Estate Regulatory Authority', 'awards' => 'Consumer Rights Award 2020', 'email' => 'kamal@tajlawfirm.com', 'phone' => '+880 1712-345682', 'linkedin' => 'https://linkedin.com/in/kamal-hossain', 'region' => 'Dhaka, Mymensingh'],
            ['name' => 'Advocate Farzana Akhter', 'pos' => 'Associate', 'spec' => ['Estate Planning', 'Corporate Law'], 'img' => 'attorney6.jpg', 'bio' => 'Advocate Farzana Akhter brings fresh perspective and energy to estate planning and corporate matters. She has assisted in drafting complex wills and trusts and serves startup and established businesses.', 'edu' => 'LL.M in Business Law, North South University; LL.B, University of Dhaka', 'exp' => '7+ years', 'lic' => 'Bangladesh Bar Council', 'awards' => 'Emerging Legal Talent 2023', 'email' => 'farzana@tajlawfirm.com', 'phone' => '+880 1712-345683', 'linkedin' => 'https://linkedin.com/in/farzana-akhter', 'region' => 'Dhaka'],
        ];
        foreach ($attorneys as $a): ?>
            <div class="card attorney-card">
                <img src="<?= SITE_URL ?>/assets/images/<?= $a['img'] ?>" alt="<?= $a['name'] ?>" onerror="this.src='<?= SITE_URL ?>/assets/images/default-attorney.svg'">
                <div class="card-body">
                    <h3 class="attorney-name"><?= $a['name'] ?></h3>
                    <p class="attorney-position"><?= $a['pos'] ?></p>
                    <div class="attorney-specialties">
                        <?php foreach ($a['spec'] as $s): ?><span class="specialty-tag"><?= $s ?></span><?php endforeach; ?>
                    </div>
                    <p style="color:var(--text-secondary);font-size:0.85rem;margin-bottom:12px;line-height:1.5;"><?= substr($a['bio'], 0, 120) ?>...</p>
                    <a href="<?= SITE_URL ?>/attorney-detail.php?name=<?= urlencode($a['name']) ?>" class="btn btn-outline btn-sm" style="width:100%;">View Profile</a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
