<?php
include __DIR__ . '/config.php';

// Locale via ?lang=xx; defaults to 'en'. Keeps the new language-aware page pattern.
$VALID_LOCALES = ['en','es','fr','de','ja','ko','pt','ar','ru'];
$lang = $_GET['lang'] ?? 'en';
if (!in_array($lang, $VALID_LOCALES, true)) { $lang = 'en'; }
$siteChromeLocale = $lang;

// Localized UI strings for the tool chrome. The shortcut database itself lives in JS with
// action keys, and the same JS pack translates action labels per locale.
$UI = [
    'en' => ['title' => 'Keyboard Shortcut Identifier', 'hero' => 'Press any key combination — instantly see what it does on Windows, macOS and Linux', 'sub' => 'Tap a single key or any modifier combination. We show it as real-looking keyboard keys and tell you what that shortcut triggers on all three operating systems.', 'select_os' => 'Your operating system', 'placeholder_title' => 'Press any key combination', 'placeholder_sub' => 'Try Ctrl+C · Ctrl+Shift+T · Alt+Tab · Win+E · Cmd+Space', 'reset' => 'Reset', 'os_win' => 'Windows', 'os_mac' => 'macOS', 'os_linux' => 'Linux', 'what_is' => 'What it does', 'other_os' => 'On other operating systems', 'unknown_title' => 'Shortcut not in our database', 'unknown_body' => 'That combo isn\'t one of the common ones we have catalogued. If you think it should be, let us know via the feedback link.', 'read_guide' => 'Read the full cheat sheet', 'meta_t' => 'Keyboard Shortcut Identifier — What Does This Key Combination Do? | KeyboardTester.click', 'meta_d' => 'Press any key combination and instantly see what it does on Windows, macOS and Linux. Free online shortcut identifier — 120+ mapped shortcuts, privacy-first.'],
    'es' => ['title' => 'Identificador de Atajos de Teclado', 'hero' => 'Presiona cualquier combinación de teclas — descubre al instante qué hace en Windows, macOS y Linux', 'sub' => 'Presiona una tecla o cualquier combinación con modificadores. Te mostramos las teclas como botones reales y te decimos qué activa ese atajo en los tres sistemas operativos.', 'select_os' => 'Tu sistema operativo', 'placeholder_title' => 'Presiona cualquier combinación', 'placeholder_sub' => 'Prueba Ctrl+C · Ctrl+Shift+T · Alt+Tab · Win+E · Cmd+Space', 'reset' => 'Restablecer', 'os_win' => 'Windows', 'os_mac' => 'macOS', 'os_linux' => 'Linux', 'what_is' => 'Qué hace', 'other_os' => 'En otros sistemas operativos', 'unknown_title' => 'Atajo no encontrado', 'unknown_body' => 'Esa combinación no está en nuestra base de datos. Si crees que debería estar, avísanos en comentarios.', 'read_guide' => 'Ver la hoja de trucos completa', 'meta_t' => 'Identificador de atajos de teclado | KeyboardTester.click', 'meta_d' => 'Presiona cualquier combinación de teclas y descubre al instante qué hace en Windows, macOS y Linux.'],
    'fr' => ['title' => 'Identificateur de Raccourcis Clavier', 'hero' => 'Appuyez sur une combinaison — voyez instantanément son effet sur Windows, macOS et Linux', 'sub' => 'Appuyez sur une touche ou une combinaison avec des modificateurs. Nous affichons les touches comme des vrais boutons et vous disons ce que ce raccourci déclenche sur les trois systèmes.', 'select_os' => 'Votre système d\'exploitation', 'placeholder_title' => 'Appuyez sur une combinaison', 'placeholder_sub' => 'Essayez Ctrl+C · Ctrl+Shift+T · Alt+Tab · Win+E · Cmd+Space', 'reset' => 'Réinitialiser', 'os_win' => 'Windows', 'os_mac' => 'macOS', 'os_linux' => 'Linux', 'what_is' => 'Action', 'other_os' => 'Sur les autres systèmes', 'unknown_title' => 'Raccourci inconnu', 'unknown_body' => 'Cette combinaison ne figure pas dans notre base de données.', 'read_guide' => 'Lire la fiche complète', 'meta_t' => 'Identificateur de raccourcis clavier | KeyboardTester.click', 'meta_d' => 'Appuyez sur une combinaison de touches et voyez instantanément son effet sur Windows, macOS et Linux.'],
    'de' => ['title' => 'Tastenkombinations-Identifikator', 'hero' => 'Drücke eine Tastenkombination — sehe sofort, was sie auf Windows, macOS und Linux macht', 'sub' => 'Drücke eine Taste oder eine Kombination mit Modifikatoren. Wir zeigen die Tasten wie echte Buttons und sagen dir, was der Shortcut auf allen drei Systemen auslöst.', 'select_os' => 'Dein Betriebssystem', 'placeholder_title' => 'Drücke eine Tastenkombination', 'placeholder_sub' => 'Probiere Ctrl+C · Ctrl+Shift+T · Alt+Tab · Win+E · Cmd+Space', 'reset' => 'Zurücksetzen', 'os_win' => 'Windows', 'os_mac' => 'macOS', 'os_linux' => 'Linux', 'what_is' => 'Was passiert', 'other_os' => 'Auf anderen Systemen', 'unknown_title' => 'Shortcut nicht gefunden', 'unknown_body' => 'Diese Kombination ist nicht in unserer Datenbank.', 'read_guide' => 'Zum vollständigen Cheatsheet', 'meta_t' => 'Tastenkombinations-Identifikator | KeyboardTester.click', 'meta_d' => 'Drücke eine Tastenkombination und sehe sofort, was sie auf Windows, macOS und Linux macht.'],
    'ja' => ['title' => 'キーボードショートカット識別ツール', 'hero' => '任意のキーの組み合わせを押して — Windows、macOS、Linux での動作を即座に確認', 'sub' => 'キー一つまたは修飾キーとの組み合わせを押すと、実際のキーボードボタンのように表示され、3つのOSでのショートカットの動作を表示します。', 'select_os' => 'あなたのOS', 'placeholder_title' => 'キーの組み合わせを押してください', 'placeholder_sub' => '例：Ctrl+C · Ctrl+Shift+T · Alt+Tab · Win+E · Cmd+Space', 'reset' => 'リセット', 'os_win' => 'Windows', 'os_mac' => 'macOS', 'os_linux' => 'Linux', 'what_is' => '機能', 'other_os' => '他のOSでは', 'unknown_title' => 'ショートカットが見つかりません', 'unknown_body' => 'その組み合わせはデータベースに登録されていません。', 'read_guide' => '完全なチートシートを読む', 'meta_t' => 'キーボードショートカット識別ツール | KeyboardTester.click', 'meta_d' => '任意のキーの組み合わせを押して、Windows、macOS、Linuxでの動作を即座に確認。'],
    'ko' => ['title' => '키보드 단축키 식별기', 'hero' => '아무 키 조합이나 눌러보세요 — Windows, macOS, Linux에서의 기능을 즉시 확인', 'sub' => '키 하나 또는 수정 키 조합을 누르면 실제 키보드 버튼처럼 표시되고, 3개 OS에서 이 단축키가 무엇을 하는지 알려드립니다.', 'select_os' => '운영체제', 'placeholder_title' => '키 조합을 눌러주세요', 'placeholder_sub' => '예: Ctrl+C · Ctrl+Shift+T · Alt+Tab · Win+E · Cmd+Space', 'reset' => '초기화', 'os_win' => 'Windows', 'os_mac' => 'macOS', 'os_linux' => 'Linux', 'what_is' => '기능', 'other_os' => '다른 OS에서는', 'unknown_title' => '단축키를 찾을 수 없음', 'unknown_body' => '해당 조합은 데이터베이스에 없습니다.', 'read_guide' => '전체 치트시트 보기', 'meta_t' => '키보드 단축키 식별기 | KeyboardTester.click', 'meta_d' => '아무 키 조합이나 누르고 Windows, macOS, Linux에서의 기능을 즉시 확인하세요.'],
    'pt' => ['title' => 'Identificador de Atalhos de Teclado', 'hero' => 'Pressione qualquer combinação — veja instantaneamente o que faz no Windows, macOS e Linux', 'sub' => 'Pressione uma tecla ou combinação com modificadores. Mostramos as teclas como botões reais e dizemos o que aquele atalho faz nos três sistemas.', 'select_os' => 'Seu sistema operacional', 'placeholder_title' => 'Pressione uma combinação', 'placeholder_sub' => 'Tente Ctrl+C · Ctrl+Shift+T · Alt+Tab · Win+E · Cmd+Space', 'reset' => 'Redefinir', 'os_win' => 'Windows', 'os_mac' => 'macOS', 'os_linux' => 'Linux', 'what_is' => 'O que faz', 'other_os' => 'Em outros sistemas', 'unknown_title' => 'Atalho não encontrado', 'unknown_body' => 'Essa combinação não está em nosso banco de dados.', 'read_guide' => 'Veja o cheat sheet completo', 'meta_t' => 'Identificador de atalhos de teclado | KeyboardTester.click', 'meta_d' => 'Pressione qualquer combinação e veja o que faz no Windows, macOS e Linux.'],
    'ar' => ['title' => 'محدد اختصارات لوحة المفاتيح', 'hero' => 'اضغط أي مجموعة مفاتيح — واعرف فوراً ما تفعله على Windows و macOS و Linux', 'sub' => 'اضغط مفتاحاً أو مجموعة مع مفاتيح التعديل. نعرض المفاتيح كأزرار لوحة مفاتيح حقيقية ونخبرك بما يفعله الاختصار على الأنظمة الثلاثة.', 'select_os' => 'نظام التشغيل لديك', 'placeholder_title' => 'اضغط مجموعة مفاتيح', 'placeholder_sub' => 'جرّب Ctrl+C · Ctrl+Shift+T · Alt+Tab · Win+E · Cmd+Space', 'reset' => 'إعادة', 'os_win' => 'Windows', 'os_mac' => 'macOS', 'os_linux' => 'Linux', 'what_is' => 'الوظيفة', 'other_os' => 'على الأنظمة الأخرى', 'unknown_title' => 'الاختصار غير موجود', 'unknown_body' => 'هذه المجموعة ليست في قاعدة بياناتنا.', 'read_guide' => 'اقرأ الدليل الكامل', 'meta_t' => 'محدد اختصارات لوحة المفاتيح | KeyboardTester.click', 'meta_d' => 'اضغط أي مجموعة مفاتيح واعرف فوراً ما تفعله على Windows و macOS و Linux.'],
    'ru' => ['title' => 'Идентификатор сочетаний клавиш', 'hero' => 'Нажмите любое сочетание — мгновенно узнайте, что оно делает в Windows, macOS и Linux', 'sub' => 'Нажмите клавишу или сочетание с модификаторами. Мы покажем клавиши как реальные кнопки и скажем, что делает это сочетание во всех трёх ОС.', 'select_os' => 'Ваша ОС', 'placeholder_title' => 'Нажмите любое сочетание', 'placeholder_sub' => 'Попробуйте Ctrl+C · Ctrl+Shift+T · Alt+Tab · Win+E · Cmd+Space', 'reset' => 'Сбросить', 'os_win' => 'Windows', 'os_mac' => 'macOS', 'os_linux' => 'Linux', 'what_is' => 'Действие', 'other_os' => 'В других ОС', 'unknown_title' => 'Сочетание не найдено', 'unknown_body' => 'Это сочетание отсутствует в базе.', 'read_guide' => 'Смотреть полную шпаргалку', 'meta_t' => 'Идентификатор сочетаний клавиш | KeyboardTester.click', 'meta_d' => 'Нажмите любое сочетание клавиш и узнайте, что оно делает в Windows, macOS и Linux.'],
];
$t = $UI[$lang] ?? $UI['en'];

