<?php
$page_title = 'Frequently Asked Questions';
$page_description = 'Find answers to common legal questions at Taj Law Firm.';
require_once __DIR__ . '/includes/header.php';
?>
<section class="page-banner">
    <div class="container"><h1>Frequently Asked Questions</h1><p>Quick answers to common questions about our legal services</p></div>
</section>
<section class="section">
    <div class="container">
        <div class="faq-list">
            <?php
            $faqs = [
                ['q' => 'How much does a consultation cost?', 'a' => 'Your initial consultation at Taj Law Firm is <strong>completely free</strong>. We believe everyone deserves access to quality legal advice without financial barriers. During this consultation, we will evaluate your case, discuss your options, and outline our proposed strategy. There is no obligation to retain our services after the consultation.'],
                ['q' => 'What should I bring to my first meeting?', 'a' => 'To make your consultation as productive as possible, please bring: <br><br>• Any relevant legal documents (contracts, notices, court papers, correspondence)<br>• Identification documents<br>• A written summary of your situation with key dates and details<br>• List of questions you want to ask<br>• Financial documents if relevant to your case<br><br>The more information you provide, the better we can assess your situation.'],
                ['q' => 'Do you offer virtual consultations?', 'a' => 'Yes! We offer virtual consultations via Zoom, Google Meet, and phone for clients who cannot visit our office in person. This is particularly convenient for clients outside Dhaka or those with mobility constraints. The quality of our virtual consultations is equivalent to in-person meetings, and all confidentiality standards are maintained.'],
                ['q' => 'What areas do you serve?', 'a' => 'Our main office is located in Gulshan-2, Dhaka, and we serve clients across all of Bangladesh. Our attorneys are licensed to practice in courts throughout the country, including the Supreme Court of Bangladesh. We have represented clients from all eight divisions: Dhaka, Chattogram, Rajshahi, Khulna, Sylhet, Barishal, Rangpur, and Mymensingh.'],
                ['q' => 'How do you charge for legal services?', 'a' => 'Our fee structure depends on the type of case:<br><br>• <strong>Contingency fees</strong> (personal injury cases): You pay nothing unless we win your case. Our fee is a percentage of the recovery.<br>• <strong>Hourly rates</strong>: Common for corporate and litigation matters. You are billed for actual time spent.<br>• <strong>Fixed/flat fees</strong>: Available for certain services like simple wills, uncontested divorces, and document drafting.<br>• <strong>Retainers</strong>: An upfront deposit against which we bill for services.<br><br>We will clearly explain all fees during your consultation.'],
                ['q' => 'How long will my case take?', 'a' => 'Case duration varies significantly based on complexity, court schedules, and the opposing party\'s approach. Simple matters like uncontested divorces or document drafting may take 2-4 weeks. Complex litigation can take 6-18 months or longer. We provide realistic timeline estimates during your consultation and keep you updated throughout the process.'],
                ['q' => 'Will my information be kept confidential?', 'a' => 'Absolutely. Attorney-client confidentiality is a fundamental principle of legal practice and we take it very seriously. Anything you discuss with our attorneys is protected by attorney-client privilege and will not be disclosed to anyone without your express permission. This includes all documents, communications, and consultations.'],
                ['q' => 'Do you handle cases outside of Bangladesh?', 'a' => 'Yes, we handle cross-border legal matters through our network of international partner law firms. This includes international business transactions, cross-border family law matters, immigration to other countries, and cases involving foreign parties. We coordinate with qualified local counsel in the relevant jurisdiction.'],
                ['q' => 'What makes Taj Law Firm different from other firms?', 'a' => 'Three things set us apart: <strong>Experience</strong> — 25+ years handling complex cases across diverse practice areas. <strong>Results</strong> — Over 5,000 successful cases and millions in settlements for clients. <strong>Care</strong> — We treat every client like family, providing personalized attention that larger firms cannot match. We combine the expertise of a large firm with the personal touch of a boutique practice.'],
                ['q' => 'Can I switch lawyers in the middle of my case?', 'a' => 'Yes, you have the right to change legal representation at any time. If you are dissatisfied with your current attorney, we can review your case and assist with the transition. We will coordinate with your previous counsel to obtain your files and ensure a smooth handover. Your case will not be negatively affected by the change.'],
                ['q' => 'Do you offer payment plans?', 'a' => 'Yes, we understand that legal fees can be a significant expense. We offer flexible payment plans for eligible clients, particularly in family law and personal injury matters. During your consultation, we can discuss payment options that work with your financial situation. We believe access to justice should not be limited by financial constraints.'],
                ['q' => 'What happens if I lose my case?', 'a' => 'While our track record is excellent, no law firm can guarantee outcomes. If your case does not result in the desired outcome, we will discuss the reasons and your options, which may include appeals. For contingency fee cases, you owe no attorney fees if you do not recover compensation. We are transparent about risks from the beginning.'],
            ];
            foreach ($faqs as $index => $faq): ?>
                <div class="faq-item <?= $index === 0 ? 'active' : '' ?>">
                    <button class="faq-question">
                        <?= $faq['q'] ?>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p style="line-height:1.8;"><?= $faq['a'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
