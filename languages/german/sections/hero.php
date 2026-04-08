<?php
/**
 * German Keyboard Tester - Hero Section
 */
?>

<section class="landing-hero">
    <div class="container landing-hero-grid">
        <div class="hero-copy">
            <p class="hero-kicker">Tastatur-Diagnosewerkzeug</p>
            <h1 class="hero-title">Testen Sie jede Taste mit sofortigem Feedback in Sekunden</h1>
            <p class="hero-lede">Sofortige Tastenhervorhebung, Layout-Wechsel, Ghosting-Test und exportierbare Berichte. Keine Installation. Keine Registrierung.</p>
            <div class="hero-actions">
                <a class="landing-btn landing-btn-primary" href="#keyboard-tester">Tastaturtest starten</a>
                <a class="landing-btn landing-btn-ghost" href="#tools">Alle Werkzeuge erkunden</a>
            </div>
            <div class="hero-badges">
                <span class="hero-badge">Keine Installation</span>
                <span class="hero-badge">Mehrere Layouts</span>
                <span class="hero-badge">Voller Datenschutz</span>
            </div>
            <div class="hero-metrics">
                <div class="metric-card">
                    <span class="metric-value">104+</span>
                    <span class="metric-label">Unterstuetzte Tasten</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">5</span>
                    <span class="metric-label">Enthaltene Designs</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">2</span>
                    <span class="metric-label">Betriebssysteme</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="hero-shot">
                <picture>
                    <source type="image/webp" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.webp'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.webp'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <source type="image/png" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.png'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <img src="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?>" width="900" height="600" alt="Deutsche Tastatur-Tester Oberflaeche" loading="eager" decoding="async" fetchpriority="high">
                </picture>
            </div>
            <div class="hero-stack">
                <div class="mini-card">
                    <div class="mini-title">Live-Diagnose</div>
                    <p>Beobachten Sie Tastendruecke, Heatmap-Dichte und Reaktionszeit in Echtzeit.</p>
                </div>
                <div class="mini-card">
                    <div class="mini-title">Layout-Wechsel</div>
                    <p>Wechseln Sie Layouts und Betriebssystem-Beschriftungen ohne Ihre Sitzung zu verlieren.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Stage (Above the Fold) -->
<section class="tool-stage" aria-labelledby="tool-stage-title-de">
    <div class="container tool-stage-header">
        <div>
            <p class="section-kicker">Hauptwerkzeug</p>
            <h2 id="tool-stage-title-de">Tastatur-Tester</h2>
            <p class="section-lede">Verwenden Sie das Tool unten, um jede Taste zu testen, Layouts zu pruefen und Latenz zu messen.</p>
        </div>
        <div class="tool-stage-actions">
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Schnelltipps anzeigen</a>
        </div>
    </div>
    <div class="tool-shell">
        <?php include __DIR__ . '/tool.php'; ?>
    </div>
</section>

<!-- Trust Strip -->
<section class="trust-strip" aria-label="Hauptfunktionen">
    <div class="container trust-grid">
        <div class="trust-item">
            <div class="trust-title">Keine Installation</div>
            <div class="trust-desc">Funktioniert vollstaendig in Ihrem Browser</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Layout-Unterstuetzung</div>
            <div class="trust-desc">QWERTZ, QWERTY, AZERTY, Colemak, Dvorak</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Live-Diagnose</div>
            <div class="trust-desc">Tastendaten, Heatmap und Latenz sofort</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Datenschutz zuerst</div>
            <div class="trust-desc">Ihre Daten verlassen niemals Ihr Geraet</div>
        </div>
    </div>
</section>

<!-- Feature Band -->
<section class="feature-band" aria-labelledby="feature-title-de">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Entwickelt fuer schnelle Diagnose</p>
            <h2 id="feature-title-de">Alles was Sie brauchen, um Ihre Tastatur zu ueberpruefen</h2>
            <p class="section-lede">Ein fokussiertes Toolkit fuer taegliche Pruefungen, Support-Tickets und Hardware-Fehlerbehebung.</p>
        </div>
        <div class="landing-feature-grid">
            <article class="landing-feature-card">
                <h3>Live-Tastenkarte</h3>
                <p>Beobachten Sie jeden Tastendruck sofort hervorgehoben mit Farbfeedback und Tastenverlauf.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Ghosting und Latenz</h3>
                <p>Messen Sie Reaktionszeiten und erkennen Sie Geistereingaben mit integrierten Werkzeugen.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Multi-Geraete-Unterstuetzung</h3>
                <p>Wechseln Sie Layouts und Betriebssystem-Beschriftungen spontan ohne die Seite zu verlassen.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Exportierbare Ergebnisse</h3>
                <p>Speichern Sie einen Sitzungsbericht fuer QC-Notizen oder Support-Dokumentation.</p>
            </article>
        </div>
    </div>
</section>

<!-- Process Band -->
<section class="process-band" aria-labelledby="process-title-de">
    <div class="container">
        <div class="section-head split">
            <div>
                <p class="section-kicker">Einfacher Arbeitsablauf</p>
                <h2 id="process-title-de">Drei Schritte zur Tastaturueberpruefung</h2>
            </div>
            <p class="section-lede">Fuehren Sie eine vollstaendige Pruefung in unter einer Minute durch und exportieren Sie Ergebnisse bei Bedarf.</p>
        </div>
        <div class="process-grid">
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/Press-any-key-512.webp'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.webp'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/Press-any-key-512.png'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.png'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/Press-any-key-512.png'); ?>" width="512" height="768" alt="Druecken Sie eine beliebige Taste zum Starten" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">01</div>
                    <h3>Druecken Sie eine Taste</h3>
                    <p>Beginnen Sie zu tippen und beobachten Sie, wie die Tastenkarte in Echtzeit reagiert.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/special-keys-layout-640.webp'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?>" width="640" height="426" alt="Sondertasten und Tastaturlayout" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">02</div>
                    <h3>Ueberpruefen Sie die Analysen</h3>
                    <p>Oeffnen Sie erweiterte Optionen fuer Heatmap, Statistiken und Ghosting-Test.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/color-system-guide-640.webp'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/color-system-guide-640.png'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/color-system-guide-640.png'); ?>" width="640" height="426" alt="Farbsystem und exportierbare Ergebnisse" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">03</div>
                    <h3>Sitzung exportieren</h3>
                    <p>Laden Sie einen Bericht herunter, um Ihre Diagnosen organisiert zu halten.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Deutscher Tastatur-Tester",
  "description": "Kostenloses Online-Werkzeug zum Testen deutscher Tastaturen",
  "url": "<?php echo url('languages/german/'); ?>",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "Any",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "EUR" },
  "inLanguage": "de"
}
</script>
