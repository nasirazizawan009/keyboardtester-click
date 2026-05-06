<?php

if (!function_exists('kbtBlogTemplatePostData')) {
    function kbtBlogTemplatePostData($slug)
    {
        static $postsBySlug = null;
        if ($postsBySlug === null) {
            $postsBySlug = [];
            $postsFile = __DIR__ . '/../../blog/posts-data.php';
            if (is_file($postsFile)) {
                $posts = include $postsFile;
                foreach ($posts as $post) {
                    $key = basename((string) ($post['path'] ?? ''));
                    if ($key !== '') {
                        $postsBySlug[$key] = $post;
                    }
                }
            }
        }

        $slug = basename((string) $slug);
        return $postsBySlug[$slug] ?? [
            'path' => 'blog/' . $slug,
            'title' => ucwords(str_replace('-', ' ', preg_replace('/\.php$/', '', $slug))),
            'excerpt' => 'Use this guide to understand the tool, run the right checks, and decide what to do next.',
            'image' => '',
            'alt' => '',
            'date' => '',
            'updated' => '',
        ];
    }
}

if (!function_exists('kbtBlogTemplateVideoLibrary')) {
    function kbtBlogTemplateVideoLibrary()
    {
        return [
            '3JlrFE1Owjs' => ['title' => 'THIS is what your mic sounds like - Mic Test #shorts', 'uploadDate' => '2026-04-10T22:29:32-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/3JlrFE1Owjs/hqdefault.jpg'],
            '4V0Ew7X1Z1Y' => ['title' => 'How FAST can you really type? WPM Test #shorts', 'uploadDate' => '2026-04-10T22:28:52-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/4V0Ew7X1Z1Y/hqdefault.jpg'],
            'C0PrASyDPV8' => ['title' => 'How to Fix Browser DNS Leaks | Disable WebRTC', 'uploadDate' => '2024-02-23T07:00:08-08:00', 'thumbnail' => 'https://i.ytimg.com/vi/C0PrASyDPV8/hqdefault.jpg'],
            'CURKRJSoUMY' => ['title' => '5 Best Recent Gaming Mouse Launches in 2026: Honest Picks by Brand', 'uploadDate' => '2026-04-11T07:19:16-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/CURKRJSoUMY/hqdefault.jpg'],
            'DuOUkdqnUB4' => ['title' => 'Is Your Mouse Double-Clicking Itself? How to Detect & Fix Ghost Clicks', 'uploadDate' => '2026-04-11T12:51:43-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/DuOUkdqnUB4/hqdefault.jpg'],
            'LE-C9BmaynY' => ['title' => 'How to Turn Off Mouse Acceleration on Windows (Better Accuracy)', 'uploadDate' => '2026-02-04T08:31:22-08:00', 'thumbnail' => 'https://i.ytimg.com/vi/LE-C9BmaynY/hqdefault.jpg'],
            'NZGiZRw3aRs' => ['title' => '5 Best CS2 Crosshairs (With Codes) - Counter Strike 2 Crosshair Settings', 'uploadDate' => '2023-10-03T06:00:31-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/NZGiZRw3aRs/hqdefault.jpg'],
            'Q6zYolmmhwI' => ['title' => 'Your monitor colors are WRONG - Color Test #shorts', 'uploadDate' => '2026-04-13T05:57:55-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/Q6zYolmmhwI/hqdefault.jpg'],
            'RvCwMskRZHc' => ['title' => 'Razer Blade 16 (2025) Review - RTX 5090 Finally Tested!', 'uploadDate' => '2025-03-27T06:19:52-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/RvCwMskRZHc/hqdefault.jpg'],
            'T2kw2VY_yPM' => ['title' => 'Keyboard Switches Explained - Linear vs Tactile vs Clicky', 'uploadDate' => '2021-01-15T08:00:05-08:00', 'thumbnail' => 'https://i.ytimg.com/vi/T2kw2VY_yPM/hqdefault.jpg'],
            'VYJZGa9m34w' => ['title' => 'WebAssembly and WebGPU enhancements for faster Web AI', 'uploadDate' => '2024-05-16T07:04:38-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/VYJZGa9m34w/hqdefault.jpg'],
            'WViKtC6DD-I' => ['title' => 'What your webcam ACTUALLY looks like - Webcam Test #shorts', 'uploadDate' => '2026-04-13T05:57:17-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/WViKtC6DD-I/hqdefault.jpg'],
            'Xph27Qdc7vg' => ['title' => 'How to Create a QR Code for Free - URL, Wi-Fi, Text & More', 'uploadDate' => '2026-04-11T12:51:37-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/Xph27Qdc7vg/hqdefault.jpg'],
            'YZz_5-VoCEI' => ['title' => 'Your keyboard has hidden INPUT LAG - Latency Test #shorts', 'uploadDate' => '2026-04-13T05:58:09-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/YZz_5-VoCEI/hqdefault.jpg'],
            'c4ZwGKaySvY' => ['title' => 'How to Test Your Headphones & Speakers - Left/Right Channel Check', 'uploadDate' => '2026-04-11T12:51:58-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/c4ZwGKaySvY/hqdefault.jpg'],
            'cNdi8AALLPo' => ['title' => 'How fast can you hit SPACEBAR? Spacebar Counter #shorts', 'uploadDate' => '2026-04-13T05:57:45-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/cNdi8AALLPo/hqdefault.jpg'],
            'dqZtI_lG56U' => ['title' => 'EXPLAINED: How To TEST Keyboard Polling Rate?', 'uploadDate' => '2025-01-08T10:53:02-08:00', 'thumbnail' => 'https://i.ytimg.com/vi/dqZtI_lG56U/hqdefault.jpg'],
            'e8YWJextKYc' => ['title' => '5 Best Recent Gaming Keyboard Launches in 2026 | Honest Picks by Brand', 'uploadDate' => '2026-04-11T09:30:39-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/e8YWJextKYc/hqdefault.jpg'],
            'ecmuKN0NJTI' => ['title' => 'Your keyboard is LYING to you | Free Keyboard Tester #shorts', 'uploadDate' => '2026-04-10T11:08:35-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/ecmuKN0NJTI/hqdefault.jpg'],
            'fpuhy_QVZx4' => ['title' => 'How To Check Mouse DPI On PC - Full Guide', 'uploadDate' => '2023-02-27T05:01:14-08:00', 'thumbnail' => 'https://i.ytimg.com/vi/fpuhy_QVZx4/hqdefault.jpg'],
            'jAyd89j0B58' => ['title' => 'How to use Mac keyboard shortcuts | Apple Support', 'uploadDate' => '2025-04-10T09:01:11-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/jAyd89j0B58/hqdefault.jpg'],
            'm5Ni0fg72u8' => ['title' => 'How to ACTUALLY Clean Your Keyboard... (In Under An Hour)', 'uploadDate' => '2023-06-24T09:00:26-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/m5Ni0fg72u8/hqdefault.jpg'],
            'mdhExAcq9cc' => ['title' => '3 keys pressed, only 1 registered - Anti-Ghosting Test #shorts', 'uploadDate' => '2026-04-10T22:29:23-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/mdhExAcq9cc/hqdefault.jpg'],
            'oT8UJ-ItFU4' => ['title' => "Average human = 250ms. What's YOURS? Reaction Test #shorts", 'uploadDate' => '2026-04-13T05:57:33-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/oT8UJ-ItFU4/hqdefault.jpg'],
            'osKLmfwBxoU' => ['title' => 'Keyboard Ghosting - Friday Minis 90', 'uploadDate' => '2015-01-22T17:30:01-08:00', 'thumbnail' => 'https://i.ytimg.com/vi/osKLmfwBxoU/hqdefault.jpg'],
            'rC2vuMqLMAE' => ['title' => 'Acrylic v4n4g0n gasket mount case review and sound test at end!', 'uploadDate' => '2020-03-13T12:00:12-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/rC2vuMqLMAE/hqdefault.jpg'],
            'sd6myEtOYKI' => ['title' => 'How to Measure Your Click Speed (CPS) - What the Numbers Mean', 'uploadDate' => '2026-04-11T12:51:11-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/sd6myEtOYKI/hqdefault.jpg'],
            'v6zIieVhQrE' => ['title' => 'How to Check If Your Mouse Has a Double Click Problem', 'uploadDate' => '2025-04-17T05:01:39-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/v6zIieVhQrE/hqdefault.jpg'],
            'xtaObUT7hPU' => ['title' => 'How to Extract Text from Images Free - Browser OCR (No Upload)', 'uploadDate' => '2026-04-11T12:53:47-07:00', 'thumbnail' => 'https://i.ytimg.com/vi/xtaObUT7hPU/hqdefault.jpg'],
        ];
    }
}

