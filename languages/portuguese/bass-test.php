<?php
/**
 * Portuguese localized landing page for bass-test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Teste de Graves - Varredura 20 Hz a 200 Hz para Subwoofer';
$pageDescription = 'Teste de graves gratuito online. Varredura 20 Hz a 200 Hz com presets ISO para verificar subwoofer, monitores de estúdio e fones de ouvido. Sem instalação.';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/bass-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Diagnóstico de áudio</p>
          <h1 class="hero-title">Teste de Graves - Subwoofer e Varredura 20 a 200 Hz</h1>
          <p class="hero-lede">Verifique se seu subwoofer, monitores de estúdio ou fones de ouvido reproduzem graves limpos. Varredura de 20 a 200 Hz, presets ISO 1/3 de oitava ou modo manter tom. Ondas senoidais puras.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#bass-test">Iniciar teste</a>
            <a class="landing-btn landing-btn-ghost" href="#tools">Ver todas as ferramentas</a>
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="bass-test">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Diagnóstico de áudio</p>
          <h2>Teste de Graves</h2>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/../../tools/bass_test_tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
