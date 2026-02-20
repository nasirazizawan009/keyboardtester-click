<?php
/**
 * KeyboardTester.Click - Common Head Includes
 * PERFORMANCE OPTIMIZED - Non-blocking CSS/JS loading
 */

// Determine base path
$basePath = '';
$phpSelf = $_SERVER['PHP_SELF'];

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

<!-- Preconnect to critical font domains (preconnect beats dns-prefetch for CLS) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<!-- DNS-prefetch for analytics (non-critical) -->
<link rel="dns-prefetch" href="https://www.clarity.ms">
<link rel="dns-prefetch" href="https://www.googletagmanager.com">

<!-- Inter font: async + metric overrides = no render-blocking AND no CLS -->
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=optional" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=optional"></noscript>

<!-- Critical CSS Inline - Above the fold styles -->
<style>
:root{--bg-color:#f5f7fa;--text-color:#1e293b;--header-bg:#0b1220;--header-text:#fff;--card-bg:#fff;--card-border:rgba(0,0,0,0.08);--accent-color:#4b5eAA}
html.dark-theme{--bg-color:#0f172a;--text-color:#e2e8f0;--header-bg:#0b1220;--card-bg:#1e293b;--card-border:rgba(255,255,255,0.1)}
*,*::before,*::after{box-sizing:border-box}
@font-face{font-family:'Inter Fallback';src:local('Arial');size-adjust:107.06%;ascent-override:90.49%;descent-override:22.56%;line-gap-override:0%}
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

<!-- Async CSS Loader Function -->
<script>
function loadCSS(href){var ss=document.createElement('link');ss.rel='stylesheet';ss.href=href;document.head.appendChild(ss);return ss}
</script>

<!-- Load CSS asynchronously (non-blocking) -->
<script>
loadCSS('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
loadCSS('<?php echo $basePath; ?>assets/css/global.css');
</script>

<!-- Fallback for no-JS -->
<noscript>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/global.css">
</noscript>

<!-- Deferred JS -->
<script defer src="<?php echo $basePath; ?>assets/js/theme.js?v=2.2"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Favicon -->
<?php if (file_exists(__DIR__ . '/../favicon.php')): ?>
    <?php include __DIR__ . '/../favicon.php'; ?>
<?php else: ?>
    <link rel="icon" type="image/png" href="<?php echo $basePath; ?>navigation.png">
<?php endif; ?>

<!-- Mobile Theme Color -->
<meta name="theme-color" content="#0b1220" media="(prefers-color-scheme: light)">
<meta name="theme-color" content="#0b1220" media="(prefers-color-scheme: dark)">
