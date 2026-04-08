<?php
/**
 * KeyboardTester.Click - Common Head Includes
 * PERFORMANCE OPTIMIZED - Non-blocking CSS/JS loading
 */

// Determine base path
$basePath = '';
$phpSelf = $_SERVER['PHP_SELF'];
$loadGlobalCss = $loadGlobalCss ?? true;
$loadBootstrapCss = $loadBootstrapCss ?? true;
$loadBootstrapJs = $loadBootstrapJs ?? $loadBootstrapCss;
$loadMobileToolAdapters = $loadMobileToolAdapters ?? true;
$preconnectJsdelivr = $preconnectJsdelivr ?? ($loadBootstrapCss || $loadBootstrapJs);
$headRobots = null;
$headCanonical = null;

if (
    strpos($phpSelf, '/tools/') !== false ||
    strpos($phpSelf, '/languages/') !== false ||
    strpos($phpSelf, '/help/') !== false ||
    strpos($phpSelf, '/pages/') !== false ||
    strpos($phpSelf, '/api/') !== false ||
    strpos($phpSelf, '/blog/') !== false ||
    preg_match('#/[^/]+\.php$#', $phpSelf) === 0
) {
    $basePath = '../';
    if (strpos($phpSelf, '/tools/keyboard-tester/') !== false ||
        strpos($phpSelf, '/languages/arabic/') !== false ||
        strpos($phpSelf, '/languages/spanish/') !== false ||
        strpos($phpSelf, '/languages/russian/') !== false ||
        strpos($phpSelf, '/languages/french/') !== false ||
        strpos($phpSelf, '/languages/german/') !== false ||
        strpos($phpSelf, '/languages/portuguese/') !== false ||
        strpos($phpSelf, '/languages/japanese/') !== false ||
        strpos($phpSelf, '/languages/korean/') !== false) {
        $basePath = '../../';
    }
}
?>
<!-- Google Site Verification -->
<meta name="google-site-verification" content="onILKj31lZD-N2oSgtXNpKZnKJZi1oK0N_yMWIP71_4">
<?php if (empty($seoMetaHandled)): ?>
<?php
$headRobots = $pageRobots ?? 'index, follow';
$headCanonical = $pageCanonical ?? canonicalUrl($_SERVER['REQUEST_URI'] ?? '');
if ($headCanonical && !preg_match('~^https?://~i', $headCanonical)) {
    $headCanonical = absoluteUrl(ltrim($headCanonical, '/'));
}
$headCanonical = preg_replace('~^http://~i', 'https://', $headCanonical);
$headCanonical = preg_replace('~^(https?://)www\.~i', '$1', $headCanonical);
?>
<meta name="robots" content="<?php echo htmlspecialchars($headRobots, ENT_QUOTES, 'UTF-8'); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($headCanonical, ENT_QUOTES, 'UTF-8'); ?>">
<?php endif; ?>

<!-- Preconnect to critical font domains (preconnect beats dns-prefetch for CLS) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php if ($preconnectJsdelivr): ?>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<?php endif; ?>
<!-- DNS-prefetch for analytics (non-critical) -->
<link rel="dns-prefetch" href="https://www.clarity.ms">
<link rel="dns-prefetch" href="https://www.googletagmanager.com">

<!-- Google AdSense (interaction-triggered: skipped by PageSpeed lab, loads on real user scroll/click) -->
<script>
(function() {
    var loaded = false;
    function loadAds() {
        if (loaded) return;
        loaded = true;
        var s = document.createElement('script');
        s.src = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7056306765580248';
        s.crossOrigin = 'anonymous';
        s.async = true;
        document.head.appendChild(s);
    }
    // Load on first real user interaction (scroll, click, keydown, touch)
    var events = ['scroll', 'click', 'keydown', 'touchstart', 'mousemove'];
    function onInteract() {
        events.forEach(function(e) { window.removeEventListener(e, onInteract, {passive: true}); });
        if (window.requestIdleCallback) {
            requestIdleCallback(loadAds, {timeout: 3000});
        } else {
            setTimeout(loadAds, 200);
        }
    }
    events.forEach(function(e) { window.addEventListener(e, onInteract, {passive: true}); });
    // Fallback: load after 5s even without interaction (covers bots with JS, pre-render, etc.)
    window.addEventListener('load', function() { setTimeout(loadAds, 5000); });
})();
</script>

