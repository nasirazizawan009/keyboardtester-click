<?php
include __DIR__ . '/../config.php';

$breadcrumbs = [
    ['label' => 'Tools', 'url' => url('pages/tools.php')],
    ['label' => 'Utility Tools', 'url' => '']
];

$pageTitle = 'Utility Tools - QR, OCR, Passwords, and More';
$pageDescription = 'Handy online utilities for QR codes, OCR text extraction, password generation, WhatsApp tools, and more.';
$pageKeywords = 'utility tools, QR code, OCR tool, password generator, WhatsApp tools';

$tools = [
    [
        'title' => 'QR Code Generator',
        'url' => url('QR_code_generator_scanner.php'),
        'desc' => 'Create custom QR codes instantly.'
    ],
    [
        'title' => 'QR Code Reader',
        'url' => url('qr-code-reader.php'),
        'desc' => 'Scan QR codes from camera or images.'
    ],
    [
        'title' => 'OCR Tool',
        'url' => url('ocr-tool.php'),
        'desc' => 'Extract text from images with OCR.'
    ],
    [
        'title' => 'Password Generator',
        'url' => url('auto-password-generator.php'),
        'desc' => 'Generate secure passwords quickly.'
    ],
    [
        'title' => 'WhatsApp Link Generator',
        'url' => url('whatsapp-link-generator.php'),
        'desc' => 'Build click-to-chat WhatsApp links.'
    ],
    [
        'title' => 'WhatsApp Brand Links',
        'url' => url('whatsapp-Brand-link-generator.php'),
        'desc' => 'Create branded WhatsApp links and QR codes.'
    ],
    [
        'title' => 'WhatsApp Sentiment Analyzer',
        'url' => url('whatsapp-sentiment-analyzer.php'),
        'desc' => 'Analyze WhatsApp chat sentiment.'
    ],
    [
        'title' => 'Lucky Wheel',
        'url' => url('luckywheeltoolindex.php'),
        'desc' => 'Spin a random picker wheel for winners.'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../includes/seo-meta.php'; ?>
    <?php include __DIR__ . '/../includes/head-common.php'; ?>
    <link rel="stylesheet" href="<?php echo url('assets/css/category-pages.css'); ?>">
</head>
<body>
    <?php include __DIR__ . '/../header.php'; ?>
    <?php include __DIR__ . '/../includes/components/breadcrumbs.php'; ?>

    <main class="category-page">
        <section class="category-hero">
            <div class="container">
                <div class="eyebrow">Category</div>
                <h1>Utility Tools</h1>
                <p>Quick tools for QR codes, OCR, passwords, WhatsApp, and more.</p>
                <div class="category-actions">
                    <a class="btn btn-primary" href="<?php echo url('pages/tools.php'); ?>">All tools</a>
                    <a class="btn btn-secondary" href="<?php echo url('tools/keyboard-tester/'); ?>">Keyboard tester</a>
                </div>
            </div>
        </section>

        <section class="category-section">
            <div class="container">
                <div class="category-grid">
                    <?php foreach ($tools as $tool): ?>
                        <a class="category-card" href="<?php echo $tool['url']; ?>">
                            <h2><?php echo htmlspecialchars($tool['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                            <p><?php echo htmlspecialchars($tool['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <span class="card-link">Open tool</span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
