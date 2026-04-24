<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Calculadora de FoV - Converter Campo de Visão entre Jogos';
$pageDescription = 'Calculadora de FoV gratuita online. Converta campo de visão horizontal, vertical e diagonal entre 4:3, 16:9, 21:9 e 32:9 para CS2, Valorant, Apex, CoD e Fortnite.';
$pageKeywords = 'calculadora fov, campo de visao, hfov vfov, fov cs2, fov apex';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Calculadoras de sensibilidade</p>
        <h1 class="hero-title">Calculadora de FoV - Converta o Campo de Visão</h1>
        <p class="hero-lede">Converta qualquer FoV entre horizontal, vertical e diagonal para 4:3, 16:9, 21:9 e 32:9. Predefinições para CS2, Valorant, Apex, CoD e Fortnite para manter a mesma sensação vertical entre jogos e monitores.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#fov-calculator">Converter FoV</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Como usar</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">H / V / Diagonal</span><span class="hero-badge">Todas as proporções</span><span class="hero-badge">Predefinições de jogos</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="fov-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Ferramenta principal</p><h2>Calculadora de FoV</h2><p class="section-lede">Escolha uma predefinição ou digite FoV e proporção.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/fov-calculator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Como converter o FoV</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Escolha o jogo</h3><p>A predefinição ajusta formato e proporção.</p></div>
        <div class="guideline-card"><h3>2. Digite o FoV</h3><p>Informe o valor atual.</p></div>
        <div class="guideline-card"><h3>3. Leia a tabela</h3><p>FoV equivalente por formato e proporção.</p></div>
        <div class="guideline-card"><h3>4. Aplique</h3><p>Copie o valor para o novo jogo.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
