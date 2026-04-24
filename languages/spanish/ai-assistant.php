<?php
/**
 * Spanish localized landing page for AI Assistant.
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Asistente IA - Pruebas de Hardware Gratuitas | KeyboardTester.click';
$pageDescription = 'Asistente IA gratuito que te ayuda a elegir la prueba de hardware adecuada, explica los resultados y guía diagnósticos de teclado, ratón, pantalla y audio en 8 idiomas.';
?>
<!DOCTYPE html>
<html lang="es">
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
  <?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Ayudante IA</p>
          <h1 class="hero-title">Asistente IA Gratuito para Pruebas de Hardware</h1>
          <p class="hero-lede">Describe tu problema de hardware en lenguaje natural y la IA elige la prueba adecuada, la explica y te lleva directo a ella. Multilingüe (8 idiomas), sin registro, flotante en todas las páginas del sitio.</p>
          <div class="hero-actions">
            <button type="button" class="landing-btn landing-btn-primary" id="ai-open-trigger-hero-es">Abrir chat IA &rarr;</button>
            <a class="landing-btn landing-btn-ghost" href="<?php echo url('languages/spanish/'); ?>">Ver todas las herramientas</a>
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
      <div class="container tool-stage-header"><div><p class="section-kicker">Ayudante con IA</p><h2>Asistente KBT IA</h2><p class="section-lede">Pregunta en lenguaje natural qué prueba de hardware se ajusta a tu problema — la IA te guía paso a paso y explica el resultado.</p></div><div class="tool-stage-actions"><button type="button" class="landing-btn landing-btn-primary" id="ai-open-trigger-es">Abrir chat IA &rarr;</button></div></div>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
  <script>
  (function(){{
    function openAI(){{ var b=document.getElementById('kbtChatBtn'); if(b)b.click(); }}
    ['ai-open-trigger-hero-es','ai-open-trigger-es'].forEach(function(id){{
      var el=document.getElementById(id); if(el)el.addEventListener('click',openAI);
    }});
  }})();
  </script>
</body>
</html>
