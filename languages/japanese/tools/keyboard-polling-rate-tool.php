<?php
$kpr_labels = [
  'aria' => 'キーボードポーリングテスト。',
  'instruction' => '任意のキーを3秒以上長押し。OSのオートリピートレートを測定し、ポーリングHzを近似。',
  'warning' => '注意：ブラウザのキーイベントはOSオートリピート設定で制限されます（Windowsで約30/秒）。真のポーリングはOS前のファームウェアで測定。',
  'press_now' => 'キーを長押し',
  'samples' => 'サンプル', 'avg_interval' => '平均間隔 (ms)', 'rate' => '推定レート (Hz)', 'min_int' => '最小間隔 (ms)',
  'reset' => 'リセット',
];
include __DIR__ . '/../../../tools/keyboard_polling_rate_tool.php';
