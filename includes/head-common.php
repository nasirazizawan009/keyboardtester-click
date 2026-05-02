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
$loadAdSense = $loadAdSense ?? true;
$allowAutoAdSense = $allowAutoAdSense ?? false;
$headRobots = null;
$headCanonical = null;

require_once __DIR__ . '/components/adsense-slot.php';

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
<?php
/* --- Auto hreflang cluster ---------------------------------------------
   Emits <link rel="alternate" hreflang="..."> for every language version of
   this page that actually exists on disk. Works for both EN root pages and
   /languages/<lang>/<slug>.php localized pages. Skips silently when the
   current script isn't a recognized landing-page pattern.                */
if (empty($hreflangEmitted) && !empty($_SERVER['SCRIPT_FILENAME'])) {
    $__hreflang_projectRoot = realpath(__DIR__ . '/..');
    $__hreflang_script      = realpath($_SERVER['SCRIPT_FILENAME']);
    if ($__hreflang_projectRoot && $__hreflang_script
        && strpos($__hreflang_script, $__hreflang_projectRoot) === 0) {
        $__hreflang_rel = str_replace('\\', '/', substr($__hreflang_script, strlen($__hreflang_projectRoot)));
        $__hreflang_rel = ltrim($__hreflang_rel, '/');
        // Slug aliases: EN root filename => localized filename.
        // Covers cases where the EN page and locale pages do NOT share a filename,
        // so the auto-hreflang can still link them as alternates.
        $__hreflang_en_aliases = [
            'keyboard_typing_test.php' => 'typing-test.php',
        ];
        $__hreflang_loc_to_en = array_flip($__hreflang_en_aliases);

        $__hreflang_en_slug = null;  // EN root filename (lives at project root)
        $__hreflang_loc_slug = null; // locale filename (lives under languages/<dir>/)
        if (preg_match('~^languages/[^/]+/([^/]+\.php)$~', $__hreflang_rel, $__hm)) {
            $__hreflang_loc_slug = $__hm[1];
            $__hreflang_en_slug = $__hreflang_loc_to_en[$__hreflang_loc_slug] ?? $__hreflang_loc_slug;
        } elseif (preg_match('~^([^/]+\.php)$~', $__hreflang_rel, $__hm)) {
            $__hreflang_en_slug = $__hm[1];
            $__hreflang_loc_slug = $__hreflang_en_aliases[$__hreflang_en_slug] ?? $__hreflang_en_slug;
        }
        if ($__hreflang_en_slug) {
            $__hreflang_dirs = [
                'es' => 'spanish', 'fr' => 'french', 'de' => 'german',
                'pt' => 'portuguese', 'ar' => 'arabic', 'ru' => 'russian',
                'ja' => 'japanese', 'ko' => 'korean',
            ];
            $__hreflang_links = [];
            if (file_exists($__hreflang_projectRoot . '/' . $__hreflang_en_slug)) {
                $__hreflang_links['en'] = absoluteUrl($__hreflang_en_slug);
            }
            foreach ($__hreflang_dirs as $__code => $__dir) {
                $__p = $__hreflang_projectRoot . '/languages/' . $__dir . '/' . $__hreflang_loc_slug;
                if (file_exists($__p)) {
                    $__hreflang_links[$__code] = absoluteUrl('languages/' . $__dir . '/' . $__hreflang_loc_slug);
                }
            }
            // Emit only if we found at least one alternate (so we skip pages with no localized versions)
            if (count($__hreflang_links) > 1) {
                foreach ($__hreflang_links as $__code => $__href) {
                    echo "\n<link rel=\"alternate\" hreflang=\"" . htmlspecialchars($__code, ENT_QUOTES, 'UTF-8') . '" href="' . htmlspecialchars($__href, ENT_QUOTES, 'UTF-8') . '">';
                }
                if (!empty($__hreflang_links['en'])) {
                    echo "\n<link rel=\"alternate\" hreflang=\"x-default\" href=\"" . htmlspecialchars($__hreflang_links['en'], ENT_QUOTES, 'UTF-8') . '">';
                }
                $hreflangEmitted = true;
            }
        }
    }
}
?>

<!-- Preconnect to critical font domains (preconnect beats dns-prefetch for CLS) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php if ($preconnectJsdelivr): ?>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<?php endif; ?>
<!-- DNS-prefetch for analytics (non-critical) -->
<link rel="dns-prefetch" href="https://www.clarity.ms">
<link rel="dns-prefetch" href="https://www.googletagmanager.com">

<?php if ($loadAdSense && ($allowAutoAdSense || kbtHasConfiguredAdSenseSlots())): ?>
<!-- Google AdSense loader for controlled manual slots (turn Auto ads off in AdSense UI to prevent extra placements) -->
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
<?php endif; ?>

<!-- Inter font: async + metric overrides = no render-blocking AND no CLS -->
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=optional" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=optional"></noscript>

<!-- Critical CSS Inline - Above the fold styles -->
<style>
:root{--bg-color:#f5f7fa;--text-color:#1e293b;--text-muted:#475569;--primary-color:#1e40af;--surface:#ffffff;--border-color:#e2e8f0;--header-bg:#0b1220;--header-text:#fff;--card-bg:#fff;--card-border:rgba(0,0,0,0.08);--accent-color:#4b5eAA}
html.dark-theme,html[data-theme="dark"]{--bg-color:#0f172a;--text-color:#f1f5f9;--text-muted:#cbd5e1;--primary-color:#93c5fd;--surface:#1e293b;--border-color:#334155;--header-bg:#0b1220;--card-bg:#1e293b;--card-border:rgba(255,255,255,0.1)}
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
<link rel="preload" as="style" href="<?php echo $basePath; ?>assets/css/global.min.css?v=2.7" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/global.min.css?v=2.7"></noscript>
<?php endif; ?>
<link rel="preload" as="style" href="<?php echo $basePath; ?>assets/css/tools-list.min.css" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/tools-list.min.css"></noscript>
<link rel="preload" as="style" href="<?php echo $basePath; ?>assets/css/ai-chat.css?v=2.3" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/ai-chat.css?v=2.3"></noscript>
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

<!-- PWA manifest + service worker (installable + offline fallback) -->
<link rel="manifest" href="<?php echo $basePath; ?>manifest.webmanifest">
<meta name="application-name" content="KeyboardTester.click">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="KeyboardTester">
<link rel="apple-touch-icon" href="<?php echo $basePath; ?>navigation.png">
<?php
$serviceWorkerUrl = function_exists('url') ? url('sw.js') : $basePath . 'sw.js';
$serviceWorkerScope = function_exists('url') ? url('') : '/';
?>
<script>
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function(){
        navigator.serviceWorker.register(<?php echo json_encode($serviceWorkerUrl); ?>, {
            scope: <?php echo json_encode($serviceWorkerScope); ?>
        }).catch(function(){});
    });
}
</script>
