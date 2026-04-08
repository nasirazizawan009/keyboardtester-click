<?php
/**
 * Modular Utilities and SEO Helpers
 * Helper functions for creating modular, SEO-optimized pages
 */

/**
 * Output SEO Meta Tags
 * Usage: <?php echoSeoMeta('mouse_test'); ?>
 */
function echoSeoMeta($toolKey) {
    return;
}

/**
 * Output complete SEO page template
 * Usage: <?php outputSeoPageStart('mouse_test', 'Mouse Tester'); ?>
 */
function outputSeoPageStart($toolKey, $toolName) {
    include_once 'seo-config.php';
    $meta = getPageMeta($toolKey);
    
    if (!$meta) {
        echo "<!-- Tool configuration not found for: $toolKey -->";
        return;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
      <link rel="icon" type="image/x-icon" href="navigation.png">
      <style>
        /* Base Styles */
        :root {
          --bg-color: #f0f0f0;
          --text-color: #333333;
          --primary-color: #1abc9c;
          --secondary-color: #34495e;
          --shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        [data-theme="dark"] {
          --bg-color: #2c3e50;
          --text-color: #ecf0f1;
          --shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }

        body {
          font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
          background-color: var(--bg-color);
          color: var(--text-color);
          transition: background-color 0.3s, color 0.3s;
          min-height: 100vh;
          display: flex;
          flex-direction: column;
        }

        main {
          flex: 1;
        }

        /* Tool Section */
        .tool-section {
          margin: 40px auto;
          max-width: 900px;
          padding: 40px;
          background: var(--keyboard-bg, white);
          border-radius: 15px;
          box-shadow: var(--shadow);
        }

        .tool-section h1 {
          font-size: 2.5rem;
          color: var(--primary-color);
          margin-bottom: 15px;
          font-weight: 800;
        }

        .tool-section > p {
          font-size: 1.1rem;
          line-height: 1.6;
          color: var(--text-color);
          margin-bottom: 30px;
        }

        /* Guidelines Section */
        .guidelines {
          margin: 20px auto;
          max-width: 900px;
          padding: 25px;
          background: linear-gradient(135deg, #1e1e2f, #2a2a3d);
          border-radius: 15px;
          box-shadow: var(--shadow);
          color: #ffffff;
        }

        .guidelines h2 {
          color: var(--primary-color);
          font-size: 2rem;
          margin-top: 0;
          margin-bottom: 15px;
        }

        .guidelines h3 {
          color: var(--primary-color);
          font-size: 1.5rem;
          margin-top: 25px;
          margin-bottom: 12px;
        }

        .guidelines p {
          font-size: 1rem;
          line-height: 1.6;
          margin-bottom: 15px;
        }

        .guidelines ul {
          list-style: none;
          padding: 0;
        }

        .guidelines li {
          margin-bottom: 10px;
          padding-left: 20px;
          position: relative;
        }

        .guidelines li:before {
          content: "✦";
          position: absolute;
          left: 0;
          color: var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 768px) {
          .tool-section {
            margin: 20px 10px;
            padding: 20px;
          }

          .tool-section h1 {
            font-size: 1.8rem;
          }

          .guidelines {
            margin: 20px 10px;
            padding: 20px;
          }

          .guidelines h2 {
            font-size: 1.5rem;
          }

          .guidelines h3 {
            font-size: 1.2rem;
          }
        }
      </style>
    </head>
    <body>
      <?php include 'header.php'; ?>
      <main>
    <?php
}

/**
 * Output complete SEO page end
 * Usage: <?php outputSeoPageEnd(); ?>
 */
function outputSeoPageEnd() {
    ?>
      </main>
      <?php include 'tools.php'; ?>
      <?php include 'footer.php'; ?>
    </body>
    </html>
    <?php
}

/**
 * Render image with SEO-optimized alt text
 * Usage: <?php seoImage('path/to/image.jpg', 'Descriptive alt text', ['class' => 'css-class']); ?>
 */
function seoImage($src, $alt, $attributes = []) {
    $attr_string = '';
    foreach ($attributes as $key => $value) {
        $attr_string .= " {$key}=\"" . htmlspecialchars($value) . "\"";
    }
    echo "<img src=\"" . htmlspecialchars($src) . "\" alt=\"" . htmlspecialchars($alt) . "\"$attr_string>";
}

/**
 * Create SEO-friendly heading with hierarchy
 * Usage: <?php seoHeading(1, 'Main Tool Name', 'tool-id'); ?>
 */
function seoHeading($level, $text, $id = null) {
    $tag = "h" . intval($level);
    $id_attr = $id ? " id=\"" . htmlspecialchars($id) . "\"" : "";
    echo "<{$tag}{$id_attr}>" . htmlspecialchars($text) . "</{$tag}>";
}

/**
 * Create structured data for SEO (Schema.org)
 * Usage: <?php echoStructuredData('tool'); ?>
 */
function echoStructuredData($toolKey) {
    include_once 'seo-config.php';
    include_once 'config.php';
    $tool = getTool($toolKey);
    $meta = getPageMeta($toolKey);
    
    if (!$tool || !$meta) return;
    
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "SoftwareApplication",
        "name" => $tool['name'],
        "description" => $meta['description'],
        "applicationCategory" => "UtilitiesApplication",
        "operatingSystem" => "Any",
        "url" => $meta['og_url'],
        "image" => $meta['og_image'],
        "offers" => [
            "@type" => "Offer",
            "price" => "0",
            "priceCurrency" => "USD"
        ],
        "aggregateRating" => [
            "@type" => "AggregateRating",
            "ratingValue" => "4.8",
            "ratingCount" => "1000+"
        ]
    ];
    
    echo "<script type=\"application/ld+json\">\n";
    echo json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    echo "\n</script>\n";
}

/**
 * Check if image has alt text
 * Development helper for auditing
 */
function auditImageAltText($file) {
    $content = file_get_contents($file);
    $pattern = '/<img[^>]*>/i';
    preg_match_all($pattern, $content, $matches);
    
    $missing_alt = [];
    foreach ($matches[0] as $img_tag) {
        if (!preg_match('/alt\s*=\s*["\']([^"\']+)["\']/i', $img_tag)) {
            $missing_alt[] = $img_tag;
        }
    }
    
    return $missing_alt;
}

/**
 * Get readability score (simple Flesch-Kincaid Grade Level)
 */
function getReadabilityScore($text) {
    $words = str_word_count($text);
    $sentences = preg_match_all('~[.!?]~', $text, $matches) ? count($matches[0]) : 1;
    $syllables = preg_match_all('~[aeiouy]~i', $text) ? 
        preg_match_all('~[aeiouy]~i', $text) : 1;
    
    if ($words == 0 || $sentences == 0) return 0;
    
    $grade = (0.39 * ($words / $sentences)) + (11.8 * ($syllables / $words)) - 15.59;
    return max(0, round($grade, 1));
}

?>


