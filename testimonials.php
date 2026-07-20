<?php
$page_title = 'Client Testimonials';
$page_description = 'See what our clients say about Taj Law Firm.';
require_once __DIR__ . '/includes/header.php';
?>
<section class="page-banner">
    <div class="container"><h1>Client Testimonials</h1><p>Hear from the people we've had the privilege to serve</p></div>
</section>
<section class="section">
    <div class="container">
        <div class="testi-grid">
            <?php
            $testimonials = [
                ['name' => 'Mohammad Ali', 'role' => 'Business Owner, Dhaka', 'stars' => 5, 'text' => 'Taj Law Firm handled my corporate litigation case with exceptional professionalism and strategic insight. Their attention to detail and aggressive representation saved my business from a potentially devastating lawsuit. Barrister Tanvir Islam was particularly impressive in his handling of complex commercial matters. I have recommended the firm to several of my business associates.'],
                ['name' => 'Fatema Begum', 'role' => 'School Teacher, Khulna', 'stars' => 5, 'text' => 'Going through a divorce after 15 years of marriage was incredibly difficult, but Advocate Sabrina Chowdhury provided the perfect balance of compassion and professional strength. She fought to protect my rights and ensure my children\'s well-being was prioritized. The settlement she secured was fair and provided the stability my family needed to move forward.'],
                ['name' => 'Abdur Rahim', 'role' => 'Software Engineer, Dhaka', 'stars' => 5, 'text' => 'I was falsely accused in a criminal case and thought my career and reputation were ruined. Barrister Rafiq Hassan took my case personally and his team worked tirelessly to prove my innocence. The investigation they conducted was more thorough than the police work. I was completely exonerated and can now rebuild my life. I cannot express my gratitude enough.'],
                ['name' => 'Ayesha Sultana', 'role' => 'Startup Founder, Chattogram', 'stars' => 5, 'text' => 'As a first-time entrepreneur, I was overwhelmed by the legal aspects of starting a business. The corporate team at Taj Law Firm guided me through every step - from incorporation to intellectual property protection and contract drafting. They continue to be our legal counsel as we grow. Truly a partner in our success.'],
                ['name' => 'Dr. Karim Mahmud', 'role' => 'Physician, Sylhet', 'stars' => 4, 'text' => 'After my car accident, I was dealing with severe injuries and uncooperative insurance companies. Barrister Kamal Hossain handled everything, from dealing with the insurers to filing the court case. The compensation secured covered all my medical expenses, rehabilitation, and lost income during recovery. Very professional and responsive service.'],
                ['name' => 'Nargis Akhter', 'role' => 'Homemaker, Rajshahi', 'stars' => 5, 'text' => 'When my husband passed away without a proper will, I was lost about our property and finances. Advocate Farzana Akhter guided my family through the entire estate administration process with patience and clarity. She helped resolve complex property issues that I could never have handled on my own.'],
                ['name' => 'Imran Hossain', 'role' => 'Real Estate Developer, Dhaka', 'stars' => 5, 'text' => 'We had a extremely complex land dispute that had dragged on for years with our previous law firm. Taj Law Firm took over and resolved it within 8 months. Their real estate practice is simply the best in the business. The title verification work they did was meticulous and prevented future complications.'],
                ['name' => 'Sharmin Rahman', 'role' => 'HR Director, Multinational Corp', 'stars' => 5, 'text' => 'We engaged Taj Law Firm for a comprehensive review of our employment policies and handling of a sensitive workplace investigation. Advocate Nusrat Jahan provided expert guidance that balanced legal compliance with practical business needs. Her knowledge of both local labor law and international standards was impressive.'],
                ['name' => 'Tariqul Islam', 'role' => 'Expatriate Worker, Dubai', 'stars' => 5, 'text' => 'My family\'s visa applications had been denied multiple times despite meeting all requirements. The immigration team at Taj Law Firm identified procedural errors in the previous applications and represented us in the appeal process. My family is now with me thanks to their dedication and expertise.'],
            ];
            foreach ($testimonials as $t): ?>
                <div class="card testi-card">
                    <div class="testi-stars" style="font-size:1.1rem;"><?= str_repeat('★', (int)$t['stars']) ?><?= str_repeat('☆', 5 - (int)$t['stars']) ?></div>
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
<?php require_once __DIR__ . '/includes/footer.php'; ?>
