<?php
// Include config if not already included
if (!isset($baseUrl)) {
    include_once __DIR__ . '/../../config.php';
}
?>
<style>
    .site-header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background: var(--header-bg);
        color: var(--header-text);
        border-bottom: 1px solid var(--header-border);
        transition: box-shadow 0.2s ease;
    }

    .site-header.scrolled {
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.2);
    }

    .header-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 14px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }

    .brand {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--header-text);
        text-decoration: none;
    }

    .brand img {
        width: 32px;
        height: 32px;
    }

    .brand span {
        color: #38bdf8;
    }

    .menu-toggle {
        display: none;
        background: transparent;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 8px;
        padding: 6px;
        cursor: pointer;
    }

    .menu-toggle span {
        display: block;
        height: 2px;
        margin: 6px 0;
        background: var(--header-text);
    }

    .site-nav {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .nav-link {
        color: var(--header-text);
        text-decoration: none;
        font-weight: 600;
        background: transparent;
        border: none;
        cursor: pointer;
        font-family: 'Tajawal', 'Inter', sans-serif;
    }

    .nav-link:hover {
        color: #e0f2fe;
    }

    .nav-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-left: 8px;
    }

    .cta-btn {
        padding: 10px 18px;
        border-radius: 999px;
        background: #38bdf8;
        color: #0f172a;
        font-weight: 700;
        text-decoration: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        font-family: 'Tajawal', 'Inter', sans-serif;
    }

    .cta-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 16px rgba(15, 23, 42, 0.2);
    }

    /* Language Selector */
    .lang-selector {
        position: relative;
    }

    .lang-toggle {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 8px 12px;
        background: transparent;
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 8px;
        color: var(--header-text);
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
    }

    .lang-toggle:hover {
        background: rgba(255,255,255,0.1);
    }

    .lang-dropdown {
        position: absolute;
        top: 110%;
        right: 0;
        background: var(--dropdown-bg);
        border-radius: 12px;
        padding: 8px;
        min-width: 200px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.2s ease;
        z-index: 100;
    }

    .lang-selector.open .lang-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .lang-option {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 8px;
        text-decoration: none;
        color: var(--text-color);
        font-size: 14px;
        transition: background 0.2s ease;
    }

    .lang-option:hover {
        background: rgba(56, 189, 248, 0.1);
    }

    .lang-option.active {
        background: rgba(56, 189, 248, 0.2);
        font-weight: 600;
    }

    .lang-flag {
        font-size: 20px;
    }

    .mega-panel {
        display: none;
        position: absolute;
        left: 0;
        right: 0;
        top: 100%;
        background: var(--dropdown-bg);
        border-top: 2px solid var(--header-border);
        padding: 28px 20px 24px;
        box-shadow: 0 20px 40px rgba(15, 23, 42, 0.18);
        color: var(--text-color);
        animation: megaFadeIn 0.2s ease;
    }
    @keyframes megaFadeIn {
        from { opacity: 0; transform: translateY(-8px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .mega-panel.active { display: block; }
    .panel-inner {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 16px;
    }
    .panel-inner > div:nth-child(1) { --col-accent: #3b82f6; --col-accent-bg: rgba(59,130,246,0.08); }
    .panel-inner > div:nth-child(2) { --col-accent: #8b5cf6; --col-accent-bg: rgba(139,92,246,0.08); }
    .panel-inner > div:nth-child(3) { --col-accent: #0ea5e9; --col-accent-bg: rgba(14,165,233,0.08); }
    .panel-inner > div:nth-child(4) { --col-accent: #f59e0b; --col-accent-bg: rgba(245,158,11,0.08); }
    .panel-inner > div:nth-child(5) { --col-accent: #10b981; --col-accent-bg: rgba(16,185,129,0.08); }
    .panel-inner > div {
        background: var(--card-bg);
        border-radius: 14px;
        padding: 16px 14px 14px;
        border-top: 3px solid var(--col-accent, #38bdf8);
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.07);
        transition: box-shadow 0.2s ease, transform 0.2s ease;
    }
    .panel-inner > div:hover {
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.13);
        transform: translateY(-2px);
    }
    html.dark-theme .panel-inner > div,
    [data-theme="dark"] .panel-inner > div {
        background: rgba(255, 255, 255, 0.05);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.35);
    }
    html.dark-theme .panel-inner > div:hover,
    [data-theme="dark"] .panel-inner > div:hover { box-shadow: 0 8px 24px rgba(0, 0, 0, 0.45); }
    .panel-title {
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        color: var(--col-accent, #38bdf8);
        margin-bottom: 10px;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 6px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--border-color, rgba(0,0,0,0.08));
        font-family: 'Tajawal', 'Inter', sans-serif;
    }
    .panel-title-icon { font-size: 1.05rem; line-height: 1; flex-shrink: 0; }
    .panel-links a {
        display: flex;
        align-items: center;
        color: var(--text-color);
        text-decoration: none;
        font-size: 0.87rem;
        padding: 5px 7px;
        border-radius: 7px;
        margin-bottom: 1px;
        transition: background 0.15s, color 0.15s, transform 0.15s;
        font-family: 'Tajawal', 'Inter', sans-serif;
    }
    .panel-links a::before {
        content: '›';
        font-size: 1rem;
        font-weight: 700;
        color: var(--col-accent, #38bdf8);
        opacity: 0;
        width: 0;
        overflow: hidden;
        flex-shrink: 0;
        transition: opacity 0.15s, width 0.15s;
        line-height: 1;
    }
    .panel-links a:hover {
        background: var(--col-accent-bg, rgba(56,189,248,0.1));
        color: var(--col-accent, #38bdf8);
        transform: translateX(4px);
    }
    .panel-links a:hover::before { opacity: 1; width: 14px; }

    @media (max-width: 900px) {
        .menu-toggle { display: inline-flex; }

        .site-nav {
            position: fixed;
            inset: 70px 0 auto 0;
            flex-direction: column;
            background: var(--dropdown-bg);
            padding: 20px;
            transform: translateY(-120%);
            transition: transform 0.2s ease;
        }

        .site-nav.open { transform: translateY(0); }

        .nav-actions { width: 100%; justify-content: center; margin-left: 0; }
        .mega-panel { position: static; box-shadow: none; animation: none; }
    }
</style>

<header class="site-header" id="siteHeader">
    <div class="header-container">
        <a href="<?php echo $pages['home']; ?>" class="brand">
            <img src="<?php echo url('images/shared/logo.svg'); ?>" alt="KeyboardTester logo" width="32" height="32" loading="eager" decoding="async" fetchpriority="high">
            KeyboardTester<span>.click</span>
        </a>

        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false" aria-controls="siteNav">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="site-nav" id="siteNav">
            <a class="nav-link" href="<?php echo $pages['home']; ?>">الرئيسية</a>
            <button class="nav-link" id="toolsToggle" aria-expanded="false" aria-controls="toolsPanel">الأدوات</button>
            <a class="nav-link" href="<?php echo $pages['privacy']; ?>">الخصوصية</a>
            <a class="nav-link" href="<?php echo $pages['about']; ?>">حول</a>

            <div class="nav-actions">
                <div class="lang-selector" id="langSelector">
                    <button class="lang-toggle" id="langToggle" aria-label="Language selector">
                        🌐 <span id="currentLang">AR</span>
                    </button>
                    <div class="lang-dropdown" id="langDropdown">
                        <a href="<?php echo url('tools/keyboard-tester/'); ?>" class="lang-option">
                            <span class="lang-flag">🇬🇧</span>
                            <span>English</span>
                        </a>
                        <a href="<?php echo url('languages/arabic/'); ?>" class="lang-option active">
                            <span class="lang-flag">🇸🇦</span>
                            <span>العربية</span>
                        </a>
                        <a href="<?php echo url('languages/spanish/'); ?>" class="lang-option">
                            <span class="lang-flag">🇪🇸</span>
                            <span>Español</span>
                        </a>
                        <a href="<?php echo url('languages/russian/'); ?>" class="lang-option">
                            <span class="lang-flag">🇷🇺</span>
                            <span>Русский</span>
                        </a>
                        <a href="<?php echo url('languages/french/'); ?>" class="lang-option">
                            <span class="lang-flag">🇫🇷</span>
                            <span>Français</span>
                        </a>
                        <a href="<?php echo url('languages/german/'); ?>" class="lang-option">
                            <span class="lang-flag">🇩🇪</span>
                            <span>Deutsch</span>
                        </a>
                        <a href="<?php echo url('languages/portuguese/'); ?>" class="lang-option">
                            <span class="lang-flag">🇵🇹</span>
                            <span>Português</span>
                        </a>
                        <a href="<?php echo url('languages/japanese/'); ?>" class="lang-option">
                            <span class="lang-flag">🇯🇵</span>
                            <span>日本語</span>
                        </a>
                        <a href="<?php echo url('languages/korean/'); ?>" class="lang-option">
                            <span class="lang-flag">🇰🇷</span>
                            <span>한국어</span>
                        </a>
                    </div>
                </div>
                <button class="theme-toggle" id="themeToggle" data-theme-toggle aria-label="Toggle theme">🌙</button>
                <a href="<?php echo $pages['home']; ?>#tools" class="cta-btn">جرب الأدوات</a>
            </div>
        </nav>
    </div>

    <div class="mega-panel" id="toolsPanel">
        <div class="panel-inner">
            <div>
                <div class="panel-title"><span class="panel-title-icon">⌨️</span> لوحة المفاتيح</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['home']; ?>">اختبار لوحة المفاتيح</a>
                    <a href="<?php echo $pages['keyboard_typing']; ?>">اختبار سرعة الكتابة</a>
                    <a href="<?php echo $pages['latency_check']; ?>">فاحص زمن الاستجابة</a>
                    <a href="<?php echo url('languages/arabic/spacebar-test.php'); ?>">اختبار المسافة</a>
                    <a href="<?php echo url('languages/arabic/reaction-time-test.php'); ?>">وقت الاستجابة</a>
                    <a href="<?php echo url('keyboard-ghosting-test.php'); ?>">اختبار الغوستينغ</a>
                    <a href="<?php echo url('n-key-rollover-test.php'); ?>">N-Key Rollover</a>
                    <a href="<?php echo url('stuck-key-test.php'); ?>">المفتاح العالق</a>
                </div>
            </div>
            <div>
                <div class="panel-title"><span class="panel-title-icon">🖱️</span> الماوس</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['mouse_test']; ?>">اختبار الماوس</a>
                    <a href="<?php echo $pages['click_speed']; ?>">اختبار سرعة النقر</a>
                    <a href="<?php echo $pages['ghost_click']; ?>">كاشف النقرات الشبحية</a>
                    <a href="<?php echo $pages['dpi_tester']; ?>">اختبار DPI</a>
                    <a href="<?php echo url('languages/arabic/mouse-trail.php'); ?>">أثر الماوس</a>
                    <a href="<?php echo url('languages/arabic/polling-rate-test.php'); ?>">معدل الاستطلاع</a>
                    <a href="<?php echo url('scroll-wheel-test.php'); ?>">عجلة التمرير</a>
                    <a href="<?php echo url('double-click-test.php'); ?>">النقر المزدوج</a>
                </div>
            </div>
            <div>
                <div class="panel-title"><span class="panel-title-icon">🖥️</span> الشاشة</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['screen_test']; ?>">اختبار الشاشة</a>
                    <a href="<?php echo $pages['webcam_test']; ?>">اختبار الكاميرا</a>
                    <a href="<?php echo url('languages/arabic/dead-pixel-test.php'); ?>">بكسل ميت</a>
                    <a href="<?php echo url('stuck-pixel-test.php'); ?>">بكسل عالق</a>
                    <a href="<?php echo url('black-screen-test.php'); ?>">الشاشة السوداء</a>
                    <a href="<?php echo url('white-screen-test.php'); ?>">الشاشة البيضاء</a>
                    <a href="<?php echo url('languages/arabic/refresh-rate-test.php'); ?>">معدل التحديث</a>
                    <a href="<?php echo url('languages/arabic/color-test.php'); ?>">اختبار الألوان</a>
                    <a href="<?php echo url('languages/arabic/touch-screen-test.php'); ?>">الشاشة اللمسية</a>
                </div>
            </div>
            <div>
                <div class="panel-title"><span class="panel-title-icon">🎧</span> الصوت</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['mic_test']; ?>">اختبار الميكروفون</a>
                    <a href="<?php echo $pages['headphone_test']; ?>">اختبار السماعات</a>
                    <a href="<?php echo url('microphone-volume-test.php'); ?>">مستوى الميكروفون</a>
                    <a href="<?php echo url('left-right-speaker-test.php'); ?>">مكبر يسار/يمين</a>
                    <a href="<?php echo url('stereo-test.php'); ?>">اختبار الستيريو</a>
                </div>
            </div>
            <div>
                <div class="panel-title"><span class="panel-title-icon">🛠️</span> أدوات مساعدة</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['qr_generator']; ?>">مولد QR</a>
                    <a href="<?php echo $pages['qr_reader']; ?>">قارئ QR</a>
                    <a href="<?php echo $pages['ocr_tool']; ?>">أداة OCR</a>
                    <a href="<?php echo $pages['password_gen']; ?>">مولد كلمات المرور</a>
                    <a href="<?php echo url('whatsapp-link-generator.php'); ?>">رابط واتساب</a>
                    <a href="<?php echo url('luckywheeltoolindex.php'); ?>">عجلة الحظ</a>
                    <a href="<?php echo url('languages/arabic/gamepad-test.php'); ?>">اختبار وحدة التحكم</a>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('siteHeader');
    const menuToggle = document.getElementById('menuToggle');
    const siteNav = document.getElementById('siteNav');
    const toolsToggle = document.getElementById('toolsToggle');
    const toolsPanel = document.getElementById('toolsPanel');
    const themeToggle = document.getElementById('themeToggle');

    // Sync theme icon with current theme state
    function syncThemeIcon() {
        if (!themeToggle) return;
        const isDark = document.documentElement.classList.contains('dark-theme');
        themeToggle.textContent = isDark ? '☀️' : '🌙';
    }

    // Initial sync
    syncThemeIcon();

    // Listen for theme changes from theme.js
    window.addEventListener('themechange', syncThemeIcon);

    // Scroll effect
    window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 40);
    });

    // Mobile menu toggle
    menuToggle.addEventListener('click', () => {
        const isOpen = siteNav.classList.toggle('open');
        menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    // Tools dropdown toggle
    toolsToggle.addEventListener('click', (e) => {
        e.preventDefault();
        const isActive = toolsPanel.classList.toggle('active');
        toolsToggle.setAttribute('aria-expanded', isActive ? 'true' : 'false');
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        const withinHeader = header.contains(e.target);
        if (!withinHeader) {
            toolsPanel.classList.remove('active');
            toolsToggle.setAttribute('aria-expanded', 'false');
        }
    });

    // Close menus when clicking links
    toolsPanel.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            toolsPanel.classList.remove('active');
            toolsToggle.setAttribute('aria-expanded', 'false');
            siteNav.classList.remove('open');
            menuToggle.setAttribute('aria-expanded', 'false');
        });
    });

    // Language selector
    const langToggle = document.getElementById('langToggle');
    const langSelector = document.getElementById('langSelector');

    if (langToggle && langSelector) {
        langToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            langSelector.classList.toggle('open');
        });

        document.addEventListener('click', (e) => {
            if (!langSelector.contains(e.target)) {
                langSelector.classList.remove('open');
            }
        });
    }
});
</script>
