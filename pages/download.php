<?php
include __DIR__ . '/../config.php';
$pageTitle = 'Download Desktop App & Install as PWA | KeyboardTester.click';
$pageDescription = 'Download the KeyboardTester.click desktop app for Windows (installer or portable) or install the site as a PWA on your device. Full offline support.';
$pageCanonical = absoluteUrl('pages/download.php');

$SHELL_VERSION = '1.1.0';
$SETUP_URL    = '/desktop/KBT-Keyboard-Tester-' . $SHELL_VERSION . '-Setup-x64.exe';
$PORTABLE_URL = '/desktop/KBT-Keyboard-Tester-' . $SHELL_VERSION . '-Portable-x64.exe';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <?php include __DIR__ . '/../includes/seo-meta.php'; ?>
    <?php include __DIR__ . '/../includes/head-common.php'; ?>
    <style>
    .dl-wrap { max-width: 1100px; margin: 0 auto; padding: 2.25rem 1.25rem 4rem; }
    .dl-hero {
        position: relative; overflow: hidden;
        background: linear-gradient(135deg, rgba(14,165,233,0.1), rgba(168,85,247,0.08)), var(--surface, #ffffff);
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 20px;
        padding: 42px 36px;
        margin-bottom: 30px;
    }
    .dl-hero::before {
        content: ""; position: absolute; top: -40%; right: -10%;
        width: 460px; height: 460px;
        background: radial-gradient(closest-side, rgba(14,165,233,0.22), transparent 70%);
        pointer-events: none;
    }
    .dl-kicker {
        font-size: 0.72rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 0.14em; color: var(--primary-color, #1e40af);
        margin-bottom: 10px;
    }
    .dl-title { font-size: 2rem; font-weight: 800; margin: 0 0 12px; line-height: 1.18; color: var(--text-color); }
    .dl-sub { font-size: 1.02rem; line-height: 1.65; color: var(--text-muted, #475569); max-width: 680px; margin: 0 0 6px; }

    .dl-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 18px;
        margin-top: 24px;
    }
    .dl-card {
        background: var(--surface, #ffffff);
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 16px;
        padding: 22px 22px 20px;
        display: flex; flex-direction: column; gap: 10px;
        position: relative; overflow: hidden;
        transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
    }
    .dl-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 18px 40px -14px rgba(15,23,42,0.18);
    }
    .dl-card-platform {
        display: flex; align-items: center; gap: 10px;
        font-size: 0.72rem; font-weight: 800;
        letter-spacing: 0.12em; text-transform: uppercase;
        color: var(--text-muted, #64748b);
    }
    .dl-card-badge {
        padding: 3px 10px; border-radius: 999px;
        background: var(--surface, #f1f5f9);
        border: 1px solid var(--border-color, #e2e8f0);
        font-size: 0.7rem; font-weight: 700;
    }
    .dl-card-title { font-size: 1.2rem; font-weight: 800; margin: 0; line-height: 1.3; color: var(--text-color); }
    .dl-card-desc { font-size: 0.92rem; color: var(--text-muted, #475569); line-height: 1.6; margin: 0; flex: 1; }
    .dl-card-meta { display: flex; gap: 16px; font-size: 0.78rem; color: var(--text-muted, #64748b); margin-top: 4px; }
    .dl-btn {
        display: inline-flex; align-items: center; justify-content: center;
        gap: 8px;
        padding: 12px 20px;
        border-radius: 10px;
        background: linear-gradient(135deg, #0ea5e9, #0284c7);
        color: #fff; font-weight: 700; font-size: 0.95rem;
        text-decoration: none;
        margin-top: 10px;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
        box-shadow: 0 8px 20px rgba(14,165,233,0.32);
    }
    .dl-btn:hover { transform: translateY(-1px); box-shadow: 0 10px 26px rgba(14,165,233,0.45); color: #fff; text-decoration: none; }
    .dl-btn-ghost {
        background: transparent;
        color: var(--primary-color, #1e40af);
        border: 1px solid var(--border-color, #e2e8f0);
        box-shadow: none;
    }
    .dl-btn-ghost:hover { border-color: var(--primary-color, #1e40af); color: var(--primary-color, #1e40af); transform: translateY(-1px); box-shadow: none; }
    .dl-btn[disabled], .dl-btn.is-disabled {
        pointer-events: none; opacity: 0.55; box-shadow: none;
        background: var(--surface, #e2e8f0); color: var(--text-muted, #64748b);
    }

    .dl-features {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 14px; margin: 30px 0 0;
    }
    .dl-feature {
        background: var(--surface, #ffffff);
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 12px;
        padding: 16px 18px;
    }
    .dl-feature-icon { font-size: 1.5rem; margin-bottom: 8px; }
    .dl-feature-title { font-weight: 700; margin: 0 0 4px; font-size: 0.98rem; }
    .dl-feature-desc { font-size: 0.86rem; color: var(--text-muted, #475569); margin: 0; line-height: 1.55; }

    .dl-faq { margin-top: 32px; }
    .dl-faq h2 { font-size: 1.4rem; margin: 0 0 14px; color: var(--text-color); }
    .dl-faq details {
        background: var(--surface, #ffffff);
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 10px;
        padding: 12px 16px;
        margin-bottom: 10px;
    }
    .dl-faq summary { font-weight: 700; cursor: pointer; color: var(--text-color); padding: 4px 0; }
    .dl-faq details[open] summary { color: var(--primary-color, #1e40af); }
    .dl-faq p { color: var(--text-muted, #475569); line-height: 1.65; margin: 10px 0 0; }

    @media (max-width: 600px) {
        .dl-hero { padding: 28px 22px; }
        .dl-title { font-size: 1.5rem; }
    }
    </style>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "SoftwareApplication",
        "name": "KBT Keyboard Tester Desktop",
        "operatingSystem": "Windows 10, Windows 11",
        "applicationCategory": "UtilitiesApplication",
        "softwareVersion": "<?php echo $SHELL_VERSION; ?>",
        "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" },
        "downloadUrl": <?php echo json_encode(absoluteUrl(ltrim($SETUP_URL, '/'))); ?>,
        "fileSize": "82 MB",
        "aggregateRating": { "@type": "AggregateRating", "ratingValue": "4.8", "ratingCount": "1" }
    }
    </script>
</head>
<body>
<?php include __DIR__ . '/../header.php'; ?>
<main>
<div class="dl-wrap">
    <section class="dl-hero">
        <div class="dl-kicker">Downloads · v<?php echo $SHELL_VERSION; ?></div>
        <h1 class="dl-title">Install KeyboardTester everywhere</h1>
        <p class="dl-sub">Pick the version that fits how you work: a full Windows desktop app, a no-install portable, or a PWA that runs right in your browser and works offline after first visit.</p>

        <div class="dl-grid">
            <!-- Installer -->
            <div class="dl-card">
                <div class="dl-card-platform"><span>🪟 Windows Installer</span><span class="dl-card-badge">Recommended</span></div>
                <h2 class="dl-card-title">Desktop App — Full Install</h2>
                <p class="dl-card-desc">Creates Start Menu + Desktop shortcuts. Auto-updates when we release new versions. 32 tools from the site, plus a bundled offline keyboard tester that works with no internet.</p>
                <div class="dl-card-meta"><span>~82 MB</span><span>Windows 10 / 11 · x64</span></div>
                <a class="dl-btn" href="<?php echo htmlspecialchars($SETUP_URL); ?>" download>⬇ Download Installer</a>
            </div>

            <!-- Portable -->
            <div class="dl-card">
                <div class="dl-card-platform"><span>🪟 Windows Portable</span><span class="dl-card-badge">No install</span></div>
                <h2 class="dl-card-title">Portable EXE</h2>
                <p class="dl-card-desc">Single file. Double-click to run — no installation, no admin needed. Perfect for USB sticks or locked-down machines. Same features as the installer, manual updates only.</p>
                <div class="dl-card-meta"><span>~82 MB</span><span>Windows 10 / 11 · x64</span></div>
                <a class="dl-btn dl-btn-ghost" href="<?php echo htmlspecialchars($PORTABLE_URL); ?>" download>⬇ Download Portable</a>
            </div>

            <!-- PWA -->
            <div class="dl-card">
                <div class="dl-card-platform"><span>🌐 Progressive Web App</span><span class="dl-card-badge">All platforms</span></div>
                <h2 class="dl-card-title">Install as PWA</h2>
                <p class="dl-card-desc">Pin the site to your taskbar, dock, or home screen. Opens in its own window, caches assets for offline use after first visit. Works on Windows, macOS, Linux, Android, and iOS.</p>
                <div class="dl-card-meta"><span>~5 MB cached</span><span>Any modern browser</span></div>
                <button class="dl-btn" id="pwa-install-btn" type="button">⬇ Install as App</button>
            </div>

            <!-- Mac -->
            <div class="dl-card">
                <div class="dl-card-platform"><span>🍎 macOS</span><span class="dl-card-badge">Coming soon</span></div>
                <h2 class="dl-card-title">Desktop App for Mac</h2>
                <p class="dl-card-desc">Universal binary (Apple Silicon + Intel). In build pipeline — use the PWA option on macOS in the meantime, it runs standalone just like a native app.</p>
                <div class="dl-card-meta"><span>~90 MB</span><span>macOS 11+</span></div>
                <button class="dl-btn is-disabled" type="button" disabled>Coming soon</button>
            </div>
        </div>
    </section>

    <section class="dl-features">
        <div class="dl-feature">
            <div class="dl-feature-icon">🔁</div>
            <h3 class="dl-feature-title">Auto-updates</h3>
            <p class="dl-feature-desc">Desktop app checks for new versions on every launch and installs silently. PWA updates when you revisit the site.</p>
        </div>
        <div class="dl-feature">
            <div class="dl-feature-icon">🌙</div>
            <h3 class="dl-feature-title">Works offline</h3>
            <p class="dl-feature-desc">Desktop app ships with a full 104-key offline tester. PWA caches tools after first visit so they keep working.</p>
        </div>
        <div class="dl-feature">
            <div class="dl-feature-icon">🔒</div>
            <h3 class="dl-feature-title">Private by design</h3>
            <p class="dl-feature-desc">Everything runs locally. Key events never leave your machine. No account, no telemetry, no data collection.</p>
        </div>
        <div class="dl-feature">
            <div class="dl-feature-icon">🧰</div>
            <h3 class="dl-feature-title">All 32 tools</h3>
            <p class="dl-feature-desc">Keyboard, mouse, display, camera, audio, utility, gaming — every tool on the site, in one desktop window.</p>
        </div>
    </section>

    <section class="dl-faq">
        <h2>FAQ</h2>
        <details>
            <summary>Is it safe? The installer is unsigned.</summary>
            <p>Yes. The installer is open source and not code-signed yet, so Windows SmartScreen may show a warning on first launch — click <em>More info → Run anyway</em>. We're working on a signing certificate; once that's in place, the warning goes away.</p>
        </details>
        <details>
            <summary>What's the difference between the installer and the portable?</summary>
            <p>The installer creates Start Menu and Desktop shortcuts, registers in Add/Remove Programs, and auto-updates. The portable is a single file you run anywhere — no install, no admin, no system footprint. Same functionality in both.</p>
        </details>
        <details>
            <summary>Do I need the desktop app, or is the PWA enough?</summary>
            <p>For most people the PWA is enough — it installs from your browser's address bar, runs in its own window, and caches tools for offline use. The desktop app is better if you want the bundled 104-key offline keyboard tester (works with no internet, first launch) and guaranteed background auto-update.</p>
        </details>
        <details>
            <summary>How do I install the PWA on Chrome / Edge / Android?</summary>
            <p>On the site homepage, open the browser's ⋮ menu → <em>Install app</em> or <em>Add to Home screen</em>. On this page the "Install as App" button above will trigger the same prompt when your browser supports it.</p>
        </details>
        <details>
            <summary>How does the desktop app update?</summary>
            <p>On every launch it fetches <code>/desktop/latest.yml</code> from the site. If a newer version exists, it silently downloads the update and prompts you to restart. No need to manually download anything after the first install.</p>
        </details>
        <details>
            <summary>Will new tools I see on the site show up in the desktop app?</summary>
            <p>Yes, automatically. The desktop app's sidebar is driven by a live manifest on the site, so any new tool published here appears in every installed app on its next launch — no reinstall needed.</p>
        </details>
    </section>
</div>
</main>
<?php include __DIR__ . '/../footer.php'; ?>
<script>
(function () {
    var deferred = null;
    var btn = document.getElementById('pwa-install-btn');
    if (!btn) return;

    window.addEventListener('beforeinstallprompt', function (e) {
        e.preventDefault();
        deferred = e;
        btn.disabled = false;
        btn.textContent = '⬇ Install as App';
    });

    btn.addEventListener('click', async function () {
        if (!deferred) {
            // Give a helpful fallback tip
            btn.textContent = 'Use browser menu → Install app';
            setTimeout(function(){ btn.textContent = '⬇ Install as App'; }, 4500);
            return;
        }
        btn.disabled = true;
        btn.textContent = 'Installing…';
        deferred.prompt();
        var choice = await deferred.userChoice;
        deferred = null;
        btn.textContent = choice.outcome === 'accepted' ? '✓ Installed' : '⬇ Install as App';
        btn.disabled = choice.outcome !== 'accepted';
    });

    window.addEventListener('appinstalled', function () {
        btn.disabled = true;
        btn.textContent = '✓ Installed';
    });
})();
</script>
</body>
</html>
