<?php
/**
 * Keyboard Tester - SEO Hero Section
 * This section appears at the top with H1, description, and schema markup
 */
?>

<section class="seo-hero keyboard-tester-hero">
    <div class="container">
        <!-- Main Heading (H1) -->
        <h1 class="hero-title">Keyboard Tester — Test All Keys, N-Key Rollover & Ghosting Online</h1>

        <!-- Hero Description -->
        <p class="hero-description">
            Free online keyboard tester for every key on your keyboard. Detect ghosting, check N-key rollover, measure key latency in milliseconds, and identify stuck or repeating keys. Works with mechanical, membrane, and laptop keyboards in all languages — no install, no signup, fully open source.
        </p>
        
        <!-- Key Features List (for SEO) -->
        <div class="hero-features">
            <div class="feature">
                <span class="feature-icon">⚡</span>
                <div class="feature-text">
                    <h3>Real-Time Testing</h3>
                    <p>Instantly see keyboard response with color-coded feedback (Green, Yellow, Orange, Red, Purple)</p>
                </div>
            </div>
            <div class="feature">
                <span class="feature-icon">🎯</span>
                <div class="feature-text">
                    <h3>Multiple Layouts</h3>
                    <p>Support for QWERTY, Dvorak, Colemak, AZERTY, and QWERTZ keyboard layouts</p>
                </div>
            </div>
            <div class="feature">
                <span class="feature-icon">🌙</span>
                <div class="feature-text">
                    <h3>Multiple Themes</h3>
                    <p>Choose from Dark, Light, Midnight, Cyberpunk, and Forest themes</p>
                </div>
            </div>
            <div class="feature">
                <span class="feature-icon">🔍</span>
                <div class="feature-text">
                    <h3>Ghost-Click Detection</h3>
                    <p>Identify phantom key presses and detect ghosting issues automatically</p>
                </div>
            </div>
            <div class="feature">
                <span class="feature-icon">⏱️</span>
                <div class="feature-text">
                    <h3>Latency Measurement</h3>
                    <p>Measure keyboard response time and get detailed latency statistics</p>
                </div>
            </div>
            <div class="feature">
                <span class="feature-icon">📊</span>
                <div class="feature-text">
                    <h3>Key Statistics & Heatmap</h3>
                    <p>View key press statistics and visual heatmap of your keyboard usage</p>
                </div>
            </div>
        </div>
        
        <!-- CTA -->
        <div class="hero-cta">
            <button class="btn btn-primary" onclick="document.getElementById('keyboard-tester').scrollIntoView({behavior: 'smooth'})">
                ⌨️ Start Testing Your Keyboard
            </button>
        </div>

        <!-- Specialized tests cross-link block (helps Google discover sibling tools) -->
        <div class="related-tests" style="margin-top:48px;padding:24px;background:var(--surface);border-radius:8px;border-left:4px solid var(--accent-primary);">
            <h2 style="margin:0 0 12px 0;font-size:1.15rem;">Specialized keyboard tests</h2>
            <p style="margin:0 0 16px 0;color:var(--text-secondary);font-size:0.95rem;">Looking for a specific issue? Use one of these focused testers instead:</p>
            <ul style="list-style:none;padding:0;margin:0;display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:12px;">
                <li><a href="<?php echo url('keyboard-ghosting-test.php'); ?>" style="color:var(--accent-primary);text-decoration:none;font-weight:500;">Keyboard ghosting test</a> <span style="color:var(--text-secondary);font-size:0.9rem;">— check anti-ghosting and key combo support</span></li>
                <li><a href="<?php echo url('n-key-rollover-test.php'); ?>" style="color:var(--accent-primary);text-decoration:none;font-weight:500;">N-key rollover (NKRO) test</a> <span style="color:var(--text-secondary);font-size:0.9rem;">— measure simultaneous key registration</span></li>
                <li><a href="<?php echo url('stuck-key-test.php'); ?>" style="color:var(--accent-primary);text-decoration:none;font-weight:500;">Stuck key test</a> <span style="color:var(--text-secondary);font-size:0.9rem;">— diagnose repeating or jammed keys</span></li>
                <li><a href="<?php echo url('latency-checker.php'); ?>" style="color:var(--accent-primary);text-decoration:none;font-weight:500;">Keyboard latency test</a> <span style="color:var(--text-secondary);font-size:0.9rem;">— measure key press delay in milliseconds</span></li>
            </ul>
        </div>
    </div>
</section>

