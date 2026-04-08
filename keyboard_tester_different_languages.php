<?php
include __DIR__ . '/config.php';

$pageTitle = 'Language Keyboard Tester - Test Keyboard Layouts';
$pageDescription = 'Quickly open keyboard testers for Arabic, Russian, Spanish, French, Portuguese, Japanese, German, and Korean layouts.';
$pageKeywords = 'language keyboard tester, arabic keyboard, russian keyboard, spanish keyboard, french keyboard, portuguese keyboard, japanese keyboard, german keyboard, korean keyboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
    <?php include __DIR__ . '/includes/head-common.php'; ?>
</head>
<body>
    <?php include __DIR__ . '/header.php'; ?>

    <main class="language-keyboards-page">
        <section class="language-keyboards-hero">
            <div class="container">
                <h1>Language Keyboard Testers</h1>
                <p>Choose a language layout to open the keyboard tester in that language.</p>
            </div>
        </section>

        <section class="language-keyboards-section">
            <div class="container">
                <div class="language-selection" id="language-selection">
                    <h2>Test Your Keyboard in Your Language</h2>
                    <div class="language-buttons">
                        <a href="<?php echo $keyboardLanguages['ar']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/arabic_flag.svg'); ?>" alt="Arabic Flag"> Arabic
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['de']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/german_flag.svg'); ?>" alt="German Flag"> Deutsch
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['ru']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/russian_flag.svg'); ?>" alt="Russian Flag"> Russian
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['es']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/spanish_flag.svg'); ?>" alt="Spanish Flag"> Spanish
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['pt']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/Portugal_flag.svg'); ?>" alt="Portuguese Flag"> Portuguese
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['fr']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/french_flag.svg'); ?>" alt="French Flag"> French
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['ja']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/japan_flag.svg'); ?>" alt="Japanese Flag"> Japanese
                            </span>
                        </a>
                        <a href="<?php echo $keyboardLanguages['ko']['url']; ?>">
                            <span>
                                <img src="<?php echo url('flags/korean_flag.svg'); ?>" alt="Korean Flag"> Korean
                            </span>
                        </a>
                    </div>
                </div>
                <p class="language-note">Language support applies to the Keyboard Tester only. All other tools are currently English-only.</p>
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
