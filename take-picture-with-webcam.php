<?php
$intentPage = [
    'meta' => [
        'title' => 'Take Picture With Webcam Online | Free Camera Snapshots',
        'description' => 'Take pictures with your webcam online, preview the live feed, capture snapshots, and download webcam images in the browser.',
        'keywords' => 'take picture with webcam online, webcam snapshot, webcam photo online, camera snapshot test',
        'ogImage' => 'images/webcam-test/hero.png',
        'ogImageAlt' => 'Take picture with webcam page for browser camera snapshots'
    ],
    'schemaKey' => 'take_picture_with_webcam',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Take Picture With Webcam', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Webcam snapshot workflow',
        'title' => 'Take Picture With Webcam Online',
        'lede' => 'Preview your camera in the browser, take webcam snapshots, and download them without installing extra software or opening a separate app.',
        'primaryHref' => '#webcam-picture-tool',
        'primaryLabel' => 'Start webcam snapshot test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Live preview', 'Snapshots', 'Download all'],
        'metrics' => [
            ['value' => 'Live', 'label' => 'Camera preview'],
            ['value' => 'Multi', 'label' => 'Snapshots'],
            ['value' => '0', 'label' => 'Uploads']
        ],
        'image' => 'images/webcam-test/hero.png',
        'imageAlt' => 'Take picture with webcam page for browser snapshot capture',
        'miniCards' => [
            ['title' => 'Quick camera proof', 'text' => 'Useful when you want to confirm your webcam can actually capture a usable picture.'],
            ['title' => 'Before calls and recordings', 'text' => 'Take a quick snapshot to verify framing, focus, and lighting before going live.']
        ]
    ],
    'toolStageId' => 'webcam-picture-tool',
    'toolShellId' => 'webcam-picture-shell',
    'toolSection' => [
        'kicker' => 'Live webcam snapshot check',
        'title' => 'Take Picture With Webcam Tool',
        'lede' => 'Use the live webcam panel below to preview your camera, capture snapshots, and download them.'
    ],
    'toolInclude' => 'webcamtestertool.php',
    'trustItems' => [
        ['title' => 'Live preview', 'desc' => 'See the camera feed before taking a picture'],
        ['title' => 'Snapshot capture', 'desc' => 'Take one or more webcam images in the same session'],
        ['title' => 'Download ready', 'desc' => 'Download all captured images directly from the browser'],
        ['title' => 'Private workflow', 'desc' => 'Snapshots stay in your browser until you save them']
    ],
    'featureSection' => [
        'kicker' => 'Built for quick camera checks',
        'title' => 'What This Webcam Snapshot Page Helps You Verify',
        'lede' => 'A live preview is helpful, but a captured image tells you more about framing, sharpness, and whether the snapshot workflow actually works.',
        'cards' => [
            ['title' => 'Snapshot capture works', 'text' => 'Confirm the browser can take and retain a still image from the webcam feed.'],
            ['title' => 'Framing and lighting', 'text' => 'Use a quick picture to check whether your face, desk, or product is framed correctly.'],
            ['title' => 'Multiple camera comparison', 'text' => 'Switch cameras, take snapshots, and compare results in the same browser session.'],
            ['title' => 'Before meetings or content', 'text' => 'Take a test picture before a call, class, stream, or recording to avoid surprises.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Take a Picture With Your Webcam',
        'lede' => 'Allow camera access, preview the feed, take a snapshot, then download the captured image if it looks right.',
        'steps' => [
            ['image' => 'images/webcam-test/step-1.png', 'alt' => 'Take picture with webcam step 1 allow camera access', 'title' => 'Start the webcam', 'text' => 'Allow camera access so the live preview can open in the browser.'],
            ['image' => 'images/webcam-test/step-2.png', 'alt' => 'Take picture with webcam step 2 preview the camera feed and capture a snapshot', 'title' => 'Preview and capture', 'text' => 'Check framing and lighting, then click the snapshot button to take a webcam picture.'],
            ['image' => 'images/webcam-test/step-3.png', 'alt' => 'Take picture with webcam step 3 download saved webcam images', 'title' => 'Review and download', 'text' => 'Keep the best snapshots and download them after you finish testing.']
        ]
    ],
    'clusterTool' => 'webcam',
    'currentTool' => 'webcam',
    'seoContentInclude' => 'help/seo-content/take-picture-with-webcam.php',
    'showToolsList' => true,
    'helpInclude' => 'help/webcam-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';
