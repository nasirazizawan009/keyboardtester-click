<?php
/**
 * Shared wrapper for older English tool pages whose live tool is inline in the
 * page instead of a reusable tools/*.php partial.
 */

if (!function_exists('url')) {
    require_once __DIR__ . '/../config.php';
}

require_once __DIR__ . '/components/adsense-slot.php';
require_once __DIR__ . '/components/microsoft-store-badge.php';
require_once __DIR__ . '/components/tool-page-context.php';
require_once __DIR__ . '/components/tool-popular-tools.php';

$GLOBALS['kbtTemplateFunctionsOnly'] = true;
require_once __DIR__ . '/render-english-tool-page.php';
unset($GLOBALS['kbtTemplateFunctionsOnly']);

if (!function_exists('kbtInlineTemplateCallerFile')) {
    function kbtInlineTemplateCallerFile()
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 4);
        foreach ($trace as $frame) {
            $file = $frame['file'] ?? '';
            if ($file !== '' && realpath($file) !== realpath(__FILE__)) {
                return $file;
            }
        }
        return $_SERVER['SCRIPT_FILENAME'] ?? '';
    }
}

if (!function_exists('kbtInlineCaptureLegacyHtml')) {
    function kbtInlineCaptureLegacyHtml($file)
    {
        if (!$file || !is_file($file)) {
            return '';
        }

        $hadLang = array_key_exists('lang', $_GET);
        $oldLang = $hadLang ? $_GET['lang'] : null;
        $_GET['lang'] = 'legacy-template-source';

        ob_start();
        include $file;
        $html = ob_get_clean();

        if ($hadLang) {
            $_GET['lang'] = $oldLang;
        } else {
            unset($_GET['lang']);
        }

        return (string) $html;
    }
}

if (!function_exists('kbtInlineDom')) {
    function kbtInlineDom($html)
    {
        $dom = new DOMDocument();
        $previous = libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="UTF-8">' . (string) $html, LIBXML_NOWARNING | LIBXML_NOERROR);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);
        return $dom;
    }
}

