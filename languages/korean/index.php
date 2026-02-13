<?php
/**
 * Korean Keyboard Tester - Main Page
 * Structure: Header -> Brief Intro -> Tool -> Tools List -> Guidelines -> Footer
 */

include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

// Breadcrumbs
$breadcrumbs = [
    ['label' => '도구', 'url' => url('pages/tools.php')],
    ['label' => '한국어 키보드 테스터', 'url' => '']
];

// Meta tags
$pageTitle = '한국어 키보드 테스터 - 무료 온라인 키보드 테스트';
$pageDescription = '한국어 키보드를 무료로 테스트하세요. 고스팅 감지, 지연 시간 측정, 멈춤 키 확인이 가능합니다.';
$pageKeywords = '키보드 테스터, 키보드 테스트, 한글 키보드, 두벌식 키보드, 고스팅 감지';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../../includes/seo-meta.php'; ?>

    <!-- Language alternatives -->
    <link rel="alternate" hreflang="en" href="<?php echo url('tools/keyboard-tester/'); ?>">
    <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/'); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo url('tools/keyboard-tester/'); ?>">

    <!-- Common Head -->
    <?php include __DIR__ . '/../../includes/head-common.php'; ?>

    <!-- Landing Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&family=Noto+Sans+KR:wght@400;500;600;700&display=swap" rel="stylesheet">

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

        body {
            font-family: 'Noto Sans KR', 'Space Grotesk', sans-serif;
        }
    </style>
</head>
<body class="landing-page">
    <!-- Header Navigation -->
    <?php include __DIR__ . '/header-ko.php'; ?>

    <!-- Main Content -->
    <main id="main-content" class="landing-main">
        <!-- Hero Section -->
        <?php include __DIR__ . '/sections/hero.php'; ?>

        <!-- Tool Stage -->
        <section class="tool-stage" aria-labelledby="tool-stage-title-ko">
            <div class="container tool-stage-header">
                <div>
                    <p class="section-kicker">주요 도구</p>
                    <h2 id="tool-stage-title-ko">키보드 테스터</h2>
                    <p class="section-lede">아래 도구를 사용하여 각 키를 테스트하고, 레이아웃을 확인하고, 지연 시간을 측정하세요.</p>
                </div>
                <div class="tool-stage-actions">
                    <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
                </div>
            </div>
            <div class="tool-shell">
                <?php include __DIR__ . '/sections/tool.php'; ?>
            </div>
        </section>

        <!-- Tools List -->
        <?php $currentTool = 'korean-keyboard'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

        <!-- Guidelines & Help -->
        <?php include __DIR__ . '/sections/guidelines.php'; ?>
    </main>

    <!-- Footer -->
    <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
