<?php
$kpr_labels = [
  'aria' => 'Test de polling du clavier.',
  'instruction' => 'Maintenez une touche pendant 3+ secondes. Mesure le taux d\'auto-repeat du SE qui approxime le polling Hz.',
  'warning' => 'Note: evenements navigateur limites par le taux d\'auto-repeat du SE (~30/sec). Le vrai polling se mesure dans le firmware avant le SE.',
  'press_now' => 'Maintenez une touche',
  'samples' => 'Echantillons', 'avg_interval' => 'Intervalle moyen (ms)', 'rate' => 'Taux estime (Hz)', 'min_int' => 'Intervalle min (ms)',
  'reset' => 'Reinitialiser',
];
include __DIR__ . '/../../../tools/keyboard_polling_rate_tool.php';
