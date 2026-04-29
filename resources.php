<?php
include 'config.php';

$pageTitle = 'Submit Device Testing Tools | KeyboardTester.Click';
$pageDescription = 'Submit useful keyboard, mouse, monitor, webcam, microphone, audio, and gamepad testing tools to our curated device testing directory.';
$pageKeywords = 'submit device testing tool, awesome device testing tools, keyboard tester directory, hardware testing tools, open source testing tools';
$pageOgImage = 'images/shared/keyboard-and-mouse.png';
$awesomeRepoUrl = 'https://github.com/nasirazizawan009/awesome-device-testing-tools';
$submissionUrl = $awesomeRepoUrl . '/issues/new/choose';
$pullRequestUrl = $awesomeRepoUrl . '/compare';
$pageCanonical = absoluteUrl('resources.php');

$faqSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'What tools can be submitted?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'We review practical testing tools for keyboards, mice, monitors, webcams, microphones, speakers, gamepads, mobile sensors, and similar hardware diagnostics.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Do submissions need to link back to KeyboardTester.Click?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'No. Submissions are reviewed for usefulness, transparency, safety, and fit. We do not require reciprocal links or paid placement.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Can non-open-source tools be submitted?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes, if the tool is genuinely useful and the listing clearly states whether it is free, paid, open source, browser based, or requires installation.',
            ],
        ],
    ],
];

$collectionSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Submit Device Testing Tools',
    'description' => $pageDescription,
    'url' => $pageCanonical,
    'about' => ['keyboard testing', 'mouse testing', 'monitor testing', 'audio testing', 'hardware diagnostics'],
    'isPartOf' => [
        '@type' => 'WebSite',
        'name' => 'KeyboardTester.Click',
        'url' => absoluteUrl(''),
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
    <?php include 'includes/head-common.php'; ?>
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
    <script type="application/ld+json"><?php echo json_encode($collectionSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
    <script type="application/ld+json"><?php echo json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
    <style>
        .resource-page {
            --resource-ink: #0f172a;
            --resource-muted: #475569;
            --resource-soft: #f8fafc;
            --resource-line: #dbe4ef;
            --resource-accent: #0ea5e9;
            --resource-accent-strong: #0369a1;
            background: #ffffff;
        }

        .resource-shell {
            max-width: 1120px;
            margin: 0 auto;
            padding: 74px 20px 28px;
        }

        .resource-hero {
            display: grid;
            grid-template-columns: minmax(0, 1.15fr) minmax(300px, 0.85fr);
            gap: 34px;
            align-items: center;
            padding: 36px 0 44px;
            border-bottom: 1px solid var(--resource-line);
        }

        .resource-kicker {
            display: inline-flex;
            align-items: center;
            width: fit-content;
            margin-bottom: 14px;
            padding: 7px 12px;
            border-radius: 999px;
            background: #e0f2fe;
            color: #075985;
            font-size: 0.84rem;
            font-weight: 800;
        }

        .resource-hero h1 {
            max-width: 760px;
            margin: 0 0 18px;
            color: var(--resource-ink);
            font-size: clamp(2.15rem, 5vw, 4.35rem);
            line-height: 1.02;
            letter-spacing: 0;
        }

        .resource-lede {
            max-width: 710px;
            margin: 0;
            color: var(--resource-muted);
            font-size: 1.08rem;
            line-height: 1.78;
        }

        .resource-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 26px;
        }

        .resource-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            padding: 0 18px;
            border-radius: 12px;
            border: 1px solid transparent;
            text-decoration: none;
            font-weight: 800;
            line-height: 1;
        }

        .resource-button.primary {
            background: var(--resource-accent-strong);
            color: #ffffff;
        }

        .resource-button.secondary {
            border-color: #bae6fd;
            background: #f0f9ff;
            color: #075985;
        }

        .resource-button:hover {
            transform: translateY(-1px);
            text-decoration: none;
        }

        .resource-panel {
            border: 1px solid var(--resource-line);
            border-radius: 8px;
            background: var(--resource-soft);
            padding: 24px;
        }

        .resource-panel h2,
        .resource-section h2,
        .resource-card h3,
        .resource-faq h3 {
            color: var(--resource-ink);
        }

        .resource-panel h2 {
            margin: 0 0 16px;
            font-size: 1.25rem;
        }

        .resource-checklist {
            display: grid;
            gap: 12px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .resource-checklist li {
            display: grid;
            grid-template-columns: 24px minmax(0, 1fr);
            gap: 10px;
            color: var(--resource-muted);
            line-height: 1.55;
        }

        .resource-checklist span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border-radius: 999px;
            background: #dcfce7;
            color: #166534;
            font-weight: 900;
            font-size: 0.82rem;
        }

        .resource-section {
            padding: 44px 0 0;
        }

        .resource-section > h2 {
            margin: 0 0 12px;
            font-size: clamp(1.55rem, 3vw, 2.25rem);
        }

        .resource-section > p {
            max-width: 780px;
            margin: 0 0 22px;
            color: var(--resource-muted);
            line-height: 1.75;
        }

        .resource-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .resource-card {
            border: 1px solid var(--resource-line);
            border-radius: 8px;
            padding: 20px;
            background: #ffffff;
        }

        .resource-card h3 {
            margin: 0 0 10px;
            font-size: 1rem;
        }

        .resource-card p {
            margin: 0;
            color: var(--resource-muted);
            line-height: 1.65;
        }

        .resource-callout {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 22px;
            margin-top: 44px;
            padding: 26px;
            border-radius: 8px;
            background: #0f172a;
            color: #e2e8f0;
        }

        .resource-callout h2 {
            margin: 0 0 8px;
            color: #ffffff;
            font-size: 1.35rem;
        }

        .resource-callout p {
            margin: 0;
            color: #cbd5e1;
            line-height: 1.65;
        }

        .resource-faq {
            display: grid;
            gap: 12px;
            margin-top: 22px;
        }

        .resource-faq article {
            border: 1px solid var(--resource-line);
            border-radius: 8px;
            padding: 18px 20px;
            background: #ffffff;
        }

        .resource-faq h3 {
            margin: 0 0 8px;
            font-size: 1rem;
        }

        .resource-faq p {
            margin: 0;
            color: var(--resource-muted);
            line-height: 1.65;
        }

        html.dark-theme .resource-page,
        [data-theme="dark"] .resource-page {
            --resource-ink: #f8fafc;
            --resource-muted: #cbd5e1;
            --resource-soft: #111827;
            --resource-line: rgba(148, 163, 184, 0.26);
            background: #020617;
        }

        html.dark-theme .resource-kicker,
        [data-theme="dark"] .resource-kicker {
            background: rgba(14, 165, 233, 0.18);
            color: #7dd3fc;
        }

        html.dark-theme .resource-panel,
        html.dark-theme .resource-card,
        html.dark-theme .resource-faq article,
        [data-theme="dark"] .resource-panel,
        [data-theme="dark"] .resource-card,
        [data-theme="dark"] .resource-faq article {
            background: #0f172a;
        }

        html.dark-theme .resource-button.secondary,
        [data-theme="dark"] .resource-button.secondary {
            border-color: rgba(125, 211, 252, 0.35);
            background: rgba(14, 165, 233, 0.12);
            color: #bae6fd;
        }

        @media (max-width: 900px) {
            .resource-hero {
                grid-template-columns: 1fr;
            }

            .resource-grid {
                grid-template-columns: 1fr;
            }

            .resource-callout {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 560px) {
            .resource-shell {
                padding-top: 54px;
            }

            .resource-actions,
            .resource-callout {
                width: 100%;
            }

            .resource-button {
                width: 100%;
            }
        }
    </style>
</head>
<body class="landing-page resource-page">
    <?php include 'header.php'; ?>

    <main class="landing-main resource-shell">
        <section class="resource-hero">
            <div>
                <p class="resource-kicker">Community submissions</p>
                <h1>Submit a Device Testing Tool</h1>
                <p class="resource-lede">We maintain a public GitHub directory for useful keyboard, mouse, monitor, webcam, microphone, speaker, gamepad, and hardware diagnostic tools. Good submissions help technicians, gamers, creators, and everyday users find practical testing utilities faster.</p>
                <div class="resource-actions" aria-label="Submission actions">
                    <a class="resource-button primary" href="<?php echo htmlspecialchars($submissionUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer">Open Submission Form</a>
                    <a class="resource-button secondary" href="<?php echo htmlspecialchars($awesomeRepoUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer">View GitHub Directory</a>
                </div>
            </div>

            <aside class="resource-panel" aria-labelledby="review-standards">
                <h2 id="review-standards">Review standards</h2>
                <ul class="resource-checklist">
                    <li><span>1</span><strong>Useful for real device testing or troubleshooting.</strong></li>
                    <li><span>2</span><strong>Clear about pricing, platform support, and privacy.</strong></li>
                    <li><span>3</span><strong>No malware, deceptive downloads, fake claims, or link schemes.</strong></li>
                    <li><span>4</span><strong>Short, factual description with the official tool URL.</strong></li>
                </ul>
            </aside>
        </section>

        <section class="resource-section" aria-labelledby="accepted-categories">
            <h2 id="accepted-categories">Accepted categories</h2>
            <p>The list is intentionally narrow. We want tools people can actually use for diagnostics, calibration, repair checks, and setup validation.</p>
            <div class="resource-grid">
                <article class="resource-card">
                    <h3>Keyboard and mouse</h3>
                    <p>Key testers, ghosting checks, polling rate tools, click testers, DPI tools, scroll tests, and input diagnostics.</p>
                </article>
                <article class="resource-card">
                    <h3>Display and camera</h3>
                    <p>Dead pixel tests, refresh rate checks, webcam tests, resolution tools, color checks, and screen calibration helpers.</p>
                </article>
                <article class="resource-card">
                    <h3>Audio and sensors</h3>
                    <p>Microphone tests, speaker tests, stereo checks, gamepad tools, vibration tests, gyroscope tests, and mobile diagnostics.</p>
                </article>
            </div>
        </section>

        <section class="resource-section" aria-labelledby="how-submit">
            <h2 id="how-submit">How to submit</h2>
            <p>For most people, the GitHub issue form is easiest. Developers can also open a pull request if they want to add the listing directly to the directory.</p>
            <div class="resource-grid">
                <article class="resource-card">
                    <h3>1. Use the issue form</h3>
                    <p>Share the tool name, official URL, category, pricing model, platform, and a short reason why it belongs.</p>
                </article>
                <article class="resource-card">
                    <h3>2. Wait for review</h3>
                    <p>Submissions are checked manually for usefulness, safety, duplicates, and whether the description is factual.</p>
                </article>
                <article class="resource-card">
                    <h3>3. Improve if requested</h3>
                    <p>If details are missing, we may ask for clarification before accepting or rejecting the submission.</p>
                </article>
            </div>
        </section>

        <section class="resource-callout" aria-labelledby="direct-github">
            <div>
                <h2 id="direct-github">Prefer pull requests?</h2>
                <p>Open a branch against the public directory and add the tool in the right category. Keep descriptions neutral and avoid promotional wording.</p>
            </div>
            <a class="resource-button primary" href="<?php echo htmlspecialchars($pullRequestUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer">Start Pull Request</a>
        </section>

        <section class="resource-section" aria-labelledby="submission-faq">
            <h2 id="submission-faq">Submission FAQ</h2>
            <div class="resource-faq">
                <article>
                    <h3>What tools can be submitted?</h3>
                    <p>Practical testing tools for keyboards, mice, monitors, webcams, microphones, speakers, gamepads, mobile sensors, and similar hardware diagnostics.</p>
                </article>
                <article>
                    <h3>Do submissions need to link back to KeyboardTester.Click?</h3>
                    <p>No. The directory is reviewed for usefulness, transparency, safety, and fit. We do not require reciprocal links or paid placement.</p>
                </article>
                <article>
                    <h3>Can non-open-source tools be submitted?</h3>
                    <p>Yes, if the tool is genuinely useful and the listing clearly states whether it is free, paid, open source, browser based, or requires installation.</p>
                </article>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
