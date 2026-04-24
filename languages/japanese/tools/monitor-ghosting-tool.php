<?php
$mgh_labels = [
  'aria' => 'モニターゴースト / ピクセル応答時間テスト。',
  'speed' => '速度 (px/秒)', 'box_color' => 'ボックス色', 'bg_color' => '背景',
  'play' => '開始', 'pause' => '一時停止', 'fullscreen' => 'フルスクリーン',
  'instruction' => '動くボックスを見てください。後ろに残像や色のにじみがあれば、モニターにゴーストがあります。',
];
include __DIR__ . '/../../../tools/monitor_ghosting_tool.php';
