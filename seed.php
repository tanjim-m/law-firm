<?php
// Seed data for Taj Law Firm - run once
require_once __DIR__ . '/includes/config.php';

// Settings
$settings = [
    ['id' => 'firm_name', 'value' => 'Taj Law Firm'],
    ['id' => 'tagline', 'value' => 'Justice Served with Integrity and Excellence'],
    ['id' => 'year_established', 'value' => '1998'],
    ['id' => 'address', 'value' => '42 Justice Avenue, Gulshan-2, Dhaka 1212, Bangladesh'],
    ['id' => 'phone', 'value' => '01815267677'],
    ['id' => 'email', 'value' => 'info@tajlawfirm.com'],
    ['id' => 'office_hours', 'value' => 'Saturday to Thursday, 9:00 AM - 10:00 PM'],
    ['id' => 'facebook', 'value' => 'https://facebook.com/tajlawfirm'],
    ['id' => 'linkedin', 'value' => 'https://linkedin.com/company/tajlawfirm'],
    ['id' => 'twitter', 'value' => 'https://twitter.com/tajlawfirm'],
    ['id' => 'about_intro', 'value' => 'Taj Law Firm has been a pillar of legal excellence in Bangladesh since 1998. We combine decades of experience with innovative legal strategies to protect our clients\' rights and interests.'],
    ['id' => 'mission', 'value' => 'To provide accessible, ethical, and effective legal representation to individuals, families, and businesses across Bangladesh.'],
    ['id' => 'values', 'value' => 'Integrity, Excellence, Compassion, Diligence, Innovation'],
    ['id' => 'why_choose_us', 'value' => 'With over 25 years of legal practice, 98% client satisfaction rate, and attorneys recognized by leading legal publications.'],
    ['id' => 'history', 'value' => 'Founded in 1998 by a group of passionate legal professionals, Taj Law Firm started as a small practice in Old Dhaka and grew into one of the most respected full-service law firms in Bangladesh.'],
    ['id' => 'calendly_url', 'value' => 'https://calendly.com/tajlawfirm'],
    ['id' => 'primary_color', 'value' => '#06b6d4'],
    ['id' => 'secondary_color', 'value' => '#f97316'],
];
$ss = store('settings');
foreach ($settings as $s) {
    $ss->insert($s);
}

// Admins
$admins = store('admins');
$admins->insert([
    'username' => 'admin',
    'password' => password_hash('password', PASSWORD_DEFAULT),
    'email' => 'admin@tajlawfirm.com',
]);

// Practice Areas
$pa = store('practice_areas');
$areas = [
    ['title' => 'Criminal Defense', 'icon' => 'fa-gavel', 'description' => 'Vigorous defense for individuals facing criminal charges.', 'services' => "Pre-arrest counseling\nBail hearings\nTrial defense\nAppeals\nWhite-collar crime\nJuvenile defense", 'display_order' => 1],
    ['title' => 'Family Law', 'icon' => 'fa-heart', 'description' => 'Compassionate guidance through sensitive family matters.', 'services' => "Divorce and separation\nChild custody\nSupport and alimony\nProperty division\nPre-nuptial agreements\nProtection orders", 'display_order' => 2],
    ['title' => 'Personal Injury', 'icon' => 'fa-hand-fist', 'description' => 'Maximum compensation for accident victims.', 'services' => "Motor vehicle accidents\nWorkplace injuries\nMedical malpractice\nSlip and fall\nWrongful death\nInsurance claims", 'display_order' => 3],
    ['title' => 'Divorce', 'icon' => 'fa-ring', 'description' => 'Strategic representation in divorce proceedings.', 'services' => "Contested divorce\nUncontested divorce\nAsset tracing\nSpousal maintenance\nBusiness division\nPost-divorce modifications", 'display_order' => 4],
    ['title' => 'Immigration', 'icon' => 'fa-globe', 'description' => 'Expert guidance through the immigration system.', 'services' => "Work visas\nFamily immigration\nPermanent residency\nCitizenship\nDeportation defense\nAsylum applications", 'display_order' => 5],
    ['title' => 'Corporate Law', 'icon' => 'fa-building', 'description' => 'Full-service business legal support.', 'services' => "Incorporation\nContracts\nMergers & acquisitions\nCompliance\nShareholder agreements\nBusiness dissolution", 'display_order' => 6],
    ['title' => 'Real Estate', 'icon' => 'fa-house', 'description' => 'Complete real estate legal services.', 'services' => "Property transactions\nTitle verification\nLease agreements\nDispute resolution\nLand development\nMortgage matters", 'display_order' => 7],
    ['title' => 'Employment Law', 'icon' => 'fa-briefcase', 'description' => 'Protecting workplace rights.', 'services' => "Wrongful termination\nDiscrimination\nHarassment cases\nWage disputes\nEmployment contracts\nPolicy drafting", 'display_order' => 8],
    ['title' => 'Tax Law', 'icon' => 'fa-calculator', 'description' => 'Strategic tax planning and dispute resolution.', 'services' => "Tax planning\nCompliance\nAudit representation\nDispute resolution\nInternational taxation\nVAT matters", 'display_order' => 9],
    ['title' => 'Estate Planning', 'icon' => 'fa-file-signature', 'description' => 'Comprehensive estate planning to protect your legacy.', 'services' => "Will drafting\nLiving trusts\nPower of attorney\nHealthcare directives\nProbate\nEstate disputes", 'display_order' => 10],
];
foreach ($areas as $a) $pa->insert($a);