if (!function_exists('kbtInlineNodeInnerHtml')) {
    function kbtInlineNodeInnerHtml($node)
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

if (!function_exists('kbtInlineFirstText')) {
    function kbtInlineFirstText(DOMXPath $xpath, $query, $context = null)
    {
        $nodes = $context ? $xpath->query($query, $context) : $xpath->query($query);
        if ($nodes && $nodes->length) {
            return trim(preg_replace('/\s+/', ' ', $nodes->item(0)->textContent));
        }
        return '';
    }
}

if (!function_exists('kbtInlinePageTitleLine')) {
    function kbtInlinePageTitleLine($title, $fallback)
    {
        $title = trim((string) $title);
        $title = preg_replace('/\s*\|\s*KeyboardTester\.click.*$/i', '', $title);
        $title = preg_replace('/^free\s+open\s+source\s+/i', '', $title);
        $title = preg_replace('/^free\s+online\s+/i', '', $title);
        $title = preg_replace('/^free\s+/i', '', $title);
        return trim($title) ?: $fallback;
    }
}

if (!function_exists('kbtInlineExtractLegacyParts')) {
    function kbtInlineExtractLegacyParts($html)
    {
        $dom = kbtInlineDom($html);
        $xpath = new DOMXPath($dom);
        $classMatch = static function ($class) {
            return "contains(concat(' ', normalize-space(@class), ' '), ' " . $class . " ')";
        };

        $toolNode = null;
        $toolShell = $xpath->query('//*[contains(concat(" ", normalize-space(@class), " "), " tool-shell ")]');
        if ($toolShell && $toolShell->length) {
            $toolNode = $toolShell->item(0);
        }
        if (!$toolNode) {
            $stage = $xpath->query('//*[contains(concat(" ", normalize-space(@class), " "), " tool-stage ") or contains(concat(" ", normalize-space(@class), " "), " ksi-stage ")]');
            if ($stage && $stage->length) {
                $toolNode = $stage->item(0);
            }
        }

        $stageNode = $toolNode;
        while ($stageNode && $stageNode->nodeType === XML_ELEMENT_NODE && strpos(' ' . $stageNode->getAttribute('class') . ' ', ' tool-stage ') === false) {
            $stageNode = $stageNode->parentNode;
        }

        $toolHtml = kbtInlineNodeInnerHtml($toolNode);
        $toolHtml = preg_replace('#<h1\b[^>]*>[\s\S]*?</h1>#i', '', $toolHtml);
        $toolTitle = kbtInlineFirstText($xpath, './/h1|.//h2', $stageNode ?: $toolNode);
        $toolLede = kbtInlineFirstText($xpath, './/*[contains(concat(" ", normalize-space(@class), " "), " section-lede ") or contains(concat(" ", normalize-space(@class), " "), " tool-subtitle ")]', $stageNode ?: $toolNode);

        $styles = [];
        foreach ($xpath->query('//style') as $style) {
            $styles[] = $dom->saveHTML($style);
        }

        $scripts = [];
        $jsonLd = [];
        foreach ($xpath->query('//script') as $script) {
            $type = strtolower(trim($script->getAttribute('type')));
            $src = trim($script->getAttribute('src'));
            if ($type === 'application/ld+json') {
                $jsonLd[] = $dom->saveHTML($script);
                continue;
            }
            if ($src !== '') {
                continue;
            }
            $text = trim($script->textContent);
            if ($text === '' || stripos($text, 'googletagmanager') !== false || stripos($text, 'clarity') !== false) {
                continue;
            }

            $skipSharedScriptNeedles = [
                'KBT_CHAT_',
                'KBT_ROBOT_IMG',
                'ai-chat',
                'kbtChat',
                'siteHeader',
                'back-to-top',
                'backToTop',
                'data-theme-toggle',
                'themechange',
                'adsbygoogle',
                'kbt-ad-slot',
                'kbtProtectedEmail',
            ];
            $isSharedChromeScript = false;
            foreach ($skipSharedScriptNeedles as $needle) {
                if (stripos($text, $needle) !== false) {
                    $isSharedChromeScript = true;
                    break;
                }
            }
            if ($isSharedChromeScript) {
                continue;
            }

            $scripts[] = $dom->saveHTML($script);
        }

        $steps = [];
        $sectionQuery = '//section[contains(concat(" ", normalize-space(@class), " "), " feature-band ") or contains(concat(" ", normalize-space(@class), " "), " process-band ")]';
        foreach ($xpath->query($sectionQuery) as $section) {
            $title = kbtInlineFirstText($xpath, './/h2', $section);
            $text = kbtInlineFirstText($xpath, './/p', $section);
            if ($title !== '' && $text !== '' && stripos($title, 'popular') === false) {
                $steps[] = ['title' => $title, 'text' => $text];
            }
        }

        $faqs = [];
        foreach ($jsonLd as $scriptHtml) {
            $json = html_entity_decode(strip_tags($scriptHtml), ENT_QUOTES, 'UTF-8');
            $data = json_decode($json, true);
            $items = [];
            if (($data['@type'] ?? '') === 'FAQPage') {
                $items = $data['mainEntity'] ?? [];
            } elseif (isset($data[0])) {
                foreach ($data as $entry) {
                    if (($entry['@type'] ?? '') === 'FAQPage') {
                        $items = array_merge($items, $entry['mainEntity'] ?? []);
                    }
                }
            }
            foreach ($items as $item) {
                $question = trim((string) ($item['name'] ?? ''));
                $answer = $item['acceptedAnswer']['text'] ?? '';
                $answer = trim(preg_replace('/\s+/', ' ', (string) $answer));
                if ($question !== '' && $answer !== '') {
                    $faqs[] = ['question' => $question, 'answer' => $answer];
                }
            }
        }

        $stageElement = ($stageNode && $stageNode->nodeType === XML_ELEMENT_NODE) ? $stageNode : null;
        $toolElement = ($toolNode && $toolNode->nodeType === XML_ELEMENT_NODE) ? $toolNode : null;

        return [
            'toolHtml' => $toolHtml,
            'stageId' => ($stageElement && $stageElement->hasAttribute('id')) ? $stageElement->getAttribute('id') : 'tool-stage',
            'shellId' => ($toolElement && $toolElement->hasAttribute('id')) ? $toolElement->getAttribute('id') : 'tool-shell',
            'toolTitle' => $toolTitle,
            'toolLede' => $toolLede,
            'styles' => $styles,
            'scripts' => $scripts,
            'jsonLd' => $jsonLd,
            'steps' => array_slice($steps, 0, 4),
            'faqs' => array_slice($faqs, 0, 6),
        ];
    }
}

if (!function_exists('kbtInlineJsonLdHasType')) {
    function kbtInlineJsonLdHasType(array $jsonLdBlocks, $schemaType)
    {
        $needle = (string) $schemaType;
        $walk = static function ($value) use (&$walk, $needle) {
            if (is_array($value)) {
                if (isset($value['@type'])) {
                    $types = is_array($value['@type']) ? $value['@type'] : [$value['@type']];
                    foreach ($types as $type) {
                        if ((string) $type === $needle) {
                            return true;
                        }
                    }
                }
                foreach ($value as $child) {
                    if ($walk($child)) {
                        return true;
                    }
                }
            }
            return false;
        };

        foreach ($jsonLdBlocks as $scriptHtml) {
            $json = html_entity_decode(strip_tags((string) $scriptHtml), ENT_QUOTES, 'UTF-8');
            $data = json_decode($json, true);
            if (is_array($data) && $walk($data)) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('kbtInlineRenderGuideFaq')) {
    function kbtInlineRenderGuideFaq($context, $parts, $schemaKey = '')
    {
        global $pageDescription, $pageKeywords;

        $tool = $context['tool'] ?? [];
        $toolName = $tool['name'] ?? ($parts['toolTitle'] ?: 'Online tool');
        $category = $tool['category'] ?? 'keyboard';
        $categoryLabel = $tool['category_label'] ?? ucfirst($category);
        $intro = kbtTemplateShortText($pageDescription ?: ($tool['description'] ?? 'Use the live browser-based test below.'), 330);
        $steps = $parts['steps'] ?: [
            ['title' => 'Start the live tool', 'text' => 'Open the test area and follow the on-screen controls before drawing conclusions.'],
            ['title' => 'Run one clean pass', 'text' => 'Keep input steady so the result is useful for comparison and troubleshooting.'],
            ['title' => 'Repeat the check', 'text' => 'Run another pass if browser focus, permissions, or hardware settings changed.'],
            ['title' => 'Compare with related tools', 'text' => 'Use the related diagnostics to confirm whether the issue belongs to the device or the browser.'],
        ];

        $faqs = $parts['faqs'];
        if (!$faqs && $schemaKey && function_exists('getToolFAQs')) {
            $faqs = getToolFAQs($schemaKey);
        }
        if (!$faqs) {
            $faqs = [
                ['question' => 'Is this test free?', 'answer' => 'Yes. The tool runs in your browser without an account or installation.'],
                ['question' => 'Does it change my hardware settings?', 'answer' => 'No. The page reads browser events or device signals and does not change system settings.'],
                ['question' => 'Why should I test more than once?', 'answer' => 'A second run helps rule out browser focus, permission prompts, wireless interference, and accidental input.'],
            ];
        }

        $keywords = kbtTemplateKeywords($context, $pageKeywords ?? '');
        ?>
        <section class="home-guideline-brief" id="guidelines" aria-labelledby="inline-guidelines-title">
            <div class="container home-guideline-layout home-guideline-layout--balanced">
                <div class="home-guideline-copy">
                    <p class="section-kicker"><?php echo htmlspecialchars($toolName, ENT_QUOTES, 'UTF-8'); ?> guide</p>
                    <h2 id="inline-guidelines-title">How to use the <?php echo htmlspecialchars($toolName, ENT_QUOTES, 'UTF-8'); ?> accurately</h2>
                    <p><?php echo htmlspecialchars($intro, ENT_QUOTES, 'UTF-8'); ?></p>
                    <div class="home-guideline-steps">
                        <?php foreach (array_slice($steps, 0, 4) as $index => $step): ?>
                            <article class="home-guideline-step">
                                <span class="home-guideline-step-number"><?php echo str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
                                <span>
                                    <strong><?php echo htmlspecialchars($step['title'], ENT_QUOTES, 'UTF-8'); ?></strong>
                                    <small><?php echo htmlspecialchars(kbtTemplateShortText($step['text'] ?? '', 230), ENT_QUOTES, 'UTF-8'); ?></small>
                                </span>
                            </article>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($keywords): ?>
                        <div class="home-keyword-strip" aria-label="Related <?php echo htmlspecialchars($categoryLabel, ENT_QUOTES, 'UTF-8'); ?> checks">
                            <?php foreach ($keywords as $keyword): ?>
                                <a href="<?php echo htmlspecialchars(kbtTemplateCategoryHref($category), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="home-faq-panel" aria-labelledby="inline-faq-title">
                    <p class="section-kicker"><?php echo htmlspecialchars($toolName, ENT_QUOTES, 'UTF-8'); ?> FAQ</p>
                    <h2 id="inline-faq-title">Common <?php echo htmlspecialchars(strtolower($toolName), ENT_QUOTES, 'UTF-8'); ?> questions</h2>
                    <div class="home-faq-list home-faq-list--expanded">
                        <?php foreach (array_slice($faqs, 0, 6) as $faq): ?>
                            <details open>
                                <summary><?php echo htmlspecialchars($faq['question'] ?? '', ENT_QUOTES, 'UTF-8'); ?></summary>
                                <p><?php echo htmlspecialchars(kbtTemplateShortText($faq['answer'] ?? '', 320), ENT_QUOTES, 'UTF-8'); ?></p>
                            </details>
                        <?php endforeach; ?>
                    </div>
                    <?php if (count($faqs) < 5 && count($steps) > 1): ?>
                        <div class="home-faq-support">
                            <p class="section-kicker">Checklist</p>
                            <h3><?php echo htmlspecialchars($categoryLabel, ENT_QUOTES, 'UTF-8'); ?> checks to confirm</h3>
                            <ul>
                                <?php foreach (array_slice($steps, 0, 3) as $supportStep): ?>
                                    <li>
                                        <strong><?php echo htmlspecialchars($supportStep['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></strong>
                                        <span><?php echo htmlspecialchars(kbtTemplateShortText($supportStep['text'] ?? '', 180), ENT_QUOTES, 'UTF-8'); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}

$__kbtCallerFile = kbtInlineTemplateCallerFile();
$__kbtLegacyHtml = kbtInlineCaptureLegacyHtml($__kbtCallerFile);
$__kbtInlineParts = kbtInlineExtractLegacyParts($__kbtLegacyHtml);
$__kbtToolId = $kbtTemplateToolId ?? ($GLOBALS['kbtTemplateToolId'] ?? null);
$__kbtContext = kbtGetEnglishToolPageContext($__kbtToolId);

if (!$__kbtContext) {
    return;
}

$__kbtTool = $__kbtContext['tool'];
$__kbtSchemaKey = $kbtTemplateSchemaKey ?? str_replace('-', '_', $__kbtTool['id']);
$__kbtTitle = $kbtTemplateToolTitle ?? ($__kbtInlineParts['toolTitle'] ?: ($__kbtTool['name'] ?? 'Online Tool'));
$__kbtLede = $kbtTemplateToolLede ?? ($__kbtInlineParts['toolLede'] ?: ($__kbtTool['description'] ?? 'Run the live browser-based check below.'));
$__kbtStageId = $kbtTemplateStageId ?? ($__kbtInlineParts['stageId'] ?: (($__kbtTool['id'] ?? 'tool') . '-stage'));
$__kbtShellId = $kbtTemplateShellId ?? ($__kbtInlineParts['shellId'] ?: (($__kbtTool['id'] ?? 'tool') . '-tool'));
$__kbtHeroImage = $pageOgImage ?? '';
$__kbtHeroAlt = $pageOgImageAlt ?? (($__kbtTitle ?: 'KeyboardTester.click tool') . ' hero image');
$__kbtHeroLede = $pageDescription ?? $__kbtLede;
$__kbtHeroLine = kbtInlinePageTitleLine($pageTitle ?? '', $__kbtTitle);
$__kbtCategory = $__kbtTool['category'] ?? 'keyboard';
$__kbtCategoryHref = kbtTemplateCategoryHref($__kbtCategory);

$GLOBALS['kbtSuppressFooterAd'] = true;
$GLOBALS['__kbtToolPopularToolsRendered'] = false;
$GLOBALS['__kbtToolBlogPostsRendered'] = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/seo-meta.php'; ?>
  <link rel="icon" type="image/x-icon" href="<?php echo url('navigation.png'); ?>">
  <?php
  $loadBootstrapCss = $loadBootstrapCss ?? false;
  $loadBootstrapJs = $loadBootstrapJs ?? false;
  $loadMobileToolAdapters = $loadMobileToolAdapters ?? false;
  $loadInterFont = $loadInterFont ?? false;
  include __DIR__ . '/head-common.php';
  $imv = filemtime(__DIR__ . '/../assets/css/index-modern.min.css');
  ?>
  <link rel="preload" as="style" href="<?php echo url('assets/css/index-modern.min.css') . '?v=' . $imv; ?>">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.min.css') . '?v=' . $imv; ?>">
  <?php foreach ($__kbtInlineParts['jsonLd'] as $__jsonLd) { echo $__jsonLd; } ?>
  <?php
  include_once __DIR__ . '/schema.php';
  if (!kbtInlineJsonLdHasType($__kbtInlineParts['jsonLd'], 'WebApplication')) {
      echo schemaWebApplication([
          'name' => $__kbtTitle,
          'description' => $pageDescription ?? $__kbtLede,
          'url' => $__kbtTool['route'] ?? '',
          'category' => 'UtilityApplication',
          'features' => array_filter([
              $__kbtTool['category_label'] ?? '',
              'Browser-based test',
              'No download required',
              'Instant diagnostic result',
          ]),
          'screenshot' => $__kbtHeroImage ?: null,
      ]);
  }
  if (!kbtInlineJsonLdHasType($__kbtInlineParts['jsonLd'], 'BreadcrumbList')) {
      echo schemaBreadcrumbs([
          ['name' => 'Home', 'url' => '/'],
          ['name' => $__kbtTool['category_label'] ?? 'Tools', 'url' => 'pages/all-tools.php#' . ($__kbtCategory ?? 'tools')],
          ['name' => $__kbtTitle, 'url' => ''],
      ]);
  }
  ?>
  <?php foreach ($__kbtInlineParts['styles'] as $__style) { echo $__style; } ?>
</head>
<body class="landing-page home-redesign">
  <?php include __DIR__ . '/../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero home-hero tool-template-hero">
      <div class="home-banner">
        <?php if ($__kbtHeroImage): ?>
          <picture class="home-banner-media">
            <?php kbtResponsivePictureSources($__kbtHeroImage, '100vw'); ?>
            <img src="<?php echo htmlspecialchars(url($__kbtHeroImage), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($__kbtHeroAlt, ENT_QUOTES, 'UTF-8'); ?>" width="1400" height="788" loading="eager" fetchpriority="high" decoding="async"<?php echo kbtResponsiveImgSrcsetAttributes($__kbtHeroImage, '100vw'); ?>>
          </picture>
        <?php endif; ?>
        <div class="home-banner-content">
          <div class="home-banner-copy">
            <p class="hero-kicker">KeyboardTester.click</p>
            <h1 class="hero-title"><span class="hero-title-line">Free</span> <span class="hero-title-line"><?php echo htmlspecialchars($__kbtHeroLine, ENT_QUOTES, 'UTF-8'); ?></span></h1>
            <p class="hero-lede"><?php echo htmlspecialchars($__kbtHeroLede, ENT_QUOTES, 'UTF-8'); ?></p>
            <div class="hero-actions">
              <a class="landing-btn landing-btn-primary" href="#<?php echo htmlspecialchars($__kbtStageId, ENT_QUOTES, 'UTF-8'); ?>">Start test</a>
              <a class="landing-btn landing-btn-ghost" href="<?php echo htmlspecialchars($__kbtCategoryHref, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($__kbtTool['category_label'] ?? 'Tools', ENT_QUOTES, 'UTF-8'); ?> tools <span class="btn-caret" aria-hidden="true">&gt;</span></a>
            </div>
          </div>
        </div>
        <div class="home-hero-store-button">
          <?php kbtRenderMicrosoftStoreBadge(['class' => 'home-hero-store-badge', 'priority' => true]); ?>
        </div>
        <?php kbtRenderAdSlot('home_hero_banner', ['class' => 'kbt-ad-slot--home-hero-banner', 'format' => 'horizontal', 'aria_label' => 'Sponsored hero banner']); ?>
      </div>
    </section>

    <?php include __DIR__ . '/components/home-category-band.php'; ?>

    <section class="tool-stage tool-template-stage" id="<?php echo htmlspecialchars($__kbtStageId, ENT_QUOTES, 'UTF-8'); ?>" data-header-hide-stage aria-label="<?php echo htmlspecialchars($__kbtTitle, ENT_QUOTES, 'UTF-8'); ?> workspace">
      <section id="<?php echo htmlspecialchars($__kbtShellId, ENT_QUOTES, 'UTF-8'); ?>" class="tool-shell">
        <div class="tool-template-inline-head">
          <h2><?php echo htmlspecialchars($__kbtTitle, ENT_QUOTES, 'UTF-8'); ?></h2>
          <p><?php echo htmlspecialchars($__kbtLede, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <?php echo $__kbtInlineParts['toolHtml']; ?>
      </section>
    </section>

    <section class="home-after-tool-banner" aria-label="Sponsored placement">
      <?php kbtRenderAdSlot('home_after_tool_banner', ['class' => 'kbt-ad-slot--after-tool-banner', 'format' => 'auto', 'aria_label' => 'Sponsored placement', 'min_width' => 769]); ?>
    </section>

    <?php include __DIR__ . '/components/tools-list.php'; ?>

    <div class="home-rails-region">
      <aside class="home-rails-side home-rails-side--left" aria-hidden="true">
        <div class="home-rails-side__sticky">
          <?php kbtRenderAdSlot('home_guidelines_left_rail', ['class' => 'kbt-ad-slot--home-guideline-rail kbt-ad-slot--home-guideline-left', 'format' => 'auto', 'aria_label' => 'Sponsored guide placement', 'min_width' => 1281]); ?>
        </div>
      </aside>
      <aside class="home-rails-side home-rails-side--right" aria-hidden="true">
        <div class="home-rails-side__sticky">
          <?php kbtRenderAdSlot('home_guidelines_right_rail', ['class' => 'kbt-ad-slot--home-guideline-rail kbt-ad-slot--home-guideline-right', 'format' => 'auto', 'aria_label' => 'Sponsored FAQ placement', 'min_width' => 1281]); ?>
        </div>
      </aside>

      <?php kbtInlineRenderGuideFaq($__kbtContext, $__kbtInlineParts, $__kbtSchemaKey); ?>
      <?php include __DIR__ . '/components/tool-blog-cta.php'; ?>
      <?php kbtRenderMicrosoftStoreSitewideBanner($siteChromeLocale ?? 'en'); ?>
      <?php $GLOBALS['kbtSuppressMicrosoftStoreBanner'] = true; ?>
    </div>
  </main>
  <?php include __DIR__ . '/../footer.php'; ?>
  <?php foreach ($__kbtInlineParts['scripts'] as $__script) { echo $__script; } ?>
</body>
</html>
