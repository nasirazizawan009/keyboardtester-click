<?php
include __DIR__ . '/../config.php';

$breadcrumbs = [
    ['label' => 'Tools', 'url' => url('pages/all-tools.php')],
    ['label' => 'Utility Tools', 'url' => '']
];

$pageTitle = 'Free Online Utility Tools - QR, OCR, Passwords, WhatsApp';
$pageDescription = 'Free browser utility tools for QR codes, OCR image-to-text, password generation, WhatsApp links, sentiment checks and random picker wheels. No install.';
$pageKeywords = 'online utility tools, QR code generator, QR code reader, OCR tool, password generator, WhatsApp link generator';

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

function categoryToolAbsoluteUrl($href) {
    global $baseUrl;
    if (preg_match('~^https?://~i', $href)) {
        return $href;
    }
    $path = $href;
    $base = rtrim($baseUrl ?? '', '/');
    if ($base !== '' && strpos($path, $base . '/') === 0) {
        $path = substr($path, strlen($base) + 1);
    } else {
        $path = ltrim($path, '/');
    }
    return absoluteUrl($path);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../includes/seo-meta.php'; ?>
    <?php include __DIR__ . '/../includes/head-common.php'; ?>
    <link rel="stylesheet" href="<?php echo url('assets/css/category-pages.css'); ?>">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "name": "Free online utility tools",
        "itemListElement": [
            <?php foreach ($tools as $index => $tool): ?>
            {
                "@type": "ListItem",
                "position": <?php echo $index + 1; ?>,
                "name": "<?php echo htmlspecialchars($tool['title'], ENT_QUOTES, 'UTF-8'); ?>",
                "url": "<?php echo htmlspecialchars(categoryToolAbsoluteUrl($tool['url']), ENT_QUOTES, 'UTF-8'); ?>"
            }<?php echo $index + 1 < count($tools) ? ',' : ''; ?>
            <?php endforeach; ?>
        ]
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "Are these utility tools free?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes. The QR, OCR, password, WhatsApp and picker tools are free to use in the browser without installing software."
                }
            },
            {
                "@type": "Question",
                "name": "Which utility should I use for text in an image?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Use the OCR Tool when you need to extract typed or printed text from an uploaded image. Use the QR Code Reader only when the image contains a QR code."
                }
            },
            {
                "@type": "Question",
                "name": "Do the tools require an account?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "No account is required. The tools are designed for quick one-off tasks such as generating a password, scanning a QR code or building a WhatsApp link."
                }
            }
        ]
    }
    </script>
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
                    <a class="btn btn-primary" href="<?php echo url('pages/all-tools.php'); ?>">All tools</a>
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

        <section class="category-section category-section--support">
            <div class="container">
                <div class="category-info-grid">
                    <article class="category-info-card">
                        <h2>Choose the right utility</h2>
                        <p>Use the QR generator when you need a scannable code for a URL, contact detail, Wi-Fi network, or short text. Use the QR reader when you already have a code in an image or on camera.</p>
                    </article>
                    <article class="category-info-card">
                        <h2>Extract text from images</h2>
                        <p>The OCR tool is better for screenshots, scanned notes, receipts, labels, and documents where you need selectable text instead of a picture.</p>
                    </article>
                    <article class="category-info-card">
                        <h2>Create safer passwords</h2>
                        <p>The password generator helps create strong random passwords with length and character options. Use a password manager to save the result securely.</p>
                    </article>
                </div>
                <div class="category-faq">
                    <h2>Utility Tool Questions</h2>
                    <details>
                        <summary>What is the difference between the QR generator and QR reader?</summary>
                        <p>The generator creates a new QR code from your text or link. The reader scans an existing QR code from an image or camera.</p>
                    </details>
                    <details>
                        <summary>When should I use OCR instead of a QR reader?</summary>
                        <p>Use OCR for normal text inside an image. Use the QR reader only when the image contains a QR pattern.</p>
                    </details>
                    <details>
                        <summary>Are these tools suitable for quick business tasks?</summary>
                        <p>Yes. They are useful for creating campaign QR codes, WhatsApp contact links, random passwords, quick text extraction, and simple selection wheels.</p>
                    </details>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
