<?php
$intentPage = [
    'meta' => [
        'title' => 'Camera Resolution Test Online | Check Webcam Size and Quality',
        'description' => 'Run a camera resolution test online to check your webcam at 480p, 720p, 1080p, or higher. Verify the actual video size your browser receives.',
        'keywords' => 'camera resolution test, webcam resolution test, test webcam quality online, test camera 1080p',
        'ogImage' => 'images/webcam-test/hero.svg',
        'ogImageAlt' => 'Camera resolution test tool with live webcam preview'
    ],
    'schemaKey' => 'camera_resolution_test',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Camera Resolution Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Webcam diagnostics',
        'title' => 'Camera Resolution Test Online',
        'lede' => 'Check whether your webcam really delivers the resolution you expect. Switch resolution targets, preview the live feed, and compare what the browser reports.',
        'primaryHref' => '#camera-resolution-tool',
        'primaryLabel' => 'Start camera test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Resolution readout', 'Snapshot ready', 'Browser based'],
        'metrics' => [
            ['value' => '4K', 'label' => 'Preset option'],
            ['value' => 'Live', 'label' => 'Video preview'],
            ['value' => '0', 'label' => 'Downloads needed']
        ],
        'image' => 'images/webcam-test/hero.svg',
        'imageAlt' => 'Online webcam resolution checker with live preview',
        'miniCards' => [
            ['title' => 'Call-ready checks', 'text' => 'Confirm whether your webcam is really outputting HD before meetings or streams.'],
            ['title' => 'Multiple camera support', 'text' => 'Compare built-in and external cameras from the same page.']
        ]
    ],
    'toolStageId' => 'camera-resolution-tool',
    'toolShellId' => 'camera-resolution-shell',
    'toolSection' => [
        'kicker' => 'Live camera check',
        'title' => 'Webcam Resolution Tester',
        'lede' => 'Use the webcam tool below to preview your feed, switch device targets, and confirm the reported video resolution.'
    ],
    'toolInclude' => 'webcamtestertool.php',
    'trustItems' => [
        ['title' => 'Resolution presets', 'desc' => 'Try common sizes like 480p, 720p, 1080p, and 4K'],
        ['title' => 'Actual browser feedback', 'desc' => 'See the dimensions your browser receives from the device'],
        ['title' => 'Snapshot support', 'desc' => 'Take sample captures to compare sharpness'],
        ['title' => 'Local processing', 'desc' => 'Camera data stays in your browser unless you download a snapshot']
    ],
    'featureSection' => [
        'kicker' => 'Resolution-focused testing',
        'title' => 'What This Camera Resolution Test Helps You Verify',
        'lede' => 'Resolution claims can differ from real-world browser output, especially on laptops, browsers, and USB webcams.',
        'cards' => [
            ['title' => 'HD confirmation', 'text' => 'Check whether a webcam really delivers 720p or 1080p in your browser.'],
            ['title' => 'Multiple camera comparison', 'text' => 'Switch between built-in and USB cameras to compare detail and framing.'],
            ['title' => 'Call and streaming prep', 'text' => 'Verify quality before joining Zoom, Meet, Teams, OBS, or browser-based recordings.'],
            ['title' => 'Instant snapshots', 'text' => 'Save still frames to compare sharpness and exposure between modes.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Check Webcam Resolution',
        'lede' => 'Allow camera access, choose your preferred resolution target, and compare the live preview with the reported dimensions.',
        'steps' => [
            ['image' => 'images/webcam-test/step-1.svg', 'alt' => 'Camera resolution test step 1 allow webcam access', 'title' => 'Allow webcam access', 'text' => 'Start the live preview so the browser can query available devices and video settings.'],
            ['image' => 'images/webcam-test/step-2.svg', 'alt' => 'Camera resolution test step 2 choose preferred resolution', 'title' => 'Choose a resolution target', 'text' => 'Switch between the built-in presets to see which sizes your webcam can actually provide.'],
            ['image' => 'images/webcam-test/step-3.svg', 'alt' => 'Camera resolution test step 3 compare reported resolution values', 'title' => 'Review the reported output', 'text' => 'Check the live resolution readout and capture snapshots if you want a side-by-side quality comparison.']
        ]
    ],
    'clusterTool' => 'webcam',
    'currentTool' => 'webcam',
    'seoContentInclude' => 'help/seo-content/camera-resolution-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/webcam-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';

