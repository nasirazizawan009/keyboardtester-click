<?php
$intentPage = [
    'meta' => [
        'title' => 'Webcam Not Working? Run This Online Camera Test',
        'description' => 'If your webcam is not working, run this browser-based camera test to check permission, device detection, live preview, and basic webcam status.',
        'keywords' => 'webcam not working test, camera not working online test, webcam troubleshooting, test webcam not working',
        'ogImage' => 'images/webcam-test/hero.svg',
        'ogImageAlt' => 'Webcam not working troubleshooting page with live browser camera test'
    ],
    'schemaKey' => 'webcam_not_working',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Webcam Not Working Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Camera troubleshooting',
        'title' => 'Webcam Not Working? Run This Online Test',
        'lede' => 'If your webcam is blank, blocked, or missing in a call app, use the live browser test below to check camera access, device detection, and preview output.',
        'primaryHref' => '#webcam-not-working-tool',
        'primaryLabel' => 'Start webcam check',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Live preview', 'Permission check', 'No installs'],
        'metrics' => [
            ['value' => 'Live', 'label' => 'Camera preview'],
            ['value' => 'Status', 'label' => 'Browser feedback'],
            ['value' => '0', 'label' => 'Downloads']
        ],
        'image' => 'images/webcam-test/hero.svg',
        'imageAlt' => 'Webcam not working help page with live online camera test',
        'miniCards' => [
            ['title' => 'Black screen diagnosis', 'text' => 'Useful when apps show no picture, the wrong camera, or a blocked feed.'],
            ['title' => 'Fast browser check', 'text' => 'Confirms whether the issue starts before Zoom, Meet, Teams, or streaming software.']
        ]
    ],
    'toolStageId' => 'webcam-not-working-tool',
    'toolShellId' => 'webcam-not-working-shell',
    'toolSection' => [
        'kicker' => 'Live webcam check',
        'title' => 'Webcam Troubleshooting Test',
        'lede' => 'Use the webcam tool below to confirm whether the browser can see your camera, show a preview, and read device information.'
    ],
    'toolInclude' => 'webcamtestertool.php',
    'trustItems' => [
        ['title' => 'Permission-first check', 'desc' => 'Find out quickly whether the browser can access the camera'],
        ['title' => 'Device list', 'desc' => 'See whether the expected webcam appears at all'],
        ['title' => 'Live preview', 'desc' => 'A working preview confirms the basic camera path is healthy'],
        ['title' => 'Useful before app debugging', 'desc' => 'Separate browser camera issues from app-specific issues']
    ],
    'featureSection' => [
        'kicker' => 'Built for troubleshooting',
        'title' => 'What This Webcam Not Working Test Helps You Isolate',
        'lede' => 'A webcam problem can come from browser permission, wrong camera selection, cable issues, or another app already using the device.',
        'cards' => [
            ['title' => 'Permission blocked', 'text' => 'If the browser cannot access the camera, the problem often starts with denied permission.'],
            ['title' => 'Wrong webcam selected', 'text' => 'Systems with more than one camera may open the wrong device by default.'],
            ['title' => 'Blank or black preview', 'text' => 'A black feed can point to app conflicts, cable problems, or a hardware fault.'],
            ['title' => 'Before support calls', 'text' => 'Use the page to confirm whether the browser itself can open the camera before deeper troubleshooting.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Check a Webcam That Is Not Working',
        'lede' => 'Start the live preview, allow permission, and compare the device list and status output with what you expected to see.',
        'steps' => [
            ['image' => 'images/webcam-test/step-1.svg', 'alt' => 'Webcam not working test step 1 allow camera permission', 'title' => 'Allow camera access', 'text' => 'If permission is denied, the browser cannot open the webcam at all.'],
            ['image' => 'images/webcam-test/step-2.svg', 'alt' => 'Webcam not working test step 2 check device list and preview', 'title' => 'Check the preview and device list', 'text' => 'Confirm that the expected webcam appears and that a live image is shown.'],
            ['image' => 'images/webcam-test/step-3.svg', 'alt' => 'Webcam not working test step 3 review camera status and resolution', 'title' => 'Review the status output', 'text' => 'Use the reported camera information to decide whether the issue is permission, selection, or hardware related.']
        ]
    ],
    'clusterTool' => 'webcam',
    'currentTool' => 'webcam',
    'seoContentInclude' => 'help/seo-content/webcam-not-working-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/webcam-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';

