<?php
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
    .site-header.scrolled { box-shadow: 0 10px 30px rgba(15, 23, 42, 0.2); }
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
    .brand img { width: 32px; height: 32px; }
    .brand span { color: #38bdf8; }
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
        font-family: inherit;
    }
    .nav-link:hover { color: #e0f2fe; }
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
    .lang-selector { position: relative; }
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
    .lang-toggle:hover { background: rgba(255,255,255,0.1); }
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
    .lang-option:hover { background: rgba(56, 189, 248, 0.1); }
    .lang-option.active { background: rgba(56, 189, 248, 0.2); font-weight: 600; }
    .lang-flag { font-size: 20px; }
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
    .mega-panel.active { display: block; }
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
    [data-theme="dark"] .panel-inner > div { background: rgba(255, 255, 255, 0.04); }
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
    .panel-links a:hover { color: var(--link-color); }
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
        .mega-panel { position: static; box-shadow: none; }
    }
</style>

<header class="site-header" id="siteHeader">
    <div class="header-container">
        <a href="<?php echo $pages['home']; ?>" class="brand">
            <img src="<?php echo url('images/shared/logo.svg'); ?>" alt="KeyboardTester Logo" width="32" height="32" loading="eager" decoding="async" fetchpriority="high">
            KeyboardTester<span>.click</span>
        </a>
        <button class="menu-toggle" id="menuToggle" aria-label="Menu umschalten">
            <span></span><span></span><span></span>
        </button>
        <nav class="site-nav" id="siteNav">
            <a class="nav-link" href="<?php echo $pages['home']; ?>">Startseite</a>
            <button class="nav-link" id="toolsToggle">Werkzeuge</button>
            <a class="nav-link" href="<?php echo $pages['privacy']; ?>">Datenschutz</a>
            <a class="nav-link" href="<?php echo $pages['about']; ?>">Ueber uns</a>
            <div class="nav-actions">
                <div class="lang-selector" id="langSelector">
                    <button class="lang-toggle" id="langToggle">🌐 <span>DE</span></button>
                    <div class="lang-dropdown" id="langDropdown">
                        <a href="<?php echo url('tools/keyboard-tester/'); ?>" class="lang-option"><span class="lang-flag">🇬🇧</span>English</a>
                        <a href="<?php echo url('languages/arabic/'); ?>" class="lang-option"><span class="lang-flag">🇸🇦</span>العربية</a>
                        <a href="<?php echo url('languages/spanish/'); ?>" class="lang-option"><span class="lang-flag">🇪🇸</span>Espanol</a>
                        <a href="<?php echo url('languages/russian/'); ?>" class="lang-option"><span class="lang-flag">🇷🇺</span>Русский</a>
                        <a href="<?php echo url('languages/french/'); ?>" class="lang-option"><span class="lang-flag">🇫🇷</span>Francais</a>
                        <a href="<?php echo url('languages/german/'); ?>" class="lang-option active"><span class="lang-flag">🇩🇪</span>Deutsch</a>
                        <a href="<?php echo url('languages/portuguese/'); ?>" class="lang-option"><span class="lang-flag">🇵🇹</span>Portugues</a>
                        <a href="<?php echo url('languages/japanese/'); ?>" class="lang-option"><span class="lang-flag">🇯🇵</span>日本語</a>
                        <a href="<?php echo url('languages/korean/'); ?>" class="lang-option"><span class="lang-flag">🇰🇷</span>한국어</a>
                    </div>
                </div>
                <button class="theme-toggle" id="themeToggle" data-theme-toggle>🌙</button>
                <a href="<?php echo $pages['home']; ?>#tools" class="cta-btn">Werkzeuge testen</a>
            </div>
        </nav>
    </div>
    <div class="mega-panel" id="toolsPanel">
        <div class="panel-inner">
            <div>
                <div class="panel-title">Tastatur</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['home']; ?>">Tastatur-Tester</a>
                    <a href="<?php echo $pages['keyboard_typing']; ?>">Geschwindigkeitstest</a>
                    <a href="<?php echo $pages['latency_check']; ?>">Latenz-Pruefer</a>
                </div>
            </div>
            <div>
                <div class="panel-title">Maus</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['mouse_test']; ?>">Maus-Tester</a>
                    <a href="<?php echo $pages['click_speed']; ?>">Klickgeschwindigkeit</a>
                    <a href="<?php echo $pages['ghost_click']; ?>">Geisterklick-Detektor</a>
                    <a href="<?php echo $pages['dpi_tester']; ?>">DPI-Test</a>
                </div>
            </div>
            <div>
                <div class="panel-title">Bildschirm</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['screen_test']; ?>">Bildschirm-Test</a>
                    <a href="<?php echo $pages['webcam_test']; ?>">Webcam-Test</a>
                </div>
            </div>
            <div>
                <div class="panel-title">Audio</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['mic_test']; ?>">Mikrofon-Test</a>
                    <a href="<?php echo $pages['headphone_test']; ?>">Kopfhoerer-Test</a>
                </div>
            </div>
            <div>
                <div class="panel-title">Hilfsprogramme</div>
                <div class="panel-links">
                    <a href="<?php echo $pages['qr_generator']; ?>">QR-Generator</a>
                    <a href="<?php echo $pages['qr_reader']; ?>">QR-Leser</a>
                    <a href="<?php echo $pages['ocr_tool']; ?>">OCR-Werkzeug</a>
                    <a href="<?php echo $pages['password_gen']; ?>">Passwort-Generator</a>
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
    const langToggle = document.getElementById('langToggle');
    const langSelector = document.getElementById('langSelector');

    function syncThemeIcon() {
        if (!themeToggle) return;
        themeToggle.textContent = document.documentElement.classList.contains('dark-theme') ? '☀️' : '🌙';
    }
    syncThemeIcon();
    window.addEventListener('themechange', syncThemeIcon);
    window.addEventListener('scroll', () => header.classList.toggle('scrolled', window.scrollY > 40));
    menuToggle.addEventListener('click', () => siteNav.classList.toggle('open'));
    toolsToggle.addEventListener('click', (e) => { e.preventDefault(); toolsPanel.classList.toggle('active'); });
    document.addEventListener('click', (e) => { if (!header.contains(e.target)) toolsPanel.classList.remove('active'); });
    if (langToggle && langSelector) {
        langToggle.addEventListener('click', (e) => { e.stopPropagation(); langSelector.classList.toggle('open'); });
        document.addEventListener('click', (e) => { if (!langSelector.contains(e.target)) langSelector.classList.remove('open'); });
    }
});
</script>