if (!function_exists('kbtBlogTemplateVideoIdForSlug')) {
    function kbtBlogTemplateVideoIdForSlug($slug, $preferredId = '')
    {
        $slug = basename((string) $slug);
        $preferredId = trim((string) $preferredId);
        if ($preferredId !== '' && $preferredId !== 'NcdNBuPc6Zw') {
            return $preferredId;
        }

        $map = [
            'best-mechanical-keyboards-for-gaming-2026.php' => 'e8YWJextKYc',
            'best-recent-gaming-headphone-launches-2026.php' => 'c4ZwGKaySvY',
            'best-recent-wireless-keyboard-launches-2026.php' => 'e8YWJextKYc',
            'dead-pixel-test-check-monitor.php' => 'Q6zYolmmhwI',
            'how-to-test-mouse-buttons-scroll-wheel.php' => 'DuOUkdqnUB4',
            'input-latency-checker-keyboard-mouse-delay.php' => 'YZz_5-VoCEI',
            'keyboard-typing-double-letters-fix-key-chatter.php' => 'ecmuKN0NJTI',
            'lucky-wheel-spinner-random-selection.php' => 'oT8UJ-ItFU4',
            'mouse-trail-visualizer-movement-patterns.php' => 'LE-C9BmaynY',
            'qr-code-reader-scan-decode-images.php' => 'Xph27Qdc7vg',
            'secure-password-generator-strong-random.php' => 'ecmuKN0NJTI',
            'webcam-test-check-camera-video-calls.php' => 'WViKtC6DD-I',
            'whatsapp-link-generator-direct-chat.php' => 'Xph27Qdc7vg',
        ];

        if (isset($map[$slug])) {
            return $map[$slug];
        }

        if (strpos($slug, 'keyboard') !== false || strpos($slug, 'typing') !== false || strpos($slug, 'key-') !== false) {
            return 'ecmuKN0NJTI';
        }
        if (strpos($slug, 'mouse') !== false || strpos($slug, 'click') !== false || strpos($slug, 'dpi') !== false) {
            return 'DuOUkdqnUB4';
        }
        if (strpos($slug, 'mic') !== false || strpos($slug, 'microphone') !== false) {
            return '3JlrFE1Owjs';
        }
        if (strpos($slug, 'headphone') !== false || strpos($slug, 'speaker') !== false) {
            return 'c4ZwGKaySvY';
        }
        if (strpos($slug, 'webcam') !== false) {
            return 'WViKtC6DD-I';
        }
        if (strpos($slug, 'qr') !== false) {
            return 'Xph27Qdc7vg';
        }
        if (strpos($slug, 'ocr') !== false) {
            return 'xtaObUT7hPU';
        }
        if (strpos($slug, 'screen') !== false || strpos($slug, 'pixel') !== false || strpos($slug, 'monitor') !== false) {
            return 'Q6zYolmmhwI';
        }

        return 'ecmuKN0NJTI';
    }
}

