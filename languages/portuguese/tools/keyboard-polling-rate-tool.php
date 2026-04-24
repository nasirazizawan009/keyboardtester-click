<?php
$kpr_labels = [
  'aria' => 'Teste de polling do teclado.',
  'instruction' => 'Mantenha qualquer tecla pressionada por 3+ segundos. Mede a taxa de auto-repeat do SO que aproxima o polling Hz.',
  'warning' => 'Nota: Eventos do navegador limitados pela taxa de auto-repeat do SO (~30/seg). O polling real e medido no firmware antes do SO.',
  'press_now' => 'Mantenha uma tecla',
  'samples' => 'Amostras', 'avg_interval' => 'Intervalo medio (ms)', 'rate' => 'Taxa estimada (Hz)', 'min_int' => 'Intervalo min (ms)',
  'reset' => 'Reiniciar',
];
include __DIR__ . '/../../../tools/keyboard_polling_rate_tool.php';
