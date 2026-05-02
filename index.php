<?php include 'config.php'; ?>
<?php require_once __DIR__ . '/includes/components/adsense-slot.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="onILKj31lZD-N2oSgtXNpKZnKJZi1oK0N_yMWIP71_4">

    <?php include __DIR__ . '/includes/seo-meta.php'; ?>

<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl(''); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl(''); ?>">

    <!-- Minimal critical CSS: keep above-the-fold structure stable before full CSS arrives -->
    <style>
    .landing-main{min-height:100vh}
    .landing-hero-grid{min-height:320px}
    .hero-copy{min-height:200px}
    .hero-visual{align-self:start}
    .hero-yt-facade{aspect-ratio:16/9;position:relative;background:#0f172a;border-radius:16px;overflow:hidden}
    .tool-stage{min-height:580px;background:radial-gradient(720px 380px at 10% 20%,rgba(14,165,233,.16),transparent 60%),radial-gradient(720px 380px at 90% 25%,rgba(22,163,74,.14),transparent 60%),var(--landing-bg)}
    .tool-shell{min-height:580px}
    @media(max-width:980px){.landing-hero-grid{min-height:auto}.hero-visual{min-height:240px}}
    @media(max-width:768px){.tool-stage{min-height:500px}.tool-shell{min-height:420px}.keyboard-tester{min-height:380px}}
    </style>

    <?php
    $loadBootstrapCss = false;
    $loadBootstrapJs = false;
    $loadMobileToolAdapters = false;
    ?>
    <!-- Common Head Includes -->
    <?php include 'includes/head-common.php'; ?>

    <!-- Preload keyboard assets (break network dependency chain - discovered late in body otherwise) -->
    <link rel="preload" as="style" href="<?php echo url('assets/css/keyboard-tool.min.css'); ?>" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?php echo url('assets/css/keyboard-tool.min.css'); ?>"></noscript>
    <?php
    $cpCssPath = __DIR__ . '/assets/css/keyboard-cat-progress.css';
    $cpJsPath = __DIR__ . '/assets/js/keyboard-cat-progress.min.js';
    $cpCssVer = is_file($cpCssPath) ? filemtime($cpCssPath) : '1';
    $cpJsVer = is_file($cpJsPath) ? filemtime($cpJsPath) : '1';
    ?>
    <link rel="preload" as="style" href="<?php echo url('assets/css/keyboard-cat-progress.css') . '?v=' . $cpCssVer; ?>">
    <link rel="preload" as="script" href="<?php echo url('assets/js/keyboard-cat-progress.min.js') . '?v=' . $cpJsVer; ?>">

    <!-- JetBrains Mono: async with display=optional (keyboard keys have fixed dimensions) -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400&display=optional" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400&display=optional"></noscript>

    <!-- Load landing stylesheet before first paint to avoid hero/main CLS -->
    <?php $imv = filemtime(__DIR__ . '/assets/css/index-modern.min.css'); ?>
    <link rel="preload" as="style" href="<?php echo url('assets/css/index-modern.min.css') . '?v=' . $imv; ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.min.css') . '?v=' . $imv; ?>">

    <!-- Clarity Analytics (delayed 4s to avoid forced reflow on initial render) -->
    <script>
    window.addEventListener('load', function() {
        setTimeout(function() {
            (function(c,l,a,r,i,t,y){
                c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
                t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
                y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
            })(window, document, "clarity", "script", "uglsz9kphe");
        }, 4000);
    });
    </script>

    <!-- Structured Data (JSON-LD) -->
    <?php
    include_once __DIR__ . '/includes/schema.php';
    echo generateHomepageSchema();
    ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
  <?php include 'help/brief-keyboard-tester.php'; ?>

  <?php kbtRenderAdSlot('home_hero_banner', ['class' => 'kbt-ad-slot--leaderboard kbt-ad-slot--hero-banner', 'format' => 'horizontal', 'full_width_responsive' => false]); ?>

  <section class="tool-stage" id="keyboard-stage" aria-label="Keyboard tester tool">
    <div class="tool-shell">
      <?php include 'tools/keyboard_tester_english.php'; ?>
    </div>
  </section>

  <section class="trust-strip" aria-label="Key benefits">
    <div class="container trust-grid">
      <div class="trust-item">
        <div class="trust-title">No installs</div>
        <div class="trust-desc">Runs fully in your browser</div>
      </div>
      <div class="trust-item">
        <div class="trust-title">Layout aware</div>
        <div class="trust-desc">QWERTY, AZERTY, Colemak, Dvorak</div>
      </div>
      <div class="trust-item">
        <div class="trust-title">Live diagnostics</div>
        <div class="trust-desc">Instant key, heatmap, and latency data</div>
      </div>
      <div class="trust-item">
        <div class="trust-title">Privacy first</div>
        <div class="trust-desc">No data leaves your device</div>
      </div>
      <div class="trust-item">
        <div class="trust-title">Free &amp; Open Source</div>
        <div class="trust-desc"><a href="https://github.com/nasirazizawan009/keyboardtester-click" target="_blank" rel="noopener noreferrer" style="color:var(--primary-color,#4b5eaa);text-decoration:none;font-weight:600;">View on GitHub</a></div>
      </div>
    </div>
  </section>

  <section class="feature-band" aria-labelledby="feature-title">
    <div class="container">
      <div class="section-head">
        <p class="section-kicker">Built for fast diagnostics</p>
        <h2 id="feature-title">Everything you need to validate your keyboard</h2>
        <p class="section-lede">A focused suite for testing every key with real-time feedback, daily checks, support tickets, and hardware troubleshooting.</p>
      </div>
      <div class="landing-feature-grid">
        <article class="landing-feature-card">
          <h3>Live key map</h3>
          <p>See every press highlighted instantly with color feedback and key history.</p>
        </article>
        <article class="landing-feature-card">
          <h3>Ghosting and latency</h3>
          <p>Measure response time and detect phantom inputs using built-in tools.</p>
        </article>
        <article class="landing-feature-card">
          <h3>Multi device support</h3>
          <p>Switch layouts and OS labels on the fly without leaving the page.</p>
        </article>
        <article class="landing-feature-card">
          <h3>Exportable results</h3>
          <p>Save a session report for QA notes or support documentation.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="process-band" aria-labelledby="process-title">
    <div class="container">
      <div class="section-head split">
        <div>
          <p class="section-kicker">Simple workflow</p>
          <h2 id="process-title">Three steps to verify your keyboard</h2>
        </div>
        <p class="section-lede">Run a complete check in under a minute and export the results if needed.</p>
      </div>
      <div class="process-grid">
        <article class="process-card">
          <div class="process-media">
            <picture>
              <source type="image/webp" srcset="<?php echo url('images/keyboard/Press-any-key-512.webp'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.webp'); ?> 768w" sizes="(max-width: 900px) 90vw, 411px">
              <source type="image/png" srcset="<?php echo url('images/keyboard/Press-any-key-512.png'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.png'); ?> 768w" sizes="(max-width: 900px) 90vw, 411px">
              <img src="<?php echo url('images/keyboard/Press-any-key-512.png'); ?>" width="512" height="768" alt="Press any key to start the KeyboardTester.click keyboard test" loading="lazy" decoding="async">
            </picture>
          </div>
          <div class="process-body">
            <div class="step-number">01</div>
            <h3>Press any key</h3>
            <p>Start typing and watch the key map respond in real time.</p>
          </div>
        </article>
        <article class="process-card">
          <div class="process-media">
            <picture>
              <source type="image/webp" srcset="<?php echo url('images/keyboard/special-keys-layout-448.webp'); ?>">
              <source type="image/png" srcset="<?php echo url('images/keyboard/special-keys-layout-448.png'); ?>">
              <img src="<?php echo url('images/keyboard/special-keys-layout-448.png'); ?>" width="448" height="299" alt="Keyboard tester special keys and layout highlights on KeyboardTester.click" loading="lazy" decoding="async">
            </picture>
          </div>
          <div class="process-body">
            <div class="step-number">02</div>
            <h3>Review insights</h3>
            <p>Open Advanced Options for heatmap, stats, and ghost click checks.</p>
          </div>
        </article>
        <article class="process-card">
          <div class="process-media">
            <picture>
              <source type="image/webp" srcset="<?php echo url('images/keyboard/color-system-guide-448.webp'); ?>">
              <source type="image/png" srcset="<?php echo url('images/keyboard/color-system-guide-448.png'); ?>">
              <img src="<?php echo url('images/keyboard/color-system-guide-448.png'); ?>" width="448" height="299" alt="Keyboard tester color system and exportable test results on KeyboardTester.click" loading="lazy" decoding="async">
            </picture>
          </div>
          <div class="process-body">
            <div class="step-number">03</div>
            <h3>Export the session</h3>
            <p>Download a report to keep your diagnostics organized.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <?php $intentClusterTool = 'keyboard'; $intentClusterKicker = 'Keyboard test variants'; include 'includes/components/intent-cluster-links.php'; unset($intentClusterTool, $intentClusterKicker); ?>
  <?php include 'help/keyboard-tester.php'; ?>
  <?php kbtRenderAdSlot('home_after_guide', ['class' => 'kbt-ad-slot--leaderboard kbt-ad-slot--home-after-guide', 'format' => 'horizontal', 'full_width_responsive' => false]); ?>
  <?php $currentTool = 'keyboard'; $relatedToolsSectionId = 'tools'; $relatedToolsTitle = 'Popular testing tools'; $relatedToolsIntro = 'Use these focused diagnostics when a keyboard issue may involve input delay, mouse behavior, typing speed, or audio/video checks.'; include 'includes/related-tools.php'; unset($currentTool, $relatedToolsSectionId, $relatedToolsTitle, $relatedToolsIntro); ?>
  <?php $toolBlogSlug = 'keyboard-not-typing-lagging-sticky-fix-clean-guide.php'; include __DIR__ . '/includes/components/tool-blog-cta.php'; ?>
  <?php include __DIR__ . '/includes/components/homepage-latest-blog.php'; ?>
</main>

<?php $kbtSuppressFooterAd = true; include 'footer.php'; ?>
</body>
</html>


