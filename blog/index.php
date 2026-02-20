<?php
/**
 * Blog Hub Page - Redirects to Tools Directory
 * This page replaces the old WordPress blog and serves as a hub for all tools
 */
include __DIR__ . '/../config.php';

$pageTitle = 'Free Online Testing Tools - Keyboard, Mouse, Audio & Utilities';
$pageDescription = 'Explore our complete collection of free online testing tools. Test your keyboard, mouse, webcam, microphone, screen and more. Available in 8 languages.';
$pageKeywords = 'keyboard tester, mouse tester, typing test, webcam test, microphone test, screen test, online tools, free tools';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="<?php echo $pageDescription; ?>">
    <meta name="keywords" content="<?php echo $pageKeywords; ?>">

    <link rel="canonical" href="<?php echo url('blog/'); ?>">

    <?php include __DIR__ . '/../includes/head-common.php'; ?>

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

    <style>
        .hub-hero {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: #fff;
            padding: 60px 20px;
            text-align: center;
        }

        .hub-hero h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            font-weight: 700;
            color: #ffffff !important;
        }

        .hub-hero p {
            font-size: 1.2rem;
            opacity: 1;
            max-width: 600px;
            margin: 0 auto;
            color: #e0e0e0 !important;
        }

        .tools-hub {
            padding: 50px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .category-section {
            margin-bottom: 50px;
        }

        .category-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e0e0e0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .category-title svg {
            width: 28px;
            height: 28px;
            stroke: #4a90d9;
            fill: none;
            stroke-width: 2;
        }

        .tools-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .tool-link {
            display: block;
            padding: 20px;
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
        }

        .tool-link:hover {
            border-color: #4a90d9;
            box-shadow: 0 4px 15px rgba(74, 144, 217, 0.15);
            transform: translateY(-2px);
        }

        .tool-link h3 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #1a1a2e;
        }

        .tool-link p {
            font-size: 0.9rem;
            color: #666;
            margin: 0;
            line-height: 1.5;
        }

        .tool-link .arrow {
            color: #4a90d9;
            font-size: 0.85rem;
            margin-top: 10px;
            display: block;
        }

        .languages-section {
            background: #f8f9fa;
            padding: 50px 20px;
        }

        .languages-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .languages-title {
            text-align: center;
            font-size: 1.8rem;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 30px;
        }

        .languages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .lang-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 20px;
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
        }

        .lang-link:hover {
            border-color: #4a90d9;
            background: #4a90d9;
            color: #fff;
        }

        .lang-flag {
            width: 24px;
            height: 18px;
            object-fit: cover;
            border-radius: 3px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .lang-name {
            font-weight: 500;
        }

        .info-banner {
            background: #e8f4fd;
            border: 1px solid #b8daff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 40px;
            text-align: center;
        }

        .info-banner p {
            margin: 0;
            color: #004085;
        }

        .info-banner a {
            color: #004085;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .hub-hero h1 {
                font-size: 1.8rem;
            }

            .hub-hero p {
                font-size: 1rem;
            }

            .category-title {
                font-size: 1.3rem;
            }
        }

        /* Dark theme support */
        [data-theme="dark"] .tools-hub {
            background: #1a1a2e;
        }

        [data-theme="dark"] .category-title {
            color: #e0e0e0;
            border-bottom-color: #3a3a5a;
        }

        [data-theme="dark"] .tool-link {
            background: #16213e;
            border-color: #3a3a5a;
            color: #e0e0e0;
        }

        [data-theme="dark"] .tool-link h3 {
            color: #fff;
        }

        [data-theme="dark"] .tool-link p {
            color: #b0b0b0;
        }

        [data-theme="dark"] .languages-section {
            background: #0f1525;
        }

        [data-theme="dark"] .languages-title {
            color: #e0e0e0;
        }

        [data-theme="dark"] .lang-link {
            background: #16213e;
            border-color: #3a3a5a;
            color: #e0e0e0;
        }

        [data-theme="dark"] .info-banner {
            background: #1a3a5c;
            border-color: #2a5a8c;
        }

        [data-theme="dark"] .info-banner p,
        [data-theme="dark"] .info-banner a {
            color: #a8d4ff;
        }
    </style>
