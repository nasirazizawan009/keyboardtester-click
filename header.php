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
            <img src="<?php echo url('images/shared/keyboard-and-mouse.png'); ?>" alt="KeyboardTester logo">
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
            <a class="nav-link" href="<?php echo $pages['privacy']; ?>">Privacy</a>
            <a class="nav-link" href="<?php echo $pages['about']; ?>">About</a>

            <div class="nav-actions">
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

    window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 40);
    });

    menuToggle.addEventListener('click', () => {
        const isOpen = siteNav.classList.toggle('open');
        menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    toolsToggle.addEventListener('click', (e) => {
        e.preventDefault();
        const isActive = toolsPanel.classList.toggle('active');
        toolsToggle.setAttribute('aria-expanded', isActive ? 'true' : 'false');
    });

    document.addEventListener('click', (e) => {
        const withinHeader = header.contains(e.target);
        if (!withinHeader) {
            toolsPanel.classList.remove('active');
            toolsToggle.setAttribute('aria-expanded', 'false');
        }
    });

    toolsPanel.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            toolsPanel.classList.remove('active');
            toolsToggle.setAttribute('aria-expanded', 'false');
            siteNav.classList.remove('open');
            menuToggle.setAttribute('aria-expanded', 'false');
        });
    });
});
</script>