// Attorneys
$att = store('attorneys');
$attorneys = [
    ['full_name' => 'Barrister Rafiq Hassan', 'position' => 'Senior Partner', 'specialties' => 'Criminal Defense, Constitutional Law', 'bio' => 'With 25 years of litigation experience, Barrister Rafiq Hassan is one of Bangladesh\'s most respected criminal defense attorneys.', 'education' => "LL.B (Hons), University of Dhaka\nBar-at-Law, Lincoln's Inn, UK", 'experience' => '25+ years', 'licenses' => "Bangladesh Bar Council\nSupreme Court of Bangladesh", 'awards' => "Bangladesh Law Award 2019\nLegal Excellence Medal 2015", 'email' => 'rafiq@tajlawfirm.com', 'phone' => '+880 1712-345678', 'linkedin' => '#', 'photo' => 'attorney1.jpg', 'display_order' => 1],
    ['full_name' => 'Advocate Sabrina Chowdhury', 'position' => 'Managing Partner', 'specialties' => 'Family Law, Divorce, Child Custody', 'bio' => 'A leading family law practitioner known for her compassionate yet strategic approach.', 'education' => "LL.M, University of Dhaka\nDiploma in Family Mediation, UK", 'experience' => '18+ years', 'licenses' => "Bangladesh Bar Council\nFamily Court", 'awards' => "Women in Law Award 2021\nMediator of the Year 2018", 'email' => 'sabrina@tajlawfirm.com', 'phone' => '+880 1712-345679', 'linkedin' => '#', 'photo' => 'attorney2.jpg', 'display_order' => 2],
    ['full_name' => 'Barrister Tanvir Islam', 'position' => 'Partner', 'specialties' => 'Corporate Law, Tax Law, M&A', 'bio' => 'Specializes in corporate transactions and tax planning with over 100 M&A deals.', 'education' => "LL.B, University of London\nBar-at-Law, Gray's Inn, UK\nMBA, IBA, Dhaka", 'experience' => '15+ years', 'licenses' => "Bangladesh Bar Council\nNBR Tax Advisor", 'awards' => "Corporate Lawyer of the Year 2020", 'email' => 'tanvir@tajlawfirm.com', 'phone' => '+880 1712-345680', 'linkedin' => '#', 'photo' => 'attorney3.jpg', 'display_order' => 3],
    ['full_name' => 'Advocate Nusrat Jahan', 'position' => 'Senior Associate', 'specialties' => 'Immigration, Employment Law', 'bio' => 'Has helped hundreds navigate complex immigration and employment matters.', 'education' => "LL.M in International Law, BRAC University\nLL.B, University of Dhaka", 'experience' => '10+ years', 'licenses' => "Bangladesh Bar Council\nImmigration Practitioners Association", 'awards' => "Human Rights Advocate Award 2022", 'email' => 'nusrat@tajlawfirm.com', 'phone' => '+880 1712-345681', 'linkedin' => '#', 'photo' => 'attorney4.jpg', 'display_order' => 4],
    ['full_name' => 'Barrister Kamal Hossain', 'position' => 'Senior Associate', 'specialties' => 'Personal Injury, Real Estate', 'bio' => 'Has recovered millions in compensation for injury victims.', 'education' => "LL.B (Hons), University of Dhaka\nBar-at-Law, Middle Temple, UK", 'experience' => '12+ years', 'licenses' => "Bangladesh Bar Council\nReal Estate Regulatory Authority", 'awards' => "Consumer Rights Award 2020", 'email' => 'kamal@tajlawfirm.com', 'phone' => '+880 1712-345682', 'linkedin' => '#', 'photo' => 'attorney5.jpg', 'display_order' => 5],
    ['full_name' => 'Advocate Farzana Akhter', 'position' => 'Associate', 'specialties' => 'Estate Planning, Corporate Law', 'bio' => 'Brings fresh perspective to estate planning and corporate matters.', 'education' => "LL.M in Business Law, NSU\nLL.B, University of Dhaka", 'experience' => '7+ years', 'licenses' => "Bangladesh Bar Council", 'awards' => "Emerging Legal Talent 2023", 'email' => 'farzana@tajlawfirm.com', 'phone' => '+880 1712-345683', 'linkedin' => '#', 'photo' => 'attorney6.jpg', 'display_order' => 6],
];
foreach ($attorneys as $a) $att->insert($a);

