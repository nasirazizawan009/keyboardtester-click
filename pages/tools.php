<?php
/**
 * Tools Directory Page
 * Master page listing all available testing tools
 */

include __DIR__ . '/../config.php';

$pageTitle = 'Free Online Testing Tools - Keyboard, Mouse, Webcam & Screen Tester';
$pageDescription = 'Comprehensive suite of free online testing tools. Test keyboard, mouse, webcam, screen, and microphone without downloads or signup.';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../includes/seo-meta.php'; ?>
<?php include __DIR__ . '/../includes/head-common.php'; ?>
</head>
<body>
    <!-- Header -->
    <?php include __DIR__ . '/../header.php'; ?>
    
    <main>
        <!-- Hero Section -->
        <section class="hero tools-hero">
            <div class="container">
                <h1>Free Online Testing Tools</h1>
                <p>Comprehensive suite of free testing tools—no downloads, no signup, no ads</p>
            </div>
        </section>
        
        <!-- Tools Grid -->
        <section class="category-links">
            <div class="container">
                <h2>Browse by category</h2>
                <p class="category-subtitle">Explore tools by focus area.</p>
                <div class="category-links-grid">
                    <a href="<?php echo absoluteUrl('pages/category-keyboard.php'); ?>" class="category-link-card">
                        <h3>Keyboard Tools</h3>
                        <p>Keyboard tester, typing speed, and latency checks.</p>
                    </a>
                    <a href="<?php echo absoluteUrl('pages/category-mouse.php'); ?>" class="category-link-card">
                        <h3>Mouse Tools</h3>
                        <p>Click tests, speed, sensitivity, and trails.</p>
                    </a>
                    <a href="<?php echo absoluteUrl('pages/category-audio-video.php'); ?>" class="category-link-card">
                        <h3>Audio & Video</h3>
                        <p>Screen, webcam, mic, and speaker testing.</p>
                    </a>
                    <a href="<?php echo absoluteUrl('pages/category-utilities.php'); ?>" class="category-link-card">
                        <h3>Utility Tools</h3>
                        <p>QR, OCR, passwords, WhatsApp, and more.</p>
                    </a>
                    <a href="<?php echo absoluteUrl('pages/category-language-keyboards.php'); ?>" class="category-link-card">
                        <h3>Language Keyboards</h3>
                        <p>Arabic, Russian, Spanish, French, and others.</p>
                    </a>
                </div>
            </div>
        </section>

        <section class="tools-section">
            <div class="container">
                <div class="tools-grid-all">
                    <!-- Keyboard Tester -->
                    <a href="<?php echo absoluteUrl('tools/keyboard-tester/'); ?>" class="tool-card-large">
                        <div class="tool-card-header">
                            <span class="tool-emoji">⌨️</span>
                            <h2>Keyboard Tester</h2>
                        </div>
                        <p>Test keyboard functionality, detect ghosting keys, measure latency, identify stuck keys with real-time visual feedback.</p>
                        <div class="tool-features">
                            <span class="badge">Real-time testing</span>
                            <span class="badge">Ghosting detection</span>
                            <span class="badge">Latency measurement</span>
                            <span class="badge">Multiple layouts</span>
                        </div>
                        <span class="explore-link">Explore Tool →</span>
                    </a>

                    <!-- Arabic Keyboard Tester -->
                    <a href="<?php echo absoluteUrl('languages/arabic/'); ?>" class="tool-card-large">
                        <div class="tool-card-header">
                            <span class="tool-emoji">⌨️</span>
                            <h2>Arabic Keyboard Tester</h2>
                        </div>
                        <p>Test Arabic keyboard layout and key response with a fully Arabic interface and RTL-friendly layout.</p>
                        <div class="tool-features">
                            <span class="badge">Arabic layout</span>
                            <span class="badge">RTL interface</span>
                            <span class="badge">Ghosting detection</span>
                            <span class="badge">Latency measurement</span>
                        </div>
                        <span class="explore-link">Explore Tool ?</span>
                    </a>
                    
                    <!-- Mouse Tester -->
                    <a href="<?php echo absoluteUrl('tools/mouse-tester/'); ?>" class="tool-card-large">
                        <div class="tool-card-header">
                            <span class="tool-emoji">🖱️</span>
                            <h2>Mouse Tester</h2>
                        </div>
                        <p>Check mouse responsiveness, test button functionality, verify cursor movement and DPI sensitivity settings.</p>
                        <div class="tool-features">
                            <span class="badge">Button detection</span>
                            <span class="badge">DPI testing</span>
                            <span class="badge">Cursor tracking</span>
                            <span class="badge">Response time</span>
                        </div>
                        <span class="explore-link">Explore Tool →</span>
                    </a>
                    
                    <!-- Webcam Tester -->
                    <a href="<?php echo absoluteUrl('tools/webcam-tester/'); ?>" class="tool-card-large">
                        <div class="tool-card-header">
                            <span class="tool-emoji">📹</span>
                            <h2>Webcam Tester</h2>
                        </div>
                        <p>Test webcam video quality, verify audio input, check microphone levels and recording functionality.</p>
                        <div class="tool-features">
                            <span class="badge">Video test</span>
                            <span class="badge">Audio check</span>
                            <span class="badge">Microphone test</span>
                            <span class="badge">Quality assessment</span>
                        </div>
                        <span class="explore-link">Explore Tool →</span>
                    </a>
                    
                    <!-- Screen Tester -->
                    <a href="<?php echo absoluteUrl('tools/screen-tester/'); ?>" class="tool-card-large">
                        <div class="tool-card-header">
                            <span class="tool-emoji">🖥️</span>
                            <h2>Screen Tester</h2>
                        </div>
                        <p>Test display quality, detect stuck pixels, verify color accuracy and resolution settings.</p>
                        <div class="tool-features">
                            <span class="badge">Pixel detection</span>
                            <span class="badge">Color accuracy</span>
                            <span class="badge">Resolution check</span>
                            <span class="badge">Brightness test</span>
                        </div>
                        <span class="explore-link">Explore Tool →</span>
                    </a>
                </div>
            </div>
        </section>
        
        <!-- Why Use Our Tools -->
        <section class="why-section">
            <div class="container">
                <h2>Why Choose Our Testing Tools?</h2>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <span class="benefit-icon">🚀</span>
                        <h3>Fast & Instant</h3>
                        <p>No downloads required. Test immediately in your browser</p>
                    </div>
                    <div class="benefit-card">
                        <span class="benefit-icon">🔒</span>
                        <h3>100% Safe & Private</h3>
                        <p>All testing happens locally. We don't collect your data</p>
                    </div>
                    <div class="benefit-card">
                        <span class="benefit-icon">💰</span>
                        <h3>Completely Free</h3>
                        <p>No ads, no signup, no hidden fees. Always free to use</p>
                    </div>
                    <div class="benefit-card">
                        <span class="benefit-icon">🌍</span>
                        <h3>Multi-Language Support</h3>
                        <p>The Keyboard Tester is available in Arabic, Russian, Spanish, French, Portuguese, Japanese, German, and Korean.</p>
                    </div>
                    <div class="benefit-card">
                        <span class="benefit-icon">📱</span>
                        <h3>Cross-Platform</h3>
                        <p>Works on Windows, Mac, Linux - Desktop and Mobile</p>
                    </div>
                    <div class="benefit-card">
                        <span class="benefit-icon">🎯</span>
                        <h3>Accurate & Reliable</h3>
                        <p>Professional-grade testing with real-time feedback and statistics</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <!-- Footer -->
    <?php include __DIR__ . '/../footer.php'; ?>
    
    <style>
        .tools-hero {
            padding: 80px 20px;
            text-align: center;
            background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-tertiary) 100%);
            border-bottom: 2px solid var(--accent-primary);
        }
        
        .tools-hero h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            color: var(--text-primary);
            margin-bottom: 16px;
        }
        
        .tools-hero p {
            font-size: 1.2rem;
            color: var(--text-secondary);
            text-align: center;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .tools-hero .language-note {
            font-size: 0.98rem;
            color: var(--text-secondary);
            margin-top: 14px;
            max-width: 860px;
            margin-left: auto;
            margin-right: auto;
            padding: 10px 14px;
            border-radius: 12px;
            background: rgba(15, 23, 42, 0.05);
            border: 1px solid var(--border);
        }
        
        .tools-section {
            padding: 60px 20px;
        }

        .category-links {
            padding: 50px 20px;
        }

        .category-links .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px;
            background: var(--card-bg, #ffffff);
            border: 1px solid var(--border, rgba(0,0,0,0.1));
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }

        html.dark-theme .category-links .container,
        [data-theme="dark"] .category-links .container {
            background: rgba(30, 41, 59, 0.6);
            border-color: rgba(148, 163, 184, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .category-links h2 {
            text-align: center;
            font-size: 1.75rem;
            color: var(--text-primary);
            margin-bottom: 8px;
            font-weight: 700;
        }

        .category-subtitle {
            text-align: center;
            color: var(--text-secondary);
            margin-bottom: 32px;
        }

        .category-links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .category-link-card {
            display: block;
            padding: 20px 18px;
            border-radius: 12px;
            border: 1px solid var(--border, rgba(0,0,0,0.08));
            background: var(--surface, #f8fafc);
            text-decoration: none;
            transition: all 0.25s ease;
        }

        html.dark-theme .category-link-card,
        [data-theme="dark"] .category-link-card {
            background: rgba(15, 23, 42, 0.5);
            border-color: rgba(148, 163, 184, 0.15);
        }

        .category-link-card:hover {
            transform: translateY(-3px);
            border-color: #3b82f6;
            box-shadow: 0 12px 24px rgba(59, 130, 246, 0.15);
            background: var(--card-bg, #ffffff);
        }

        html.dark-theme .category-link-card:hover,
        [data-theme="dark"] .category-link-card:hover {
            background: rgba(30, 41, 59, 0.8);
            box-shadow: 0 12px 24px rgba(59, 130, 246, 0.2);
        }

        .category-link-card h3 {
            color: var(--text-primary);
            margin-bottom: 6px;
            font-size: 1.05rem;
            font-weight: 600;
        }

        .category-link-card p {
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.5;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .category-links .container {
                padding: 24px 20px;
                border-radius: 16px;
            }
            .category-links-grid {
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }
            .category-link-card {
                padding: 16px 14px;
            }
        }

        @media (max-width: 480px) {
            .category-links-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .tools-grid-all {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 28px;
        }
        
        .tool-card-large {
            display: flex;
            flex-direction: column;
            padding: 32px;
            background: var(--surface);
            border: 2px solid var(--border);
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .tool-card-large:hover {
            border-color: var(--accent-primary);
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 212, 255, 0.15);
        }
        
        .tool-card-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }
        
        .tool-emoji {
            font-size: 2.5rem;
            line-height: 1;
        }
        
        .tool-card-large h2 {
            color: var(--text-primary);
            font-size: 1.5rem;
            margin: 0;
        }
        
        .tool-card-large p {
            color: var(--text-secondary);
            line-height: 1.6;
            flex-grow: 1;
            margin-bottom: 16px;
        }
        
        .tool-features {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 16px;
        }
        
        .badge {
            background: var(--bg-tertiary);
            color: var(--accent-primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .explore-link {
            color: var(--accent-primary);
            font-weight: 600;
            transition: transform 0.3s ease;
        }
        
        .tool-card-large:hover .explore-link {
            transform: translateX(6px);
        }
        
        .why-section {
            padding: 60px 20px;
            background: linear-gradient(135deg, rgba(0, 212, 255, 0.05) 0%, rgba(0, 255, 136, 0.05) 100%);
        }
        
        .why-section h2 {
            text-align: center;
            font-size: 2.5rem;
            color: var(--text-primary);
            margin-bottom: 40px;
        }
        
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }
        
        .benefit-card {
            text-align: center;
            padding: 32px 24px;
            background: var(--surface);
            border-radius: 8px;
            border: 1px solid var(--border);
        }
        
        .benefit-icon {
            font-size: 2.5rem;
            display: block;
            margin-bottom: 16px;
        }
        
        .benefit-card h3 {
            color: var(--text-primary);
            margin-bottom: 8px;
            font-size: 1.2rem;
        }
        
        .benefit-card p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        @media (max-width: 768px) {
            .tools-grid-all {
                grid-template-columns: 1fr;
            }
        }
    </style>
</body>
</html>

