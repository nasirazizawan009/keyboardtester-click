<?php include 'config.php'; ?>
<?php
$pageTitle = 'Headphone and Speaker Test Online | KeyboardTester.click';
$pageDescription = 'Test speakers and headphones online with stereo audio playback, left-right channel checks, and quick browser-based sound tests.';
$pageKeywords = 'headphone test, speaker test, audio test online, stereo sound test';
$pageOgImage = 'images/headphone-test/speaker-headphone-test-stereo-preview-1400.png';
$pageOgImageAlt = 'Person verifying stereo speaker and headphone output online with left and right channel controls';
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
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <!-- Structured Data (JSON-LD) -->
  <?php
  include_once __DIR__ . '/includes/schema.php';
  echo generateToolPageSchema('headphone_tester', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Headphone & Speaker Tester', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-headphone-speaker-tester.php'; ?>

    <section class="tool-stage" id="headphone-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="tool-stage-title">Headphone & Speaker Tester</h2>
          <p class="section-lede">Use the live tool below to complete your test.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
        </div>
      </div>
      <section id="headphone-speaker-tester-index" class="tool-shell">
        <?php include 'tools/headphone_speaker_tester_tool.php'; ?>
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
          <div class="trust-desc">Built for audio output</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Audio Output Check</p>
          <h2 id="feature-title">Test Speakers, Headphones, and Stereo Channels</h2>
          <p class="section-lede">Play browser-based audio to confirm sound output, left/right balance, and basic clarity.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Focused insights</h3>
            <p>Track audio output with live updates.</p>
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
            <h2 id="process-title">How to Test Speakers and Headphones Online</h2>
          </div>
          <p class="section-lede">Connect your device, play the test sounds, and verify both channels sound correct.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <picture>
                <source type="image/webp" srcset="<?php echo url('images/headphone-test/speaker-headphone-test-connect-device-640.webp'); ?> 640w, <?php echo url('images/headphone-test/speaker-headphone-test-connect-device-960.webp'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <source type="image/png" srcset="<?php echo url('images/headphone-test/speaker-headphone-test-connect-device-640.png'); ?> 640w, <?php echo url('images/headphone-test/speaker-headphone-test-connect-device-960.png'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <img src="<?php echo url('images/headphone-test/speaker-headphone-test-connect-device-640.png'); ?>" width="640" height="426" alt="Person connecting headphones for an online speaker and headphone test" loading="lazy" decoding="async">
              </picture>
            </div>
            <div class="step-number">01</div>
            <h3>Start the test</h3>
            <p>Open the tool and prepare to begin.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <picture>
                <source type="image/webp" srcset="<?php echo url('images/headphone-test/speaker-headphone-test-play-left-right-audio-640.webp'); ?> 640w, <?php echo url('images/headphone-test/speaker-headphone-test-play-left-right-audio-960.webp'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <source type="image/png" srcset="<?php echo url('images/headphone-test/speaker-headphone-test-play-left-right-audio-640.png'); ?> 640w, <?php echo url('images/headphone-test/speaker-headphone-test-play-left-right-audio-960.png'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <img src="<?php echo url('images/headphone-test/speaker-headphone-test-play-left-right-audio-640.png'); ?>" width="640" height="426" alt="Stereo left and right audio check card for online speaker and headphone testing" loading="lazy" decoding="async">
              </picture>
            </div>
            <div class="step-number">02</div>
            <h3>Play test audio</h3>
            <p>to check channels.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <picture>
                <source type="image/webp" srcset="<?php echo url('images/headphone-test/speaker-headphone-test-review-stereo-output-640.webp'); ?> 640w, <?php echo url('images/headphone-test/speaker-headphone-test-review-stereo-output-960.webp'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <source type="image/png" srcset="<?php echo url('images/headphone-test/speaker-headphone-test-review-stereo-output-640.png'); ?> 640w, <?php echo url('images/headphone-test/speaker-headphone-test-review-stereo-output-960.png'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <img src="<?php echo url('images/headphone-test/speaker-headphone-test-review-stereo-output-640.png'); ?>" width="640" height="426" alt="Online audio output test results showing stereo balance and playback status" loading="lazy" decoding="async">
              </picture>
            </div>
            <div class="step-number">03</div>
            <h3>Review results</h3>
            <p>Check your audio output stats and retest if needed.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $intentClusterTool = 'audio-output'; $currentTool = 'headphone'; include 'includes/components/intent-cluster-links.php'; ?>
    <?php include 'help/seo-content/headphone-speaker-tester.php'; ?>
    <?php include 'includes/related-tools.php'; ?>
    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/headphone-speaker-tester.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
