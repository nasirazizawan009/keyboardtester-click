<?php
/**
 * Keyboard Tester - Advanced Pro Features
 *
 * Adds: NKRO counter, currently-held display, max-simultaneous tracker,
 *       combo presets (WASD+Shift, Q-W-E-R, etc.), dropped-key detection,
 *       polling rate estimate (auto-repeat measurement),
 *       double-fire / debounce detection, per-key actuation timing.
 *
 * Self-contained: own HTML, JS, CSS. Locale-aware via window.KBT_LOCALE.
 * Listens to document-level keydown/keyup additively — won't conflict with
 * existing keyboard tester handlers.
 *
 * Include from keyboard_tester_english.php (and localized variants):
 *   include __DIR__ . '/keyboard-tester-advanced.php';
 */
?>

<!-- Advanced Pro Features panel (toggle button + panel) -->
<button class="feature-button" id="advanced-pro-button" type="button" style="display:none">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M12 2 2 7l10 5 10-5-10-5z"/>
        <path d="m2 17 10 5 10-5"/>
        <path d="m2 12 10 5 10-5"/>
    </svg>
    <span data-i18n="adv.button">Pro Tests</span>
</button>

<div class="stats-panel adv-panel" id="adv-pro-panel" style="display: none;">
    <div class="stats-header">
        <span class="panel-title">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 2 2 7l10 5 10-5-10-5z"/>
                <path d="m2 17 10 5 10-5"/>
                <path d="m2 12 10 5 10-5"/>
            </svg>
            <span data-i18n="adv.title">Pro Diagnostics — Anti-Ghosting, NKRO, Polling, Debounce</span>
        </span>
        <button class="close-btn" id="close-adv-pro" type="button">&times;</button>
    </div>

    <div class="stats-content">

        <!-- HERO: large dominant NKRO display, centered, lots of breathing room -->
        <section class="adv-hero">
            <div class="adv-hero-eyebrow" data-i18n="adv.hero.eyebrow">N-Key Rollover Detected</div>
            <div class="adv-hero-number-wrap">
                <span class="adv-hero-number" id="adv-livebar-nkro-value">0</span>
                <span class="adv-hero-suffix" data-i18n="adv.hero.suffix">keys</span>
            </div>
            <div class="adv-hero-rating" id="adv-nkro-rating">
                <span data-i18n="adv.hero.rating_pending">Hold 4 or more keys at once to detect your keyboard&apos;s capability</span>
            </div>

            <!-- Live "held" indicator: keyboard chip row showing currently-held keys -->
            <div class="adv-hero-chips" id="adv-hero-chips">
                <span class="adv-hero-chips-label" data-i18n="adv.hero.held_now">Pressed right now</span>
                <span class="adv-hero-chips-list" id="adv-hero-chips-list">
                    <span class="adv-hero-empty" data-i18n="adv.hero.held_empty">no keys</span>
                </span>
            </div>
        </section>

        <!-- Supporting stats — three calm cards -->
        <section class="adv-cards">
            <div class="adv-card">
                <div class="adv-card-head">
                    <svg class="adv-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span class="adv-card-label" data-i18n="adv.card.polling">Polling rate</span>
                </div>
                <div class="adv-card-value">
                    <span id="adv-polling-rate">--</span>
                    <span class="adv-card-unit" data-i18n="adv.card.hz">Hz</span>
                </div>
                <div class="adv-card-hint" id="adv-polling-sub" data-i18n="adv.card.polling_hint">Hold one key for 3 seconds</div>
            </div>

            <div class="adv-card">
                <div class="adv-card-head">
                    <svg class="adv-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span class="adv-card-label" data-i18n="adv.card.health">Switch health</span>
                </div>
                <div class="adv-card-value" id="adv-card-health-value">
                    <span data-i18n="adv.card.health_ok">Healthy</span>
                </div>
                <div class="adv-card-hint" id="adv-livebar-health-sub" data-i18n="adv.card.health_hint">No double-fires detected</div>
            </div>

            <div class="adv-card">
                <div class="adv-card-head">
                    <svg class="adv-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M7 12l4-4 4 4 6-6"/></svg>
                    <span class="adv-card-label" data-i18n="adv.card.actuation">Keys profiled</span>
                </div>
                <div class="adv-card-value">
                    <span id="adv-actuation-count">0</span>
                    <span class="adv-card-unit" data-i18n="adv.card.unique">unique</span>
                </div>
                <div class="adv-card-hint" data-i18n="adv.card.actuation_hint">Press &amp; release keys to track actuation timing</div>
            </div>
        </section>

        <!-- Combo presets — each card a small invitation to test -->
        <section class="adv-combos">
            <header class="adv-section-head">
                <h3 class="adv-section-h" data-i18n="adv.combos.title">Test specific combinations</h3>
                <p class="adv-section-p" data-i18n="adv.combos.desc">Tap a combo, then hold the listed keys at once. Green = all registered, red = ghosting detected.</p>
            </header>
            <div class="adv-preset-grid"></div>
            <div class="adv-preset-active" id="adv-preset-active" style="display:none">
                <div class="adv-preset-instructions">
                    <span data-i18n="adv.s2.now_press">Now hold:</span>
                    <span id="adv-preset-keys-required" class="adv-preset-keys-required"></span>
                </div>
                <div class="adv-preset-progress">
                    <span id="adv-preset-progress-text">0/0</span>
                    <span data-i18n="adv.s2.keys_lit">lit</span>
                </div>
                <button class="action-btn" id="adv-preset-cancel" type="button" data-i18n="adv.s2.cancel">Cancel</button>
            </div>
        </section>

        <!-- Optional details, collapsed -->
        <details class="adv-details">
            <summary class="adv-details-summary">
                <span data-i18n="adv.details.title">Detailed measurements</span>
            </summary>
            <div class="adv-details-body">

                <div class="adv-block">
                    <header class="adv-section-head">
                        <h3 class="adv-section-h" data-i18n="adv.block.debounce">Double-fire log</h3>
                        <p class="adv-section-p" data-i18n="adv.block.debounce_desc">Each entry: a key fired twice within 50ms. Sign of a failing switch.</p>
                    </header>
                    <div class="log-container adv-debounce-log" id="adv-debounce-log">
                        <p class="log-placeholder success" data-i18n="adv.s4.no_issues">No double-fire issues detected.</p>
                    </div>
                </div>

                <div class="adv-block">
                    <header class="adv-section-head">
                        <h3 class="adv-section-h" data-i18n="adv.block.actuation">Per-key actuation timing</h3>
                        <p class="adv-section-p" data-i18n="adv.block.actuation_desc">How long each key is held. High max values may indicate sticky keys.</p>
                    </header>
                    <div class="adv-actuation-table-wrap">
                        <table class="adv-actuation-table">
                            <thead>
                                <tr>
                                    <th data-i18n="adv.s5.col_key">Key</th>
                                    <th data-i18n="adv.s5.col_avg">Avg ms</th>
                                    <th data-i18n="adv.s5.col_min">Min</th>
                                    <th data-i18n="adv.s5.col_max">Max</th>
                                    <th data-i18n="adv.s5.col_count">Count</th>
                                </tr>
                            </thead>
                            <tbody id="adv-actuation-tbody">
                                <tr><td colspan="5" class="adv-empty" data-i18n="adv.s5.empty">No data yet — type to populate</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </details>

        <!-- Hidden legacy IDs the JS still references -->
        <div style="display:none" aria-hidden="true">
            <div id="adv-max-nkro">0</div>
            <div id="adv-currently-held-count">0</div>
            <div id="adv-total-combos">0</div>
            <div id="adv-livebar-combos-value">0</div>
            <div id="adv-debounce-suspicious">0</div>
            <div id="adv-debounce-min">--</div>
            <div id="adv-polling-interval">--</div>
            <div id="adv-polling-samples">0</div>
            <div id="adv-polling-status"></div>
            <div id="adv-livebar-health-value">OK</div>
            <div id="adv-livebar-nkro-sub"></div>
            <div id="adv-held-list"></div>
            <div id="adv-livebar-held-value">0</div>
            <div id="adv-livebar-held-sub">—</div>
        </div>

        <!-- Footer actions -->
        <footer class="adv-footer">
            <button class="adv-btn-text" id="adv-reset-all" type="button" data-i18n="adv.actions.reset">Reset</button>
            <button class="adv-btn" id="adv-export" type="button" data-i18n="adv.actions.export">Export report</button>
        </footer>

    </div>
</div>

<?php
$advFloatingHeldClass = !empty($advFloatingHeldManualPlacement) ? ' adv-floating-held-below' : '';
$advFloatingHeldMarkup = '<div id="adv-floating-held" class="adv-floating-held' . $advFloatingHeldClass . '" aria-hidden="true">'
    . '<span class="adv-floating-label" data-i18n="adv.floating.label">Held:</span>'
    . '<span id="adv-floating-list"></span>'
    . '<span class="adv-floating-count" id="adv-floating-count">0</span>'
    . '</div>';
if (empty($advFloatingHeldManualPlacement)) {
    echo $advFloatingHeldMarkup;
}
?>

<style>
/* ===== Pro Diagnostics — Linear/Notion-inspired Clean Design ===== */

#adv-pro-panel {
    /* Restrained palette: warm neutrals + single accent */
    --pn-bg: #0d0e10;
    --pn-bg-card: #15171c;
    --pn-bg-elev: #1c1f26;
    --pn-border: rgba(255, 255, 255, 0.06);
    --pn-border-2: rgba(255, 255, 255, 0.10);
    --pn-text: #e8eaed;
    --pn-text-2: #a8acb6;
    --pn-text-3: #6f7480;
    --pn-accent: #5e6ad2;
    --pn-accent-2: #7c87e8;
    --pn-accent-soft: rgba(94, 106, 210, 0.14);
    --pn-success: #3ecf8e;
    --pn-success-soft: rgba(62, 207, 142, 0.14);
    --pn-danger: #f55;
    --pn-danger-soft: rgba(255, 85, 85, 0.14);
    --pn-r-lg: 14px;
    --pn-r: 10px;
    --pn-r-sm: 7px;
    --pn-shadow: 0 8px 24px rgba(0, 0, 0, 0.18);
    --pn-shadow-lg: 0 24px 64px rgba(0, 0, 0, 0.45);
}

html:not(.dark-theme) #adv-pro-panel,
[data-theme="light"] #adv-pro-panel {
    --pn-bg: #fbfbfc;
    --pn-bg-card: #ffffff;
    --pn-bg-elev: #ffffff;
    --pn-border: rgba(15, 23, 42, 0.07);
    --pn-border-2: rgba(15, 23, 42, 0.14);
    --pn-text: #0f1419;
    --pn-text-2: #5e6573;
    --pn-text-3: #8b919c;
    --pn-accent: #5e6ad2;
    --pn-accent-2: #4452c5;
    --pn-accent-soft: rgba(94, 106, 210, 0.10);
    --pn-success: #0d8b5a;
    --pn-success-soft: rgba(13, 139, 90, 0.08);
    --pn-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
    --pn-shadow-lg: 0 24px 64px rgba(15, 23, 42, 0.10);
}