// Case Results
$cr = store('case_results');
$cases = [
    ['case_title' => 'State v. Anonymous — Criminal Acquittal', 'description' => 'Client faced multiple felony charges. Our investigation uncovered exculpatory evidence.', 'outcome' => 'Complete Acquittal on All Charges', 'settlement' => '', 'display_order' => 1],
    ['case_title' => 'Major Corp v. Intl Trading — Breach of Contract', 'description' => 'Complex cross-border breach of contract dispute.', 'outcome' => 'Favorable Settlement', 'settlement' => 'BDT 5.2 Crore', 'display_order' => 2],
    ['case_title' => 'Ahmed v. Industrial Corp — Workplace Injury', 'description' => 'Severe workplace injuries due to unsafe conditions.', 'outcome' => 'Judgment for Plaintiff', 'settlement' => 'BDT 2.8 Crore', 'display_order' => 3],
    ['case_title' => 'Begum v. Begum — High-Net-Worth Divorce', 'description' => 'Complex divorce with substantial cross-border assets.', 'outcome' => 'Favorable Asset Division', 'settlement' => 'Client Received 55% of Assets', 'display_order' => 4],
    ['case_title' => 'Rahman Family — Immigration Appeal', 'description' => 'Family facing deportation after procedural denial.', 'outcome' => 'Deportation Order Reversed', 'settlement' => 'Permanent Residency Granted', 'display_order' => 5],
    ['case_title' => 'Dhaka Properties v. Govt — Land Dispute', 'description' => 'Decades-old land dispute over prime commercial property.', 'outcome' => 'Title Quieted in Favor of Client', 'settlement' => 'Property Valued at BDT 12 Crore', 'display_order' => 6],
];
foreach ($cases as $c) $cr->insert($c);

// Testimonials
$test = store('testimonials');
$testimonials = [
    ['client_name' => 'Mohammad Ali', 'review' => 'Taj Law Firm handled my corporate case with exceptional professionalism. Their strategic approach saved my business millions.', 'rating' => 5.0, 'display_order' => 1, 'is_approved' => true],
    ['client_name' => 'Fatema Begum', 'review' => 'Going through a divorce was incredibly difficult, but the team provided compassionate support and secured a fair settlement.', 'rating' => 5.0, 'display_order' => 2, 'is_approved' => true],
    ['client_name' => 'Abdur Rahim', 'review' => 'I was facing serious criminal charges. Barrister Rafiq and his team fought tirelessly and got me acquitted. I owe them everything.', 'rating' => 5.0, 'display_order' => 3, 'is_approved' => true],
    ['client_name' => 'Ayesha Sultana', 'review' => 'As a startup founder, I needed reliable legal guidance. They handled incorporation, contracts, and IP protection flawlessly.', 'rating' => 5.0, 'display_order' => 4, 'is_approved' => true],
    ['client_name' => 'Dr. Karim Mahmud', 'review' => 'After my accident, the personal injury team secured compensation that covered all medical expenses and more.', 'rating' => 4.5, 'display_order' => 5, 'is_approved' => true],
];
foreach ($testimonials as $t) $test->insert($t);

// Blog Posts
$blog = store('blog_posts');
$posts = [
    ['title' => 'Understanding Your Rights During Police Questioning', 'slug' => 'rights-during-police-questioning', 'excerpt' => 'Know your fundamental rights when interacting with law enforcement.', 'content' => '<p>Full article content here...</p>', 'category' => 'article', 'is_published' => true],
    ['title' => 'Landmark Supreme Court Victory on Corporate Liability', 'slug' => 'supreme-court-corporate-liability', 'excerpt' => 'In a precedent-setting decision, the Supreme Court ruled in our client\'s favor.', 'content' => '<p>Full article content here...</p>', 'category' => 'case-update', 'is_published' => true],
    ['title' => 'New Immigration Rules for 2026', 'slug' => 'immigration-rules-2026', 'excerpt' => 'Significant changes to work visa regulations effective July 2026.', 'content' => '<p>Full article content here...</p>', 'category' => 'news', 'is_published' => true],
];
foreach ($posts as $p) $blog->insert($p);

echo "Seed data created successfully!\n";
echo "Admin login: admin / password\n";
