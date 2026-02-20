<?php
/**
 * Portuguese Keyboard Tester - Main Page
 * Structure: Header -> Brief Intro -> Tool -> Tools List -> Guidelines -> Footer
 */

include __DIR__ . '/../../config.php';

// Breadcrumbs
$breadcrumbs = [
    ['label' => 'Ferramentas', 'url' => url('pages/tools.php')],
    ['label' => 'Testador de Teclado Portugues', 'url' => '']
];

// Meta tags
$pageTitle = 'Testador de Teclado Portugues - Teste seu Teclado Gratis';
$pageDescription = 'Teste seu teclado portugues gratis online. Detecte ghosting, meca latencia e identifique teclas presas.';
$pageKeywords = 'testador teclado, teste teclado portugues, detector ghosting, medidor latencia';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../../includes/seo-meta.php'; ?>

    <!-- Language alternatives -->
    <link rel="alternate" hreflang="en" href="<?php echo url('tools/keyboard-tester/'); ?>">
    <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/'); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo url('tools/keyboard-tester/'); ?>">

    <!-- Common Head -->
    <?php include __DIR__ . '/../../includes/head-common.php'; ?>

    <!-- Landing Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Index Modern CSS -->
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

    <!-- Page Styles -->
    <style>
        :root {
            --surface: #1e293b;
            --border: rgba(148, 163, 184, 0.2);
            --text-muted: #94a3b8;
            --text-secondary: #cbd5e1;
            --accent-primary: #00d4ff;
            --accent-secondary: #0ea5e9;
        }

        html:not(.dark-theme),
        [data-theme="light"] {
            --surface: #ffffff;
            --border: rgba(0, 0, 0, 0.1);
            --text-muted: #64748b;
            --text-secondary: #475569;
            --accent-primary: #0099cc;
            --accent-secondary: #0077aa;
        }

        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }
    </style>
</head>
<body class="landing-page">
    <!-- Header Navigation -->
    <?php include __DIR__ . '/header-pt.php'; ?>

    <!-- Main Content -->
    <main id="main-content" class="landing-main">
        <!-- Hero Section -->
        <?php include __DIR__ . '/sections/hero.php'; ?>

        <!-- Tools List -->
        <?php $currentTool = 'portuguese-keyboard'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

        <!-- Guidelines & Help -->
        <?php include __DIR__ . '/sections/guidelines.php'; ?>
    </main>

    <!-- Footer -->
    <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