if (!function_exists('kbtBlogTemplateProfile')) {
    function kbtBlogTemplateProfile($slug)
    {
        $slug = basename((string) $slug);
        $post = kbtBlogTemplatePostData($slug);
        $title = (string) ($post['title'] ?? '');
        $excerpt = (string) ($post['excerpt'] ?? '');
        $lower = strtolower($slug . ' ' . $title . ' ' . $excerpt);

        if (strpos($lower, 'keyboard') !== false || strpos($lower, 'typing') !== false || strpos($lower, 'key ') !== false) {
            $tools = [
                ['Keyboard Tester', 'tools/keyboard-tester/', 'Check every physical key with a live visual keyboard.'],
                ['Stuck Key Test', 'stuck-key-test.php', 'Find keys that repeat, jam, or stay active after release.'],
                ['Keyboard Ghosting Test', 'keyboard-ghosting-test.php', 'Check multi-key combinations for gaming and shortcuts.'],
                ['Keyboard Latency Test', 'latency-checker.php', 'Compare input delay across USB, wireless, and browser setups.'],
            ];
            $tips = ['Test once in a clean browser tab.', 'Retest after changing ports, wireless mode, or device settings.', 'Use the focused tool that matches the symptom, not only the general tester.', 'Keep screenshots or notes when comparing hardware.'];
        } elseif (strpos($lower, 'mouse') !== false || strpos($lower, 'click') !== false || strpos($lower, 'dpi') !== false || strpos($lower, 'crosshair') !== false) {
            $tools = [
                ['Mouse Tester', 'mouse-test.php', 'Verify buttons, scroll, and pointer response.'],
                ['Ghost Click Detector', 'ghost-click-detector.php', 'Detect unwanted double clicks and switch bounce.'],
                ['Click Speed Test', 'mouse_speed_tester.php', 'Measure CPS and clicking consistency.'],
                ['DPI Tester', 'mouse_sensitivity_DPI_tester.php', 'Check real-world mouse sensitivity and setup.'],
            ];
            $tips = ['Test left, right, middle, scroll, and side-button behavior separately.', 'Compare wired, receiver, and Bluetooth modes if available.', 'Use the same browser and surface when comparing results.', 'Retest after changing drivers, polling rate, or game settings.'];
        } elseif (strpos($lower, 'mic') !== false || strpos($lower, 'microphone') !== false || strpos($lower, 'headphone') !== false || strpos($lower, 'speaker') !== false || strpos($lower, 'audio') !== false) {
            $tools = [
                ['Microphone Test', 'mic-tester.php', 'Check microphone input level and clarity before calls.'],
                ['Headphone and Speaker Test', 'headphone_speaker_tester_index.php', 'Verify left/right channels and output routing.'],
                ['Left Right Speaker Test', 'left-right-speaker-test.php', 'Confirm stereo direction and channel balance.'],
                ['Sound Test', 'sound-test.php', 'Run a quick browser audio output check.'],
            ];
            $tips = ['Select the correct input or output device first.', 'Test in a quiet room and then in your real call or gaming setup.', 'Check browser permission prompts before blaming hardware.', 'Retest after changing USB ports, Bluetooth mode, or audio drivers.'];
        } elseif (strpos($lower, 'webcam') !== false || strpos($lower, 'camera') !== false) {
            $tools = [
                ['Webcam Test', 'webcamtesterindex.php', 'Preview the camera and verify it works in the browser.'],
                ['Camera Resolution Test', 'camera-resolution-test.php', 'Check reported resolution and video quality.'],
                ['Take Picture With Webcam', 'take-picture-with-webcam.php', 'Capture a quick still image from the camera.'],
                ['Webcam Mirror', 'webcam-mirror.php', 'Use the camera as a mirror and framing check.'],
            ];
            $tips = ['Allow camera permission only on pages you trust.', 'Close video-call apps that may already be using the camera.', 'Check lighting before judging camera quality.', 'Retest in another browser if permission state looks stuck.'];
        } elseif (strpos($lower, 'screen') !== false || strpos($lower, 'pixel') !== false || strpos($lower, 'monitor') !== false || strpos($lower, 'color') !== false) {
            $tools = [
                ['Dead Pixel Test', 'dead-pixel-test.php', 'Scan for dead or stuck pixels with solid colors.'],
                ['Color Test', 'color-test.php', 'Check color, gradients, and basic display behavior.'],
                ['Frame Skipping Test', 'frame-skipping-test.php', 'Verify motion and frame consistency.'],
                ['Refresh Rate Test', 'refresh-rate-test.php', 'Check display refresh behavior in the browser.'],
            ];
            $tips = ['Clean the display first so dust is not mistaken for a pixel issue.', 'Use full-screen mode where possible.', 'Test several solid colors, not only black or white.', 'Compare screenshots only after checking the screen directly.'];
        } elseif (strpos($lower, 'qr') !== false || strpos($lower, 'ocr') !== false || strpos($lower, 'password') !== false || strpos($lower, 'whatsapp') !== false || strpos($lower, 'wheel') !== false) {
            $tools = [
                ['QR Code Generator', 'QR_code_generator_scanner.php', 'Create shareable QR codes in the browser.'],
                ['QR Code Reader', 'qr-code-reader.php', 'Decode QR codes from images.'],
                ['OCR Tool', 'ocr-tool.php', 'Extract text from images without manual typing.'],
                ['Password Generator', 'auto-password-generator.php', 'Generate strong random passwords safely.'],
            ];
            $tips = ['Use the tool in a clean browser tab and verify the output before sharing it.', 'Avoid pasting private data into tools you do not trust.', 'Save only the final result you actually need.', 'Retest with a simple sample before using the tool for important work.'];
        } else {
            $tools = [
                ['All Tools', 'pages/all-tools.php', 'Browse the full KeyboardTester.click tool set.'],
                ['Keyboard Tester', 'tools/keyboard-tester/', 'Check keys and input behavior quickly.'],
                ['Mouse Tester', 'mouse-test.php', 'Verify mouse buttons and scroll behavior.'],
                ['Reaction Time Test', 'reaction-time-test.php', 'Measure response speed in the browser.'],
            ];
            $tips = ['Start with the simplest browser test that matches the task.', 'Change one setting at a time so results are easy to interpret.', 'Retest after cleaning, restarting, or changing devices.', 'Use related tools to confirm the first result before making a decision.'];
        }

        $shortTitle = preg_replace('/\s*\(2026\)\s*/', '', $title);
        $fastAnswer = 'Use this guide as a practical checklist for ' . strtolower($shortTitle ?: 'this topic') . '. Start with the main browser tool, confirm the result with one focused follow-up test, then change only one device, browser, or setting at a time so you know what actually fixed the issue.';

        return [
            'title' => $title,
            'excerpt' => $excerpt,
            'tools' => $tools,
            'tips' => $tips,
            'fastAnswer' => $fastAnswer,
            'faqs' => [
                ['question' => 'Do I need to install anything for this guide?', 'answer' => 'No. The recommended checks run in a modern browser unless the article specifically points you to an operating-system or device setting.'],
                ['question' => 'Is the browser test private?', 'answer' => 'The KeyboardTester.click tools are designed to run the test interaction in your browser. Do not type passwords, private messages, or sensitive account data into any testing page.'],
                ['question' => 'What should I do if the result looks wrong?', 'answer' => 'Repeat the test in a clean browser tab, then change one variable at a time such as device, cable, USB port, permission, wireless mode, or browser profile.'],
                ['question' => 'When should I use a related tool?', 'answer' => 'Use a related tool when the first result points to a narrower issue, such as latency, ghosting, stuck input, camera permission, audio routing, or QR/OCR decoding quality.'],
            ],
        ];
    }
}

