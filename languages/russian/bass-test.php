<?php
/**
 * Russian localized landing page for bass-test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Тест басов - свип 20 Гц до 200 Гц для сабвуфера';
$pageDescription = 'Тест баса: свип низких частот 20 Гц → 200 Гц с ISO 1/3-октавными пресетами для проверки сабвуфера и колонок. Чистые синусоиды, без установки, в браузере.';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/bass-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Аудиодиагностика</p>
          <h1 class="hero-title">Тест басов - сабвуфер и свип 20-200 Гц</h1>
          <p class="hero-lede">Проверьте, чисто ли ваш сабвуфер, студийные мониторы или наушники воспроизводят низкие частоты. Свип 20-200 Гц, ISO пресеты 1/3 октавы или режим удержания тона. Чистая синусоида.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#bass-test">Запустить тест</a>
            <a class="landing-btn landing-btn-ghost" href="#tools">Все инструменты</a>
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="bass-test">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Аудиодиагностика</p>
          <h2>Тест басов</h2>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/../../tools/bass_test_tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
