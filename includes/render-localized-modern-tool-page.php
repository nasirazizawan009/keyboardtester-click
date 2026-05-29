<?php
/**
 * Localized modern tool-page renderer.
 *
 * Intentionally separate from render-english-tool-page.php because the English
 * renderer depends on English route discovery and English-only helper context.
 */
if (empty($localizedModernToolPage) || !is_array($localizedModernToolPage)) {
    return;
}

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/components/adsense-slot.php';
require_once __DIR__ . '/components/microsoft-store-badge.php';
require_once __DIR__ . '/components/responsive-image.php';
require_once __DIR__ . '/components/tool-list-renderer.php';
require_once __DIR__ . '/components/tool-popular-tools.php';

if (!function_exists('kbtLmCleanUtf8')) {
    function kbtLmCleanUtf8($value)
    {
        $value = (string) $value;
        if ($value === '') {
            return '';
        }

        if (function_exists('mb_check_encoding') && !mb_check_encoding($value, 'UTF-8')) {
            $converted = @mb_convert_encoding($value, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
            if (is_string($converted)) {
                $value = $converted;
            }
        }

        if (function_exists('iconv')) {
            $converted = @iconv('UTF-8', 'UTF-8//IGNORE', $value);
            if (is_string($converted)) {
                $value = $converted;
            }
        }

        $cleaned = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $value);
        return is_string($cleaned) ? $cleaned : '';
    }
}

if (!function_exists('kbtLmCleanValue')) {
    function kbtLmCleanValue($value)
    {
        if (is_array($value)) {
            foreach ($value as $key => $item) {
                $value[$key] = kbtLmCleanValue($item);
            }
            return $value;
        }

        return is_string($value) ? kbtLmCleanUtf8($value) : $value;
    }
}

