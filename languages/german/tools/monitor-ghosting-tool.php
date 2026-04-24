<?php
$mgh_labels = [
  'aria' => 'Monitor-Ghosting / Pixel-Reaktionszeit-Test.',
  'speed' => 'Geschwindigkeit (px/s)', 'box_color' => 'Box-Farbe', 'bg_color' => 'Hintergrund',
  'play' => 'Starten', 'pause' => 'Pause', 'fullscreen' => 'Vollbild',
  'instruction' => 'Beobachte die bewegte Box. Wenn du einen Schweif oder Farbverschmierung dahinter siehst, hat dein Monitor Ghosting.',
];
include __DIR__ . '/../../../tools/monitor_ghosting_tool.php';
