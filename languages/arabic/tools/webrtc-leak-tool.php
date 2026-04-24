<?php
$wlt_labels = [
  'aria' => 'كاشف تسرب IP عبر WebRTC.',
  'instruction' => 'يمكن لـ WebRTC تسريب عناوين IP المحلية والعامة الحقيقية إلى المواقع حتى عند استخدام VPN. انقر ابدأ لاكتشاف ما يكشفه متصفحك.',
  'start' => 'ابدأ المسح',
  'public_ip' => 'IP عامة', 'local_ips' => 'IPs محلية', 'ipv6' => 'IPv6',
  'status' => 'الحالة', 'safe' => 'آمن (لا تسرب)', 'leak' => 'تم اكتشاف تسرب',
  'scanning' => 'جاري المسح...',
  'public_via' => 'تم الاكتشاف عبر STUN', 'no_local' => 'لا شيء مكشوف',
];
include __DIR__ . '/../../../tools/webrtc_leak_tool.php';