if (!function_exists('kbtLmJson')) {
    function kbtLmJson($value)
    {
        $flags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
        if (defined('JSON_INVALID_UTF8_SUBSTITUTE')) {
            $flags |= JSON_INVALID_UTF8_SUBSTITUTE;
        }

        $json = json_encode($value, $flags);
        if ($json === false) {
            $json = json_encode(kbtLmCleanValue($value), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }

        return is_string($json) && $json !== '' ? $json : '{}';
    }
}

if (!function_exists('kbtLmEsc')) {
    function kbtLmEsc($value)
    {
        return htmlspecialchars(kbtLmCleanUtf8($value), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

if (!function_exists('kbtLmTextLength')) {
    function kbtLmTextLength($value)
    {
        $value = kbtLmCleanUtf8($value);
        if (function_exists('mb_strlen')) {
            return mb_strlen($value, 'UTF-8');
        }

        if (preg_match_all('/./us', $value, $matches)) {
            return count($matches[0]);
        }

        return strlen($value);
    }
}

if (!function_exists('kbtLmAnswerReadyDescription')) {
    function kbtLmAnswerReadyDescription($locale, $description, $title, $categoryLabel)
    {
        $description = kbtLmCleanUtf8($description);
        $title = kbtLmCleanUtf8($title);
        $categoryLabel = kbtLmCleanUtf8($categoryLabel);
        $normalized = preg_replace('/\s+/u', ' ', $description);
        $description = trim(is_string($normalized) ? $normalized : $description);
        if ($description === '') {
            $description = trim($title);
        }

        if (kbtLmTextLength($description) >= 150) {
            return $description;
        }

        $suffixes = [
            'ar' => ' يعمل مباشرة في المتصفح بدون تنزيل أو تسجيل، مع نتائج فورية وروابط لاختبارات الأجهزة ذات الصلة.',
            'fr' => ' Fonctionne directement dans le navigateur, sans telechargement ni compte, avec des resultats rapides et des outils associes.',
            'de' => ' Laeuft direkt im Browser ohne Download oder Konto, mit schnellen Ergebnissen und passenden weiteren Hardwaretests.',
            'ja' => ' ブラウザだけで実行でき、ダウンロードや登録は不要です。結果をすぐ確認し、関連するハードウェアテストにも移動できます。',
            'ko' => ' 브라우저에서 바로 실행되며 다운로드나 가입이 필요 없습니다. 결과를 즉시 확인하고 관련 하드웨어 테스트로 이동할 수 있습니다.',
            'pt' => ' Roda direto no navegador, sem download ou cadastro, com resultados rapidos e links para testes de hardware relacionados.',
            'ru' => ' Работает прямо в браузере без скачивания и регистрации, показывает быстрые результаты и ссылки на связанные проверки оборудования.',
            'es' => ' Funciona directamente en el navegador, sin descarga ni registro, con resultados rapidos y enlaces a pruebas de hardware relacionadas.',
        ];

        $expanded = rtrim($description, ".。؟! ") . '.' . ($suffixes[$locale] ?? ' Runs directly in the browser with no download or sign-up, instant results, and links to related hardware checks.');
        // No English fallback sentence on localized pages: the flat 150-char check tripped for
        // character-dense CJK and leaked English into Korean/Japanese/Arabic meta descriptions.

        return kbtLmCleanUtf8($expanded);
    }
}

if (!function_exists('kbtLmUrl')) {
    function kbtLmUrl($path)
    {
        return htmlspecialchars(url(ltrim((string) $path, '/')), ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('kbtLmAbsoluteUrl')) {
    function kbtLmAbsoluteUrl($path)
    {
        $path = (string) $path;
        if (preg_match('~^https?://~i', $path)) {
            return $path;
        }
        return absoluteUrl(ltrim($path, '/'));
    }
}

if (!function_exists('kbtLmCategoryHref')) {
    function kbtLmCategoryHref($locale, $category)
    {
        $localizedAllToolsRoutes = [
            'es' => 'pages/all-tools-es.php',
            'fr' => 'pages/all-tools-fr.php',
            'de' => 'pages/all-tools-de.php',
            'pt' => 'pages/all-tools-pt.php',
            'ar' => 'pages/all-tools-ar.php',
            'ru' => 'pages/all-tools-ru.php',
            'ja' => 'pages/all-tools-ja.php',
            'ko' => 'pages/all-tools-ko.php',
        ];
        $base = $localizedAllToolsRoutes[$locale] ?? 'pages/all-tools.php';
        return url($base . '#' . $category);
    }
}

if (!function_exists('kbtLmCategoryLabels')) {
    function kbtLmCategoryLabels($locale)
    {
        $labels = [
            'en' => [
                'aria' => 'Browse tool categories',
                'items' => [
                    'keyboard' => ['title' => 'Keyboard', 'copy' => 'Keys, typing, ghosting'],
                    'mouse' => ['title' => 'Mouse', 'copy' => 'Clicks, DPI, trails'],
                    'display' => ['title' => 'Display', 'copy' => 'Pixels, color, refresh'],
                    'camera' => ['title' => 'Camera', 'copy' => 'Webcam and resolution'],
                    'audio' => ['title' => 'Audio', 'copy' => 'Mic and speaker checks'],
                    'utility' => ['title' => 'Utilities', 'copy' => 'QR, OCR, passwords'],
                    'gaming' => ['title' => 'Gaming', 'copy' => 'Latency and speed'],
                ],
            ],
            'es' => [
                'aria' => 'Explorar categorias de herramientas',
                'items' => [
                    'keyboard' => ['title' => 'Teclado', 'copy' => 'Teclas y escritura'],
                    'mouse' => ['title' => 'Mouse', 'copy' => 'Clics, DPI y rastro'],
                    'display' => ['title' => 'Pantalla', 'copy' => 'Pixeles, color, refresco'],
                    'camera' => ['title' => 'Camara', 'copy' => 'Webcam y resolucion'],
                    'audio' => ['title' => 'Audio', 'copy' => 'Microfono y altavoces'],
                    'utility' => ['title' => 'Utilidades', 'copy' => 'QR, OCR y claves'],
                    'gaming' => ['title' => 'Gaming', 'copy' => 'Latencia y velocidad'],
                ],
            ],
            'fr' => [
                'aria' => 'Explorer les categories d outils',
                'items' => [
                    'keyboard' => ['title' => 'Clavier', 'copy' => 'Touches et saisie'],
                    'mouse' => ['title' => 'Souris', 'copy' => 'Clics, DPI, traces'],
                    'display' => ['title' => 'Ecran', 'copy' => 'Pixels, couleur, Hz'],
                    'camera' => ['title' => 'Camera', 'copy' => 'Webcam et resolution'],
                    'audio' => ['title' => 'Audio', 'copy' => 'Micro et haut-parleurs'],
                    'utility' => ['title' => 'Utilitaires', 'copy' => 'QR, OCR, mots de passe'],
                    'gaming' => ['title' => 'Gaming', 'copy' => 'Latence et vitesse'],
                ],
            ],
            'de' => [
                'aria' => 'Tool-Kategorien durchsuchen',
                'items' => [
                    'keyboard' => ['title' => 'Tastatur', 'copy' => 'Tasten und Tippen'],
                    'mouse' => ['title' => 'Maus', 'copy' => 'Klicks, DPI, Spuren'],
                    'display' => ['title' => 'Display', 'copy' => 'Pixel, Farbe, Hz'],
                    'camera' => ['title' => 'Kamera', 'copy' => 'Webcam und Auflosung'],
                    'audio' => ['title' => 'Audio', 'copy' => 'Mikrofon und Lautsprecher'],
                    'utility' => ['title' => 'Werkzeuge', 'copy' => 'QR, OCR, Passworter'],
                    'gaming' => ['title' => 'Gaming', 'copy' => 'Latenz und Tempo'],
                ],
            ],
            'pt' => [
                'aria' => 'Explorar categorias de ferramentas',
                'items' => [
                    'keyboard' => ['title' => 'Teclado', 'copy' => 'Teclas e digitacao'],
                    'mouse' => ['title' => 'Mouse', 'copy' => 'Cliques, DPI e trilhas'],
                    'display' => ['title' => 'Tela', 'copy' => 'Pixels, cor, Hz'],
                    'camera' => ['title' => 'Camera', 'copy' => 'Webcam e resolucao'],
                    'audio' => ['title' => 'Audio', 'copy' => 'Microfone e alto-falantes'],
                    'utility' => ['title' => 'Utilitarios', 'copy' => 'QR, OCR e senhas'],
                    'gaming' => ['title' => 'Gaming', 'copy' => 'Latencia e velocidade'],
                ],
            ],
            'ar' => [
                'aria' => 'تصفح فئات الأدوات',
                'items' => [
                    'keyboard' => ['title' => 'لوحة المفاتيح', 'copy' => 'الأزرار والكتابة'],
                    'mouse' => ['title' => 'الماوس', 'copy' => 'النقرات و DPI'],
                    'display' => ['title' => 'الشاشة', 'copy' => 'البكسل واللون والتحديث'],
                    'camera' => ['title' => 'الكاميرا', 'copy' => 'الويبكام والدقة'],
                    'audio' => ['title' => 'الصوت', 'copy' => 'الميكروفون والسماعات'],
                    'utility' => ['title' => 'الأدوات', 'copy' => 'QR و OCR وكلمات المرور'],
                    'gaming' => ['title' => 'الألعاب', 'copy' => 'الزمن والسرعة'],
                ],
            ],
            'ru' => [
                'aria' => 'Просмотр категорий инструментов',
                'items' => [
                    'keyboard' => ['title' => 'Клавиатура', 'copy' => 'Клавиши и набор'],
                    'mouse' => ['title' => 'Мышь', 'copy' => 'Клики, DPI, след'],
                    'display' => ['title' => 'Экран', 'copy' => 'Пиксели, цвет, Hz'],
                    'camera' => ['title' => 'Камера', 'copy' => 'Вебкамера и разрешение'],
                    'audio' => ['title' => 'Аудио', 'copy' => 'Микрофон и динамики'],
                    'utility' => ['title' => 'Утилиты', 'copy' => 'QR, OCR, пароли'],
                    'gaming' => ['title' => 'Игры', 'copy' => 'Задержка и скорость'],
                ],
            ],
            'ja' => [
                'aria' => 'ツールカテゴリを見る',
                'items' => [
                    'keyboard' => ['title' => 'キーボード', 'copy' => 'キー入力と反応'],
                    'mouse' => ['title' => 'マウス', 'copy' => 'クリック、DPI、軌跡'],
                    'display' => ['title' => '画面', 'copy' => 'ピクセル、色、Hz'],
                    'camera' => ['title' => 'カメラ', 'copy' => 'Webカメラと解像度'],
                    'audio' => ['title' => 'オーディオ', 'copy' => 'マイクとスピーカー'],
                    'utility' => ['title' => 'ツール', 'copy' => 'QR、OCR、パスワード'],
                    'gaming' => ['title' => 'ゲーム', 'copy' => '遅延と速度'],
                ],
            ],
            'ko' => [
                'aria' => '도구 카테고리 보기',
                'items' => [
                    'keyboard' => ['title' => '키보드', 'copy' => '키와 입력 테스트'],
                    'mouse' => ['title' => '마우스', 'copy' => '클릭, DPI, 이동'],
                    'display' => ['title' => '화면', 'copy' => '픽셀, 색상, Hz'],
                    'camera' => ['title' => '카메라', 'copy' => '웹캠과 해상도'],
                    'audio' => ['title' => '오디오', 'copy' => '마이크와 스피커'],
                    'utility' => ['title' => '유틸리티', 'copy' => 'QR, OCR, 비밀번호'],
                    'gaming' => ['title' => '게임', 'copy' => '지연 시간과 속도'],
                ],
            ],
        ];
        return $labels[$locale] ?? $labels['en'];
    }
}

if (!function_exists('kbtLmIconSvg')) {
    function kbtLmIconSvg($category)
    {
        $icons = [
            'keyboard' => '<svg viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="12" rx="2"/><path d="M7 10h.01M10 10h.01M13 10h.01M16 10h.01M7 14h10"/></svg>',
            'mouse' => '<svg viewBox="0 0 24 24"><rect x="7" y="3" width="10" height="18" rx="5"/><path d="M12 7v4"/></svg>',
            'display' => '<svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M8 20h8M12 16v4"/></svg>',
            'camera' => '<svg viewBox="0 0 24 24"><path d="M5 7h3l1.5-2h5L16 7h3a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2z"/><circle cx="12" cy="13" r="3"/></svg>',
            'audio' => '<svg viewBox="0 0 24 24"><path d="M4 14v-2a8 8 0 0 1 16 0v2"/><rect x="3" y="13" width="4" height="7" rx="2"/><rect x="17" y="13" width="4" height="7" rx="2"/></svg>',
            'utility' => '<svg viewBox="0 0 24 24"><path d="M14.7 6.3a4 4 0 0 0-5 5L4 17v3h3l5.7-5.7a4 4 0 0 0 5-5l-2.8 2.8-2-2 2.8-2.8z"/></svg>',
            'gaming' => '<svg viewBox="0 0 24 24"><path d="M6 12h4m-2-2v4"/><path d="M15 13h.01M18 11h.01"/><path d="M5 9h14l1.5 7a3 3 0 0 1-5.2 2L13 16h-2l-2.3 2a3 3 0 0 1-5.2-2L5 9z"/></svg>',
        ];
        return $icons[$category] ?? $icons['utility'];
    }
}

if (!function_exists('kbtLmRenderCategoryBand')) {
    function kbtLmRenderCategoryBand($locale)
    {
        $meta = kbtLmCategoryLabels($locale);
        $items = $meta['items'];
        $accents = [
            'keyboard' => '#2563eb',
            'mouse' => '#059669',
            'display' => '#d97706',
            'camera' => '#0891b2',
            'audio' => '#db2777',
            'utility' => '#7c3aed',
            'gaming' => '#ea580c',
        ];
        ?>
<section class="home-category-band" aria-label="<?php echo kbtLmEsc($meta['aria']); ?>">
  <nav class="home-suite-strip" aria-label="<?php echo kbtLmEsc($meta['aria']); ?>">
    <?php foreach ($items as $category => $item): ?>
      <a href="<?php echo kbtLmEsc(kbtLmCategoryHref($locale, $category)); ?>" style="--cat-accent:<?php echo kbtLmEsc($accents[$category] ?? '#2563eb'); ?>">
        <span class="suite-title-row">
          <span class="suite-icon" aria-hidden="true"><?php echo kbtLmIconSvg($category); ?></span>
          <span class="suite-title"><?php echo kbtLmEsc($item['title']); ?></span>
        </span>
        <span class="suite-copy"><?php echo kbtLmEsc($item['copy']); ?></span>
      </a>
    <?php endforeach; ?>
  </nav>
</section>
        <?php
    }
}

if (!function_exists('kbtLmRenderGuideFaq')) {
    function kbtLmRenderGuideFaq(array $page)
    {
        $title = $page['stageTitle'] ?? $page['heroTitle'] ?? 'Tool';
        $guide = $page['guide'] ?? [];
        $faqs = $page['faqs'] ?? [];
        $keywords = $page['keywordsList'] ?? [];
        ?>
<section class="home-guideline-brief" id="guidelines" aria-labelledby="localized-guidelines-title">
  <div class="container home-guideline-layout home-guideline-layout--balanced">
    <div class="home-guideline-copy">
      <p class="section-kicker"><?php echo kbtLmEsc($guide['kicker'] ?? ($title . ' guide')); ?></p>
      <h2 id="localized-guidelines-title"><?php echo kbtLmEsc($guide['title'] ?? ('How to use ' . $title)); ?></h2>
      <p><?php echo kbtLmEsc($guide['intro'] ?? 'Run the test in your browser and compare the result with the checklist.'); ?></p>
      <?php if (!empty($guide['steps'])): ?>
        <div class="home-guideline-steps" aria-label="<?php echo kbtLmEsc($guide['stepsLabel'] ?? 'Workflow'); ?>">
          <?php foreach (array_slice($guide['steps'], 0, 4) as $index => $step): ?>
            <article class="home-guideline-step">
              <span class="home-guideline-step-number"><?php echo str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
              <span>
                <strong><?php echo kbtLmEsc($step['title'] ?? 'Step'); ?></strong>
                <small><?php echo kbtLmEsc($step['text'] ?? ''); ?></small>
              </span>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <?php if ($keywords): ?>
        <div class="home-keyword-strip" aria-label="<?php echo kbtLmEsc($guide['keywordsLabel'] ?? 'Related checks'); ?>">
          <?php foreach (array_slice($keywords, 0, 8) as $keyword): ?>
            <a href="#<?php echo kbtLmEsc($page['stageId'] ?? 'tool'); ?>"><?php echo kbtLmEsc($keyword); ?></a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($guide['note'])): ?>
        <div class="home-guideline-note"><?php echo kbtLmEsc($guide['note']); ?></div>
      <?php endif; ?>
    </div>
    <div class="home-faq-panel" aria-labelledby="localized-faq-title">
      <p class="section-kicker"><?php echo kbtLmEsc($page['faqKicker'] ?? ($title . ' FAQ')); ?></p>
      <h2 id="localized-faq-title"><?php echo kbtLmEsc($page['faqTitle'] ?? 'Common questions'); ?></h2>
      <div class="home-faq-list home-faq-list--expanded">
        <?php foreach (array_slice($faqs, 0, 6) as $faq): ?>
          <details open>
            <summary><?php echo kbtLmEsc($faq['question'] ?? ''); ?></summary>
            <p><?php echo kbtLmEsc($faq['answer'] ?? ''); ?></p>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
        <?php
    }
}

if (!function_exists('kbtLmAllToolsHref')) {
    function kbtLmAllToolsHref($locale)
    {
        $routes = [
            'es' => 'pages/all-tools-es.php',
            'fr' => 'pages/all-tools-fr.php',
            'de' => 'pages/all-tools-de.php',
            'pt' => 'pages/all-tools-pt.php',
            'ar' => 'pages/all-tools-ar.php',
            'ru' => 'pages/all-tools-ru.php',
            'ja' => 'pages/all-tools-ja.php',
            'ko' => 'pages/all-tools-ko.php',
        ];
        return url($routes[$locale] ?? 'pages/all-tools.php');
    }
}

if (!function_exists('kbtLmLocalizedToolHref')) {
    function kbtLmLocalizedToolHref(array $tool, array $localeConfig, $locale)
    {
        if ($locale === 'en') {
            return url($tool['routes']['en'] ?? '');
        }

        if (($tool['id'] ?? '') === 'tools-page') {
            return kbtLmAllToolsHref($locale);
        }

        if (!array_key_exists('localized', $tool['routes'] ?? [])) {
            return '';
        }

        $directory = $localeConfig['directory'] ?? '';
        $slug = (string) $tool['routes']['localized'];
        if ($directory === '') {
            return '';
        }

        return $slug === ''
            ? url('languages/' . $directory . '/')
            : url('languages/' . $directory . '/' . $slug);
    }
}

if (!function_exists('kbtLmPopularToolContext')) {
    function kbtLmPopularToolContext($locale, $currentToolId)
    {
        if (!function_exists('getSharedToolListData')) {
            return null;
        }

        $data = getSharedToolListData();
        $localeConfig = $data['locales'][$locale] ?? ($data['locales']['en'] ?? null);
        if (!$localeConfig) {
            return null;
        }

        $localizedOverrides = $localeConfig['tools'] ?? [];
        $categoryLabels = $localeConfig['category_labels'] ?? [];
        $categories = $data['categories'] ?? [];
        $tools = [];
        $current = null;

        foreach (($data['tools'] ?? []) as $srcIndex => $tool) {
            if (isset($tool['visible_locales']) && !in_array($locale, $tool['visible_locales'], true)) {
                continue;
            }

            $href = kbtLmLocalizedToolHref($tool, $localeConfig, $locale);
            if ($href === '') {
                continue;
            }

            $id = $tool['id'] ?? '';
            $override = $localizedOverrides[$id] ?? [];
            $category = $tool['category'] ?? 'utility';
            $card = [
                '_index' => count($tools),
                '_src' => $srcIndex,
                'id' => $id,
                'route' => $tool['routes']['en'] ?? '',
                'href' => $href,
                'category' => $category,
                'category_label' => $categoryLabels[$category] ?? ucfirst($category),
                'icon' => $tool['icon'] ?? '',
                'name' => $override['name'] ?? ($tool['name'] ?? ''),
                'description' => $override['description'] ?? ($tool['description'] ?? ''),
                'cta' => $override['cta'] ?? ($localeConfig['default_cta'] ?? ($tool['cta'] ?? 'Open tool')),
            ];

            if ($id === $currentToolId) {
                $current = $card;
            }
            $tools[] = $card;
        }

        if (!$current && $tools) {
            $current = $tools[0];
        }

        if (!$current || !$tools) {
            return null;
        }

        return [
            'tool' => $current,
            'tools' => $tools,
            'categories' => $categories,
        ];
    }
}

if (!function_exists('kbtLmRenderPopularTools')) {
    function kbtLmRenderPopularTools(array $page)
    {
        $locale = $page['locale'] ?? 'en';
        $context = kbtLmPopularToolContext($locale, $page['toolId'] ?? null);
        if (!$context || !function_exists('kbtToolPopularSelectTools')) {
            return;
        }

        $cards = kbtToolPopularSelectTools($context, 4);
        if (!$cards) {
            return;
        }

        $labels = $page['popularTools'] ?? [];
        $heading = $labels['heading'] ?? 'Popular tools';
        $allLabel = $labels['allLabel'] ?? 'All tools';
        $aria = $labels['ariaLabel'] ?? $heading;
        $usedImageKeys = [];
        ?>
<section class="tool-popular-tools" id="popular-tools" aria-label="<?php echo kbtLmEsc($aria); ?>">
  <div class="container">
    <div class="tool-popular-tools-head">
      <h2><?php echo kbtLmEsc($heading); ?></h2>
      <a class="tool-popular-tools-all" href="<?php echo kbtLmEsc(kbtLmAllToolsHref($locale)); ?>"><?php echo kbtLmEsc($allLabel); ?></a>
    </div>
    <div class="tool-popular-tools-grid">
      <?php foreach ($cards as $card):
          $image = function_exists('kbtToolPopularResolveImage') ? kbtToolPopularResolveImage($card, $usedImageKeys) : '';
          $imageMeta = ($image !== '' && function_exists('getLocalImageMeta')) ? getLocalImageMeta($image) : null;
          $description = trim((string) ($card['description'] ?? ''));
          $accent = function_exists('kbtToolPopularCategoryAccent') ? kbtToolPopularCategoryAccent($card['category'] ?? '') : '#0067b8';
      ?>
        <a class="tool-popular-card" style="--tool-card-accent: <?php echo kbtLmEsc($accent); ?>" href="<?php echo kbtLmEsc($card['href'] ?? '#'); ?>">
          <?php if ($image !== ''):
              $normalized = function_exists('kbtToolPopularNormalizeImagePath') ? kbtToolPopularNormalizeImagePath($image) : $image;
              $ext = pathinfo($normalized, PATHINFO_EXTENSION);
              $base = $ext ? substr($normalized, 0, -(strlen($ext) + 1)) : $normalized;
              $base = preg_replace('/-(320|448|512|560|640|768|800|900|960|1200|1280|1400|1792|1920)$/', '', $base);
              $imgWidth = (int) ($imageMeta['width'] ?? 640);
              $imgHeight = (int) ($imageMeta['height'] ?? 360);
              $imgSizes = '(min-width: 1180px) 25vw, (min-width: 680px) 50vw, 100vw';
              $variantSizes = [320, 448, 560, 640, 800, 900, 1200, 1400];
              $webpVariants = [];
              $jpgVariants = [];
              foreach ($variantSizes as $w) {
                  $candidate = $base . '-' . $w . '.webp';
                  if (function_exists('kbtToolPopularImageExists') && kbtToolPopularImageExists($candidate)) {
                      $webpVariants[$w] = $candidate;
                  }
                  foreach (['jpg', 'jpeg', 'png'] as $e) {
                      $candidate = $base . '-' . $w . '.' . $e;
                      if (function_exists('kbtToolPopularImageExists') && kbtToolPopularImageExists($candidate)) {
                          $jpgVariants[$w] = $candidate;
                          break;
                      }
                  }
              }
              $altText = ($card['name'] ?? 'Online tool') . ' preview';
          ?>
            <picture>
              <?php if ($webpVariants): ?>
                <source type="image/webp" srcset="<?php
                    $parts = [];
                    foreach ($webpVariants as $w => $path) {
                        $parts[] = kbtLmUrl($path) . ' ' . $w . 'w';
                    }
                    echo implode(', ', $parts);
                ?>" sizes="<?php echo kbtLmEsc($imgSizes); ?>">
              <?php endif; ?>
              <?php if ($jpgVariants): ?>
                <source srcset="<?php
                    $parts = [];
                    foreach ($jpgVariants as $w => $path) {
                        $parts[] = kbtLmUrl($path) . ' ' . $w . 'w';
                    }
                    echo implode(', ', $parts);
                ?>" sizes="<?php echo kbtLmEsc($imgSizes); ?>">
              <?php endif; ?>
              <img class="tool-popular-card-img" src="<?php echo kbtLmUrl($image); ?>" alt="<?php echo kbtLmEsc($altText); ?>" width="<?php echo $imgWidth; ?>" height="<?php echo $imgHeight; ?>" loading="lazy" decoding="async" sizes="<?php echo kbtLmEsc($imgSizes); ?>">
            </picture>
          <?php endif; ?>
          <span class="tool-popular-card-body">
            <span class="tool-popular-card-category"><?php echo kbtLmEsc($card['category_label'] ?? ucfirst($card['category'] ?? '')); ?></span>
            <strong><?php echo kbtLmEsc($card['name'] ?? ''); ?></strong>
            <?php if ($description !== ''): ?>
              <span class="tool-popular-card-desc"><?php echo kbtLmEsc($description); ?></span>
            <?php endif; ?>
            <span class="tool-popular-card-cta"><?php echo kbtLmEsc($card['cta'] ?? 'Open tool'); ?></span>
          </span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
        <?php
        if (empty($GLOBALS['__kbtToolPopularToolsStyles'])) {
            $GLOBALS['__kbtToolPopularToolsStyles'] = true;
            ?>
<style>
  .tool-popular-tools{padding:3rem clamp(18px,2.4vw,32px);background:#f5f5f5}.tool-popular-tools .container{width:100%;max-width:1480px;padding:0}.tool-popular-tools-head{display:flex;align-items:flex-end;justify-content:space-between;gap:1.5rem;margin-bottom:.8rem}.tool-popular-tools-head h2{margin:0;color:#0067b8;font-family:"Segoe UI",Arial,sans-serif;font-size:.82rem;line-height:1.2;font-weight:600}.tool-popular-tools-all{display:inline-flex;align-items:center;min-height:32px;color:#0067b8;font-family:"Segoe UI",Arial,sans-serif;font-size:.92rem;line-height:1.2;font-weight:600;text-decoration:none}.tool-popular-tools-all::after{content:">";margin-left:8px;font-size:1.05em;line-height:1}.tool-popular-tools-all:hover,.tool-popular-tools-all:focus-visible{color:#004578;text-decoration:underline}.tool-popular-tools-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:24px}.tool-popular-card{display:flex;flex-direction:column;min-height:100%;color:#000;background:#fff;border:1px solid #d1d1d1;border-top:4px solid var(--tool-card-accent,#0067b8);border-radius:0;text-decoration:none;box-shadow:0 18px 42px rgba(15,23,42,.08);transition:transform .18s ease,box-shadow .18s ease,border-color .18s ease}.tool-popular-card:hover,.tool-popular-card:focus-visible{transform:translateY(-2px);border-color:var(--tool-card-accent,#0067b8);box-shadow:0 22px 48px rgba(15,23,42,.12);text-decoration:none;color:#000}.tool-popular-card-img{display:block;width:100%;aspect-ratio:16/9;object-fit:cover;background:#e5e5e5}.tool-popular-card-body{display:flex;flex:1;flex-direction:column;padding:26px 28px 24px}.tool-popular-card-category{margin-bottom:.45rem;color:var(--tool-card-accent,#0067b8);font-size:.76rem;line-height:1.25;font-weight:700;letter-spacing:.08em;text-transform:uppercase}.tool-popular-card strong{display:block;margin:0 0 1.4rem;color:#000;font-family:"Segoe UI",Arial,sans-serif;font-size:clamp(1.42rem,1.8vw,2rem);line-height:1.18;font-weight:600;letter-spacing:0}.tool-popular-card-desc{flex:1;color:#1f1f1f;font-size:clamp(1rem,1.05vw,1.14rem);line-height:1.42}.tool-popular-card-cta{align-self:flex-start;margin-top:1.6rem;padding:.7rem 1.15rem;background:#0067b8;color:#fff;font-size:1rem;line-height:1.2;font-weight:600}html.dark-theme .tool-popular-tools,[data-theme="dark"] .tool-popular-tools{background:#111}html.dark-theme .tool-popular-tools-head h2,[data-theme="dark"] .tool-popular-tools-head h2,html.dark-theme .tool-popular-tools-all,[data-theme="dark"] .tool-popular-tools-all{color:#8ed0ff}html.dark-theme .tool-popular-tools-all:hover,html.dark-theme .tool-popular-tools-all:focus-visible,[data-theme="dark"] .tool-popular-tools-all:hover,[data-theme="dark"] .tool-popular-tools-all:focus-visible{color:#b9e5ff}html.dark-theme .tool-popular-card,[data-theme="dark"] .tool-popular-card{border-color:#333;border-top-color:var(--tool-card-accent,#0067b8);background:#1b1b1b;color:#fff;box-shadow:0 18px 42px rgba(0,0,0,.22)}html.dark-theme .tool-popular-card:hover,html.dark-theme .tool-popular-card:focus-visible,[data-theme="dark"] .tool-popular-card:hover,[data-theme="dark"] .tool-popular-card:focus-visible{border-color:rgba(125,211,252,.65);color:#fff}html.dark-theme .tool-popular-card strong,[data-theme="dark"] .tool-popular-card strong{color:#fff}html.dark-theme .tool-popular-card-desc,[data-theme="dark"] .tool-popular-card-desc{color:#d6d6d6}html.dark-theme .tool-popular-card-category,[data-theme="dark"] .tool-popular-card-category{color:var(--tool-card-accent,#7dd3fc)}@media (max-width:1180px){.tool-popular-tools-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (max-width:680px){.tool-popular-tools{padding:2.2rem 0}.tool-popular-tools-head{align-items:center;flex-direction:row;padding:0 16px}.tool-popular-tools-all{width:100%}.tool-popular-tools-grid{grid-template-columns:1fr;gap:16px}.tool-popular-card{border-left:0;border-right:0}.tool-popular-card-body{padding:22px 20px}}
</style>
            <?php
        }
    }
}

if (!function_exists('kbtLmSchemaGraph')) {
    function kbtLmSchemaGraph(array $page)
    {
        $url = kbtLmAbsoluteUrl($page['urlPath'] ?? ($_SERVER['REQUEST_URI'] ?? ''));
        $title = $page['stageTitle'] ?? $page['heroTitle'] ?? $page['title'] ?? 'Tool';
        $description = $page['description'] ?? '';
        $faqs = $page['faqs'] ?? [];
        $graph = [
            [
                '@type' => 'WebApplication',
                '@id' => $url . '#webapp',
                'name' => $title,
                'url' => $url,
                'description' => $description,
                'applicationCategory' => 'UtilityApplication',
                'operatingSystem' => 'Any',
                'isAccessibleForFree' => true,
                'browserRequirements' => 'Requires JavaScript and a modern browser',
            ],
            [
                '@type' => 'BreadcrumbList',
                '@id' => $url . '#breadcrumb',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => $page['homeLabel'] ?? 'Home',
                        'item' => absoluteUrl('/'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => $title,
                        'item' => $url,
                    ],
                ],
            ],
        ];

        if ($faqs) {
            $graph[] = [
                '@type' => 'FAQPage',
                '@id' => $url . '#faq',
                'mainEntity' => array_map(static function ($faq) {
                    return [
                        '@type' => 'Question',
                        'name' => $faq['question'] ?? '',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => $faq['answer'] ?? '',
                        ],
                    ];
                }, array_slice($faqs, 0, 6)),
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@graph' => $graph,
        ];
    }
}

$__lmRoot = dirname(__DIR__);
$__lmLocale = $localizedModernToolPage['locale'] ?? 'en';
$__lmHtmlLang = $localizedModernToolPage['htmlLang'] ?? $__lmLocale;
$__lmDir = $localizedModernToolPage['dir'] ?? 'ltr';
$__lmTitle = $localizedModernToolPage['title'] ?? 'KeyboardTester.click';
$__lmDescription = $localizedModernToolPage['description'] ?? '';
$__lmDescription = kbtLmAnswerReadyDescription(
    $__lmLocale,
    $__lmDescription,
    $localizedModernToolPage['stageTitle'] ?? ($localizedModernToolPage['heroTitle'] ?? $__lmTitle),
    $localizedModernToolPage['heroKicker'] ?? ($localizedModernToolPage['category'] ?? 'Tool')
);
$localizedModernToolPage['description'] = $__lmDescription;
$__lmHeroTitleLines = $localizedModernToolPage['heroTitleLines'] ?? [$localizedModernToolPage['heroTitle'] ?? $__lmTitle];
$__lmHeroImage = $localizedModernToolPage['heroImage'] ?? '';
$__lmHeroAlt = $localizedModernToolPage['heroAlt'] ?? ($localizedModernToolPage['heroTitle'] ?? $__lmTitle);
$__lmStageId = $localizedModernToolPage['stageId'] ?? 'tool-stage';
$__lmShellId = $localizedModernToolPage['shellId'] ?? 'tool-shell';
$__lmToolInclude = $__lmRoot . '/' . ltrim((string) ($localizedModernToolPage['toolInclude'] ?? ''), '/');
$__lmHeaderInclude = $__lmRoot . '/' . ltrim((string) ($localizedModernToolPage['headerInclude'] ?? 'header.php'), '/');
$__lmFooterInclude = $__lmRoot . '/' . ltrim((string) ($localizedModernToolPage['footerInclude'] ?? 'footer.php'), '/');
$__lmCategory = $localizedModernToolPage['category'] ?? 'keyboard';
$__lmCategoryHref = $localizedModernToolPage['secondaryHref'] ?? kbtLmCategoryHref($__lmLocale, $__lmCategory);

$GLOBALS['kbtSuppressFooterAd'] = true;
$siteChromeLocale = $__lmLocale;
$pageTitle = $__lmTitle;
$pageDescription = $__lmDescription;
$pageCanonical = $localizedModernToolPage['canonical'] ?? ($localizedModernToolPage['urlPath'] ?? null);
$pageRobots = $localizedModernToolPage['robots'] ?? ($pageRobots ?? 'index, follow');
$pageOgImage = $__lmHeroImage;
$pageOgImageAlt = $__lmHeroAlt;
?><!DOCTYPE html>
<html lang="<?php echo kbtLmEsc($__lmHtmlLang); ?>" dir="<?php echo kbtLmEsc($__lmDir); ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo kbtLmEsc($__lmTitle); ?></title>
  <meta name="description" content="<?php echo kbtLmEsc($__lmDescription); ?>">
  <?php if (!empty($localizedModernToolPage['keywords'])): ?>
    <meta name="keywords" content="<?php echo kbtLmEsc($localizedModernToolPage['keywords']); ?>">
  <?php endif; ?>
  <?php if ($__lmHeroImage): ?>
    <meta property="og:image" content="<?php echo kbtLmEsc(kbtLmAbsoluteUrl($__lmHeroImage)); ?>">
    <meta property="og:image:alt" content="<?php echo kbtLmEsc($__lmHeroAlt); ?>">
  <?php endif; ?>
  <?php /* hreflang cluster is emitted once by includes/head-common.php below. It was also
           emitted here, producing 18-20 duplicate alternate tags per localized page; head-common's
           auto-generator (with the EN<->localized slug aliases) is now the single source. */ ?>
  <link rel="icon" type="image/x-icon" href="<?php echo kbtLmUrl('navigation.png'); ?>">
  <?php
  $loadBootstrapCss = false;
  $loadBootstrapJs = false;
  $loadMobileToolAdapters = false;
  $loadInterFont = false;
  include __DIR__ . '/head-common.php';
  $imv = filemtime($__lmRoot . '/assets/css/index-modern.min.css');
  ?>
  <link rel="preload" as="style" href="<?php echo kbtLmUrl('assets/css/index-modern.min.css') . '?v=' . $imv; ?>">
  <link rel="stylesheet" href="<?php echo kbtLmUrl('assets/css/index-modern.min.css') . '?v=' . $imv; ?>">
  <?php if (!empty($localizedModernToolPage['legacyHeadHtml'])) { echo $localizedModernToolPage['legacyHeadHtml']; } ?>
  <style>
    .localized-modern-tool-page .home-category-band .home-suite-strip a{border-top:0!important}
    .localized-modern-tool-page .home-category-band .home-suite-strip a::before{height:2px!important;background:var(--cat-accent,#2563eb)!important}
    .localized-modern-tool-page .home-category-band .suite-title-row{display:flex;align-items:center;gap:8px;min-width:0}
    .localized-modern-tool-page .home-category-band .suite-icon{display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;flex:0 0 auto;color:var(--cat-accent,#2563eb)}
    .localized-modern-tool-page .home-category-band .suite-icon svg{display:block;width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
    .localized-modern-tool-page .tool-template-stage .tool-shell{width:min(100% - 40px,1480px);max-width:1480px;border-radius:2px;padding:clamp(16px,2vw,28px);box-shadow:0 18px 38px rgba(15,23,42,.1)}
    .localized-modern-tool-page .tool-template-inline-head{max-width:1180px;margin:0 auto 18px}
    .localized-modern-tool-page .tool-template-inline-head h2{margin:0 0 6px;font-size:clamp(1.45rem,2vw,2rem);font-family:"Segoe UI","Inter Fallback",Arial,sans-serif;letter-spacing:0}
    .localized-modern-tool-page .tool-template-inline-head p{max-width:760px;margin:0;color:#4b5563;font-size:1rem;line-height:1.55}
    .localized-modern-tool-page .home-banner-copy .hero-title-line{white-space:normal!important;overflow-wrap:break-word}
    .localized-modern-tool-page .home-banner-copy .landing-btn{border-radius:2px;white-space:normal;text-align:center}
    .localized-modern-tool-page .cr-tester{max-width:1180px;padding:0;font-family:"Segoe UI","Inter Fallback",Arial,sans-serif}
    .localized-modern-tool-page .cr-tip,.localized-modern-tool-page .cr-note{border-radius:2px;border-left-width:3px}
    .localized-modern-tool-page .cr-stage{border-radius:2px;box-shadow:0 16px 34px rgba(15,23,42,.16)}
    .localized-modern-tool-page .cr-row div,.localized-modern-tool-page .cr-ramp,.localized-modern-tool-page .cr-btn,.localized-modern-tool-page .cr-exit{border-radius:2px}
    .localized-modern-tool-page .cr-btn-primary{background:#0078d4;border-color:#0078d4;color:#fff}
    .localized-modern-tool-page .cr-btn-primary:hover{background:#106ebe;border-color:#106ebe}
    html.dark-theme .localized-modern-tool-page .tool-template-inline-head p,[data-theme="dark"] .localized-modern-tool-page .tool-template-inline-head p{color:#cbd5e1}
    html.dark-theme .localized-modern-tool-page .cr-tip,[data-theme="dark"] .localized-modern-tool-page .cr-tip{background:#082f49;border-color:#075985;color:#e0f2fe}
    html.dark-theme .localized-modern-tool-page .cr-note,[data-theme="dark"] .localized-modern-tool-page .cr-note{background:#052e16;border-color:#15803d;color:#dcfce7}
    @media (max-width:760px){.home-redesign.localized-modern-tool-page .tool-template-hero .home-banner-content{width:auto!important;max-width:100%!important;box-sizing:border-box!important;padding-left:18px!important;padding-right:18px!important}.home-redesign.localized-modern-tool-page .tool-template-hero .home-banner-copy{width:100%!important;max-width:100%!important;box-sizing:border-box!important}.home-redesign.localized-modern-tool-page .tool-template-hero .home-banner-copy .hero-title,.home-redesign.localized-modern-tool-page .tool-template-hero .home-banner-copy h1.hero-title{max-width:100%!important;font-size:2.1rem!important;line-height:1.12!important}.home-redesign.localized-modern-tool-page .tool-template-hero .hero-actions{display:grid;grid-template-columns:1fr;align-items:start;gap:12px}.home-redesign.localized-modern-tool-page .tool-template-hero .home-banner-copy .landing-btn{width:100%;max-width:260px;min-height:48px;padding:.72rem 1rem}.localized-modern-tool-page .tool-template-stage .tool-shell{padding:14px}.localized-modern-tool-page .cr-row{gap:1px}.localized-modern-tool-page .cr-row div{min-height:30px}}
  </style>
  <script type="application/ld+json"><?php echo kbtLmJson(kbtLmSchemaGraph($localizedModernToolPage)); ?></script>
</head>
<body class="landing-page home-redesign localized-modern-tool-page localized-modern-tool-page--<?php echo kbtLmEsc($__lmLocale); ?>">
  <?php if (is_file($__lmHeaderInclude)) { include $__lmHeaderInclude; } else { include $__lmRoot . '/header.php'; } ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero home-hero tool-template-hero">
      <div class="home-banner">
        <?php if ($__lmHeroImage): ?>
          <picture class="home-banner-media">
            <?php kbtResponsivePictureSources($__lmHeroImage, '100vw'); ?>
            <img src="<?php echo kbtLmUrl($__lmHeroImage); ?>" alt="<?php echo kbtLmEsc($__lmHeroAlt); ?>" width="<?php echo (int) ($localizedModernToolPage['heroImageWidth'] ?? 960); ?>" height="<?php echo (int) ($localizedModernToolPage['heroImageHeight'] ?? 540); ?>" loading="eager" fetchpriority="high" decoding="async"<?php echo kbtResponsiveImgSrcsetAttributes($__lmHeroImage, '100vw'); ?>>
          </picture>
        <?php endif; ?>
        <div class="home-banner-content">
          <div class="home-banner-copy">
            <p class="hero-kicker"><?php echo kbtLmEsc($localizedModernToolPage['heroKicker'] ?? 'KeyboardTester.click'); ?></p>
            <h1 class="hero-title">
              <?php foreach ($__lmHeroTitleLines as $line): ?>
                <span class="hero-title-line"><?php echo kbtLmEsc($line); ?></span>
              <?php endforeach; ?>
            </h1>
            <p class="hero-lede"><?php echo kbtLmEsc($localizedModernToolPage['heroLede'] ?? $__lmDescription); ?></p>
            <div class="hero-actions">
              <a class="landing-btn landing-btn-primary" href="#<?php echo kbtLmEsc($__lmStageId); ?>"><?php echo kbtLmEsc($localizedModernToolPage['primaryCta'] ?? 'Start test'); ?></a>
              <a class="landing-btn landing-btn-ghost" href="<?php echo kbtLmEsc($__lmCategoryHref); ?>"><?php echo kbtLmEsc($localizedModernToolPage['secondaryCta'] ?? 'More tools'); ?> <span class="btn-caret" aria-hidden="true">&gt;</span></a>
            </div>
          </div>
        </div>
        <div class="home-hero-store-button">
          <?php kbtRenderMicrosoftStoreBadge(['class' => 'home-hero-store-badge', 'priority' => true]); ?>
        </div>
        <?php
        kbtRenderAdSlot($localizedModernToolPage['heroAdPlacement'] ?? 'home_hero_banner', [
            'class' => 'kbt-ad-slot--home-hero-banner',
            'format' => 'horizontal',
            'aria_label' => $localizedModernToolPage['heroAdLabel'] ?? 'Sponsored hero banner',
            'locale' => $__lmLocale,
        ]);
        ?>
      </div>
    </section>

    <?php kbtLmRenderCategoryBand($__lmLocale); ?>

    <section class="tool-stage tool-template-stage" id="<?php echo kbtLmEsc($__lmStageId); ?>" data-header-hide-stage aria-label="<?php echo kbtLmEsc($localizedModernToolPage['stageAriaLabel'] ?? ($localizedModernToolPage['stageTitle'] ?? 'Tool workspace')); ?>">
      <section id="<?php echo kbtLmEsc($__lmShellId); ?>" class="tool-shell">
        <div class="tool-template-inline-head">
          <h2><?php echo kbtLmEsc($localizedModernToolPage['stageTitle'] ?? ($localizedModernToolPage['heroTitle'] ?? $__lmTitle)); ?></h2>
          <p><?php echo kbtLmEsc($localizedModernToolPage['stageLede'] ?? $__lmDescription); ?></p>
        </div>
        <?php
        if (!empty($localizedModernToolPage['toolHtml'])) {
            echo $localizedModernToolPage['toolHtml'];
        } elseif (is_file($__lmToolInclude)) {
            include $__lmToolInclude;
        }
        ?>
      </section>
    </section>

    <section class="home-after-tool-banner" aria-label="<?php echo kbtLmEsc($localizedModernToolPage['afterToolAdLabel'] ?? 'Sponsored placement'); ?>">
      <?php
      kbtRenderAdSlot($localizedModernToolPage['afterToolAdPlacement'] ?? 'home_after_tool_banner', [
          'class' => 'kbt-ad-slot--after-tool-banner',
          'format' => 'auto',
          'aria_label' => $localizedModernToolPage['afterToolAdLabel'] ?? 'Sponsored placement',
          'min_width' => 769,
          'locale' => $__lmLocale,
      ]);
      ?>
    </section>

    <?php kbtLmRenderPopularTools($localizedModernToolPage); ?>

    <div class="home-rails-region">
      <aside class="home-rails-side home-rails-side--left" aria-hidden="true">
        <div class="home-rails-side__sticky">
          <?php kbtRenderAdSlot('home_guidelines_left_rail', ['class' => 'kbt-ad-slot--home-guideline-rail kbt-ad-slot--home-guideline-left', 'format' => 'auto', 'aria_label' => $localizedModernToolPage['leftRailAdLabel'] ?? 'Sponsored guide placement', 'min_width' => 1281, 'locale' => $__lmLocale]); ?>
        </div>
      </aside>
      <aside class="home-rails-side home-rails-side--right" aria-hidden="true">
        <div class="home-rails-side__sticky">
          <?php kbtRenderAdSlot('home_guidelines_right_rail', ['class' => 'kbt-ad-slot--home-guideline-rail kbt-ad-slot--home-guideline-right', 'format' => 'auto', 'aria_label' => $localizedModernToolPage['rightRailAdLabel'] ?? 'Sponsored FAQ placement', 'min_width' => 1281, 'locale' => $__lmLocale]); ?>
        </div>
      </aside>

      <?php kbtLmRenderGuideFaq($localizedModernToolPage); ?>
      <?php
      $__lmStoreOptions = [];
      if (isset($localizedModernToolPage['storeKicker'])) {
          $__lmStoreOptions['kicker'] = $localizedModernToolPage['storeKicker'];
      }
      if (isset($localizedModernToolPage['storeTitle'])) {
          $__lmStoreOptions['title'] = $localizedModernToolPage['storeTitle'];
      }
      if (isset($localizedModernToolPage['storeText'])) {
          $__lmStoreOptions['text'] = $localizedModernToolPage['storeText'];
      }
      kbtRenderMicrosoftStoreSitewideBanner($__lmLocale, $__lmStoreOptions);
      $GLOBALS['kbtSuppressMicrosoftStoreBanner'] = true;
      ?>
    </div>
  </main>
  <?php if (!empty($localizedModernToolPage['legacyBodyHtml'])) { echo $localizedModernToolPage['legacyBodyHtml']; } ?>
  <?php if (is_file($__lmFooterInclude)) { include $__lmFooterInclude; } else { include $__lmRoot . '/footer.php'; } ?>
</body>
</html>
