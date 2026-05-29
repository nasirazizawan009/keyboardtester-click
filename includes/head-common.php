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
$loadInterFont = $loadInterFont ?? true;
$preconnectJsdelivr = $preconnectJsdelivr ?? ($loadBootstrapCss || $loadBootstrapJs);
$loadAdSense = $loadAdSense ?? true;
$allowAutoAdSense = $allowAutoAdSense ?? false;
$loadAiChatCss = $loadAiChatCss ?? false;
$deferBootstrapOnMobile = $deferBootstrapOnMobile ?? true;
$deferGoogleFontsOnMobile = $deferGoogleFontsOnMobile ?? true;
$disableAdSenseOnMobile = $disableAdSenseOnMobile ?? true;
$headRobots = null;
$headCanonical = null;
$kbtCurrentHost = strtolower(preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? ''));
$loadGoogleAnalytics = $loadGoogleAnalytics ?? in_array($kbtCurrentHost, ['keyboardtester.click', 'www.keyboardtester.click'], true);
// Hard guard: never load Google Analytics on localhost / dev — even if a page opted in,
// or the local XAMPP site is reached via the production hostname. Keeps dev visits out of GA4.
if (
    !empty($GLOBALS['isLocalhost'])
    || in_array($kbtCurrentHost, ['localhost', '127.0.0.1', '::1', ''], true)
    || strpos($kbtCurrentHost, 'localhost') !== false
    || strpos($kbtCurrentHost, '127.0.0.1') !== false
) {
    $loadGoogleAnalytics = false;
}

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
<style id="kbt-after-tool-banner-style">
.home-redesign .home-after-tool-banner{background:#f5f5f5;padding:24px clamp(18px,2.4vw,32px) 18px}.home-redesign .home-after-tool-banner .kbt-ad-slot--after-tool-banner{display:block;width:100%;max-width:1200px;margin:0 auto;padding:0;clear:none}.home-redesign .home-after-tool-banner .kbt-ad-slot--after-tool-banner .kbt-ad-slot-inner{min-height:250px;border:1px solid #d6d6d6;border-radius:2px;background:#fff;box-shadow:0 2px 10px rgba(0,0,0,.08)}.home-redesign .home-after-tool-banner .kbt-ad-slot--after-tool-banner .adsbygoogle{width:100%;max-width:1180px;min-height:250px}html.dark-theme .home-redesign .home-after-tool-banner,[data-theme="dark"] .home-redesign .home-after-tool-banner{background:#111}html.dark-theme .home-redesign .home-after-tool-banner .kbt-ad-slot--after-tool-banner .kbt-ad-slot-inner,[data-theme="dark"] .home-redesign .home-after-tool-banner .kbt-ad-slot--after-tool-banner .kbt-ad-slot-inner{border-color:#333;background:#1b1b1b}
</style>
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
            'keyboard_typing_test.php'           => 'typing-test.php',
            'mouse_sensitivity_DPI_tester.php'   => 'dpi-tester.php',
            'mouse_speed_tester.php'             => 'click-speed.php',
            'mic-tester.php'                     => 'mic-test.php',
            'ghost-click-detector.php'           => 'ghost-click.php',
            'QR_code_generator_scanner.php'      => 'qr-generator.php',
            'qr-code-reader.php'                 => 'qr-reader.php',
            'headphone_speaker_tester_index.php' => 'headphone-test.php',
            'screentestindex.php'                => 'screen-test.php',
            'webcamtesterindex.php'              => 'webcam-test.php',
            'auto-password-generator.php'        => 'password-generator.php',
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
            // Homepages (index.php) use clean directory URLs so hreflang matches the
            // "/" and "/languages/<dir>/" canonicals instead of pointing at /index.php.
            $__hreflang_isIndex = ($__hreflang_loc_slug === 'index.php');
            $__hreflang_links = [];
            if (file_exists($__hreflang_projectRoot . '/' . $__hreflang_en_slug)) {
                $__hreflang_links['en'] = $__hreflang_isIndex ? absoluteUrl('') : absoluteUrl($__hreflang_en_slug);
            }
            foreach ($__hreflang_dirs as $__code => $__dir) {
                $__p = $__hreflang_projectRoot . '/languages/' . $__dir . '/' . $__hreflang_loc_slug;
                if (file_exists($__p)) {
                    $__hreflang_links[$__code] = $__hreflang_isIndex
                        ? absoluteUrl('languages/' . $__dir . '/')
                        : absoluteUrl('languages/' . $__dir . '/' . $__hreflang_loc_slug);
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

<!-- Machine-readable site catalog for AI / LLM crawlers -->
<link rel="alternate" type="text/plain" title="LLM-readable site catalog" href="https://keyboardtester.click/llms.txt">

<?php if ($loadInterFont): ?>
<!-- Preconnect to critical font domains (preconnect beats dns-prefetch for CLS) -->
<link rel="preconnect" href="https://fonts.googleapis.com"<?php echo $deferGoogleFontsOnMobile ? ' media="(min-width: 769px)"' : ''; ?>>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin<?php echo $deferGoogleFontsOnMobile ? ' media="(min-width: 769px)"' : ''; ?>>
<?php endif; ?>
<?php if ($preconnectJsdelivr && (!$deferBootstrapOnMobile || !$loadBootstrapCss)): ?>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<?php endif; ?>
<!-- DNS-prefetch for analytics (non-critical) -->
<link rel="dns-prefetch" href="https://www.clarity.ms">
<?php if ($loadGoogleAnalytics): ?>
<link rel="dns-prefetch" href="https://www.googletagmanager.com">

<!-- Google tag (gtag.js) - GA4
     Deferred: only loads on first real interaction or 6s after window.load,
     whichever comes first. Cuts ~340ms of long-task time during LCP window
     while preserving analytics for any user who actually interacts. -->
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-G5EY8TGGE6');
(function(){
    var loaded = false;
    var scheduled = false;
    var events = ['scroll', 'click', 'keydown', 'touchstart', 'pointerdown'];
    function loadGtag(){
        if (loaded) return;
        loaded = true;
        scheduled = false;
        events.forEach(function(ev){ window.removeEventListener(ev, loadGtag, {passive:true}); });
        events.forEach(function(ev){ window.removeEventListener(ev, scheduleGtag, {passive:true}); });
        var s = document.createElement('script');
        s.async = true;
        s.src = 'https://www.googletagmanager.com/gtag/js?id=G-G5EY8TGGE6';
        document.head.appendChild(s);
    }
    function scheduleGtag(){
        if (loaded || scheduled) return;
        scheduled = true;
        events.forEach(function(ev){ window.removeEventListener(ev, scheduleGtag, {passive:true}); });
        var run = function(){ loadGtag(); };
        if (window.requestIdleCallback) {
            requestIdleCallback(run, {timeout: 3000});
        } else {
            setTimeout(run, 1200);
        }
    }
    events.forEach(function(ev){ window.addEventListener(ev, scheduleGtag, {passive:true}); });
    // Fallback load after window.load. 2s (was 6s) so short, no-interaction visits are
    // still counted — the old 6s window silently dropped ~half of organic sessions (GA4
    // showed ~2.2k organic vs ~4.8k GSC clicks). 2s is still safely past the LCP window.
    window.addEventListener('load', function(){ setTimeout(loadGtag, 2000); });
    // Last-chance capture: if the visitor leaves before gtag loaded, load it on the way out
    // so the page_view still fires (kept lightweight, fires at most once).
    document.addEventListener('visibilitychange', function(){
        if (document.visibilityState === 'hidden') { loadGtag(); }
    });
})();
</script>
<?php endif; ?>

<?php if ($loadAdSense && ($allowAutoAdSense || kbtHasConfiguredAdSenseSlots())): ?>
<!-- Google AdSense loader for controlled manual slots (turn Auto ads off in AdSense UI to prevent extra placements) -->
<script>
(function() {
    var loaded = false;
    var mobileAdsDisabled = <?php echo $disableAdSenseOnMobile ? 'true' : 'false'; ?>;
    var forceLocalHouseAds = <?php echo !empty($isLocalhost) ? 'true' : 'false'; ?>;
    function showHouseAdSurfaces(reason) {
        document.documentElement.classList.add('kbt-ads-blocked');
        document.querySelectorAll('.kbt-ad-slot').forEach(function(slot) {
            showHouseAdSlot(slot, reason);
        });
        if (window.kbtRefreshAllToolsAds) {
            window.kbtRefreshAllToolsAds();
        }
    }
    function showHouseAdSlot(slot, reason) {
        if (!slot) return;
        slot.classList.remove('kbt-ad-slot--pending', 'kbt-ad-slot--filled', 'kbt-ad-slot--empty', 'kbt-ad-slot--blocked');
        slot.classList.add('kbt-ad-slot--house');
        slot.setAttribute('data-ad-fallback', reason || 'blocked');
        if (isUsableAdSlot(slot)) {
            hidePartnerFallbackSlot(slot);
        } else {
            showPartnerFallbackSlot(slot, reason || 'blocked');
        }
        var wrapper = slot.closest('.home-after-tool-banner, .footer-ad-section');
        if (wrapper) {
            wrapper.classList.add('kbt-ad-wrapper--house');
            wrapper.classList.remove('kbt-ad-wrapper--collapsed');
        }
    }
    function maybeShowLocalHouseAds() {
        if (!forceLocalHouseAds || mobileAdsDisabled && isMobileViewport()) {
            return false;
        }
        showHouseAdSurfaces('local');
        return true;
    }
    function partnerFallbacksForSlot(slot) {
        var placement = slot ? slot.getAttribute('data-ad-placement') : '';
        if (!placement) return [];
        return Array.prototype.slice.call(document.querySelectorAll('[data-kbt-partner-fallback]')).filter(function(panel) {
            return panel.getAttribute('data-partner-placement') === placement && !panel.hasAttribute('data-kbt-partner-mounted');
        });
    }
    function isUsableAdSlot(slot) {
        if (!slot) return false;
        if (slot.hidden || slot.getAttribute('aria-hidden') === 'true') return false;
        var style = window.getComputedStyle ? window.getComputedStyle(slot) : null;
        if (style && (style.display === 'none' || style.visibility === 'hidden')) return false;
        return true;
    }
    function isHiddenByParent(panel) {
        if (!panel) return true;
        if (panel.hidden || panel.getAttribute('aria-hidden') === 'true') return true;
        var current = panel.parentElement;
        while (current && current !== document.body) {
            var style = window.getComputedStyle ? window.getComputedStyle(current) : null;
            if (style && style.display === 'none') {
                return true;
            }
            current = current.parentElement;
        }
        return false;
    }
    function mountVisiblePartnerFallback(slot, source, reason) {
        if (!slot || !source || !source.parentNode) return;
        var placement = slot.getAttribute('data-ad-placement') || '';
        var existing = Array.prototype.slice.call(document.querySelectorAll('[data-kbt-partner-mounted]')).find(function(panel) {
            return panel.getAttribute('data-partner-placement') === placement;
        });
        if (existing) {
            existing.hidden = false;
            existing.classList.add('is-visible');
            existing.setAttribute('data-fallback-reason', reason || 'blocked');
            return;
        }
        var hiddenWrapper = slot.closest('.footer-ad-section, .blog-rail-ad, .blog-hero-ad, .blog-pinned-ad-box, .home-after-tool-banner');
        var anchor = hiddenWrapper || slot;
        var clone = source.cloneNode(true);
        clone.hidden = false;
        clone.classList.add('is-visible');
        clone.setAttribute('data-fallback-reason', reason || 'blocked');
        clone.setAttribute('data-kbt-partner-mounted', 'true');
        if (anchor.parentNode) {
            anchor.parentNode.insertBefore(clone, anchor.nextSibling);
        }
    }
    function showPartnerFallbackSlot(slot, reason) {
        partnerFallbacksForSlot(slot).forEach(function(panel) {
            if (isHiddenByParent(panel)) {
                panel.hidden = true;
                panel.classList.remove('is-visible');
                mountVisiblePartnerFallback(slot, panel, reason);
                return;
            }
            panel.hidden = false;
            panel.classList.add('is-visible');
            panel.setAttribute('data-fallback-reason', reason || 'blocked');
            var surface = panel.closest('[data-kbt-partner-surface]');
            if (surface) {
                surface.hidden = false;
                surface.classList.add('is-visible');
            }
        });
    }
    function hidePartnerFallbackSlot(slot) {
        var placement = slot ? slot.getAttribute('data-ad-placement') : '';
        if (!placement) return;
        Array.prototype.slice.call(document.querySelectorAll('[data-kbt-partner-fallback]')).forEach(function(panel) {
            if (panel.getAttribute('data-partner-placement') !== placement) return;
            panel.hidden = true;
            panel.classList.remove('is-visible');
            panel.removeAttribute('data-fallback-reason');
            if (panel.hasAttribute('data-kbt-partner-mounted') && panel.parentNode) {
                panel.parentNode.removeChild(panel);
            }
        });
    }
    window.kbtShowHouseAdSurfaces = showHouseAdSurfaces;
    window.kbtShowHouseAdSlot = showHouseAdSlot;
    window.kbtShowPartnerFallbackSlot = showPartnerFallbackSlot;
    window.kbtHidePartnerFallbackSlot = hidePartnerFallbackSlot;
    window.kbtCollapseAdSurfaces = showHouseAdSurfaces;
    window.kbtCollapseAdSlot = showHouseAdSlot;
    function probeForAdBlocker() {
        if (!document.body || mobileAdsDisabled && isMobileViewport()) return;
        var bait = document.createElement('div');
        bait.className = 'adsbox ad-banner adsbygoogle advertisement pub_300x250';
        bait.style.cssText = 'position:absolute;left:-10000px;top:-10000px;width:1px;height:1px;pointer-events:none;';
        document.body.appendChild(bait);
        window.setTimeout(function() {
            var style = window.getComputedStyle ? window.getComputedStyle(bait) : null;
            var blocked = !bait.isConnected || (style && (style.display === 'none' || style.visibility === 'hidden' || style.opacity === '0'));
            if (bait.parentNode) {
                bait.parentNode.removeChild(bait);
            }
            if (blocked) {
                showHouseAdSurfaces('blocked');
            }
        }, 160);
    }
    function adElementLooksBlocked(ad) {
        if (!ad) return false;
        var style = window.getComputedStyle ? window.getComputedStyle(ad) : null;
        if (style && (style.display === 'none' || style.visibility === 'hidden' || style.opacity === '0')) {
            return true;
        }
        return false;
    }
    function probeManualSlotsForBlocking() {
        if (mobileAdsDisabled && isMobileViewport()) return;
        document.querySelectorAll('.kbt-ad-slot--pending').forEach(function(slot) {
            var ad = slot.querySelector('.adsbygoogle');
            if (adElementLooksBlocked(ad)) {
                showHouseAdSlot(slot, 'blocked');
            }
        });
    }
    function scheduleManualSlotProbes() {
        if (mobileAdsDisabled && isMobileViewport()) return;
        [260, 900, 1800].forEach(function(delay) {
            setTimeout(probeManualSlotsForBlocking, delay);
        });
    }
    function isMobileViewport() {
        return window.matchMedia && window.matchMedia('(max-width: 768px)').matches;
    }
    function loadAds() {
        if (loaded) return;
        if (forceLocalHouseAds) return;
        if (mobileAdsDisabled && isMobileViewport()) return;
        loaded = true;
        var s = document.createElement('script');
        s.src = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7056306765580248';
        s.crossOrigin = 'anonymous';
        s.async = true;
        s.onerror = function() { showHouseAdSurfaces('blocked'); };
        document.head.appendChild(s);
    }
    window.kbtLoadAds = loadAds;
    // Load on first real user interaction (desktop/tablet only when mobile ads are disabled)
    var events = ['scroll', 'click', 'keydown', 'touchstart', 'mousemove'];
    function onInteract() {
        if (mobileAdsDisabled && isMobileViewport()) return;
        events.forEach(function(e) { window.removeEventListener(e, onInteract, {passive: true}); });
        if (window.requestIdleCallback) {
            requestIdleCallback(loadAds, {timeout: 3000});
        } else {
            setTimeout(loadAds, 200);
        }
    }
    events.forEach(function(e) { window.addEventListener(e, onInteract, {passive: true}); });
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            if (maybeShowLocalHouseAds()) return;
            probeForAdBlocker();
            scheduleManualSlotProbes();
        }, {once: true});
    } else {
        if (maybeShowLocalHouseAds()) return;
        probeForAdBlocker();
        scheduleManualSlotProbes();
    }
    // Fallback is intentionally late so consent/ads CSS does not compete with LCP.
    window.addEventListener('load', function() {
        setTimeout(probeManualSlotsForBlocking, 600);
        setTimeout(loadAds, 15000);
    });
})();
</script>
<?php endif; ?>

