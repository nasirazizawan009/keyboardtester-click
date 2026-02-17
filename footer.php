<?php
// Include config if not already included
if (!isset($baseUrl)) {
    include_once __DIR__ . '/config.php';
}
?>
<!-- footer.php - Optimized version with better SEO and structure -->
<footer class="site-footer">
    <div class="footer-container">
        <!-- About Section -->
        <div class="footer-section about-section">
            <div class="footer-logo">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 10H21M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#38bdf8" stroke-width="2" stroke-linecap="round"/>
                    <path d="M8 12H8.01M12 12H12.01M16 12H16.01M8 16H8.01M12 16H12.01M16 16H16.01" stroke="#38bdf8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h3>KeyboardTester</h3>
            </div>
            <p class="footer-description">
                Modern testing tools for keyboards, mice, audio, screens, and more—built for clarity, accuracy, and speed.
            </p>
            <div class="social-links">
                <a href="<?php echo $socialLinks['gitlab']; ?>" target="_blank" rel="noopener noreferrer" aria-label="View source code on GitLab">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22.65 14.39L12 22.13 1.35 14.39a.84.84 0 0 1-.3-.94l1.22-3.78 2.44-7.51A.42.42 0 0 1 4.82 2a.43.43 0 0 1 .58 0 .42.42 0 0 1 .11.18l2.44 7.49h8.1l2.44-7.51A.42.42 0 0 1 18.6 2a.43.43 0 0 1 .58 0 .42.42 0 0 1 .11.18l2.44 7.51L23 13.45a.84.84 0 0 1-.35.94z"></path>
                    </svg>
                    GitLab
                </a>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="footer-section">
            <h4 class="footer-heading">Quick Links</h4>
            <ul class="footer-links">
                <li><a href="<?php echo $pages['home']; ?>">Home</a></li>
                <li><a href="<?php echo $pages['blog']; ?>">Blog</a></li>
                <li><a href="<?php echo $pages['about']; ?>">About Us</a></li>
                <li><a href="<?php echo $pages['privacy']; ?>">Privacy Policy</a></li>
                <li><a href="<?php echo $pages['disclaimer']; ?>">Disclaimer</a></li>
            </ul>
        </div>

        <!-- Testing Tools -->
        <div class="footer-section">
            <h4 class="footer-heading">Testing Tools</h4>
            <ul class="footer-links">
                <li><a href="<?php echo $pages['home']; ?>">⌨️ Keyboard Tester</a></li>
                <li><a href="<?php echo $pages['mouse_test']; ?>">🖱️ Mouse Tester</a></li>
                <li><a href="<?php echo $pages['keyboard_typing']; ?>">⚡ Typing Speed Test</a></li>
                <li><a href="<?php echo $pages['click_speed']; ?>">⚡ Click Speed Test</a></li>
                <li><a href="<?php echo $pages['screen_test']; ?>">🖥️ Screen Tester</a></li>
                <li><a href="<?php echo $pages['mic_test']; ?>">🎤 Mic Tester</a></li>
                <li><a href="<?php echo $pages['webcam_test']; ?>">📹 Webcam Tester</a></li>
            </ul>
        </div>

        <!-- Other Tools -->
        <div class="footer-section">
            <h4 class="footer-heading">More Tools</h4>
            <ul class="footer-links">
                <li><a href="<?php echo $pages['qr_generator']; ?>">📱 QR Generator</a></li>
                <li><a href="<?php echo $pages['ocr_tool']; ?>">📄 OCR Tool</a></li>
                <li><a href="<?php echo $pages['password_gen']; ?>">🔐 Password Generator</a></li>
                <li><a href="<?php echo $pages['ghost_click']; ?>">👻 Ghost Click Detector</a></li>
                <li><a href="<?php echo $pages['whatsapp_link']; ?>">💬 WhatsApp Link</a></li>
                <li><a href="<?php echo $pages['lucky_wheel']; ?>">🎯 Lucky Wheel</a></li>
            </ul>
        </div>

        <!-- Help & Resources -->
        <div class="footer-section">
            <h4 class="footer-heading">Help & Resources</h4>
            <ul class="footer-links">
                <li><a href="<?php echo $pages['feedback']; ?>">💡 Feedback</a></li>
                <li><a href="<?php echo $pages['privacy']; ?>">🔒 Privacy & Security</a></li>
                <li><a href="<?php echo $pages['disclaimer']; ?>">📄 Terms & Disclaimer</a></li>
                <li><a href="<?php echo $pages['blog']; ?>">📝 Guides & Tips</a></li>
            </ul>
        </div>

        <!-- Contact & Newsletter -->
        <div class="footer-section contact-section">
            <h4 class="footer-heading">Stay Connected</h4>
            <div class="contact-info">
                <a href="mailto:<?php echo $siteEmail; ?>" class="contact-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <?php echo $siteEmail; ?>
                </a>
            </div>
            
            <div class="newsletter">
                <p>Get updates on new tools and features</p>
                <form class="newsletter-form" action="#" method="post">
                    <input type="email" name="email" placeholder="Your email address" required aria-label="Email address for newsletter">
                    <button type="submit" aria-label="Subscribe to newsletter">Subscribe</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p class="copyright">
            &copy; <?php echo $siteYear; ?> <a href="<?php echo $pages['home']; ?>"><?php echo $siteName; ?></a>. All rights reserved.
        </p>
        <p class="tagline">
            Built with <span class="heart">❤️</span> for tech enthusiasts worldwide
        </p>
        <p class="partner-link">
            <a href="https://www.freewebsubmission.com" target="_blank" rel="noopener">Submit your site</a>
        </p>
        <script src="https://www.freewebsubmission.com/js/remote-submit.js" async></script>
    </div>
