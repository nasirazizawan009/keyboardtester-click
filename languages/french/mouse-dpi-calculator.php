<?php
/**
 * French Mouse DPI Calculator
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'Calculateur de DPI de Souris - Mesurez le Vrai DPI en Ligne';
$pageDescription = 'Calculateur de DPI de souris gratuit en ligne. Mesurez le DPI réel en glissant sur le pad ou en saisissant pixels et pouces. Vérifiez le DPI annoncé face au capteur réel.';
$pageKeywords = 'calculateur dpi souris, vrai dpi, mesurer dpi souris, true dpi calculator';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Calculateurs de sensibilité</p>
          <h1 class="hero-title">Calculateur de DPI de Souris - Mesurez le Vrai DPI</h1>
          <p class="hero-lede">Vérifiez le DPI réel de votre souris. Glissez une distance physique connue (ou entrez les valeurs à la main) et nous calculons le DPI réel en pixels par pouce. Détectez l'imprécision du capteur et comparez au DPI annoncé.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-dpi-calculator">Mesurer le DPI</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Comment faire</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Pad à glisser</span>
            <span class="hero-badge">Saisie pixels + pouces</span>
            <span class="hero-badge">DPI annoncé vs réel</span>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-dpi-calculator">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil principal</p>
          <h2>Calculateur de DPI</h2>
          <p class="section-lede">Saisissez pixels et pouces, ou glissez sur le pad pour mesurer.</p>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-dpi-calculator-tool.php'; ?></section>
    </section>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>Comment calculer le DPI</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Désactivez l'accélération</h3><p>Coupez "Améliorer la précision du pointeur" dans Windows avant de mesurer.</p></div>
          <div class="guideline-card"><h3>2. Préparez une règle</h3><p>Placez une règle à côté du tapis de souris.</p></div>
          <div class="guideline-card"><h3>3. Glissez 10 cm ou 4 pouces</h3><p>Maintenez le clic et déplacez la souris en ligne droite.</p></div>
          <div class="guideline-card"><h3>4. Comparez le DPI</h3><p>Saisissez le DPI annoncé pour voir l'écart réel.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
