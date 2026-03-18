<?php
$intentPage = [
    'meta' => [
        'title' => 'Stuck Pixel Test Online | Check Red, Green, and Blue Pixels',
        'description' => 'Use a free stuck pixel test online to find red, green, blue, or white pixels that stay lit on every screen color.',
        'keywords' => 'stuck pixel test, stuck pixel checker, red pixel test, blue pixel stuck monitor',
        'ogImage' => 'images/screen-test/hero.svg',
        'ogImageAlt' => 'Stuck pixel test tool for monitor and laptop screens'
    ],
    'schemaKey' => 'stuck_pixel_test',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Stuck Pixel Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Monitor diagnostics',
        'title' => 'Stuck Pixel Test Online',
        'lede' => 'Check for pixels that stay red, green, blue, or white even when the whole screen changes color. This browser test works on monitors, laptops, and phones.',
        'primaryHref' => '#stuck-pixel-tool',
        'primaryLabel' => 'Start stuck pixel test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['RGB screens', 'No installs', 'Fast check'],
        'metrics' => [
            ['value' => '8', 'label' => 'Color screens'],
            ['value' => '1', 'label' => 'Browser tab'],
            ['value' => 'Local', 'label' => 'Processing']
        ],
        'image' => 'images/screen-test/hero.svg',
        'imageAlt' => 'Online stuck pixel test using solid color screens',
        'miniCards' => [
            ['title' => 'Sub-pixel checks', 'text' => 'Red, green, and blue screens make single-color defects easier to spot.'],
            ['title' => 'Useful after shipping', 'text' => 'Inspect new or recently moved screens for color-specific damage.']
        ]
    ],
    'toolStageId' => 'stuck-pixel-tool',
    'toolShellId' => 'stuck-pixel-shell',
    'toolSection' => [
        'kicker' => 'Live display check',
        'title' => 'Stuck Pixel Test Tool',
        'lede' => 'Run the same screen checker below, but focus on pixels that stay lit in one color while the background changes.'
    ],
    'toolInclude' => 'screentesttool.php',
    'trustItems' => [
        ['title' => 'RGB focused', 'desc' => 'Designed for red, green, and blue sub-pixel checks'],
        ['title' => 'Fullscreen ready', 'desc' => 'Inspect the panel without browser chrome'],
        ['title' => 'Works on many displays', 'desc' => 'Monitors, laptops, tablets, and phones'],
        ['title' => 'No account needed', 'desc' => 'Open the page and test immediately']
    ],
    'featureSection' => [
        'kicker' => 'Sub-pixel inspection',
        'title' => 'What This Stuck Pixel Test Helps You Find',
        'lede' => 'Stuck pixels often appear as tiny red, green, blue, or white dots that do not follow the rest of the panel.',
        'cards' => [
            ['title' => 'Single-color defects', 'text' => 'Solid RGB screens expose pixels that remain locked to one color channel.'],
            ['title' => 'Always-on white pixels', 'text' => 'White backgrounds and black backgrounds help confirm hot or bright pixels.'],
            ['title' => 'Quick retesting', 'text' => 'If you try a pixel-fix method, use this page again to see whether the defect changes.'],
            ['title' => 'No software dependency', 'text' => 'The test runs in a regular browser tab with simple controls.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Check for Stuck Pixels',
        'lede' => 'Use high-contrast color screens and look for dots that stay bright or remain one color.',
        'steps' => [
            ['image' => 'images/screen-test/step-1.svg', 'alt' => 'Stuck pixel test step 1 start the monitor checker', 'title' => 'Start the checker', 'text' => 'Open the live screen test and switch to a clean full-screen view.'],
            ['image' => 'images/screen-test/step-2.svg', 'alt' => 'Stuck pixel test step 2 review red green and blue screens', 'title' => 'Check RGB colors', 'text' => 'Move between red, green, blue, black, and white screens to isolate stubborn color defects.'],
            ['image' => 'images/screen-test/step-3.svg', 'alt' => 'Stuck pixel test step 3 confirm persistent colored dots', 'title' => 'Confirm the defect', 'text' => 'A stuck pixel usually stays visible on multiple backgrounds instead of disappearing with the rest of the panel.']
        ]
    ],
    'clusterTool' => 'screen',
    'currentTool' => 'screen',
    'seoContentInclude' => 'help/seo-content/stuck-pixel-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/screen-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';

