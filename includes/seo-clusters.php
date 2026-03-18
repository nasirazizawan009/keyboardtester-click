<?php
/**
 * Search-intent clusters for existing tool pages.
 * These pages target distinct problems users search for while reusing the same live tools.
 */

function getSeoIntentClusters() {
    static $clusters = null;

    if ($clusters !== null) {
        return $clusters;
    }

    $clusters = [
        'audio-output' => [
            'title' => 'Popular Speaker Checks',
            'intro' => 'Use the same browser-based audio tester for left-right speaker checks, stereo output, and quick headphone verification.',
            'pages' => [
                [
                    'path' => 'headphone_speaker_tester_index.php',
                    'name' => 'Headphone & Speaker Tester',
                    'description' => 'Run channel checks, stereo playback, balance tests, and basic audio-output verification in the browser.'
                ],
                [
                    'path' => 'left-right-speaker-test.php',
                    'name' => 'Left Right Speaker Test',
                    'description' => 'Play isolated left and right channel audio to confirm stereo mapping on speakers and headphones.'
                ],
                [
                    'path' => 'stereo-test.php',
                    'name' => 'Stereo Test',
                    'description' => 'Check stereo playback, channel balance, and general speaker or headphone output.'
                ]
            ]
        ],
        'mouse' => [
            'title' => 'Popular Mouse Checks',
            'intro' => 'These browser-based mouse diagnostics cover general button checks, scroll-wheel troubleshooting, and suspicious double-click behavior.',
            'pages' => [
                [
                    'path' => 'mouse-test.php',
                    'name' => 'Mouse Tester',
                    'description' => 'Check left, right, and middle clicks plus scroll-wheel input in one live browser panel.'
                ],
                [
                    'path' => 'scroll-wheel-test.php',
                    'name' => 'Scroll Wheel Test',
                    'description' => 'Verify up/down wheel input, inconsistent scrolling, and middle-wheel behavior.'
                ],
                [
                    'path' => 'double-click-test.php',
                    'name' => 'Double Click Test',
                    'description' => 'Check whether your mouse creates suspicious rapid double clicks or switch-bounce behavior.'
                ]
            ]
        ],
        'keyboard' => [
            'title' => 'Popular Keyboard Checks',
            'intro' => 'Use the same live keyboard tester for stuck keys, ghosting, and rollover checks.',
            'pages' => [
                [
                    'path' => 'index.php',
                    'name' => 'Keyboard Tester',
                    'description' => 'Test every key, inspect layouts, and verify whether your keyboard responds at all.'
                ],
                [
                    'path' => 'keyboard-ghosting-test.php',
                    'name' => 'Keyboard Ghosting Test',
                    'description' => 'Press multiple keys together to find blocked combos, phantom inputs, and anti-ghosting limits.'
                ],
                [
                    'path' => 'stuck-key-test.php',
                    'name' => 'Stuck Key Test',
                    'description' => 'Check whether a repeating, jammed, or unresponsive keyboard key is actually registering correctly.'
                ],
                [
                    'path' => 'n-key-rollover-test.php',
                    'name' => 'N-Key Rollover Test',
                    'description' => 'Check how many simultaneous key presses your keyboard can register correctly.'
                ]
            ]
        ],
        'mic' => [
            'title' => 'Popular Mic Checks',
            'intro' => 'Use the same live microphone meter for quick input verification and browser-level mic troubleshooting.',
            'pages' => [
                [
                    'path' => 'mic-tester.php',
                    'name' => 'Microphone Tester',
                    'description' => 'Check whether your browser can access the mic and whether live levels react to your voice.'
                ],
                [
                    'path' => 'test-my-mic.php',
                    'name' => 'Test My Mic',
                    'description' => 'Run a fast browser-based mic check before meetings, interviews, classes, and support calls.'
                ],
                [
                    'path' => 'microphone-volume-test.php',
                    'name' => 'Microphone Volume Test',
                    'description' => 'Check current mic level and peak input volume with a live browser meter.'
                ]
            ]
        ],
        'screen' => [
            'title' => 'Popular Screen Checks',
            'intro' => 'The same full-screen tester can be used for black-screen, white-screen, dead-pixel, stuck-pixel, and general monitor inspection.',
            'pages' => [
                [
                    'path' => 'screentestindex.php',
                    'name' => 'Screen Tester',
                    'description' => 'Run the complete browser-based monitor test with full-screen colors and quick inspection tips.'
                ],
                [
                    'path' => 'black-screen-test.php',
                    'name' => 'Black Screen Test',
                    'description' => 'Open a clean black screen to inspect backlight bleed, glow, and bright defects.'
                ],
                [
                    'path' => 'white-screen-test.php',
                    'name' => 'White Screen Test',
                    'description' => 'Use a full white screen to spot stuck pixels, dust, tint, and uniformity issues.'
                ],
                [
                    'path' => 'dead-pixel-test.php',
                    'name' => 'Dead Pixel Test',
                    'description' => 'Use black, white, and color screens to spot pixels that stay permanently dark.'
                ],
                [
                    'path' => 'stuck-pixel-test.php',
                    'name' => 'Stuck Pixel Test',
                    'description' => 'Check for red, green, or blue pixels that stay lit on every screen.'
                ]
            ]
        ],
        'webcam' => [
            'title' => 'Popular Webcam Checks',
            'intro' => 'Target camera setup problems directly, from basic preview checks to resolution validation.',
            'pages' => [
                [
                    'path' => 'webcamtesterindex.php',
                    'name' => 'Webcam Tester',
                    'description' => 'Preview your camera feed, switch devices, and take snapshots in the browser.'
                ],
                [
                    'path' => 'camera-resolution-test.php',
                    'name' => 'Camera Resolution Test',
                    'description' => 'Verify the actual video size your webcam delivers at 480p, 720p, 1080p, or higher.'
                ],
                [
                    'path' => 'webcam-not-working-test.php',
                    'name' => 'Webcam Not Working Test',
                    'description' => 'Check browser permission, device detection, and live preview when your camera seems broken.'
                ],
                [
                    'path' => 'take-picture-with-webcam.php',
                    'name' => 'Take Picture With Webcam',
                    'description' => 'Preview the camera, capture snapshots, and download webcam images directly in the browser.'
                ]
            ]
        ],
        'qr-reader' => [
            'title' => 'Popular QR Reader Checks',
            'intro' => 'This QR reader can target image-based scanning problems that searchers describe in different ways.',
            'pages' => [
                [
                    'path' => 'qr-code-reader.php',
                    'name' => 'QR Code Reader',
                    'description' => 'Decode QR codes from an uploaded image directly in your browser.'
                ],
                [
                    'path' => 'scan-qr-from-image.php',
                    'name' => 'Scan QR From Image',
                    'description' => 'Upload a screenshot, photo, or downloaded QR image and decode it locally.'
                ]
            ]
        ],
        'ocr' => [
            'title' => 'Popular OCR Checks',
            'intro' => 'Use the same OCR engine for general image-to-text work or screenshot-specific extraction.',
            'pages' => [
                [
                    'path' => 'ocr-tool.php',
                    'name' => 'Image to Text OCR',
                    'description' => 'Extract text from photos, scans, and graphics in your browser.'
                ],
                [
                    'path' => 'photo-to-text.php',
                    'name' => 'Photo to Text',
                    'description' => 'Extract text from phone photos, receipts, labels, and printed documents with browser-based OCR.'
                ],
                [
                    'path' => 'screenshot-to-text.php',
                    'name' => 'Screenshot to Text',
                    'description' => 'Pull text out of screenshots, software UI captures, and saved chats without installing anything.'
                ]
            ]
        ]
    ];

    return $clusters;
}

function getSeoIntentCluster($toolKey) {
    $clusters = getSeoIntentClusters();
    return $clusters[$toolKey] ?? null;
}

function getSeoIntentPage($path) {
    $target = basename($path);
    foreach (getSeoIntentClusters() as $clusterKey => $cluster) {
        foreach ($cluster['pages'] as $page) {
            if (basename($page['path']) === $target) {
                $page['clusterKey'] = $clusterKey;
                $page['clusterTitle'] = $cluster['title'];
                return $page;
            }
        }
    }
    return null;
}
