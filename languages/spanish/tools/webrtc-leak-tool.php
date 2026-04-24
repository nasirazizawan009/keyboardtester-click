<?php
$wlt_labels = [
  'aria' => 'Detector de fugas IP WebRTC.',
  'instruction' => 'WebRTC puede filtrar tu IP local y publica real a sitios web incluso usando VPN. Pulsa Iniciar para detectar lo que tu navegador expone.',
  'start' => 'Iniciar escaneo',
  'public_ip' => 'IP publica', 'local_ips' => 'IPs locales', 'ipv6' => 'IPv6',
  'status' => 'Estado', 'safe' => 'Seguro (sin fuga)', 'leak' => 'FUGA detectada',
  'scanning' => 'Escaneando...',
  'public_via' => 'Detectado via STUN', 'no_local' => 'Ninguna expuesta',
];
include __DIR__ . '/../../../tools/webrtc_leak_tool.php';
