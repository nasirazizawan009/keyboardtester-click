<?php include 'config.php'; ?>
<?php
$pageTitle = 'Lucky Wheel - Random Picker | KeyboardTester.click';
$pageDescription = 'Spin a lucky wheel to randomly pick a winner. Add entries, spin, and share results instantly.';
$pageKeywords = 'lucky wheel, random picker, spin wheel, name picker, online wheel';
$pageOgImage = 'images/lucky-wheel/hero.svg';
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
  echo generateToolPageSchema('lucky_wheel', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Lucky Wheel', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-lucky-wheel.php'; ?>

    <section class="tool-stage" id="lucky-wheel-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="tool-stage-title">Lucky Wheel</h2>
          <p class="section-lede">Use the live wheel below to pick a winner.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
        </div>
      </div>
      <section id="lucky-wheel" class="tool-shell">
        <?php include 'luckywheeltool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Instant spins</div>
          <div class="trust-desc">Quick winner selection</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Custom entries</div>
          <div class="trust-desc">Add names or options</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Browser based</div>
          <div class="trust-desc">No installs or signups</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Share results</div>
          <div class="trust-desc">Copy winners fast</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Lucky Wheel</p>
          <h2 id="feature-title">Everything you need for a quick random picker</h2>
          <p class="section-lede">Spin a fair wheel and share results in seconds.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Fast setup</h3>
            <p>Add names and spin in moments.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Fair outcomes</h3>
            <p>Randomized spins every round.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Easy sharing</h3>
            <p>Copy winners for announcements.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Repeat quickly</h3>
            <p>Reset and run another draw.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="process-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Simple workflow</p>
            <h2 id="process-title">Three steps to spin the lucky wheel</h2>
          </div>
          <p class="section-lede">Follow the quick steps below to pick a winner.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/lucky-wheel/step-1.svg'); ?>" alt="Add entries" loading="lazy">
            </div>
            <div class="step-number">01</div>
            <h3>Add entries</h3>
            <p>Type names or options into the list.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/lucky-wheel/step-2.svg'); ?>" alt="Spin the wheel" loading="lazy">
            </div>
            <div class="step-number">02</div>
            <h3>Spin the wheel</h3>
            <p>Press spin and wait for the result.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/lucky-wheel/step-3.svg'); ?>" alt="Share winner" loading="lazy">
            </div>
            <div class="step-number">03</div>
            <h3>Share winner</h3>
            <p>Copy the winner and run another round.</p>
          </article>
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/lucky-wheel.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
