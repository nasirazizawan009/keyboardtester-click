<?php
include 'config.php';
$pageTitle = 'Disclaimer | KeyboardTester.click';
$pageDescription = 'Disclaimer for KeyboardTester.click covering terms of use, privacy, and limitations of liability.';
$pageKeywords = 'disclaimer, terms, liability, privacy, keyboard tester';
$pageOgImage = 'images/shared/keyboard-and-mouse.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
    <?php include 'includes/head-common.php'; ?>
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page legal-page">
    <?php include 'header.php'; ?>

    <main class="disclaimer-section landing-main">
        <section class="hero legal-hero">
            <h1>Disclaimer</h1>
            <p>Understand the terms of use, data privacy policies, and limitations of liability for <a href="<?php echo $pages['home']; ?>">KeyboardTester.click</a>'s free online tools.</p>
        </section>

        <section class="disclaimer-content legal-card">
            <h2>General Information</h2>
            <p>The information and tools provided on <a href="<?php echo $pages['home']; ?>">KeyboardTester.click</a>, including but not limited to the <a href="<?php echo $pages['home']; ?>">Keyboard Tester</a>, <a href="<?php echo $pages['mouse_test']; ?>">Mouse Tester</a>, <a href="<?php echo $pages['keyboard_typing']; ?>">Typing Speed Test</a>, and <a href="<?php echo $pages['whatsapp_link']; ?>">WhatsApp Link Generator</a>, are intended for general informational and diagnostic purposes only. While we strive to provide accurate and reliable tools, KeyboardTester.click makes no representations or warranties of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability, or completeness of any information or functionality on the site.</p>
            <p>Your use of our platform, including tools like the <a href="<?php echo $pages['click_speed']; ?>">Mouse Click Speed Tester</a>, <a href="<?php echo $pages['ghost_click']; ?>">Ghost Click Detector</a>, and <a href="<?php echo $pages['qr_reader']; ?>">QR Code Reader</a>, is at your own discretion and risk. We encourage users to explore our <a href="<?php echo $pages['about']; ?>">About Us</a> page to learn more about our mission and services.</p>

            <h2>Data Privacy and Non-Storage Policy</h2>
            <p>At KeyboardTester.click, we prioritize your privacy. We do not collect, store, or share any personal information from users interacting with our tools, such as the <a href="<?php echo $pages['latency_check']; ?>">Latency Checker</a>, <a href="<?php echo $pages['mic_test']; ?>">Mic Tester</a>, or <a href="<?php echo $pages['qr_generator']; ?>">QR Code Generator & Scanner</a>. Any data generated during your use of our tools (e.g., key presses, mouse clicks, or typing speed results) is processed temporarily in your browser and is not retained or transmitted to our servers. For detailed information on our privacy practices, please review our <a href="<?php echo $pages['privacy']; ?>">Privacy Policy</a>.</p>

            <h2>No Liability</h2>
            <p>KeyboardTester.click shall not be liable for any direct, indirect, incidental, special, consequential, or exemplary damages, including but not limited to damages for loss of profits, goodwill, use, data, or other intangible losses, resulting from:</p>
            <ul>
                <li>The use or inability to use our website or tools, such as the <a href="<?php echo $pages['dpi_tester']; ?>">Sensitivity/DPI Tester</a> or <a href="<?php echo $pages['password_gen']; ?>">Password Generator</a>.</li>
                <li>Any reliance placed on the information or results provided by our tools.</li>
                <li>Any errors, inaccuracies, or omissions in the functionality of our tools.</li>
                <li>Any unauthorized access to or alteration of your device data resulting from external factors beyond our control.</li>
            </ul>
            <p>Your use of our services is solely at your own risk, and we recommend consulting professional technicians for critical device issues. Visit our <a href="<?php echo $pages['blog']; ?>">Blog</a> for troubleshooting tips and guides.</p>

            <h2>External Links</h2>
            <p>Our website may contain links to external sites, such as our <a href="https://gitlab.com/nasirazizawan/keyboardtester.click" target="_blank" rel="noopener noreferrer">GitLab repository</a>, or affiliate links like <a href="https://www.amazon.com/s?k=keyboard" target="_blank" rel="noopener noreferrer">Amazon for keyboards</a> and <a href="https://www.amazon.com/s?k=mouse" target="_blank" rel="noopener noreferrer">Amazon for mice</a>. These external websites are not owned, operated, or maintained by KeyboardTester.click, and we do not guarantee the accuracy, relevance, timeliness, or completeness of any information on these sites. Accessing external links is at your own discretion, and we are not responsible for any outcomes resulting from their use.</p>

            <h2>Tool Usage and Limitations</h2>
            <p>Our tools, including the <a href="<?php echo $pages['whatsapp_brand']; ?>">WhatsApp Chat Link & QR Creator</a> and <a href="<?php echo $pages['ocr_tool']; ?>">OCR Tool</a>, are designed to assist with device diagnostics and digital tasks. However, they are not intended to replace professional diagnostic services or hardware repairs. Results from tools like the <a href="<?php echo url('mouse-trail.php'); ?>">Mouse Trail</a> or <a href="<?php echo url('keyboard_tester_korean_index.php'); ?>">Korean Keyboard Tester</a> are indicative and may vary based on your device, browser, or settings. We do not guarantee that our tools will resolve all issues or be compatible with every device or operating system.</p>

            <h2>Changes to This Disclaimer</h2>
            <p>We reserve the right to update or modify this Disclaimer at any time to reflect changes in our services, legal requirements, or operational practices. Any updates will be posted on this page with an updated effective date. We encourage you to review this page periodically to stay informed. For questions or clarifications, please <a href="<?php echo $pages['feedback']; ?>">contact us</a> or email us at <a href="mailto:<?php echo $siteEmail; ?>"><?php echo $siteEmail; ?></a>.</p>

            <h2>Contact Us</h2>
            <p>If you have any questions, concerns, or feedback regarding this Disclaimer or our services, please reach out via our <a href="<?php echo $pages['feedback']; ?>">Feedback</a> page or email us at <a href="mailto:<?php echo $siteEmail; ?>"><?php echo $siteEmail; ?></a>.</p>
            <p>Effective Date: January 31, 2026</p>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <style>
        .disclaimer-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .legal-hero {
            text-align: center;
            padding: 3.5rem 1.5rem;
            background: var(--landing-surface);
            border-radius: 24px;
            border: 1px solid var(--landing-border);
            box-shadow: var(--landing-shadow);
            margin-bottom: 2.5rem;
        }

        .legal-hero h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--landing-ink);
            margin-bottom: 1rem;
        }

        .legal-hero p {
            font-size: 1.2rem;
            color: var(--landing-muted);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .legal-card {
            background: var(--landing-surface);
            border-radius: 20px;
            padding: 2.5rem;
            border: 1px solid var(--landing-border);
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.1);
        }

        .disclaimer-content h2 {
            font-size: 1.7rem;
            color: var(--landing-ink);
            font-weight: 600;
            margin: 1.5rem 0 1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .disclaimer-content h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--landing-accent);
        }

        .disclaimer-content p {
            font-size: 1rem;
            color: var(--landing-muted);
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        .disclaimer-content a {
            color: var(--landing-accent);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .disclaimer-content a:hover {
            color: #38bdf8;
        }

        .disclaimer-content ul {
            list-style: none;
            padding: 0;
            margin: 1rem 0;
        }

        .disclaimer-content li {
            font-size: 1rem;
            color: var(--landing-muted);
            margin-bottom: 0.8rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .disclaimer-content li::before {
            content: '*';
            position: absolute;
            left: 0;
            color: var(--landing-accent);
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .legal-hero h1 {
                font-size: 2rem;
            }

            .legal-hero p {
                font-size: 1rem;
            }

            .legal-card {
                padding: 1.5rem;
            }

            .disclaimer-content h2 {
                font-size: 1.5rem;
            }

            .disclaimer-content p,
            .disclaimer-content li {
                font-size: 0.9rem;
            }
        }
    </style>
</body>
</html>