<?php if ($loadInterFont): ?>
<!-- Inter font: async + metric overrides = no render-blocking AND no CLS -->
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=optional"<?php echo $deferGoogleFontsOnMobile ? ' media="(min-width: 769px)"' : ''; ?> onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=optional"<?php echo $deferGoogleFontsOnMobile ? ' media="(min-width: 769px)"' : ''; ?>></noscript>
<?php endif; ?>

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
<link rel="preload" as="style" href="<?php echo $basePath; ?>assets/css/global.min.css?v=4.1" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/global.min.css?v=4.1"></noscript>
<?php endif; ?>
<link rel="preload" as="style" href="<?php echo $basePath; ?>assets/css/tools-list.min.css" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/tools-list.min.css"></noscript>
<?php if ($loadAiChatCss): ?>
<link rel="preload" as="style" href="<?php echo $basePath; ?>assets/css/ai-chat.css?v=3.0" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/ai-chat.css?v=3.0"></noscript>
<?php endif; ?>
<?php if ($loadMobileToolAdapters): ?>
<link rel="preload" as="style" href="<?php echo $basePath; ?>assets/css/mobile-tool-adapters.min.css?v=1" onload="this.onload=null;this.rel='stylesheet'">
<?php endif; ?>
<?php if (strpos($phpSelf, '/blog/') !== false): ?>
<!-- Blog typography bump: increases every blog font-size by ~2pt -->
<link rel="preload" as="style" href="<?php echo $basePath; ?>assets/css/blog-fonts-bump.css?v=2" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/blog-fonts-bump.css?v=2"></noscript>
<?php endif; ?>
<?php if ($loadBootstrapCss): ?>
<link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"<?php echo $deferBootstrapOnMobile ? ' media="(min-width: 769px)"' : ''; ?> onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"<?php echo $deferBootstrapOnMobile ? ' media="(min-width: 769px)"' : ''; ?>></noscript>
<?php endif; ?>

