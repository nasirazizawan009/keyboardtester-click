<?php
$md_labels = [
    'aria' => 'Teste de deriva do mouse - detecta movimento do cursor em repouso',
    'instruction' => 'Mantenha as mãos FORA do mouse durante o teste. Mova o cursor uma vez ao painel, clique em Iniciar e solte.',
    'duration' => 'Duração',
    'dur_10' => '10 segundos', 'dur_30' => '30 segundos', 'dur_60' => '60 segundos', 'dur_180' => '3 minutos',
    'start' => 'Iniciar teste', 'stop' => 'Parar', 'reset' => 'Reiniciar',
    'pad_hint' => 'Coloque o cursor no painel e clique em Iniciar. Não toque no mouse até o fim.',
    'running' => 'Em execução — não toque no mouse', 'done' => 'Teste concluído',
    'time_left' => 'Tempo restante',
    'total_drift' => 'Deriva total', 'max_delta' => 'Maior salto', 'samples' => 'Eventos',
    'verdict' => 'Veredito',
    'verdict_perfect' => 'Perfeito — sem deriva',
    'verdict_minor' => 'Leve (menos de 5 px) — ruído normal',
    'verdict_warn' => 'Notável — sensor pode estar trepidando',
    'verdict_bad' => 'Forte — sensor instável, considere trocar',
    'verdict_idle' => 'Clique em Iniciar e não toque no mouse',
    'reference' => 'Dica: sensores laser derivam em superfícies brilhantes. Ópticos odeiam vidro e preto profundo. Um mousepad gamer elimina a maioria dos falsos positivos.',
];
include __DIR__ . '/../../../tools/mouse_drift_tool.php';
