<?php
$kdc_labels = [
    'aria_arena' => '키보드 채터링 감지기.',
    'start' => '시작', 'stop' => '중지', 'reset' => '리셋',
    'threshold' => '채터링 임계값',
    'status_idle' => '유휴', 'status_listening' => '듣는 중',
    'col_key' => '키', 'col_total' => '누름', 'col_chatter' => '채터링 이벤트', 'col_min_gap' => '최소 간격 (ms)',
    'tip_listen' => '시작을 누른 다음 각 키를 한 번씩 천천히 누르세요. 두 번 등록되는 키는 채터링 이벤트를 표시합니다.',
    'no_chatter' => '채터링 감지되지 않음. 계속 키를 누르세요.',
];
include __DIR__ . '/../../../tools/keyboard_double_click_tool.php';
