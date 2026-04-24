<?php
$kpr_labels = [
  'aria' => 'Tastatur-Polling-Rate-Test.',
  'instruction' => 'Halte eine Taste 3+ Sekunden. Misst die Auto-Repeat-Rate des OS die das Polling-Hz approximiert.',
  'warning' => 'Hinweis: Browser-Tastenereignisse sind durch OS-Auto-Repeat-Einstellungen begrenzt (~30/s auf Windows). Wahres Polling wird im Firmware vor OS gemessen.',
  'press_now' => 'Halte eine Taste',
  'samples' => 'Proben', 'avg_interval' => 'Durchschn. Intervall (ms)', 'rate' => 'Geschaetzte Rate (Hz)', 'min_int' => 'Min Intervall (ms)',
  'reset' => 'Zuruecksetzen',
];
include __DIR__ . '/../../../tools/keyboard_polling_rate_tool.php';
