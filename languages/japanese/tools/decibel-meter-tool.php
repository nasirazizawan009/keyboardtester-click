<?php
$dm_labels = [
  'aria' => 'マイク経由デシベルメーター。',
  'instruction' => '開始を押してマイクでライブdB SPL測定。ブラウザ読み取りは相対値です - 実際のSPLにはハードウェア校正が必要。',
  'start' => '開始', 'stop' => '停止',
  'current' => '現在のdB', 'peak' => 'ピークdB', 'average' => '平均dB',
  'permission_denied' => 'マイクアクセスが拒否されました。',
  'no_mic' => 'マイクが検出されません。',
];
include __DIR__ . '/../../../tools/decibel_meter_tool.php';
