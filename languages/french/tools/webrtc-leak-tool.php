<?php
$wlt_labels = [
  'aria' => 'Detecteur de fuites IP WebRTC.',
  'instruction' => 'WebRTC peut fuir vos IP reelles locale et publique vers les sites web meme avec un VPN. Cliquez Demarrer pour detecter ce que votre navigateur expose.',
  'start' => 'Demarrer le scan',
  'public_ip' => 'IP publique', 'local_ips' => 'IPs locales', 'ipv6' => 'IPv6',
  'status' => 'Statut', 'safe' => 'Sur (pas de fuite)', 'leak' => 'FUITE detectee',
  'scanning' => 'Analyse...',
  'public_via' => 'Detecte via STUN', 'no_local' => 'Aucune exposee',
];
include __DIR__ . '/../../../tools/webrtc_leak_tool.php';
