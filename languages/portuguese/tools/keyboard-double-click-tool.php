<?php
$kdc_labels = [
    'aria_arena' => 'Detector de chatter do teclado.',
    'start' => 'Iniciar', 'stop' => 'Parar', 'reset' => 'Reiniciar',
    'threshold' => 'Limite chatter',
    'status_idle' => 'Inativo', 'status_listening' => 'Escutando',
    'col_key' => 'Tecla', 'col_total' => 'Pressoes', 'col_chatter' => 'Eventos chatter', 'col_min_gap' => 'Min gap (ms)',
    'tip_listen' => 'Pressione Iniciar entao cada tecla UMA vez devagar. Qualquer tecla que registre duas vezes mostrara eventos chatter.',
    'no_chatter' => 'Sem chatter detectado. Continue pressionando teclas.',
];
include __DIR__ . '/../../../tools/keyboard_double_click_tool.php';
