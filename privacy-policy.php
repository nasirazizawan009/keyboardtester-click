<?php
include 'config.php';
$pageTitle = 'Privacy Policy | KeyboardTester.click';
$pageDescription = 'Learn how KeyboardTester.click handles data, cookies, and disclosures when you use our free online testing tools.';
$pageKeywords = 'privacy policy, data, cookies, keyboard tester';
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

    <main class="privacy-policy-section landing-main">
        <section class="hero legal-hero">
            <h1>Privacy Policy</h1>
            <p>KeyboardTester.click provides free browser-based tools for testing keyboards, mice, audio, and more. This policy explains what data we collect, how we use it, and the disclosures we make to comply with FTC guidance.</p>
        </section>

        <section class="privacy-policy-content legal-card">
            <h2>Summary</h2>
            <ul>
                <li><strong>We do not record or store your keystrokes.</strong> Keyboard input stays in your browser for testing.</li>
                <li><strong>We use analytics and cookies</strong> to understand site usage and improve performance.</li>
                <li><strong>We may use ads or affiliate links</strong> and will disclose them clearly.</li>
            </ul>

            <h2>Information We Collect</h2>
            <p>We keep collection minimal. We may collect the following:</p>
            <ul>
                <li><strong>Usage data:</strong> Page views, device type, browser type, and approximate location (city/region) from standard analytics tools.</li>
                <li><strong>Cookies and similar technologies:</strong> Used for preferences (like theme) and analytics.</li>
                <li><strong>Contact information (if you send it):</strong> If you email us or submit feedback, we receive the details you provide.</li>
            </ul>

            <h2>What We Do Not Collect</h2>
            <ul>
                <li>We do not collect or store the actual keys you press in the keyboard tester.</li>
                <li>We do not sell personal information.</li>
                <li>We do not knowingly collect sensitive personal data.</li>
            </ul>

            <h2>How We Use Information</h2>
            <ul>
                <li>To improve site performance and fix issues.</li>
                <li>To understand which tools are most useful.</li>
                <li>To respond to support requests or feedback.</li>
            </ul>

            <h2>Analytics and Session Tools</h2>
            <p>We may use third-party analytics tools (such as Microsoft Clarity or similar services) to understand site usage. These tools may set cookies and collect standard usage data. We use them for site improvement only.</p>

            <h2>Advertising and Affiliate Disclosure (FTC)</h2>
            <p>To keep the site free, we may display ads or use affiliate links. If you click an affiliate link and make a purchase, we may earn a commission at no extra cost to you. We will clearly label or disclose affiliate links and sponsored content when present.</p>

            <h2>Third-Party Links</h2>
            <p>Our site may link to third-party websites. We are not responsible for their privacy practices. Please review their policies before using those sites.</p>

            <h2>Cookies and Your Choices</h2>
            <p>You can control cookies through your browser settings. Disabling cookies may affect site features such as saved preferences.</p>

            <h2>Data Retention</h2>
            <p>We keep analytics data only as long as needed for performance and reporting. If you contact us, we retain communications only as needed to respond and provide support.</p>

            <h2>Security</h2>
            <p>We use reasonable technical and organizational measures to protect data. No online service is 100% secure, so we encourage safe browsing practices.</p>

            <h2>Children's Privacy</h2>
            <p>KeyboardTester.click is not intended for children under 13. We do not knowingly collect personal information from children.</p>

            <h2>Changes to This Policy</h2>
            <p>We may update this policy from time to time. Changes will be posted on this page with an updated effective date.</p>
            <p><strong>Effective Date:</strong> January 31, 2026</p>

            <h2>Contact Us</h2>
            <p>If you have questions about this policy, contact us at <a href="mailto:<?php echo $siteEmail; ?>"><?php echo $siteEmail; ?></a> or via the contact form on the <a href="<?php echo $pages['about']; ?>">About page</a>.</p>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <style>
        .privacy-policy-section {
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
            font-size: 1.1rem;
            color: var(--landing-muted);
            max-width: 780px;
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

        .privacy-policy-content h2 {
            font-size: 1.6rem;
            color: var(--landing-ink);
            font-weight: 600;
            margin: 1.5rem 0 1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .privacy-policy-content h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--landing-accent);
        }

        .privacy-policy-content p {
            font-size: 1rem;
            color: var(--landing-muted);
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        .privacy-policy-content a {
            color: var(--landing-accent);
            text-decoration: none;
        }

        .privacy-policy-content ul {
            list-style: none;
            padding: 0;
            margin: 1rem 0;
        }

        .privacy-policy-content li {
            font-size: 1rem;
            color: var(--landing-muted);
            margin-bottom: 0.8rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .privacy-policy-content li::before {
            content: '*';
            position: absolute;
            left: 0;
            color: var(--landing-accent);
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .legal-hero h1 { font-size: 2rem; }
            .legal-hero p { font-size: 1rem; }
            .legal-card { padding: 1.5rem; }
            .privacy-policy-content h2 { font-size: 1.4rem; }
            .privacy-policy-content p,
            .privacy-policy-content li { font-size: 0.95rem; }
        }
    </style>
</body>
</html>
