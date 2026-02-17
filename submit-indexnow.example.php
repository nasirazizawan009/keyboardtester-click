<?php
/**
 * IndexNow URL Submission Script (EXAMPLE)
 *
 * Copy this file to submit-indexnow.php and update with your values.
 * Submits all site URLs to Bing, Yandex, and other search engines via IndexNow
 *
 * Usage: https://yourdomain.com/submit-indexnow.php?key=your-secret-key
 */

// Security: Require a secret key to run this script
$secretKey = 'change-this-to-your-secret'; // CHANGE THIS!
if (!isset($_GET['key']) || $_GET['key'] !== $secretKey) {
    http_response_code(403);
    die('Access denied. Please provide the correct key parameter.');
}

// IndexNow Configuration - UPDATE THESE
$config = [
    'host' => 'yourdomain.com',
    'key' => 'your-indexnow-key', // Get from Bing Webmaster Tools
    'keyLocation' => 'https://yourdomain.com/your-indexnow-key.txt',
    'endpoint' => 'https://api.indexnow.org/indexnow'
];

// Define your URLs to submit
$urls = [
    'https://yourdomain.com/',
    'https://yourdomain.com/page1.php',
    'https://yourdomain.com/page2.php',
    // Add all your URLs here
];

// Function to submit URLs to IndexNow
function submitToIndexNow($config, $urls) {
    $payload = [
        'host' => $config['host'],
        'key' => $config['key'],
        'keyLocation' => $config['keyLocation'],
        'urlList' => $urls
    ];

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $config['endpoint'],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json; charset=utf-8',
            'Host: api.indexnow.org'
        ],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    return [
        'httpCode' => $httpCode,
        'response' => $response,
        'error' => $error
    ];
}

// Execute and display results
header('Content-Type: text/html; charset=utf-8');
echo "<h1>IndexNow Submission</h1>";
echo "<p>Submitting " . count($urls) . " URLs...</p>";

$result = submitToIndexNow($config, $urls);

if ($result['httpCode'] == 200 || $result['httpCode'] == 202) {
    echo "<p style='color:green'>Success! HTTP " . $result['httpCode'] . "</p>";
} else {
    echo "<p style='color:red'>Error: HTTP " . $result['httpCode'] . "</p>";
}
