<?php
if (empty($localizedHubLanguage)) {
    return;
}

require_once __DIR__ . '/../localized-intent-pages.php';

$languageConfig = getLocalizedIntentLanguageConfig($localizedHubLanguage);
if (!$languageConfig) {
    return;
}

$copy = [
    'arabic' => [
        'title' => 'صفحات مركزة لاكتشاف اسرع',
        'intro' => 'اربط الزوار بصفحات متخصصة للشاشة والميكروفون والكاميرا وقراءة QR حتى تصل Google الى هذه الصفحات من مركز اللغة مباشرة.'
    ],
    'french' => [
        'title' => 'Pages cibles a decouvrir rapidement',
        'intro' => 'Ajoutez des acces directs vers les pages ecran, micro, webcam et QR pour renforcer la decouverte depuis le hub de langue.'
    ],
    'german' => [
        'title' => 'Gezielte Seiten fuer schnellere Entdeckung',
        'intro' => 'Direkte Links zu Bildschirm-, Mikrofon-, Webcam- und QR-Seiten helfen Suchmaschinen, diese lokalisierten Seiten besser zu finden.'
    ],
    'japanese' => [
        'title' => 'Google に見つけてもらいやすい注目ページ',
        'intro' => '画面、マイク、カメラ、QR の特化ページへ直接リンクして、日本語ハブからの内部導線を強化します。'
    ],
    'korean' => [
        'title' => 'Google discovery be stronger for these focused pages',
        'intro' => 'Hubs now surface direct links to the localized screen, mic, camera, and QR pages so they are easier to discover and crawl.'
    ],
    'portuguese' => [
        'title' => 'Paginas focadas para descoberta mais forte',
        'intro' => 'Links diretos para tela, microfone, camera e QR ajudam os mecanismos a encontrar essas paginas localizadas com mais consistencia.'
    ],
    'russian' => [
        'title' => 'Vazhnyye stranitsy dlya bystrogo obnaruzheniya',
        'intro' => 'Pryamyye ssylki na stranitsy ekrana, mikrofona, kamery i QR usilivayut vnutrennyuyu perelinkovku iz yazykovogo khaba.'
    ],
    'spanish' => [
        'title' => 'Paginas enfocadas para una mejor indexacion',
        'intro' => 'Estos accesos directos conectan el hub del idioma con las paginas localizadas de pantalla, microfono, camara y QR para reforzar el rastreo interno.'
    ],
];

$featuredKeys = [
    'dead-pixel-test',
    'microphone-volume-test',
    'camera-resolution-test',
    'scan-qr-from-image',
];

$featuredPages = [];
foreach ($featuredKeys as $featuredKey) {
    $page = getLocalizedIntentPage($localizedHubLanguage, $featuredKey);
    if ($page) {
        $featuredPages[] = $page;
    }
}

if (empty($featuredPages)) {
    return;
}

$sectionCopy = $copy[$localizedHubLanguage] ?? [
    'title' => 'Focused pages for stronger discovery',
    'intro' => 'Direct links from the language hub help search engines discover these localized intent pages more reliably.'
];
?>

