<?php
/**
 * Portuguese Microphone Test - Testador de Microfone
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Testador de Microfone - Verifique Seu Microfone Gratis';
$pageDescription = 'Teste seu microfone online. Verifique a entrada de audio, niveis de volume e qualidade de gravacao.';
$pageKeywords = 'teste de microfone, teste de mic, verificar audio, testar microfone, teste de voz';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mic-test.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/mic-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mic-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-pt.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Testador de Microfone</h1>
          <p class="hero-lede">Verifique se seu microfone esta funcionando corretamente. Teste de entrada de audio.</p>
          <div class="hero-ctas">
            <a href="#mic-test" class="landing-btn landing-btn-primary">Iniciar Teste</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Testador de Microfone</h2>
          <p class="section-lede">Permita o acesso ao microfone e fale para testar.</p>
        </div>
      </div>
      <section id="mic-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mic-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Entrada de Audio</div>
          <div class="trust-desc">Verificacao ao vivo</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Nivel de Volume</div>
          <div class="trust-desc">Medidor visual</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Qualidade</div>
          <div class="trust-desc">Analise de audio</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Privado</div>
          <div class="trust-desc">Nada e salvo</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mic-test'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Testar Seu Microfone</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Permita Acesso</h3>
            <p>Autorize o uso do microfone.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Fale</h3>
            <p>Diga algo para testar.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Observe Niveis</h3>
            <p>Verifique o medidor de volume.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ajuste</h3>
            <p>Configure conforme necessario.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
