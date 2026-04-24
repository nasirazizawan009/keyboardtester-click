<?php
$kpr_labels = [
  'aria' => 'Test de polling del teclado.',
  'instruction' => 'Manten cualquier tecla presionada por 3+ segundos. Mide la tasa de auto-repeat del SO que aproxima el polling Hz.',
  'warning' => 'Nota: Eventos del navegador limitados por la tasa de auto-repeat del SO (~30/seg en Windows). El polling real se mide en el firmware antes del SO.',
  'press_now' => 'Manten una tecla',
  'samples' => 'Muestras', 'avg_interval' => 'Intervalo promedio (ms)', 'rate' => 'Tasa estimada (Hz)', 'min_int' => 'Intervalo min (ms)',
  'reset' => 'Reiniciar',
];
include __DIR__ . '/../../../tools/keyboard_polling_rate_tool.php';
