<?php
/**
 * Generic bridge for localized tool pages that still own their legacy markup.
 *
 * Language pages include this file before their old body. The bridge captures
 * the original output once, extracts the live tool block and localized page
 * metadata, then renders the shared modern localized shell.
 */

if (!function_exists('url')) {
    require_once __DIR__ . '/../config.php';
}

require_once __DIR__ . '/components/tool-list-data.php';
require_once __DIR__ . '/components/tool-popular-tools.php';

if (!function_exists('kbtLmlCleanUtf8')) {
    function kbtLmlCleanUtf8($value)
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

if (!function_exists('kbtLmlCleanValue')) {
    function kbtLmlCleanValue($value)
    {
        if (is_array($value)) {
            foreach ($value as $key => $item) {
                $value[$key] = kbtLmlCleanValue($item);
            }
            return $value;
        }

        return is_string($value) ? kbtLmlCleanUtf8($value) : $value;
    }
}

if (!function_exists('kbtLmlEsc')) {
    function kbtLmlEsc($value)
    {
        return htmlspecialchars(kbtLmlCleanUtf8($value), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

if (!function_exists('kbtLmlCallerFile')) {
    function kbtLmlCallerFile()
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 5);
        foreach ($trace as $frame) {
            $file = $frame['file'] ?? '';
            if ($file !== '' && realpath($file) !== realpath(__FILE__)) {
                return $file;
            }
        }
        return $_SERVER['SCRIPT_FILENAME'] ?? '';
    }
}

if (!function_exists('kbtLmlCaptureLegacy')) {
    function kbtLmlCaptureLegacy($file)
    {
        if (!$file || !is_file($file)) {
            return '';
        }
        $GLOBALS['kbtLocalizedModernCapturingLegacy'] = true;
        ob_start();
        include $file;
        $html = ob_get_clean();
        unset($GLOBALS['kbtLocalizedModernCapturingLegacy']);
        return (string) $html;
    }
}

if (!function_exists('kbtLmlDom')) {
    function kbtLmlDom($html)
    {
        $dom = new DOMDocument();
        $previous = libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="UTF-8">' . (string) $html, LIBXML_NOWARNING | LIBXML_NOERROR);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);
        return $dom;
    }
}

if (!function_exists('kbtLmlInnerHtml')) {
    function kbtLmlInnerHtml($node)
    {
        if (!$node) {
            return '';
        }
        $html = '';
        foreach ($node->childNodes as $child) {
            $html .= $node->ownerDocument->saveHTML($child);
        }
        return $html;
    }
}

if (!function_exists('kbtLmlNodeHasAnyClass')) {
    function kbtLmlNodeHasAnyClass($node, array $classes)
    {
        if (!$node || $node->nodeType !== XML_ELEMENT_NODE) {
            return false;
        }
        $classAttr = ' ' . preg_replace('/\s+/', ' ', (string) $node->getAttribute('class')) . ' ';
        foreach ($classes as $className) {
            if (strpos($classAttr, ' ' . $className . ' ') !== false) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('kbtLmlPruneLegacyFragments')) {
    function kbtLmlPruneLegacyFragments($node)
    {
        if (!$node || !$node->hasChildNodes()) {
            return;
        }

        $removeClasses = [
            'tool-stage-header',
            'tools-list-section--unified',
            'tools-list-section',
            'tools-directory-section',
            'localized-intent-links',
            'trust-strip',
            'guidelines-section',
            'home-after-tool-banner',
        ];

        $children = [];
        foreach ($node->childNodes as $child) {
            $children[] = $child;
        }

        foreach ($children as $child) {
            if ($child->nodeType !== XML_ELEMENT_NODE) {
                continue;
            }

            $tag = strtolower($child->nodeName);
            if ($tag === 'h1' || kbtLmlNodeHasAnyClass($child, $removeClasses)) {
                $child->parentNode->removeChild($child);
                continue;
            }

            kbtLmlPruneLegacyFragments($child);
        }
    }
}

if (!function_exists('kbtLmlText')) {
    function kbtLmlText($value)
    {
        $text = html_entity_decode(strip_tags(kbtLmlCleanUtf8($value)), ENT_QUOTES, 'UTF-8');
        $normalized = preg_replace('/\s+/u', ' ', $text);
        return trim(is_string($normalized) ? $normalized : $text);
    }
}

if (!function_exists('kbtLmlLooksMojibake')) {
    function kbtLmlLooksMojibake($value, $locale = '')
    {
        $text = (string) $value;
        if ($text === '') {
            return false;
        }

        if (preg_match('/[\x{00C2}\x{00C3}\x{00D0}\x{00D1}\x{00D8}\x{00D9}]/u', $text)) {
            return true;
        }

        return in_array($locale, ['ja', 'ko'], true)
            && (bool) preg_match('/[\x{00E3}\x{00EB}\x{00EC}\x{00ED}]/u', $text);
    }
}

if (!function_exists('kbtLmlFirstNode')) {
    function kbtLmlFirstNode(DOMXPath $xpath, $query, $context = null)
    {
        $nodes = $context ? $xpath->query($query, $context) : $xpath->query($query);
        return ($nodes && $nodes->length) ? $nodes->item(0) : null;
    }
}

if (!function_exists('kbtLmlFirstText')) {
    function kbtLmlFirstText(DOMXPath $xpath, $query, $context = null)
    {
        $node = kbtLmlFirstNode($xpath, $query, $context);
        return $node ? kbtLmlText($node->textContent) : '';
    }
}

if (!function_exists('kbtLmlMetaContent')) {
    function kbtLmlMetaContent(DOMXPath $xpath, $query)
    {
        $node = kbtLmlFirstNode($xpath, $query);
        return $node ? trim((string) $node->getAttribute('content')) : '';
    }
}

if (!function_exists('kbtLmlLocaleFromPath')) {
    function kbtLmlLocaleFromPath($file)
    {
        $map = [
            'arabic' => ['locale' => 'ar', 'config' => 'ar', 'htmlLang' => 'ar', 'dir' => 'rtl'],
            'french' => ['locale' => 'fr', 'config' => 'fr', 'htmlLang' => 'fr', 'dir' => 'ltr'],
            'german' => ['locale' => 'de', 'config' => 'de', 'htmlLang' => 'de', 'dir' => 'ltr'],
            'japanese' => ['locale' => 'ja', 'config' => 'ja', 'htmlLang' => 'ja', 'dir' => 'ltr'],
            'korean' => ['locale' => 'ko', 'config' => 'ko', 'htmlLang' => 'ko', 'dir' => 'ltr'],
            'portuguese' => ['locale' => 'pt', 'config' => 'pt', 'htmlLang' => 'pt', 'dir' => 'ltr'],
            'russian' => ['locale' => 'ru', 'config' => 'ru', 'htmlLang' => 'ru', 'dir' => 'ltr'],
            'spanish' => ['locale' => 'es', 'config' => 'es', 'htmlLang' => 'es', 'dir' => 'ltr'],
        ];
        $path = str_replace('\\', '/', (string) $file);
        foreach ($map as $directory => $meta) {
            if (strpos($path, '/languages/' . $directory . '/') !== false) {
                $meta['directory'] = $directory;
                return $meta;
            }
        }
        return null;
    }
}

if (!function_exists('kbtLmlToolFromSlug')) {
    function kbtLmlToolFromSlug($slug)
    {
        $data = getSharedToolListData();
        foreach (($data['tools'] ?? []) as $tool) {
            if (($tool['routes']['localized'] ?? '') === $slug) {
                return $tool;
            }
        }
        return null;
    }
}

if (!function_exists('kbtLmlLocalImagePath')) {
    function kbtLmlLocalImagePath($src)
    {
        $src = html_entity_decode((string) $src, ENT_QUOTES, 'UTF-8');
        if ($src === '') {
            return '';
        }
        $path = parse_url($src, PHP_URL_PATH) ?: $src;
        $path = preg_replace('#^/kbt/#', '', $path);
        $path = ltrim($path, '/');
        if ($path !== '' && is_file(dirname(__DIR__) . '/' . $path)) {
            return $path;
        }
        return '';
    }
}

if (!function_exists('kbtLmlHeroImage')) {
    function kbtLmlHeroImage(DOMXPath $xpath, $tool)
    {
        $og = kbtLmlLocalImagePath(kbtLmlMetaContent($xpath, "//meta[@property='og:image']"));
        if ($og !== '') {
            return $og;
        }

        $imgQueries = [
            "//*[contains(concat(' ', normalize-space(@class), ' '), ' hero-visual ')]//img",
            "//*[contains(concat(' ', normalize-space(@class), ' '), ' landing-hero ')]//img",
            "//*[contains(concat(' ', normalize-space(@class), ' '), ' hero ')]//img",
        ];
        foreach ($imgQueries as $query) {
            $node = kbtLmlFirstNode($xpath, $query);
            if ($node) {
                $path = kbtLmlLocalImagePath($node->getAttribute('src'));
                if ($path !== '') {
                    return $path;
                }
            }
        }

        $fallbacks = function_exists('kbtToolPopularFallbackImages')
            ? kbtToolPopularFallbackImages($tool['category'] ?? 'keyboard')
            : [];
        return $fallbacks[0] ?? 'images/keyboard/hero-keyboard-test-900.webp';
    }
}

if (!function_exists('kbtLmlToolHtml')) {
    function kbtLmlToolHtml(DOMXPath $xpath)
    {
        $shell = kbtLmlFirstNode($xpath, "//*[contains(concat(' ', normalize-space(@class), ' '), ' tool-shell ')]");
        if ($shell) {
            $clone = $shell->cloneNode(true);
            kbtLmlPruneLegacyFragments($clone);
            return kbtLmlInnerHtml($clone);
        }

        $stage = kbtLmlFirstNode($xpath, "//*[contains(concat(' ', normalize-space(@class), ' '), ' tool-stage ') or contains(concat(' ', normalize-space(@class), ' '), ' ksi-stage ')]");
        if ($stage) {
            $clone = $stage->cloneNode(true);
            kbtLmlPruneLegacyFragments($clone);
            return kbtLmlInnerHtml($clone);
        }

        $main = kbtLmlFirstNode($xpath, '//main');
        if ($main) {
            $clone = $main->cloneNode(true);
            kbtLmlPruneLegacyFragments($clone);
            return kbtLmlInnerHtml($clone);
        }

        return '';
    }
}

if (!function_exists('kbtLmlSupportHtml')) {
    function kbtLmlIsSharedChromeScript($src, $text)
    {
        $src = (string) $src;
        $text = (string) $text;

        if ($src !== '' && preg_match('#(googletagmanager|pagead2|clarity|bootstrap|theme\.min\.js|theme\.js|ai-chat(?:\.min)?\.js)#i', $src)) {
            return true;
        }

        return $text !== '' && (bool) preg_match('/(localStorage\.getItem\([\'"]kbt-theme|siteHeaderMenuToggle|siteHeaderLangToggle|siteHeaderThemeToggle|KBT_CHAT_ENDPOINT|KBTLoadChatWidget|kbtChatBtn|hero-yt-facade|kbt-protected-email|kbtShowHouseAdSurfaces|serviceWorker|google-analytics|adsbygoogle|tools-list-section--unified|data-filterable)/i', $text);
    }

    function kbtLmlSupportHtml(DOMXPath $xpath, $toolHtml)
    {
        $head = '';
        foreach ($xpath->query('//link') as $link) {
            $rel = strtolower((string) $link->getAttribute('rel'));
            $href = (string) $link->getAttribute('href');
            if ($rel !== 'stylesheet' && !($rel === 'preload' && strtolower((string) $link->getAttribute('as')) === 'style')) {
                continue;
            }
            if (strpos($href, 'fonts.googleapis.com') !== false || strpos($href, 'index-modern') !== false || strpos($href, 'global.css') !== false) {
                continue;
            }
            $media = trim((string) $link->getAttribute('media'));
            $mediaAttr = $media !== '' ? ' media="' . kbtLmlEsc($media) . '"' : '';
            $hrefAttr = kbtLmlEsc($href);
            $head .= "\n" . '<link rel="preload" as="style" href="' . $hrefAttr . '" onload="this.onload=null;this.rel=\'stylesheet\'"' . $mediaAttr . '>';
            $head .= "\n" . '<noscript><link rel="stylesheet" href="' . $hrefAttr . '"' . $mediaAttr . '></noscript>';
        }

        foreach ($xpath->query('//style') as $style) {
            $id = (string) $style->getAttribute('id');
            $css = trim((string) $style->textContent);
            if ($css === '' || $id === 'kbt-after-tool-banner-style' || strpos($css, '@font-face') !== false || strpos($css, 'tools-list-section') !== false) {
                continue;
            }
            $head .= "\n" . $style->ownerDocument->saveHTML($style);
        }

        $body = '';
        foreach ($xpath->query('//script') as $script) {
            $type = strtolower(trim((string) $script->getAttribute('type')));
            $src = trim((string) $script->getAttribute('src'));
            $text = trim((string) $script->textContent);
            if ($type === 'application/ld+json') {
                continue;
            }
            if ($src !== '') {
                if (kbtLmlIsSharedChromeScript($src, $text)) {
                    continue;
                }
                if (strpos($toolHtml, $src) !== false) {
                    continue;
                }
                $body .= "\n" . $script->ownerDocument->saveHTML($script);
                continue;
            }
            if ($text === '' || strpos($toolHtml, $text) !== false || kbtLmlIsSharedChromeScript('', $text) || preg_match('/gtag/i', $text)) {
                continue;
            }
            $body .= "\n" . $script->ownerDocument->saveHTML($script);
        }

        return ['head' => $head, 'body' => $body];
    }
}

if (!function_exists('kbtLmlGuideCopy')) {
    function kbtLmlGuideCopy($locale, $title, $categoryLabel, array $faqs)
    {
        $generic = [
            'en' => ['kicker' => 'Quick guide', 'title' => 'How to use this tool', 'intro' => 'Run the test in your browser, then compare the result with the checks below.', 'stepsLabel' => 'Recommended workflow', 'keywordsLabel' => 'Related checks', 'note' => 'The tool runs locally in your browser whenever possible.', 'faqKicker' => 'Tool FAQ', 'faqTitle' => 'Common questions'],
            'es' => ['kicker' => 'Guia rapida', 'title' => 'Como usar esta herramienta', 'intro' => 'Ejecuta la prueba en el navegador y compara el resultado con las comprobaciones de abajo.', 'stepsLabel' => 'Flujo recomendado', 'keywordsLabel' => 'Comprobaciones relacionadas', 'note' => 'La herramienta se ejecuta localmente en tu navegador siempre que es posible.', 'faqKicker' => 'FAQ de la herramienta', 'faqTitle' => 'Preguntas comunes'],
            'fr' => ['kicker' => 'Guide rapide', 'title' => 'Comment utiliser cet outil', 'intro' => 'Lancez le test dans le navigateur, puis comparez le resultat avec les controles ci-dessous.', 'stepsLabel' => 'Flux recommande', 'keywordsLabel' => 'Controles lies', 'note' => 'L outil fonctionne localement dans votre navigateur lorsque c est possible.', 'faqKicker' => 'FAQ de l outil', 'faqTitle' => 'Questions courantes'],
            'de' => ['kicker' => 'Kurzanleitung', 'title' => 'So nutzt du dieses Tool', 'intro' => 'Starte den Test im Browser und vergleiche das Ergebnis mit den Prufpunkten unten.', 'stepsLabel' => 'Empfohlener Ablauf', 'keywordsLabel' => 'Verwandte Checks', 'note' => 'Das Tool lauft nach Moglichkeit lokal in deinem Browser.', 'faqKicker' => 'Tool FAQ', 'faqTitle' => 'Haufige Fragen'],
            'pt' => ['kicker' => 'Guia rapido', 'title' => 'Como usar esta ferramenta', 'intro' => 'Execute o teste no navegador e compare o resultado com as verificacoes abaixo.', 'stepsLabel' => 'Fluxo recomendado', 'keywordsLabel' => 'Verificacoes relacionadas', 'note' => 'A ferramenta roda localmente no navegador sempre que possivel.', 'faqKicker' => 'FAQ da ferramenta', 'faqTitle' => 'Perguntas comuns'],
            'ar' => ['kicker' => 'دليل سريع', 'title' => 'كيفية استخدام هذه الأداة', 'intro' => 'شغل الاختبار داخل المتصفح ثم قارن النتيجة مع الفحوصات أدناه.', 'stepsLabel' => 'خطوات مقترحة', 'keywordsLabel' => 'فحوصات مرتبطة', 'note' => 'تعمل الأداة محليا داخل المتصفح كلما كان ذلك ممكنا.', 'faqKicker' => 'أسئلة الأداة', 'faqTitle' => 'أسئلة شائعة'],
            'ru' => ['kicker' => 'Краткое руководство', 'title' => 'Как пользоваться этим инструментом', 'intro' => 'Запустите тест в браузере и сравните результат с проверками ниже.', 'stepsLabel' => 'Рекомендуемый порядок', 'keywordsLabel' => 'Связанные проверки', 'note' => 'Инструмент по возможности работает локально в браузере.', 'faqKicker' => 'FAQ инструмента', 'faqTitle' => 'Частые вопросы'],
            'ja' => ['kicker' => 'クイックガイド', 'title' => 'このツールの使い方', 'intro' => 'ブラウザでテストを実行し、下の確認項目と結果を比べてください。', 'stepsLabel' => 'おすすめ手順', 'keywordsLabel' => '関連チェック', 'note' => '可能な場合、このツールはブラウザ内でローカルに動作します。', 'faqKicker' => 'ツールFAQ', 'faqTitle' => 'よくある質問'],
            'ko' => ['kicker' => '빠른 안내', 'title' => '이 도구 사용 방법', 'intro' => '브라우저에서 테스트를 실행한 뒤 아래 확인 항목과 결과를 비교하세요.', 'stepsLabel' => '권장 순서', 'keywordsLabel' => '관련 확인', 'note' => '가능한 경우 이 도구는 브라우저 안에서 로컬로 실행됩니다.', 'faqKicker' => '도구 FAQ', 'faqTitle' => '자주 묻는 질문'],
        ];
        $g = $generic[$locale] ?? $generic['en'];
        $steps = [
            ['title' => $title, 'text' => $g['intro']],
            ['title' => $categoryLabel, 'text' => $g['note']],
        ];
        if (!$faqs) {
            $faqs = [
                ['question' => $title, 'answer' => $g['intro']],
                ['question' => $categoryLabel, 'answer' => $g['note']],
            ];
        }
        return [
            'guide' => [
                'kicker' => $g['kicker'],
                'title' => $g['title'],
                'intro' => $g['intro'],
                'stepsLabel' => $g['stepsLabel'],
                'keywordsLabel' => $g['keywordsLabel'],
                'steps' => $steps,
                'note' => $g['note'],
            ],
            'faqKicker' => $g['faqKicker'],
            'faqTitle' => $g['faqTitle'],
            'faqs' => $faqs,
        ];
    }
}

if (!function_exists('kbtLmlExtractFaqs')) {
    function kbtLmlExtractFaqs(DOMXPath $xpath)
    {
        $faqs = [];
        // Only harvest genuine FAQ disclosures. Previously this grabbed EVERY <details>,
        // including the keyboard tester's UI control (<details class="adv-details">
        // <summary>Detailed measurements</summary>), which leaked that English string in as
        // the #1 FAQ on all 8 localized homepages.
        $faqQuery = "//details["
            . "contains(concat(' ', normalize-space(@class), ' '), ' faq-item ')"
            . " or ancestor::*[contains(concat(' ', normalize-space(@class), ' '), ' faq-list ')]"
            . " or ancestor::*[contains(concat(' ', normalize-space(@class), ' '), ' home-faq-list ')]"
            . " or ancestor::*[contains(concat(' ', normalize-space(@class), ' '), ' seo-faq ')]"
            . " or ancestor::*[contains(concat(' ', normalize-space(@class), ' '), ' faq ')]"
            . "]";
        $nodes = $xpath->query($faqQuery);
        if (!$nodes || $nodes->length === 0) {
            // Fallback for pages without an FAQ container class: any disclosure that is not a tool-UI control.
            $nodes = $xpath->query("//details[not(contains(concat(' ', normalize-space(@class), ' '), ' adv-details '))]");
        }
        if ($nodes) {
            foreach ($nodes as $detail) {
                $summary = kbtLmlFirstText($xpath, './/summary', $detail);
                $answer = kbtLmlFirstText($xpath, './/p', $detail);
                if ($summary !== '' && $answer !== '') {
                    $faqs[] = ['question' => $summary, 'answer' => $answer];
                }
            }
        }
        return array_slice($faqs, 0, 6);
    }
}

if (!function_exists('kbtLmlTextLength')) {
    function kbtLmlTextLength($value)
    {
        $value = kbtLmlCleanUtf8($value);
        if (function_exists('mb_strlen')) {
            return mb_strlen($value, 'UTF-8');
        }

        if (preg_match_all('/./us', $value, $matches)) {
            return count($matches[0]);
        }

        return strlen($value);
    }
}

if (!function_exists('kbtLmlAnswerReadyDescription')) {
    function kbtLmlAnswerReadyDescription($locale, $description, $title, $categoryLabel)
    {
        $description = kbtLmlCleanUtf8($description);
        $title = kbtLmlCleanUtf8($title);
        $categoryLabel = kbtLmlCleanUtf8($categoryLabel);
        $normalized = preg_replace('/\s+/u', ' ', $description);
        $description = trim(is_string($normalized) ? $normalized : $description);
        if ($description === '') {
            $description = trim($title);
        }

        if (kbtLmlTextLength($description) >= 150) {
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

        $suffix = $suffixes[$locale] ?? ' Runs directly in the browser with no download or sign-up, instant results, and links to related hardware checks.';
        $expanded = rtrim($description, ".。؟! ") . '.' . $suffix;
        // No English fallback sentence on localized pages: the flat 150-char check tripped for
        // character-dense CJK and leaked English into Korean/Japanese/Arabic meta descriptions.

        return kbtLmlCleanUtf8($expanded);
    }
}

$__lmlCaller = kbtLmlCallerFile();
$__lmlLocaleMeta = kbtLmlLocaleFromPath($__lmlCaller);
if (!$__lmlLocaleMeta) {
    return;
}

$__lmlHtml = kbtLmlCaptureLegacy($__lmlCaller);
$__lmlDom = kbtLmlDom($__lmlHtml);
$__lmlXpath = new DOMXPath($__lmlDom);
$__lmlData = getSharedToolListData();
$__lmlLocale = $__lmlLocaleMeta['locale'];
$__lmlLocaleData = $__lmlData['locales'][$__lmlLocale] ?? [];
$__lmlFile = basename($__lmlCaller);
$__lmlSlug = $__lmlFile === 'index.php' ? '' : $__lmlFile;
$__lmlTool = kbtLmlToolFromSlug($__lmlSlug) ?: [
    'id' => preg_replace('/\.php$/', '', $__lmlSlug),
    'category' => 'utility',
    'name' => kbtLmlFirstText($__lmlXpath, '//h1'),
    'description' => kbtLmlMetaContent($__lmlXpath, "//meta[@name='description']"),
    'routes' => ['localized' => $__lmlSlug],
];
$__lmlToolId = $__lmlTool['id'] ?? preg_replace('/\.php$/', '', $__lmlSlug);
$__lmlLocalizedTool = $__lmlLocaleData['tools'][$__lmlToolId] ?? [];
$__lmlTitleText = $__lmlLocalizedTool['name'] ?? kbtLmlFirstText($__lmlXpath, '//h1');
$__lmlDescription = $__lmlLocalizedTool['description'] ?? kbtLmlMetaContent($__lmlXpath, "//meta[@name='description']");
$__lmlCategory = $__lmlTool['category'] ?? 'utility';
$__lmlCategoryLabel = $__lmlLocaleData['category_labels'][$__lmlCategory] ?? ucfirst($__lmlCategory);
$__lmlDescription = kbtLmlAnswerReadyDescription($__lmlLocale, $__lmlDescription, $__lmlTitleText, $__lmlCategoryLabel);
$__lmlLegacyPageTitle = kbtLmlFirstText($__lmlXpath, '//title');
if (kbtLmlLooksMojibake($__lmlLegacyPageTitle, $__lmlLocale)) {
    $__lmlLegacyPageTitle = '';
}
$__lmlPageTitle = $__lmlLegacyPageTitle ?: $__lmlTitleText . ' | KeyboardTester.click';
$__lmlKeywords = kbtLmlMetaContent($__lmlXpath, "//meta[@name='keywords']");
if (kbtLmlLooksMojibake($__lmlKeywords, $__lmlLocale)) {
    $__lmlKeywords = implode(', ', array_values(array_filter(array_unique([$__lmlTitleText, $__lmlCategoryLabel, $__lmlTool['name'] ?? '']))));
}
$__lmlToolHtml = kbtLmlToolHtml($__lmlXpath);
$__lmlSupport = kbtLmlSupportHtml($__lmlXpath, $__lmlToolHtml);
$__lmlFaqs = kbtLmlExtractFaqs($__lmlXpath);
$__lmlGuide = kbtLmlGuideCopy($__lmlLocale, $__lmlTitleText, $__lmlCategoryLabel, $__lmlFaqs);
$__lmlStageId = preg_replace('/[^a-z0-9_-]+/i', '-', trim($__lmlToolId ?: 'tool', '-')) ?: 'tool';
$__lmlHeroImage = kbtLmlHeroImage($__lmlXpath, $__lmlTool);
$__lmlHeroAlt = kbtLmlFirstNode($__lmlXpath, "//*[contains(concat(' ', normalize-space(@class), ' '), ' hero ')]//img")
    ? kbtLmlFirstNode($__lmlXpath, "//*[contains(concat(' ', normalize-space(@class), ' '), ' hero ')]//img")->getAttribute('alt')
    : $__lmlTitleText;
if (kbtLmlLooksMojibake($__lmlHeroAlt, $__lmlLocale)) {
    $__lmlHeroAlt = $__lmlTitleText;
}
$__lmlPrimaryCta = kbtLmlFirstText($__lmlXpath, "//*[contains(concat(' ', normalize-space(@class), ' '), ' landing-btn-primary ')]");
if ($__lmlPrimaryCta === '' || kbtLmlLooksMojibake($__lmlPrimaryCta, $__lmlLocale)) {
    $__lmlPrimaryCta = $__lmlLocaleData['default_cta'] ?? 'Open tool';
}
$__lmlStageTitle = kbtLmlFirstText($__lmlXpath, "//*[contains(concat(' ', normalize-space(@class), ' '), ' tool-stage ')]//h2");
if ($__lmlStageTitle === '' || kbtLmlLooksMojibake($__lmlStageTitle, $__lmlLocale)) {
    $__lmlStageTitle = $__lmlTitleText;
}
$__lmlStageLede = kbtLmlFirstText($__lmlXpath, "//*[contains(concat(' ', normalize-space(@class), ' '), ' section-lede ')]");
if ($__lmlStageLede === '' || kbtLmlLooksMojibake($__lmlStageLede, $__lmlLocale)) {
    $__lmlStageLede = $__lmlDescription;
}

$__lmlHreflangs = [];
foreach ($__lmlXpath->query("//link[@rel='alternate'][@hreflang]") as $link) {
    $__lmlHreflangs[$link->getAttribute('hreflang')] = $link->getAttribute('href');
}
if (!$__lmlHreflangs && !empty($__lmlTool['routes']['en'])) {
    $__lmlHreflangs['en'] = absoluteUrl($__lmlTool['routes']['en']);
    foreach (($__lmlData['locales'] ?? []) as $code => $localeInfo) {
        if ($code === 'en' || empty($localeInfo['directory'])) {
            continue;
        }
        $localizedSlug = $__lmlTool['routes']['localized'] ?? '';
        $localizedPath = 'languages/' . $localeInfo['directory'] . '/' . $localizedSlug;
        if ($localizedSlug !== '' && is_file(dirname(__DIR__) . '/' . $localizedPath)) {
            $__lmlHreflangs[$code] = absoluteUrl($localizedPath);
        }
    }
    $__lmlHreflangs['x-default'] = absoluteUrl($__lmlTool['routes']['en']);
}

$localizedModernToolPage = kbtLmlCleanValue([
    'locale' => $__lmlLocale,
    'htmlLang' => $__lmlLocaleMeta['htmlLang'],
    'dir' => $__lmlLocaleMeta['dir'],
    'urlPath' => 'languages/' . $__lmlLocaleMeta['directory'] . '/' . $__lmlSlug,
    'canonical' => 'languages/' . $__lmlLocaleMeta['directory'] . '/' . $__lmlSlug,
    'hreflangs' => $__lmlHreflangs,
    'headerInclude' => 'languages/' . $__lmlLocaleMeta['directory'] . '/header-' . $__lmlLocaleMeta['config'] . '.php',
    'footerInclude' => 'languages/' . $__lmlLocaleMeta['directory'] . '/footer-' . $__lmlLocaleMeta['config'] . '.php',
    'toolId' => $__lmlToolId,
    'category' => $__lmlCategory,
    'title' => $__lmlPageTitle,
    'description' => $__lmlDescription,
    'keywords' => $__lmlKeywords,
    'keywordsList' => array_values(array_filter(array_unique([$__lmlTitleText, $__lmlCategoryLabel, $__lmlTool['name'] ?? '']))),
    'heroKicker' => $__lmlCategoryLabel,
    'heroTitleLines' => [$__lmlTitleText],
    'heroLede' => $__lmlDescription,
    'heroImage' => $__lmlHeroImage,
    'heroImageWidth' => 1400,
    'heroImageHeight' => 788,
    'heroImageAlt' => $__lmlHeroAlt,
    'heroAlt' => $__lmlHeroAlt,
    'primaryCta' => $__lmlPrimaryCta,
    'secondaryCta' => $__lmlLocaleData['title'] ?? 'More tools',
    'stageId' => $__lmlStageId,
    'shellId' => $__lmlStageId . '-tool',
    'stageTitle' => $__lmlStageTitle,
    'stageLede' => $__lmlStageLede,
    'stageAriaLabel' => $__lmlTitleText,
    'homeLabel' => $__lmlLocaleData['all_label'] ?? 'Home',
    'popularTools' => [
        'heading' => $__lmlLocaleData['title'] ?? 'Popular tools',
        'allLabel' => $__lmlLocaleData['all_label'] ?? 'All tools',
        'ariaLabel' => $__lmlLocaleData['title'] ?? 'Popular tools',
    ],
    'guide' => $__lmlGuide['guide'],
    'faqKicker' => $__lmlGuide['faqKicker'],
    'faqTitle' => $__lmlGuide['faqTitle'],
    'faqs' => $__lmlGuide['faqs'],
    'toolHtml' => $__lmlToolHtml,
    'legacyHeadHtml' => $__lmlSupport['head'],
    'legacyBodyHtml' => $__lmlSupport['body'],
]);

require __DIR__ . '/render-localized-modern-tool-page.php';
return;