</footer>

<button id="back-to-top" class="back-to-top" aria-label="Scroll to top">↑</button>

<!-- Organization Schema moved to /includes/schema.php for centralized management -->

<style>
    /* Footer Styles */
    .site-footer {
        --footer-bg: #0b1220;
        --footer-surface: rgba(15, 23, 42, 0.78);
        --footer-border: rgba(148, 163, 184, 0.18);
        --footer-accent: #38bdf8;
        --footer-text: #e2e8f0;
        --footer-muted: #94a3b8;
        background:
            radial-gradient(900px 320px at 10% 0%, rgba(56, 189, 248, 0.16), transparent 60%),
            radial-gradient(700px 280px at 90% 20%, rgba(14, 165, 233, 0.14), transparent 60%),
            var(--footer-bg);
        color: var(--footer-text);
        padding: 80px 20px 28px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        margin-top: 90px;
        border-top: 1px solid var(--footer-border);
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 28px;
        margin-bottom: 36px;
    }

    /* About Section */
    .about-section {
        grid-column: span 2;
    }

    .footer-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
    }

    .footer-logo h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--footer-accent);
        margin: 0;
    }

    .footer-description {
        font-size: 0.95rem;
        line-height: 1.6;
        color: var(--footer-muted);
        margin-bottom: 20px;
    }

    .back-to-top {
        position: fixed;
        right: 20px;
        bottom: 24px;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: none;
        background: #38bdf8;
        color: #0f172a;
        font-weight: 700;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.25);
        cursor: pointer;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.2s ease, transform 0.2s ease;
        z-index: 9999;
    }

    .back-to-top.show {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0);
    }

    /* Social Links */
    .social-links {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .social-links a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        background: rgba(56, 189, 248, 0.12);
        color: var(--footer-text);
        text-decoration: none;
        border-radius: 999px;
        font-size: 0.875rem;
        font-weight: 600;
        transition: all 0.25s ease;
        border: 1px solid rgba(56, 189, 248, 0.2);
    }

    .social-links a:hover {
        background: rgba(56, 189, 248, 0.24);
        color: #e0f2fe;
        transform: translateY(-2px);
    }

    /* Footer Sections */
    .footer-section {
        display: flex;
        flex-direction: column;
        background: var(--footer-surface);
        border: 1px solid var(--footer-border);
        border-radius: 18px;
        padding: 20px 22px;
        box-shadow: 0 18px 40px rgba(2, 6, 23, 0.35);
        backdrop-filter: blur(10px);
    }

    .footer-heading {
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--footer-accent);
        margin-bottom: 16px;
        position: relative;
        padding-bottom: 8px;
    }

    .footer-heading::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 3px;
        background: var(--footer-accent);
        border-radius: 999px;
    }

    /* Footer Links */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .footer-links a {
        color: var(--footer-muted);
        text-decoration: none;
        font-size: 0.9375rem;
        transition: all 0.25s ease;
        display: inline-block;
    }

    .footer-links a:hover {
        color: #e0f2fe;
        padding-left: 6px;
    }

    .footer-section:nth-child(5) .footer-links a:hover {
        padding-left: 0;
    }

    /* Contact Section */
    .contact-info {
        margin-bottom: 20px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--footer-muted);
        text-decoration: none;
        font-size: 0.9375rem;
        margin-bottom: 12px;
        transition: color 0.25s ease;
    }

    .contact-item:hover {
        color: #e0f2fe;
    }

    .contact-item svg {
        flex-shrink: 0;
    }

    /* Newsletter */
    .newsletter {
        margin-top: 20px;
    }

    .newsletter p {
        font-size: 0.9375rem;
        color: var(--footer-muted);
        margin-bottom: 12px;
    }

    .newsletter-form {
        display: flex;
        gap: 10px;
        align-items: stretch;
    }

    .newsletter-form input {
        flex: 1;
        min-width: 0;
        height: 44px;
        padding: 0 16px;
        border: 1px solid rgba(148, 163, 184, 0.2);
        background: rgba(255, 255, 255, 0.04);
        color: var(--footer-text);
        border-radius: 10px;
        font-size: 0.875rem;
        transition: all 0.25s ease;
        box-sizing: border-box;
    }

    .newsletter-form input:focus {
        outline: none;
        border-color: var(--footer-accent);
        background: rgba(255, 255, 255, 0.08);
    }

    .newsletter-form input::placeholder {
        color: var(--footer-muted);
    }

    .newsletter-form button {
        flex-shrink: 0;
        height: 44px;
        min-width: 110px;
        padding: 0 24px;
        background: linear-gradient(135deg, #38bdf8, #0ea5e9);
        color: #0f172a;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.25s ease;
        white-space: nowrap;
        display: flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
    }

    .newsletter-form button:hover {
        background: linear-gradient(135deg, #7dd3fc, #38bdf8);
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(56, 189, 248, 0.35);
    }

    /* Footer Bottom */
    .footer-bottom {
        max-width: 1200px;
        margin: 0 auto;
        padding-top: 28px;
        border-top: 1px solid var(--footer-border);
        text-align: center;
    }

    .copyright {
        font-size: 0.875rem;
        color: var(--footer-muted);
        margin-bottom: 8px;
    }

    .copyright a {
        color: var(--footer-accent);
        text-decoration: none;
        font-weight: 600;
        transition: color 0.25s ease;
    }

    .copyright a:hover {
        color: #7dd3fc;
    }

    .tagline {
        font-size: 0.875rem;
        color: var(--footer-muted);
        margin: 0;
    }

    .partner-link {
        font-size: 0.75rem;
        color: var(--footer-muted);
        margin-top: 16px;
        opacity: 0.6;
    }

    .partner-link a {
        color: var(--footer-muted);
        text-decoration: none;
    }

    .partner-link a:hover {
        color: var(--footer-accent);
    }

    .heart {
        color: #ef4444;
        animation: heartbeat 1.5s ease-in-out infinite;
    }

    @keyframes heartbeat {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .site-footer {
            padding: 50px 16px 20px;
            margin-top: 60px;
        }

        .footer-container {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .about-section {
            text-align: center;
            grid-column: span 1;
        }

        .footer-logo {
            justify-content: center;
        }

        .social-links {
            justify-content: center;
        }

        .footer-heading::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .footer-links {
            align-items: center;
        }

        .footer-links a:hover {
            padding-left: 0;
        }

        .contact-section {
            align-items: center;
            text-align: center;
        }

        .contact-item {
            justify-content: center;
        }

        .newsletter-form {
            flex-direction: column;
            align-items: stretch;
        }

        .newsletter-form input {
            width: 100%;
        }

        .newsletter-form button {
            width: 100%;
            min-width: unset;
            height: 46px;
        }
    }

    /* Accessibility */
    .footer-links a:focus,
    .social-links a:focus,
    .contact-item:focus,
    .newsletter-form input:focus,
    .newsletter-form button:focus {
        outline: 2px solid #7dd3fc;
        outline-offset: 2px;
    }

    /* Print Styles */
    @media print {
        .site-footer {
            background: white;
            color: black;
        }

        .newsletter,
        .social-links {
            display: none;
        }
    }
</style>

<script>
    const backToTop = document.getElementById('back-to-top');
    if (backToTop) {
        const toggleBackToTop = () => {
            if (window.scrollY > 400) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        };
        window.addEventListener('scroll', toggleBackToTop, { passive: true });
        toggleBackToTop();
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
</script>
