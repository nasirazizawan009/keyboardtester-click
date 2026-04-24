<?php
$md_labels = [
    'aria' => '마우스 드리프트 테스트 - 유휴 상태 커서 움직임 감지',
    'instruction' => '테스트 동안 손을 마우스에서 떼세요. 커서를 패드 안으로 한 번 이동한 뒤 시작을 누르고 손을 뗍니다.',
    'duration' => '시간',
    'dur_10' => '10초', 'dur_30' => '30초', 'dur_60' => '60초', 'dur_180' => '3분',
    'start' => '테스트 시작', 'stop' => '중지', 'reset' => '초기화',
    'pad_hint' => '패드 안에 커서를 두고 시작을 누른 뒤 타이머가 끝날 때까지 마우스를 만지지 마세요.',
    'running' => '실행 중 — 마우스 만지지 마세요', 'done' => '테스트 완료',
    'time_left' => '남은 시간',
    'total_drift' => '총 드리프트', 'max_delta' => '최대 점프', 'samples' => '이벤트 수',
    'verdict' => '판정',
    'verdict_perfect' => '완벽 — 드리프트 없음',
    'verdict_minor' => '경미 (5 px 미만) — 일반 노이즈',
    'verdict_warn' => '주의 — 센서 지터 가능성',
    'verdict_bad' => '심각 — 센서 불안정, 교체 권장',
    'verdict_idle' => '시작을 누르고 마우스를 만지지 마세요',
    'reference' => '팁: 레이저 센서는 광택 표면에서, 광학 센서는 유리·매우 어두운 표면에서 드리프트가 납니다. 좋은 게이밍 패드가 오탐을 줄입니다.',
];
include __DIR__ . '/../../../tools/mouse_drift_tool.php';
