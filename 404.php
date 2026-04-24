<?php
http_response_code(404);
include 'config.php';
$pageTitle       = '404 — Page Not Found | KeyboardTester.click';
$pageDescription = 'The page you\'re looking for doesn\'t exist. Head back to KeyboardTester.click and test your keyboard, mouse, screen, or audio — free, no download needed.';
$pageCanonical   = '';  // no canonical on 404
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, follow">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <?php include __DIR__ . '/includes/head-common.php'; ?>
    <link rel="preload" as="style" href="<?php echo url('assets/css/index-modern.css?v=1.9'); ?>" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css?v=1.9'); ?>"></noscript>
    <style>
    .page-404 {
        max-width: 680px;
        margin: 0 auto;
        padding: 5rem 1.5rem 6rem;
        text-align: center;
    }
    .page-404 .err-code {
        font-size: 7rem;
        font-weight: 800;
        line-height: 1;
        background: linear-gradient(135deg, var(--primary-color, #0ea5e9), #6366f1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0 0 0.25rem;
    }
    .page-404 h1 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-color);
        margin: 0 0 1rem;
    }
    .page-404 p {
        color: var(--text-muted, #64748b);
        font-size: 1.05rem;
        line-height: 1.65;
        margin: 0 0 2.5rem;
    }
    .page-404 .btn-home {
        display: inline-block;
        background: var(--primary-color, #0ea5e9);
        color: #fff;
        font-weight: 600;
        font-size: 1rem;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        text-decoration: none;
        transition: opacity 0.18s;
        margin-bottom: 2.5rem;
    }
    .page-404 .btn-home:hover { opacity: 0.88; }
    .page-404 .tool-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.6rem;
        margin-top: 0;
    }
    .page-404 .tool-links a {
        display: inline-block;
        padding: 0.45rem 1rem;
        border-radius: 6px;
        border: 1px solid var(--border-color, #e2e8f0);
        background: var(--surface, #fff);
        color: var(--text-color);
        font-size: 0.875rem;
        text-decoration: none;
        transition: border-color 0.18s, background 0.18s;
    }
    .page-404 .tool-links a:hover {
        border-color: var(--primary-color, #0ea5e9);
        background: var(--surface-hover, #f8fafc);
    }
    .page-404 .divider-label {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--text-muted, #64748b);
        margin: 0 0 0.75rem;
    }
    </style>
</head>
<body class="landing-page">
    <?php include __DIR__ . '/header.php'; ?>

    <main>
        <div class="page-404">
            <div class="err-code" aria-hidden="true">404</div>
            <h1>Page Not Found</h1>
            <p>That URL doesn't exist — it may have moved, been renamed, or never existed in the first place. Let's get you back to something useful.</p>

            <a href="<?php echo url(''); ?>" class="btn-home">Go to Homepage</a>

            <p class="divider-label">Or jump straight to a tool</p>

            <div class="tool-links">
                <a href="<?php echo url(''); ?>">Keyboard Tester</a>
                <a href="<?php echo url('keyboard_typing_test.php'); ?>">Typing Speed Test</a>
                <a href="<?php echo url('mouse-test.php'); ?>">Mouse Test</a>
                <a href="<?php echo url('dead-pixel-test.php'); ?>">Dead Pixel Test</a>
                <a href="<?php echo url('screentestindex.php'); ?>">Screen Tester</a>
                <a href="<?php echo url('mic-tester.php'); ?>">Mic Test</a>
                <a href="<?php echo url('webcamtesterindex.php'); ?>">Webcam Test</a>
                <a href="<?php echo url('headphone_speaker_tester_index.php'); ?>">Headphone Test</a>
                <a href="<?php echo url('ghost-click-detector.php'); ?>">Ghost Click Detector</a>
                <a href="<?php echo url('latency-checker.php'); ?>">Latency Checker</a>
                <a href="<?php echo url('gamepad-test.php'); ?>">Gamepad Tester</a>
                <a href="<?php echo url('ocr-tool.php'); ?>">OCR Tool</a>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
