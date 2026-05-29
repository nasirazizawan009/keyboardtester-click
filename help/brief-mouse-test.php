<?php require_once __DIR__ . '/../includes/components/adsense-slot.php'; ?>
<?php require_once __DIR__ . '/../includes/components/microsoft-store-badge.php'; ?>
<section class="landing-hero home-hero mouse-hero">
  <div class="home-banner">
    <picture class="home-banner-media">
      <source media="(max-width: 760px)" type="image/webp" srcset="<?php echo url('images/mouse/mouse-tester-workstation-640.webp'); ?>">
      <source media="(max-width: 760px)" type="image/png" srcset="<?php echo url('images/mouse/mouse-tester-workstation-640.png'); ?>">
      <source type="image/webp" srcset="<?php echo url('images/mouse/mouse-tester-workstation-900.webp'); ?> 900w, <?php echo url('images/mouse/mouse-tester-workstation-1400.webp'); ?> 1400w" sizes="100vw">
      <source type="image/png" srcset="<?php echo url('images/mouse/mouse-tester-workstation-900.png'); ?> 900w, <?php echo url('images/mouse/mouse-tester-workstation-1400.png'); ?> 1400w" sizes="100vw">
      <img src="<?php echo url('images/mouse/mouse-tester-workstation-1400.png'); ?>" alt="Gaming mouse and keyboard workspace for browser mouse button and scroll testing" width="1400" height="933" loading="eager" fetchpriority="high" decoding="async">
    </picture>
    <div class="home-banner-content">
      <div class="home-banner-copy">
        <p class="hero-kicker">KeyboardTester.click</p>
        <h1 class="hero-title"><span class="hero-title-line">Free Online</span> <span class="hero-title-line">Mouse Tester</span></h1>
        <p class="hero-lede">Test left, right, and middle mouse buttons, confirm scroll wheel input, and check basic pointer response directly in your browser.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-test">Start mouse test</a>
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