<!-- Schema Markup for FAQ -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How do I test all keys on my keyboard online?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Press every key on your keyboard one at a time. Each key lights up in the on-screen layout when registered. Keys that stay dim are not being detected. Color codes show response time: green for fast (<10ms), yellow for normal, orange for slow, red/purple for very slow keys that may be failing."
      }
    },
    {
      "@type": "Question",
      "name": "What is keyboard ghosting and how do I test for it?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ghosting is when a keyboard fails to register all keys pressed simultaneously. To test, press 3-4 keys at the same time (e.g. W+A+D+Space, common in gaming). If any keys do not light up, your keyboard has ghosting on that combination. Our tool also detects 'phantom' key presses where a key registers without being pressed, which indicates a failing switch."
      }
    },
    {
      "@type": "Question",
      "name": "What is N-key rollover (NKRO) and how do I check it?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "N-key rollover means the keyboard can register N simultaneous key presses correctly. Most membrane keyboards support 2-3KRO, decent gaming keyboards support 6KRO, and high-end mechanical keyboards support full NKRO (every key independent). To test: hold down keys one by one without releasing — the maximum number that all stay lit at once is your keyboard's rollover capability."
      }
    },
    {
      "@type": "Question",
      "name": "How is keyboard latency measured?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Latency is the delay between pressing a key and the computer registering the press, measured in milliseconds. Our tool measures the time from JavaScript keydown event to render. Note: this measures browser-to-render latency, not switch actuation; for full hardware latency you also need to account for USB polling rate and switch debounce. Typical values: gaming keyboards 1-5ms, office keyboards 5-15ms, wireless keyboards 8-25ms."
      }
    },
    {
      "@type": "Question",
      "name": "Why are some of my keyboard keys not working?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Most often: dirt or debris under the keycap (clean with compressed air), worn switch contacts (test by pressing harder), broken solder joint (visible damage on PCB), or driver issue (try a different USB port or computer). Our tester helps you isolate the cause: if the key registers in our tool but not in your software, it is a software issue; if it does not register here either, it is hardware."
      }
    },
    {
      "@type": "Question",
      "name": "Can I test wireless and Bluetooth keyboards online?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, our keyboard tester works with any keyboard that registers as a standard HID device — wired USB, USB-C, Bluetooth, 2.4GHz wireless, and laptop integrated keyboards all work. Wireless keyboards typically show 5-15ms higher latency than wired due to radio handshake overhead."
      }
    },
    {
      "@type": "Question",
      "name": "Is this keyboard tester free and safe to use?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — completely free, no signup, no downloads. The tester runs entirely in your browser using JavaScript keydown events. No keystrokes are sent to any server. The full source code is open source on GitHub for verification."
      }
    }
  ]
}
</script>

<!-- Schema Markup for WebApplication -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Keyboard Tester",
  "url": "https://keyboardtester.click/tools/keyboard-tester/",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "Any (web browser)",
  "browserRequirements": "Requires JavaScript",
  "isAccessibleForFree": true,
  "description": "Free online keyboard tester. Test every key, check N-key rollover, detect ghosting, measure key latency in milliseconds. Works with mechanical, membrane, and laptop keyboards.",
  "featureList": [
    "Test every key on the keyboard",
    "N-key rollover detection",
    "Ghosting and phantom key detection",
    "Per-key latency measurement",
    "Multiple layouts: QWERTY, Dvorak, Colemak, AZERTY, QWERTZ",
    "Multiple themes including dark mode",
    "Heatmap of key press frequency",
    "Open source"
  ],
  "creator": {
    "@type": "Organization",
    "name": "KeyboardTester.click",
    "url": "https://keyboardtester.click/"
  }
}
</script>

<style>
.seo-hero {
    padding: 80px 20px;
    background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-tertiary) 100%);
    border-bottom: 2px solid var(--accent-primary);
}

.seo-hero .container {
    max-width: 1000px;
    margin: 0 auto;
}

.hero-title {
    font-size: clamp(2rem, 5vw, 3.5rem);
    color: var(--text-primary, var(--text-color, #1e293b));
    margin-bottom: 16px;
    line-height: 1.2;
    font-weight: 700;
}
html.dark-theme .hero-title, [data-theme="dark"] .hero-title {
    color: var(--text-primary, var(--text-color, #e2e8f0));
}

.hero-description {
    font-size: 1.2rem;
    color: var(--text-secondary, var(--text-color, #334155));
    line-height: 1.6;
    margin-bottom: 40px;
    max-width: 800px;
}
html.dark-theme .hero-description, [data-theme="dark"] .hero-description {
    color: var(--text-secondary, var(--text-color, #cbd5e1));
}

.hero-features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
    margin: 40px 0;
}

.feature {
    display: flex;
    gap: 16px;
    padding: 16px;
    background: var(--surface);
    border-radius: 8px;
    border-left: 4px solid var(--accent-primary);
}

.feature-icon {
    font-size: 2rem;
    flex-shrink: 0;
}

.feature-text h3 {
    color: var(--text-primary, var(--text-color, #1e293b));
    margin-bottom: 8px;
    font-size: 1.1rem;
}

.feature-text p {
    color: var(--text-secondary, var(--text-color, #334155));
    font-size: 0.95rem;
    line-height: 1.5;
}

.hero-cta {
    margin-top: 40px;
    text-align: center;
}

.btn {
    padding: 14px 32px;
    border-radius: 8px;
    border: none;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-primary {
    background: var(--accent-primary);
    color: var(--bg-primary);
}

.btn-primary:hover {
    background: var(--accent-secondary);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .seo-hero {
        padding: 40px 20px;
    }
    
    .hero-features {
        grid-template-columns: 1fr;
    }
}
</style>