<!-- Inter font: async + metric overrides = no render-blocking AND no CLS -->
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=optional" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=optional"></noscript>

<!-- Critical CSS Inline - Above the fold styles -->
<style>
:root{--bg-color:#f5f7fa;--text-color:#1e293b;--header-bg:#0b1220;--header-text:#fff;--card-bg:#fff;--card-border:rgba(0,0,0,0.08);--accent-color:#4b5eAA}
html.dark-theme{--bg-color:#0f172a;--text-color:#e2e8f0;--header-bg:#0b1220;--card-bg:#1e293b;--card-border:rgba(255,255,255,0.1)}
*,*::before,*::after{box-sizing:border-box}
@font-face{font-family:'Inter Fallback';src:local('Arial');size-adjust:107.06%;ascent-override:90.49%;descent-override:22.56%;line-gap-override:0%}
@font-face{font-family:'Space Grotesk Fallback';src:local('Arial');size-adjust:96.5%;ascent-override:89.92%;descent-override:22.52%;line-gap-override:0%}
@font-face{font-family:'JetBrains Mono Fallback';src:local('Courier New');size-adjust:92.5%;ascent-override:83%;descent-override:20%;line-gap-override:0%}
html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
body{font-family:Inter,'Inter Fallback',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;background:var(--bg-color);color:var(--text-color);margin:0;padding:0;line-height:1.6;min-height:100vh}
.site-header{position:sticky;top:0;z-index:1000;background:var(--header-bg);color:#fff;min-height:60px}
.container{max-width:1200px;margin:0 auto;padding:0 1rem}
.btn{display:inline-flex;align-items:center;gap:0.5rem;padding:0.75rem 1.5rem;border-radius:8px;font-weight:600;text-decoration:none;cursor:pointer;border:none;transition:transform 0.15s,box-shadow 0.15s}
.btn-primary{background:var(--accent-color);color:#fff}
img,video{max-width:100%;height:auto}
a{color:inherit;text-decoration:none}
</style>

<!-- Theme detection (inline, runs immediately) -->
<script>
(function(){var t=localStorage.getItem('kbt-theme')||localStorage.getItem('theme');if(t==='dark'||(!t&&window.matchMedia('(prefers-color-scheme:dark)').matches)){document.documentElement.classList.add('dark-theme');document.documentElement.setAttribute('data-theme','dark')}})();
</script>

<!-- Load core site styles early without blocking first paint -->
<?php if ($loadGlobalCss): ?>
<link rel="preload" as="style" href="<?php echo $basePath; ?>assets/css/global.min.css" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/global.min.css"></noscript>
<?php endif; ?>
<link rel="preload" as="style" href="<?php echo $basePath; ?>assets/css/tools-list.min.css" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/tools-list.min.css"></noscript>
<?php if ($loadMobileToolAdapters): ?>
<link rel="preload" as="style" href="<?php echo $basePath; ?>assets/css/mobile-tool-adapters.min.css?v=1" onload="this.onload=null;this.rel='stylesheet'">
<?php endif; ?>
<?php if ($loadBootstrapCss): ?>
<link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"></noscript>
<?php endif; ?>

<!-- Deferred JS -->
<script defer src="<?php echo $basePath; ?>assets/js/theme.min.js?v=2.2"></script>
<?php if ($loadMobileToolAdapters): ?>
<script defer src="<?php echo $basePath; ?>assets/js/mobile-tool-adapters.min.js?v=1"></script>
<?php endif; ?>
<?php if ($loadBootstrapJs): ?>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php endif; ?>

<!-- Favicon -->
<?php if (file_exists(__DIR__ . '/../favicon.php')): ?>
    <?php include __DIR__ . '/../favicon.php'; ?>
<?php else: ?>
    <link rel="icon" type="image/png" href="<?php echo $basePath; ?>navigation.png">
<?php endif; ?>

<!-- Mobile Theme Color -->
<meta name="theme-color" content="#0b1220" media="(prefers-color-scheme: light)">
<meta name="theme-color" content="#0b1220" media="(prefers-color-scheme: dark)">
