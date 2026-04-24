<?php
$ma_labels = [
    'aria' => "Test d'accélération souris - détecte une accélération non linéaire du capteur ou de l'OS",
    'instruction' => "Enregistrez deux glissements de la MÊME distance physique : un lent (environ 2 s) et un rapide (moins de 0,5 s). Un capteur sans accélération rapporte les mêmes pixels. Un ratio au-dessus de 1,05 indique de l'accélération.",
    'step_slow' => 'Glissement lent', 'step_fast' => 'Glissement rapide',
    'hint_slow' => 'Étape 1 : maintenez et glissez lentement (environ 2 s).',
    'hint_fast' => 'Étape 2 : maintenez et glissez la MÊME distance rapidement (moins de 0,5 s).',
    'pixels' => 'Pixels', 'duration' => 'Durée', 'speed' => 'Vitesse (px/s)',
    'ratio' => 'Ratio pixels rapide/lent',
    'verdict_idle' => "Glissez lentement d'abord, puis rapidement.",
    'verdict_slow_done' => 'Glissement lent enregistré. À vous le rapide, même distance.',
    'verdict_perfect' => 'Pas d\'accélération — ratio à moins de 5% de 1,00 (parfait).',
    'verdict_minor' => 'Légère différence — probablement du bruit, pas une vraie accélération.',
    'verdict_accel' => "Accélération active ! Désactivez Améliorer la précision du pointeur sous Windows.",
    'verdict_decel' => 'Décélération — inhabituelle, vérifiez le lissage du driver.',
    'reset' => 'Réinitialiser',
    'reference' => 'Astuce : "Améliorer la précision du pointeur" sous Windows est la cause la plus commune. Désactivez-le dans Panneau de Configuration > Souris > Options du pointeur.',
];
include __DIR__ . '/../../../tools/mouse_accel_tool.php';