if (!function_exists('kbtBlogTemplateStyles')) {
    function kbtBlogTemplateStyles()
    {
        static $rendered = false;
        if ($rendered) {
            return;
        }
        $rendered = true;
        echo '<style>
.kbt-template-box{border:1px solid var(--border-color,#dbeafe);border-radius:8px;background:linear-gradient(135deg,rgba(14,165,233,.1),rgba(16,185,129,.07));padding:1rem 1.1rem;margin:1.35rem 0}
.kbt-template-jumps{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.6rem;margin:1.1rem 0 1.45rem}
.kbt-template-jumps a,.kbt-template-card{border:1px solid var(--border-color,#e2e8f0);border-radius:8px;background:var(--surface,#fff);padding:.75rem .85rem;color:inherit;text-decoration:none}
.kbt-template-jumps a{font-weight:650;background:var(--surface,#f8fafc)}
.kbt-template-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.85rem;margin:1rem 0}
.kbt-template-card strong{display:block;margin-bottom:.25rem;color:var(--text-color)}
.kbt-template-video{position:relative;padding-bottom:56.25%;height:0;overflow:hidden;border-radius:8px;background:#0f172a;margin:.85rem 0}
.kbt-template-video iframe{position:absolute;top:0;left:0;width:100%;height:100%;border:0}
@media(max-width:720px){.kbt-template-jumps,.kbt-template-grid{grid-template-columns:1fr}}
</style>';
    }
}

if (!function_exists('kbtRenderBlogTemplateSchema')) {
    function kbtRenderBlogTemplateSchema($slug, array $options = [])
    {
        $profile = kbtBlogTemplateProfile($slug);
        $post = kbtBlogTemplatePostData($slug);
        $graph = [];
        $videoId = kbtBlogTemplateVideoIdForSlug($slug, $options['video_id'] ?? '');
        $videos = kbtBlogTemplateVideoLibrary();
        $video = $videos[$videoId] ?? $videos['ecmuKN0NJTI'];

        if (!empty($options['video_schema'])) {
            $graph[] = [
                '@type' => 'VideoObject',
                'name' => $video['title'],
                'description' => 'Relevant supporting video for ' . ($profile['title'] ?: 'this KeyboardTester.click guide') . '.',
                'thumbnailUrl' => [$video['thumbnail']],
                'uploadDate' => $video['uploadDate'],
                'contentUrl' => 'https://www.youtube.com/watch?v=' . $videoId,
                'embedUrl' => 'https://www.youtube.com/embed/' . $videoId,
            ];
        }

        if (!empty($options['faq_schema'])) {
            $graph[] = [
                '@type' => 'FAQPage',
                'mainEntity' => array_map(static function ($faq) {
                    return [
                        '@type' => 'Question',
                        'name' => $faq['question'],
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => $faq['answer'],
                        ],
                    ];
                }, $profile['faqs']),
            ];
        }

        if (!empty($options['breadcrumb'])) {
            $graph[] = [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => absoluteUrl('')],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => absoluteUrl('blog/')],
                    ['@type' => 'ListItem', 'position' => 3, 'name' => $profile['title'] ?: 'Blog post', 'item' => absoluteUrl($post['path'] ?? ('blog/' . basename((string) $slug)))],
                ],
            ];
        }

        if ($graph === []) {
            return;
        }

        echo '<script type="application/ld+json">' . json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
    }
}

if (!function_exists('kbtRenderBlogTemplateIntro')) {
    function kbtRenderBlogTemplateIntro($slug, array $options = [])
    {
        if (empty($options['answer']) && empty($options['jump'])) {
            return;
        }
        kbtBlogTemplateStyles();
        $profile = kbtBlogTemplateProfile($slug);

        if (!empty($options['answer'])) {
            echo '<div class="kbt-template-box" id="kbt-template-fast-answer"><p><strong>Fast answer:</strong> ' . htmlspecialchars($profile['fastAnswer'], ENT_QUOTES, 'UTF-8') . '</p></div>';
        }

        if (!empty($options['jump'])) {
            $links = [];
            if (!empty($options['quick_tips'])) {
                $links[] = ['#kbt-template-checklist', 'Quick checklist'];
            }
            if (!empty($options['video'])) {
                $links[] = ['#kbt-template-video', 'Watch video'];
            }
            if (!empty($options['related'])) {
                $links[] = ['#kbt-template-related-tools', 'Related tools'];
            }
            if (!empty($options['faq'])) {
                $links[] = ['#kbt-template-faq', 'FAQ'];
            }
            if ($links !== []) {
                echo '<nav class="kbt-template-jumps" aria-label="Article quick links">';
                foreach ($links as $link) {
                    echo '<a href="' . htmlspecialchars($link[0], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($link[1], ENT_QUOTES, 'UTF-8') . '</a>';
                }
                echo '</nav>';
            }
        }
    }
}

if (!function_exists('kbtRenderBlogTemplateFooter')) {
    function kbtRenderBlogTemplateFooter($slug, array $options = [])
    {
        if (empty($options['quick_tips']) && empty($options['video']) && empty($options['related']) && empty($options['faq'])) {
            return;
        }
        kbtBlogTemplateStyles();
        $profile = kbtBlogTemplateProfile($slug);

        if (!empty($options['quick_tips'])) {
            echo '<section class="kbt-template-box" id="kbt-template-checklist"><h2>Quick Action Checklist</h2><ul>';
            foreach ($profile['tips'] as $tip) {
                echo '<li>' . htmlspecialchars($tip, ENT_QUOTES, 'UTF-8') . '</li>';
            }
            echo '</ul></section>';
        }

        if (!empty($options['video'])) {
            $videoId = kbtBlogTemplateVideoIdForSlug($slug, $options['video_id'] ?? '');
            $videos = kbtBlogTemplateVideoLibrary();
            $video = $videos[$videoId] ?? $videos['ecmuKN0NJTI'];
            echo '<section class="kbt-template-box" id="kbt-template-video"><h2>Helpful Video</h2><p>This related video supports the checks and decisions covered in this guide.</p><div class="kbt-template-video"><iframe src="https://www.youtube.com/embed/' . htmlspecialchars($videoId, ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($video['title'], ENT_QUOTES, 'UTF-8') . '" loading="lazy" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div></section>';
        }

        if (!empty($options['related'])) {
            echo '<section id="kbt-template-related-tools"><h2>Related Tools</h2><div class="kbt-template-grid">';
            foreach ($profile['tools'] as $tool) {
                echo '<a class="kbt-template-card" href="' . htmlspecialchars(url($tool[1]), ENT_QUOTES, 'UTF-8') . '"><strong>' . htmlspecialchars($tool[0], ENT_QUOTES, 'UTF-8') . '</strong><span>' . htmlspecialchars($tool[2], ENT_QUOTES, 'UTF-8') . '</span></a>';
            }
            echo '</div></section>';
        }

        if (!empty($options['faq'])) {
            echo '<section id="kbt-template-faq"><h2>FAQ</h2>';
            foreach ($profile['faqs'] as $faq) {
                echo '<h3>' . htmlspecialchars($faq['question'], ENT_QUOTES, 'UTF-8') . '</h3><p>' . htmlspecialchars($faq['answer'], ENT_QUOTES, 'UTF-8') . '</p>';
            }
            echo '</section>';
        }
    }
}
