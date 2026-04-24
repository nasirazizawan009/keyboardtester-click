<?php
$kpr_labels = [
  'aria' => 'Тест polling клавиатуры.',
  'instruction' => 'Удерживайте любую клавишу 3+ секунд. Измеряет частоту auto-repeat ОС которая аппроксимирует polling Hz.',
  'warning' => 'Примечание: события клавиатуры в браузере ограничены настройками auto-repeat ОС. Реальный polling измеряется в firmware до ОС.',
  'press_now' => 'Удерживайте клавишу',
  'samples' => 'Выборки', 'avg_interval' => 'Средний интервал (мс)', 'rate' => 'Оценка частоты (Hz)', 'min_int' => 'Мин интервал (мс)',
  'reset' => 'Сброс',
];
include __DIR__ . '/../../../tools/keyboard_polling_rate_tool.php';
