<?php
include __DIR__ . '/config.php';
require_once __DIR__ . '/includes/schema.php';

$pageTitle = 'Multi-Language Keyboard Tester - All Layouts Online';
$pageDescription = 'Open localized tool pages for Arabic, Russian, Spanish, French, Portuguese, Japanese, German, and Korean users. Test keyboards, mice, screens, audio, QR, OCR, passwords, and more.';
$pageKeywords = 'language keyboard tester, multilingual testing tools, open source keyboard tester, arabic keyboard, russian keyboard, spanish keyboard, french keyboard, portuguese keyboard, japanese keyboard, german keyboard, korean keyboard';
$breadcrumbSchema = schemaBreadcrumbs([
    ['name' => 'Home', 'url' => absoluteUrl('')],
    ['name' => 'Language Tools', 'url' => ''],
]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
    <?php include __DIR__ . '/includes/head-common.php'; ?>
    <?php echo $breadcrumbSchema; ?>
</head>
<body>
    <?php include __DIR__ . '/header.php'; ?>

    <main class="language-keyboards-page">
        <section class="language-keyboards-hero">
            <div class="container">
                <h1>Language Keyboard Testers & Localized Tools</h1>
                <p>Choose a language to open the localized tool hub, including keyboard, mouse, screen, audio, QR, OCR, password, and utility tools.</p>
            </div>
        </section>

        <section class="language-keyboards-section">
            <div class="container">
                <div class="language-selection" id="language-selection">
                    <h2>Test Your Keyboard in Your Language</h2>
                    <div class="language-buttons">
                        <a href="<?php echo $keyboardLanguages['ar']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/arabic_flag.svg'); ?>" alt="Arabic Flag" width="18" height="13" loading="lazy" decoding="async"> Arabic
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['de']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/german_flag.svg'); ?>" alt="German Flag" width="18" height="13" loading="lazy" decoding="async"> Deutsch
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['ru']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/russian_flag.svg'); ?>" alt="Russian Flag" width="18" height="13" loading="lazy" decoding="async"> Russian
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['es']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/spanish_flag.svg'); ?>" alt="Spanish Flag" width="18" height="13" loading="lazy" decoding="async"> Spanish
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['pt']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/Portugal_flag.svg'); ?>" alt="Portuguese Flag" width="18" height="13" loading="lazy" decoding="async"> Portuguese
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['fr']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/french_flag.svg'); ?>" alt="French Flag" width="18" height="13" loading="lazy" decoding="async"> French
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['ja']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/japanese_flag.svg?v=20260501'); ?>" alt="Japanese Flag" width="18" height="13" loading="lazy" decoding="async"> Japanese
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['ko']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/korean_flag.svg'); ?>" alt="Korean Flag" width="18" height="13" loading="lazy" decoding="async"> Korean
                            </span>
                        </a>
                    </div>
                </div>
                <p class="language-note">Language support now covers the localized tool suite, not only the Keyboard Tester. Each language hub links to translated keyboard, mouse, screen, camera, audio, QR, OCR, password, and utility tools where available.</p>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/footer.php'; ?>

    <style>
        .language-keyboards-hero {
            padding: 70px 20px 40px;
            text-align: center;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(30, 58, 138, 0.12));
            border-bottom: 1px solid var(--border);
        }

        .language-keyboards-hero h1 {
            font-size: clamp(2rem, 4vw, 3rem);
            margin-bottom: 12px;
            color: var(--text-primary);
        }

        .language-keyboards-hero p {
            color: var(--text-secondary);
            font-size: 1.05rem;
        }

        .language-keyboards-section {
            padding: 40px 20px 70px;
        }

        .language-selection {
            margin: 20px auto;
            max-width: 760px;
            padding: 20px;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            border-radius: 16px;
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.18);
            color: #ffffff;
        }

        .language-selection h2 {
            color: #ffffff;
            font-size: 1.45rem;
            text-align: center;
            margin: 12px 0 18px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
            font-weight: 600;
        }

        .language-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .language-buttons a {
            text-decoration: none;
        }

        .language-buttons span {
            padding: 7px 14px;
            background: rgba(255, 255, 255, 0.16);
            color: #fff;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, filter 0.3s, box-shadow 0.3s;
            display: inline-flex;
            align-items: center;
            min-width: 110px;
            justify-content: center;
            gap: 8px;
        }

        .language-buttons a:hover span {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
            filter: brightness(1.1);
        }

        .language-buttons img {
            width: 18px;
            height: 13px;
        }

        .language-note {
            margin-top: 18px;
            text-align: center;
            color: var(--text-secondary);
        }

        @media (max-width: 600px) {
            .language-selection {
                padding: 16px;
            }
            .language-selection h2 {
                font-size: 1.15rem;
            }
            .language-buttons span {
                padding: 6px 10px;
                font-size: 0.8rem;
                min-width: 95px;
            }
            .language-buttons img {
                width: 16px;
                height: 12px;
            }
        }
    </style>
</body>
</html>
