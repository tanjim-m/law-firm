<?php
$page_title = 'Case Results';
$page_description = 'See the successful outcomes achieved by Taj Law Firm.';
require_once __DIR__ . '/includes/header.php';
?>
<section class="page-banner">
    <div class="container"><h1>Case Results</h1><p>Proven outcomes that demonstrate our commitment to excellence</p></div>
</section>
<section class="section">
    <div class="container">
        <p style="text-align:center;color:var(--text-secondary);margin-bottom:40px;font-style:italic;">Past results are not a guarantee of future outcomes. Each case is unique and must be evaluated on its own merits.</p>
        <div class="grid-2">
            <?php
            $cases = [
                ['title' => 'State v. Anonymous Client — Criminal Acquittal', 'area' => 'Criminal Defense', 'desc' => 'Client faced multiple felony charges carrying a potential life sentence. Our team conducted an exhaustive independent investigation that uncovered exculpatory evidence missed by law enforcement. After a three-week trial, we demonstrated reasonable doubt on all charges.', 'outcome' => 'Complete Acquittal on All Charges', 'amount' => ''],
                ['title' => 'Major Corp v. International Trading — Breach of Contract', 'area' => 'Corporate Law', 'desc' => 'Represented a major Bangladeshi corporation in a complex breach of contract dispute against an international trading partner. The case involved cross-border issues and complex damages calculations spanning multiple jurisdictions.', 'outcome' => 'Favorable Settlement', 'amount' => 'BDT 5.2 Crore'],
                ['title' => 'Ahmed v. Industrial Corp — Workplace Injury', 'area' => 'Personal Injury', 'desc' => 'Client sustained severe and permanent injuries in a factory accident due to unsafe working conditions. The employer initially denied all liability and offered a minimal settlement that would not cover long-term medical care.', 'outcome' => 'Judgment for Plaintiff', 'amount' => 'BDT 2.8 Crore'],
                ['title' => 'Begum v. Begum — High-Net-Worth Divorce', 'area' => 'Divorce', 'desc' => 'Clients had substantial assets including multiple properties, business interests, and overseas investments. The opposing party attempted to conceal significant assets and undervalue business holdings.', 'outcome' => 'Favorable Asset Division', 'amount' => 'Client received 55% of marital assets'],
                ['title' => 'Rahman Family — Immigration Appeal', 'area' => 'Immigration', 'desc' => 'Family faced imminent deportation after their application was denied due to alleged procedural errors. The case required urgent intervention and presentation of compelling humanitarian grounds.', 'outcome' => 'Deportation Order Reversed', 'amount' => 'Family granted permanent residency'],
                ['title' => 'Dhaka Properties Ltd. v. Govt — Land Dispute', 'area' => 'Real Estate', 'desc' => 'Decades-old land dispute involving prime commercial property in central Dhaka. Multiple parties claimed ownership through conflicting chains of title dating back several generations.', 'outcome' => 'Title Quieted in Favor of Client', 'amount' => 'Property valued at BDT 12 Crore'],
                ['title' => 'Employee Rights Coalition — Wrongful Termination', 'area' => 'Employment Law', 'desc' => 'Represented a group of 45 employees wrongfully terminated during a corporate restructuring. The employer violated labor laws regarding notice periods and severance compensation.', 'outcome' => 'Full Compensation Awarded', 'amount' => 'BDT 1.4 Crore collective'],
                ['title' => 'Tax Authority Dispute — Corporate Tax Assessment', 'area' => 'Tax Law', 'desc' => 'Client received a tax assessment demanding substantial additional taxes and penalties. Our tax team identified errors in the assessment methodology and presented alternative calculations based on applicable law.', 'outcome' => 'Assessment Reduced by 80%', 'amount' => 'Client saved BDT 3.6 Crore'],
            ];
            foreach ($cases as $c): ?>
                <div class="card case-result">
                    <div class="case-result-icon" style="font-size:1.8rem;">
                        <?php
                        $icons = ['Criminal Defense' => '⚖️', 'Corporate Law' => '🏛️', 'Personal Injury' => '🏥', 'Divorce' => '💍', 'Immigration' => '🌍', 'Real Estate' => '🏠', 'Employment Law' => '💼', 'Tax Law' => '📊'];
                        echo $icons[$c['area']] ?? '⚖️';
                        ?>
                    </div>
                    <div>
                        <span class="specialty-tag" style="margin-bottom:8px;display:inline-block;"><?= $c['area'] ?></span>
                        <h3 style="font-size:1.1rem;"><?= $c['title'] ?></h3>
                        <p style="color:var(--text-secondary);font-size:0.9rem;line-height:1.6;margin:8px 0;"><?= $c['desc'] ?></p>
                        <p class="case-result-outcome">✓ <?= $c['outcome'] ?></p>
                        <?php if ($c['amount']): ?><p class="case-result-settlement"><?= $c['amount'] ?></p><?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