</head>
<body class="landing-page">
    <?php include __DIR__ . '/../header.php'; ?>

    <main id="main-content">
        <section class="hub-hero">
            <div class="container">
                <h1>Free Digital Tools</h1>
                <p>Your one-stop destination for testing keyboards, mice, audio devices, and more. All tools are free and work directly in your browser.</p>
            </div>
        </section>

        <div class="tools-hub">
            <div class="info-banner">
                <p>Looking for the blog? We've transformed it into a comprehensive tools directory. Explore all our free testing tools below, or visit our <a href="<?php echo url(''); ?>">homepage</a> to get started.</p>
            </div>

            <!-- Keyboard Tools -->
            <section class="category-section">
                <h2 class="category-title">
                    <svg viewBox="0 0 24 24"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M6 10h1M9 10h1M12 10h1M15 10h1M18 10h1"/></svg>
                    Keyboard Tools
                </h2>
                <div class="tools-grid">
                    <a href="<?php echo url('tools/keyboard-tester/'); ?>" class="tool-link">
                        <h3>Keyboard Tester</h3>
                        <p>Test all keys, detect ghosting, check for stuck or faulty keys</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('keyboard_typing_test.php'); ?>" class="tool-link">
                        <h3>Typing Speed Test</h3>
                        <p>Measure your WPM, accuracy, and typing consistency</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('latency-checker.php'); ?>" class="tool-link">
                        <h3>Latency Checker</h3>
                        <p>Test keyboard and input device latency</p>
                        <span class="arrow">Open tool</span>
                    </a>
                </div>
            </section>

            <!-- Mouse Tools -->
            <section class="category-section">
                <h2 class="category-title">
                    <svg viewBox="0 0 24 24"><rect x="9" y="2" width="6" height="10" rx="3"/><path d="M9 7h6"/><path d="M6 12v4a6 6 0 0 0 12 0v-4"/></svg>
                    Mouse Tools
                </h2>
                <div class="tools-grid">
                    <a href="<?php echo url('mouse-test.php'); ?>" class="tool-link">
                        <h3>Mouse Tester</h3>
                        <p>Test all mouse buttons, scroll wheel, and movement</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('mouse_speed_tester.php'); ?>" class="tool-link">
                        <h3>Click Speed Test</h3>
                        <p>Measure your clicks per second (CPS)</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>" class="tool-link">
                        <h3>DPI / Sensitivity Tester</h3>
                        <p>Test and calculate your mouse DPI settings</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('ghost-click-detector.php'); ?>" class="tool-link">
                        <h3>Ghost Click Detector</h3>
                        <p>Detect unintended or phantom mouse clicks</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('mouse-trail.php'); ?>" class="tool-link">
                        <h3>Mouse Trail Visualizer</h3>
                        <p>Visualize mouse movement and precision</p>
                        <span class="arrow">Open tool</span>
                    </a>
                </div>
            </section>

            <!-- Audio & Video Tools -->
            <section class="category-section">
                <h2 class="category-title">
                    <svg viewBox="0 0 24 24"><rect x="9" y="2" width="6" height="10" rx="3"/><path d="M5 11a7 7 0 0 0 14 0"/><path d="M12 18v4"/></svg>
                    Audio & Video Tools
                </h2>
                <div class="tools-grid">
                    <a href="<?php echo url('mic-tester.php'); ?>" class="tool-link">
                        <h3>Microphone Test</h3>
                        <p>Test microphone input and audio levels</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('webcamtesterindex.php'); ?>" class="tool-link">
                        <h3>Webcam Test</h3>
                        <p>Check webcam quality, resolution, and capture</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('headphone_speaker_tester_index.php'); ?>" class="tool-link">
                        <h3>Headphone / Speaker Test</h3>
                        <p>Test stereo channels and audio output</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('screentestindex.php'); ?>" class="tool-link">
                        <h3>Screen / Pixel Test</h3>
                        <p>Detect dead pixels, stuck pixels, and display issues</p>
                        <span class="arrow">Open tool</span>
                    </a>
                </div>
            </section>

            <!-- Utility Tools -->
            <section class="category-section">
                <h2 class="category-title">
                    <svg viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    Utility Tools
                </h2>
                <div class="tools-grid">
                    <a href="<?php echo url('QR_code_generator_scanner.php'); ?>" class="tool-link">
                        <h3>QR Code Generator</h3>
                        <p>Create custom QR codes for URLs, text, or contacts</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('qr-code-reader.php'); ?>" class="tool-link">
                        <h3>QR Code Reader</h3>
                        <p>Scan and decode QR codes from camera or images</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('ocr-tool.php'); ?>" class="tool-link">
                        <h3>OCR Tool</h3>
                        <p>Extract text from images using OCR technology</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('auto-password-generator.php'); ?>" class="tool-link">
                        <h3>Password Generator</h3>
                        <p>Generate strong, secure passwords instantly</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('whatsapp-link-generator.php'); ?>" class="tool-link">
                        <h3>WhatsApp Link Generator</h3>
                        <p>Create clickable WhatsApp chat links</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('whatsapp-Brand-link-generator.php'); ?>" class="tool-link">
                        <h3>WhatsApp Brand Links</h3>
                        <p>Create branded WhatsApp links with QR codes</p>
                        <span class="arrow">Open tool</span>
                    </a>
                    <a href="<?php echo url('whatsapp-sentiment-analyzer.php'); ?>" class="tool-link">
                        <h3>WhatsApp Sentiment Analyzer</h3>
                        <p>Analyze chat sentiment and emotional tone</p>
                        <span class="arrow">Open tool</span>
                    </a>
                </div>
            </section>
        </div>

        <!-- Language Versions -->
        <section class="languages-section">
            <div class="languages-container">
                <h2 class="languages-title">Tools in Your Language</h2>
                <p style="text-align: center; color: #666; margin-bottom: 30px;">Our keyboard tester and tools are available in multiple languages with full translations.</p>

                <div class="languages-grid">
                    <a href="<?php echo url(''); ?>" class="lang-link">
                        <img src="<?php echo url('flags/us_flag.svg'); ?>" alt="US Flag" class="lang-flag">
                        <span class="lang-name">English</span>
                    </a>
                    <a href="<?php echo url('languages/spanish/'); ?>" class="lang-link">
                        <img src="<?php echo url('flags/spanish_flag.svg'); ?>" alt="Spanish Flag" class="lang-flag">
                        <span class="lang-name">Español</span>
                    </a>
                    <a href="<?php echo url('languages/french/'); ?>" class="lang-link">
                        <img src="<?php echo url('flags/french_flag.svg'); ?>" alt="French Flag" class="lang-flag">
                        <span class="lang-name">Français</span>
                    </a>
                    <a href="<?php echo url('languages/german/'); ?>" class="lang-link">
                        <img src="<?php echo url('flags/german_flag.svg'); ?>" alt="German Flag" class="lang-flag">
                        <span class="lang-name">Deutsch</span>
                    </a>
                    <a href="<?php echo url('languages/portuguese/'); ?>" class="lang-link">
                        <img src="<?php echo url('flags/Portugal_flag.svg'); ?>" alt="Portuguese Flag" class="lang-flag">
                        <span class="lang-name">Português</span>
                    </a>
                    <a href="<?php echo url('languages/russian/'); ?>" class="lang-link">
                        <img src="<?php echo url('flags/russian_flag.svg'); ?>" alt="Russian Flag" class="lang-flag">
                        <span class="lang-name">Русский</span>
                    </a>
                    <a href="<?php echo url('languages/arabic/'); ?>" class="lang-link">
                        <img src="<?php echo url('flags/arabic_flag.svg'); ?>" alt="Arabic Flag" class="lang-flag">
                        <span class="lang-name">العربية</span>
                    </a>
                    <a href="<?php echo url('languages/japanese/'); ?>" class="lang-link">
                        <img src="<?php echo url('flags/japanese_flag.svg'); ?>" alt="Japanese Flag" class="lang-flag">
                        <span class="lang-name">日本語</span>
                    </a>
                    <a href="<?php echo url('languages/korean/'); ?>" class="lang-link">
                        <img src="<?php echo url('flags/korean_flag.svg'); ?>" alt="Korean Flag" class="lang-flag">
                        <span class="lang-name">한국어</span>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
