<?php
$kdc_labels = [
    'aria_arena' => 'Detector de chatter del teclado.',
    'start' => 'Iniciar', 'stop' => 'Detener', 'reset' => 'Reiniciar',
    'threshold' => 'Umbral chatter',
    'status_idle' => 'Inactivo', 'status_listening' => 'Escuchando',
    'col_key' => 'Tecla', 'col_total' => 'Pulsaciones', 'col_chatter' => 'Eventos chatter', 'col_min_gap' => 'Min gap (ms)',
    'tip_listen' => 'Pulsa Iniciar, luego cada tecla UNA vez lentamente. Cualquier tecla que registre dos veces mostrara eventos chatter.',
    'no_chatter' => 'Sin chatter detectado. Sigue pulsando teclas.',
];
include __DIR__ . '/../../../tools/keyboard_double_click_tool.php';
