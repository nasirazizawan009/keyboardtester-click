<?php
/**
 * French Keyboard Tester - Main Page
 * Structure: Header -> Brief Intro -> Tool -> Tools List -> Guidelines -> Footer
 */

include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

// Breadcrumbs
$breadcrumbs = [
    ['label' => 'Outils', 'url' => url('pages/tools.php')],
    ['label' => 'Testeur de Clavier Francais', 'url' => '']
];

// Meta tags
$pageTitle = 'Test Clavier en Ligne — Testeur de Clavier Gratuit, Ghosting & Latence | KeyboardTester.click';
$pageDescription = 'Test clavier en ligne gratuit. Testez toutes les touches, détectez le ghosting, mesurez la latence en millisecondes et vérifiez le N-key rollover. Compatible avec les claviers AZERTY, mécaniques, membranes et portables. Sans installation.';
$pageKeywords = 'test clavier, test clavier en ligne, testeur de clavier, testeur clavier, test clavier gratuit, vérifier clavier, test touches clavier, clavier AZERTY, test latence clavier, test ghosting clavier, testeur clavier mécanique';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../../includes/seo-meta.php'; ?>

    <!-- Language alternatives -->
    <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('tools/keyboard-tester/'); ?>">
    <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/'); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('tools/keyboard-tester/'); ?>">

    <!-- Common Head -->
    <?php include __DIR__ . '/../../includes/head-common.php'; ?>

    <!-- Landing Fonts -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>

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
        <!-- Hero Section (includes tool-stage above the fold) -->
        <?php include __DIR__ . '/sections/hero.php'; ?>

        <!-- Tools List -->
        <?php $currentTool = 'french-keyboard'; include __DIR__ . '/sections/tools-list-fr.php'; ?>
        <?php $localizedHubLanguage = 'french'; include __DIR__ . '/../../includes/components/localized-hub-discovery.php'; ?>

        <!-- Guidelines & Help -->
        <?php include __DIR__ . '/sections/guidelines.php'; ?>
    </main>

    <!-- Footer -->
    <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
