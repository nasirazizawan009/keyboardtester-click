<?php
$wlt_labels = [
  'aria' => 'WebRTC IPリーク検出器。',
  'instruction' => 'WebRTCはVPN使用中でも実際のローカルおよびパブリックIPアドレスをウェブサイトに漏らす可能性があります。開始を押してブラウザが何を公開しているか検出。',
  'start' => 'スキャン開始',
  'public_ip' => 'パブリックIP', 'local_ips' => 'ローカルIPs', 'ipv6' => 'IPv6',
  'status' => 'ステータス', 'safe' => '安全(リークなし)', 'leak' => 'リーク検出',
  'scanning' => 'スキャン中...',
  'public_via' => 'STUN経由検出', 'no_local' => '何も公開されていない',
];
include __DIR__ . '/../../../tools/webrtc_leak_tool.php';
