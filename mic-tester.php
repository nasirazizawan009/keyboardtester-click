<?php include 'config.php'; ?>
<?php
$pageTitle = 'Microphone Test Online Free — Test Your Mic Before Calls | KeyboardTester.click';
$pageDescription = 'Microphone test online free. Test your mic before Zoom, Teams or Discord calls. Browser-based, no install, fully private.';
$pageKeywords = 'microphone test online, mic test, test microphone, microphone checker';
$pageOgImage = 'images/mic-test/microphone-test-live-input-check-1400.png';
$pageOgImageAlt = 'Person checking microphone input online with a live waveform and audio level meter';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/includes/seo-meta.php'; ?>
  <?php include 'includes/head-common.php'; ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>

  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <!-- Structured Data (JSON-LD) -->
  <?php
  include_once __DIR__ . '/includes/schema.php';
  echo generateToolPageSchema('mic_tester', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Microphone Tester', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-mic-tester.php'; ?>

    <section class="tool-stage" id="mic-tester-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="tool-stage-title">Mic Tester</h2>
          <p class="section-lede">Use the live tool below to complete your test.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
        </div>
      </div>
      <section id="mic-tester" class="tool-shell">
        <?php include 'tools/mic_tester_tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Live feedback</div>
          <div class="trust-desc">See results instantly</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Quick reset</div>
          <div class="trust-desc">Run another test fast</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Browser based</div>
          <div class="trust-desc">No installs or signups</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Focused checks</div>
          <div class="trust-desc">Built for microphone input</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Microphone Input Check</p>
          <h2 id="feature-title">Check Microphone Input and Voice Activity</h2>
          <p class="section-lede">Test whether your mic is detected, monitor input movement, and confirm it captures audio.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Focused insights</h3>
            <p>Track microphone input with live updates.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Instant results</h3>
            <p>See changes as you test in real time.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Simple controls</h3>
            <p>Start, stop, and reset in seconds.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Repeatable tests</h3>
            <p>Compare multiple runs quickly.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="process-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Simple workflow</p>
            <h2 id="process-title">How to Test a Microphone Online</h2>
          </div>
          <p class="section-lede">Allow mic access, speak normally, and confirm the input meter responds to your voice.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <picture>
                <source type="image/webp" srcset="<?php echo url('images/mic-test/microphone-test-allow-browser-access-640.webp'); ?> 640w, <?php echo url('images/mic-test/microphone-test-allow-browser-access-960.webp'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <source type="image/png" srcset="<?php echo url('images/mic-test/microphone-test-allow-browser-access-640.png'); ?> 640w, <?php echo url('images/mic-test/microphone-test-allow-browser-access-960.png'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <img src="<?php echo url('images/mic-test/microphone-test-allow-browser-access-640.png'); ?>" width="640" height="426" alt="Online microphone test permission step with browser access prompt and person at desk" loading="lazy" decoding="async">
              </picture>
            </div>
            <div class="step-number">01</div>
            <h3>Start the test</h3>
            <p>Open the tool and prepare to begin.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <picture>
                <source type="image/webp" srcset="<?php echo url('images/mic-test/microphone-test-speak-and-check-levels-640.webp'); ?> 640w, <?php echo url('images/mic-test/microphone-test-speak-and-check-levels-960.webp'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <source type="image/png" srcset="<?php echo url('images/mic-test/microphone-test-speak-and-check-levels-640.png'); ?> 640w, <?php echo url('images/mic-test/microphone-test-speak-and-check-levels-960.png'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <img src="<?php echo url('images/mic-test/microphone-test-speak-and-check-levels-640.png'); ?>" width="640" height="426" alt="Person using an online mic test while watching live audio waveform levels" loading="lazy" decoding="async">
              </picture>
            </div>
            <div class="step-number">02</div>
            <h3>Speak into the mic</h3>
            <p>to monitor levels.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <picture>
                <source type="image/webp" srcset="<?php echo url('images/mic-test/microphone-test-review-input-results-640.webp'); ?> 640w, <?php echo url('images/mic-test/microphone-test-review-input-results-960.webp'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <source type="image/png" srcset="<?php echo url('images/mic-test/microphone-test-review-input-results-640.png'); ?> 640w, <?php echo url('images/mic-test/microphone-test-review-input-results-960.png'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <img src="<?php echo url('images/mic-test/microphone-test-review-input-results-640.png'); ?>" width="640" height="426" alt="Online microphone tester status card showing live input and peak level results" loading="lazy" decoding="async">
              </picture>
            </div>
            <div class="step-number">03</div>
            <h3>Review results</h3>
            <p>Check your microphone input stats and retest if needed.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $intentClusterTool = 'mic'; $currentTool = 'mic'; include 'includes/components/intent-cluster-links.php'; ?>
    <?php include 'help/seo-content/mic-tester.php'; ?>
    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'includes/related-tools.php'; ?>
    <?php include 'help/mic-tester.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
