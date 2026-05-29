<?php include 'config.php'; ?>
<?php require_once __DIR__ . '/includes/components/adsense-slot.php'; ?>
<?php require_once __DIR__ . '/includes/components/microsoft-store-badge.php'; ?>
<?php require_once __DIR__ . '/includes/components/tool-popular-tools.php'; ?>
<?php $GLOBALS['kbtSuppressFooterAd'] = true; ?>
<?php $GLOBALS['kbtSuppressKeyboardCatProgress'] = true; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="onILKj31lZD-N2oSgtXNpKZnKJZi1oK0N_yMWIP71_4">

    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
    <!-- hreflang cluster (en + 8 locales + x-default) is emitted by includes/head-common.php below -->

    <!-- Minimal critical CSS: keep above-the-fold structure stable before full CSS arrives -->
    <style>
    .landing-main{min-height:100vh}
    .landing-hero-grid{min-height:320px}
    .hero-copy{min-height:200px}
    .hero-visual{align-self:start}
    .hero-yt-facade{aspect-ratio:16/9;position:relative;background:#0f172a;border-radius:4px;overflow:hidden}
    .tool-stage{min-height:580px;background:#f5f5f5}
    .tool-shell{min-height:580px}
    @media(max-width:980px){.landing-hero-grid{min-height:auto}.hero-visual{min-height:240px}}
    @media(max-width:768px){.tool-stage{min-height:500px}.tool-shell{min-height:420px}.keyboard-tester{min-height:380px}}
    </style>

    <?php
    $loadBootstrapCss = false;
    $loadBootstrapJs = false;
    $loadMobileToolAdapters = false;
    $loadInterFont = false;
    ?>

    <!-- LCP hero image preload: keep before common head assets so the browser
         discovers the mobile/desktop hero candidate as early as possible. -->
    <link rel="preload" as="image"
          href="<?php echo url('images/home/headphones-diagnostic-hero-1440.webp'); ?>"
          imagesrcset="<?php echo url('images/home/headphones-diagnostic-hero-900.webp'); ?> 900w, <?php echo url('images/home/headphones-diagnostic-hero-1280.webp'); ?> 1280w, <?php echo url('images/home/headphones-diagnostic-hero-1440.webp'); ?> 1440w, <?php echo url('images/home/headphones-diagnostic-hero-1792.webp'); ?> 1792w"
          imagesizes="100vw"
          type="image/webp"
          fetchpriority="high">

    <!-- Common Head Includes -->
    <?php include 'includes/head-common.php'; ?>

    <!-- Preload keyboard assets (break network dependency chain - discovered late in body otherwise) -->
    <link rel="preload" as="style" href="<?php echo url('assets/css/keyboard-tool.min.css'); ?>" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?php echo url('assets/css/keyboard-tool.min.css'); ?>"></noscript>
    <?php if (empty($GLOBALS['kbtSuppressKeyboardCatProgress'])): ?>
        <?php
        $cpCssPath = __DIR__ . '/assets/css/keyboard-cat-progress.css';
        $cpJsPath = __DIR__ . '/assets/js/keyboard-cat-progress.min.js';
        $cpCssVer = is_file($cpCssPath) ? filemtime($cpCssPath) : '1';
        $cpJsVer = is_file($cpJsPath) ? filemtime($cpJsPath) : '1';
        ?>
        <link rel="preload" as="style" href="<?php echo url('assets/css/keyboard-cat-progress.css') . '?v=' . $cpCssVer; ?>">
        <link rel="preload" as="script" href="<?php echo url('assets/js/keyboard-cat-progress.min.js') . '?v=' . $cpJsVer; ?>">
    <?php endif; ?>

    <!-- Load landing stylesheet before first paint to avoid hero/main CLS -->
    <?php $imv = filemtime(__DIR__ . '/assets/css/index-modern.min.css'); ?>
    <link rel="preload" as="style" href="<?php echo url('assets/css/index-modern.min.css') . '?v=' . $imv; ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.min.css') . '?v=' . $imv; ?>">

    <!-- Clarity Analytics: defer beyond LCP/PSI trace or load on first real interaction -->
    <script>
    (function() {
        var loaded = false;
        var scheduled = false;
        var events = ['scroll', 'click', 'keydown', 'touchstart'];
        function loadClarity() {
            if (loaded) return;
            loaded = true;
            scheduled = false;
            events.forEach(function(eventName) {
                window.removeEventListener(eventName, loadClarity, { passive: true });
                window.removeEventListener(eventName, scheduleClarity, { passive: true });
            });
            (function(c,l,a,r,i,t,y){
                c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
                t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
                y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
            })(window, document, "clarity", "script", "uglsz9kphe");
        }
        function scheduleClarity() {
            if (loaded || scheduled) return;
            scheduled = true;
            events.forEach(function(eventName) {
                window.removeEventListener(eventName, scheduleClarity, { passive: true });
            });
            var run = function() { loadClarity(); };
            if (window.requestIdleCallback) {
                requestIdleCallback(run, { timeout: 4000 });
            } else {
                setTimeout(run, 1500);
            }
        }
        events.forEach(function(eventName) {
            window.addEventListener(eventName, scheduleClarity, { passive: true });
        });
        window.addEventListener('load', function() {
            setTimeout(loadClarity, 12000);
        });
    })();
    </script>

    <!-- Structured Data (JSON-LD) -->
    <?php
    include_once __DIR__ . '/includes/schema.php';
    echo generateHomepageSchema();
    ?>
</head>
<body class="landing-page home-redesign">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
  <?php include 'help/brief-keyboard-tester.php'; ?>

  <section class="tool-stage" id="keyboard-stage" data-header-hide-stage aria-label="Keyboard tester tool">
    <div class="tool-shell">
      <?php include 'tools/keyboard_tester_english.php'; ?>
    </div>
  </section>

  <section class="home-after-tool-banner" aria-label="Sponsored placement">
    <?php
      kbtRenderAdSlot('home_after_tool_banner', [
        'class' => 'kbt-ad-slot--after-tool-banner',
        'format' => 'auto',
        'aria_label' => 'Sponsored placement',
        'min_width' => 769
      ]);
    ?>
  </section>

  <?php kbtRenderToolPopularToolsIfEnglish(['currentToolId' => 'mouse-test']); ?>

  <div class="home-rails-region">
    <aside class="home-rails-side home-rails-side--left" aria-hidden="true">
      <div class="home-rails-side__sticky">
        <?php
          kbtRenderAdSlot('home_guidelines_left_rail', [
            'class' => 'kbt-ad-slot--home-guideline-rail kbt-ad-slot--home-guideline-left',
            'format' => 'auto',
            'aria_label' => 'Sponsored guide placement',
            'min_width' => 1281
          ]);
        ?>
      </div>
    </aside>
    <aside class="home-rails-side home-rails-side--right" aria-hidden="true">
      <div class="home-rails-side__sticky">
        <?php
          kbtRenderAdSlot('home_guidelines_right_rail', [
            'class' => 'kbt-ad-slot--home-guideline-rail kbt-ad-slot--home-guideline-right',
            'format' => 'auto',
            'aria_label' => 'Sponsored FAQ placement',
            'min_width' => 1281
          ]);
        ?>
      </div>
    </aside>

  <section class="home-guideline-brief" id="guidelines" aria-labelledby="home-guidelines-title">
    <div class="container home-guideline-layout home-guideline-layout--balanced">
      <div class="home-guideline-copy">
        <p class="section-kicker">Keyboard tester standard</p>
        <h2 id="home-guidelines-title">How to run a reliable keyboard test online</h2>
        <p>Use this keyboard tester online when you need a clean key test, keyboard checker, or laptop keyboard test before changing hardware. Work through the steps in order: confirm the layout, test every key once, compare the key history, then use deeper checks for stuck keys, keyboard ghosting, N-key rollover, or input latency.</p>
        <div class="home-guideline-steps" aria-label="Keyboard test workflow">
          <article class="home-guideline-step">
            <span class="home-guideline-step-number">01</span>
            <span>
              <strong>Choose OS and layout labels</strong>
              <small>Select Windows or Mac labels and the closest layout before pressing keys. QWERTY, AZERTY, Dvorak, Colemak, compact, and laptop keyboards can send different symbols, so layout first prevents false failures.</small>
            </span>
          </article>
          <article class="home-guideline-step">
            <span class="home-guideline-step-number">02</span>
            <span>
              <strong>Focus the tester and press each key once</strong>
              <small>Click inside the tester, press one physical key at a time, and let it release. A healthy key highlights once, appears in key history, and does not stay active after your finger lifts.</small>
            </span>
          </article>
          <article class="home-guideline-step">
            <span class="home-guideline-step-number">03</span>
            <span>
              <strong>Compare highlight with key history</strong>
              <small>Use the visual highlight and history together. If the screen shows a different letter, check OS language settings, browser focus, and shortcut conflicts before assuming the switch is broken.</small>
            </span>
          </article>
          <article class="home-guideline-step">
            <span class="home-guideline-step-number">04</span>
            <span>
              <strong>Retest problem keys slowly</strong>
              <small>Repeat any missed, repeating, or sticky key three to five times. Key chatter usually appears as rapid duplicate entries from one press; a stuck key stays highlighted or fires without a fresh press.</small>
            </span>
          </article>
          <article class="home-guideline-step">
            <span class="home-guideline-step-number">05</span>
            <span>
              <strong>Check real shortcut combinations</strong>
              <small>Hold the shortcuts you actually use: WASD with Shift, Ctrl, Space, number keys, and arrows. Missed highlights in combinations can point to keyboard ghosting, blocked matrix paths, or rollover limits.</small>
            </span>
          </article>
          <article class="home-guideline-step">
            <span class="home-guideline-step-number">06</span>
            <span>
              <strong>Use Advanced Options and Pro Test</strong>
              <small>Open Advanced Options when a basic key press test is not enough. Pro Test adds heatmap, statistics, ghost-click monitoring, latency checks, guided all-key testing, and exportable evidence for repairs or comparisons.</small>
            </span>
          </article>
          <article class="home-guideline-step">
            <span class="home-guideline-step-number">07</span>
            <span>
              <strong>Confirm with related diagnostics</strong>
              <small>If keys pass here but feel delayed, test input latency. If one key repeats, use stuck-key testing. If shortcuts fail, compare with the keyboard ghosting and N-key rollover pages before replacing the keyboard.</small>
            </span>
          </article>
        </div>
        <div class="home-keyword-strip" aria-label="Common keyboard checks">
          <a href="#keyboard-tester">Keyboard tester</a>
          <a href="#keyboard-stage">Key test</a>
          <a href="#keyboard-stage">Keyboard checker</a>
          <a href="#keyboard-stage">Test keyboard online</a>
          <a href="<?php echo url('stuck-key-test.php'); ?>">Stuck key test</a>
          <a href="<?php echo url('keyboard-ghosting-test.php'); ?>">Keyboard ghosting test</a>
          <a href="<?php echo url('n-key-rollover-test.php'); ?>">N-key rollover test</a>
          <a href="<?php echo url('latency-checker.php'); ?>">Input latency test</a>
        </div>
      </div>
      <div class="home-faq-panel" aria-labelledby="home-faq-title">
        <p class="section-kicker">Quick answers</p>
        <h2 id="home-faq-title">Common questions before you start</h2>
        <div class="home-faq-list home-faq-list--expanded">
          <details open>
            <summary>How do I test every key on my keyboard online?</summary>
            <p>Click inside the keyboard tester, then press each physical key once. The matching key should light up and appear in the key history. Test letters, numbers, modifiers, arrows, numpad, and shortcuts separately so you can see missed keys, wrong symbols, or repeated input clearly.</p>
          </details>
          <details open>
            <summary>Do I need to download a keyboard tester app?</summary>
            <p>No. This is a browser keyboard tester, so it runs on the page without an app, extension, or account. Use it on Windows, Mac, Chromebook, Linux, laptop, USB, Bluetooth, and compact keyboards as long as the browser can receive normal keyboard events.</p>
          </details>
          <details open>
            <summary>Why is my keyboard not typing or not registering keys?</summary>
            <p>If keys fail here and in other apps, check the cable, Bluetooth battery, USB port, OS keyboard layout, and physical switch or membrane. If keys work here but not in one app or game, the problem is usually app focus, shortcut capture, permissions, or an in-game binding.</p>
          </details>
          <details open>
            <summary>How can I check for stuck keys, repeated keys, or keyboard chatter?</summary>
            <p>Press the problem key slowly and watch whether it records once, repeats rapidly, or stays highlighted after release. A chatter pattern usually means one press creates multiple history entries. Use the <a href="<?php echo url('stuck-key-test.php'); ?>">stuck key test</a> when you need a focused repeat-input check.</p>
          </details>
          <details open>
            <summary>Can this keyboard tester detect ghosting and N-key rollover?</summary>
            <p>Yes. It can reveal common ghosting and rollover limits by showing which held keys register together. Hold gaming combos like WASD with Shift and Space, then compare the highlights. For deeper combination checks, use the <a href="<?php echo url('keyboard-ghosting-test.php'); ?>">keyboard ghosting test</a>.</p>
          </details>
          <details open>
            <summary>Does it work with laptop, Windows, Mac, Chromebook, Bluetooth, and compact keyboards?</summary>
            <p>Yes. The test works with most desktop, laptop, wired, wireless, Bluetooth, Windows, Mac, Chromebook, and compact keyboards. Browser and OS shortcuts may still intercept some keys, and Fn-layer or media keys may not expose standard key events to any website.</p>
          </details>
          <details open>
            <summary>Are my keystrokes recorded or uploaded?</summary>
            <p>No. The key test runs in your browser and displays the result on the page. The tool does not need a login, download, or server upload for normal key testing. Avoid typing passwords or private text into any keyboard tester, including this one.</p>
          </details>
        </div>
      </div>
    </div>
  </section>
  <?php include __DIR__ . '/includes/components/homepage-latest-blog.php'; ?>
  <?php kbtRenderMicrosoftStoreSitewideBanner($siteChromeLocale ?? 'en'); ?>
  <?php $GLOBALS['kbtSuppressMicrosoftStoreBanner'] = true; /* footer must not re-render it */ ?>
  </div><!-- /.home-rails-region -->
</main>

<?php include 'footer.php'; ?>
</body>
</html>
