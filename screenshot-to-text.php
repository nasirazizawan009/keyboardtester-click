<?php
$intentPage = [
    'meta' => [
        'title' => 'Screenshot to Text Online | Extract Text From Screenshots',
        'description' => 'Convert a screenshot to text online with a browser-based OCR tool. Upload screen captures, chat screenshots, and saved app images to extract text.',
        'keywords' => 'screenshot to text, extract text from screenshot, screenshot ocr online, copy text from screenshot',
        'ogImage' => 'images/ocr-tool/hero.png',
        'ogImageAlt' => 'Screenshot to text OCR tool in the browser'
    ],
    'schemaKey' => 'screenshot_to_text',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Screenshot to Text', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Screenshot OCR',
        'title' => 'Screenshot to Text Online',
        'lede' => 'Upload a screenshot and convert visible text into editable text directly in your browser. Great for software UI, chats, receipts, and saved images.',
        'primaryHref' => '#screenshot-ocr-tool',
        'primaryLabel' => 'Upload screenshot',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['OCR in browser', 'Screenshot friendly', 'No installs'],
        'metrics' => [
            ['value' => 'JPG/PNG', 'label' => 'Image input'],
            ['value' => 'Live', 'label' => 'Text extraction'],
            ['value' => '0', 'label' => 'Software installs']
        ],
        'image' => 'images/ocr-tool/hero.png',
        'imageAlt' => 'Screenshot to text OCR converter online',
        'miniCards' => [
            ['title' => 'Good for saved chats', 'text' => 'Pull text out of screenshots when copy and paste is not available.'],
            ['title' => 'Good for UI captures', 'text' => 'Extract button labels, errors, or settings text from software screenshots.']
        ]
    ],
    'toolStageId' => 'screenshot-ocr-tool',
    'toolShellId' => 'screenshot-ocr-shell',
    'toolSection' => [
        'kicker' => 'Live OCR tool',
        'title' => 'Screenshot Text Extractor',
        'lede' => 'Use the OCR tool below to upload a screenshot and turn visible text into something you can copy or reuse.'
    ],
    'toolInclude' => 'tools/ocr_tool.php',
    'trustItems' => [
        ['title' => 'Screenshot ready', 'desc' => 'Works well for app UI, chats, browser captures, and receipts'],
        ['title' => 'Local processing', 'desc' => 'OCR runs in your browser after you upload the image'],
        ['title' => 'Fast retry loop', 'desc' => 'Clear the tool and try a sharper crop if needed'],
        ['title' => 'No account', 'desc' => 'Open the page and start extracting text']
    ],
    'featureSection' => [
        'kicker' => 'Focused screenshot OCR',
        'title' => 'Why Use Screenshot to Text Instead of Generic OCR',
        'lede' => 'People often need OCR for UI captures, chat logs, error messages, and saved screenshots rather than scanned documents.',
        'cards' => [
            ['title' => 'Chat and message screenshots', 'text' => 'Copy text from screenshots when the original app does not allow selection.'],
            ['title' => 'Software errors and logs', 'text' => 'Extract error messages from screenshots so you can search them or share them.'],
            ['title' => 'Browser and dashboard captures', 'text' => 'Pull text from admin panels, forms, and web apps quickly.'],
            ['title' => 'Simple cleanup flow', 'text' => 'If a full screenshot is noisy, crop it and run OCR again for better results.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Convert a Screenshot to Text',
        'lede' => 'Upload the screenshot, run OCR, and review the extracted text for quick copy-and-paste reuse.',
        'steps' => [
            ['image' => 'images/ocr-tool/step-1.png', 'alt' => 'Screenshot to text step 1 open the OCR tool', 'title' => 'Open the OCR tool', 'text' => 'Stay on the screenshot-focused workflow if your source is a saved screen capture.'],
            ['image' => 'images/ocr-tool/step-2.png', 'alt' => 'Screenshot to text step 2 upload the screenshot image', 'title' => 'Upload the screenshot', 'text' => 'Choose the saved PNG or JPG that contains the text you want to copy.'],
            ['image' => 'images/ocr-tool/step-3.png', 'alt' => 'Screenshot to text step 3 review extracted OCR text', 'title' => 'Review the extracted text', 'text' => 'Copy the result, then retry with a cleaner crop if the screenshot contains too much extra UI.']
        ]
    ],
    'clusterTool' => 'ocr',
    'currentTool' => 'ocr',
    'seoContentInclude' => 'help/seo-content/screenshot-to-text.php',
    'showToolsList' => true,
    'helpInclude' => 'help/ocr-tool.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';

