<style>
.tools-list-section {
    padding: 72px 0;
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.08), rgba(249, 115, 22, 0.08));
    border-top: 1px solid var(--card-border);
    border-bottom: 1px solid var(--card-border);
}

.tools-list-section .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.tools-list-section h2 {
    font-size: clamp(1.8rem, 3vw, 2.4rem);
    color: var(--text-color);
    margin-bottom: 8px;
    text-align: center;
}

.tools-list-section .section-subtitle {
    text-align: center;
    color: var(--text-muted);
    margin-bottom: 36px;
    font-size: 1.05rem;
    max-width: 720px;
    margin-left: auto;
    margin-right: auto;
}

.tools-list-section .language-note {
    text-align: center;
    color: var(--text-secondary);
    font-size: 0.98rem;
    line-height: 1.6;
    max-width: 880px;
    margin: -18px auto 32px;
    padding: 12px 16px;
    border-radius: 14px;
    background: rgba(15, 23, 42, 0.04);
    border: 1px solid var(--card-border);
}

.tools-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 22px;
}

.tool-card {
    display: flex;
    flex-direction: column;
    padding: 22px;
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: 18px;
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    position: relative;
    overflow: hidden;
    box-shadow: var(--card-shadow);
    height: 100%;
}

.tool-card::after {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: 18px;
    border: 1px solid transparent;
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.12), rgba(249, 115, 22, 0.12));
    opacity: 0;
    transition: opacity 0.2s ease;
    pointer-events: none;
}

.tool-card > * {
    position: relative;
    z-index: 1;
}

.tool-card:hover {
    border-color: rgba(14, 165, 233, 0.6);
    transform: translateY(-4px);
    box-shadow: 0 18px 36px rgba(15, 23, 42, 0.15);
}

.tool-card:hover::after {
    opacity: 1;
}

.tool-card-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: rgba(14, 165, 233, 0.14);
    color: #0f172a;
    margin-bottom: 14px;
}

.tool-card-icon svg {
    width: 24px;
    height: 24px;
    stroke: currentColor;
    fill: none;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

html.dark-theme .tool-card-icon,
[data-theme="dark"] .tool-card-icon {
    color: #e2e8f0;
    background: rgba(14, 165, 233, 0.22);
}

.tool-card .tool-name {
    display: block;
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--text-color);
    margin-bottom: 8px;
}

.tool-card p {
    color: var(--text-muted);
    font-size: 0.95rem;
    line-height: 1.5;
    flex-grow: 1;
    margin-bottom: 16px;
}

.tool-card-link {
    color: #0ea5e9;
    font-weight: 600;
    margin-top: auto;
}

html.dark-theme .tool-card-link,
[data-theme="dark"] .tool-card-link {
    color: #7dd3fc;
}

@media (max-width: 768px) {
    .tools-grid {
        grid-template-columns: 1fr;
    }

    .tools-list-section h2 {
        font-size: 1.8rem;
    }
}
</style>
