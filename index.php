<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "uglsz9kphe");
</script>
    
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl(''); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl(''); ?>">
    
    <!-- Preload Hero Image -->
    <link rel="preload" as="image" href="<?php echo url('images/keyboard/hero-keyboard-test.png'); ?>">
    
    <!-- Common Head Includes -->
    <?php include 'includes/head-common.php'; ?>

    <!-- Landing Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tool Styles -->
    <link rel="stylesheet" href="<?php echo url('assets/css/keyboard-tool.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
    
    <!-- Structured Data - WebApplication Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebApplication",
      "name": "KeyboardTester.Click",
      "alternateName": "Keyboard Tester",
      "description": "Free online keyboard and mouse testing tool to check functionality, detect broken keys, and troubleshoot issues",
      "url": "https://keyboardtester.click/",
      "applicationCategory": "UtilityApplication",
      "operatingSystem": "Any",
      "browserRequirements": "Requires JavaScript",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "USD"
      },
      "featureList": [
        "Keyboard key testing",
        "Mouse click testing",
        "Mouse scroll testing",
        "Typing speed test",
        "Click speed test",
        "Multi-language keyboard support"
      ],
      "screenshot": "<?php echo absoluteUrl('images/keyboard/hero-keyboard-test.png'); ?>",
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "ratingCount": "1250"
      }
    }
    </script>
    
    <!-- BreadcrumbList Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "https://keyboardtester.click/"
      }]
    }
    </script>
    
    <!-- Organization Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "KeyboardTester.Click",
      "url": "https://keyboardtester.click/",
      "logo": "<?php echo absoluteUrl('images/shared/keyboard-and-mouse.png'); ?>",
      "sameAs": [
        "https://gitlab.com/nasirazizawan/keyboardtester.click"
      ]
    }
    </script>

    <!-- FAQPage Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How do I test my keyboard online?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Click inside the tester and press any key. The key highlights on the visual keyboard and appears in key history."
          }
        },
        {
          "@type": "Question",
          "name": "Why does a key not register in the keyboard tester?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Make sure the page is focused, press the key firmly, and confirm your OS language matches the selected layout."
          }
        },
        {
          "@type": "Question",
          "name": "Can I test keyboard ghosting or multiple key presses?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Press several keys together to see which keys register and identify ghosting issues."
          }
        },
        {
          "@type": "Question",
          "name": "Does the keyboard tester work with different layouts?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. You can switch between QWERTY, AZERTY, Dvorak, and Colemak, plus Windows or Mac labels."
          }
        },
        {
          "@type": "Question",
          "name": "Is the keyboard test private?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Testing runs in your browser and does not upload data to a server."
          }
        }
      ]
    }
    </script>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
  <?php include 'help/brief-keyboard-tester.php'; ?>

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
        <p class="section-lede">A focused suite for daily checks, support tickets, and hardware troubleshooting.</p>
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
            <img src="<?php echo url('images/keyboard/Press-any-key.png'); ?>" alt="Press any key to start the KeyboardTester.click keyboard test" loading="lazy">
          </div>
          <div class="process-body">
            <div class="step-number">01</div>
            <h3>Press any key</h3>
            <p>Start typing and watch the key map respond in real time.</p>
          </div>
        </article>
        <article class="process-card">
          <div class="process-media">
            <img src="<?php echo url('images/keyboard/special-keys-layout.png'); ?>" alt="Keyboard tester special keys and layout highlights on KeyboardTester.click" loading="lazy">
          </div>
          <div class="process-body">
            <div class="step-number">02</div>
            <h3>Review insights</h3>
            <p>Open Advanced Options for heatmap, stats, and ghost click checks.</p>
          </div>
        </article>
        <article class="process-card">
          <div class="process-media">
            <img src="<?php echo url('images/keyboard/color-system-guide.png'); ?>" alt="Keyboard tester color system and exportable test results on KeyboardTester.click" loading="lazy">
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

  <section class="tool-stage" aria-labelledby="tool-stage-title">
    <div class="container tool-stage-header">
      <div>
        <p class="section-kicker">Primary tester</p>
        <h2 id="tool-stage-title">Keyboard tester</h2>
        <p class="section-lede">Use the live tool below to test every key, check layouts, and measure latency.</p>
      </div>
      <div class="tool-stage-actions">
        <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
      </div>
    </div>
    <div class="tool-shell">
      <?php include 'tools/keyboard_tester_english.php'; ?>
    </div>
  </section>

  <?php include 'includes/components/tools-list.php'; ?>
  <?php include 'help/keyboard-tester.php'; ?>
</main>

<?php include 'footer.php'; ?>
</body>
</html>


