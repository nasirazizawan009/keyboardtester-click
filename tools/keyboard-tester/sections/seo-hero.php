<?php
/**
 * Keyboard Tester - SEO Hero Section
 * This section appears at the top with H1, description, and schema markup
 */
?>

<section class="seo-hero keyboard-tester-hero">
    <div class="container">
        <!-- Main Heading (H1) -->
        <h1 class="hero-title">Free Online Keyboard Tester - Test Your Keyboard Keys</h1>
        
        <!-- Hero Description -->
        <p class="hero-description">
            Test your keyboard instantly with our free online keyboard tester. Detect ghosting keys, measure keyboard latency, identify stuck keys, and verify response time—all without any downloads or signup required.
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
      "name": "How do I test my keyboard online?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Simply press any key on your keyboard and watch it light up in the tester. The tool will show the key name, response time, and color-coded feedback indicating response speed."
      }
    },
    {
      "@type": "Question",
      "name": "Is this keyboard tester free?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes! Our keyboard tester is completely free to use. No signup, no downloads, no ads. Just visit the page and start testing."
      }
    },
    {
      "@type": "Question",
      "name": "What does ghosting mean in keyboards?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ghosting occurs when a keyboard fails to register all keys pressed simultaneously. Our tool detects these phantom key presses automatically."
      }
    },
    {
      "@type": "Question",
      "name": "Can I test different keyboard layouts?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, our tester supports QWERTY, Dvorak, Colemak, AZERTY, and QWERTZ layouts. You can switch layouts in the controls."
      }
    }
  ]
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
    color: var(--text-primary);
    margin-bottom: 16px;
    line-height: 1.2;
    font-weight: 700;
}

.hero-description {
    font-size: 1.2rem;
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: 40px;
    max-width: 800px;
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
    color: var(--text-primary);
    margin-bottom: 8px;
    font-size: 1.1rem;
}

.feature-text p {
    color: var(--text-secondary);
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
