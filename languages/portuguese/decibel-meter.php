<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Medidor de Decibeis Online - dB SPL ao Vivo via Microfone';
$pageDescription = 'Medidor de decibéis online usando seu microfone: leitura em tempo real dB SPL, rastreamento de picos e média móvel de 100 amostras. Mede ruído ambiente, sem instalação.';
$pageKeywords = 'medidor decibeis, dB meter online, medidor SPL';
?>
<!DOCTYPE html>
<html lang="pt"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/decibel-meter.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Diagnostico de Audio</p>
<h1 class="hero-title">Medidor de Decibeis Online - dB SPL ao Vivo via Microfone</h1>
<p class="hero-lede">Meca niveis de ruido ambiente usando o microfone do seu dispositivo. Leitura dB ao vivo, pico e media.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#decibel-meter">Iniciar</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/decibel-meter/decibel-meter-hero.jpg'); ?>" width="1280" height="720" alt="Medidor de decibeis" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="decibel-meter"><div class="container tool-stage-header"><div><h2>Medidor de Decibeis</h2><p class="section-lede">Pressione Iniciar e permita acesso ao microfone.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/decibel-meter-tool.php'; ?></section></section>
<?php $currentTool = 'decibel-meter'; $__ls = __DIR__ . '/sections/tools-list-pt.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
