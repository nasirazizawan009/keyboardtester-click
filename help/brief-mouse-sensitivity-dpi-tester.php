<?php require_once __DIR__ . '/../includes/components/adsense-slot.php'; ?>
<?php require_once __DIR__ . '/../includes/components/microsoft-store-badge.php'; ?>
<section class="landing-hero home-hero dpi-hero">
  <div class="home-banner">
    <picture class="home-banner-media">
      <source type="image/webp" srcset="<?php echo url('images/mouse-dpi/hero.webp'); ?> 800w" sizes="100vw">
      <source type="image/png" srcset="<?php echo url('images/mouse-dpi/hero.png'); ?> 800w" sizes="100vw">
      <img src="<?php echo url('images/mouse-dpi/hero.png'); ?>" alt="Gaming mouse and keyboard setup for an online mouse DPI tester" width="800" height="533" loading="eager" fetchpriority="high" decoding="async">
    </picture>
    <div class="home-banner-content">
      <div class="home-banner-copy">
        <p class="hero-kicker">KeyboardTester.click</p>
        <h1 class="hero-title"><span class="hero-title-line">Mouse DPI Analyzer</span> <span class="hero-title-line">&amp; Tester</span></h1>
        <p class="hero-lede">Measure real mouse DPI with a distance-based DPI checker, compare repeated runs, and tune your gaming sensitivity or eDPI from the browser.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-sensitivity-dpi-tester">Start DPI test</a>
          <a class="landing-btn landing-btn-ghost" href="<?php echo url('pages/all-tools.php#mouse'); ?>">Mouse tools <span class="btn-caret" aria-hidden="true">&gt;</span></a>
        </div>
      </div>
    </div>
    <div class="home-hero-store-button">
      <?php kbtRenderMicrosoftStoreBadge(['class' => 'home-hero-store-badge', 'priority' => true]); ?>
    </div>
    <?php
      kbtRenderAdSlot('home_hero_banner', [
        'class' => 'kbt-ad-slot--home-hero-banner',
        'format' => 'horizontal',
        'aria_label' => 'Sponsored hero banner',
      ]);
    ?>
  </div>
</section>
