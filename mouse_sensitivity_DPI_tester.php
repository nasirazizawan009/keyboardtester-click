<?php include 'config.php'; ?>
<?php require_once __DIR__ . '/includes/components/adsense-slot.php'; ?>
<?php require_once __DIR__ . '/includes/components/microsoft-store-badge.php'; ?>
<?php
$GLOBALS['kbtSuppressFooterAd'] = true;
$pageTitle = 'DPI Analyzer - Test Your Real Mouse DPI Free Online';
$pageDescription = 'Free mouse DPI analyzer - measure your true DPI in seconds with a ruler test. Check, compare and calculate eDPI for gaming. In-browser, no download.';
$pageKeywords = 'dpi analyzer, mouse dpi test, dpi test, dpi checker, mouse dpi checker, dpi analyzer online, check my mouse dpi, mouse sensitivity test, dpi finder, dpi tester online';
$pageOgImage = 'images/mouse-dpi/hero.png';
$pageOgImageAlt = 'Mouse DPI tester measuring gaming mouse sensitivity and eDPI online';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/includes/seo-meta.php'; ?>
  <link rel="icon" type="image/x-icon" href="navigation.png">

  <style>
    .landing-main{min-height:100vh}
    .tool-stage{min-height:520px;background:#f5f5f5}
    .home-redesign #dpi-stage.tool-stage{padding-top:0!important}
    .home-redesign #dpi-stage .tool-shell{min-height:460px;padding:0!important;background:transparent!important;border:0!important;box-shadow:none!important}
    .home-redesign #dpi-stage .dpi-v2{max-width:1180px;margin:0 auto;background:#fff;border:1px solid #d6d6d6;box-shadow:0 2px 10px rgba(15,23,42,.08);padding:22px}
    html.dark-theme .home-redesign #dpi-stage .dpi-v2,[data-theme="dark"] .home-redesign #dpi-stage .dpi-v2{background:#111827;border-color:#334155}
    @media(max-width:768px){.tool-stage{min-height:440px}.home-redesign #dpi-stage .tool-shell{min-height:380px}.home-redesign #dpi-stage .dpi-v2{padding:16px}}
  </style>

  <?php
  $loadBootstrapCss = false;
  $loadBootstrapJs = false;
  $loadMobileToolAdapters = false;
  $loadInterFont = false;
  ?>
  <?php include 'includes/head-common.php'; ?>

  <?php $imv = filemtime(__DIR__ . '/assets/css/index-modern.min.css'); ?>
  <link rel="preload" as="style" href="<?php echo url('assets/css/index-modern.min.css') . '?v=' . $imv; ?>">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.min.css') . '?v=' . $imv; ?>">

  <!-- Structured Data (JSON-LD) -->
  <?php
  include_once __DIR__ . '/includes/schema.php';
  $GLOBALS['kbtRatingKey'] = 'mouse_sensitivity_DPI_tester.php';
  echo generateToolPageSchema('dpi_tester', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Mouse DPI Tester & Checker', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page home-redesign">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-mouse-sensitivity-dpi-tester.php'; ?>
    <?php include __DIR__ . '/includes/components/home-category-band.php'; ?>

    <section class="tool-stage" id="dpi-stage" data-header-hide-stage aria-label="Mouse DPI testing workspace">
      <section id="mouse-sensitivity-dpi-tester" class="tool-shell">
        <?php include 'tools/mouse_sensitivity_dpi_tester_tool.php'; ?>
      </section>
    </section>

    <div class="kbt-rating-row" style="text-align:center;padding:0 16px">
      <?php $kbtRatingKey = 'mouse_sensitivity_DPI_tester.php'; $kbtRatingLabel = 'Mouse DPI Analyzer'; include __DIR__ . '/includes/components/tool-rating.php'; ?>
    </div>

    <section class="home-after-tool-banner" aria-label="Sponsored placement">
      <?php
        kbtRenderAdSlot('dpi_after_tool_banner', [
          'class' => 'kbt-ad-slot--after-tool-banner',
          'format' => 'auto',
          'aria_label' => 'Sponsored placement',
          'min_width' => 769
        ]);
      ?>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>

    <?php
      $kbtEmbedSlug = 'dpi-tester';
      $kbtEmbedCanonical = 'mouse_sensitivity_DPI_tester.php';
      $kbtEmbedAnchor = 'Mouse DPI Analyzer';
      $kbtEmbedHeight = 700;
      include __DIR__ . '/includes/components/embed-panel.php';
    ?>

    <div class="home-rails-region">
      <aside class="home-rails-side home-rails-side--left" aria-hidden="true">
        <div class="home-rails-side__sticky">
          <?php
            kbtRenderAdSlot('home_guidelines_left_rail', [
              'class' => 'kbt-ad-slot--home-guideline-rail kbt-ad-slot--home-guideline-left',
              'format' => 'auto',
              'aria_label' => 'Sponsored DPI guide placement',
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
              'aria_label' => 'Sponsored DPI FAQ placement',
              'min_width' => 1281
            ]);
          ?>
        </div>
      </aside>

      <?php include 'help/seo-content/mouse-dpi.php'; ?>
      <?php $toolBlogSlug = 'mouse-dpi-tester-measure-sensitivity.php'; include __DIR__ . '/includes/components/tool-blog-cta.php'; ?>
      <?php kbtRenderMicrosoftStoreSitewideBanner($siteChromeLocale ?? 'en'); ?>
      <?php $GLOBALS['kbtSuppressMicrosoftStoreBanner'] = true; ?>
    </div>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
