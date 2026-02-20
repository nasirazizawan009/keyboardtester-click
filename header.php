<?php
// Include config if not already included
if (!isset($baseUrl)) {
    include_once __DIR__ . '/config.php';
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
    }

    .cta-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 16px rgba(15, 23, 42, 0.2);
    }

    /* Theme Toggle Button */
    .theme-toggle {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        padding: 0;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 10px;
        color: var(--header-text);
        font-size: 1.25rem;
        cursor: pointer;
        transition: background 0.2s ease, transform 0.2s ease;
    }

    .theme-toggle:hover {
        background: rgba(255,255,255,0.2);
        transform: scale(1.05);
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
        border-top: 1px solid var(--header-border);
        padding: 24px 20px;
        box-shadow: 0 16px 30px rgba(15, 23, 42, 0.2);
        color: var(--text-color);
    }

    .mega-panel.active {
        display: block;
    }

    .panel-inner {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 18px;
    }

    .panel-inner > div {
        background: rgba(15, 23, 42, 0.04);
        border-radius: 14px;
        padding: 12px 14px;
    }

    html.dark-theme .panel-inner > div,
    [data-theme="dark"] .panel-inner > div {
        background: rgba(255, 255, 255, 0.04);
    }

    .panel-title {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #7dd3fc;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .panel-links a {
        display: block;
        color: var(--text-color);
        text-decoration: none;
        font-size: 0.95rem;
        margin-bottom: 6px;
    }

    .panel-links a:hover {
        color: var(--link-color);
    }

    /* Mobile Tools Menu - hidden on desktop */
    .mobile-tools-menu {
        display: none;
    }

    /* Mobile styles */
    @media (max-width: 900px) {
        .header-container {
            padding: 12px 16px;
        }

        /* Mobile tools menu styling */
        .mobile-tools-menu {
            display: none;
            width: 100%;
            padding: 8px 0;
            margin: 4px 0;
            border-radius: 12px;
            background: rgba(15,23,42,0.06);
        }

        html.dark-theme .mobile-tools-menu,
        [data-theme="dark"] .mobile-tools-menu {
            background: rgba(255,255,255,0.06);
        }

        .mobile-tools-menu.open {
            display: block;
        }

        .mobile-tools-menu a {
            display: block;
            padding: 12px 16px;
            color: var(--text-color);
            text-decoration: none;
            font-size: 0.95rem;
            border-radius: 8px;
            margin: 2px 8px;
            transition: background 0.2s ease;
        }

        .mobile-tools-menu a:hover,
        .mobile-tools-menu a:active {
            background: rgba(56,189,248,0.15);
        }

        .brand {
            font-size: 1rem;
        }

        .brand img {
            width: 28px;
            height: 28px;
        }

        .menu-toggle {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: rgba(255,255,255,0.1);
        }

        .menu-toggle span {
            width: 22px;
            height: 2px;
            margin: 3px 0;
            transition: all 0.2s ease;
        }

        .menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        .site-nav {
            position: fixed;
            inset: 60px 0 0 0;
            flex-direction: column;
            background: var(--dropdown-bg);
            padding: 20px;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            overflow-y: auto;
            gap: 8px;
            z-index: 999;
        }

        .site-nav.open {
            transform: translateX(0);
        }

        .site-nav .nav-link {
            display: block;
            padding: 14px 16px;
            border-radius: 10px;
            background: rgba(15,23,42,0.04);
            text-align: left;
            font-size: 1rem;
            color: var(--text-color);
            width: 100%;
        }

        html.dark-theme .site-nav .nav-link,
        [data-theme="dark"] .site-nav .nav-link {
            background: rgba(255,255,255,0.05);
        }

        .site-nav .nav-link:hover,
        .site-nav .nav-link:active {
            background: rgba(56,189,248,0.12);
        }

        .nav-actions {
            width: 100%;
            flex-direction: column;
            margin-left: 0;
            margin-top: 12px;
            padding-top: 16px;
            border-top: 1px solid var(--card-border);
            gap: 10px;
        }

        .nav-actions > * {
            width: 100%;
        }

        .lang-selector {
            width: 100%;
        }

        .lang-toggle {
            width: 100%;
            justify-content: center;
            padding: 12px;
            font-size: 15px;
        }

        .lang-dropdown {
            position: static;
            margin-top: 8px;
            width: 100%;
            box-shadow: none;
            border: 1px solid var(--card-border);
        }

        .lang-option {
            padding: 12px 14px;
        }

        .theme-toggle {
            padding: 12px;
            width: 100%;
            border-radius: 10px;
            font-size: 1.1rem;
        }

        .cta-btn {
            display: block;
            text-align: center;
            padding: 14px 20px;
            font-size: 1rem;
        }

        .mega-panel {
            position: static;
            box-shadow: none;
            padding: 16px 0;
            border-top: none;
            margin-top: 8px;
        }

        .panel-inner {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .panel-inner > div {
            padding: 14px 16px;
        }

        .panel-links a {
            padding: 8px 0;
            font-size: 0.95rem;
        }
    }

    /* Small mobile */
    @media (max-width: 480px) {
        .header-container {
            padding: 10px 12px;
        }

        .brand {
            font-size: 0.9rem;
            gap: 8px;
        }

        .brand img {
            width: 26px;
            height: 26px;
        }

        .site-nav {
            inset: 55px 0 0 0;
            padding: 16px 12px;
        }

        .site-nav .nav-link {
            padding: 12px 14px;
            font-size: 0.95rem;
        }
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
            <a class="nav-link" href="<?php echo $pages['home']; ?>">Home</a>
            <button class="nav-link" id="toolsToggle" aria-expanded="false" aria-controls="toolsPanel">Tools</button>

            <!-- Mobile Tools Menu (shown inside nav on mobile) -->
            <div class="mobile-tools-menu" id="mobileToolsMenu">
                <a href="<?php echo $pages['home']; ?>">Keyboard Tester</a>
                <a href="<?php echo $pages['keyboard_typing']; ?>">Typing Speed Test</a>
                <a href="<?php echo $pages['mouse_test']; ?>">Mouse Tester</a>
                <a href="<?php echo $pages['click_speed']; ?>">Click Speed Test</a>
                <a href="<?php echo $pages['ghost_click']; ?>">Ghost Click Detector</a>
                <a href="<?php echo $pages['dpi_tester']; ?>">DPI Tester</a>
                <a href="<?php echo $pages['screen_test']; ?>">Screen Tester</a>
                <a href="<?php echo $pages['webcam_test']; ?>">Webcam Tester</a>
                <a href="<?php echo $pages['mic_test']; ?>">Microphone Tester</a>
                <a href="<?php echo $pages['headphone_test']; ?>">Headphone Tester</a>
                <a href="<?php echo $pages['qr_generator']; ?>">QR Generator</a>
                <a href="<?php echo $pages['ocr_tool']; ?>">OCR Tool</a>
                <a href="<?php echo $pages['password_gen']; ?>">Password Generator</a>
                <a href="<?php echo $pages['whatsapp_link']; ?>">WhatsApp Link</a>
            </div>

            <a class="nav-link" href="<?php echo $pages['privacy']; ?>">Privacy</a>
            <a class="nav-link" href="<?php echo $pages['about']; ?>">About</a>

            <div class="nav-actions">
                <div class="lang-selector" id="langSelector">
                    <button class="lang-toggle" id="langToggle" aria-label="Language selector">
                        🌐 <span id="currentLang">EN</span>
                    </button>
                    <div class="lang-dropdown" id="langDropdown">
                        <a href="<?php echo url('tools/keyboard-tester/'); ?>" class="lang-option">
                            <span class="lang-flag">🇬🇧</span>
                            <span>English</span>
                        </a>
                        <a href="<?php echo url('languages/arabic/'); ?>" class="lang-option">
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
                        <a href="<?php echo url('keyboard_tester_korean_index.php'); ?>" class="lang-option">
                            <span class="lang-flag">🇰🇷</span>
                            <span>한국어</span>
                        </a>
                    </div>
                </div>
                <button class="theme-toggle" id="themeToggle" data-theme-toggle aria-label="Toggle theme">🌙</button>
                <a href="<?php echo $pages['home']; ?>#tools" class="cta-btn">Try Tools</a>
            </div>
        </nav>
    </div>

    <div class="mega-panel" id="toolsPanel">
        <div class="panel-inner">
            <div>
                <div class="panel-title">Keyboard</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['home']; ?>">Keyboard Tester</a>
                    <a href="<?php echo $pages['keyboard_typing']; ?>">Typing Speed Test</a>
                    <a href="<?php echo $pages['latency_check']; ?>">Latency Checker</a>
                </div>
            </div>
            <div>
                <div class="panel-title">Mouse</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['mouse_test']; ?>">Mouse Tester</a>
                    <a href="<?php echo $pages['click_speed']; ?>">Click Speed Test</a>
                    <a href="<?php echo $pages['ghost_click']; ?>">Ghost Click Detector</a>
                    <a href="<?php echo $pages['dpi_tester']; ?>">DPI Tester</a>
                </div>
            </div>
            <div>
                <div class="panel-title">Display</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['screen_test']; ?>">Screen Tester</a>
                    <a href="<?php echo $pages['webcam_test']; ?>">Webcam Tester</a>
                </div>
            </div>
            <div>
                <div class="panel-title">Audio</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['mic_test']; ?>">Microphone Tester</a>
                    <a href="<?php echo $pages['headphone_test']; ?>">Headphone Tester</a>
                </div>
            </div>
            <div>
                <div class="panel-title">Utilities</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['qr_generator']; ?>">QR Generator</a>
                    <a href="<?php echo $pages['qr_reader']; ?>">QR Reader</a>
                    <a href="<?php echo $pages['ocr_tool']; ?>">OCR Tool</a>
                    <a href="<?php echo $pages['password_gen']; ?>">Password Generator</a>
                    <a href="<?php echo $pages['whatsapp_link']; ?>">WhatsApp Link</a>
                    <a href="<?php echo $pages['lucky_wheel']; ?>">Lucky Wheel</a>
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

    function syncThemeIcon() {
        if (!themeToggle) return;
        const isDark = document.documentElement.classList.contains('dark-theme');
        themeToggle.textContent = isDark ? '☀️' : '🌙';
    }

    syncThemeIcon();
    window.addEventListener('themechange', syncThemeIcon);

    // Theme toggle is handled by theme.js (assets/js/theme.js)
    // This script only syncs the icon via the themechange event listener above

    if (header) {
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 40);
        });
    }

    if (menuToggle && siteNav) {
        menuToggle.addEventListener('click', () => {
            const isOpen = siteNav.classList.toggle('open');
            menuToggle.classList.toggle('active', isOpen);
            menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            // Prevent body scroll when menu is open
            document.body.style.overflow = isOpen ? 'hidden' : '';
        });
    }

    const mobileToolsMenu = document.getElementById('mobileToolsMenu');

    if (toolsToggle) {
        toolsToggle.addEventListener('click', (e) => {
            e.preventDefault();
            const isMobile = window.innerWidth <= 900;

            if (isMobile && mobileToolsMenu) {
                // On mobile, toggle the inline mobile tools menu
                const isOpen = mobileToolsMenu.classList.toggle('open');
                toolsToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            } else if (toolsPanel) {
                // On desktop, toggle the mega panel
                const isActive = toolsPanel.classList.toggle('active');
                toolsToggle.setAttribute('aria-expanded', isActive ? 'true' : 'false');
            }
        });
    }

    if (header && toolsToggle) {
        document.addEventListener('click', (e) => {
            const withinHeader = header.contains(e.target);
            if (!withinHeader) {
                if (toolsPanel) toolsPanel.classList.remove('active');
                if (mobileToolsMenu) mobileToolsMenu.classList.remove('open');
                toolsToggle.setAttribute('aria-expanded', 'false');
            }
        });

        // Close menus when links are clicked
        if (toolsPanel) {
            toolsPanel.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    toolsPanel.classList.remove('active');
                    toolsToggle.setAttribute('aria-expanded', 'false');
                    if (siteNav) siteNav.classList.remove('open');
                    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
                });
            });
        }

        // Close mobile menu when mobile tool links are clicked
        if (mobileToolsMenu) {
            mobileToolsMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileToolsMenu.classList.remove('open');
                    toolsToggle.setAttribute('aria-expanded', 'false');
                    if (siteNav) siteNav.classList.remove('open');
                    if (menuToggle) {
                        menuToggle.classList.remove('active');
                        menuToggle.setAttribute('aria-expanded', 'false');
                    }
                    document.body.style.overflow = '';
                });
            });
        }
    }

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

        // Detect current language and update display
        const currentPath = window.location.pathname;
        const langMap = {
            '/languages/arabic/': 'AR',
            '/languages/spanish/': 'ES',
            '/languages/russian/': 'RU',
            '/languages/french/': 'FR',
            '/languages/german/': 'DE',
            '/languages/portuguese/': 'PT',
            '/languages/japanese/': 'JP',
            'korean': 'KR'
        };

        for (const [path, code] of Object.entries(langMap)) {
            if (currentPath.includes(path) || currentPath.includes(code.toLowerCase())) {
                document.getElementById('currentLang').textContent = code;
                break;
            }
        }
    }
});
</script>
