<?php
$intentPage = [
    'meta' => [
        'title' => 'Photo to Text Online | Extract Text From Photos',
        'description' => 'Convert a photo to text online with browser-based OCR. Upload phone photos, receipts, labels, and printed documents to extract editable text.',
        'keywords' => 'photo to text, text from photo, OCR photo to text, extract text from photo',
        'ogImage' => 'images/ocr-tool/hero.png',
        'ogImageAlt' => 'Photo to text OCR tool for phone photos and document images'
    ],
    'schemaKey' => 'photo_to_text',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Photo to Text', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Photo OCR',
        'title' => 'Photo to Text Online',
        'lede' => 'Upload a phone photo, receipt, sign, label, or printed page and extract the visible text directly in your browser with OCR.',
        'primaryHref' => '#photo-to-text-tool',
        'primaryLabel' => 'Upload photo',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Photo OCR', 'Browser based', 'No installs'],
        'metrics' => [
            ['value' => 'JPG/PNG', 'label' => 'Photo input'],
            ['value' => 'Live', 'label' => 'Text output'],
            ['value' => '0', 'label' => 'Uploads to server']
        ],
        'image' => 'images/ocr-tool/hero.png',
        'imageAlt' => 'Photo to text OCR converter online',
        'miniCards' => [
            ['title' => 'Receipt and label OCR', 'text' => 'Useful for prices, package labels, forms, menus, and signs.'],
            ['title' => 'Phone photo workflow', 'text' => 'Built for images captured on a mobile device, not only clean screenshots.']
        ]
    ],
    'toolStageId' => 'photo-to-text-tool',
    'toolShellId' => 'photo-to-text-shell',
    'toolSection' => [
        'kicker' => 'Live OCR tool',
        'title' => 'Photo Text Extractor',
        'lede' => 'Use the OCR tool below to upload a photo and convert the readable text into something you can copy or edit.'
    ],
    'toolInclude' => 'tools/ocr_tool.php',
    'trustItems' => [
        ['title' => 'Photo-friendly OCR', 'desc' => 'Useful for receipts, labels, notes, signs, and printed pages'],
        ['title' => 'No software install', 'desc' => 'Open the page and run OCR in the browser'],
        ['title' => 'Fast retry loop', 'desc' => 'Try a clearer crop if the first result is noisy'],
        ['title' => 'Local processing', 'desc' => 'The OCR engine runs in your browser after upload']
    ],
    'featureSection' => [
        'kicker' => 'Built for phone photos',
        'title' => 'When Photo to Text Is Better Than Screenshot OCR',
        'lede' => 'Photos bring extra OCR challenges like blur, shadows, angle distortion, and uneven lighting, so this page targets that specific use case.',
        'cards' => [
            ['title' => 'Receipts and invoices', 'text' => 'Pull text from shopping receipts, bills, printed forms, and restaurant slips.'],
            ['title' => 'Signs and labels', 'text' => 'Capture text from package labels, posters, shelf tags, and office signage.'],
            ['title' => 'Printed documents', 'text' => 'Extract text from notes or printed pages when you only have a camera photo available.'],
            ['title' => 'Better retry guidance', 'text' => 'If the output is messy, crop tighter and use a brighter, sharper photo for the next pass.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Convert a Photo to Text',
        'lede' => 'Upload the photo, run OCR, and review the extracted text. If the image is busy or angled, crop it and try again.',
        'steps' => [
            ['image' => 'images/ocr-tool/step-1.png', 'alt' => 'Photo to text step 1 open the OCR tool', 'title' => 'Open the OCR tool', 'text' => 'Start with the browser-based OCR page and choose your photo file.'],
            ['image' => 'images/ocr-tool/step-2.png', 'alt' => 'Photo to text step 2 upload a phone photo or receipt image', 'title' => 'Upload the photo', 'text' => 'Use a phone photo, receipt image, or document photo with readable text.'],
            ['image' => 'images/ocr-tool/step-3.png', 'alt' => 'Photo to text step 3 review extracted OCR result', 'title' => 'Review the OCR result', 'text' => 'Copy the extracted text, then crop or retake the photo if you need a cleaner second pass.']
        ]
    ],
    'clusterTool' => 'ocr',
    'currentTool' => 'ocr',
    'seoContentInclude' => 'help/seo-content/photo-to-text.php',
    'showToolsList' => true,
    'helpInclude' => 'help/ocr-tool.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';