<section class="localized-hub-discovery intent-cluster-links" aria-labelledby="localized-hub-discovery-title">
    <div class="container">
        <div class="intent-cluster-head">
            <p class="intent-cluster-kicker"><?php echo htmlspecialchars($languageConfig['clusterKicker'] ?? 'Related pages', ENT_QUOTES, 'UTF-8'); ?></p>
            <h2 id="localized-hub-discovery-title"><?php echo htmlspecialchars($sectionCopy['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
            <p class="intent-cluster-intro"><?php echo htmlspecialchars($sectionCopy['intro'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>

        <div class="intent-cluster-grid">
            <?php foreach ($featuredPages as $page): ?>
                <a class="intent-cluster-card" href="<?php echo url($page['path']); ?>">
                    <h3><?php echo htmlspecialchars($page['hero']['title'] ?? $page['schema']['name'] ?? basename($page['path']), ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($page['hero']['lede'] ?? $page['description'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <span class="intent-cluster-link"><?php echo htmlspecialchars($languageConfig['openPageLabel'] ?? 'Open page', ENT_QUOTES, 'UTF-8'); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.localized-hub-discovery {
    --intent-section-bg: linear-gradient(180deg, rgba(15, 23, 42, 0.02), rgba(148, 163, 184, 0.08));
    --intent-section-border: rgba(15, 23, 42, 0.08);
    --intent-title: #0f172a;
    --intent-body: #475569;
    --intent-kicker: var(--landing-accent, #0f766e);
    --intent-card-bg: rgba(255, 255, 255, 0.96);
    --intent-card-border: rgba(15, 23, 42, 0.1);
    --intent-card-shadow: 0 14px 32px rgba(15, 23, 42, 0.06);
    --intent-card-hover-border: rgba(14, 165, 233, 0.5);
    --intent-card-hover-shadow: 0 18px 40px rgba(14, 165, 233, 0.12);
    --intent-link: #0284c7;
    padding: 4rem 0;
    background: var(--intent-section-bg);
    border-top: 1px solid var(--intent-section-border);
    border-bottom: 1px solid var(--intent-section-border);
}

html.dark-theme .localized-hub-discovery,
[data-theme="dark"] .localized-hub-discovery {
    --intent-section-bg: linear-gradient(180deg, rgba(15, 23, 42, 0.2), rgba(15, 23, 42, 0.42));
    --intent-section-border: rgba(148, 163, 184, 0.16);
    --intent-title: #e2e8f0;
    --intent-body: #cbd5e1;
    --intent-kicker: #7dd3fc;
    --intent-card-bg: rgba(30, 41, 59, 0.94);
    --intent-card-border: rgba(148, 163, 184, 0.18);
    --intent-card-shadow: 0 18px 38px rgba(2, 6, 23, 0.24);
    --intent-card-hover-border: rgba(125, 211, 252, 0.55);
    --intent-card-hover-shadow: 0 20px 42px rgba(2, 132, 199, 0.22);
    --intent-link: #7dd3fc;
}

.localized-hub-discovery .intent-cluster-head {
    text-align: center;
    max-width: 780px;
    margin: 0 auto 2rem;
}

.localized-hub-discovery .intent-cluster-kicker {
    margin: 0 0 0.5rem;
    font-size: 0.82rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--intent-kicker);
}

.localized-hub-discovery .intent-cluster-head h2 {
    margin: 0 0 0.75rem;
    font-size: clamp(1.75rem, 4vw, 2.4rem);
    color: var(--intent-title);
}

.localized-hub-discovery .intent-cluster-intro {
    margin: 0;
    color: var(--intent-body);
    line-height: 1.7;
}

.localized-hub-discovery .intent-cluster-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 1.25rem;
}

.localized-hub-discovery .intent-cluster-card {
    display: block;
    padding: 1.5rem;
    border-radius: 16px;
    text-decoration: none;
    background: var(--intent-card-bg);
    border: 1px solid var(--intent-card-border);
    box-shadow: var(--intent-card-shadow);
    transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
}

.localized-hub-discovery .intent-cluster-card:hover {
    transform: translateY(-2px);
    border-color: var(--intent-card-hover-border);
    box-shadow: var(--intent-card-hover-shadow);
}

.localized-hub-discovery .intent-cluster-card h3 {
    margin: 0 0 0.65rem;
    font-size: 1.15rem;
    color: var(--intent-title);
}

.localized-hub-discovery .intent-cluster-card p {
    margin: 0 0 1rem;
    color: var(--intent-body);
    line-height: 1.6;
}

.localized-hub-discovery .intent-cluster-link {
    font-weight: 700;
    color: var(--intent-link);
}
</style>
