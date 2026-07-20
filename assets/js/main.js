// ========== Theme Toggle ==========
const themeToggle = document.getElementById('themeToggle');
const html = document.documentElement;
const savedTheme = localStorage.getItem('theme') || 'light';
html.setAttribute('data-theme', savedTheme);
updateThemeIcon(savedTheme);

themeToggle?.addEventListener('click', () => {
    const current = html.getAttribute('data-theme');
    const next = current === 'dark' ? 'light' : 'dark';
    html.setAttribute('data-theme', next);
    localStorage.setItem('theme', next);
    updateThemeIcon(next);
});

function updateThemeIcon(theme) {
    const icon = themeToggle?.querySelector('i');
    if (icon) {
        icon.className = theme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
    }
}

// ========== Mobile Nav ==========
const navToggle = document.getElementById('navToggle');
const navClose = document.getElementById('navClose');
const mainNav = document.getElementById('mainNav');

navToggle?.addEventListener('click', () => mainNav?.classList.add('open'));
navClose?.addEventListener('click', () => mainNav?.classList.remove('open'));

document.addEventListener('click', (e) => {
    if (mainNav?.classList.contains('open') && !mainNav.contains(e.target) && e.target !== navToggle) {
        mainNav.classList.remove('open');
    }
});

// ========== FAQ Accordion ==========
document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
        const item = btn.parentElement;
        const wasActive = item.classList.contains('active');
        document.querySelectorAll('.faq-item').forEach(el => el.classList.remove('active'));
        if (!wasActive) item.classList.add('active');
    });
});

// ========== Live Chat ==========
const chatToggle = document.getElementById('chatToggle');
const chatClose = document.getElementById('chatClose');
const chatBox = document.getElementById('chatBox');
const chatMessages = document.getElementById('chatMessages');
const chatInput = document.getElementById('chatInput');
const chatSend = document.getElementById('chatSend');

chatToggle?.addEventListener('click', () => {
    chatBox.classList.toggle('open');
    if (chatBox.classList.contains('open')) chatInput?.focus();
});

chatClose?.addEventListener('click', () => chatBox?.classList.remove('open'));

function addChatMessage(text, sender) {
    if (!chatMessages) return;
    const div = document.createElement('div');
    div.className = `chat-msg ${sender}`;
    div.textContent = text;
    chatMessages.appendChild(div);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function sendChatMessage() {
    const text = chatInput?.value.trim();
    if (!text) return;
    addChatMessage(text, 'user');
    chatInput.value = '';
    setTimeout(() => {
        const responses = [
            "Thank you for your message. One of our attorneys will get back to you shortly.",
            "I'd be happy to help. Could you tell me more about your legal matter?",
            "We specialize in that area. Would you like to schedule a consultation?",
            "Our office hours are " + (document.querySelector('.header-contact span:last-child')?.textContent || '9 AM - 10 PM') + ". You can reach us at 01815267677.",
            "You can book a free consultation through our website. Would you like me to guide you through the process?",
        ];
        addChatMessage(responses[Math.floor(Math.random() * responses.length)], 'bot');
    }, 600 + Math.random() * 800);
}

chatSend?.addEventListener('click', sendChatMessage);
chatInput?.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') sendChatMessage();
});

// ========== Attorney Search ==========
const attorneySearch = document.getElementById('attorneySearch');
attorneySearch?.addEventListener('input', function() {
    const query = this.value.toLowerCase();
    document.querySelectorAll('.attorney-card').forEach(card => {
        const name = card.querySelector('.attorney-name')?.textContent.toLowerCase() || '';
        const specialties = card.querySelector('.attorney-specialties')?.textContent.toLowerCase() || '';
        card.style.display = (name.includes(query) || specialties.includes(query)) ? '' : 'none';
    });
});

// ========== Newsletter ==========
document.getElementById('newsletterForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const email = this.querySelector('input[name="email"]').value;
    try {
        const res = await fetch(SITE_URL + '/api/newsletter.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'email=' + encodeURIComponent(email)
        });
        const data = await res.json();
        alert(data.message || 'Subscribed successfully!');
        if (data.success) this.reset();
    } catch (err) {
        alert('Something went wrong. Please try again.');
    }
});

// ========== Form Validation ==========
document.querySelectorAll('form[data-validate]').forEach(form => {
    form.addEventListener('submit', function(e) {
        let valid = true;
        this.querySelectorAll('[required]').forEach(input => {
            if (!input.value.trim()) {
                input.style.borderColor = '#dc2626';
                valid = false;
            } else {
                input.style.borderColor = '';
            }
        });
        if (!valid) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });
});

// ========== Language Switch ==========
const langSelect = document.getElementById('langSelect');
const langData = {
    en: {
        nav: ['Home', 'About', 'Attorneys', 'Practice Areas', 'Case Results', 'Testimonials', 'FAQ', 'Blog', 'Contact'],
        bookBtn: 'Book Consultation',
        chatWelcome: "Hello! Welcome to Taj Law Firm. How can I help you today?",
    },
    bn: {
        nav: ['হোম', 'সম্পর্কে', 'আইনজীবী', 'প্র্যাকটিস এরিয়া', 'মামলার ফলাফল', 'প্রশংসাপত্র', 'প্রশ্নোত্তর', 'ব্লগ', 'যোগাযোগ'],
        bookBtn: 'পরামর্শ বুক করুন',
        chatWelcome: "স্বাগতম! তাজ ল ফার্মে আপনাকে স্বাগতম। আমি কীভাবে সাহায্য করতে পারি?",
    }
};

langSelect?.addEventListener('change', function() {
    const lang = this.value;
    const data = langData[lang];
    if (!data) return;

    // This is a simplified demo - full i18n would need more comprehensive approach
    const navLinks = document.querySelectorAll('.main-nav ul li a');
    navLinks.forEach((link, i) => {
        if (data.nav[i]) link.textContent = data.nav[i];
    });
    const bookBtn = document.querySelector('.main-nav .mobile-only');
    if (bookBtn) bookBtn.textContent = data.bookBtn;
    const desktopBook = document.querySelector('.header-right .btn-primary');
    if (desktopBook) desktopBook.textContent = data.bookBtn;

    localStorage.setItem('lang', lang);
});

// Apply saved language
const savedLang = localStorage.getItem('lang') || 'en';
if (langSelect) langSelect.value = savedLang;
if (savedLang !== 'en') langSelect?.dispatchEvent(new Event('change'));