<!-- Deferred JS -->
<script defer src="<?php echo $basePath; ?>assets/js/theme.min.js?v=2.2"></script>
<?php if ($loadMobileToolAdapters): ?>
<script defer src="<?php echo $basePath; ?>assets/js/mobile-tool-adapters.min.js?v=1"></script>
<?php endif; ?>
<?php if ($loadBootstrapJs): ?>
<?php if ($deferBootstrapOnMobile): ?>
<script>
(function() {
    var src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js';
    function loadBootstrap() {
        if (window.__kbtBootstrapLoaded) return;
        window.__kbtBootstrapLoaded = true;
        var s = document.createElement('script');
        s.src = src;
        s.async = true;
        document.head.appendChild(s);
    }
    if (!window.matchMedia || window.matchMedia('(min-width: 769px)').matches) {
        loadBootstrap();
        return;
    }
    window.addEventListener('load', function() {
        setTimeout(function() {
            if (window.requestIdleCallback) {
                requestIdleCallback(loadBootstrap, {timeout: 5000});
            } else {
                loadBootstrap();
            }
        }, 7000);
    });
})();
</script>
<?php else: ?>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php endif; ?>
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
$serviceWorkerVersion = '20260519b';
$serviceWorkerUrl = function_exists('url') ? url('sw.js?v=' . $serviceWorkerVersion) : $basePath . 'sw.js?v=' . $serviceWorkerVersion;
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
