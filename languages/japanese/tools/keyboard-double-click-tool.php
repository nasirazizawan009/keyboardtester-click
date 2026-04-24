<?php
$kdc_labels = [
    'aria_arena' => 'キーボードチャタリング検出。',
    'start' => '開始', 'stop' => '停止', 'reset' => 'リセット',
    'threshold' => 'チャタリング閾値',
    'status_idle' => 'アイドル', 'status_listening' => 'リスニング',
    'col_key' => 'キー', 'col_total' => '押下数', 'col_chatter' => 'チャタリングイベント', 'col_min_gap' => '最小ギャップ (ms)',
    'tip_listen' => '開始を押してから各キーを1回ずつゆっくり押してください。2回登録されるキーがチャタリングイベントを表示します。',
    'no_chatter' => 'チャタリング未検出。キーを押し続けてください。',
];
include __DIR__ . '/../../../tools/keyboard_double_click_tool.php';
