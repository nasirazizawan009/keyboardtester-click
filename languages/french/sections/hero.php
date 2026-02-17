<?php
/**
 * French Keyboard Tester - Hero Section
 */
?>

<section class="landing-hero">
    <div class="container landing-hero-grid">
        <div class="hero-copy">
            <p class="hero-kicker">Outil de Diagnostic de Clavier</p>
            <h1 class="hero-title">Testez Chaque Touche avec un Retour Instantane en Quelques Secondes</h1>
            <p class="hero-lede">Mise en surbrillance instantanee des touches, changement de disposition, test de ghosting et rapports exportables. Sans installation. Sans inscription.</p>
            <div class="hero-actions">
                <a class="landing-btn landing-btn-primary" href="#keyboard-tester">Demarrer le Test de Clavier</a>
                <a class="landing-btn landing-btn-ghost" href="#tools">Explorer Tous les Outils</a>
            </div>
            <div class="hero-badges">
                <span class="hero-badge">Sans Installation</span>
                <span class="hero-badge">Dispositions Multiples</span>
                <span class="hero-badge">Confidentialite Totale</span>
            </div>
            <div class="hero-metrics">
                <div class="metric-card">
                    <span class="metric-value">104+</span>
                    <span class="metric-label">Touches Supportees</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">5</span>
                    <span class="metric-label">Themes Inclus</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">2</span>
                    <span class="metric-label">Systemes d'Exploitation</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="hero-shot">
                <picture>
                    <source type="image/webp" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.webp'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.webp'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <source type="image/png" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.png'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <img src="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?>" width="900" height="600" alt="Interface du testeur de clavier francais" loading="eager" decoding="async" fetchpriority="high">
                </picture>
            </div>
            <div class="hero-stack">
                <div class="mini-card">
                    <div class="mini-title">Diagnostic en Direct</div>
                    <p>Observez les frappes, la densite de la carte thermique et le temps de reponse en temps reel.</p>
                </div>
                <div class="mini-card">
                    <div class="mini-title">Changement de Disposition</div>
                    <p>Changez de disposition et d'etiquettes de systeme d'exploitation sans perdre votre session.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Stage - Above the Fold -->
<section class="tool-stage" aria-labelledby="tool-stage-title-fr">
    <div class="container tool-stage-header">
        <div>
            <p class="section-kicker">Outil Principal</p>
            <h2 id="tool-stage-title-fr">Testeur de Clavier</h2>
            <p class="section-lede">Utilisez l'outil ci-dessous pour tester chaque touche, verifier les dispositions et mesurer la latence.</p>
        </div>
        <div class="tool-stage-actions">
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Voir les Conseils Rapides</a>
        </div>
    </div>
    <div class="tool-shell">
        <?php include __DIR__ . '/tool.php'; ?>
    </div>
</section>

<!-- Trust Strip -->
<section class="trust-strip" aria-label="Caracteristiques principales">
    <div class="container trust-grid">
        <div class="trust-item">
            <div class="trust-title">Sans Installation</div>
            <div class="trust-desc">Fonctionne entierement dans votre navigateur</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Support de Dispositions</div>
            <div class="trust-desc">AZERTY, QWERTY, Colemak, Dvorak</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Diagnostic en Direct</div>
            <div class="trust-desc">Donnees des touches, carte thermique et latence instantanees</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Confidentialite d'Abord</div>
            <div class="trust-desc">Vos donnees ne quittent jamais votre appareil</div>
        </div>
    </div>
</section>

<!-- Feature Band -->
<section class="feature-band" aria-labelledby="feature-title-fr">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Concu pour un Diagnostic Rapide</p>
            <h2 id="feature-title-fr">Tout ce Dont Vous Avez Besoin pour Verifier Votre Clavier</h2>
            <p class="section-lede">Un ensemble d'outils cibles pour les verifications quotidiennes, les tickets de support et le depannage materiel.</p>
        </div>
        <div class="landing-feature-grid">
            <article class="landing-feature-card">
                <h3>Carte des Touches en Direct</h3>
                <p>Observez chaque frappe mise en surbrillance instantanement avec un retour de couleur et un historique des touches.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Ghosting et Latence</h3>
                <p>Mesurez le temps de reponse et detectez les entrees fantomes avec les outils integres.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Support Multi-appareils</h3>
                <p>Changez de disposition et d'etiquettes de systeme d'exploitation a la volee sans quitter la page.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Resultats Exportables</h3>
                <p>Enregistrez un rapport de session pour les notes de controle qualite ou la documentation de support.</p>
            </article>
        </div>
    </div>
</section>

<!-- Process Band -->
<section class="process-band" aria-labelledby="process-title-fr">
    <div class="container">
        <div class="section-head split">
            <div>
                <p class="section-kicker">Flux de Travail Simple</p>
                <h2 id="process-title-fr">Trois Etapes pour Verifier Votre Clavier</h2>
            </div>
            <p class="section-lede">Effectuez une verification complete en moins d'une minute et exportez les resultats si necessaire.</p>
        </div>
        <div class="process-grid">
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/Press-any-key-512.webp'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.webp'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/Press-any-key-512.png'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.png'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/Press-any-key-512.png'); ?>" width="512" height="768" alt="Appuyez sur n'importe quelle touche pour demarrer le test" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">01</div>
                    <h3>Appuyez sur une Touche</h3>
                    <p>Commencez a taper et observez comment la carte des touches repond en temps reel.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/special-keys-layout-640.webp'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?>" width="640" height="426" alt="Touches speciales et disposition du clavier" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">02</div>
                    <h3>Examinez les Statistiques</h3>
                    <p>Ouvrez les options avancees pour la carte thermique, les statistiques et le test de ghosting.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/color-system-guide-640.webp'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/color-system-guide-640.png'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/color-system-guide-640.png'); ?>" width="640" height="426" alt="Systeme de couleurs et resultats exportables" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">03</div>
                    <h3>Exportez la Session</h3>
                    <p>Telechargez un rapport pour garder vos diagnostics organises.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Testeur de Clavier Francais",
  "description": "Outil gratuit pour tester le clavier francais en ligne",
  "url": "<?php echo url('languages/french/'); ?>",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "Any",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" },
  "inLanguage": "fr"
}
</script>