$pageTitle = $t['meta_t'];
$pageDescription = $t['meta_d'];
$pageCanonical = absoluteUrl('keyboard-shortcut-identifier.php' . ($lang !== 'en' ? '?lang=' . $lang : ''));
$pageOgImage = 'blog/images/keyboard-shortcuts-v2-hero.webp';
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($lang, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $lang === 'ar' ? ' dir="rtl"' : ''; ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
    <?php include __DIR__ . '/includes/head-common.php'; ?>
    <style>
    .ksi-wrap { max-width: 1100px; margin: 0 auto; padding: 2rem 1.25rem 4rem; }
    .ksi-hero {
        background: linear-gradient(135deg, rgba(14,165,233,0.1), rgba(168,85,247,0.08)), var(--surface, #ffffff);
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 18px;
        padding: 34px 32px;
        margin-bottom: 24px;
        position: relative; overflow: hidden;
    }
    .ksi-kicker { font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.14em; color: var(--primary-color, #1e40af); margin-bottom: 10px; }
    .ksi-title { font-size: 1.75rem; font-weight: 800; margin: 0 0 10px; line-height: 1.22; color: var(--text-color); }
    .ksi-sub { font-size: 1rem; line-height: 1.6; color: var(--text-muted, #475569); max-width: 680px; margin: 0; }

    .ksi-os-row { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; margin: 18px 0 4px; }
    .ksi-os-label { font-size: 0.82rem; font-weight: 700; color: var(--text-muted, #64748b); text-transform: uppercase; letter-spacing: 0.08em; margin-right: 6px; }
    .ksi-os-btn {
        padding: 9px 18px;
        border-radius: 10px;
        border: 1px solid var(--border-color, #e2e8f0);
        background: var(--surface, #ffffff);
        color: var(--text-color);
        font: inherit; font-weight: 600; font-size: 0.92rem;
        cursor: pointer;
        transition: background-color 0.15s, border-color 0.15s, color 0.15s, transform 0.1s;
        display: inline-flex; align-items: center; gap: 8px;
    }
    .ksi-os-btn:hover { border-color: var(--primary-color, #0ea5e9); color: var(--primary-color, #0ea5e9); }
    .ksi-os-btn.is-active {
        background: linear-gradient(135deg, #0ea5e9, #0284c7);
        color: #fff;
        border-color: #0ea5e9;
        box-shadow: 0 6px 16px rgba(14, 165, 233, 0.32);
    }

    .ksi-stage {
        background: var(--surface, #ffffff);
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 16px;
        padding: 40px 30px 34px;
        margin: 20px 0;
        text-align: center;
        min-height: 340px;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        gap: 14px;
    }
    .ksi-placeholder-title { font-size: 1.3rem; font-weight: 800; color: var(--text-muted, #475569); margin: 0; }
    .ksi-placeholder-sub { color: var(--text-dim, #94a3b8); font-size: 0.92rem; margin: 0; }
    .ksi-pressed-combo { display: flex; flex-wrap: wrap; gap: 8px; justify-content: center; align-items: center; }
    .ksi-key {
        display: inline-flex; align-items: center; justify-content: center;
        min-width: 48px; height: 54px; padding: 0 14px;
        font-size: 1.08rem; font-weight: 700;
        border-radius: 9px;
        background: linear-gradient(180deg, #ffffff 0%, #e5e7eb 100%);
        border: 1px solid #b8c2cf;
        box-shadow: 0 1px 0 #ffffff inset, 0 -2px 0 #a8b2bf inset, 0 4px 10px rgba(15,23,42,0.18);
        color: #0f172a;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        letter-spacing: 0.01em;
        animation: ksi-pop 0.25s cubic-bezier(0.18, 1.4, 0.4, 1) both;
    }
    .ksi-key .ksi-sub { font-size: 0.62rem; color: #64748b; display: block; margin-top: 2px; font-weight: 600; }
    .ksi-plus { font-size: 1.3rem; color: var(--text-muted, #94a3b8); font-weight: 700; }
    html.dark-theme .ksi-key, [data-theme="dark"] .ksi-key {
        background: linear-gradient(180deg, #334155 0%, #1e293b 100%);
        border-color: #0f172a;
        box-shadow: 0 1px 0 rgba(255,255,255,0.08) inset, 0 -2px 0 #0b1220 inset, 0 4px 10px rgba(0,0,0,0.5);
        color: #f1f5f9;
    }
    html.dark-theme .ksi-key .ksi-sub, [data-theme="dark"] .ksi-key .ksi-sub { color: #cbd5e1; }
    @keyframes ksi-pop { 0% { transform: scale(0.6); opacity: 0; } 100% { transform: scale(1); opacity: 1; } }

    .ksi-action-card {
        width: 100%; max-width: 560px;
        margin-top: 14px;
        padding: 22px 24px;
        background: linear-gradient(135deg, rgba(14,165,233,0.08), rgba(34,197,94,0.06));
        border: 1px solid rgba(14,165,233,0.25);
        border-radius: 14px;
    }
    .ksi-action-card.ksi-unknown { background: linear-gradient(135deg, rgba(245,158,11,0.08), rgba(239,68,68,0.05)); border-color: rgba(245,158,11,0.3); }
    .ksi-action-label { font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.12em; font-weight: 700; color: var(--primary-color, #1e40af); margin-bottom: 6px; }
    .ksi-action-title { font-size: 1.4rem; font-weight: 800; margin: 0 0 8px; color: var(--text-color); }
    .ksi-action-desc { font-size: 0.98rem; color: var(--text-muted, #475569); line-height: 1.55; margin: 0; }

    .ksi-other-os { margin-top: 18px; text-align: left; }
    .ksi-other-os h4 { font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.08em; color: var(--text-muted, #64748b); margin: 0 0 8px; }
    .ksi-other-os ul { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 6px; }
    .ksi-other-os li { display: flex; align-items: center; gap: 10px; font-size: 0.92rem; padding: 6px 0; }
    .ksi-other-os .ksi-os-pill { padding: 2px 10px; border-radius: 999px; font-size: 0.72rem; font-weight: 700; letter-spacing: 0.04em; text-transform: uppercase; }
    .ksi-os-pill.win { background: rgba(14,165,233,0.14); color: #0ea5e9; }
    .ksi-os-pill.mac { background: rgba(168,85,247,0.14); color: #a855f7; }
    .ksi-os-pill.linux { background: rgba(234,88,12,0.14); color: #ea580c; }

    .ksi-reset-row { text-align: center; margin-top: 16px; }
    .ksi-reset-btn {
        padding: 9px 20px;
        border-radius: 10px;
        border: 1px solid var(--border-color, #e2e8f0);
        background: transparent;
        color: var(--text-color);
        font: inherit; font-weight: 600;
        cursor: pointer;
    }

    .ksi-cta-strip {
        margin-top: 24px;
        padding: 20px 24px;
        background: var(--surface, #f8fafc);
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 14px;
        display: flex; justify-content: space-between; align-items: center; gap: 18px; flex-wrap: wrap;
    }
    .ksi-cta-text { flex: 1; min-width: 260px; }
    .ksi-cta-text strong { display: block; font-size: 1.05rem; margin-bottom: 3px; color: var(--text-color); }
    .ksi-cta-text span { font-size: 0.88rem; color: var(--text-muted, #475569); }
    .ksi-cta-btn {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 11px 22px;
        border-radius: 10px;
        background: linear-gradient(135deg, #0ea5e9, #0284c7);
        color: #fff; font-weight: 700; text-decoration: none;
        box-shadow: 0 6px 16px rgba(14,165,233,0.3);
    }
    .ksi-cta-btn:hover { transform: translateY(-1px); color: #fff; }

    @media (max-width: 600px) {
        .ksi-hero { padding: 24px 20px; }
        .ksi-title { font-size: 1.35rem; }
        .ksi-key { min-width: 40px; height: 46px; font-size: 0.95rem; padding: 0 10px; }
    }
    </style>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebApplication",
        "name": "Keyboard Shortcut Identifier",
        "url": <?php echo json_encode($pageCanonical); ?>,
        "description": <?php echo json_encode($pageDescription); ?>,
        "applicationCategory": "UtilityApplication",
        "operatingSystem": "Any",
        "isAccessibleForFree": true,
        "browserRequirements": "Requires JavaScript"
    }
    </script>
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>
<main>
<div class="ksi-wrap">
    <section class="ksi-hero">
        <div class="ksi-kicker">⌨ <?php echo htmlspecialchars($t['title'], ENT_QUOTES, 'UTF-8'); ?></div>
        <h1 class="ksi-title"><?php echo htmlspecialchars($t['hero'], ENT_QUOTES, 'UTF-8'); ?></h1>
        <p class="ksi-sub"><?php echo htmlspecialchars($t['sub'], ENT_QUOTES, 'UTF-8'); ?></p>

        <div class="ksi-os-row" role="tablist" aria-label="<?php echo htmlspecialchars($t['select_os'], ENT_QUOTES, 'UTF-8'); ?>">
            <span class="ksi-os-label"><?php echo htmlspecialchars($t['select_os'], ENT_QUOTES, 'UTF-8'); ?>:</span>
            <button class="ksi-os-btn" data-os="windows" type="button" role="tab">🪟 <?php echo htmlspecialchars($t['os_win'], ENT_QUOTES, 'UTF-8'); ?></button>
            <button class="ksi-os-btn" data-os="macos" type="button" role="tab">🍎 <?php echo htmlspecialchars($t['os_mac'], ENT_QUOTES, 'UTF-8'); ?></button>
            <button class="ksi-os-btn" data-os="linux" type="button" role="tab">🐧 <?php echo htmlspecialchars($t['os_linux'], ENT_QUOTES, 'UTF-8'); ?></button>
        </div>
    </section>

    <section class="ksi-stage" id="ksi-stage" tabindex="0">
        <div class="ksi-placeholder" id="ksi-placeholder">
            <div style="font-size:3.2rem;line-height:1;margin-bottom:8px" aria-hidden="true">⌨</div>
            <p class="ksi-placeholder-title"><?php echo htmlspecialchars($t['placeholder_title'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="ksi-placeholder-sub"><?php echo htmlspecialchars($t['placeholder_sub'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <div class="ksi-result" id="ksi-result" hidden>
            <div class="ksi-pressed-combo" id="ksi-pressed-combo" aria-live="polite"></div>
            <div class="ksi-action-card" id="ksi-action-card">
                <div class="ksi-action-label" id="ksi-action-label"><?php echo htmlspecialchars($t['what_is'], ENT_QUOTES, 'UTF-8'); ?></div>
                <h3 class="ksi-action-title" id="ksi-action-title"></h3>
                <p class="ksi-action-desc" id="ksi-action-desc"></p>
                <div class="ksi-other-os" id="ksi-other-os" hidden>
                    <h4><?php echo htmlspecialchars($t['other_os'], ENT_QUOTES, 'UTF-8'); ?></h4>
                    <ul id="ksi-other-os-list"></ul>
                </div>
            </div>
        </div>
    </section>

    <div class="ksi-reset-row">
        <button class="ksi-reset-btn" id="ksi-reset" type="button">↻ <?php echo htmlspecialchars($t['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
    </div>

    <section class="ksi-cta-strip">
        <div class="ksi-cta-text">
            <strong>Want the full cheat sheet?</strong>
            <span>120+ verified shortcuts across Windows, macOS, and Linux — in one printable page.</span>
        </div>
        <a class="ksi-cta-btn" href="<?php echo url('blog/keyboard-shortcuts-windows-mac-linux-complete-cheat-sheet.php'); ?>">📖 <?php echo htmlspecialchars($t['read_guide'], ENT_QUOTES, 'UTF-8'); ?></a>
    </section>
</div>
<?php $toolBlogSlug = 'keyboard-shortcuts-windows-mac-linux-complete-cheat-sheet.php'; include __DIR__ . '/includes/components/tool-blog-cta.php'; ?>
</main>
<?php include __DIR__ . '/footer.php'; ?>
<script>
(function () {
    'use strict';

    // ── Shortcut database ──────────────────────────────────────────────
    // Keys are normalized combos. Each entry maps OS -> { title, desc }.
    // Combos normalize: modifiers alphabetically (alt,ctrl,meta,shift) + main key (lowercase).
    // On Mac, Cmd key = metaKey. On Windows, Win key = metaKey. We distinguish by context (selected OS).
    const DB = {
        // Universal basics
        'ctrl+c':  { win: ['Copy', 'Copy the selection to the clipboard'], linux: ['Copy', 'Copy the selection to the clipboard'] },
        'meta+c':  { mac: ['Copy', 'Copy the selection to the clipboard'], win: ['(Unmapped — Win+C is Cortana on some Windows versions)'] },
        'ctrl+v':  { win: ['Paste', 'Paste from clipboard'], linux: ['Paste', 'Paste from clipboard'] },
        'meta+v':  { mac: ['Paste', 'Paste from clipboard'], win: ['Clipboard history (Windows 10+)', 'Opens the multi-item clipboard history'] },
        'ctrl+x':  { win: ['Cut', 'Cut the selection'], linux: ['Cut', 'Cut the selection'] },
        'meta+x':  { mac: ['Cut', 'Cut the selection'] },
        'ctrl+z':  { win: ['Undo', 'Undo the last action'], linux: ['Undo', 'Undo the last action'] },
        'meta+z':  { mac: ['Undo', 'Undo the last action'] },
        'ctrl+y':  { win: ['Redo', 'Redo the last undone action'], linux: ['Redo', 'Redo the last undone action'] },
        'meta+shift+z': { mac: ['Redo', 'Redo the last undone action'] },
        'ctrl+shift+z': { linux: ['Redo', 'Redo the last undone action'], win: ['Redo (many apps)', 'Redo in many editors'] },
        'ctrl+a':  { win: ['Select all', 'Select everything in the current view'], linux: ['Select all', 'Select everything in the current view'] },
        'meta+a':  { mac: ['Select all', 'Select everything in the current view'] },
        'ctrl+s':  { win: ['Save', 'Save the current document'], linux: ['Save', 'Save the current document'] },
        'meta+s':  { mac: ['Save', 'Save the current document'] },
        'ctrl+shift+s': { win: ['Save As', 'Save a copy with a new name'], linux: ['Save As', 'Save a copy with a new name'] },
        'meta+shift+s': { mac: ['Save As', 'Save a copy with a new name'] },
        'ctrl+n':  { win: ['New', 'Open a new document or window'], linux: ['New', 'Open a new document or window'] },
        'meta+n':  { mac: ['New', 'Open a new document or window'] },
        'ctrl+o':  { win: ['Open', 'Open an existing file'], linux: ['Open', 'Open an existing file'] },
        'meta+o':  { mac: ['Open', 'Open an existing file'] },
        'ctrl+p':  { win: ['Print', 'Print the current page or document'], linux: ['Print', 'Print the current page or document'] },
        'meta+p':  { mac: ['Print', 'Print the current page or document'] },
        'ctrl+f':  { win: ['Find', 'Find text on the current page'], linux: ['Find', 'Find text on the current page'] },
        'meta+f':  { mac: ['Find', 'Find text on the current page'] },
        'ctrl+h':  { win: ['Find & Replace', 'Find and replace text'], linux: ['Find & Replace', 'Find and replace text'] },
        'meta+h':  { mac: ['Hide the current app', 'Hide the active app window'] },
        'ctrl+shift+h': { linux: ['Show hidden files (file manager)', 'Toggle visibility of hidden files'] },

        // Formatting
        'ctrl+b':  { win: ['Bold', 'Make selected text bold'], linux: ['Bold', 'Make selected text bold'] },
        'meta+b':  { mac: ['Bold', 'Make selected text bold'] },
        'ctrl+i':  { win: ['Italic', 'Make selected text italic'], linux: ['Italic', 'Make selected text italic'] },
        'meta+i':  { mac: ['Italic', 'Make selected text italic'] },
        'ctrl+u':  { win: ['Underline', 'Underline selected text'], linux: ['Underline', 'Underline selected text'] },
        'meta+u':  { mac: ['Underline', 'Underline selected text'] },

        // Browser / tabs / windows
        'ctrl+t':  { win: ['New tab', 'Open a new browser tab'], linux: ['New tab', 'Open a new browser tab'] },
        'meta+t':  { mac: ['New tab', 'Open a new browser tab'] },
        'ctrl+w':  { win: ['Close tab / window', 'Close current tab or document'], linux: ['Close tab / window', 'Close current tab or document'] },
        'meta+w':  { mac: ['Close window', 'Close the front window'] },
        'ctrl+shift+t': { win: ['Reopen closed tab', 'Reopen the last closed browser tab'], linux: ['Reopen closed tab', 'Reopen the last closed browser tab'] },
        'meta+shift+t': { mac: ['Reopen closed tab', 'Reopen the last closed browser tab'] },
        'ctrl+tab': { win: ['Next tab', 'Switch to the next browser tab'], linux: ['Next tab', 'Switch to the next browser tab'] },
        'ctrl+shift+tab': { win: ['Previous tab', 'Switch to the previous tab'], linux: ['Previous tab', 'Switch to the previous tab'] },
        'alt+tab': { win: ['Switch apps', 'Cycle through open applications'], linux: ['Switch apps', 'Cycle through open applications'] },
        'meta+tab': { mac: ['Switch apps', 'Cycle through open applications'], win: ['Task View', 'Open the Task View timeline'] },
        'ctrl+shift+n': { win: ['New incognito window', 'Open an incognito / private browser window'], linux: ['New incognito window', 'Open an incognito / private browser window'] },
        'meta+shift+n': { mac: ['New incognito window', 'Open a private browser window'] },
        'f5':      { win: ['Refresh', 'Reload the current page'], linux: ['Refresh', 'Reload the current page'] },
        'meta+r':  { mac: ['Refresh', 'Reload the current page'] },
        'ctrl+r':  { win: ['Refresh', 'Reload the current page'], linux: ['Refresh', 'Reload the current page'] },
        'ctrl+shift+r': { win: ['Hard refresh (bypass cache)', 'Force reload ignoring cache'], linux: ['Hard refresh (bypass cache)', 'Force reload ignoring cache'] },
        'meta+shift+r': { mac: ['Hard refresh (bypass cache)', 'Force reload ignoring cache'] },
        'ctrl+f5':   { win: ['Hard refresh (bypass cache)', 'Force reload ignoring cache'] },
        'f11':     { win: ['Toggle fullscreen', 'Enter or exit fullscreen mode'], linux: ['Toggle fullscreen', 'Enter or exit fullscreen mode'] },
        'ctrl+meta+f': { mac: ['Toggle fullscreen', 'Enter or exit fullscreen mode'] },
        'alt+f4':  { win: ['Close current window', 'Quit the application / close the window'] },
        'meta+q':  { mac: ['Quit app', 'Completely quit the current app'] },

        // Zoom
        'ctrl++':  { win: ['Zoom in', 'Increase zoom level'], linux: ['Zoom in', 'Increase zoom level'] },
        'meta++':  { mac: ['Zoom in', 'Increase zoom level'] },
        'ctrl+-':  { win: ['Zoom out', 'Decrease zoom level'], linux: ['Zoom out', 'Decrease zoom level'] },
        'meta+-':  { mac: ['Zoom out', 'Decrease zoom level'] },
        'ctrl+0':  { win: ['Reset zoom', 'Return to 100% zoom'], linux: ['Reset zoom', 'Return to 100% zoom'] },
        'meta+0':  { mac: ['Reset zoom', 'Return to 100% zoom'] },

        // Developer
        'f12':     { win: ['Browser DevTools', 'Open the browser developer tools'], linux: ['Browser DevTools', 'Open the browser developer tools'] },
        'ctrl+shift+i': { win: ['DevTools', 'Open the browser developer tools'], linux: ['DevTools', 'Open the browser developer tools'] },
        'meta+alt+i': { mac: ['DevTools', 'Open the browser developer tools'] },
        'ctrl+shift+j': { win: ['DevTools Console', 'Open the JavaScript console'], linux: ['DevTools Console', 'Open the JavaScript console'] },
        'meta+alt+j': { mac: ['DevTools Console', 'Open the JavaScript console'] },

        // Address bar / bookmarks
        'ctrl+l':  { win: ['Focus address bar', 'Jump to the URL bar'], linux: ['Focus address bar', 'Jump to the URL bar'] },
        'meta+l':  { mac: ['Focus address bar', 'Jump to the URL bar'] },
        'ctrl+d':  { win: ['Bookmark page', 'Add the current page to bookmarks'], linux: ['Bookmark page', 'Add the current page to bookmarks'] },
        'meta+d':  { mac: ['Bookmark page', 'Add the current page to bookmarks'] },

        // Windows system
        'meta+d':  { win: ['Show desktop', 'Minimize all windows and show the desktop'] },
        'meta+e':  { win: ['File Explorer', 'Open the Windows file manager'] },
        'meta+i':  { win: ['Settings', 'Open Windows Settings'] },
        'meta+l':  { win: ['Lock PC', 'Lock the computer'] },
        'meta+r':  { win: ['Run dialog', 'Open the Run command box'] },
        'meta+s':  { win: ['Search', 'Open Windows Search'] },
        'meta+a':  { win: ['Action Center / Quick Settings', 'Open notifications and quick toggles'] },
        'meta+x':  { win: ['Power User menu', 'Open the quick admin menu (Device Manager, PowerShell, etc.)'] },
        'meta+shift+s': { win: ['Snipping Tool', 'Take a screenshot region'] },
        'meta+.':  { win: ['Emoji picker', 'Open the emoji & GIF picker'], mac: ['(No system equivalent)', ''] },
        'meta+,':  { mac: ['App preferences', 'Open preferences for the active app'] },
        'ctrl+shift+esc': { win: ['Task Manager', 'Open Task Manager directly'] },
        'ctrl+alt+del': { win: ['Security screen', 'Lock, switch user, sign out, or open Task Manager'] },

        // macOS system
        'meta+space': { mac: ['Spotlight', 'Open Spotlight search'] },
        'ctrl+up':    { mac: ['Mission Control', 'Show all open windows and spaces'], linux: ['(Varies by desktop)', 'Behavior depends on desktop environment'] },
        'ctrl+down':  { mac: ['App Exposé', 'Show all windows of the current app'] },
        'meta+m':     { mac: ['Minimize window', 'Minimize the front window to the Dock'] },
        'meta+alt+esc': { mac: ['Force Quit menu', 'Open the Force Quit Applications dialog'] },
        'meta+shift+3': { mac: ['Screenshot (full screen)', 'Capture the whole screen to a file'] },
        'meta+shift+4': { mac: ['Screenshot (region)', 'Drag to capture a region'] },
        'meta+shift+5': { mac: ['Screenshot toolbar', 'Open the macOS screenshot toolbar'] },
        'meta+`':     { mac: ['Cycle windows of current app', 'Rotate through open windows of the active app'] },
        'ctrl+meta+space': { mac: ['Character picker', 'Open the emoji and symbol picker'] },
        'meta+ctrl+q': { mac: ['Lock screen', 'Lock the Mac screen'] },

        // Linux (GNOME)
        'meta':       { linux: ['Activities overview', 'Open the Activities / main launcher (GNOME)'], win: ['Start menu', 'Open the Windows Start menu'] },
        'super+a':    { linux: ['Applications grid', 'Show the full app list (GNOME)'] },
        'super+tab':  { linux: ['Switch apps', 'Cycle through open applications'] },
        'super+left': { linux: ['Snap window left half', 'Tile window to the left half of the screen'] },
        'super+right':{ linux: ['Snap window right half', 'Tile window to the right half of the screen'] },
        'super+up':   { linux: ['Maximize window', 'Maximize the active window'] },
        'super+down': { linux: ['Restore / minimize', 'Restore or un-maximize the window'] },
        'super+h':    { linux: ['Minimize window', 'Minimize the active window'] },
        'super+d':    { linux: ['Show desktop', 'Minimize all windows and show the desktop'] },
        'super+l':    { linux: ['Lock screen', 'Lock the Linux screen'] },
        'super+v':    { linux: ['Notification tray', 'Toggle the notifications tray'] },
        'ctrl+alt+t': { linux: ['Open terminal', 'Open a new terminal window (most distros)'] },
        'ctrl+alt+l': { linux: ['Lock screen', 'Lock the session'] },
        'ctrl+alt+delete': { linux: ['Logout', 'Open logout dialog'] },
    };

    // Localized action label translations. Only for commonly triggered labels; rest stay in English.
    const TR = <?php echo json_encode([
        'Copy' => ['es' => 'Copiar', 'fr' => 'Copier', 'de' => 'Kopieren', 'ja' => 'コピー', 'ko' => '복사', 'pt' => 'Copiar', 'ar' => 'نسخ', 'ru' => 'Копировать'],
        'Paste' => ['es' => 'Pegar', 'fr' => 'Coller', 'de' => 'Einfügen', 'ja' => '貼り付け', 'ko' => '붙여넣기', 'pt' => 'Colar', 'ar' => 'لصق', 'ru' => 'Вставить'],
        'Cut' => ['es' => 'Cortar', 'fr' => 'Couper', 'de' => 'Ausschneiden', 'ja' => '切り取り', 'ko' => '잘라내기', 'pt' => 'Recortar', 'ar' => 'قص', 'ru' => 'Вырезать'],
        'Undo' => ['es' => 'Deshacer', 'fr' => 'Annuler', 'de' => 'Rückgängig', 'ja' => '元に戻す', 'ko' => '실행 취소', 'pt' => 'Desfazer', 'ar' => 'تراجع', 'ru' => 'Отменить'],
        'Redo' => ['es' => 'Rehacer', 'fr' => 'Rétablir', 'de' => 'Wiederherstellen', 'ja' => 'やり直し', 'ko' => '다시 실행', 'pt' => 'Refazer', 'ar' => 'إعادة', 'ru' => 'Повторить'],
        'Select all' => ['es' => 'Seleccionar todo', 'fr' => 'Tout sélectionner', 'de' => 'Alles auswählen', 'ja' => 'すべて選択', 'ko' => '모두 선택', 'pt' => 'Selecionar tudo', 'ar' => 'تحديد الكل', 'ru' => 'Выделить всё'],
        'Save' => ['es' => 'Guardar', 'fr' => 'Enregistrer', 'de' => 'Speichern', 'ja' => '保存', 'ko' => '저장', 'pt' => 'Salvar', 'ar' => 'حفظ', 'ru' => 'Сохранить'],
        'New' => ['es' => 'Nuevo', 'fr' => 'Nouveau', 'de' => 'Neu', 'ja' => '新規', 'ko' => '새로 만들기', 'pt' => 'Novo', 'ar' => 'جديد', 'ru' => 'Новый'],
        'Open' => ['es' => 'Abrir', 'fr' => 'Ouvrir', 'de' => 'Öffnen', 'ja' => '開く', 'ko' => '열기', 'pt' => 'Abrir', 'ar' => 'فتح', 'ru' => 'Открыть'],
        'Print' => ['es' => 'Imprimir', 'fr' => 'Imprimer', 'de' => 'Drucken', 'ja' => '印刷', 'ko' => '인쇄', 'pt' => 'Imprimir', 'ar' => 'طباعة', 'ru' => 'Печать'],
        'Find' => ['es' => 'Buscar', 'fr' => 'Rechercher', 'de' => 'Suchen', 'ja' => '検索', 'ko' => '찾기', 'pt' => 'Localizar', 'ar' => 'بحث', 'ru' => 'Найти'],
        'Find & Replace' => ['es' => 'Buscar y reemplazar', 'fr' => 'Rechercher et remplacer', 'de' => 'Suchen und ersetzen', 'ja' => '検索と置換', 'ko' => '찾기 및 바꾸기', 'pt' => 'Localizar e substituir', 'ar' => 'بحث واستبدال', 'ru' => 'Найти и заменить'],
        'Bold' => ['es' => 'Negrita', 'fr' => 'Gras', 'de' => 'Fett', 'ja' => '太字', 'ko' => '굵게', 'pt' => 'Negrito', 'ar' => 'غامق', 'ru' => 'Жирный'],
        'Italic' => ['es' => 'Cursiva', 'fr' => 'Italique', 'de' => 'Kursiv', 'ja' => '斜体', 'ko' => '기울임', 'pt' => 'Itálico', 'ar' => 'مائل', 'ru' => 'Курсив'],
        'Underline' => ['es' => 'Subrayado', 'fr' => 'Souligné', 'de' => 'Unterstrichen', 'ja' => '下線', 'ko' => '밑줄', 'pt' => 'Sublinhado', 'ar' => 'تسطير', 'ru' => 'Подчёркнутый'],
        'New tab' => ['es' => 'Nueva pestaña', 'fr' => 'Nouvel onglet', 'de' => 'Neuer Tab', 'ja' => '新しいタブ', 'ko' => '새 탭', 'pt' => 'Nova aba', 'ar' => 'علامة تبويب جديدة', 'ru' => 'Новая вкладка'],
        'Close tab / window' => ['es' => 'Cerrar pestaña / ventana', 'fr' => 'Fermer onglet / fenêtre', 'de' => 'Tab / Fenster schließen', 'ja' => 'タブ／ウィンドウを閉じる', 'ko' => '탭 / 창 닫기', 'pt' => 'Fechar aba / janela', 'ar' => 'إغلاق التبويب / النافذة', 'ru' => 'Закрыть вкладку / окно'],
        'Close window' => ['es' => 'Cerrar ventana', 'fr' => 'Fermer la fenêtre', 'de' => 'Fenster schließen', 'ja' => 'ウィンドウを閉じる', 'ko' => '창 닫기', 'pt' => 'Fechar janela', 'ar' => 'إغلاق النافذة', 'ru' => 'Закрыть окно'],
        'Reopen closed tab' => ['es' => 'Reabrir pestaña cerrada', 'fr' => 'Rouvrir l\'onglet fermé', 'de' => 'Geschlossenen Tab wiederherstellen', 'ja' => '閉じたタブを再度開く', 'ko' => '닫힌 탭 다시 열기', 'pt' => 'Reabrir aba fechada', 'ar' => 'إعادة فتح تبويب مغلق', 'ru' => 'Восстановить закрытую вкладку'],
        'Next tab' => ['es' => 'Siguiente pestaña', 'fr' => 'Onglet suivant', 'de' => 'Nächster Tab', 'ja' => '次のタブ', 'ko' => '다음 탭', 'pt' => 'Próxima aba', 'ar' => 'التبويب التالي', 'ru' => 'Следующая вкладка'],
        'Previous tab' => ['es' => 'Pestaña anterior', 'fr' => 'Onglet précédent', 'de' => 'Vorheriger Tab', 'ja' => '前のタブ', 'ko' => '이전 탭', 'pt' => 'Aba anterior', 'ar' => 'التبويب السابق', 'ru' => 'Предыдущая вкладка'],
        'Switch apps' => ['es' => 'Cambiar de app', 'fr' => 'Changer d\'application', 'de' => 'App wechseln', 'ja' => 'アプリ切り替え', 'ko' => '앱 전환', 'pt' => 'Alternar apps', 'ar' => 'التبديل بين التطبيقات', 'ru' => 'Переключение приложений'],
        'Refresh' => ['es' => 'Actualizar', 'fr' => 'Actualiser', 'de' => 'Aktualisieren', 'ja' => '更新', 'ko' => '새로 고침', 'pt' => 'Atualizar', 'ar' => 'تحديث', 'ru' => 'Обновить'],
        'Toggle fullscreen' => ['es' => 'Pantalla completa', 'fr' => 'Plein écran', 'de' => 'Vollbild', 'ja' => '全画面表示', 'ko' => '전체 화면', 'pt' => 'Tela cheia', 'ar' => 'شاشة كاملة', 'ru' => 'Полноэкранный режим'],
        'Zoom in' => ['es' => 'Acercar', 'fr' => 'Zoom avant', 'de' => 'Vergrößern', 'ja' => '拡大', 'ko' => '확대', 'pt' => 'Mais zoom', 'ar' => 'تكبير', 'ru' => 'Увеличить'],
        'Zoom out' => ['es' => 'Alejar', 'fr' => 'Zoom arrière', 'de' => 'Verkleinern', 'ja' => '縮小', 'ko' => '축소', 'pt' => 'Menos zoom', 'ar' => 'تصغير', 'ru' => 'Уменьшить'],
        'Reset zoom' => ['es' => 'Restablecer zoom', 'fr' => 'Réinitialiser zoom', 'de' => 'Zoom zurücksetzen', 'ja' => 'ズームをリセット', 'ko' => '확대/축소 초기화', 'pt' => 'Redefinir zoom', 'ar' => 'إعادة ضبط التكبير', 'ru' => 'Сбросить масштаб'],
        'Focus address bar' => ['es' => 'Enfocar barra de direcciones', 'fr' => 'Focus barre d\'adresse', 'de' => 'Adressleiste fokussieren', 'ja' => 'アドレスバーにフォーカス', 'ko' => '주소 표시줄로 이동', 'pt' => 'Foco na barra de endereços', 'ar' => 'التركيز على شريط العنوان', 'ru' => 'Фокус на адресную строку'],
        'Bookmark page' => ['es' => 'Marcar página', 'fr' => 'Ajouter aux favoris', 'de' => 'Lesezeichen hinzufügen', 'ja' => 'ブックマークに追加', 'ko' => '북마크 추가', 'pt' => 'Adicionar aos favoritos', 'ar' => 'إضافة إشارة مرجعية', 'ru' => 'Добавить в закладки'],
        'Show desktop' => ['es' => 'Mostrar escritorio', 'fr' => 'Afficher le bureau', 'de' => 'Desktop anzeigen', 'ja' => 'デスクトップを表示', 'ko' => '바탕 화면 표시', 'pt' => 'Mostrar área de trabalho', 'ar' => 'إظهار سطح المكتب', 'ru' => 'Показать рабочий стол'],
        'Lock PC' => ['es' => 'Bloquear PC', 'fr' => 'Verrouiller le PC', 'de' => 'PC sperren', 'ja' => 'PCをロック', 'ko' => 'PC 잠금', 'pt' => 'Bloquear PC', 'ar' => 'قفل الكمبيوتر', 'ru' => 'Заблокировать ПК'],
        'File Explorer' => ['es' => 'Explorador de archivos', 'fr' => 'Explorateur de fichiers', 'de' => 'Datei-Explorer', 'ja' => 'エクスプローラー', 'ko' => '파일 탐색기', 'pt' => 'Explorador de arquivos', 'ar' => 'مستعرض الملفات', 'ru' => 'Проводник'],
        'Settings' => ['es' => 'Configuración', 'fr' => 'Paramètres', 'de' => 'Einstellungen', 'ja' => '設定', 'ko' => '설정', 'pt' => 'Configurações', 'ar' => 'الإعدادات', 'ru' => 'Настройки'],
        'Search' => ['es' => 'Buscar', 'fr' => 'Rechercher', 'de' => 'Suche', 'ja' => '検索', 'ko' => '검색', 'pt' => 'Pesquisar', 'ar' => 'بحث', 'ru' => 'Поиск'],
        'Emoji picker' => ['es' => 'Selector de emoji', 'fr' => 'Sélecteur d\'emoji', 'de' => 'Emoji-Auswahl', 'ja' => '絵文字ピッカー', 'ko' => '이모지 선택기', 'pt' => 'Seletor de emoji', 'ar' => 'منتقي الرموز التعبيرية', 'ru' => 'Выбор эмодзи'],
        'Spotlight' => ['es' => 'Spotlight', 'fr' => 'Spotlight', 'de' => 'Spotlight', 'ja' => 'Spotlight検索', 'ko' => 'Spotlight 검색', 'pt' => 'Spotlight', 'ar' => 'Spotlight', 'ru' => 'Spotlight'],
        'Task Manager' => ['es' => 'Administrador de tareas', 'fr' => 'Gestionnaire de tâches', 'de' => 'Task-Manager', 'ja' => 'タスクマネージャー', 'ko' => '작업 관리자', 'pt' => 'Gerenciador de tarefas', 'ar' => 'إدارة المهام', 'ru' => 'Диспетчер задач'],
        'Activities overview' => ['es' => 'Vista de actividades', 'fr' => 'Vue d\'ensemble des activités', 'de' => 'Aktivitäten-Übersicht', 'ja' => 'アクティビティビュー', 'ko' => '활동 개요', 'pt' => 'Visão geral de atividades', 'ar' => 'عرض الأنشطة', 'ru' => 'Обзор активностей'],
        'Open terminal' => ['es' => 'Abrir terminal', 'fr' => 'Ouvrir le terminal', 'de' => 'Terminal öffnen', 'ja' => 'ターミナルを開く', 'ko' => '터미널 열기', 'pt' => 'Abrir terminal', 'ar' => 'فتح الطرفية', 'ru' => 'Открыть терминал'],
    ]); ?>;

    const LANG = <?php echo json_encode($lang); ?>;
    const UI_PRESSED_TITLE = <?php echo json_encode($t['what_is']); ?>;
    const UI_UNKNOWN_TITLE = <?php echo json_encode($t['unknown_title']); ?>;
    const UI_UNKNOWN_BODY = <?php echo json_encode($t['unknown_body']); ?>;
    const UI_OS_WIN = <?php echo json_encode($t['os_win']); ?>;
    const UI_OS_MAC = <?php echo json_encode($t['os_mac']); ?>;
    const UI_OS_LINUX = <?php echo json_encode($t['os_linux']); ?>;

    // Auto-detect OS
    function detectOS() {
        const ua = navigator.userAgent || '';
        if (/Mac|iPhone|iPod|iPad/i.test(ua)) return 'macos';
        if (/Linux/i.test(ua) && !/Android/i.test(ua)) return 'linux';
        return 'windows';
    }
    let currentOS = detectOS();

    const $ = (id) => document.getElementById(id);
    const stage = $('ksi-stage');
    const placeholder = $('ksi-placeholder');
    const result = $('ksi-result');
    const pressedCombo = $('ksi-pressed-combo');
    const actionCard = $('ksi-action-card');
    const actionTitle = $('ksi-action-title');
    const actionDesc = $('ksi-action-desc');
    const otherOsBox = $('ksi-other-os');
    const otherOsList = $('ksi-other-os-list');

    function updateOSButtons() {
        document.querySelectorAll('.ksi-os-btn').forEach(btn => {
            btn.classList.toggle('is-active', btn.dataset.os === currentOS);
            btn.setAttribute('aria-selected', btn.dataset.os === currentOS ? 'true' : 'false');
        });
    }
    document.querySelectorAll('.ksi-os-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            currentOS = btn.dataset.os;
            updateOSButtons();
        });
    });
    updateOSButtons();

    // Friendly key labels
    function friendlyKey(code, key) {
        const map = {
            'Space': 'Space', 'Enter': 'Enter', 'Escape': 'Esc', 'Tab': 'Tab',
            'Backspace': '⌫', 'Delete': 'Del',
            'ArrowUp': '↑', 'ArrowDown': '↓', 'ArrowLeft': '←', 'ArrowRight': '→',
            'Home': 'Home', 'End': 'End', 'PageUp': 'PgUp', 'PageDown': 'PgDn',
            'CapsLock': 'Caps',
        };
        if (map[code]) return map[code];
        if (code && code.startsWith('Key'))    return code.slice(3);
        if (code && code.startsWith('Digit'))  return code.slice(5);
        if (code && code.startsWith('F') && /^F\d{1,2}$/.test(code)) return code;
        return (key || '').length === 1 ? key.toUpperCase() : (key || '');
    }

    // Build a canonical combo string for DB lookup
    // mods alphabetical: alt, ctrl, meta, shift, super  —— we use 'meta' for Cmd/Win (browser doesn't distinguish)
    function buildCombo(e) {
        const mods = [];
        if (e.altKey)   mods.push('alt');
        if (e.ctrlKey)  mods.push('ctrl');
        if (e.metaKey)  mods.push('meta');
        if (e.shiftKey) mods.push('shift');
        // Get the main key
        let main = '';
        const code = e.code || '';
        if (code.startsWith('Key'))    main = code.slice(3).toLowerCase();
        else if (code.startsWith('Digit')) main = code.slice(5);
        else if (code === 'Space')     main = 'space';
        else if (code === 'Enter')     main = 'enter';
        else if (code === 'Tab')       main = 'tab';
        else if (code === 'Escape')    main = 'escape';
        else if (code === 'Backspace') main = 'backspace';
        else if (code === 'Delete')    main = 'delete';
        else if (code === 'ArrowUp')   main = 'up';
        else if (code === 'ArrowDown') main = 'down';
        else if (code === 'ArrowLeft') main = 'left';
        else if (code === 'ArrowRight')main = 'right';
        else if (code === 'Home')      main = 'home';
        else if (code === 'End')       main = 'end';
        else if (code === 'PageUp')    main = 'pageup';
        else if (code === 'PageDown')  main = 'pagedown';
        else if (code === 'Minus')     main = '-';
        else if (code === 'Equal')     main = '+';
        else if (code === 'Comma')     main = ',';
        else if (code === 'Period')    main = '.';
        else if (code === 'Slash')     main = '/';
        else if (code === 'Backslash') main = '\\';
        else if (code === 'Quote')     main = "'";
        else if (code === 'Semicolon') main = ';';
        else if (code === 'Backquote') main = '`';
        else if (/^F\d{1,2}$/.test(code)) main = code.toLowerCase();
        else if (code.startsWith('Meta') || code.startsWith('Os')) main = ''; // modifier alone
        else if (code.startsWith('Control') || code.startsWith('Alt') || code.startsWith('Shift')) main = '';
        else main = (e.key || '').toLowerCase();

        if (!main) return mods.join('+');
        return mods.length ? mods.join('+') + '+' + main : main;
    }

    function translateLabel(en) {
        if (!en) return '';
        if (LANG === 'en' || !TR[en] || !TR[en][LANG]) return en;
        return TR[en][LANG];
    }

    function osLabel(os) {
        return os === 'macos' ? UI_OS_MAC : (os === 'linux' ? UI_OS_LINUX : UI_OS_WIN);
    }
    function osPillClass(os) { return os === 'macos' ? 'mac' : (os === 'linux' ? 'linux' : 'win'); }

    function renderKeys(e) {
        pressedCombo.innerHTML = '';
        const mods = [];
        if (e.ctrlKey)  mods.push('Ctrl');
        if (currentOS === 'macos' && e.metaKey)  mods.push('Cmd');
        if (currentOS === 'windows' && e.metaKey) mods.push('Win');
        if (currentOS === 'linux' && e.metaKey)  mods.push('Super');
        if (e.altKey)   mods.push(currentOS === 'macos' ? 'Opt' : 'Alt');
        if (e.shiftKey) mods.push('Shift');
        const main = friendlyKey(e.code || '', e.key || '');
        const parts = [];
        mods.forEach(m => parts.push(m));
        if (main && !['Control','Shift','Alt','Meta','OS'].includes(main)) parts.push(main);
        parts.forEach((p, i) => {
            const keyEl = document.createElement('span');
            keyEl.className = 'ksi-key';
            keyEl.textContent = p;
            pressedCombo.appendChild(keyEl);
            if (i < parts.length - 1) {
                const plus = document.createElement('span');
                plus.className = 'ksi-plus';
                plus.textContent = '+';
                pressedCombo.appendChild(plus);
            }
        });
    }

    function lookup(combo) {
        const entry = DB[combo];
        if (!entry) return null;
        const perOs = entry[currentOS === 'macos' ? 'mac' : (currentOS === 'linux' ? 'linux' : 'win')];
        return { entry, primary: perOs };
    }

    function showResult(e, combo) {
        placeholder.hidden = true;
        result.hidden = false;
        renderKeys(e);

        const hit = lookup(combo);
        if (!hit || !hit.primary) {
            actionCard.classList.add('ksi-unknown');
            actionTitle.textContent = UI_UNKNOWN_TITLE;
            actionDesc.textContent = UI_UNKNOWN_BODY;
            otherOsBox.hidden = true;
            return;
        }
        actionCard.classList.remove('ksi-unknown');
        const [title, desc] = Array.isArray(hit.primary) ? hit.primary : [hit.primary, ''];
        actionTitle.textContent = translateLabel(title);
        actionDesc.textContent = desc || '';

        // Other OS equivalents (raw labels, for reference)
        const otherOsResults = [];
        for (const osKey of ['win', 'mac', 'linux']) {
            const ours = currentOS === 'macos' ? 'mac' : (currentOS === 'linux' ? 'linux' : 'win');
            if (osKey === ours) continue;
            const v = hit.entry[osKey];
            if (v && v[0]) {
                otherOsResults.push({ os: osKey === 'win' ? 'windows' : osKey === 'mac' ? 'macos' : 'linux', title: v[0] });
            }
        }
        if (otherOsResults.length) {
            otherOsList.innerHTML = '';
            for (const r of otherOsResults) {
                const li = document.createElement('li');
                const pill = document.createElement('span');
                pill.className = 'ksi-os-pill ' + osPillClass(r.os);
                pill.textContent = osLabel(r.os);
                const label = document.createElement('span');
                label.textContent = translateLabel(r.title);
                li.appendChild(pill); li.appendChild(label);
                otherOsList.appendChild(li);
            }
            otherOsBox.hidden = false;
        } else {
            otherOsBox.hidden = true;
        }
    }

    document.addEventListener('keydown', function (e) {
        // Ignore pure-modifier presses
        if (['Control','Shift','Alt','Meta','OS','ContextMenu','CapsLock'].includes(e.key)) {
            return;
        }
        // Don't block useful combos (Ctrl+T etc.) — but DO suppress default on the known ones to show the result visibly.
        // Only preventDefault inside the stage region by checking focus. To keep it safe, we only preventDefault if focus is NOT in an input.
        const tag = (document.activeElement && document.activeElement.tagName) || '';
        if (tag !== 'INPUT' && tag !== 'TEXTAREA') {
            // Prevent browser's own shortcut only for simple single-letter combos (to keep ESC/F5/etc working for browser)
            // We DON'T prevent default — user may still expect Ctrl+T to open a tab. Tool just reflects what they pressed.
        }
        const combo = buildCombo(e);
        showResult(e, combo);
    });

    // Reset
    $('ksi-reset').addEventListener('click', function () {
        placeholder.hidden = false;
        result.hidden = true;
        pressedCombo.innerHTML = '';
        actionTitle.textContent = '';
        actionDesc.textContent = '';
        otherOsBox.hidden = true;
    });

    // Focus stage on load so key events register without click
    setTimeout(function () { try { stage.focus(); } catch (_) {} }, 50);
})();
</script>
</body>
</html>
