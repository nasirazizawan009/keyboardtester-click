<?php
$kpr_labels = [
  'aria' => '키보드 폴링 테스트.',
  'instruction' => '아무 키나 3초 이상 길게 누르세요. OS 자동 반복 레이트를 측정하여 폴링 Hz를 근사화.',
  'warning' => '참고: 브라우저 키 이벤트는 OS 자동 반복 설정에 의해 제한됩니다. 실제 폴링은 OS 이전 펌웨어에서 측정.',
  'press_now' => '키를 길게 누르세요',
  'samples' => '샘플', 'avg_interval' => '평균 간격 (ms)', 'rate' => '추정 레이트 (Hz)', 'min_int' => '최소 간격 (ms)',
  'reset' => '리셋',
];
include __DIR__ . '/../../../tools/keyboard_polling_rate_tool.php';
