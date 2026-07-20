<?php
$page_title = 'Practice Areas';
$page_description = 'Comprehensive legal services from Taj Law Firm.';
require_once __DIR__ . '/includes/header.php';
?>
<section class="page-banner">
    <div class="container">
        <h1>Practice Areas</h1>
        <p>Comprehensive legal expertise across ten practice areas</p>
    </div>
</section>
<section class="section">
    <div class="container">
        <?php
        $practiceAreas = [
            ['title' => 'Criminal Defense', 'icon' => 'fa-gavel', 'color' => 'icon-cyan', 'desc' => 'When your freedom is at stake, you need an aggressive and experienced defense team. Our criminal defense attorneys have successfully defended clients against charges ranging from white-collar crimes to serious felonies. We investigate every angle, challenge evidence, negotiate with prosecutors, and provide fearless courtroom advocacy.', 'services' => ['Pre-arrest counseling and investigation', 'Bail hearings and bond reduction', 'Trial defense for all criminal charges', 'Appeals and post-conviction relief', 'White-collar crime defense', 'Juvenile defense']],
            ['title' => 'Family Law', 'icon' => 'fa-heart', 'color' => 'icon-orange', 'desc' => 'Family legal matters require both legal expertise and emotional intelligence. Our family law team provides compassionate guidance through divorce, custody disputes, alimony, and domestic relations. We prioritize amicable resolution through mediation but are fully prepared to litigate when necessary to protect your interests.', 'services' => ['Divorce and legal separation', 'Child custody and visitation', 'Child support and alimony', 'Property division', 'Pre-nuptial and post-nuptial agreements', 'Domestic violence protection orders']],
            ['title' => 'Personal Injury', 'icon' => 'fa-hand-fist', 'color' => 'icon-cyan', 'desc' => 'Accidents can change your life in an instant. Our personal injury team fights to secure maximum compensation for your medical expenses, lost wages, pain and suffering, and long-term care needs. We handle cases on a contingency fee basis — you pay nothing unless we win.', 'services' => ['Motor vehicle accidents', 'Workplace injuries', 'Medical malpractice', 'Slip and fall injuries', 'Wrongful death claims', 'Insurance bad faith claims']],
            ['title' => 'Divorce', 'icon' => 'fa-ring', 'color' => 'icon-orange', 'desc' => 'Ending a marriage is one of life\'s most challenging transitions. Our divorce attorneys provide strategic representation to protect your assets, secure fair support arrangements, and help you move forward. We handle both contested and uncontested divorces with sensitivity and determination.', 'services' => ['Contested divorce litigation', 'Uncontested/mutual consent divorce', 'Asset tracing and valuation', 'Spousal maintenance negotiations', 'Business interest division', 'Post-divorce modifications']],
            ['title' => 'Immigration', 'icon' => 'fa-globe', 'color' => 'icon-cyan', 'desc' => 'Navigating immigration laws requires precision and up-to-date knowledge. Our immigration practice assists individuals, families, and businesses with visa applications, permanent residency, citizenship, and deportation defense. We stay current with changing immigration policies to provide the most effective counsel.', 'services' => ['Work visas and employment authorization', 'Family-based immigration', 'Permanent residency applications', 'Citizenship and naturalization', 'Deportation and removal defense', 'Asylum applications']],
            ['title' => 'Corporate Law', 'icon' => 'fa-building', 'color' => 'icon-orange', 'desc' => 'From startups to multinational corporations, our corporate law team provides comprehensive business legal services. We help with entity formation, contract drafting, mergers and acquisitions, regulatory compliance, and corporate governance. Our practical, business-minded approach helps clients achieve their commercial objectives.', 'services' => ['Company incorporation and registration', 'Contract drafting and review', 'Mergers, acquisitions, and joint ventures', 'Corporate governance and compliance', 'Shareholder agreements', 'Business dissolution']],
            ['title' => 'Real Estate', 'icon' => 'fa-house', 'color' => 'icon-cyan', 'desc' => 'Real estate transactions and disputes require careful legal handling. Our real estate practice covers everything from residential purchases to large commercial developments. We conduct thorough due diligence, handle title issues, and represent clients in property disputes and landlord-tenant matters.', 'services' => ['Property purchase and sale', 'Title search and verification', 'Lease agreements', 'Property dispute resolution', 'Land development and zoning', 'Mortgage and financing']],
            ['title' => 'Employment Law', 'icon' => 'fa-briefcase', 'color' => 'icon-orange', 'desc' => 'We advocate for both employees and employers in workplace legal matters. For employees, we fight against discrimination, harassment, wrongful termination, and wage violations. For employers, we provide compliance counseling, policy drafting, and defense in employment disputes.', 'services' => ['Wrongful termination claims', 'Workplace discrimination', 'Harassment cases', 'Wage and hour disputes', 'Employment contracts', 'Employee handbook and policy drafting']],
            ['title' => 'Tax Law', 'icon' => 'fa-calculator', 'color' => 'icon-cyan', 'desc' => 'Tax law complexity demands specialized expertise. Our tax attorneys provide strategic tax planning, compliance assistance, and representation in tax disputes. We help individuals and businesses minimize tax liability while staying fully compliant with all applicable laws.', 'services' => ['Tax planning and strategy', 'Tax compliance and filing', 'Tax audit representation', 'Tax dispute resolution', 'International taxation', 'VAT and customs matters']],
            ['title' => 'Estate Planning', 'icon' => 'fa-file-signature', 'color' => 'icon-orange', 'desc' => 'Protect your legacy and provide for your loved ones through comprehensive estate planning. We draft wills, trusts, and power of attorney documents tailored to your specific circumstances. Our estate planning attorneys also handle probate administration and estate disputes.', 'services' => ['Will drafting and execution', 'Living trusts', 'Power of attorney', 'Healthcare directives', 'Probate and estate administration', 'Estate dispute litigation']],
        ];
        foreach ($practiceAreas as $index => $area):
            $bg = $index % 2 === 0 ? '' : 'bg-secondary';
        ?>
        <div id="<?= strtolower(str_replace(' ', '-', $area['title'])) ?>" class="<?= $bg ?>" style="padding:40px 0; <?= $index > 0 ? 'border-top:1px solid var(--border);' : '' ?>">
            <div class="about-grid" style="align-items:start;">
                <div>
                    <div style="display:flex;align-items:center;gap:16px;margin-bottom:16px;">
                        <div class="card-icon <?= $area['color'] ?>" style="width:56px;height:56px;"><i class="fas <?= $area['icon'] ?>"></i></div>
                        <h2 style="font-size:1.5rem;margin:0;"><?= $area['title'] ?></h2>
                    </div>
                    <p style="color:var(--text-secondary);line-height:1.8;margin-bottom:20px;"><?= $area['desc'] ?></p>
                    <a href="<?= SITE_URL ?>/book-consultation.php?area=<?= urlencode($area['title']) ?>" class="btn btn-primary">Consult an Attorney</a>
                </div>
                <div>
                    <h3 style="font-size:1.1rem;margin-bottom:16px;">Services Offered</h3>
                    <ul style="list-style:none;">
                        <?php foreach ($area['services'] as $svc): ?>
                            <li style="padding:8px 0;border-bottom:1px solid var(--border);display:flex;gap:10px;align-items:center;color:var(--text-secondary);">
                                <i class="fas fa-check-circle" style="color:var(--primary);"></i> <?= $svc ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
