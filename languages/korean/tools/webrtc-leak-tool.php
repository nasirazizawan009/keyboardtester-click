<?php
$wlt_labels = [
  'aria' => 'WebRTC IP 누출 감지기.',
  'instruction' => 'WebRTC는 VPN을 사용하더라도 실제 로컬 및 공용 IP 주소를 웹사이트에 누출할 수 있습니다. 시작을 클릭하여 브라우저가 노출하는 것을 감지하세요.',
  'start' => '스캔 시작',
  'public_ip' => '공용 IP', 'local_ips' => '로컬 IPs', 'ipv6' => 'IPv6',
  'status' => '상태', 'safe' => '안전 (누출 없음)', 'leak' => '누출 감지됨',
  'scanning' => '스캔 중...',
  'public_via' => 'STUN을 통해 감지', 'no_local' => '노출되지 않음',
];
include __DIR__ . '/../../../tools/webrtc_leak_tool.php';
