<?php
$wlt_labels = [
  'aria' => 'Detector de vazamento IP WebRTC.',
  'instruction' => 'WebRTC pode vazar seus IPs reais local e publico para sites mesmo usando VPN. Clique Iniciar para detectar o que seu navegador expoe.',
  'start' => 'Iniciar scan',
  'public_ip' => 'IP publico', 'local_ips' => 'IPs locais', 'ipv6' => 'IPv6',
  'status' => 'Estado', 'safe' => 'Seguro (sem vazamento)', 'leak' => 'VAZAMENTO detectado',
  'scanning' => 'Escaneando...',
  'public_via' => 'Detectado via STUN', 'no_local' => 'Nenhum exposto',
];
include __DIR__ . '/../../../tools/webrtc_leak_tool.php';
