<?php
/**
 * Shared English tool-page renderer for the local Microsoft-style redesign.
 *
 * Root tool pages keep their existing meta variables above the include that
 * calls this renderer. The legacy body remains below the early return so this
 * file can read the old source and preserve tool includes, SEO keywords, and
 * schema keys without copying full page markup into every route.
 */

if (!function_exists('url')) {
    require_once __DIR__ . '/../config.php';
}

require_once __DIR__ . '/components/adsense-slot.php';
require_once __DIR__ . '/components/microsoft-store-badge.php';
require_once __DIR__ . '/components/responsive-image.php';
require_once __DIR__ . '/components/tool-page-context.php';

if (!function_exists('kbtTemplateCallerFile')) {
    function kbtTemplateCallerFile()
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

if (!function_exists('kbtTemplateLegacySource')) {
    function kbtTemplateLegacySource($file)
    {
        return ($file && is_file($file)) ? (string) file_get_contents($file) : '';
    }
}

if (!function_exists('kbtTemplateFirstMatch')) {
    function kbtTemplateFirstMatch($pattern, $source)
    {
        return preg_match($pattern, $source, $match) ? trim($match[1]) : '';
    }
}

if (!function_exists('kbtTemplateNormalizeInclude')) {
    function kbtTemplateNormalizeInclude($path)
    {
        $path = str_replace('\\', '/', trim((string) $path));
        $path = preg_replace('#^\./#', '', $path);
        return ltrim($path, '/');
    }
}

if (!function_exists('kbtTemplateParseLegacy')) {
    function kbtTemplateParseLegacy($source)
    {
        $data = [];

        $data['schemaKey'] = kbtTemplateFirstMatch("#generateToolPageSchema\\(\\s*['\"]([^'\"]+)['\"]#i", $source);
        $data['toolInclude'] = kbtTemplateFirstMatch("#include\\s+(?:__DIR__\\s*\\.\\s*)?['\"]/?([^'\"]*(?:tools/[^'\"]+\\.php|screentesttool\\.php|webcamtestertool\\.php))['\"]#i", $source);
        $data['seoContentInclude'] = kbtTemplateFirstMatch("#include\\s+(?:__DIR__\\s*\\.\\s*)?['\"]/?([^'\"]*help/seo-content/[^'\"]+\\.php)['\"]#i", $source);
        $data['helpInclude'] = kbtTemplateFirstMatch("#include\\s+(?:__DIR__\\s*\\.\\s*)?['\"]/?(help/(?!brief-|seo-content/)[^'\"]+\\.php)['\"]#i", $source);
        $data['blogSlug'] = kbtTemplateFirstMatch('#\$toolBlogSlug\s*=\s*[\'"]([^\'"]+)[\'"]#i', $source);
        $data['currentTool'] = kbtTemplateFirstMatch('#\$currentTool\s*=\s*[\'"]([^\'"]+)[\'"]#i', $source);
        $data['clusterTool'] = kbtTemplateFirstMatch('#\$intentClusterTool\s*=\s*[\'"]([^\'"]+)[\'"]#i', $source);
        $data['stageId'] = kbtTemplateFirstMatch("#<section\\s+class=['\"]tool-stage['\"]\\s+id=['\"]([^'\"]+)['\"]#i", $source);
        if ($data['stageId'] === '') {
            $data['stageId'] = kbtTemplateFirstMatch("#<section\\s+[^>]*id=['\"]([^'\"]+)['\"][^>]*class=['\"][^'\"]*tool-stage#i", $source);
        }
        $data['shellId'] = kbtTemplateFirstMatch("#<section\\s+id=['\"]([^'\"]+)['\"]\\s+class=['\"]tool-shell['\"]#i", $source);
        $data['toolTitle'] = kbtTemplateFirstMatch("#<section\\s+class=['\"]tool-stage['\"][\\s\\S]*?<h2[^>]*>([\\s\\S]*?)</h2>#i", $source);
        $data['toolLede'] = kbtTemplateFirstMatch("#<section\\s+class=['\"]tool-stage['\"][\\s\\S]*?<p\\s+class=['\"]section-lede['\"]>([\\s\\S]*?)</p>#i", $source);

        foreach (['toolInclude', 'seoContentInclude', 'helpInclude'] as $key) {
            $data[$key] = kbtTemplateNormalizeInclude($data[$key] ?? '');
        }
        foreach (['toolTitle', 'toolLede'] as $key) {
            $data[$key] = trim(strip_tags(html_entity_decode($data[$key] ?? '', ENT_QUOTES, 'UTF-8')));
        }

        return $data;
    }
}

if (!function_exists('kbtTemplatePlainText')) {
    function kbtTemplatePlainText($html)
    {
        $html = preg_replace('#<\\?php[\\s\\S]*?\\?>#', ' ', (string) $html);
        $text = html_entity_decode(strip_tags($html), ENT_QUOTES, 'UTF-8');
        $text = preg_replace('/\s+/', ' ', $text);
        return trim($text);
    }
}

if (!function_exists('kbtTemplateShortText')) {
    function kbtTemplateShortText($text, $max = 260)
    {
        $text = trim(preg_replace('/\s+/', ' ', (string) $text));
        if ($text === '' || strlen($text) <= $max) {
            return $text;
        }

        $slice = substr($text, 0, $max);
        $sentenceEnd = max(strrpos($slice, '.'), strrpos($slice, '?'), strrpos($slice, '!'));
        if ($sentenceEnd !== false && $sentenceEnd > 120) {
            return trim(substr($slice, 0, $sentenceEnd + 1));
        }

        $space = strrpos($slice, ' ');
        if ($space !== false && $space > 120) {
            $slice = substr($slice, 0, $space);
        }

        return rtrim($slice, " \t\n\r\0\x0B,;:-") . '...';
    }
}

if (!function_exists('kbtTemplateSeoBlocks')) {
    function kbtTemplateSeoBlocks($includePath)
    {
        $file = __DIR__ . '/../' . ltrim((string) $includePath, '/');
        if (!$includePath || !is_file($file)) {
            return ['intro' => '', 'steps' => [], 'faqs' => [], 'extra' => ''];
        }

        $html = (string) file_get_contents($file);
        // Render the full hand-written article when the file is either the new-style guide
        // (home-guideline-brief) OR a legacy full-article block (class="seo-content").
        // Previously only the marker matched, so 85 legacy files were scraped down to a thin
        // intro + generic template, discarding ~38k words of unique, indexable content.
        if (strpos($html, 'home-guideline-brief') !== false
            || strpos($html, 'class="seo-content"') !== false) {
            return ['newStyle' => true, 'include' => $includePath];
        }

        $intro = '';
        if (preg_match('#<p[^>]*>([\\s\\S]*?)</p>#i', $html, $match)) {
            $intro = kbtTemplatePlainText($match[1]);
        }

        $headings = [];
        if (preg_match_all('#<h2[^>]*>([\\s\\S]*?)</h2>([\\s\\S]*?)(?=<h2|</section>|\\z)#i', $html, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $title = kbtTemplatePlainText($match[1]);
                if ($title === '' || stripos($title, 'FAQ') !== false || stripos($title, 'Frequently') !== false) {
                    continue;
                }
                $body = '';
                if (preg_match('#<p[^>]*>([\\s\\S]*?)</p>#i', $match[2], $pMatch)) {
                    $body = kbtTemplatePlainText($pMatch[1]);
                } elseif (preg_match('#<li[^>]*>([\\s\\S]*?)</li>#i', $match[2], $liMatch)) {
                    $body = kbtTemplatePlainText($liMatch[1]);
                }
                if ($body !== '') {
                    $headings[] = ['title' => $title, 'text' => $body];
                }
            }
        }

        if (!$headings && preg_match_all('#<li[^>]*>([\\s\\S]*?)</li>#i', $html, $liMatches)) {
            foreach (array_slice($liMatches[1], 0, 4) as $index => $item) {
                $headings[] = ['title' => 'Check ' . ($index + 1), 'text' => kbtTemplatePlainText($item)];
            }
        }

        $faqs = [];
        if (preg_match_all('#<details[^>]*>[\\s\\S]*?<summary[^>]*>([\\s\\S]*?)</summary>[\\s\\S]*?<p[^>]*>([\\s\\S]*?)</p>[\\s\\S]*?</details>#i', $html, $faqMatches, PREG_SET_ORDER)) {
            foreach ($faqMatches as $match) {
                $question = kbtTemplatePlainText($match[1]);
                $answer = kbtTemplatePlainText($match[2]);
                if ($question !== '' && $answer !== '') {
                    $faqs[] = ['question' => $question, 'answer' => $answer];
                }
            }
        }

        $paragraphs = [];
        if (preg_match_all('#<p[^>]*>([\\s\\S]*?)</p>#i', $html, $pMatches)) {
            foreach ($pMatches[1] as $p) {
                $text = kbtTemplatePlainText($p);
                if ($text !== '' && $text !== $intro) {
                    $paragraphs[] = $text;
                }
            }
        }

        return [
            'intro' => $intro,
            'steps' => array_slice($headings, 0, 4),
            'faqs' => array_slice($faqs, 0, 6),
            'extra' => $paragraphs ? $paragraphs[min(1, count($paragraphs) - 1)] : '',
        ];
    }
}

if (!function_exists('kbtSeoContentFaqs')) {
    /**
     * Parse FAQ pairs from a legacy full-article seo-content file so the FAQPage schema
     * can match the FAQ that is now rendered visibly. Returns:
     *   null  -> not a legacy full-render seo-content file (caller should keep getToolFAQs)
     *   array -> the file's FAQ pairs (may be empty, meaning: emit no FAQPage)
     */
    function kbtSeoContentFaqs($includePath)
    {
        $file = __DIR__ . '/../' . ltrim((string) $includePath, '/');
        if (!$includePath || !is_file($file)) {
            return null;
        }
        $html = (string) file_get_contents($file);
        // New-style guide files manage their own FAQ; only handle legacy seo-content blocks.
        if (strpos($html, 'home-guideline-brief') !== false || strpos($html, 'class="seo-content"') === false) {
            return null;
        }
        $faqs = [];
        if (preg_match_all('#<details[^>]*>[\\s\\S]*?<summary[^>]*>([\\s\\S]*?)</summary>[\\s\\S]*?<p[^>]*>([\\s\\S]*?)</p>[\\s\\S]*?</details>#i', $html, $m, PREG_SET_ORDER)) {
            foreach ($m as $one) {
                $q = kbtTemplatePlainText($one[1]);
                $a = kbtTemplatePlainText($one[2]);
                if ($q !== '' && $a !== '') {
                    $faqs[] = ['question' => $q, 'answer' => $a];
                }
            }
        }
        return $faqs;
    }
}

if (!function_exists('kbtTemplateCategoryHref')) {
    function kbtTemplateCategoryHref($category)
    {
        return url('pages/all-tools.php#' . rawurlencode((string) $category));
    }
}

if (!function_exists('kbtTemplateKeywords')) {
    function kbtTemplateKeywords($context, $pageKeywords)
    {
        $keywords = [];
        foreach (explode(',', (string) $pageKeywords) as $keyword) {
            $keyword = trim($keyword);
            if ($keyword !== '') {
                $keywords[] = $keyword;
            }
        }
        $tool = $context['tool'] ?? [];
        foreach ([$tool['name'] ?? '', $tool['category_label'] ?? '', ($tool['category_label'] ?? '') . ' tools'] as $keyword) {
            $keyword = trim((string) $keyword);
            if ($keyword !== '') {
                $keywords[] = $keyword;
            }
        }
        return array_slice(array_values(array_unique($keywords)), 0, 6);
    }
}

if (!function_exists('kbtRenderTemplateGuideFaq')) {
    function kbtRenderTemplateGuideFaq($context, $legacyInclude, $schemaKey)
    {
        global $pageKeywords;

        $blocks = kbtTemplateSeoBlocks($legacyInclude);
        if (!empty($blocks['newStyle'])) {
            include __DIR__ . '/../' . $blocks['include'];
            return;
        }

        $tool = $context['tool'] ?? [];
        $toolName = $tool['name'] ?? 'Online tool';
        $category = $tool['category'] ?? 'keyboard';
        $categoryLabel = $tool['category_label'] ?? ucfirst($category);
        $toolAnchor = '#' . htmlspecialchars(($tool['id'] ?? 'tool') . '-stage', ENT_QUOTES, 'UTF-8');
        $intro = kbtTemplateShortText($blocks['intro'] ?: ($tool['description'] ?? ('Use this ' . strtolower($toolName) . ' directly in your browser.')), 330);
        $steps = $blocks['steps'];
        if (!$steps) {
            $steps = [
                ['title' => 'Open the live test', 'text' => 'Use the browser tool below without installing software or changing your current page.'],
                ['title' => 'Run one clean pass', 'text' => 'Follow the on-screen controls and keep the input steady so the result is repeatable.'],
                ['title' => 'Repeat if the result looks wrong', 'text' => 'Run the same check again before deciding whether the device, browser, or operating system is the cause.'],
                ['title' => 'Compare with related diagnostics', 'text' => 'Use the linked tools to confirm whether the same symptom appears in another hardware check.'],
            ];
        }

        $faqs = [];
        if ($schemaKey && function_exists('getToolFAQs')) {
            $faqs = getToolFAQs($schemaKey);
        }
        if (!$faqs && !empty($blocks['faqs'])) {
            $faqs = $blocks['faqs'];
        }
        if (!$faqs) {
            $faqs = [
                ['question' => 'Is this tool free to use?', 'answer' => 'Yes. The test runs in your browser with no account, download, or installation required.'],
                ['question' => 'Does the test upload my device data?', 'answer' => 'No. The live check is handled locally by the page wherever browser APIs allow it.'],
                ['question' => 'Why should I repeat the test?', 'answer' => 'Browser focus, permissions, wireless devices, and operating-system settings can affect a single run, so repeated tests give a clearer result.'],
            ];
        }
        $faqs = array_slice($faqs, 0, 6);
        $keywords = kbtTemplateKeywords($context, $pageKeywords ?? '');
        ?>
        <section class="home-guideline-brief" id="guidelines" aria-labelledby="template-guidelines-title">
          <div class="container home-guideline-layout home-guideline-layout--balanced">
            <div class="home-guideline-copy">
              <p class="section-kicker"><?php echo htmlspecialchars($toolName, ENT_QUOTES, 'UTF-8'); ?> guide</p>
              <h2 id="template-guidelines-title">How to use the <?php echo htmlspecialchars($toolName, ENT_QUOTES, 'UTF-8'); ?> accurately</h2>
              <p><?php echo htmlspecialchars($intro, ENT_QUOTES, 'UTF-8'); ?></p>
              <div class="home-guideline-steps" aria-label="<?php echo htmlspecialchars($toolName, ENT_QUOTES, 'UTF-8'); ?> workflow">
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
                    <a href="<?php echo $keyword === ($categoryLabel . ' tools') ? htmlspecialchars(kbtTemplateCategoryHref($category), ENT_QUOTES, 'UTF-8') : $toolAnchor; ?>"><?php echo htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); ?></a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
              <?php if (!empty($blocks['extra'])): ?>
                <div class="home-guideline-note"><?php echo htmlspecialchars(kbtTemplateShortText($blocks['extra'], 280), ENT_QUOTES, 'UTF-8'); ?></div>
              <?php endif; ?>
            </div>
            <div class="home-faq-panel" aria-labelledby="template-faq-title">
              <p class="section-kicker"><?php echo htmlspecialchars($toolName, ENT_QUOTES, 'UTF-8'); ?> FAQ</p>
              <h2 id="template-faq-title">Common <?php echo htmlspecialchars(strtolower($toolName), ENT_QUOTES, 'UTF-8'); ?> questions</h2>
              <div class="home-faq-list home-faq-list--expanded">
                <?php foreach ($faqs as $faq): ?>
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

if (!empty($GLOBALS['kbtTemplateFunctionsOnly'])) {
    return;
}

$__kbtCallerFile = kbtTemplateCallerFile();
$__kbtLegacySource = kbtTemplateLegacySource($__kbtCallerFile);
$__kbtLegacy = kbtTemplateParseLegacy($__kbtLegacySource);
$__kbtToolId = $kbtTemplateToolId ?? ($GLOBALS['kbtTemplateToolId'] ?? null);
$__kbtContext = kbtGetEnglishToolPageContext($__kbtToolId);

if (!$__kbtContext) {
    return;
}

$__kbtTool = $__kbtContext['tool'];
$__kbtSchemaKey = $kbtTemplateSchemaKey ?? ($__kbtLegacy['schemaKey'] ?: str_replace('-', '_', $__kbtTool['id']));
$__kbtToolInclude = $kbtTemplateToolInclude ?? $__kbtLegacy['toolInclude'];
if (!$__kbtToolInclude || !is_file(__DIR__ . '/../' . $__kbtToolInclude)) {
    return;
}

$GLOBALS['kbtSuppressFooterAd'] = true;
$GLOBALS['__kbtToolPopularToolsRendered'] = false;
$GLOBALS['__kbtToolBlogPostsRendered'] = false;

$__kbtStageId = $kbtTemplateStageId ?? ($__kbtLegacy['stageId'] ?: (($__kbtTool['id'] ?? 'tool') . '-stage'));
$__kbtShellId = $kbtTemplateShellId ?? ($__kbtLegacy['shellId'] ?: (($__kbtTool['id'] ?? 'tool') . '-tool'));
$__kbtTitle = $kbtTemplateToolTitle ?? ($__kbtLegacy['toolTitle'] ?: ($__kbtTool['name'] ?? 'Online Tool'));
$__kbtLede = $kbtTemplateToolLede ?? ($__kbtLegacy['toolLede'] ?: ($__kbtTool['description'] ?? 'Run the live browser-based check below.'));
$__kbtSeoInclude = $kbtTemplateSeoContentInclude ?? $__kbtLegacy['seoContentInclude'];
$__kbtBlogSlug = $kbtTemplateBlogSlug ?? $__kbtLegacy['blogSlug'];
$__kbtCategory = $__kbtTool['category'] ?? 'keyboard';
$__kbtHeroImage = $pageOgImage ?? '';
$__kbtHeroAlt = $pageOgImageAlt ?? (($__kbtTitle ?: 'KeyboardTester.click tool') . ' hero image');
$__kbtHeroLede = $pageDescription ?? $__kbtLede;
$__kbtCategoryHref = kbtTemplateCategoryHref($__kbtCategory);

// Keep the FAQPage schema in sync with the now fully-rendered legacy article's own FAQ.
$__kbtSeoFaqs = kbtSeoContentFaqs($__kbtSeoInclude);
if ($__kbtSeoFaqs !== null) {
    $GLOBALS['kbtFaqSchemaOverride'] = $__kbtSeoFaqs;
}

?><!DOCTYPE html>
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
  <?php
  include_once __DIR__ . '/schema.php';
  echo generateToolPageSchema($__kbtSchemaKey, [
      ['name' => 'Home', 'url' => '/'],
      ['name' => $__kbtTitle, 'url' => '']
  ]);
  ?>
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
            <h1 class="hero-title"><span class="hero-title-line">Free</span> <span class="hero-title-line"><?php echo htmlspecialchars($__kbtTitle, ENT_QUOTES, 'UTF-8'); ?></span></h1>
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
        <?php
          kbtRenderAdSlot('home_hero_banner', [
            'class' => 'kbt-ad-slot--home-hero-banner',
            'format' => 'horizontal',
            'aria_label' => 'Sponsored hero banner',
          ]);
        ?>
      </div>
    </section>

    <?php include __DIR__ . '/components/home-category-band.php'; ?>

    <section class="tool-stage tool-template-stage" id="<?php echo htmlspecialchars($__kbtStageId, ENT_QUOTES, 'UTF-8'); ?>" data-header-hide-stage aria-label="<?php echo htmlspecialchars($__kbtTitle, ENT_QUOTES, 'UTF-8'); ?> workspace">
      <section id="<?php echo htmlspecialchars($__kbtShellId, ENT_QUOTES, 'UTF-8'); ?>" class="tool-shell">
        <div class="tool-template-inline-head">
          <h2><?php echo htmlspecialchars($__kbtTitle, ENT_QUOTES, 'UTF-8'); ?></h2>
          <p><?php echo htmlspecialchars($__kbtLede, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <?php include __DIR__ . '/../' . $__kbtToolInclude; ?>
      </section>
    </section>

    <section class="home-after-tool-banner" aria-label="Sponsored placement">
      <?php
        kbtRenderAdSlot('home_after_tool_banner', [
          'class' => 'kbt-ad-slot--after-tool-banner',
          'format' => 'auto',
          'aria_label' => 'Sponsored placement',
          'min_width' => 769
        ]);
      ?>
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

      <?php kbtRenderTemplateGuideFaq($__kbtContext, $__kbtSeoInclude, $__kbtSchemaKey); ?>
      <?php if ($__kbtBlogSlug !== '') { $toolBlogSlug = $__kbtBlogSlug; } include __DIR__ . '/components/tool-blog-cta.php'; unset($toolBlogSlug); ?>
      <?php kbtRenderMicrosoftStoreSitewideBanner($siteChromeLocale ?? 'en'); ?>
      <?php $GLOBALS['kbtSuppressMicrosoftStoreBanner'] = true; ?>
    </div>
  </main>
  <?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