/* Panel container — slightly wider, calmer chrome */
.adv-panel {
    max-width: 980px !important;
    background: var(--pn-bg) !important;
    border: 1px solid var(--pn-border) !important;
    border-radius: var(--pn-r-lg) !important;
    overflow: hidden !important;
    box-shadow: var(--pn-shadow-lg) !important;
}
.adv-panel .stats-content {
    display: block !important;
    grid-template-columns: 1fr !important;
    padding: 0 !important;
    background: var(--pn-bg) !important;
}
.adv-panel .stats-header {
    background: var(--pn-bg) !important;
    border-bottom: 1px solid var(--pn-border) !important;
    padding: 18px 32px !important;
}
.adv-panel .panel-title {
    color: var(--pn-text) !important;
    font-size: 0.95rem !important;
    font-weight: 600 !important;
    letter-spacing: -0.005em !important;
}
.adv-panel .close-btn {
    color: var(--pn-text-3) !important;
    width: 28px !important;
    height: 28px !important;
    border-radius: 6px !important;
    font-size: 1.2rem !important;
}
.adv-panel .close-btn:hover { background: var(--pn-bg-elev) !important; color: var(--pn-text) !important; }

/* === HERO — generous, calm, dominant === */
.adv-hero {
    padding: 56px 48px 48px;
    text-align: center;
    border-bottom: 1px solid var(--pn-border);
    background: radial-gradient(circle at 50% 0%, var(--pn-accent-soft) 0%, transparent 60%);
}
.adv-hero-eyebrow {
    font-size: 0.72rem;
    color: var(--pn-text-3);
    text-transform: uppercase;
    letter-spacing: 0.14em;
    font-weight: 600;
    margin-bottom: 18px;
}
.adv-hero-number-wrap {
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 16px;
    margin-bottom: 14px;
}
.adv-hero-number {
    font-family: 'JetBrains Mono', 'SF Mono', monospace;
    font-size: 7.5rem;
    font-weight: 700;
    color: var(--pn-text);
    line-height: 0.92;
    letter-spacing: -0.05em;
    transition: color 0.3s, transform 0.3s;
    font-variant-numeric: tabular-nums;
}
.adv-hero-number.adv-pulse {
    color: var(--pn-accent);
    animation: pn-pulse 0.5s ease-out;
}
@keyframes pn-pulse {
    0% { transform: scale(1); }
    35% { transform: scale(1.12); }
    100% { transform: scale(1); }
}
.adv-hero-suffix {
    font-size: 1.4rem;
    color: var(--pn-text-3);
    font-weight: 500;
    letter-spacing: -0.02em;
}
.adv-hero-rating {
    color: var(--pn-text-2);
    font-size: 1rem;
    line-height: 1.5;
    max-width: 540px;
    margin: 0 auto 28px;
}
.adv-hero-rating.adv-rated {
    color: var(--pn-success);
    background: var(--pn-success-soft);
    padding: 8px 18px;
    border-radius: 999px;
    display: inline-block;
    font-weight: 500;
    font-size: 0.92rem;
}
.adv-rating-strong {
    font-family: 'JetBrains Mono', monospace;
    color: var(--pn-success);
    font-weight: 700;
    margin-right: 6px;
}

/* Held-keys chips — keyboard-style chip row */
.adv-hero-chips {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    background: var(--pn-bg-card);
    border: 1px solid var(--pn-border);
    border-radius: 999px;
    max-width: 100%;
    overflow: hidden;
}
.adv-hero-chips-label {
    font-size: 0.7rem;
    color: var(--pn-text-3);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    font-weight: 600;
    flex-shrink: 0;
}
.adv-hero-chips-list {
    display: flex;
    gap: 4px;
    flex-wrap: nowrap;
    overflow: hidden;
}
.adv-hero-empty {
    font-style: italic;
    color: var(--pn-text-3);
    font-size: 0.85rem;
    padding: 0 4px;
}
.adv-hero-chip {
    display: inline-block;
    background: var(--pn-bg-elev);
    border: 1px solid var(--pn-border-2);
    color: var(--pn-text);
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.78rem;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: 5px;
    min-width: 24px;
    text-align: center;
    animation: pn-chip-in 0.15s ease-out;
}
@keyframes pn-chip-in {
    from { opacity: 0; transform: scale(0.85); }
    to { opacity: 1; transform: scale(1); }
}

@media (max-width: 720px) {
    .adv-hero { padding: 36px 24px 32px; }
    .adv-hero-number { font-size: 5rem; }
}

/* === Three supporting cards === */
.adv-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    padding: 24px 32px;
    border-bottom: 1px solid var(--pn-border);
}
.adv-card {
    background: var(--pn-bg-card);
    border: 1px solid var(--pn-border);
    border-radius: var(--pn-r);
    padding: 18px 20px;
    transition: border-color 0.15s;
}
.adv-card:hover { border-color: var(--pn-border-2); }
.adv-card-head {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 12px;
}
.adv-card-icon {
    width: 16px;
    height: 16px;
    color: var(--pn-text-3);
    flex-shrink: 0;
}
.adv-card-label {
    font-size: 0.75rem;
    color: var(--pn-text-3);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-weight: 600;
}
.adv-card-value {
    font-family: 'JetBrains Mono', 'SF Mono', monospace;
    font-size: 1.7rem;
    font-weight: 600;
    color: var(--pn-text);
    line-height: 1.1;
    letter-spacing: -0.02em;
    display: flex;
    align-items: baseline;
    gap: 6px;
    font-variant-numeric: tabular-nums;
}
.adv-card-unit {
    font-size: 0.85rem;
    color: var(--pn-text-3);
    font-weight: 400;
    font-family: inherit;
    letter-spacing: 0;
}
.adv-card-hint {
    margin-top: 6px;
    font-size: 0.78rem;
    color: var(--pn-text-2);
    line-height: 1.4;
}
@media (max-width: 720px) {
    .adv-cards { grid-template-columns: 1fr; padding: 18px 20px; }
}

/* === Combos section === */
.adv-combos { padding: 28px 32px 8px; border-bottom: 1px solid var(--pn-border); }
.adv-section-head { margin-bottom: 16px; }
.adv-section-h {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--pn-text);
    margin: 0 0 4px;
    letter-spacing: -0.005em;
}
.adv-section-p {
    font-size: 0.85rem;
    color: var(--pn-text-2);
    margin: 0;
    line-height: 1.55;
    max-width: 580px;
}

.adv-preset-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(232px, 1fr));
    gap: 10px;
    margin-bottom: 12px;
}
.adv-preset-btn {
    background: var(--pn-bg-card);
    border: 1px solid var(--pn-border);
    border-radius: var(--pn-r);
    padding: 14px 16px;
    text-align: left;
    cursor: pointer;
    transition: all 0.15s;
    font-family: inherit;
    color: var(--pn-text);
}
.adv-preset-btn:hover {
    border-color: var(--pn-accent);
    transform: translateY(-1px);
    box-shadow: var(--pn-shadow);
}
.adv-preset-btn-name {
    display: block;
    font-weight: 600;
    font-size: 0.92rem;
    color: var(--pn-text);
    letter-spacing: -0.005em;
}
.adv-preset-btn-desc {
    display: block;
    font-size: 0.78rem;
    color: var(--pn-text-2);
    margin-top: 4px;
}
.adv-preset-btn-keys {
    display: inline-block;
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.74rem;
    color: var(--pn-accent);
    margin-top: 10px;
    padding: 3px 8px;
    background: var(--pn-accent-soft);
    border-radius: 5px;
    font-weight: 500;
}
.adv-preset-btn.success { border-color: var(--pn-success); background: var(--pn-success-soft); }
.adv-preset-btn.failed { border-color: var(--pn-danger); background: var(--pn-danger-soft); }
.adv-preset-btn-result { display: block; font-size: 0.74rem; margin-top: 8px; font-weight: 500; }
.adv-preset-btn.success .adv-preset-btn-result { color: var(--pn-success); }
.adv-preset-btn.failed .adv-preset-btn-result { color: var(--pn-danger); }

.adv-preset-active {
    background: var(--pn-accent);
    color: white;
    border-radius: var(--pn-r);
    padding: 14px 18px;
    margin-top: 8px;
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
    box-shadow: var(--pn-shadow);
}
.adv-preset-keys-required {
    font-family: 'JetBrains Mono', monospace;
    font-weight: 700;
    margin-left: 6px;
}
.adv-preset-progress {
    background: rgba(255,255,255,0.18);
    border-radius: 999px;
    padding: 4px 12px;
    font-family: 'JetBrains Mono', monospace;
    font-weight: 600;
    font-size: 0.85rem;
}
.adv-preset-active .action-btn {
    background: rgba(255,255,255,0.18);
    border: none;
    color: white;
    padding: 6px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.82rem;
    font-weight: 500;
}

/* === Details collapsible === */
.adv-details {
    border-bottom: 1px solid var(--pn-border);
}
.adv-details-summary {
    cursor: pointer;
    list-style: none;
    padding: 16px 32px;
    color: var(--pn-text-2);
    font-size: 0.88rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 10px;
    user-select: none;
    transition: color 0.15s;
}
.adv-details-summary::-webkit-details-marker { display: none; }
.adv-details-summary::before {
    content: '';
    width: 8px;
    height: 8px;
    border-right: 1.5px solid var(--pn-text-3);
    border-bottom: 1.5px solid var(--pn-text-3);
    transform: rotate(-45deg);
    transition: transform 0.2s;
}
.adv-details[open] .adv-details-summary::before { transform: rotate(45deg); }
.adv-details-summary:hover { color: var(--pn-text); }
.adv-details-body {
    padding: 4px 32px 24px;
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.adv-block { padding: 0; }

/* Debounce log */
.adv-debounce-log {
    background: var(--pn-bg-card);
    border: 1px solid var(--pn-border);
    border-radius: var(--pn-r);
    padding: 10px 14px;
    max-height: 160px;
    overflow-y: auto;
    font-size: 0.85rem;
    margin-top: 12px;
}
.adv-debounce-log .log-placeholder {
    margin: 0;
    color: var(--pn-success);
    font-size: 0.85rem;
}
.adv-debounce-log .log-placeholder::before { content: '✓ '; font-weight: 600; }
.adv-debounce-log p { margin: 4px 0; color: var(--pn-danger); font-family: 'JetBrains Mono', monospace; }

/* Actuation table */
.adv-actuation-table-wrap {
    overflow: hidden;
    background: var(--pn-bg-card);
    border-radius: var(--pn-r);
    border: 1px solid var(--pn-border);
    max-height: 280px;
    overflow-y: auto;
    margin-top: 12px;
}
.adv-actuation-table {
    width: 100% !important;
    border-collapse: collapse !important;
    font-size: 0.86rem !important;
}
.adv-actuation-table th,
.adv-actuation-table td {
    padding: 10px 16px !important;
    text-align: left !important;
    border-bottom: 1px solid var(--pn-border) !important;
}
.adv-actuation-table th {
    background: var(--pn-bg-elev) !important;
    color: var(--pn-text-3) !important;
    font-weight: 600 !important;
    font-size: 0.7rem !important;
    text-transform: uppercase !important;
    letter-spacing: 0.08em !important;
    position: sticky !important;
    top: 0 !important;
}
.adv-actuation-table td { color: var(--pn-text) !important; }
.adv-actuation-table tbody tr:hover { background: var(--pn-bg-elev) !important; }
.adv-actuation-table tbody tr:last-child td { border-bottom: none !important; }
.adv-actuation-table .adv-empty {
    text-align: center !important;
    color: var(--pn-text-3) !important;
    padding: 32px !important;
    font-style: italic;
}
.adv-actuation-table td:first-child {
    font-family: 'JetBrains Mono', monospace !important;
    font-weight: 600 !important;
    color: var(--pn-accent) !important;
}
.adv-actuation-table td:nth-child(2),
.adv-actuation-table td:nth-child(3),
.adv-actuation-table td:nth-child(4),
.adv-actuation-table td:last-child {
    font-family: 'JetBrains Mono', monospace !important;
    color: var(--pn-text) !important;
    font-variant-numeric: tabular-nums;
}

/* === Footer actions === */
.adv-footer {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
    padding: 14px 32px;
    background: var(--pn-bg);
}
.adv-btn-text {
    background: transparent;
    border: none;
    color: var(--pn-text-2);
    padding: 8px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.85rem;
    font-weight: 500;
    transition: color 0.15s, background 0.15s;
    font-family: inherit;
}
.adv-btn-text:hover { color: var(--pn-text); background: var(--pn-bg-elev); }
.adv-btn {
    background: var(--pn-text);
    border: none;
    color: var(--pn-bg);
    padding: 8px 16px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.85rem;
    font-weight: 600;
    transition: opacity 0.15s;
    font-family: inherit;
}
.adv-btn:hover { opacity: 0.9; }

/* === Floating "currently held" pill (kept, restyled) === */
.keyboard-tester .adv-floating-held {
    position: relative;
    width: fit-content;
    min-width: 144px;
    min-height: 42px;
    max-width: calc(100% - 24px);
    margin: 0 auto 14px;
    background: rgba(15, 23, 42, 0.9);
    color: #f8fafc;
    padding: 9px 14px;
    border: 1px solid rgba(148, 163, 184, 0.32);
    border-radius: 12px;
    font-size: 0.82rem;
    font-family: 'JetBrains Mono', monospace;
    z-index: 3;
    display: flex;
    gap: 10px;
    align-items: center;
    justify-content: center;
    pointer-events: none;
    box-shadow: 0 14px 28px rgba(15, 23, 42, 0.2);
    opacity: 0;
    visibility: hidden;
    transform: translateY(2px);
    transition: opacity 0.12s ease, visibility 0.12s ease, transform 0.12s ease;
}
.keyboard-tester .adv-floating-held.is-visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}
.keyboard-tester .adv-floating-held.adv-floating-held-below {
    margin: 14px auto 0;
}
.keyboard-tester #adv-floating-list {
    max-width: 34ch;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.keyboard-tester .adv-floating-label {
    color: rgba(248, 250, 252, 0.72);
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-weight: 600;
}
html:not(.dark-theme) .keyboard-tester .adv-floating-label,
[data-theme="light"] .keyboard-tester .adv-floating-label { color: rgba(248, 250, 252, 0.72); }
.keyboard-tester .adv-floating-count {
    background: #00bcd4;
    color: white;
    border-radius: 999px;
    padding: 2px 9px;
    font-weight: 700;
    font-size: 0.74rem;
}
@media (max-width: 768px) {
    .keyboard-tester .adv-floating-held.adv-floating-held-below {
        display: none;
    }
}
</style>

