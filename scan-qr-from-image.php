<?php
$intentPage = [
    'meta' => [
        'title' => 'Scan QR From Image Online | Decode QR From Screenshot or Photo',
        'description' => 'Scan a QR code from an image online. Upload a screenshot, saved QR picture, or camera photo and decode it locally in your browser.',
        'keywords' => 'scan qr from image, qr from screenshot, decode qr from photo, read qr code from image',
        'ogImage' => 'images/qr-reader/hero.png',
        'ogImageAlt' => 'Scan QR from image online using uploaded screenshots and photos'
    ],
    'schemaKey' => 'scan_qr_from_image',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Scan QR From Image', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'QR image decoding',
        'title' => 'Scan QR From Image Online',
        'lede' => 'Upload a QR screenshot, saved image, or phone photo and decode it instantly in your browser. No camera access is required for this workflow.',
        'primaryHref' => '#scan-qr-image-tool',
        'primaryLabel' => 'Upload QR image',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Image upload', 'No camera needed', 'Local decode'],
        'metrics' => [
            ['value' => '1', 'label' => 'Image input'],
            ['value' => 'Live', 'label' => 'Decode result'],
            ['value' => '0', 'label' => 'Installs']
        ],
        'image' => 'images/qr-reader/hero.png',
        'imageAlt' => 'Upload an image to scan a QR code online',
        'miniCards' => [
            ['title' => 'Screenshot friendly', 'text' => 'Useful when the QR code is inside a PDF, email, or desktop app.'],
            ['title' => 'Privacy first', 'text' => 'The image stays in your browser while the code is decoded.']
        ]
    ],
    'toolStageId' => 'scan-qr-image-tool',
    'toolShellId' => 'scan-qr-image-shell',
    'toolSection' => [
        'kicker' => 'Live QR decoder',
        'title' => 'QR Image Scanner',
        'lede' => 'Use the reader below to upload a QR image file and decode the embedded text or link.'
    ],
    'toolInclude' => 'tools/qr_code_reader_tool.php',
    'trustItems' => [
        ['title' => 'Screenshot ready', 'desc' => 'Works with saved images from phones, desktops, and downloads'],
        ['title' => 'No camera prompt', 'desc' => 'Great when camera access is blocked or unnecessary'],
        ['title' => 'Instant decode', 'desc' => 'Read URLs and text directly after upload'],
        ['title' => 'Local only', 'desc' => 'No image upload to our server']
    ],
    'featureSection' => [
        'kicker' => 'Built for file-based scanning',
        'title' => 'Why Use a QR From Image Scanner',
        'lede' => 'Many people already have the QR code saved as a screenshot or photo, so a file-based decoder is faster than opening a camera.',
        'cards' => [
            ['title' => 'PDF and email screenshots', 'text' => 'Decode QR codes that appear inside documents, invoices, or email attachments.'],
            ['title' => 'Phone gallery images', 'text' => 'Upload a saved camera photo when the original QR code is no longer in front of you.'],
            ['title' => 'Desktop workflow', 'text' => 'Useful when the QR is already on the same computer you are using.'],
            ['title' => 'Private scanning', 'text' => 'The reader processes the QR locally without sending the image anywhere.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Scan a QR Code From an Image',
        'lede' => 'Choose the QR screenshot or photo, let the reader decode it, and copy the resulting text or link.',
        'steps' => [
            ['image' => 'images/qr-reader/step-1.png', 'alt' => 'Scan QR from image step 1 open the image-based reader', 'title' => 'Open the reader', 'text' => 'Stay on the upload-based workflow instead of opening the camera.'],
            ['image' => 'images/qr-reader/step-2.png', 'alt' => 'Scan QR from image step 2 upload a screenshot or photo', 'title' => 'Upload the image file', 'text' => 'Choose the screenshot, document export, or camera photo that contains the QR code.'],
            ['image' => 'images/qr-reader/step-3.png', 'alt' => 'Scan QR from image step 3 review decoded content', 'title' => 'Review the decoded content', 'text' => 'Copy the text or URL after the local decoder identifies the QR pattern.']
        ]
    ],
    'clusterTool' => 'qr-reader',
    'currentTool' => 'qr-reader',
    'seoContentInclude' => 'help/seo-content/scan-qr-from-image.php',
    'showToolsList' => true,
    'helpInclude' => 'help/qr-code-reader.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';
