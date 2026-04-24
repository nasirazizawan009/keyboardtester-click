<?php
// French mouse accuracy tool - wraps the main tool with localized labels
$maa_labels = [
    'aria_arena' => 'Cliquez sur les cibles pour mesurer la precision de votre visee.',
    'start' => 'Demarrer',
    'stop' => 'Arreter',
    'reset' => 'Reinitialiser',
    'fullscreen' => 'Plein ecran',
    'duration' => 'Duree',
    'target_size' => 'Taille de la cible',
    'size_small' => 'Petit',
    'size_medium' => 'Moyen',
    'size_large' => 'Grand',
    'hits' => 'Touches',
    'misses' => 'Rates',
    'accuracy' => 'Precision',
    'avg_error' => 'Erreur moyenne',
    'avg_time' => 'Temps moyen',
    'best' => 'Meilleur',
    'score' => 'Score',
    'instruction' => 'Appuyez sur Demarrer. Cliquez sur chaque cible aussi vite et precisement que possible.',
    'time_left' => 'Temps restant',
    'complete' => 'Session terminee'
];
include __DIR__ . '/../../../tools/mouse_accuracy_tool.php';