<script>
(function() {
    'use strict';

    // ============ I18n strings ============
    const ADV_I18N = {
        en: {
            'adv.button': 'Pro Tests',
            'adv.title': 'Pro Diagnostics',
            'adv.tab.s1': 'NKRO', 'adv.tab.s2': 'Combos', 'adv.tab.s3': 'Polling', 'adv.tab.s4': 'Debounce', 'adv.tab.s5': 'Actuation',
            'adv.hero.eyebrow': 'N-Key Rollover Detected',
            'adv.hero.suffix': 'keys',
            'adv.hero.rating_pending': 'Hold 4 or more keys at once to detect your keyboard\'s capability',
            'adv.hero.held_now': 'Pressed right now',
            'adv.hero.held_empty': 'no keys',
            'adv.card.polling': 'Polling rate', 'adv.card.hz': 'Hz',
            'adv.card.polling_hint': 'Hold one key for 3 seconds',
            'adv.card.health': 'Switch health',
            'adv.card.health_ok': 'Healthy', 'adv.card.health_warn': 'Watch',
            'adv.card.health_hint': 'No double-fires detected',
            'adv.card.actuation': 'Keys profiled', 'adv.card.unique': 'unique',
            'adv.card.actuation_hint': 'Press & release keys to track actuation timing',
            'adv.combos.title': 'Test specific combinations',
            'adv.combos.desc': 'Tap a combo, then hold the listed keys at once. Green = all registered, red = ghosting detected.',
            'adv.details.title': 'Detailed measurements',
            'adv.block.debounce': 'Double-fire log',
            'adv.block.debounce_desc': 'Each entry: a key fired twice within 50ms. Sign of a failing switch.',
            'adv.block.actuation': 'Per-key actuation timing',
            'adv.block.actuation_desc': 'How long each key is held. High max values may indicate sticky keys.',
            'adv.livebar.nkro': 'Max NKRO', 'adv.livebar.nkro_sub': 'Hold keys to detect',
            'adv.livebar.held': 'Held now',
            'adv.livebar.combos': 'Combos', 'adv.livebar.combos_sub': 'tested this session',
            'adv.livebar.health': 'Health', 'adv.livebar.health_ok': 'OK', 'adv.livebar.health_warn': 'Warning', 'adv.livebar.health_sub': 'No issues detected',
            'adv.s1.title': 'Anti-Ghosting & N-Key Rollover',
            'adv.s1.desc': 'Hold down as many keys as you can simultaneously. The counter shows your keyboard\'s maximum N-Key Rollover (NKRO). If you hold N keys but only N-1 register, your keyboard has ghosting on that combination.',
            'adv.s1.max': 'Max simultaneous keys',
            'adv.s1.held': 'Currently held',
            'adv.s1.combos': 'Combos tested',
            'adv.s1.held_now': 'Held right now:',
            'adv.s1.held_empty': '(none)',
            'adv.s1.rating_pending': 'Hold 4+ keys at once to estimate your keyboard\'s NKRO capability',
            'adv.s1.rating_2kro': '2KRO — basic / cheap keyboard',
            'adv.s1.rating_3kro': '3KRO — typical membrane',
            'adv.s1.rating_6kro': '6KRO — gaming-class keyboard',
            'adv.s1.rating_nkro': 'Full NKRO — premium gaming/mechanical',
            'adv.s2.title': 'Combo Presets',
            'adv.s2.desc': 'Click a preset to test a specific key combination. Hold all the highlighted keys simultaneously, then release. The result shows whether all keys registered or some were dropped.',
            'adv.s2.now_press': 'Now press and hold:',
            'adv.s2.keys_lit': 'keys lit',
            'adv.s2.cancel': 'Cancel test',
            'adv.s2.success': 'PASS — all keys registered',
            'adv.s2.failed': 'FAIL — keys dropped',
            'adv.s3.title': 'Polling Rate (Auto-Repeat Estimate)',
            'adv.s3.desc': 'Hold down a single key for 3 seconds. We measure the auto-repeat interval to estimate your effective polling rate. Note: this measures OS+browser auto-repeat (typically 30-60Hz), not USB polling (125-1000Hz). Useful for relative comparison between keyboards on the same system.',
            'adv.s3.hz_unit': 'Hz (auto-repeat)',
            'adv.s3.interval': 'Avg interval:',
            'adv.s3.samples': 'Samples:',
            'adv.s3.status_idle': 'Hold any single key for 3 seconds to start measurement',
            'adv.s3.status_measuring': 'Measuring auto-repeat rate...',
            'adv.s3.status_done': 'Measurement complete',
            'adv.s4.title': 'Double-Fire & Debounce Detection',
            'adv.s4.desc': 'Detects suspicious key activity: same key firing twice within the typical debounce window (under 50ms). A failing switch or worn contact often shows up as double-fires under normal typing.',
            'adv.s4.suspicious': 'Suspicious double-fires',
            'adv.s4.min_interval': 'Shortest interval (ms)',
            'adv.s4.no_issues': 'No double-fire issues detected. Type normally to test.',
            'adv.s4.detected': 'Double-fire detected on',
            'adv.s5.title': 'Per-Key Actuation Timing',
            'adv.s5.desc': 'Time between keydown and keyup for each key (how long you hold each press). Outliers can signal sticky keys, slow switches, or unusual typing rhythm.',
            'adv.s5.col_key': 'Key', 'adv.s5.col_avg': 'Avg (ms)', 'adv.s5.col_min': 'Min', 'adv.s5.col_max': 'Max', 'adv.s5.col_count': 'Count',
            'adv.s5.empty': 'Press and release some keys to populate this table',
            'adv.actions.reset': 'Reset all measurements',
            'adv.actions.export': 'Export report',
            'adv.floating.label': 'Held:',
            // Combo preset labels
            'preset.wasd_shift.name': 'WASD + Shift', 'preset.wasd_shift.desc': 'Standard FPS sprint combo',
            'preset.wasd_jump.name': 'WASD + Space', 'preset.wasd_jump.desc': 'Jump while moving',
            'preset.qwer.name': 'Q + W + E + R', 'preset.qwer.desc': 'MOBA top-row spell binds',
            'preset.modifier_stress.name': 'Ctrl + Shift + Alt + A', 'preset.modifier_stress.desc': 'Triple-modifier shortcut',
            'preset.numbers_shift.name': 'Shift + 1, 2, 3, 4, 5', 'preset.numbers_shift.desc': 'Number row + Shift',
            'preset.arrows_modifier.name': 'Ctrl + Shift + Arrows', 'preset.arrows_modifier.desc': 'Multi-line text selection',
            'preset.full_row.name': 'Full home row (8 keys)', 'preset.full_row.desc': 'A-S-D-F-J-K-L-; — tests 8KRO',
            'preset.gaming_pro.name': '6-key gaming combo', 'preset.gaming_pro.desc': 'W, A, D, Shift, Space, E'
        },
        ar: {
            'adv.button': 'اختبارات احترافية',
            'adv.title': 'تشخيص احترافي — مكافحة Ghosting وNKRO ومعدل الاستطلاع',
            'adv.tab.s1': 'NKRO', 'adv.tab.s2': 'تركيبات', 'adv.tab.s3': 'الاستطلاع', 'adv.tab.s4': 'Debounce', 'adv.tab.s5': 'التفعيل',
            'adv.s1.title': 'مكافحة Ghosting وN-Key Rollover',
            'adv.s1.desc': 'اضغط على أكبر عدد ممكن من المفاتيح في وقت واحد. يعرض العداد الحد الأقصى لـ NKRO. إذا ضغطت N مفاتيح ولكن سُجل N-1 فقط، فلوحة المفاتيح بها Ghosting في هذا التركيب.',
            'adv.s1.max': 'الحد الأقصى للمفاتيح المتزامنة',
            'adv.s1.held': 'المضغوط حالياً', 'adv.s1.combos': 'تركيبات مختبرة',
            'adv.s1.held_now': 'مضغوط الآن:', 'adv.s1.held_empty': '(لا شيء)',
            'adv.s1.rating_pending': 'اضغط 4+ مفاتيح في وقت واحد لتقدير قدرة NKRO',
            'adv.s1.rating_2kro': '2KRO — لوحة مفاتيح أساسية',
            'adv.s1.rating_3kro': '3KRO — غشاء نموذجي',
            'adv.s1.rating_6kro': '6KRO — لوحة مفاتيح ألعاب',
            'adv.s1.rating_nkro': 'NKRO كامل — لوحة ألعاب/ميكانيكية فاخرة',
            'adv.s2.title': 'تركيبات معدة مسبقاً',
            'adv.s2.desc': 'انقر على تركيبة لاختبار مجموعة محددة من المفاتيح. اضغط جميع المفاتيح المظللة في وقت واحد ثم حررها.',
            'adv.s2.now_press': 'اضغط الآن:', 'adv.s2.keys_lit': 'مفاتيح مضاءة', 'adv.s2.cancel': 'إلغاء',
            'adv.s2.success': 'نجح — جميع المفاتيح مسجلة',
            'adv.s2.failed': 'فشل — مفاتيح مفقودة',
            'adv.s3.title': 'معدل الاستطلاع (تقدير التكرار التلقائي)',
            'adv.s3.desc': 'اضغط مفتاحاً واحداً مدة 3 ثوان. نقيس فترة التكرار التلقائي لتقدير معدل الاستطلاع.',
            'adv.s3.hz_unit': 'هرتز', 'adv.s3.interval': 'متوسط الفترة:', 'adv.s3.samples': 'العينات:',
            'adv.s3.status_idle': 'اضغط أي مفتاح مدة 3 ثوان لبدء القياس',
            'adv.s3.status_measuring': 'جاري قياس معدل التكرار التلقائي...',
            'adv.s3.status_done': 'اكتمل القياس',
            'adv.s4.title': 'كشف الإطلاق المزدوج (Debounce)',
            'adv.s4.desc': 'يكتشف نشاط مشبوه للمفاتيح: نفس المفتاح يطلق مرتين خلال نافذة Debounce (أقل من 50 مللي ثانية).',
            'adv.s4.suspicious': 'إطلاقات مزدوجة مشبوهة',
            'adv.s4.min_interval': 'أقصر فترة (مللي ثانية)',
            'adv.s4.no_issues': 'لم يتم اكتشاف مشاكل إطلاق مزدوج. اكتب بشكل عادي للاختبار.',
            'adv.s4.detected': 'تم اكتشاف إطلاق مزدوج على',
            'adv.s5.title': 'توقيت تفعيل كل مفتاح',
            'adv.s5.desc': 'الوقت بين keydown وkeyup لكل مفتاح (مدة الضغط).',
            'adv.s5.col_key': 'مفتاح', 'adv.s5.col_avg': 'متوسط (م.ث)', 'adv.s5.col_min': 'أدنى', 'adv.s5.col_max': 'أقصى', 'adv.s5.col_count': 'عدد',
            'adv.s5.empty': 'اضغط وحرر بعض المفاتيح لملء هذا الجدول',
            'adv.actions.reset': 'إعادة تعيين جميع القياسات',
            'adv.actions.export': 'تصدير التقرير',
            'adv.floating.label': 'مضغوط:',
            'preset.wasd_shift.name': 'WASD + Shift', 'preset.wasd_shift.desc': 'تركيبة جري FPS قياسية',
            'preset.wasd_jump.name': 'WASD + مسافة', 'preset.wasd_jump.desc': 'القفز أثناء الحركة',
            'preset.qwer.name': 'Q + W + E + R', 'preset.qwer.desc': 'مهارات MOBA',
            'preset.modifier_stress.name': 'Ctrl + Shift + Alt + A', 'preset.modifier_stress.desc': 'اختصار ثلاثي المعدلات',
            'preset.numbers_shift.name': 'Shift + 1، 2، 3، 4، 5', 'preset.numbers_shift.desc': 'صف الأرقام + Shift',
            'preset.arrows_modifier.name': 'Ctrl + Shift + الأسهم', 'preset.arrows_modifier.desc': 'تحديد نص متعدد الأسطر',
            'preset.full_row.name': 'صف الأساس الكامل (8 مفاتيح)', 'preset.full_row.desc': 'A-S-D-F-J-K-L-؛ — يختبر 8KRO',
            'preset.gaming_pro.name': 'تركيبة ألعاب سداسية', 'preset.gaming_pro.desc': 'W، A، D، Shift، مسافة، E'
        },
        es: {
            'adv.button': 'Pruebas Pro',
            'adv.title': 'Diagnóstico Pro — Anti-Ghosting, NKRO, Polling, Debounce',
            'adv.tab.s1': 'NKRO', 'adv.tab.s2': 'Combos', 'adv.tab.s3': 'Polling', 'adv.tab.s4': 'Debounce', 'adv.tab.s5': 'Actuación',
            'adv.s1.title': 'Anti-Ghosting y N-Key Rollover',
            'adv.s1.desc': 'Mantén pulsadas tantas teclas como puedas simultáneamente. El contador muestra el NKRO máximo de tu teclado.',
            'adv.s1.max': 'Máx. teclas simultáneas',
            'adv.s1.held': 'Pulsadas ahora', 'adv.s1.combos': 'Combos probados',
            'adv.s1.held_now': 'Pulsadas ahora:', 'adv.s1.held_empty': '(ninguna)',
            'adv.s1.rating_pending': 'Mantén 4+ teclas a la vez para estimar el NKRO',
            'adv.s1.rating_2kro': '2KRO — teclado básico',
            'adv.s1.rating_3kro': '3KRO — membrana típica',
            'adv.s1.rating_6kro': '6KRO — clase gaming',
            'adv.s1.rating_nkro': 'NKRO completo — gaming/mecánico premium',
            'adv.s2.title': 'Combos Predefinidos',
            'adv.s2.desc': 'Haz clic en un combo para probar una combinación de teclas específica.',
            'adv.s2.now_press': 'Pulsa y mantén:', 'adv.s2.keys_lit': 'teclas activas', 'adv.s2.cancel': 'Cancelar',
            'adv.s2.success': 'PASA — todas las teclas registradas',
            'adv.s2.failed': 'FALLO — teclas perdidas',
            'adv.s3.title': 'Tasa de Polling (Estimación)',
            'adv.s3.desc': 'Mantén una sola tecla durante 3 segundos. Medimos el intervalo de auto-repetición.',
            'adv.s3.hz_unit': 'Hz', 'adv.s3.interval': 'Intervalo medio:', 'adv.s3.samples': 'Muestras:',
            'adv.s3.status_idle': 'Mantén cualquier tecla 3 segundos para empezar',
            'adv.s3.status_measuring': 'Midiendo tasa de auto-repetición...',
            'adv.s3.status_done': 'Medición completada',
            'adv.s4.title': 'Detección de Doble Disparo (Debounce)',
            'adv.s4.desc': 'Detecta actividad sospechosa: la misma tecla se dispara dos veces en la ventana de debounce (menos de 50ms).',
            'adv.s4.suspicious': 'Doble disparos sospechosos',
            'adv.s4.min_interval': 'Intervalo más corto (ms)',
            'adv.s4.no_issues': 'No se detectaron doble disparos. Escribe normalmente para probar.',
            'adv.s4.detected': 'Doble disparo detectado en',
            'adv.s5.title': 'Tiempo de Actuación por Tecla',
            'adv.s5.desc': 'Tiempo entre keydown y keyup para cada tecla.',
            'adv.s5.col_key': 'Tecla', 'adv.s5.col_avg': 'Medio (ms)', 'adv.s5.col_min': 'Mín', 'adv.s5.col_max': 'Máx', 'adv.s5.col_count': 'Cuenta',
            'adv.s5.empty': 'Pulsa y suelta teclas para rellenar la tabla',
            'adv.actions.reset': 'Resetear medidas',
            'adv.actions.export': 'Exportar informe',
            'adv.floating.label': 'Pulsadas:',
            'preset.wasd_shift.name': 'WASD + Shift', 'preset.wasd_shift.desc': 'Sprint FPS estándar',
            'preset.wasd_jump.name': 'WASD + Espacio', 'preset.wasd_jump.desc': 'Salto en movimiento',
            'preset.qwer.name': 'Q + W + E + R', 'preset.qwer.desc': 'Hechizos MOBA',
            'preset.modifier_stress.name': 'Ctrl + Shift + Alt + A', 'preset.modifier_stress.desc': 'Atajo triple modificador',
            'preset.numbers_shift.name': 'Shift + 1-5', 'preset.numbers_shift.desc': 'Fila de números + Shift',
            'preset.arrows_modifier.name': 'Ctrl + Shift + Flechas', 'preset.arrows_modifier.desc': 'Selección multi-línea',
            'preset.full_row.name': 'Fila base completa (8)', 'preset.full_row.desc': 'A-S-D-F-J-K-L-Ñ — prueba 8KRO',
            'preset.gaming_pro.name': 'Combo gaming 6-key', 'preset.gaming_pro.desc': 'W, A, D, Shift, Espacio, E'
        },
        fr: {
            'adv.button': 'Tests Pro',
            'adv.title': 'Diagnostic Pro — Anti-Ghosting, NKRO, Polling, Debounce',
            'adv.tab.s1': 'NKRO', 'adv.tab.s2': 'Combos', 'adv.tab.s3': 'Polling', 'adv.tab.s4': 'Debounce', 'adv.tab.s5': 'Actuation',
            'adv.s1.title': 'Anti-Ghosting et N-Key Rollover',
            'adv.s1.desc': 'Maintenez autant de touches que possible simultanément. Le compteur affiche le NKRO maximum de votre clavier.',
            'adv.s1.max': 'Touches simult. max', 'adv.s1.held': 'Maintenues', 'adv.s1.combos': 'Combos testés',
            'adv.s1.held_now': 'Maintenues:', 'adv.s1.held_empty': '(aucune)',
            'adv.s1.rating_pending': 'Maintenez 4+ touches pour estimer le NKRO',
            'adv.s1.rating_2kro': '2KRO — clavier basique', 'adv.s1.rating_3kro': '3KRO — membrane typique',
            'adv.s1.rating_6kro': '6KRO — gaming', 'adv.s1.rating_nkro': 'NKRO complet — premium',
            'adv.s2.title': 'Combos Prédéfinis',
            'adv.s2.desc': 'Cliquez un combo pour tester une combinaison de touches.',
            'adv.s2.now_press': 'Appuyez et maintenez:', 'adv.s2.keys_lit': 'touches allumées', 'adv.s2.cancel': 'Annuler',
            'adv.s2.success': 'OK — toutes touches enregistrées', 'adv.s2.failed': 'ÉCHEC — touches perdues',
            'adv.s3.title': 'Taux de Polling (Estimation)',
            'adv.s3.desc': 'Maintenez une seule touche 3 secondes. Nous mesurons l\'intervalle d\'auto-répétition.',
            'adv.s3.hz_unit': 'Hz', 'adv.s3.interval': 'Intervalle moyen:', 'adv.s3.samples': 'Échantillons:',
            'adv.s3.status_idle': 'Maintenez une touche 3 secondes',
            'adv.s3.status_measuring': 'Mesure en cours...', 'adv.s3.status_done': 'Mesure terminée',
            'adv.s4.title': 'Détection Double-Fire (Debounce)',
            'adv.s4.desc': 'Détecte une touche qui se déclenche deux fois dans la fenêtre de debounce.',
            'adv.s4.suspicious': 'Doubles déclenchements suspects', 'adv.s4.min_interval': 'Intervalle le plus court (ms)',
            'adv.s4.no_issues': 'Aucun double-fire détecté. Tapez normalement pour tester.',
            'adv.s4.detected': 'Double-fire détecté sur',
            'adv.s5.title': 'Temps d\'Actuation par Touche',
            'adv.s5.desc': 'Temps entre keydown et keyup pour chaque touche.',
            'adv.s5.col_key': 'Touche', 'adv.s5.col_avg': 'Moy. (ms)', 'adv.s5.col_min': 'Min', 'adv.s5.col_max': 'Max', 'adv.s5.col_count': 'Nb',
            'adv.s5.empty': 'Appuyez et relâchez quelques touches',
            'adv.actions.reset': 'Réinitialiser', 'adv.actions.export': 'Exporter le rapport',
            'adv.floating.label': 'Maintenues:',
            'preset.wasd_shift.name': 'WASD + Shift', 'preset.wasd_shift.desc': 'Sprint FPS standard',
            'preset.wasd_jump.name': 'WASD + Espace', 'preset.wasd_jump.desc': 'Saut en mouvement',
            'preset.qwer.name': 'Q + W + E + R', 'preset.qwer.desc': 'Sorts MOBA',
            'preset.modifier_stress.name': 'Ctrl + Shift + Alt + A', 'preset.modifier_stress.desc': 'Triple modificateur',
            'preset.numbers_shift.name': 'Shift + 1-5', 'preset.numbers_shift.desc': 'Rangée de chiffres',
            'preset.arrows_modifier.name': 'Ctrl + Shift + Flèches', 'preset.arrows_modifier.desc': 'Sélection multi-ligne',
            'preset.full_row.name': 'Rangée complète (8)', 'preset.full_row.desc': 'A-S-D-F-J-K-L-M — teste 8KRO',
            'preset.gaming_pro.name': 'Combo gaming 6-touches', 'preset.gaming_pro.desc': 'W, A, D, Shift, Espace, E'
        },
        de: {
            'adv.button': 'Pro Tests',
            'adv.title': 'Pro-Diagnose — Anti-Ghosting, NKRO, Polling, Debounce',
            'adv.tab.s1': 'NKRO', 'adv.tab.s2': 'Combos', 'adv.tab.s3': 'Polling', 'adv.tab.s4': 'Debounce', 'adv.tab.s5': 'Aktuierung',
            'adv.s1.title': 'Anti-Ghosting & N-Key Rollover',
            'adv.s1.desc': 'Halten Sie so viele Tasten wie möglich gleichzeitig gedrückt. Der Zähler zeigt das maximale NKRO Ihrer Tastatur.',
            'adv.s1.max': 'Max. gleichzeitige Tasten', 'adv.s1.held': 'Aktuell gedrückt', 'adv.s1.combos': 'Combos getestet',
            'adv.s1.held_now': 'Gerade gedrückt:', 'adv.s1.held_empty': '(keine)',
            'adv.s1.rating_pending': 'Halten Sie 4+ Tasten gleichzeitig zur NKRO-Schätzung',
            'adv.s1.rating_2kro': '2KRO — einfache Tastatur', 'adv.s1.rating_3kro': '3KRO — typische Membran',
            'adv.s1.rating_6kro': '6KRO — Gaming-Klasse', 'adv.s1.rating_nkro': 'Volles NKRO — Premium',
            'adv.s2.title': 'Combo-Vorlagen',
            'adv.s2.desc': 'Klicken Sie einen Combo, um eine Tastenkombination zu testen.',
            'adv.s2.now_press': 'Drücken und halten:', 'adv.s2.keys_lit': 'Tasten aktiv', 'adv.s2.cancel': 'Abbrechen',
            'adv.s2.success': 'BESTANDEN — alle Tasten registriert', 'adv.s2.failed': 'FEHLER — Tasten verloren',
            'adv.s3.title': 'Polling-Rate (Auto-Repeat-Schätzung)',
            'adv.s3.desc': 'Halten Sie eine Taste 3 Sekunden gedrückt. Wir messen das Auto-Repeat-Intervall.',
            'adv.s3.hz_unit': 'Hz', 'adv.s3.interval': 'Ø Intervall:', 'adv.s3.samples': 'Proben:',
            'adv.s3.status_idle': 'Halten Sie eine Taste 3 Sekunden zur Messung',
            'adv.s3.status_measuring': 'Auto-Repeat-Rate wird gemessen...', 'adv.s3.status_done': 'Messung abgeschlossen',
            'adv.s4.title': 'Double-Fire & Debounce-Erkennung',
            'adv.s4.desc': 'Erkennt verdächtiges Verhalten: Taste feuert zweimal innerhalb des Debounce-Fensters.',
            'adv.s4.suspicious': 'Verdächtige Double-Fires', 'adv.s4.min_interval': 'Kürzestes Intervall (ms)',
            'adv.s4.no_issues': 'Keine Double-Fires erkannt. Tippen Sie normal zum Testen.',
            'adv.s4.detected': 'Double-Fire erkannt auf',
            'adv.s5.title': 'Pro-Taste Aktuierungszeit',
            'adv.s5.desc': 'Zeit zwischen keydown und keyup für jede Taste.',
            'adv.s5.col_key': 'Taste', 'adv.s5.col_avg': 'Ø (ms)', 'adv.s5.col_min': 'Min', 'adv.s5.col_max': 'Max', 'adv.s5.col_count': 'Anzahl',
            'adv.s5.empty': 'Drücken und loslassen Sie einige Tasten',
            'adv.actions.reset': 'Alle Messungen zurücksetzen', 'adv.actions.export': 'Bericht exportieren',
            'adv.floating.label': 'Gedrückt:',
            'preset.wasd_shift.name': 'WASD + Shift', 'preset.wasd_shift.desc': 'FPS-Sprint Standard',
            'preset.wasd_jump.name': 'WASD + Leertaste', 'preset.wasd_jump.desc': 'Sprung in Bewegung',
            'preset.qwer.name': 'Q + W + E + R', 'preset.qwer.desc': 'MOBA-Spells',
            'preset.modifier_stress.name': 'Strg + Shift + Alt + A', 'preset.modifier_stress.desc': 'Dreifach-Modifier',
            'preset.numbers_shift.name': 'Shift + 1-5', 'preset.numbers_shift.desc': 'Zahlenreihe + Shift',
            'preset.arrows_modifier.name': 'Strg + Shift + Pfeile', 'preset.arrows_modifier.desc': 'Mehrzeilige Auswahl',
            'preset.full_row.name': 'Volle Grundreihe (8)', 'preset.full_row.desc': 'A-S-D-F-J-K-L-Ö — testet 8KRO',
            'preset.gaming_pro.name': '6-Tasten Gaming-Combo', 'preset.gaming_pro.desc': 'W, A, D, Shift, Leertaste, E'
        },
        ja: {
            'adv.button': 'プロ診断',
            'adv.title': 'プロ診断 — ゴースト、NKRO、ポーリングレート、デバウンス',
            'adv.tab.s1': 'NKRO', 'adv.tab.s2': 'コンボ', 'adv.tab.s3': 'ポーリング', 'adv.tab.s4': 'Debounce', 'adv.tab.s5': 'アクチュエーション',
            'adv.s1.title': 'アンチゴースト & N-Key Rollover',
            'adv.s1.desc': 'できるだけ多くのキーを同時に押し続けてください。カウンターが最大NKROを表示します。',
            'adv.s1.max': '最大同時押しキー数', 'adv.s1.held': '現在押下中', 'adv.s1.combos': 'テスト数',
            'adv.s1.held_now': '現在押下:', 'adv.s1.held_empty': '(なし)',
            'adv.s1.rating_pending': '4キー以上同時押しでNKRO推定',
            'adv.s1.rating_2kro': '2KRO — 基本キーボード', 'adv.s1.rating_3kro': '3KRO — メンブレン',
            'adv.s1.rating_6kro': '6KRO — ゲーミングクラス', 'adv.s1.rating_nkro': '完全NKRO — プレミアム',
            'adv.s2.title': 'コンボプリセット',
            'adv.s2.desc': 'プリセットをクリックして特定のキー組み合わせをテストします。',
            'adv.s2.now_press': '押し続けて:', 'adv.s2.keys_lit': 'キー点灯', 'adv.s2.cancel': 'キャンセル',
            'adv.s2.success': '合格 — 全キー登録', 'adv.s2.failed': '失敗 — キー欠落',
            'adv.s3.title': 'ポーリングレート (自動リピート推定)',
            'adv.s3.desc': '1キーを3秒押し続けます。自動リピート間隔を測定します。',
            'adv.s3.hz_unit': 'Hz', 'adv.s3.interval': '平均間隔:', 'adv.s3.samples': 'サンプル:',
            'adv.s3.status_idle': 'キーを3秒押し続けて測定開始',
            'adv.s3.status_measuring': '自動リピート測定中...', 'adv.s3.status_done': '測定完了',
            'adv.s4.title': 'ダブルファイア / デバウンス検出',
            'adv.s4.desc': '同じキーがデバウンスウィンドウ内で2回発火する不審な動作を検出。',
            'adv.s4.suspicious': '不審なダブルファイア', 'adv.s4.min_interval': '最短間隔 (ms)',
            'adv.s4.no_issues': 'ダブルファイア未検出。通常通りタイプしてテスト。',
            'adv.s4.detected': 'ダブルファイア検出:',
            'adv.s5.title': 'キー別アクチュエーション時間',
            'adv.s5.desc': '各キーのkeydownからkeyupまでの時間。',
            'adv.s5.col_key': 'キー', 'adv.s5.col_avg': '平均(ms)', 'adv.s5.col_min': '最小', 'adv.s5.col_max': '最大', 'adv.s5.col_count': '回数',
            'adv.s5.empty': 'いくつかのキーを押して離してください',
            'adv.actions.reset': '全測定リセット', 'adv.actions.export': 'レポート出力',
            'adv.floating.label': '押下:',
            'preset.wasd_shift.name': 'WASD + Shift', 'preset.wasd_shift.desc': 'FPSスプリント',
            'preset.wasd_jump.name': 'WASD + スペース', 'preset.wasd_jump.desc': '移動中ジャンプ',
            'preset.qwer.name': 'Q + W + E + R', 'preset.qwer.desc': 'MOBAスペル',
            'preset.modifier_stress.name': 'Ctrl + Shift + Alt + A', 'preset.modifier_stress.desc': 'トリプル修飾',
            'preset.numbers_shift.name': 'Shift + 1-5', 'preset.numbers_shift.desc': '数字行+Shift',
            'preset.arrows_modifier.name': 'Ctrl + Shift + 矢印', 'preset.arrows_modifier.desc': '複数行選択',
            'preset.full_row.name': 'ホームロー全体 (8)', 'preset.full_row.desc': 'A-S-D-F-J-K-L-; — 8KRO',
            'preset.gaming_pro.name': '6キーゲーミング', 'preset.gaming_pro.desc': 'W, A, D, Shift, スペース, E'
        },
        ko: {
            'adv.button': '프로 테스트',
            'adv.title': '프로 진단 — 안티-고스팅, NKRO, 폴링, 디바운스',
            'adv.tab.s1': 'NKRO', 'adv.tab.s2': '콤보', 'adv.tab.s3': '폴링', 'adv.tab.s4': 'Debounce', 'adv.tab.s5': '액추에이션',
            'adv.s1.title': '안티-고스팅 & N-Key Rollover',
            'adv.s1.desc': '가능한 한 많은 키를 동시에 누르세요. 카운터가 키보드의 최대 NKRO를 표시합니다.',
            'adv.s1.max': '최대 동시 입력 키', 'adv.s1.held': '현재 누름', 'adv.s1.combos': '테스트 수',
            'adv.s1.held_now': '현재 누른 키:', 'adv.s1.held_empty': '(없음)',
            'adv.s1.rating_pending': '4개 이상 동시 누름으로 NKRO 추정',
            'adv.s1.rating_2kro': '2KRO — 기본 키보드', 'adv.s1.rating_3kro': '3KRO — 멤브레인',
            'adv.s1.rating_6kro': '6KRO — 게이밍 등급', 'adv.s1.rating_nkro': '완전 NKRO — 프리미엄',
            'adv.s2.title': '콤보 프리셋',
            'adv.s2.desc': '프리셋을 클릭하여 특정 키 조합을 테스트합니다.',
            'adv.s2.now_press': '누르고 유지:', 'adv.s2.keys_lit': '키 활성', 'adv.s2.cancel': '취소',
            'adv.s2.success': '통과 — 모든 키 등록', 'adv.s2.failed': '실패 — 키 누락',
            'adv.s3.title': '폴링 레이트 (자동 반복 추정)',
            'adv.s3.desc': '단일 키를 3초간 누르세요. 자동 반복 간격을 측정합니다.',
            'adv.s3.hz_unit': 'Hz', 'adv.s3.interval': '평균 간격:', 'adv.s3.samples': '샘플:',
            'adv.s3.status_idle': '키를 3초간 누르면 측정 시작',
            'adv.s3.status_measuring': '자동 반복 측정 중...', 'adv.s3.status_done': '측정 완료',
            'adv.s4.title': '더블파이어 / 디바운스 감지',
            'adv.s4.desc': '같은 키가 디바운스 윈도우 내에서 두 번 발사되는 의심스러운 활동 감지.',
            'adv.s4.suspicious': '의심스러운 더블파이어', 'adv.s4.min_interval': '최단 간격 (ms)',
            'adv.s4.no_issues': '더블파이어 미감지. 일반적으로 입력하여 테스트.',
            'adv.s4.detected': '더블파이어 감지:',
            'adv.s5.title': '키별 액추에이션 타이밍',
            'adv.s5.desc': '각 키의 keydown과 keyup 사이 시간.',
            'adv.s5.col_key': '키', 'adv.s5.col_avg': '평균(ms)', 'adv.s5.col_min': '최소', 'adv.s5.col_max': '최대', 'adv.s5.col_count': '횟수',
            'adv.s5.empty': '몇 개 키를 누르고 떼어 주세요',
            'adv.actions.reset': '모든 측정 초기화', 'adv.actions.export': '리포트 내보내기',
            'adv.floating.label': '누름:',
            'preset.wasd_shift.name': 'WASD + Shift', 'preset.wasd_shift.desc': 'FPS 스프린트',
            'preset.wasd_jump.name': 'WASD + 스페이스', 'preset.wasd_jump.desc': '이동 중 점프',
            'preset.qwer.name': 'Q + W + E + R', 'preset.qwer.desc': 'MOBA 스킬',
            'preset.modifier_stress.name': 'Ctrl + Shift + Alt + A', 'preset.modifier_stress.desc': '트리플 수정자',
            'preset.numbers_shift.name': 'Shift + 1-5', 'preset.numbers_shift.desc': '숫자 행 + Shift',
            'preset.arrows_modifier.name': 'Ctrl + Shift + 화살표', 'preset.arrows_modifier.desc': '다줄 선택',
            'preset.full_row.name': '홈 행 전체 (8)', 'preset.full_row.desc': 'A-S-D-F-J-K-L-; — 8KRO',
            'preset.gaming_pro.name': '6키 게이밍 콤보', 'preset.gaming_pro.desc': 'W, A, D, Shift, 스페이스, E'
        },
        pt: {
            'adv.button': 'Testes Pro',
            'adv.title': 'Diagnóstico Pro — Anti-Ghosting, NKRO, Polling, Debounce',
            'adv.tab.s1': 'NKRO', 'adv.tab.s2': 'Combos', 'adv.tab.s3': 'Polling', 'adv.tab.s4': 'Debounce', 'adv.tab.s5': 'Atuação',
            'adv.s1.title': 'Anti-Ghosting e N-Key Rollover',
            'adv.s1.desc': 'Pressione o máximo de teclas simultaneamente. O contador mostra o NKRO máximo do seu teclado.',
            'adv.s1.max': 'Máx. teclas simultâneas', 'adv.s1.held': 'Pressionadas', 'adv.s1.combos': 'Combos testados',
            'adv.s1.held_now': 'Pressionadas agora:', 'adv.s1.held_empty': '(nenhuma)',
            'adv.s1.rating_pending': 'Pressione 4+ teclas para estimar o NKRO',
            'adv.s1.rating_2kro': '2KRO — teclado básico', 'adv.s1.rating_3kro': '3KRO — membrana típica',
            'adv.s1.rating_6kro': '6KRO — classe gaming', 'adv.s1.rating_nkro': 'NKRO completo — premium',
            'adv.s2.title': 'Combos Predefinidos',
            'adv.s2.desc': 'Clique em um combo para testar uma combinação específica.',
            'adv.s2.now_press': 'Pressione e segure:', 'adv.s2.keys_lit': 'teclas acesas', 'adv.s2.cancel': 'Cancelar',
            'adv.s2.success': 'PASSOU — todas registradas', 'adv.s2.failed': 'FALHOU — teclas perdidas',
            'adv.s3.title': 'Taxa de Polling (Estimativa)',
            'adv.s3.desc': 'Mantenha uma tecla por 3 segundos. Medimos o intervalo de auto-repetição.',
            'adv.s3.hz_unit': 'Hz', 'adv.s3.interval': 'Intervalo médio:', 'adv.s3.samples': 'Amostras:',
            'adv.s3.status_idle': 'Mantenha qualquer tecla por 3 segundos',
            'adv.s3.status_measuring': 'Medindo auto-repetição...', 'adv.s3.status_done': 'Medição completa',
            'adv.s4.title': 'Detecção Double-Fire (Debounce)',
            'adv.s4.desc': 'Detecta tecla que dispara duas vezes na janela de debounce.',
            'adv.s4.suspicious': 'Double-fires suspeitos', 'adv.s4.min_interval': 'Intervalo mais curto (ms)',
            'adv.s4.no_issues': 'Sem double-fires. Digite normalmente para testar.',
            'adv.s4.detected': 'Double-fire detectado em',
            'adv.s5.title': 'Tempo de Atuação por Tecla',
            'adv.s5.desc': 'Tempo entre keydown e keyup para cada tecla.',
            'adv.s5.col_key': 'Tecla', 'adv.s5.col_avg': 'Médio (ms)', 'adv.s5.col_min': 'Mín', 'adv.s5.col_max': 'Máx', 'adv.s5.col_count': 'Contagem',
            'adv.s5.empty': 'Pressione e solte algumas teclas',
            'adv.actions.reset': 'Resetar medidas', 'adv.actions.export': 'Exportar relatório',
            'adv.floating.label': 'Pressionadas:',
            'preset.wasd_shift.name': 'WASD + Shift', 'preset.wasd_shift.desc': 'Sprint FPS padrão',
            'preset.wasd_jump.name': 'WASD + Espaço', 'preset.wasd_jump.desc': 'Pulo em movimento',
            'preset.qwer.name': 'Q + W + E + R', 'preset.qwer.desc': 'Magias MOBA',
            'preset.modifier_stress.name': 'Ctrl + Shift + Alt + A', 'preset.modifier_stress.desc': 'Triplo modificador',
            'preset.numbers_shift.name': 'Shift + 1-5', 'preset.numbers_shift.desc': 'Linha de números',
            'preset.arrows_modifier.name': 'Ctrl + Shift + Setas', 'preset.arrows_modifier.desc': 'Seleção multi-linha',
            'preset.full_row.name': 'Linha base completa (8)', 'preset.full_row.desc': 'A-S-D-F-J-K-L-Ç — testa 8KRO',
            'preset.gaming_pro.name': 'Combo gaming 6 teclas', 'preset.gaming_pro.desc': 'W, A, D, Shift, Espaço, E'
        },
        ru: {
            'adv.button': 'Про-тесты',
            'adv.title': 'Про-диагностика — Анти-Ghosting, NKRO, Polling, Debounce',
            'adv.tab.s1': 'NKRO', 'adv.tab.s2': 'Комбо', 'adv.tab.s3': 'Polling', 'adv.tab.s4': 'Debounce', 'adv.tab.s5': 'Срабатывание',
            'adv.s1.title': 'Анти-Ghosting и N-Key Rollover',
            'adv.s1.desc': 'Удерживайте как можно больше клавиш одновременно. Счётчик показывает максимальный NKRO.',
            'adv.s1.max': 'Макс. одновременных клавиш', 'adv.s1.held': 'Сейчас нажато', 'adv.s1.combos': 'Протестировано',
            'adv.s1.held_now': 'Нажато сейчас:', 'adv.s1.held_empty': '(ничего)',
            'adv.s1.rating_pending': 'Удерживайте 4+ клавиши для оценки NKRO',
            'adv.s1.rating_2kro': '2KRO — базовая клавиатура', 'adv.s1.rating_3kro': '3KRO — мембрана',
            'adv.s1.rating_6kro': '6KRO — игровой класс', 'adv.s1.rating_nkro': 'Полный NKRO — премиум',
            'adv.s2.title': 'Готовые комбинации',
            'adv.s2.desc': 'Нажмите комбинацию для тестирования.',
            'adv.s2.now_press': 'Нажмите и удерживайте:', 'adv.s2.keys_lit': 'клавиш горит', 'adv.s2.cancel': 'Отмена',
            'adv.s2.success': 'УСПЕХ — все клавиши зарегистрированы', 'adv.s2.failed': 'ПРОВАЛ — потеряны клавиши',
            'adv.s3.title': 'Частота опроса (оценка авто-повтора)',
            'adv.s3.desc': 'Удерживайте одну клавишу 3 секунды. Измеряем интервал авто-повтора.',
            'adv.s3.hz_unit': 'Гц', 'adv.s3.interval': 'Средний интервал:', 'adv.s3.samples': 'Образцов:',
            'adv.s3.status_idle': 'Удерживайте клавишу 3 секунды для начала',
            'adv.s3.status_measuring': 'Измерение авто-повтора...', 'adv.s3.status_done': 'Измерение завершено',
            'adv.s4.title': 'Обнаружение двойного срабатывания',
            'adv.s4.desc': 'Обнаруживает срабатывание клавиши дважды в окне debounce.',
            'adv.s4.suspicious': 'Подозрительные двойные срабатывания', 'adv.s4.min_interval': 'Минимальный интервал (мс)',
            'adv.s4.no_issues': 'Двойных срабатываний не обнаружено. Печатайте нормально.',
            'adv.s4.detected': 'Двойное срабатывание на',
            'adv.s5.title': 'Время срабатывания клавиши',
            'adv.s5.desc': 'Время между keydown и keyup для каждой клавиши.',
            'adv.s5.col_key': 'Клавиша', 'adv.s5.col_avg': 'Средн. (мс)', 'adv.s5.col_min': 'Мин', 'adv.s5.col_max': 'Макс', 'adv.s5.col_count': 'Счёт',
            'adv.s5.empty': 'Нажмите и отпустите несколько клавиш',
            'adv.actions.reset': 'Сбросить все измерения', 'adv.actions.export': 'Экспорт отчёта',
            'adv.floating.label': 'Нажато:',
            'preset.wasd_shift.name': 'WASD + Shift', 'preset.wasd_shift.desc': 'Стандартный спринт FPS',
            'preset.wasd_jump.name': 'WASD + Пробел', 'preset.wasd_jump.desc': 'Прыжок в движении',
            'preset.qwer.name': 'Q + W + E + R', 'preset.qwer.desc': 'Заклинания MOBA',
            'preset.modifier_stress.name': 'Ctrl + Shift + Alt + A', 'preset.modifier_stress.desc': 'Тройной модификатор',
            'preset.numbers_shift.name': 'Shift + 1-5', 'preset.numbers_shift.desc': 'Цифры + Shift',
            'preset.arrows_modifier.name': 'Ctrl + Shift + Стрелки', 'preset.arrows_modifier.desc': 'Многострочный выбор',
            'preset.full_row.name': 'Весь основной ряд (8)', 'preset.full_row.desc': 'A-S-D-F-J-K-L-Ж — тест 8KRO',
            'preset.gaming_pro.name': '6-клавишный игровой', 'preset.gaming_pro.desc': 'W, A, D, Shift, Пробел, E'
        }
    };

    // Detect locale
    const locale = (window.KBT_LOCALE || document.documentElement.lang || 'en').split('-')[0];
    const t = (key) => (ADV_I18N[locale] && ADV_I18N[locale][key]) || ADV_I18N.en[key] || key;

    // ============ Combo Presets (key codes use KeyboardEvent.code) ============
    const PRESETS = [
        { id: 'wasd_shift', keys: ['KeyW', 'KeyA', 'KeyS', 'KeyD', 'ShiftLeft'] },
        { id: 'wasd_jump', keys: ['KeyW', 'KeyA', 'KeyS', 'KeyD', 'Space'] },
        { id: 'qwer', keys: ['KeyQ', 'KeyW', 'KeyE', 'KeyR'] },
        { id: 'modifier_stress', keys: ['ControlLeft', 'ShiftLeft', 'AltLeft', 'KeyA'] },
        { id: 'numbers_shift', keys: ['ShiftLeft', 'Digit1', 'Digit2', 'Digit3', 'Digit4', 'Digit5'] },
        { id: 'arrows_modifier', keys: ['ControlLeft', 'ShiftLeft', 'ArrowUp', 'ArrowDown'] },
        { id: 'full_row', keys: ['KeyA', 'KeyS', 'KeyD', 'KeyF', 'KeyJ', 'KeyK', 'KeyL', 'Semicolon'] },
        { id: 'gaming_pro', keys: ['KeyW', 'KeyA', 'KeyD', 'ShiftLeft', 'Space', 'KeyE'] }
    ];

    // ============ State ============
    const state = {
        currentlyHeld: new Set(),
        maxNKRO: 0,
        combosTested: 0,
        comboLog: [],
        // Polling
        pollingKey: null, pollingStart: 0, pollingLastEvent: 0, pollingIntervals: [],
        // Debounce
        lastKeyTimes: {},     // code -> timestamp of last release
        suspiciousDoubleFires: 0,
        minDebounceInterval: null,
        // Actuation
        keyDownTimes: {},     // code -> timestamp of keydown
        actuationData: {},    // code -> {min, max, sum, count}
        // Active preset
        activePreset: null,
        activePresetSeen: new Set(),
        activePresetMaxConcurrent: 0
    };

    function applyI18n() {
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const k = el.getAttribute('data-i18n');
            if (k && k.startsWith('adv.') || k.startsWith('preset.')) {
                el.textContent = t(k);
            }
        });
        document.querySelectorAll('[data-empty-i18n]').forEach(el => {
            const k = el.getAttribute('data-empty-i18n');
            if (el.textContent.trim() === '' || el.textContent.includes('(')) {
                el.textContent = t(k);
            }
        });
    }

    function renderPresets() {
        const grid = document.querySelector('#adv-pro-panel .adv-preset-grid');
        if (!grid) return;
        grid.innerHTML = '';
        PRESETS.forEach(preset => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'adv-preset-btn';
            btn.dataset.presetId = preset.id;
            btn.innerHTML = `
                <span class="adv-preset-btn-name">${t('preset.' + preset.id + '.name')}</span>
                <span class="adv-preset-btn-desc">${t('preset.' + preset.id + '.desc')}</span>
                <span class="adv-preset-btn-keys">${preset.keys.map(k => prettyKeyName(k)).join(' + ')}</span>
                <span class="adv-preset-btn-result"></span>
            `;
            btn.addEventListener('click', () => startPreset(preset));
            grid.appendChild(btn);
        });
    }

    function prettyKeyName(code) {
        return code
            .replace(/^Key/, '')
            .replace(/^Digit/, '')
            .replace(/Left$/, '').replace(/Right$/, '')
            .replace(/^Arrow/, '↑↓→← '.charAt(['Up','Down','Right','Left'].indexOf(code.replace('Arrow',''))))
            .replace('Space', '⎵')
            .replace('Semicolon', ';');
    }

    function startPreset(preset) {
        state.activePreset = preset;
        state.activePresetSeen = new Set();
        state.activePresetMaxConcurrent = 0;
        const activeEl = document.getElementById('adv-preset-active');
        if (activeEl) activeEl.style.display = 'flex';
        const reqEl = document.getElementById('adv-preset-keys-required');
        if (reqEl) reqEl.textContent = preset.keys.map(prettyKeyName).join(' + ');
        updatePresetProgress();
    }

    function cancelPreset() {
        if (!state.activePreset) return;
        const success = state.activePresetMaxConcurrent === state.activePreset.keys.length;
        const btn = document.querySelector(`.adv-preset-btn[data-preset-id="${state.activePreset.id}"]`);
        if (btn) {
            btn.classList.remove('success', 'failed');
            btn.classList.add(success ? 'success' : 'failed');
            const resultEl = btn.querySelector('.adv-preset-btn-result');
            if (resultEl) {
                resultEl.textContent = success
                    ? `✓ ${t('adv.s2.success')} (${state.activePresetMaxConcurrent}/${state.activePreset.keys.length})`
                    : `✗ ${t('adv.s2.failed')} (${state.activePresetMaxConcurrent}/${state.activePreset.keys.length})`;
            }
        }
        state.activePreset = null;
        state.activePresetSeen = new Set();
        state.activePresetMaxConcurrent = 0;
        const activeEl = document.getElementById('adv-preset-active');
        if (activeEl) activeEl.style.display = 'none';
        state.combosTested++;
        const tcEl = document.getElementById('adv-total-combos');
        if (tcEl) tcEl.textContent = state.combosTested;
    }

    function updatePresetProgress() {
        if (!state.activePreset) return;
        const heldFromRequired = state.activePreset.keys.filter(k => state.currentlyHeld.has(k));
        const concurrent = heldFromRequired.length;
        if (concurrent > state.activePresetMaxConcurrent) {
            state.activePresetMaxConcurrent = concurrent;
        }
        heldFromRequired.forEach(k => state.activePresetSeen.add(k));
        const txt = document.getElementById('adv-preset-progress-text');
        if (txt) txt.textContent = `${state.activePresetMaxConcurrent}/${state.activePreset.keys.length}`;
    }

    function getNKRORating(max) {
        if (max < 3) return null;
        if (max === 2) return t('adv.s1.rating_2kro');
        if (max === 3) return t('adv.s1.rating_3kro');
        if (max <= 6) return t('adv.s1.rating_6kro');
        return t('adv.s1.rating_nkro');
    }

    function pulseLivebarItem(id) {
        const el = document.getElementById(id);
        if (!el) return;
        el.classList.remove('adv-pulse');
        void el.offsetWidth; // trigger reflow to restart animation
        el.classList.add('adv-pulse');
        setTimeout(() => el.classList.remove('adv-pulse'), 400);
    }

    function updateLivebar() {
        const heldCount = state.currentlyHeld.size;
        // Update primary values
        const nkroVal = document.getElementById('adv-livebar-nkro-value');
        const combosVal = document.getElementById('adv-livebar-combos-value');
        if (nkroVal) nkroVal.textContent = state.maxNKRO;
        if (combosVal) combosVal.textContent = state.combosTested;

        // Update held-keys chip row in the hero
        const chipsList = document.getElementById('adv-hero-chips-list');
        if (chipsList) {
            if (heldCount === 0) {
                chipsList.innerHTML = '<span class="adv-hero-empty">' + t('adv.hero.held_empty') + '</span>';
            } else {
                const keys = Array.from(state.currentlyHeld).slice(0, 8);
                chipsList.innerHTML = keys.map(k => '<span class="adv-hero-chip">' + prettyKeyName(k) + '</span>').join('');
                if (heldCount > 8) {
                    chipsList.innerHTML += '<span class="adv-hero-chip">+' + (heldCount - 8) + '</span>';
                }
            }
        }

        // Update health card
        const healthCard = document.getElementById('adv-card-health-value');
        const healthSub = document.getElementById('adv-livebar-health-sub');
        if (healthCard && healthSub) {
            if (state.suspiciousDoubleFires > 0) {
                healthCard.innerHTML = '<span style="color: var(--pn-danger)">' + t('adv.card.health_warn') + '</span>';
                healthSub.textContent = state.suspiciousDoubleFires + ' ' + t('adv.s4.suspicious').toLowerCase();
            } else {
                healthCard.innerHTML = t('adv.card.health_ok');
                healthSub.textContent = t('adv.card.health_hint');
            }
        }
    }

    function updateNKRODisplay() {
        const heldCount = state.currentlyHeld.size;
        const oldMax = state.maxNKRO;
        if (heldCount > state.maxNKRO) state.maxNKRO = heldCount;

        document.getElementById('adv-max-nkro').textContent = state.maxNKRO;
        document.getElementById('adv-currently-held-count').textContent = heldCount;

        // Pulse animation when max NKRO increases
        if (state.maxNKRO > oldMax) pulseLivebarItem('adv-livebar-nkro');

        updateLivebar();

        const heldList = document.getElementById('adv-held-list');
        if (heldList) {
            heldList.textContent = heldCount === 0
                ? t('adv.s1.held_empty')
                : Array.from(state.currentlyHeld).map(prettyKeyName).join(', ');
        }

        const rating = getNKRORating(state.maxNKRO);
        const ratingEl = document.getElementById('adv-nkro-rating');
        if (ratingEl) {
            if (rating) {
                ratingEl.innerHTML = `<span class="adv-rating-strong">${state.maxNKRO}KRO+</span> ${rating}`;
                ratingEl.classList.add('adv-rated');
            } else {
                ratingEl.innerHTML = `<span>${t('adv.hero.rating_pending')}</span>`;
                ratingEl.classList.remove('adv-rated');
            }
        }
        // Pulse hero number on NKRO increase
        const heroNum = document.getElementById('adv-livebar-nkro-value');
        if (heroNum && state.maxNKRO > oldMax) {
            heroNum.classList.remove('adv-pulse');
            void heroNum.offsetWidth;
            heroNum.classList.add('adv-pulse');
        }
        // Update actuation count pill
        const actCount = document.getElementById('adv-actuation-count');
        if (actCount) actCount.textContent = Object.keys(state.actuationData).length;

        // Floating indicator
        const floating = document.getElementById('adv-floating-held');
        const floatingList = document.getElementById('adv-floating-list');
        const floatingCount = document.getElementById('adv-floating-count');
        if (floating && floatingList && floatingCount) {
            floating.classList.toggle('is-visible', heldCount > 0);
            floating.setAttribute('aria-hidden', heldCount > 0 ? 'false' : 'true');
            if (heldCount > 0) {
                floatingList.textContent = Array.from(state.currentlyHeld).map(prettyKeyName).slice(0, 6).join(' ');
                if (heldCount > 6) floatingList.textContent += '…';
                floatingCount.textContent = heldCount;
            } else {
                floatingList.textContent = '';
                floatingCount.textContent = '0';
            }
        }
    }

    function updateActuationTable() {
        const tbody = document.getElementById('adv-actuation-tbody');
        if (!tbody) return;
        const entries = Object.entries(state.actuationData);
        if (entries.length === 0) {
            tbody.innerHTML = `<tr><td colspan="5" class="adv-empty">${t('adv.s5.empty')}</td></tr>`;
            return;
        }
        entries.sort((a, b) => b[1].count - a[1].count);
        tbody.innerHTML = entries.slice(0, 30).map(([code, d]) => {
            const avg = (d.sum / d.count).toFixed(1);
            return `<tr>
                <td>${prettyKeyName(code)}</td>
                <td>${avg}</td>
                <td>${d.min}</td>
                <td>${d.max}</td>
                <td>${d.count}</td>
            </tr>`;
        }).join('');
    }

    function appendDebounceLog(msg) {
        const log = document.getElementById('adv-debounce-log');
        if (!log) return;
        if (log.querySelector('.log-placeholder')) log.innerHTML = '';
        const p = document.createElement('p');
        p.style.margin = '4px 0';
        p.style.color = '#ef4444';
        p.textContent = msg;
        log.insertBefore(p, log.firstChild);
        while (log.children.length > 20) log.removeChild(log.lastChild);
    }

    // ============ Event handlers ============
    function onKeyDown(e) {
        const code = e.code;
        const now = performance.now();

        // Polling rate measurement (auto-repeat-based)
        // First auto-repeat fires after the OS auto-repeat DELAY (~250-500ms).
        // Subsequent ones fire at the auto-repeat RATE (~30-60 Hz = 16-33ms intervals).
        // We measure the rate intervals only — discard the initial delay.
        if (e.repeat) {
            if (state.pollingKey === code && state.pollingIntervals.length < 100) {
                const last = state.pollingLastEvent || state.pollingStart;
                const interval = now - last;
                state.pollingLastEvent = now;
                // 8ms-200ms window (covers 5Hz-125Hz auto-repeat rates, excludes the initial ~500ms delay)
                if (interval > 8 && interval < 200) {
                    state.pollingIntervals.push(interval);
                    updatePollingDisplay();
                }
            }
            return;
        }

        // First time this key is pressed (no auto-repeat)
        if (!state.currentlyHeld.has(code)) {
            // Debounce check: did this key fire-then-release-then-fire within 50ms?
            const lastTime = state.lastKeyTimes[code];
            if (lastTime && (now - lastTime) < 50) {
                state.suspiciousDoubleFires++;
                const interval = Math.round(now - lastTime);
                if (state.minDebounceInterval === null || interval < state.minDebounceInterval) {
                    state.minDebounceInterval = interval;
                    document.getElementById('adv-debounce-min').textContent = interval;
                }
                document.getElementById('adv-debounce-suspicious').textContent = state.suspiciousDoubleFires;
                appendDebounceLog(`${t('adv.s4.detected')} ${prettyKeyName(code)} (${interval}ms)`);
            }
            state.currentlyHeld.add(code);
            state.keyDownTimes[code] = now;

            // Polling: start tracking if this is a single key being held alone
            if (state.currentlyHeld.size === 1) {
                state.pollingKey = code;
                state.pollingStart = now;
                state.pollingLastEvent = now;
                state.pollingIntervals = [];
                const subEl = document.getElementById('adv-polling-sub');
                if (subEl) subEl.textContent = t('adv.s3.status_measuring');
                const statusEl = document.getElementById('adv-polling-status');
                if (statusEl) statusEl.innerHTML = `<span>${t('adv.s3.status_measuring')}</span>`;
            } else {
                state.pollingKey = null;
            }
        }

        updateNKRODisplay();
        if (state.activePreset) updatePresetProgress();
    }

    function onKeyUp(e) {
        const code = e.code;
        const now = performance.now();

        // Actuation timing
        const downTime = state.keyDownTimes[code];
        if (downTime) {
            const duration = Math.round(now - downTime);
            if (!state.actuationData[code]) {
                state.actuationData[code] = { min: duration, max: duration, sum: duration, count: 1 };
            } else {
                const d = state.actuationData[code];
                d.min = Math.min(d.min, duration);
                d.max = Math.max(d.max, duration);
                d.sum += duration;
                d.count++;
            }
            updateActuationTable();
            delete state.keyDownTimes[code];
        }

        state.lastKeyTimes[code] = now;
        state.currentlyHeld.delete(code);

        // If active preset and ALL required keys had been held, treat this as test completion
        if (state.activePreset) {
            const stillHeldRequired = state.activePreset.keys.filter(k => state.currentlyHeld.has(k));
            if (stillHeldRequired.length === 0 && state.activePresetMaxConcurrent > 0) {
                cancelPreset();
            }
        }

        // Polling: finalize if this was the tracked key
        if (state.pollingKey === code && state.pollingIntervals.length >= 2) {
            const avgInterval = state.pollingIntervals.reduce((a,b) => a+b, 0) / state.pollingIntervals.length;
            const hz = 1000 / avgInterval;
            document.getElementById('adv-polling-rate').textContent = Math.round(hz);
            document.getElementById('adv-polling-interval').textContent = avgInterval.toFixed(1) + ' ms';
            document.getElementById('adv-polling-samples').textContent = state.pollingIntervals.length;
            document.getElementById('adv-polling-status').innerHTML = `<span>${t('adv.s3.status_done')}</span>`;
        }
        state.pollingKey = null;

        updateNKRODisplay();
    }

    function updatePollingDisplay() {
        if (state.pollingIntervals.length < 2) return;
        const avgInterval = state.pollingIntervals.reduce((a,b) => a+b, 0) / state.pollingIntervals.length;
        const hz = 1000 / avgInterval;
        const rateEl = document.getElementById('adv-polling-rate');
        if (rateEl) rateEl.textContent = Math.round(hz);
        const intEl = document.getElementById('adv-polling-interval');
        if (intEl) intEl.textContent = avgInterval.toFixed(1) + ' ms';
        const samplesEl = document.getElementById('adv-polling-samples');
        if (samplesEl) samplesEl.textContent = state.pollingIntervals.length;
        // Update the visible card hint with sample count
        const subEl = document.getElementById('adv-polling-sub');
        if (subEl) subEl.textContent = state.pollingIntervals.length + ' samples · ' + avgInterval.toFixed(1) + 'ms avg';
    }

    function resetAll() {
        state.currentlyHeld.clear();
        state.maxNKRO = 0;
        state.combosTested = 0;
        state.comboLog = [];
        state.pollingKey = null; state.pollingLastEvent = 0; state.pollingIntervals = [];
        state.lastKeyTimes = {};
        state.suspiciousDoubleFires = 0;
        state.minDebounceInterval = null;
        state.keyDownTimes = {};
        state.actuationData = {};
        state.activePreset = null;
        state.activePresetSeen = new Set();
        state.activePresetMaxConcurrent = 0;

        document.getElementById('adv-max-nkro').textContent = '0';
        document.getElementById('adv-currently-held-count').textContent = '0';
        document.getElementById('adv-total-combos').textContent = '0';
        document.getElementById('adv-debounce-suspicious').textContent = '0';
        document.getElementById('adv-debounce-min').textContent = '--';
        document.getElementById('adv-polling-rate').textContent = '--';
        document.getElementById('adv-polling-interval').textContent = '-- ms';
        document.getElementById('adv-polling-samples').textContent = '0';
        const ratingEl = document.getElementById('adv-nkro-rating');
        if (ratingEl) {
            ratingEl.innerHTML = `<span>${t('adv.s1.rating_pending')}</span>`;
            ratingEl.className = 'adv-rating-box';
        }
        const pollingStatus = document.getElementById('adv-polling-status');
        if (pollingStatus) pollingStatus.innerHTML = `<span>${t('adv.s3.status_idle')}</span>`;
        const debounceLog = document.getElementById('adv-debounce-log');
        if (debounceLog) debounceLog.innerHTML = `<p class="log-placeholder success">${t('adv.s4.no_issues')}</p>`;
        document.querySelectorAll('.adv-preset-btn').forEach(b => {
            b.classList.remove('success', 'failed');
            const r = b.querySelector('.adv-preset-btn-result');
            if (r) r.textContent = '';
        });
        updateActuationTable();
        updateNKRODisplay();
    }

    function exportReport() {
        const report = {
            generated: new Date().toISOString(),
            locale: locale,
            nkro: { max_simultaneous: state.maxNKRO, rating: getNKRORating(state.maxNKRO) || 'insufficient data' },
            polling_estimate_hz: state.pollingIntervals.length >= 2
                ? Math.round(1000 / (state.pollingIntervals.reduce((a,b)=>a+b,0) / state.pollingIntervals.length))
                : null,
            polling_avg_interval_ms: state.pollingIntervals.length >= 2
                ? +(state.pollingIntervals.reduce((a,b)=>a+b,0) / state.pollingIntervals.length).toFixed(2)
                : null,
            polling_samples: state.pollingIntervals.length,
            debounce: {
                suspicious_double_fires: state.suspiciousDoubleFires,
                min_interval_ms: state.minDebounceInterval
            },
            actuation_per_key: Object.fromEntries(
                Object.entries(state.actuationData).map(([k, v]) => [
                    prettyKeyName(k),
                    { count: v.count, min_ms: v.min, max_ms: v.max, avg_ms: +(v.sum / v.count).toFixed(1) }
                ])
            ),
            combos_tested: state.combosTested
        };
        const blob = new Blob([JSON.stringify(report, null, 2)], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `keyboard-pro-report-${Date.now()}.json`;
        a.click();
        URL.revokeObjectURL(url);
    }

    // ============ Wire up ============
    function init() {
        applyI18n();
        renderPresets();

        // Show our button alongside other feature buttons (insert into feature-controls)
        const btn = document.getElementById('advanced-pro-button');
        const featureControls = document.getElementById('feature-controls');
        if (btn && featureControls && btn.parentElement !== featureControls) {
            featureControls.appendChild(btn);
            btn.style.display = '';
        } else if (btn) {
            btn.style.display = '';
        }

        if (btn) {
            btn.addEventListener('click', () => {
                const panel = document.getElementById('adv-pro-panel');
                if (panel) panel.style.display = panel.style.display === 'none' ? 'block' : 'none';
            });
        }
        const closeBtn = document.getElementById('close-adv-pro');
        if (closeBtn) closeBtn.addEventListener('click', () => {
            const panel = document.getElementById('adv-pro-panel');
            if (panel) panel.style.display = 'none';
        });

        const cancelBtn = document.getElementById('adv-preset-cancel');
        if (cancelBtn) cancelBtn.addEventListener('click', cancelPreset);

        const resetBtn = document.getElementById('adv-reset-all');
        if (resetBtn) resetBtn.addEventListener('click', resetAll);

        const exportBtn = document.getElementById('adv-export');
        if (exportBtn) exportBtn.addEventListener('click', exportReport);

        // Listen at document level. capture phase so we run before existing handlers can cancel propagation.
        document.addEventListener('keydown', onKeyDown, true);
        document.addEventListener('keyup', onKeyUp, true);
    }

    // Run init right away if DOM is ready, else wait for DOMContentLoaded.
    // (Critical: this script runs as part of a PHP include — DOMContentLoaded
    // may have already fired by the time we reach here.)
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
</script>
