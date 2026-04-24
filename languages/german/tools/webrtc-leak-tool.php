<?php
$wlt_labels = [
  'aria' => 'WebRTC IP-Leak-Detektor.',
  'instruction' => 'WebRTC kann deine echten lokalen und oeffentlichen IP-Adressen an Webseiten weitergeben sogar wenn du ein VPN verwendest. Klicke Start um zu erkennen was dein Browser preisgibt.',
  'start' => 'Scan starten',
  'public_ip' => 'Oeffentliche IP', 'local_ips' => 'Lokale IPs', 'ipv6' => 'IPv6',
  'status' => 'Status', 'safe' => 'Sicher (kein Leak)', 'leak' => 'LEAK erkannt',
  'scanning' => 'Scanne...',
  'public_via' => 'Erkannt via STUN', 'no_local' => 'Keine exponiert',
];
include __DIR__ . '/../../../tools/webrtc_leak_tool.php';
