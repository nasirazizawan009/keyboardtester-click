<?php
include 'config.php';
$pageTitle = 'About Us | KeyboardTester.click';
$pageDescription = 'Learn about KeyboardTester.click and our mission to provide fast, free device testing tools.';
$pageKeywords = 'about keyboardtester, device testing tools, keyboard tester';
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

    <main class="about-us-section landing-main">
        <section class="hero legal-hero">
            <h1>About KeyboardTester.click</h1>
            <p>We build fast, free, browser-based tools to help you test keyboards, mice, audio devices, and more.</p>
        </section>

        <section class="about-content legal-card">
            <h2>Our Mission</h2>
            <p>KeyboardTester.click exists to make device testing simple and accessible. We focus on speed, accuracy, and privacy so you can troubleshoot in seconds with no downloads.</p>

            <h2>What We Offer</h2>
            <ul>
                <li>Keyboard and mouse testing tools that run directly in your browser.</li>
                <li>Performance checks like typing speed and latency testing.</li>
                <li>Utility tools such as QR, OCR, and password generators.</li>
            </ul>

            <h2>Independent and Transparent</h2>
            <p>KeyboardTester.click is an independent website and is not affiliated with any keyboard, mouse, or hardware manufacturer.</p>

            <h2>Advertising and Affiliate Disclosure (FTC)</h2>
            <p>We may show ads or use affiliate links to keep the site free. If a link is an affiliate link, we will disclose it clearly. Purchases made through affiliate links may earn us a commission at no extra cost to you.</p>
            <p>We do not accept payment in exchange for positive reviews, and we do not claim that products are endorsed by us unless explicitly stated.</p>

            <h2>Accuracy and Limitations</h2>
            <p>We aim to keep our tools and content accurate and up to date, but results are provided as-is and may vary by device or browser. Our tools are informational and are not a substitute for professional diagnostics or repairs.</p>

            <h2>Contact Us</h2>
            <p>Questions or feedback? Email us at <a href="mailto:<?php echo $siteEmail; ?>"><?php echo $siteEmail; ?></a> or use the form below.</p>

            <div class="feedback-form">
                <form id="feedback-form">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your name">

                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">

                    <label for="message">Your Message:</label>
                    <textarea id="message" name="message" required placeholder="Share your feedback or ideas"></textarea>

                    <label for="captcha">CAPTCHA: <span id="captcha-question"></span></label>
                    <input type="number" id="captcha" name="captcha" required placeholder="Enter the answer">

                    <button type="submit">Send Feedback</button>
                </form>
                <p class="success-message">Thank you! Your feedback has been sent successfully.</p>
                <p class="error-message">Oops! Something went wrong. Please try again.</p>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            function generateCaptcha() {
                const num1 = Math.floor(Math.random() * 10) + 1;
                const num2 = Math.floor(Math.random() * 10) + 1;
                const answer = num1 + num2;
                document.getElementById('captcha-question').textContent = `${num1} + ${num2} = ?`;
                return answer;
            }

            let captchaAnswer = generateCaptcha();
            const form = document.getElementById('feedback-form');
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const message = document.getElementById('message').value;
                const captchaInput = parseInt(document.getElementById('captcha').value, 10);

                if (captchaInput !== captchaAnswer) {
                    document.querySelector('.error-message').textContent = 'Incorrect CAPTCHA answer. Please try again.';
                    document.querySelector('.error-message').style.display = 'block';
                    document.querySelector('.success-message').style.display = 'none';
                    captchaAnswer = generateCaptcha();
                    document.getElementById('captcha').value = '';
                    return;
                }

                const formData = new FormData();
                formData.append('name', name);
                formData.append('email', email);
                formData.append('message', message);
                formData.append('captcha', captchaInput);

                fetch('feedback.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        document.querySelector('.success-message').style.display = 'block';
                        document.querySelector('.error-message').style.display = 'none';
                        form.reset();
                        captchaAnswer = generateCaptcha();
                    } else {
                        document.querySelector('.error-message').textContent = data.message || 'Oops! Something went wrong. Please try again.';
                        document.querySelector('.error-message').style.display = 'block';
                        document.querySelector('.success-message').style.display = 'none';
                        captchaAnswer = generateCaptcha();
                    }
                })
                .catch(() => {
                    document.querySelector('.error-message').textContent = 'Network error. Please try again later.';
                    document.querySelector('.error-message').style.display = 'block';
                    document.querySelector('.success-message').style.display = 'none';
                    captchaAnswer = generateCaptcha();
                });
            });
        });
    </script>

    <style>
        .about-us-section {
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

        .about-content h2 {
            font-size: 1.6rem;
            color: var(--landing-ink);
            font-weight: 600;
            margin: 1.5rem 0 1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .about-content h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--landing-accent);
        }

        .about-content p {
            font-size: 1rem;
            color: var(--landing-muted);
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        .about-content a {
            color: var(--landing-accent);
            text-decoration: none;
        }

        .about-content ul {
            list-style: none;
            padding: 0;
            margin: 1rem 0;
        }

        .about-content li {
            font-size: 1rem;
            color: var(--landing-muted);
            margin-bottom: 0.8rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .about-content li::before {
            content: '*';
            position: absolute;
            left: 0;
            color: var(--landing-accent);
            font-size: 1rem;
        }

        .feedback-form {
            margin-top: 2rem;
            display: grid;
            gap: 12px;
        }

        .feedback-form input,
        .feedback-form textarea {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid var(--landing-border);
            background: var(--landing-surface);
            color: var(--landing-ink);
        }

        .feedback-form button {
            padding: 12px 24px;
            border-radius: 999px;
            background: var(--landing-accent);
            color: #0f172a;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }

        .success-message,
        .error-message {
            display: none;
            margin-top: 6px;
            font-size: 0.95rem;
        }

        .success-message { color: #16a34a; }
        .error-message { color: #ef4444; }

        @media (max-width: 768px) {
            .legal-hero h1 { font-size: 2rem; }
            .legal-hero p { font-size: 1rem; }
            .legal-card { padding: 1.5rem; }
            .about-content h2 { font-size: 1.4rem; }
            .about-content p,
            .about-content li { font-size: 0.95rem; }
        }
    </style>
</body>
</html>
