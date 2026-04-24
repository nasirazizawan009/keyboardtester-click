<?php
$mdc_labels = $mdc_labels ?? [];
$L = array_merge([
  // Shared
  'aria' => 'Mouse DPI calculator and sensitivity converter',
  'tab_measure' => 'Measure True DPI',
  'tab_convert' => 'Convert Sensitivity',
  // Measure tab
  'instruction' => 'Drag inside the pad with your mouse, then enter the exact physical distance you moved. Or switch to manual mode and type pixel and inch values directly.',
  'mode_drag' => 'Drag to measure',
  'mode_manual' => 'Manual entry',
  'pad_hint' => 'Press and hold inside this pad. Move your mouse a fixed physical distance (use a ruler), then release.',
  'pixels' => 'Pixels moved',
  'phys_distance' => 'Physical distance',
  'unit_cm' => 'cm',
  'unit_in' => 'inches',
  'advertised' => 'Advertised DPI (optional)',
  'dpi_result' => 'True DPI',
  'accuracy' => 'Sensor accuracy',
  'reset' => 'Reset',
  'reference' => 'Tip: the more inches you swipe, the smaller the measurement error. Aim for 4-8 inches of real movement.',
  'press_to_start' => 'Release mouse inside the pad to lock the pixel count.',
  'no_drag' => 'No drag recorded yet',
  // Convert tab
  'conv_intro' => 'Keep your aim feeling identical when you change DPI. Enter your current DPI and sensitivity, pick the new DPI, and see the converted sensitivity instantly.',
  'current_dpi' => 'Current DPI',
  'quick_presets' => 'Quick DPI presets',
  'sens_type' => 'Sensitivity type',
  'sens_ingame' => 'In-Game',
  'sens_edpi' => 'eDPI',
  'current_sens' => 'Current sensitivity',
  'new_dpi' => 'New DPI',
  'game_label' => 'Game (optional — for 360° distance + recommended eDPI)',
  'game_none' => 'None',
  'game_search' => 'Search games...',
  'result_title' => 'Conversion result',
  'new_sens_label' => 'New sensitivity',
  'edpi_preserved' => 'eDPI preserved',
  'analysis_title' => 'Analysis & tips',
  'rec_edpi' => 'Recommended eDPI',
  'rec_range' => 'pro range',
  'your_edpi' => 'Your eDPI',
  'vs_recommended' => 'vs recommended',
  'dpi_change_impact' => 'DPI change impact',
  'dpi_change_desc' => 'Higher DPI = more pixels per inch of movement. Converting sensitivity cancels this out in-game — your crosshair travels the same distance per physical cm. A higher DPI still benefits you on high-refresh monitors and sub-pixel precision.',
  'movement_title' => 'Mouse movement info',
  'movement_desc' => 'Centimetres of mousepad needed for a full 360° in-game turn.',
  'cm_per_360' => 'cm per 360°',
  'in_per_360' => 'inches per 360°',
  'pick_game_hint' => 'Pick a game above to see cm / 360° and recommended eDPI.',
  'history_title' => 'Conversion history',
  'history_empty' => 'Your recent conversions will appear here (saved locally on this device).',
  'history_clear' => 'Clear history',
  'history_copy' => 'Copy',
  'history_apply' => 'Apply',
  'history_delete' => 'Remove',
  'reference_title' => 'Quick conversion reference',
  'reference_desc' => 'Every combination below keeps the same eDPI — move at exactly the same speed in-game.',
  'table_dpi' => 'DPI',
  'table_sens' => 'Sensitivity',
  'cta_save' => 'Save this conversion',
], $mdc_labels);
?>
<div class="mdc-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">

  <div class="mdc-tabs" role="tablist" aria-label="Tool modes">
    <button type="button" class="mdc-tab active" data-mdctab="measure" role="tab" aria-selected="true" aria-controls="mdc-panel-measure"><?php echo htmlspecialchars($L['tab_measure'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" class="mdc-tab" data-mdctab="convert" role="tab" aria-selected="false" aria-controls="mdc-panel-convert"><?php echo htmlspecialchars($L['tab_convert'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>

  <!-- =================== MEASURE TAB =================== -->
  <div class="mdc-panel is-active" id="mdc-panel-measure" role="tabpanel" data-mdctab-panel="measure">
    <div class="mdc-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

    <div class="mdc-mode-toggle" role="tablist">
      <button type="button" class="mdc-mode-btn active" data-mode="drag" role="tab" aria-selected="true"><?php echo htmlspecialchars($L['mode_drag'], ENT_QUOTES, 'UTF-8'); ?></button>
      <button type="button" class="mdc-mode-btn" data-mode="manual" role="tab" aria-selected="false"><?php echo htmlspecialchars($L['mode_manual'], ENT_QUOTES, 'UTF-8'); ?></button>
    </div>

    <div class="mdc-pad-wrap" data-mdc-mode="drag">
      <div id="mdc-pad" class="mdc-pad" aria-label="<?php echo htmlspecialchars($L['pad_hint'], ENT_QUOTES, 'UTF-8'); ?>">
        <div class="mdc-pad-hint"><?php echo htmlspecialchars($L['pad_hint'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="mdc-pad-pixels"><span id="mdc-pixel-count">0</span> px</div>
      </div>
      <div class="mdc-pad-status" id="mdc-pad-status"><?php echo htmlspecialchars($L['no_drag'], ENT_QUOTES, 'UTF-8'); ?></div>
    </div>

    <div class="mdc-form">
      <div class="mdc-field" data-mdc-manualonly>
        <label for="mdc-pixels"><?php echo htmlspecialchars($L['pixels'], ENT_QUOTES, 'UTF-8'); ?></label>
        <input type="number" id="mdc-pixels" min="1" max="100000" step="1" value="800">
      </div>
      <div class="mdc-field">
        <label for="mdc-dist"><?php echo htmlspecialchars($L['phys_distance'], ENT_QUOTES, 'UTF-8'); ?></label>
        <div class="mdc-dist-row">
          <input type="number" id="mdc-dist" min="0.1" max="500" step="0.1" value="2.54">
          <select id="mdc-unit">
            <option value="cm"><?php echo htmlspecialchars($L['unit_cm'], ENT_QUOTES, 'UTF-8'); ?></option>
            <option value="in" selected><?php echo htmlspecialchars($L['unit_in'], ENT_QUOTES, 'UTF-8'); ?></option>
          </select>
        </div>
      </div>
      <div class="mdc-field">
        <label for="mdc-advertised"><?php echo htmlspecialchars($L['advertised'], ENT_QUOTES, 'UTF-8'); ?></label>
        <input type="number" id="mdc-advertised" min="100" max="32000" step="50" placeholder="800">
      </div>
    </div>

    <div class="mdc-result">
      <div class="mdc-label"><?php echo htmlspecialchars($L['dpi_result'], ENT_QUOTES, 'UTF-8'); ?></div>
      <div class="mdc-value" id="mdc-dpi">800</div>
      <div class="mdc-accuracy"><?php echo htmlspecialchars($L['accuracy'], ENT_QUOTES, 'UTF-8'); ?>: <span id="mdc-accuracy">-</span></div>
    </div>

    <div class="mdc-actions">
      <button type="button" id="mdc-reset" class="mdc-btn-ghost"><?php echo htmlspecialchars($L['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
    </div>
    <div class="mdc-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
  </div>

  <!-- =================== CONVERT TAB =================== -->
  <div class="mdc-panel" id="mdc-panel-convert" role="tabpanel" data-mdctab-panel="convert" hidden>
    <div class="mdc-tip"><?php echo htmlspecialchars($L['conv_intro'], ENT_QUOTES, 'UTF-8'); ?></div>

    <div class="msc-grid">
      <!-- Current DPI + presets -->
      <div class="msc-field">
        <label for="msc-curdpi"><?php echo htmlspecialchars($L['current_dpi'], ENT_QUOTES, 'UTF-8'); ?></label>
        <input type="number" id="msc-curdpi" min="50" max="50000" step="50" value="800">
      </div>
      <!-- Sensitivity type toggle -->
      <div class="msc-field">
        <label><?php echo htmlspecialchars($L['sens_type'], ENT_QUOTES, 'UTF-8'); ?></label>
        <div class="msc-seg" role="tablist">
          <button type="button" class="msc-seg-btn active" data-senstype="ingame" role="tab" aria-selected="true"><?php echo htmlspecialchars($L['sens_ingame'], ENT_QUOTES, 'UTF-8'); ?></button>
          <button type="button" class="msc-seg-btn" data-senstype="edpi" role="tab" aria-selected="false"><?php echo htmlspecialchars($L['sens_edpi'], ENT_QUOTES, 'UTF-8'); ?></button>
        </div>
      </div>
      <!-- Current sensitivity -->
      <div class="msc-field">
        <label for="msc-cursens"><?php echo htmlspecialchars($L['current_sens'], ENT_QUOTES, 'UTF-8'); ?></label>
        <input type="number" id="msc-cursens" min="0.001" max="50000" step="0.01" value="1.5">
      </div>
      <!-- New DPI -->
      <div class="msc-field">
        <label for="msc-newdpi"><?php echo htmlspecialchars($L['new_dpi'], ENT_QUOTES, 'UTF-8'); ?></label>
        <input type="number" id="msc-newdpi" min="50" max="50000" step="50" value="1600">
      </div>

      <!-- Quick DPI presets (row spans both columns) -->
      <div class="msc-field msc-presets-row">
        <label><?php echo htmlspecialchars($L['quick_presets'], ENT_QUOTES, 'UTF-8'); ?></label>
        <div class="msc-presets">
          <button type="button" class="msc-preset" data-preset="400">400</button>
          <button type="button" class="msc-preset" data-preset="800">800</button>
          <button type="button" class="msc-preset" data-preset="1600">1600</button>
          <button type="button" class="msc-preset" data-preset="3200">3200</button>
          <button type="button" class="msc-preset" data-preset="6400">6400</button>
        </div>
      </div>

      <!-- Game selector -->
      <div class="msc-field msc-game-row">
        <label for="msc-game"><?php echo htmlspecialchars($L['game_label'], ENT_QUOTES, 'UTF-8'); ?></label>
        <div class="msc-game-wrap">
          <input type="text" id="msc-game-search" placeholder="<?php echo htmlspecialchars($L['game_search'], ENT_QUOTES, 'UTF-8'); ?>" autocomplete="off">
          <select id="msc-game">
            <option value=""><?php echo htmlspecialchars($L['game_none'], ENT_QUOTES, 'UTF-8'); ?></option>
          </select>
        </div>
      </div>
    </div>

    <!-- Result card -->
    <div class="msc-result">
      <div class="mdc-label"><?php echo htmlspecialchars($L['new_sens_label'], ENT_QUOTES, 'UTF-8'); ?></div>
      <div class="mdc-value" id="msc-newsens">0.75</div>
      <div class="msc-edpi-line"><?php echo htmlspecialchars($L['edpi_preserved'], ENT_QUOTES, 'UTF-8'); ?>: <strong><span id="msc-edpi-old">1200</span></strong> → <strong><span id="msc-edpi-new">1200</span></strong></div>
      <button type="button" id="msc-save" class="msc-btn-save"><?php echo htmlspecialchars($L['cta_save'], ENT_QUOTES, 'UTF-8'); ?></button>
    </div>

    <!-- Analysis -->
    <div class="msc-analysis">
      <h3 class="msc-h3"><?php echo htmlspecialchars($L['analysis_title'], ENT_QUOTES, 'UTF-8'); ?></h3>
      <div class="msc-analysis-grid">
        <div class="msc-card msc-card-rec" id="msc-rec-card" hidden>
          <div class="msc-card-title"><?php echo htmlspecialchars($L['rec_edpi'], ENT_QUOTES, 'UTF-8'); ?> <span id="msc-rec-game"></span></div>
          <div class="msc-card-value" id="msc-rec-edpi">—</div>
          <div class="msc-card-sub"><?php echo htmlspecialchars($L['rec_range'], ENT_QUOTES, 'UTF-8'); ?>: <span id="msc-rec-range">—</span></div>
          <div class="msc-card-meter"><div class="msc-card-meter-bar" id="msc-rec-bar"></div></div>
          <div class="msc-card-sub"><?php echo htmlspecialchars($L['your_edpi'], ENT_QUOTES, 'UTF-8'); ?>: <strong id="msc-your-edpi">—</strong> (<span id="msc-edpi-delta">—</span> <?php echo htmlspecialchars($L['vs_recommended'], ENT_QUOTES, 'UTF-8'); ?>)</div>
        </div>
        <div class="msc-card">
          <div class="msc-card-title"><?php echo htmlspecialchars($L['dpi_change_impact'], ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="msc-card-value" id="msc-dpi-delta">+100%</div>
          <div class="msc-card-sub"><?php echo htmlspecialchars($L['dpi_change_desc'], ENT_QUOTES, 'UTF-8'); ?></div>
        </div>
        <div class="msc-card" id="msc-move-card">
          <div class="msc-card-title"><?php echo htmlspecialchars($L['movement_title'], ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="msc-card-sub"><?php echo htmlspecialchars($L['movement_desc'], ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="msc-move-rows">
            <div class="msc-move-row"><span class="msc-move-label"><?php echo htmlspecialchars($L['cm_per_360'], ENT_QUOTES, 'UTF-8'); ?></span><span class="msc-move-val" id="msc-cm360">—</span></div>
            <div class="msc-move-row"><span class="msc-move-label"><?php echo htmlspecialchars($L['in_per_360'], ENT_QUOTES, 'UTF-8'); ?></span><span class="msc-move-val" id="msc-in360">—</span></div>
          </div>
          <div class="msc-card-sub msc-game-hint" id="msc-move-hint"><?php echo htmlspecialchars($L['pick_game_hint'], ENT_QUOTES, 'UTF-8'); ?></div>
        </div>
      </div>
    </div>

    <!-- History -->
    <div class="msc-history">
      <div class="msc-history-head">
        <h3 class="msc-h3"><?php echo htmlspecialchars($L['history_title'], ENT_QUOTES, 'UTF-8'); ?></h3>
        <button type="button" id="msc-history-clear" class="mdc-btn-ghost"><?php echo htmlspecialchars($L['history_clear'], ENT_QUOTES, 'UTF-8'); ?></button>
      </div>
      <div id="msc-history-list" class="msc-history-list">
        <div class="msc-history-empty"><?php echo htmlspecialchars($L['history_empty'], ENT_QUOTES, 'UTF-8'); ?></div>
      </div>
    </div>

    <!-- Quick reference table -->
    <div class="msc-reference">
      <h3 class="msc-h3"><?php echo htmlspecialchars($L['reference_title'], ENT_QUOTES, 'UTF-8'); ?></h3>
      <p class="msc-ref-desc"><?php echo htmlspecialchars($L['reference_desc'], ENT_QUOTES, 'UTF-8'); ?></p>
      <table class="msc-ref-table">
        <thead><tr><th><?php echo htmlspecialchars($L['table_dpi'], ENT_QUOTES, 'UTF-8'); ?></th><th><?php echo htmlspecialchars($L['table_sens'], ENT_QUOTES, 'UTF-8'); ?></th></tr></thead>
        <tbody id="msc-ref-tbody"></tbody>
      </table>
    </div>
  </div>

</div>
<style>
  .mdc-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .mdc-tester *{ box-sizing:border-box; }
  .mdc-tabs { display:flex; gap:6px; background:#f1f5f9; padding:6px; border-radius:12px; width:fit-content; margin:0 auto; }
  .mdc-tab { padding:10px 22px; border:none; border-radius:8px; background:transparent; font:inherit; font-weight:700; color:#475569; cursor:pointer; font-size:0.95rem; letter-spacing:0.01em; }
  .mdc-tab.active { background:#fff; color:#0f172a; box-shadow:0 2px 6px rgba(15,23,42,0.12); }
  .mdc-panel { display:none; flex-direction:column; gap:14px; }
  .mdc-panel.is-active { display:flex; }
  .mdc-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .mdc-mode-toggle { display:flex; gap:6px; background:#f1f5f9; padding:4px; border-radius:10px; width:fit-content; }
  .mdc-mode-btn { padding:8px 18px; border:none; border-radius:7px; background:transparent; font:inherit; font-weight:600; color:#475569; cursor:pointer; }
  .mdc-mode-btn.active { background:#fff; color:#0f172a; box-shadow:0 1px 3px rgba(0,0,0,0.08); }
  .mdc-pad-wrap { display:flex; flex-direction:column; gap:8px; }
  .mdc-pad { position:relative; height:240px; background:linear-gradient(135deg,#1e293b 0%,#334155 100%); border-radius:12px; cursor:crosshair; overflow:hidden; touch-action:none; user-select:none; display:flex; align-items:center; justify-content:center; color:#cbd5e1; }
  .mdc-pad.is-tracking { background:linear-gradient(135deg,#16a34a 0%,#22c55e 100%); color:#fff; }
  .mdc-pad-hint { padding:0 24px; text-align:center; font-size:0.95rem; max-width:520px; }
  .mdc-pad-pixels { position:absolute; top:10px; right:14px; background:rgba(0,0,0,0.45); color:#fff; padding:6px 12px; border-radius:6px; font-variant-numeric:tabular-nums; font-weight:700; font-size:1rem; }
  .mdc-pad-status { font-size:0.85rem; color:#64748b; text-align:center; }
  .mdc-form { display:grid; grid-template-columns:repeat(3,1fr); gap:14px; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  @media (max-width:720px) { .mdc-form { grid-template-columns:1fr; } .mdc-pad { height:200px; } }
  .mdc-field { display:flex; flex-direction:column; gap:6px; }
  .mdc-field label { font-size:0.84rem; font-weight:600; color:var(--text-color,#0f172a); }
  .mdc-field input, .mdc-field select { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:1rem; font-variant-numeric:tabular-nums; }
  .mdc-dist-row { display:flex; gap:8px; }
  .mdc-dist-row input { flex:1; min-width:0; }
  .mdc-dist-row select { width:95px; }
  .mdc-result { background:var(--surface,#0f172a); padding:30px; border-radius:12px; text-align:center; color:#fff; }
  .mdc-label { font-size:0.84rem; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8; margin-bottom:6px; }
  .mdc-value { font-size:4rem; font-weight:800; color:#22c55e; font-variant-numeric:tabular-nums; line-height:1; }
  .mdc-accuracy { font-size:1.05rem; color:#cbd5e1; margin-top:14px; }
  .mdc-actions { display:flex; justify-content:flex-end; }
  .mdc-btn-ghost { padding:8px 16px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); border-radius:8px; font:inherit; cursor:pointer; }
  .mdc-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
  [data-mdc-mode="manual"] .mdc-pad, [data-mdc-mode="manual"] .mdc-pad-status { display:none; }
  [data-mdc-mode="drag"] [data-mdc-manualonly] { display:none; }

  /* ---------- Convert tab ---------- */
  .msc-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:14px; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  @media (max-width:720px) { .msc-grid { grid-template-columns:1fr; } }
  .msc-field { display:flex; flex-direction:column; gap:6px; }
  .msc-field label { font-size:0.84rem; font-weight:600; color:var(--text-color,#0f172a); }
  .msc-field input, .msc-field select { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:1rem; font-variant-numeric:tabular-nums; }
  .msc-presets-row, .msc-game-row { grid-column:1 / -1; }
  .msc-presets { display:flex; gap:8px; flex-wrap:wrap; }
  .msc-preset { padding:8px 16px; border-radius:8px; border:1px solid #cbd5e1; background:#f8fafc; font:inherit; font-weight:700; color:#334155; cursor:pointer; font-variant-numeric:tabular-nums; transition:background 0.12s, color 0.12s, border-color 0.12s; }
  .msc-preset:hover { border-color:#8b5cf6; }
  .msc-preset.active { background:#8b5cf6; border-color:#8b5cf6; color:#fff; }
  .msc-seg { display:inline-flex; gap:4px; background:#f1f5f9; padding:4px; border-radius:10px; width:fit-content; }
  .msc-seg-btn { padding:8px 14px; border:none; border-radius:7px; background:transparent; font:inherit; font-weight:600; color:#475569; cursor:pointer; font-size:0.88rem; }
  .msc-seg-btn.active { background:#fff; color:#0f172a; box-shadow:0 1px 3px rgba(0,0,0,0.08); }
  .msc-game-wrap { display:flex; flex-direction:column; gap:6px; }
  .msc-result { background:linear-gradient(135deg,#0f172a 0%,#1e293b 100%); padding:26px 30px; border-radius:12px; text-align:center; color:#fff; position:relative; }
  .msc-result .mdc-value { color:#a78bfa; }
  .msc-edpi-line { margin-top:10px; font-size:0.95rem; color:#cbd5e1; }
  .msc-edpi-line strong { color:#fff; }
  .msc-btn-save { margin-top:14px; padding:10px 22px; border:none; border-radius:8px; background:#8b5cf6; color:#fff; font:inherit; font-weight:700; cursor:pointer; }
  .msc-btn-save:hover { background:#7c3aed; }
  .msc-btn-save.saved { background:#16a34a; }
  .msc-analysis { display:flex; flex-direction:column; gap:10px; }
  .msc-h3 { margin:0; font-size:1.05rem; font-weight:700; color:var(--text-color,#0f172a); }
  .msc-analysis-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; }
  @media (max-width:820px) { .msc-analysis-grid { grid-template-columns:1fr; } }
  .msc-card { background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; padding:16px; display:flex; flex-direction:column; gap:8px; }
  .msc-card-title { font-size:0.84rem; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:#64748b; }
  .msc-card-value { font-size:1.9rem; font-weight:800; color:#8b5cf6; font-variant-numeric:tabular-nums; }
  .msc-card-sub { font-size:0.85rem; color:#475569; line-height:1.5; }
  .msc-card-meter { height:8px; background:#e2e8f0; border-radius:999px; overflow:hidden; position:relative; }
  .msc-card-meter-bar { height:100%; background:linear-gradient(90deg,#8b5cf6,#a78bfa); transition:width 0.25s ease; }
  .msc-move-rows { display:flex; flex-direction:column; gap:4px; }
  .msc-move-row { display:flex; justify-content:space-between; font-variant-numeric:tabular-nums; }
  .msc-move-label { color:#64748b; font-size:0.88rem; }
  .msc-move-val { font-weight:700; color:#0f172a; }
  .msc-history { padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  .msc-history-head { display:flex; justify-content:space-between; align-items:center; margin-bottom:10px; gap:10px; }
  .msc-history-list { display:flex; flex-direction:column; gap:6px; max-height:260px; overflow:auto; }
  .msc-history-empty { padding:18px 10px; text-align:center; color:#94a3b8; font-size:0.88rem; }
  .msc-history-row { display:grid; grid-template-columns:1fr auto auto auto; gap:8px; align-items:center; padding:8px 10px; border:1px solid #e2e8f0; border-radius:8px; background:#f8fafc; font-size:0.9rem; }
  .msc-history-row .msc-history-conv { font-variant-numeric:tabular-nums; }
  .msc-history-row button { padding:5px 10px; border:1px solid #cbd5e1; background:#fff; border-radius:6px; font:inherit; font-size:0.82rem; cursor:pointer; }
  .msc-history-row button:hover { border-color:#8b5cf6; color:#8b5cf6; }
  .msc-reference { padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  .msc-ref-desc { margin:4px 0 12px; font-size:0.88rem; color:#475569; }
  .msc-ref-table { width:100%; border-collapse:collapse; font-variant-numeric:tabular-nums; }
  .msc-ref-table th, .msc-ref-table td { padding:8px 12px; text-align:left; font-size:0.92rem; }
  .msc-ref-table thead { background:#f1f5f9; }
  .msc-ref-table tbody tr { border-top:1px solid #e2e8f0; }
  .msc-ref-table tbody tr.is-current { background:#ede9fe; font-weight:700; }
  html.dark-theme .mdc-tabs, [data-theme="dark"] .mdc-tabs { background:#1e293b; }
  html.dark-theme .mdc-tab.active, [data-theme="dark"] .mdc-tab.active { background:#334155; color:#f1f5f9; }
  html.dark-theme .mdc-tip, [data-theme="dark"] .mdc-tip { background:#0c1f33; border-color:#1e3a5f; color:#e0f2fe; }
  html.dark-theme .mdc-form, [data-theme="dark"] .mdc-form, html.dark-theme .msc-grid, [data-theme="dark"] .msc-grid, html.dark-theme .msc-card, [data-theme="dark"] .msc-card, html.dark-theme .msc-history, [data-theme="dark"] .msc-history, html.dark-theme .msc-reference, [data-theme="dark"] .msc-reference { background:#1e293b; border-color:#334155; }
  html.dark-theme .mdc-field input, html.dark-theme .mdc-field select, html.dark-theme .msc-field input, html.dark-theme .msc-field select, [data-theme="dark"] .mdc-field input, [data-theme="dark"] .mdc-field select, [data-theme="dark"] .msc-field input, [data-theme="dark"] .msc-field select { background:#0f172a; color:#f1f5f9; border-color:#475569; }
  html.dark-theme .msc-preset, [data-theme="dark"] .msc-preset { background:#0f172a; border-color:#475569; color:#cbd5e1; }
  html.dark-theme .msc-ref-table thead, [data-theme="dark"] .msc-ref-table thead { background:#0f172a; }
  html.dark-theme .msc-ref-table tbody tr, [data-theme="dark"] .msc-ref-table tbody tr { border-color:#334155; }
  html.dark-theme .msc-ref-table tbody tr.is-current, [data-theme="dark"] .msc-ref-table tbody tr.is-current { background:#3f2b6e; }
  html.dark-theme .msc-history-row, [data-theme="dark"] .msc-history-row { background:#0f172a; border-color:#334155; }
  html.dark-theme .msc-history-row button, [data-theme="dark"] .msc-history-row button { background:#1e293b; border-color:#475569; color:#e2e8f0; }
  html.dark-theme .mdc-btn-ghost, [data-theme="dark"] .mdc-btn-ghost { background:#1e293b; border-color:#475569; color:#e2e8f0; }
  html.dark-theme .mdc-note, [data-theme="dark"] .mdc-note { background:#052e1a; border-color:#14532d; color:#bbf7d0; }
  html.dark-theme .msc-move-val, [data-theme="dark"] .msc-move-val { color:#f1f5f9; }
  html.dark-theme .msc-card-sub, [data-theme="dark"] .msc-card-sub { color:#cbd5e1; }
</style>
<script>
(function(){
  // ---------- Tab switching ----------
  var tabs = document.querySelectorAll('.mdc-tab');
  var panels = document.querySelectorAll('.mdc-panel');
  function activateTab(name){
    tabs.forEach(function(t){
      var active = t.getAttribute('data-mdctab') === name;
      t.classList.toggle('active', active);
      t.setAttribute('aria-selected', active ? 'true' : 'false');
    });
    panels.forEach(function(p){
      var match = p.getAttribute('data-mdctab-panel') === name;
      p.classList.toggle('is-active', match);
      if (match) p.removeAttribute('hidden'); else p.setAttribute('hidden', '');
    });
    try { localStorage.setItem('mdc-tab', name); } catch (e) {}
  }
  tabs.forEach(function(t){ t.addEventListener('click', function(){ activateTab(t.getAttribute('data-mdctab')); }); });
  try {
    var saved = localStorage.getItem('mdc-tab');
    if (saved === 'convert' || saved === 'measure') activateTab(saved);
  } catch (e) {}

  // ---------- MEASURE tab ----------
  var pad = document.getElementById('mdc-pad');
  var padStatus = document.getElementById('mdc-pad-status');
  var pxCount = document.getElementById('mdc-pixel-count');
  var pxInput = document.getElementById('mdc-pixels');
  var distInput = document.getElementById('mdc-dist');
  var unitSel = document.getElementById('mdc-unit');
  var advInput = document.getElementById('mdc-advertised');
  var dpiOut = document.getElementById('mdc-dpi');
  var accOut = document.getElementById('mdc-accuracy');
  var padWrap = document.querySelector('.mdc-pad-wrap');
  var modeBtns = document.querySelectorAll('.mdc-mode-btn');
  var mode = 'drag';
  var tracking = false, startX = 0, startY = 0, lastX = 0, lastY = 0, totalPx = 0;

  var LABELS = {
    release: <?php echo json_encode($L['press_to_start']); ?>,
    noDrag: <?php echo json_encode($L['no_drag']); ?>
  };

  function setMode(next){
    mode = next;
    padWrap.setAttribute('data-mdc-mode', next);
    modeBtns.forEach(function(b){
      var active = b.getAttribute('data-mode') === next;
      b.classList.toggle('active', active);
      b.setAttribute('aria-selected', active ? 'true' : 'false');
    });
    calcDpi();
  }
  modeBtns.forEach(function(b){ b.addEventListener('click', function(){ setMode(b.getAttribute('data-mode')); }); });

  function resetDrag(){
    totalPx = 0; tracking = false;
    pxCount.textContent = '0';
    pad.classList.remove('is-tracking');
    padStatus.textContent = LABELS.noDrag;
  }

  pad.addEventListener('pointerdown', function(e){
    pad.setPointerCapture(e.pointerId);
    tracking = true; totalPx = 0;
    startX = lastX = e.clientX; startY = lastY = e.clientY;
    pxCount.textContent = '0';
    pad.classList.add('is-tracking');
    padStatus.textContent = LABELS.release;
  });
  pad.addEventListener('pointermove', function(e){
    if (!tracking) return;
    var dx = e.clientX - lastX, dy = e.clientY - lastY;
    totalPx += Math.sqrt(dx*dx + dy*dy);
    lastX = e.clientX; lastY = e.clientY;
    pxCount.textContent = Math.round(totalPx);
  });
  function endDrag(e){
    if (!tracking) return;
    tracking = false;
    pad.classList.remove('is-tracking');
    pxCount.textContent = Math.round(totalPx);
    pxInput.value = Math.round(totalPx);
    padStatus.textContent = Math.round(totalPx) + ' px';
    calcDpi();
  }
  pad.addEventListener('pointerup', endDrag);
  pad.addEventListener('lostpointercapture', endDrag);
  pad.addEventListener('pointercancel', endDrag);

  function calcDpi(){
    var px = parseFloat(pxInput.value) || 0;
    if (mode === 'drag' && totalPx > 0) px = totalPx;
    var dist = parseFloat(distInput.value) || 0;
    var inches = unitSel.value === 'cm' ? dist / 2.54 : dist;
    if (px <= 0 || inches <= 0) { dpiOut.textContent = '-'; accOut.textContent = '-'; return; }
    var dpi = Math.round(px / inches);
    dpiOut.textContent = dpi;
    var adv = parseFloat(advInput.value);
    if (adv && adv > 0){
      var pct = ((dpi - adv) / adv) * 100;
      var sign = pct >= 0 ? '+' : '';
      accOut.textContent = sign + pct.toFixed(1) + '% vs ' + adv;
    } else accOut.textContent = '-';
  }
  [pxInput, distInput, unitSel, advInput].forEach(function(el){ el.addEventListener('input', calcDpi); el.addEventListener('change', calcDpi); });

  document.getElementById('mdc-reset').addEventListener('click', function(){
    resetDrag();
    pxInput.value = 800; distInput.value = 2.54; unitSel.value = 'in'; advInput.value = '';
    calcDpi();
  });

  calcDpi();

  // ---------- CONVERT tab ----------
  // Game data: yaw (degrees per count) × recommended eDPI range (pro players avg)
  var GAMES = [
    { id:'valorant', name:'Valorant',          yaw:0.07,    edpi:[200, 280, 400] },
    { id:'cs2',      name:'Counter-Strike 2',  yaw:0.022,   edpi:[600, 800, 1200] },
    { id:'csgo',     name:'CS:GO',             yaw:0.022,   edpi:[600, 800, 1200] },
    { id:'apex',     name:'Apex Legends',      yaw:0.022,   edpi:[1200, 1600, 2400] },
    { id:'fortnite', name:'Fortnite',          yaw:0.5555,  edpi:[400, 600, 900] },
    { id:'overwatch',name:'Overwatch 2',       yaw:0.0066,  edpi:[3200, 4800, 6400] },
    { id:'pubg',     name:'PUBG',              yaw:0.017,   edpi:[500, 800, 1200] },
    { id:'r6',       name:'Rainbow Six Siege', yaw:0.02,    edpi:[800, 1000, 1400] },
    { id:'warzone',  name:'Call of Duty / Warzone', yaw:0.0066, edpi:[3200, 4800, 6400] },
    { id:'quake',    name:'Quake Champions',   yaw:0.022,   edpi:[1200, 1600, 2400] }
  ];

  var curDpiIn = document.getElementById('msc-curdpi');
  var curSensIn = document.getElementById('msc-cursens');
  var newDpiIn = document.getElementById('msc-newdpi');
  var gameSel = document.getElementById('msc-game');
  var gameSearch = document.getElementById('msc-game-search');
  var presetBtns = document.querySelectorAll('.msc-preset');
  var segBtns = document.querySelectorAll('.msc-seg-btn');
  var newSensOut = document.getElementById('msc-newsens');
  var edpiOldOut = document.getElementById('msc-edpi-old');
  var edpiNewOut = document.getElementById('msc-edpi-new');
  var dpiDeltaOut = document.getElementById('msc-dpi-delta');
  var recCard = document.getElementById('msc-rec-card');
  var recGameOut = document.getElementById('msc-rec-game');
  var recEdpiOut = document.getElementById('msc-rec-edpi');
  var recRangeOut = document.getElementById('msc-rec-range');
  var recBar = document.getElementById('msc-rec-bar');
  var yourEdpiOut = document.getElementById('msc-your-edpi');
  var edpiDeltaOut = document.getElementById('msc-edpi-delta');
  var moveCard = document.getElementById('msc-move-card');
  var cm360Out = document.getElementById('msc-cm360');
  var in360Out = document.getElementById('msc-in360');
  var moveHint = document.getElementById('msc-move-hint');
  var refTbody = document.getElementById('msc-ref-tbody');
  var saveBtn = document.getElementById('msc-save');

  var sensType = 'ingame';

  // Populate game select
  GAMES.forEach(function(g){
    var opt = document.createElement('option');
    opt.value = g.id; opt.textContent = g.name;
    gameSel.appendChild(opt);
  });

  function getGame(){ return GAMES.filter(function(g){ return g.id === gameSel.value; })[0] || null; }

  function sensToEdpi(sens, dpi){ return sens * dpi; }
  function edpiToSens(edpi, dpi){ return dpi > 0 ? edpi / dpi : 0; }

  function fmt(n, decimals){
    if (!isFinite(n)) return '—';
    var d = decimals == null ? 2 : decimals;
    return Number(n).toFixed(d).replace(/\.?0+$/, '') || '0';
  }

  function calcConvert(){
    var curDpi = parseFloat(curDpiIn.value) || 0;
    var curVal = parseFloat(curSensIn.value) || 0;
    var newDpi = parseFloat(newDpiIn.value) || 0;

    // Resolve in-game sens and eDPI from current inputs
    var inGameSens, edpi;
    if (sensType === 'edpi') {
      edpi = curVal;
      inGameSens = edpiToSens(edpi, curDpi);
    } else {
      inGameSens = curVal;
      edpi = sensToEdpi(inGameSens, curDpi);
    }

    // New sens preserves eDPI
    var newInGame = newDpi > 0 ? edpi / newDpi : 0;
    var newVal = sensType === 'edpi' ? edpi : newInGame;

    newSensOut.textContent = fmt(newVal, 4);
    edpiOldOut.textContent = Math.round(edpi);
    edpiNewOut.textContent = Math.round(newDpi * newInGame);

    // DPI change impact
    var dpiDelta = curDpi > 0 ? ((newDpi - curDpi) / curDpi) * 100 : 0;
    var sign = dpiDelta >= 0 ? '+' : '';
    dpiDeltaOut.textContent = sign + fmt(dpiDelta, 1) + '%';

    // Preset active state
    presetBtns.forEach(function(b){
      b.classList.toggle('active', parseFloat(b.getAttribute('data-preset')) === newDpi);
    });

    // Game-specific analysis
    var game = getGame();
    if (game) {
      recCard.hidden = false;
      recGameOut.textContent = 'for ' + game.name;
      recEdpiOut.textContent = Math.round(game.edpi[1]);
      recRangeOut.textContent = game.edpi[0] + '–' + game.edpi[2];
      yourEdpiOut.textContent = Math.round(edpi);

      // edpi delta vs recommended (center value)
      var ratio = game.edpi[1] > 0 ? (edpi / game.edpi[1]) * 100 : 0;
      var deltaPct = ratio - 100;
      var dsign = deltaPct >= 0 ? '+' : '';
      edpiDeltaOut.textContent = dsign + fmt(deltaPct, 0) + '%';
      // Meter bar: 100% width when within range; cap at 200%
      var barPct = Math.max(5, Math.min(200, ratio)) / 2; // /2 so 200%=100% bar
      recBar.style.width = barPct + '%';
      // Bar color by distance from center
      var absDelta = Math.abs(deltaPct);
      recBar.style.background = absDelta < 25
        ? 'linear-gradient(90deg,#16a34a,#22c55e)'
        : absDelta < 60
          ? 'linear-gradient(90deg,#f59e0b,#fbbf24)'
          : 'linear-gradient(90deg,#ef4444,#f87171)';

      // Mouse movement: cm per 360 (using NEW DPI and NEW in-game sens)
      var countsPer360 = (game.yaw * newInGame) > 0 ? 360 / (game.yaw * newInGame) : 0;
      var inchesPer360 = newDpi > 0 ? countsPer360 / newDpi : 0;
      var cmPer360 = inchesPer360 * 2.54;
      cm360Out.textContent = isFinite(cmPer360) && cmPer360 > 0 ? fmt(cmPer360, 2) + ' cm' : '—';
      in360Out.textContent = isFinite(inchesPer360) && inchesPer360 > 0 ? fmt(inchesPer360, 2) + ' in' : '—';
      moveHint.style.display = 'none';
    } else {
      recCard.hidden = true;
      cm360Out.textContent = '—';
      in360Out.textContent = '—';
      moveHint.style.display = '';
    }

    // Reference table: all DPI presets × equivalent sens
    renderRefTable(edpi, curDpi, newDpi);
  }

  function renderRefTable(edpi, curDpi, newDpi){
    var dpis = [400, 800, 1200, 1600, 2400, 3200, 4800, 6400, 12000];
    // Ensure current + new DPI are in the list
    [curDpi, newDpi].forEach(function(d){
      if (d > 0 && dpis.indexOf(d) === -1) dpis.push(d);
    });
    dpis.sort(function(a,b){ return a - b; });
    refTbody.innerHTML = '';
    dpis.forEach(function(d){
      var row = document.createElement('tr');
      var sens = edpiToSens(edpi, d);
      row.innerHTML = '<td>' + d + '</td><td>' + fmt(sens, 4) + '</td>';
      if (d === curDpi || d === newDpi) row.classList.add('is-current');
      refTbody.appendChild(row);
    });
  }

  // Presets set NEW DPI
  presetBtns.forEach(function(b){
    b.addEventListener('click', function(){
      newDpiIn.value = b.getAttribute('data-preset');
      calcConvert();
    });
  });

  // Sensitivity type toggle
  segBtns.forEach(function(b){
    b.addEventListener('click', function(){
      var next = b.getAttribute('data-senstype');
      if (next === sensType) return;
      // Convert displayed value to the new interpretation
      var curDpi = parseFloat(curDpiIn.value) || 0;
      var curVal = parseFloat(curSensIn.value) || 0;
      if (next === 'edpi') {
        curSensIn.value = Math.round(curVal * curDpi);
        curSensIn.step = '1';
      } else {
        curSensIn.value = curDpi > 0 ? fmt(curVal / curDpi, 4) : curVal;
        curSensIn.step = '0.01';
      }
      sensType = next;
      segBtns.forEach(function(sb){
        var active = sb.getAttribute('data-senstype') === next;
        sb.classList.toggle('active', active);
        sb.setAttribute('aria-selected', active ? 'true' : 'false');
      });
      calcConvert();
    });
  });

  // Game search filter
  gameSearch.addEventListener('input', function(){
    var q = gameSearch.value.toLowerCase().trim();
    Array.prototype.slice.call(gameSel.options).forEach(function(opt, i){
      if (i === 0) return; // keep "None"
      var match = !q || opt.textContent.toLowerCase().indexOf(q) !== -1;
      opt.hidden = !match;
    });
  });

  // History (localStorage)
  var HKEY = 'mdc-convert-history';
  var historyList = document.getElementById('msc-history-list');
  var historyClearBtn = document.getElementById('msc-history-clear');

  function loadHistory(){
    try {
      var raw = localStorage.getItem(HKEY);
      return raw ? JSON.parse(raw) : [];
    } catch (e) { return []; }
  }
  function saveHistory(list){
    try { localStorage.setItem(HKEY, JSON.stringify(list.slice(0, 20))); } catch (e) {}
  }
  function renderHistory(){
    var list = loadHistory();
    historyList.innerHTML = '';
    if (!list.length) {
      var empty = document.createElement('div');
      empty.className = 'msc-history-empty';
      empty.textContent = <?php echo json_encode($L['history_empty']); ?>;
      historyList.appendChild(empty);
      return;
    }
    list.forEach(function(h, idx){
      var row = document.createElement('div');
      row.className = 'msc-history-row';
      var label = h.fromDpi + ' @ ' + fmt(h.fromSens, 4) + ' → ' + h.toDpi + ' @ ' + fmt(h.toSens, 4);
      row.innerHTML = '<span class="msc-history-conv">' + label + '</span>' +
                      '<button type="button" data-act="apply" data-idx="' + idx + '">' + <?php echo json_encode($L['history_apply']); ?> + '</button>' +
                      '<button type="button" data-act="copy" data-idx="' + idx + '">' + <?php echo json_encode($L['history_copy']); ?> + '</button>' +
                      '<button type="button" data-act="del" data-idx="' + idx + '">' + <?php echo json_encode($L['history_delete']); ?> + '</button>';
      historyList.appendChild(row);
    });
  }
  historyList.addEventListener('click', function(e){
    var btn = e.target.closest('button');
    if (!btn) return;
    var idx = parseInt(btn.getAttribute('data-idx'), 10);
    var list = loadHistory();
    var h = list[idx];
    if (!h) return;
    var act = btn.getAttribute('data-act');
    if (act === 'apply') {
      curDpiIn.value = h.fromDpi;
      curSensIn.value = sensType === 'edpi' ? Math.round(h.fromSens * h.fromDpi) : h.fromSens;
      newDpiIn.value = h.toDpi;
      calcConvert();
    } else if (act === 'copy') {
      var text = 'DPI ' + h.fromDpi + ' @ sens ' + h.fromSens + ' → DPI ' + h.toDpi + ' @ sens ' + h.toSens;
      if (navigator.clipboard) navigator.clipboard.writeText(text).catch(function(){});
    } else if (act === 'del') {
      list.splice(idx, 1);
      saveHistory(list);
      renderHistory();
    }
  });
  historyClearBtn.addEventListener('click', function(){
    saveHistory([]);
    renderHistory();
  });

  saveBtn.addEventListener('click', function(){
    var curDpi = parseFloat(curDpiIn.value) || 0;
    var curVal = parseFloat(curSensIn.value) || 0;
    var newDpi = parseFloat(newDpiIn.value) || 0;
    var inGameSens = sensType === 'edpi' ? edpiToSens(curVal, curDpi) : curVal;
    var edpi = sensToEdpi(inGameSens, curDpi);
    var newInGame = newDpi > 0 ? edpi / newDpi : 0;
    var entry = {
      fromDpi: Math.round(curDpi),
      fromSens: parseFloat(fmt(inGameSens, 4)),
      toDpi: Math.round(newDpi),
      toSens: parseFloat(fmt(newInGame, 4)),
      ts: Date.now()
    };
    var list = loadHistory();
    // Dedupe if identical to most recent
    if (!list[0] || JSON.stringify({a:list[0].fromDpi,b:list[0].fromSens,c:list[0].toDpi,d:list[0].toSens}) !== JSON.stringify({a:entry.fromDpi,b:entry.fromSens,c:entry.toDpi,d:entry.toSens})) {
      list.unshift(entry);
      saveHistory(list);
      renderHistory();
    }
    saveBtn.classList.add('saved');
    var savedLabel = saveBtn.textContent;
    saveBtn.textContent = '✓';
    setTimeout(function(){ saveBtn.classList.remove('saved'); saveBtn.textContent = savedLabel; }, 900);
  });

  [curDpiIn, curSensIn, newDpiIn, gameSel].forEach(function(el){
    el.addEventListener('input', calcConvert);
    el.addEventListener('change', calcConvert);
  });

  renderHistory();
  calcConvert();
})();
</script>
