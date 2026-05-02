<?php
include __DIR__ . '/../../config.php';

header('Location: ' . url('pages/all-tools-ja.php'), true, 301);
header('X-Robots-Tag: noindex, follow');
exit;
