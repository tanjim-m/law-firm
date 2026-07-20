CREATE DATABASE IF NOT EXISTS taj_law_firm;
USE taj_law_firm;

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admins (username, password, email) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@tajlawfirm.com');

CREATE TABLE attorneys (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    photo VARCHAR(255) DEFAULT 'default-attorney.jpg',
    position VARCHAR(100),
    bio TEXT,
    education TEXT,
    experience TEXT,
    licenses TEXT,
    specialties TEXT,
    awards TEXT,
    email VARCHAR(100),
    phone VARCHAR(20),
    linkedin VARCHAR(255),
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE practice_areas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    icon VARCHAR(50) DEFAULT 'fa-balance-scale',
    description TEXT,
    services TEXT,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE case_results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    case_title VARCHAR(200) NOT NULL,
    practice_area_id INT,
    description TEXT,
    outcome TEXT,
    settlement VARCHAR(100),
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (practice_area_id) REFERENCES practice_areas(id) ON DELETE SET NULL
);

CREATE TABLE testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100) NOT NULL,
    review TEXT NOT NULL,
    rating DECIMAL(2,1) DEFAULT 5.0,
    client_photo VARCHAR(255) DEFAULT 'default-client.jpg',
    display_order INT DEFAULT 0,
    is_approved BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE consultations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    practice_area_id INT,
    preferred_date DATE,
    preferred_time TIME,
    message TEXT,
    status ENUM('pending','confirmed','cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (practice_area_id) REFERENCES practice_areas(id) ON DELETE SET NULL
);

CREATE TABLE blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(200) NOT NULL UNIQUE,
    excerpt TEXT,
    content LONGTEXT,
    category ENUM('news','article','case-update') DEFAULT 'article',
    image VARCHAR(255) DEFAULT 'default-blog.jpg',
    is_published BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(200),
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE newsletter_subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE site_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(50) NOT NULL UNIQUE,
    setting_value TEXT
);

INSERT INTO site_settings (setting_key, setting_value) VALUES
('firm_name', 'Taj Law Firm'),
('tagline', 'Justice Served with Integrity and Excellence'),
('year_established', '1998'),
('address', '42 Justice Avenue, Gulshan-2, Dhaka 1212, Bangladesh'),
('phone', '01815267677'),
('email', 'info@tajlawfirm.com'),
('office_hours', 'Saturday to Thursday, 9:00 AM - 10:00 PM'),
('facebook', 'https://facebook.com/tajlawfirm'),
('linkedin', 'https://linkedin.com/company/tajlawfirm'),
('twitter', 'https://twitter.com/tajlawfirm'),
('about_intro', 'Taj Law Firm has been a pillar of legal excellence in Bangladesh since 1998. We combine decades of experience with innovative legal strategies to protect our clients'' rights and interests.'),
('mission', 'To provide accessible, ethical, and effective legal representation to individuals, families, and businesses across Bangladesh, ensuring that justice is not just an ideal but a reality for every client we serve.'),
('values', 'Integrity, Excellence, Compassion, Diligence, Innovation'),
('why_choose_us', 'With over 25 years of legal practice, 98% client satisfaction rate, and attorneys recognized by leading legal publications, Taj Law Firm offers unmatched expertise across diverse practice areas. We treat every case with the attention it deserves.'),
('history', 'Founded in 1998 by a group of passionate legal professionals, Taj Law Firm started as a small practice in Old Dhaka. Over the years, we have grown into one of the most respected full-service law firms in Bangladesh, representing clients in landmark cases and expanding our practice areas to meet the evolving needs of our community.'),
('google_calendar_url', ''),
('calendly_url', 'https://calendly.com/tajlawfirm'),
('primary_color', '#06b6d4'),
('secondary_color', '#f97316');
