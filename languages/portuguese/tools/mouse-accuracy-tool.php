<?php
// Portuguese mouse accuracy tool - wraps the main tool with localized labels
$maa_labels = [
    'aria_arena' => 'Clique nos alvos para medir a precisao da sua mira.',
    'start' => 'Iniciar',
    'stop' => 'Parar',
    'reset' => 'Reiniciar',
    'fullscreen' => 'Tela cheia',
    'duration' => 'Duracao',
    'target_size' => 'Tamanho do alvo',
    'size_small' => 'Pequeno',
    'size_medium' => 'Medio',
    'size_large' => 'Grande',
    'hits' => 'Acertos',
    'misses' => 'Erros',
    'accuracy' => 'Precisao',
    'avg_error' => 'Erro medio',
    'avg_time' => 'Tempo medio',
    'best' => 'Melhor',
    'score' => 'Pontuacao',
    'instruction' => 'Pressione Iniciar. Clique em cada alvo o mais rapido e preciso possivel.',
    'time_left' => 'Tempo restante',
    'complete' => 'Sessao concluida'
];
include __DIR__ . '/../../../tools/mouse_accuracy_tool.php';
