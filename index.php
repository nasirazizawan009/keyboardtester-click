<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="onILKj31lZD-N2oSgtXNpKZnKJZi1oK0N_yMWIP71_4">

    <!-- Preconnect FIRST (before any other resources) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://www.clarity.ms" crossorigin>

    <?php include __DIR__ . '/includes/seo-meta.php'; ?>

    <!-- Preload Hero Image (LCP element) -->
    <link rel="preload" as="image" href="<?php echo url('images/keyboard/hero-keyboard-test-900.webp'); ?>" type="image/webp" fetchpriority="high">

    <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl(''); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl(''); ?>">

    <!-- Critical CSS to prevent layout shift -->
    <style>
    .landing-hero{max-height:75vh;padding:2rem 0 1.5rem}
    .landing-main{min-height:100vh}
    .hero-shot img{width:100%;height:auto;display:block;border-radius:16px}
    .trust-strip{min-height:60px}
    .trust-grid{min-height:50px}
    .landing-hero-grid{min-height:auto}
    .hero-copy{min-height:auto}
    .tool-stage{padding:1.5rem 0 2rem}
    @media(max-width:980px){.landing-hero{max-height:none;padding:1.5rem 0 1rem}}
    @media(max-width:768px){.trust-strip{min-height:180px}.trust-grid{min-height:160px}}
    </style>

    <!-- Preload critical font to prevent layout shift -->
    <link rel="preload" as="font" type="font/woff2" href="https://fonts.gstatic.com/s/inter/v18/UcCO3FwrK3iLTeHuS_nVMrMxCp50SjIw2boKoduKmMEVuLyfAZ9hjp-Ek-_EeA.woff2" crossorigin>

    <!-- Common Head Includes -->
    <?php include 'includes/head-common.php'; ?>

    <!-- Page-specific CSS (async loading) -->
    <script>
    loadCSS('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400&display=optional');
    loadCSS('<?php echo url('assets/css/keyboard-tool.css'); ?>');
    loadCSS('<?php echo url('assets/css/index-modern.css'); ?>');
    </script>
    <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400&display=optional">
    <link rel="stylesheet" href="<?php echo url('assets/css/keyboard-tool.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
    </noscript>

    <!-- Clarity Analytics (deferred) -->
    <script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "uglsz9kphe");
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

  <section class="tool-stage" id="keyboard-tester" aria-labelledby="tool-stage-title">
    <div class="container tool-stage-header">
      <div>
        <p class="section-kicker">Primary tester</p>
        <h2 id="tool-stage-title">Keyboard tester</h2>
        <p class="section-lede">Use the live tool below to test every key, check layouts, and measure latency.</p>
      </div>
      <div class="tool-stage-actions">
        <a class="landing-btn landing-btn-ghost" href="#guidelines">Read keyboard testing guide</a>
      </div>
    </div>
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
              <source type="image/webp" srcset="<?php echo url('images/keyboard/Press-any-key-512.webp'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.webp'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
              <source type="image/png" srcset="<?php echo url('images/keyboard/Press-any-key-512.png'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.png'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
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
              <source type="image/webp" srcset="<?php echo url('images/keyboard/special-keys-layout-640.webp'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
              <source type="image/png" srcset="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
              <img src="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?>" width="640" height="426" alt="Keyboard tester special keys and layout highlights on KeyboardTester.click" loading="lazy" decoding="async">
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
              <source type="image/webp" srcset="<?php echo url('images/keyboard/color-system-guide-640.webp'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
              <source type="image/png" srcset="<?php echo url('images/keyboard/color-system-guide-640.png'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
              <img src="<?php echo url('images/keyboard/color-system-guide-640.png'); ?>" width="640" height="426" alt="Keyboard tester color system and exportable test results on KeyboardTester.click" loading="lazy" decoding="async">
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

  <?php include 'includes/components/tools-list.php'; ?>
  <?php include 'help/seo-content/keyboard-tester.php'; ?>
  <?php $currentTool = 'keyboard'; include 'includes/related-tools.php'; ?>
  <?php include 'help/keyboard-tester.php'; ?>
</main>

<?php include 'footer.php'; ?>
</body>
</html>


