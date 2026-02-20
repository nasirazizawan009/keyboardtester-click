<?php
/**
 * Tools Directory Page - Modern UI Design
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
    <style>
        /* ===== HERO SECTION ===== */
        .tools-hero {
            position: relative;
            padding: 100px 20px 80px;
            text-align: center;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            overflow: hidden;
        }

        .tools-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(ellipse 80% 50% at 50% -20%, rgba(56, 189, 248, 0.3), transparent),
                radial-gradient(ellipse 60% 40% at 80% 80%, rgba(168, 85, 247, 0.2), transparent),
                radial-gradient(ellipse 50% 30% at 20% 90%, rgba(34, 211, 238, 0.15), transparent);
            pointer-events: none;
        }

        .tools-hero .container {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: rgba(56, 189, 248, 0.15);
            border: 1px solid rgba(56, 189, 248, 0.3);
            border-radius: 999px;
            color: #38bdf8;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .hero-badge .pulse {
            width: 8px;
            height: 8px;
            background: #22d3ee;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.2); }
        }

        .tools-hero h1 {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 800;
            color: #f1f5f9;
            margin-bottom: 20px;
            line-height: 1.1;
        }

        .tools-hero h1 span {
            background: linear-gradient(135deg, #38bdf8, #a855f7, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .tools-hero p {
            font-size: 1.25rem;
            color: #94a3b8;
            max-width: 600px;
            margin: 0 auto 32px;
            line-height: 1.6;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 48px;
            flex-wrap: wrap;
        }

        .hero-stat {
            text-align: center;
        }

        .hero-stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            color: #38bdf8;
            line-height: 1;
        }

        .hero-stat-label {
            font-size: 0.875rem;
            color: #64748b;
            margin-top: 4px;
        }

        /* ===== QUICK CATEGORIES ===== */
        .quick-categories {
            padding: 60px 20px;
            background: var(--bg-primary);
        }

        .quick-categories .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 48px;
        }

        .section-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 12px;
        }

        .section-header p {
            color: var(--text-secondary);
            font-size: 1.1rem;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
        }

        .category-card {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 28px 16px;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--cat-color-1), var(--cat-color-2));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .category-card:hover::before {
            opacity: 1;
        }

        .category-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-color: transparent;
        }

        .category-card[data-category="keyboard"] { --cat-color-1: #3b82f6; --cat-color-2: #60a5fa; }
        .category-card[data-category="mouse"] { --cat-color-1: #10b981; --cat-color-2: #34d399; }
        .category-card[data-category="display"] { --cat-color-1: #f59e0b; --cat-color-2: #fbbf24; }
        .category-card[data-category="audio"] { --cat-color-1: #ec4899; --cat-color-2: #f472b6; }
        .category-card[data-category="utility"] { --cat-color-1: #8b5cf6; --cat-color-2: #a78bfa; }

        .category-icon {
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            background: linear-gradient(135deg, var(--cat-color-1), var(--cat-color-2));
            border-radius: 14px;
            margin-bottom: 16px;
        }

        .category-card h3 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 4px;
            text-align: center;
        }

        .category-card span {
            font-size: 0.8rem;
            color: var(--text-secondary);
        }

        /* ===== TOOLS SECTIONS ===== */
        .tools-section {
            padding: 60px 20px;
        }

        .tools-section .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .tools-section-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 32px;
            padding-bottom: 16px;
            border-bottom: 2px solid var(--card-border);
        }

        .tools-section-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            background: linear-gradient(135deg, var(--section-color-1), var(--section-color-2));
            border-radius: 12px;
        }

        .tools-section-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .tools-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        /* Tool Card */
        .tool-card {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 24px;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .tool-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
            border-color: var(--accent-primary);
        }

        .tool-card-top {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 12px;
        }

        .tool-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            background: var(--bg-tertiary);
            border-radius: 12px;
            flex-shrink: 0;
        }

        .tool-card h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 4px;
            line-height: 1.3;
        }

        .tool-card .tool-desc {
            font-size: 0.875rem;
            color: var(--text-secondary);
            line-height: 1.5;
            margin-bottom: 16px;
            flex-grow: 1;
        }

        .tool-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 16px;
        }

        .tool-tag {
            padding: 4px 10px;
            background: rgba(56, 189, 248, 0.1);
            color: #38bdf8;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .tool-cta {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--accent-primary);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .tool-cta svg {
            transition: transform 0.3s ease;
        }

        .tool-card:hover .tool-cta svg {
            transform: translateX(4px);
        }

        /* Featured Tool Card */
        .tool-card.featured {
            grid-column: span 2;
            flex-direction: row;
            gap: 32px;
            background: linear-gradient(135deg, rgba(56, 189, 248, 0.1), rgba(168, 85, 247, 0.1));
            border-color: rgba(56, 189, 248, 0.3);
        }

        .tool-card.featured .tool-icon {
            width: 72px;
            height: 72px;
            font-size: 36px;
        }

        .tool-card.featured h3 {
            font-size: 1.4rem;
        }

        .featured-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            padding: 4px 12px;
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            color: #000;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* ===== WHY CHOOSE SECTION ===== */
        .why-section {
            padding: 80px 20px;
            background: linear-gradient(180deg, var(--bg-primary) 0%, var(--bg-secondary) 100%);
        }

        .why-section .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .benefit-card {
            position: relative;
            padding: 32px;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .benefit-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .benefit-icon-wrap {
            width: 64px;
            height: 64px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            background: linear-gradient(135deg, rgba(56, 189, 248, 0.2), rgba(168, 85, 247, 0.2));
            border-radius: 16px;
        }

        .benefit-card h3 {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 12px;
        }

        .benefit-card p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* ===== CTA SECTION ===== */
        .cta-section {
            padding: 80px 20px;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            text-align: center;
        }

        .cta-section .container {
            max-width: 700px;
            margin: 0 auto;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #f1f5f9;
            margin-bottom: 16px;
        }

        .cta-section p {
            font-size: 1.15rem;
            color: #94a3b8;
            margin-bottom: 32px;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .cta-btn-primary {
            padding: 16px 32px;
            background: linear-gradient(135deg, #38bdf8, #0ea5e9);
            color: #0f172a;
            font-weight: 700;
            font-size: 1rem;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .cta-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(56, 189, 248, 0.4);
        }

        .cta-btn-secondary {
            padding: 16px 32px;
            background: transparent;
            color: #e2e8f0;
            font-weight: 600;
            font-size: 1rem;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .cta-btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .categories-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            .tool-card.featured {
                grid-column: span 1;
                flex-direction: column;
            }
            .benefits-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .tools-hero {
                padding: 60px 20px 50px;
            }
            .hero-stats {
                gap: 32px;
            }
            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .tools-grid {
                grid-template-columns: 1fr;
            }
            .benefits-grid {
                grid-template-columns: 1fr;
            }
            .cta-section h2 {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 480px) {
            .categories-grid {
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }
            .category-card {
                padding: 20px 12px;
            }
            .category-icon {
                width: 48px;
                height: 48px;
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../header.php'; ?>

    <main>
        <!-- Hero Section -->
        <section class="tools-hero">
            <div class="container">
                <div class="hero-badge">
                    <span class="pulse"></span>
                    All tools free & open source
                </div>
                <h1>Test Your Hardware <span>Instantly</span></h1>
                <p>Professional testing tools for keyboards, mice, screens, webcams, and more. No downloads, no signup, 100% privacy.</p>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="hero-stat-value">20+</div>
                        <div class="hero-stat-label">Free Tools</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-value">8</div>
                        <div class="hero-stat-label">Languages</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-value">100%</div>
                        <div class="hero-stat-label">Private</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Categories -->
        <section class="quick-categories">
            <div class="container">
                <div class="section-header">
                    <h2>Browse by Category</h2>
                    <p>Find the perfect tool for your testing needs</p>
                </div>
                <div class="categories-grid">
                    <a href="#keyboard-tools" class="category-card" data-category="keyboard">
                        <div class="category-icon">&#9000;</div>
                        <h3>Keyboard</h3>
                        <span>3 tools</span>
                    </a>
                    <a href="#mouse-tools" class="category-card" data-category="mouse">
                        <div class="category-icon">&#128433;</div>
                        <h3>Mouse</h3>
                        <span>5 tools</span>
                    </a>
                    <a href="#display-tools" class="category-card" data-category="display">
                        <div class="category-icon">&#128187;</div>
                        <h3>Display</h3>
                        <span>2 tools</span>
                    </a>
                    <a href="#audio-tools" class="category-card" data-category="audio">
                        <div class="category-icon">&#127908;</div>
                        <h3>Audio</h3>
                        <span>2 tools</span>
                    </a>
                    <a href="#utility-tools" class="category-card" data-category="utility">
                        <div class="category-icon">&#128736;</div>
                        <h3>Utilities</h3>
                        <span>8+ tools</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Keyboard Tools -->
        <section class="tools-section" id="keyboard-tools" style="--section-color-1: #3b82f6; --section-color-2: #60a5fa;">
            <div class="container">
                <div class="tools-section-header">
                    <div class="tools-section-icon">&#9000;</div>
                    <h2>Keyboard Tools</h2>
                </div>
                <div class="tools-grid">
                    <a href="<?php echo url(''); ?>" class="tool-card featured">
                        <span class="featured-badge">Popular</span>
                        <div class="tool-card-top">
                            <div class="tool-icon">&#9000;</div>
                            <div>
                                <h3>Keyboard Tester</h3>
                                <p class="tool-desc">Test every key on your keyboard with real-time visual feedback. Detect ghosting, stuck keys, and measure latency. Supports multiple layouts including QWERTY, AZERTY, Dvorak, and Colemak.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Ghosting Detection</span>
                            <span class="tool-tag">Latency Test</span>
                            <span class="tool-tag">Multi-Layout</span>
                            <span class="tool-tag">Mobile Support</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('keyboard_typing_test.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#9889;</div>
                            <div>
                                <h3>Typing Speed Test</h3>
                                <p class="tool-desc">Measure your typing speed in WPM and accuracy with various text samples and difficulty levels.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">WPM</span>
                            <span class="tool-tag">Accuracy</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('latency-checker.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#9201;</div>
                            <div>
                                <h3>Latency Checker</h3>
                                <p class="tool-desc">Measure keyboard input latency and response time with millisecond precision.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Response Time</span>
                            <span class="tool-tag">Milliseconds</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Mouse Tools -->
        <section class="tools-section" id="mouse-tools" style="--section-color-1: #10b981; --section-color-2: #34d399; background: var(--bg-secondary);">
            <div class="container">
                <div class="tools-section-header">
                    <div class="tools-section-icon">&#128433;</div>
                    <h2>Mouse Tools</h2>
                </div>
                <div class="tools-grid">
                    <a href="<?php echo url('mouse-test.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#128433;</div>
                            <div>
                                <h3>Mouse Tester</h3>
                                <p class="tool-desc">Test all mouse buttons, scroll wheel, and cursor movement with visual feedback.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Button Test</span>
                            <span class="tool-tag">Scroll</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('mouse_speed_tester.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#9889;</div>
                            <div>
                                <h3>Click Speed Test</h3>
                                <p class="tool-desc">Measure your clicks per second (CPS) and test your clicking speed.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">CPS</span>
                            <span class="tool-tag">Speed</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#127919;</div>
                            <div>
                                <h3>DPI Tester</h3>
                                <p class="tool-desc">Calculate and verify your mouse DPI and sensitivity settings.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">DPI</span>
                            <span class="tool-tag">Sensitivity</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('ghost-click-detector.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#128123;</div>
                            <div>
                                <h3>Ghost Click Detector</h3>
                                <p class="tool-desc">Detect unwanted phantom clicks and double-click issues with your mouse.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Ghost Clicks</span>
                            <span class="tool-tag">Diagnosis</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('mouse-trail.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#10024;</div>
                            <div>
                                <h3>Mouse Trail</h3>
                                <p class="tool-desc">Visualize mouse movement with colorful trails and patterns.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Visual</span>
                            <span class="tool-tag">Fun</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Display Tools -->
        <section class="tools-section" id="display-tools" style="--section-color-1: #f59e0b; --section-color-2: #fbbf24;">
            <div class="container">
                <div class="tools-section-header">
                    <div class="tools-section-icon">&#128187;</div>
                    <h2>Display & Camera</h2>
                </div>
                <div class="tools-grid">
                    <a href="<?php echo url('screentestindex.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#128187;</div>
                            <div>
                                <h3>Screen Tester</h3>
                                <p class="tool-desc">Test for dead pixels, color accuracy, and display uniformity with various test patterns.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Dead Pixels</span>
                            <span class="tool-tag">Colors</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('webcamtesterindex.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#128247;</div>
                            <div>
                                <h3>Webcam Tester</h3>
                                <p class="tool-desc">Test your webcam video quality, resolution, and check if it's working properly.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Video</span>
                            <span class="tool-tag">Resolution</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Audio Tools -->
        <section class="tools-section" id="audio-tools" style="--section-color-1: #ec4899; --section-color-2: #f472b6; background: var(--bg-secondary);">
            <div class="container">
                <div class="tools-section-header">
                    <div class="tools-section-icon">&#127908;</div>
                    <h2>Audio Tools</h2>
                </div>
                <div class="tools-grid">
                    <a href="<?php echo url('mic-tester.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#127908;</div>
                            <div>
                                <h3>Microphone Tester</h3>
                                <p class="tool-desc">Test your microphone input levels, quality, and recording functionality.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Input Level</span>
                            <span class="tool-tag">Recording</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('headphone_speaker_tester_index.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#127911;</div>
                            <div>
                                <h3>Headphone & Speaker Test</h3>
                                <p class="tool-desc">Test left/right audio channels, bass, and overall sound quality of your audio output.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">L/R Channels</span>
                            <span class="tool-tag">Bass Test</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Utility Tools -->
        <section class="tools-section" id="utility-tools" style="--section-color-1: #8b5cf6; --section-color-2: #a78bfa;">
            <div class="container">
                <div class="tools-section-header">
                    <div class="tools-section-icon">&#128736;</div>
                    <h2>Utility Tools</h2>
                </div>
                <div class="tools-grid">
                    <a href="<?php echo url('QR_code_generator_scanner.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#128241;</div>
                            <div>
                                <h3>QR Code Generator</h3>
                                <p class="tool-desc">Create QR codes for URLs, text, WiFi, contacts, and more with customization options.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Generate</span>
                            <span class="tool-tag">Custom</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('qr-code-reader.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#128247;</div>
                            <div>
                                <h3>QR Code Reader</h3>
                                <p class="tool-desc">Scan and decode QR codes using your camera or by uploading an image.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Scan</span>
                            <span class="tool-tag">Upload</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('ocr-tool.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#128196;</div>
                            <div>
                                <h3>OCR Tool</h3>
                                <p class="tool-desc">Extract text from images using optical character recognition technology.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Image to Text</span>
                            <span class="tool-tag">Extract</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('auto-password-generator.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#128274;</div>
                            <div>
                                <h3>Password Generator</h3>
                                <p class="tool-desc">Generate strong, secure passwords with customizable length and character options.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Secure</span>
                            <span class="tool-tag">Custom</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('whatsapp-link-generator.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#128172;</div>
                            <div>
                                <h3>WhatsApp Link Generator</h3>
                                <p class="tool-desc">Create click-to-chat WhatsApp links with pre-filled messages.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">WhatsApp</span>
                            <span class="tool-tag">Links</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('whatsapp-sentiment-analyzer.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#128200;</div>
                            <div>
                                <h3>Sentiment Analyzer</h3>
                                <p class="tool-desc">Analyze WhatsApp chat sentiment and emotional patterns in conversations.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Analysis</span>
                            <span class="tool-tag">Emotions</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                    <a href="<?php echo url('luckywheeltoolindex.php'); ?>" class="tool-card">
                        <div class="tool-card-top">
                            <div class="tool-icon">&#127922;</div>
                            <div>
                                <h3>Lucky Wheel</h3>
                                <p class="tool-desc">Spin the wheel to make random decisions or pick winners for giveaways.</p>
                            </div>
                        </div>
                        <div class="tool-tags">
                            <span class="tool-tag">Random</span>
                            <span class="tool-tag">Fun</span>
                        </div>
                        <div class="tool-cta">
                            Try Now <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Why Choose Section -->
        <section class="why-section">
            <div class="container">
                <div class="section-header">
                    <h2>Why Choose Our Tools?</h2>
                    <p>Built for professionals and enthusiasts alike</p>
                </div>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <div class="benefit-icon-wrap">&#128640;</div>
                        <h3>Instant Access</h3>
                        <p>No downloads or installations required. Test immediately in your browser on any device.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon-wrap">&#128274;</div>
                        <h3>100% Private</h3>
                        <p>All testing happens locally. Your data never leaves your device. We don't track or collect anything.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon-wrap">&#128176;</div>
                        <h3>Completely Free</h3>
                        <p>No ads, no signup, no hidden fees. Professional-grade tools available to everyone.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon-wrap">&#127760;</div>
                        <h3>Multi-Language</h3>
                        <p>Available in 8 languages including Arabic, Spanish, French, German, Russian, Japanese, and Korean.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon-wrap">&#128241;</div>
                        <h3>Cross-Platform</h3>
                        <p>Works seamlessly on Windows, Mac, Linux, iOS, and Android devices.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon-wrap">&#127919;</div>
                        <h3>Accurate Results</h3>
                        <p>Professional-grade testing with real-time feedback and detailed statistics.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <h2>Ready to Test Your Hardware?</h2>
                <p>Start with our most popular tool - the Keyboard Tester</p>
                <div class="cta-buttons">
                    <a href="<?php echo url(''); ?>" class="cta-btn-primary">Try Keyboard Tester</a>
                    <a href="<?php echo $socialLinks['github']; ?>" target="_blank" class="cta-btn-secondary">View on GitHub</a>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

    <script>
        // Smooth scroll for category links
        document.querySelectorAll('.category-card').forEach(card => {
            card.addEventListener('click', (e) => {
                const href = card.getAttribute('href');
                if (href && href.startsWith('#')) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            });
        });
    </script>
</body>
</html>
