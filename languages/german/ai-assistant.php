<?php
/**
 * German localized landing page for AI Assistant.
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'KI-Assistent - Kostenlose Hardware-Tests | KeyboardTester.click';
$pageDescription = 'Kostenloser KI-Assistent, der dir hilft, den richtigen Hardwaretest auszuwählen, Ergebnisse erklärt und Tastatur-, Maus-, Bildschirm- und Audiodiagnosen in 8 Sprachen führt.';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('ai-assistant.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">KI-Helfer</p>
          <h1 class="hero-title">Kostenloser KI-Assistent für Hardwaretests</h1>
          <p class="hero-lede">Beschreibe dein Hardwareproblem in einfacher Sprache und die KI wählt den passenden Test, erklärt ihn und bringt dich direkt hin. Mehrsprachig (8 Sprachen), kein Konto nötig, schwebt auf jeder Seite.</p>
          <div class="hero-actions">
            <button type="button" class="landing-btn landing-btn-primary" id="ai-open-trigger-hero-de">KI-Chat öffnen &rarr;</button>
            <a class="landing-btn landing-btn-ghost" href="<?php echo url('languages/german/'); ?>">Alle Werkzeuge</a>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot" style="background:linear-gradient(135deg,#1e293b,#475569);display:flex;align-items:center;justify-content:center;padding:40px">
            <img src="<?php echo url('images/robot_18357793.png'); ?>" width="280" height="280" alt="KBT AI Assistant" loading="eager" decoding="async" fetchpriority="high" style="max-width:55%;height:auto">
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="ai-assistant">
      <div class="container tool-stage-header"><div><p class="section-kicker">KI-gestützter Helfer</p><h2>KBT KI-Assistent</h2><p class="section-lede">Frag in einfacher Sprache, welcher Test zu deinem Problem passt — die KI führt dich durch und erklärt das Ergebnis.</p></div><div class="tool-stage-actions"><button type="button" class="landing-btn landing-btn-primary" id="ai-open-trigger-de">KI-Chat öffnen &rarr;</button></div></div>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
  <script>
  (function(){{
    function openAI(){{ var b=document.getElementById('kbtChatBtn'); if(b)b.click(); }}
    ['ai-open-trigger-hero-de','ai-open-trigger-de'].forEach(function(id){{
      var el=document.getElementById(id); if(el)el.addEventListener('click',openAI);
    }});
  }})();
  </script>
</body>
</html>
