<?php
$ma_labels = [
    'aria' => 'Teste de aceleração do mouse - detecta aceleração não linear do sensor ou SO',
    'instruction' => 'Registre dois deslizes da MESMA distância física: um lento (cerca de 2 s) e um rápido (menos de 0,5 s). Sensor sem aceleração reporta os mesmos pixels. Razões acima de 1,05 indicam aceleração.',
    'step_slow' => 'Deslize lento', 'step_fast' => 'Deslize rápido',
    'hint_slow' => 'Passo 1: pressione e arraste devagar (cerca de 2 s).',
    'hint_fast' => 'Passo 2: pressione e arraste a MESMA distância rápido (menos de 0,5 s).',
    'pixels' => 'Pixels', 'duration' => 'Duração', 'speed' => 'Velocidade (px/s)',
    'ratio' => 'Razão pixels rápido/lento',
    'verdict_idle' => 'Primeiro devagar, depois rápido.',
    'verdict_slow_done' => 'Deslize lento registrado. Agora rápido, mesma distância.',
    'verdict_perfect' => 'Sem aceleração — razão dentro de 5% de 1,00 (perfeito).',
    'verdict_minor' => 'Leve diferença — provavelmente ruído, não aceleração real.',
    'verdict_accel' => 'Aceleração ativa! Desative "Aumentar precisão do ponteiro" no Windows.',
    'verdict_decel' => 'Desaceleração detectada — incomum, verifique o suavizador do driver.',
    'reset' => 'Reiniciar',
    'reference' => 'Dica: "Aumentar precisão do ponteiro" do Windows é a causa mais comum. Desative em Painel de Controle > Mouse > Opções do Ponteiro.',
];
include __DIR__ . '/../../../tools/mouse_accel_tool.php';
