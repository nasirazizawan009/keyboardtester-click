<?php
/**
 * French Keyboard Tester - Main Page
 * Structure: Header -> Brief Intro -> Tool -> Tools List -> Guidelines -> Footer
 */

include __DIR__ . '/../../config.php';

// Breadcrumbs
$breadcrumbs = [
    ['label' => 'Outils', 'url' => url('pages/tools.php')],
    ['label' => 'Testeur de Clavier Francais', 'url' => '']
];

// Meta tags
$pageTitle = 'Testeur de Clavier Francais - Testez Votre Clavier Gratuitement';
$pageDescription = 'Testez votre clavier francais gratuitement en ligne. Detectez le ghosting, mesurez la latence et identifiez les touches bloquees.';
$pageKeywords = 'testeur clavier, test clavier francais, detecteur ghosting, mesure latence, clavier AZERTY';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../../includes/seo-meta.php'; ?>

    <!-- Language alternatives -->
    <link rel="alternate" hreflang="en" href="<?php echo url('tools/keyboard-tester/'); ?>">
    <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/'); ?>">
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
    <?php include __DIR__ . '/header-fr.php'; ?>

    <!-- Main Content -->
    <main id="main-content" class="landing-main">
        <!-- Hero Section -->
        <?php include __DIR__ . '/sections/hero.php'; ?>

        <!-- Tool Stage -->
        <section class="tool-stage" aria-labelledby="tool-stage-title-fr">
            <div class="container tool-stage-header">
                <div>
                    <p class="section-kicker">Outil Principal</p>
                    <h2 id="tool-stage-title-fr">Testeur de Clavier</h2>
                    <p class="section-lede">Utilisez l'outil ci-dessous pour tester chaque touche, verifier les dispositions et mesurer la latence.</p>
                </div>
                <div class="tool-stage-actions">
                    <a class="landing-btn landing-btn-ghost" href="#guidelines">Voir les Conseils Rapides</a>
                </div>
            </div>
            <div class="tool-shell">
                <?php include __DIR__ . '/sections/tool.php'; ?>
            </div>
        </section>

        <!-- Tools List -->
        <?php $currentTool = 'french-keyboard'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

        <!-- Guidelines & Help -->
        <?php include __DIR__ . '/sections/guidelines.php'; ?>
    </main>

    <!-- Footer -->
    <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
