<?php
/**
 * French Keyboard Tester - Guidelines Section
 */
?>

<section class="guidelines-section" id="guidelines" aria-labelledby="guidelines-title-fr">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Guide d'Utilisation</p>
            <h2 id="guidelines-title-fr">Comment Utiliser le Testeur de Clavier</h2>
            <p class="section-lede">Suivez ces etapes pour obtenir les meilleurs resultats de votre test de clavier.</p>
        </div>

        <div class="guidelines-grid">
            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                    </svg>
                </div>
                <h3>Testez Toutes les Touches</h3>
                <p>Appuyez sur chaque touche de votre clavier pour verifier qu'elles repondent toutes correctement. Les touches testees changeront de couleur.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                </div>
                <h3>Mesurez la Latence</h3>
                <p>Activez le mode latence pour voir le temps de reponse de chaque touche. Des valeurs plus basses indiquent de meilleures performances.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                        <circle cx="10" cy="10" r="1"/>
                        <circle cx="14" cy="10" r="1"/>
                    </svg>
                </div>
                <h3>Detectez le Ghosting</h3>
                <p>Appuyez sur plusieurs touches simultanement pour detecter les problemes de ghosting. Si une touche n'est pas enregistree, il peut y avoir des limitations materielles.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <path d="M9 9h6v6H9z"/>
                    </svg>
                </div>
                <h3>Verifiez les Touches Bloquees</h3>
                <p>Si une touche reste allumee sans etre pressee, elle peut etre bloquee ou defectueuse. Nettoyez ou remplacez la touche concernee.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                </div>
                <h3>Exportez les Resultats</h3>
                <p>Enregistrez un rapport de votre session de test pour la documentation ou pour le partager avec le support technique.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <h3>Confidentialite Totale</h3>
                <p>Tous les tests s'executent localement dans votre navigateur. Aucune donnee de frappe n'est envoyee a un serveur.</p>
            </article>
        </div>

        <div class="faq-section">
            <h3>Questions Frequentes</h3>
            <div class="faq-grid">
                <details class="faq-item">
                    <summary>Pourquoi certaines touches ne sont-elles pas enregistrees ?</summary>
                    <p>Certaines combinaisons de touches peuvent ne pas etre enregistrees en raison de limitations materielles (ghosting). C'est normal sur les claviers a membrane.</p>
                </details>
                <details class="faq-item">
                    <summary>Que signifient les differentes couleurs ?</summary>
                    <p>Chaque couleur represente un niveau de frappes : cyan (1), dore (2), vert (3), rouge (4), violet (5), puis le cycle se repete.</p>
                </details>
                <details class="faq-item">
                    <summary>Quelle est une bonne latence ?</summary>
                    <p>Une latence inferieure a 50ms est excellente. Entre 50-100ms est acceptable. Plus de 100ms peut indiquer des problemes de connexion ou de materiel.</p>
                </details>
                <details class="faq-item">
                    <summary>Cela fonctionne-t-il avec les claviers Bluetooth ?</summary>
                    <p>Oui, le testeur fonctionne avec tout type de clavier connecte a votre ordinateur, y compris Bluetooth et USB.</p>
                </details>
            </div>
        </div>
    </div>
</section>

<style>
.guidelines-section {
    padding: 80px 0;
    background: var(--bg-secondary, #1a1a24);
}

.guidelines-section .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.guidelines-section .section-head {
    text-align: center;
    margin-bottom: 48px;
}

.guidelines-section .section-kicker {
    font-size: 0.875rem;
    font-weight: 600;
    color: #00d4ff;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 8px;
}

.guidelines-section h2 {
    font-size: clamp(1.8rem, 3vw, 2.4rem);
    color: var(--text-color, #e2e8f0);
    margin-bottom: 12px;
}

.guidelines-section .section-lede {
    color: var(--text-muted, #94a3b8);
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
}

.guidelines-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
    margin-bottom: 60px;
}

.guideline-card {
    background: var(--card-bg, rgba(30, 41, 59, 0.6));
    border: 1px solid var(--card-border, rgba(148, 163, 184, 0.15));
    border-radius: 16px;
    padding: 28px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.guideline-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2);
}

.guideline-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: rgba(0, 212, 255, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    color: #00d4ff;
}

.guideline-card h3 {
    font-size: 1.15rem;
    color: var(--text-color, #e2e8f0);
    margin-bottom: 10px;
}

.guideline-card p {
    color: var(--text-muted, #94a3b8);
    line-height: 1.6;
    font-size: 0.95rem;
}

.faq-section {
    max-width: 800px;
    margin: 0 auto;
}

.faq-section h3 {
    font-size: 1.5rem;
    color: var(--text-color, #e2e8f0);
    text-align: center;
    margin-bottom: 24px;
}

.faq-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.faq-item {
    background: var(--card-bg, rgba(30, 41, 59, 0.6));
    border: 1px solid var(--card-border, rgba(148, 163, 184, 0.15));
    border-radius: 12px;
    overflow: hidden;
}

.faq-item summary {
    padding: 18px 24px;
    cursor: pointer;
    font-weight: 600;
    color: var(--text-color, #e2e8f0);
    list-style: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.faq-item summary::-webkit-details-marker {
    display: none;
}

.faq-item summary::after {
    content: '+';
    font-size: 1.5rem;
    color: #00d4ff;
    transition: transform 0.2s ease;
}

.faq-item[open] summary::after {
    transform: rotate(45deg);
}

.faq-item p {
    padding: 0 24px 18px;
    color: var(--text-muted, #94a3b8);
    line-height: 1.6;
}

@media (max-width: 768px) {
    .guidelines-grid {
        grid-template-columns: 1fr;
    }
}
</style>
