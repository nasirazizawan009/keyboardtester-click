<?php
// Testador de DPI v2.0 — Português
$dpi_strings = [
  'tab_test'=>'Teste DPI','tab_edpi'=>'Calculadora eDPI','tab_conv'=>'Conversor',
  'setup'=>'1 — Configuração','lbl_dist'=>'Distância física que você moverá o mouse',
  'unit_cm'=>'cm','unit_in'=>'polegadas','lbl_exp'=>'DPI esperado',
  'exp_hint'=>'(opcional — ativa desvio e precisão)',
  'lbl_axis'=>'Restringir eixo de medição','axis_both'=>'Qualquer direção (recomendado)',
  'axis_x'=>'Apenas horizontal (eixo X)','axis_y'=>'Apenas vertical (eixo Y)',
  'btn_start'=>'▶ Iniciar Medição','btn_reset'=>'Redefinir Tudo',
  'tip'=>'<strong>Dica:</strong> Use uma régua no seu mousepad. Marque início e fim, depois arraste na área de rastreamento com o botão do mouse pressionado.',
  'track_lbl'=>'Área de rastreamento DPI','track_title'=>'2 — Rastreamento e Resultados',
  'track_idle'=>'Clique em Iniciar, depois arraste aqui',
  'track_ready'=>'Segure o botão + arraste a distância medida',
  'stat_px'=>'Pixels percorridos','stat_dpi'=>'DPI Estimado','stat_dev'=>'Desvio','stat_acc'=>'Precisão',
  'runs_lbl'=>'Histórico de medições (arraste para adicionar)','run_n'=>'Medição','run_avg'=>'Méd:',
  'run_more'=>' de %d — arraste novamente ↔','run_done'=>'Todas as medições concluídas',
  'privacy'=>'🔒 Este teste roda completamente no seu navegador. Nenhum dado é coletado.',
  'edpi_setup'=>'Suas Configurações','lbl_dpi'=>'DPI do mouse','lbl_sens'=>'Sensibilidade no jogo',
  'lbl_game'=>'Jogo (para comparação)','game_any'=>'— Qualquer / Personalizado —',
  'edpi_lbl'=>'eDPI — DPI Efetivo','edpi_formula'=>'<strong>Fórmula:</strong> eDPI = DPI do mouse × Sensibilidade no jogo',
  'pro_title'=>'Comparação de Ranges Pro','pro_intro'=>'Seu eDPI está destacado na tabela.',
  'pro_h1'=>'Range eDPI','pro_h2'=>'Nível','pro_h3'=>'Comum em',
  'conv_curr'=>'Configuração Atual','lbl_old_dpi'=>'DPI atual',
  'lbl_old_s'=>'Sensibilidade atual no jogo','conv_target'=>'Configuração Alvo',
  'lbl_new_dpi'=>'Novo DPI (após trocar o mouse)',
  'conv_sub'=>'Nova sensibilidade — mesma memória muscular, DPI diferente',
  'conv_how'=>'Como Funciona',
  'conv_exp1'=>'O conversor mantém seu <strong>eDPI constante</strong>, para que o mesmo movimento físico sempre mova sua visão no jogo a mesma distância.',
  'conv_formula'=>'nova_sens = (DPI_velho × sens_velha) / DPI_novo',
  'conv_exp2'=>'<strong>Exemplo:</strong> 400 DPI a 2.0 sens → 800 DPI a 1.0 sens. Ambos têm eDPI 800.',
  'log_title'=>'Registro de Sessão',
  'log_dl'=>'&#11015; Baixar Registro (.txt)',
  'log_empty'=>'Nenhuma medição ainda. Faça um teste DPI para começar.',
];
?>
<?php if (!defined('DPI_V2_CSS')): define('DPI_V2_CSS',1); ?>
<style>
.dpi-v2{font-family:var(--font-sans,'Space Grotesk','Inter Fallback',-apple-system,sans-serif)}.dpi-tabs{display:flex;gap:6px;background:var(--surface,#f1f5f9);border-radius:11px;padding:6px;margin-bottom:20px}.dpi-tab-btn{flex:1;padding:10px;border-radius:7px;border:1.5px solid var(--border-color,#cbd5e1);background:var(--card-bg,#fff);color:var(--text-muted,#64748b);font-size:.82rem;font-weight:600;cursor:pointer;transition:background .15s,color .15s,border-color .15s,box-shadow .15s;white-space:nowrap}.dpi-tab-btn:hover:not(.active){border-color:var(--primary-color,#0ea5e9);color:var(--primary-color,#0ea5e9)}.dpi-tab-btn.active{background:var(--primary-color,#0ea5e9);color:#fff;border-color:var(--primary-color,#0ea5e9);box-shadow:0 2px 8px rgba(14,165,233,.35)}.dpi-panel{display:none}.dpi-panel.active{display:block}.dpi-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}@media(max-width:640px){.dpi-grid{grid-template-columns:1fr}}.dpi-card{background:var(--card-bg,#fff);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:18px}.dpi-card-title{font-size:.78rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--text-muted,#64748b);margin:0 0 14px}.dpi-field{margin-bottom:13px}.dpi-field label{display:block;font-size:.8rem;font-weight:500;color:var(--text-muted,#64748b);margin-bottom:5px}.dpi-field label small{font-weight:400;font-size:.73rem}.dpi-inline{display:flex;gap:8px;align-items:stretch}.dpi-input,.dpi-select{padding:8px 10px;border:1.5px solid var(--border-color,#e2e8f0);border-radius:7px;background:var(--bg-color,#f8fafc);color:var(--text-color,#1e293b);font-size:.9rem;font-family:inherit;transition:border-color .15s}.dpi-input:focus,.dpi-select:focus{outline:none;border-color:var(--primary-color,#0ea5e9)}.dpi-input{flex:1;min-width:0}.dpi-input.full{width:100%;box-sizing:border-box}.dpi-select{min-width:90px}.dpi-actions{display:flex;gap:8px;margin-top:14px;flex-wrap:wrap}.dpi-btn{padding:9px 16px;border:none;border-radius:7px;font-size:.85rem;font-weight:600;cursor:pointer;font-family:inherit;transition:opacity .15s,background .15s}.dpi-btn.primary{background:var(--primary-color,#0ea5e9);color:#fff}.dpi-btn.primary:hover:not(:disabled){opacity:.9}.dpi-btn.primary.measuring{background:#22c55e;cursor:default}.dpi-btn.ghost{background:transparent;border:1.5px solid var(--border-color,#e2e8f0);color:var(--text-color,#1e293b)}.dpi-btn.ghost:hover{background:var(--surface,#f1f5f9)}.dpi-btn:disabled{opacity:.55;cursor:not-allowed}.dpi-track{border:2px dashed var(--border-color,#cbd5e1);border-radius:8px;height:118px;display:flex;align-items:center;justify-content:center;text-align:center;color:var(--text-muted,#94a3b8);font-size:.82rem;cursor:crosshair;user-select:none;margin-bottom:14px;position:relative;overflow:hidden;transition:border-color .2s,box-shadow .2s}.dpi-track.t-ready{border-style:solid;border-color:var(--primary-color,#0ea5e9);color:var(--primary-color,#0ea5e9)}.dpi-track.t-active{border-style:solid;border-color:#22c55e;color:#22c55e;font-weight:600;animation:dpiPulse 1.5s ease-in-out infinite}@keyframes dpiPulse{0%,100%{box-shadow:0 0 0 3px rgba(34,197,94,.2)}50%{box-shadow:0 0 0 7px rgba(34,197,94,.07)}}.dpi-pbar{position:absolute;bottom:0;left:0;height:3px;background:linear-gradient(90deg,#22c55e,#4ade80);transition:width .06s;border-radius:0 2px 2px 0}.dpi-stats{display:grid;grid-template-columns:1fr 1fr;gap:8px}.dpi-stat{background:var(--surface,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:7px;padding:10px 12px}.dpi-stat-label{display:block;font-size:.7rem;color:var(--text-muted,#64748b);margin-bottom:3px;text-transform:uppercase;letter-spacing:.04em}.dpi-stat-value{font-size:1.15rem;font-weight:700;color:var(--heading-color,#0f172a)}.dpi-stat.s-primary .dpi-stat-value{color:var(--primary-color,#0ea5e9);font-size:1.4rem}.dpi-stat.s-good .dpi-stat-value{color:#22c55e}.dpi-stat.s-warn .dpi-stat-value{color:#f59e0b}.dpi-stat.s-bad .dpi-stat-value{color:#ef4444}.dpi-runs{margin-top:12px}.dpi-runs-lbl{font-size:.72rem;color:var(--text-muted,#64748b);text-transform:uppercase;letter-spacing:.05em;margin-bottom:6px}.dpi-chip-row{display:flex;gap:6px;flex-wrap:wrap}.dpi-chip{background:var(--surface,#f1f5f9);border:1px solid var(--border-color,#e2e8f0);border-radius:5px;padding:4px 8px;font-size:.74rem;color:var(--text-color,#374151)}.dpi-chip.c-avg{background:var(--primary-color,#0ea5e9);color:#fff;border-color:transparent;font-weight:600}.dpi-mode-row{display:flex;justify-content:flex-end;margin-bottom:12px}.dpi-mode-toggle{display:flex;gap:3px;background:var(--surface,#f1f5f9);border-radius:7px;padding:3px}.dpi-mode-btn{padding:5px 12px;border:none;border-radius:5px;font-size:.74rem;font-weight:500;cursor:pointer;font-family:inherit;background:transparent;color:var(--text-muted,#64748b);transition:background .15s,color .15s}.dpi-mode-btn.active{background:var(--card-bg,#fff);color:var(--text-color,#1e293b);box-shadow:0 1px 2px rgba(0,0,0,.08)}.dpi-adv-section{display:none}.dpi-adv-section.shown{display:block}.dpi-result-big{text-align:center;padding:20px 10px;background:var(--surface,#f8fafc);border-radius:10px;margin:14px 0}.dpi-result-big .val{font-size:3rem;font-weight:800;line-height:1;color:var(--primary-color,#0ea5e9)}.dpi-result-big .lbl{font-size:.75rem;color:var(--text-muted,#64748b);margin-top:5px;text-transform:uppercase;letter-spacing:.07em}.dpi-pro-table{width:100%;border-collapse:collapse;font-size:.78rem;margin-top:10px}.dpi-pro-table th{text-align:left;padding:6px 8px;font-weight:600;color:var(--text-muted,#64748b);text-transform:uppercase;letter-spacing:.04em;font-size:.68rem;border-bottom:1px solid var(--border-color,#e2e8f0)}.dpi-pro-table td{padding:6px 8px;color:var(--text-color,#374151);border-bottom:1px solid var(--border-color,#e2e8f0)}.dpi-pro-table tr.t-match td{background:rgba(14,165,233,.08);color:var(--primary-color,#0ea5e9);font-weight:600}.dpi-conv-result{background:var(--surface,#f1f5f9);border-radius:8px;padding:14px 16px;margin-top:14px;border-left:3px solid var(--primary-color,#0ea5e9)}.dpi-conv-formula{font-size:.72rem;color:var(--text-muted,#94a3b8);font-family:'JetBrains Mono','Courier New',monospace;margin-bottom:6px}.dpi-conv-val{font-size:1.7rem;font-weight:700;color:var(--primary-color,#0ea5e9)}.dpi-conv-sub{font-size:.75rem;color:var(--text-muted,#64748b);margin-top:2px}.dpi-tip{font-size:.78rem;line-height:1.6;color:var(--text-color,#374151)}.dpi-code-block{background:var(--surface,#f1f5f9);border-radius:6px;padding:9px 13px;font-family:'JetBrains Mono',monospace;font-size:.78rem;color:var(--text-color,#374151);margin:8px 0}.dpi-privacy{text-align:center;font-size:.71rem;color:var(--text-muted,#94a3b8);margin-top:16px;padding-top:12px;border-top:1px solid var(--border-color,#e2e8f0)}.dpi-log-section{margin-top:20px}.dpi-log-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:8px}.dpi-log-box{background:var(--surface,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:10px 14px;max-height:200px;overflow-y:auto;font-family:'JetBrains Mono','Courier New',monospace;font-size:.73rem;line-height:1.6}.dpi-log-empty{color:var(--text-muted,#94a3b8);text-align:center;padding:10px 0;margin:0}.dpi-log-entry{padding:3px 0;border-bottom:1px solid var(--border-color,#e2e8f0);color:var(--text-color,#374151)}.dpi-log-entry:last-child{border-bottom:none}.dpi-log-ts{color:var(--text-muted,#94a3b8)}.dpi-log-dpi{color:var(--primary-color,#0ea5e9);font-weight:700}.dpi-log-good{color:#22c55e}.dpi-log-warn{color:#f59e0b}.dpi-log-bad{color:#ef4444}
</style>
<?php endif; ?>
<div class="kbt-tool dpi-v2" id="dpi-tool">
  <div class="dpi-tabs" role="tablist">
    <button class="dpi-tab-btn active" role="tab" aria-selected="true" data-panel="dpi-p-test"><?php echo $dpi_strings['tab_test']; ?></button>
    <button class="dpi-tab-btn" role="tab" aria-selected="false" data-panel="dpi-p-edpi"><?php echo $dpi_strings['tab_edpi']; ?></button>
    <button class="dpi-tab-btn" role="tab" aria-selected="false" data-panel="dpi-p-conv"><?php echo $dpi_strings['tab_conv']; ?></button>
  </div>
  <div class="dpi-panel active" id="dpi-p-test" role="tabpanel">
    <div class="dpi-mode-row"><div class="dpi-mode-toggle"><button class="dpi-mode-btn active" data-mode="basic">Básico</button><button class="dpi-mode-btn" data-mode="advanced">Avançado</button></div></div>
    <div class="dpi-grid">
      <div class="dpi-card">
        <p class="dpi-card-title"><?php echo $dpi_strings['setup']; ?></p>
        <div class="dpi-field"><label for="dpi-distance"><?php echo $dpi_strings['lbl_dist']; ?></label><div class="dpi-inline"><input class="dpi-input" id="dpi-distance" type="number" min="1" max="100" step="0.5" value="10"><select class="dpi-select" id="dpi-unit"><option value="cm" selected><?php echo $dpi_strings['unit_cm']; ?></option><option value="in"><?php echo $dpi_strings['unit_in']; ?></option></select></div></div>
        <div class="dpi-field"><label for="dpi-expected"><?php echo $dpi_strings['lbl_exp']; ?> <small><?php echo $dpi_strings['exp_hint']; ?></small></label><input class="dpi-input full" id="dpi-expected" type="number" min="100" max="32000" step="100" placeholder="ex. 800"></div>
        <div class="dpi-adv-section" id="dpi-adv"><div class="dpi-field"><label for="dpi-axis"><?php echo $dpi_strings['lbl_axis']; ?></label><select class="dpi-select" id="dpi-axis" style="width:100%"><option value="both" selected><?php echo $dpi_strings['axis_both']; ?></option><option value="x"><?php echo $dpi_strings['axis_x']; ?></option><option value="y"><?php echo $dpi_strings['axis_y']; ?></option></select></div></div>
        <div class="dpi-actions"><button class="dpi-btn primary" id="dpi-start"><?php echo $dpi_strings['btn_start']; ?></button><button class="dpi-btn ghost" id="dpi-reset"><?php echo $dpi_strings['btn_reset']; ?></button></div>
        <p style="font-size:.74rem;color:var(--text-muted);margin-top:10px;line-height:1.5"><?php echo $dpi_strings['tip']; ?></p>
      </div>
      <div class="dpi-card">
        <p class="dpi-card-title"><?php echo $dpi_strings['track_title']; ?></p>
        <div class="dpi-track" id="dpi-track" aria-label="<?php echo $dpi_strings['track_lbl']; ?>"><span id="dpi-track-msg"><?php echo $dpi_strings['track_idle']; ?></span><div class="dpi-pbar" id="dpi-pbar" style="width:0%"></div></div>
        <div class="dpi-stats">
          <div class="dpi-stat"><span class="dpi-stat-label"><?php echo $dpi_strings['stat_px']; ?></span><span class="dpi-stat-value" id="dpi-pixels">0 px</span></div>
          <div class="dpi-stat s-primary"><span class="dpi-stat-label"><?php echo $dpi_strings['stat_dpi']; ?></span><span class="dpi-stat-value" id="dpi-result">--</span></div>
          <div class="dpi-stat" id="dpi-dev-stat" style="display:none"><span class="dpi-stat-label"><?php echo $dpi_strings['stat_dev']; ?></span><span class="dpi-stat-value" id="dpi-dev">--</span></div>
          <div class="dpi-stat" id="dpi-acc-stat" style="display:none"><span class="dpi-stat-label"><?php echo $dpi_strings['stat_acc']; ?></span><span class="dpi-stat-value" id="dpi-acc">--</span></div>
        </div>
        <div class="dpi-runs" id="dpi-runs" style="display:none" aria-live="polite"><p class="dpi-runs-lbl"><?php echo $dpi_strings['runs_lbl']; ?></p><div class="dpi-chip-row" id="dpi-chips"></div></div>
      </div>
    </div>
    <p class="dpi-privacy"><?php echo $dpi_strings['privacy']; ?></p>
    <div class="dpi-log-section" id="dpi-log-section">
      <div class="dpi-log-header">
        <p class="dpi-card-title" style="margin:0"><?php echo $dpi_strings['log_title']; ?></p>
        <button class="dpi-btn ghost" id="dpi-log-download" style="font-size:.74rem;padding:5px 12px" disabled><?php echo $dpi_strings['log_dl']; ?></button>
      </div>
      <div class="dpi-log-box" id="dpi-log-box">
        <p class="dpi-log-empty" id="dpi-log-empty"><?php echo $dpi_strings['log_empty']; ?></p>
        <div id="dpi-log-entries"></div>
      </div>
    </div>
  </div>
  <div class="dpi-panel" id="dpi-p-edpi" role="tabpanel">
    <div class="dpi-grid">
      <div class="dpi-card">
        <p class="dpi-card-title"><?php echo $dpi_strings['edpi_setup']; ?></p>
        <div class="dpi-field"><label for="edpi-dpi"><?php echo $dpi_strings['lbl_dpi']; ?></label><input class="dpi-input full" id="edpi-dpi" type="number" min="100" max="32000" step="100" value="800"></div>
        <div class="dpi-field"><label for="edpi-sens"><?php echo $dpi_strings['lbl_sens']; ?></label><input class="dpi-input full" id="edpi-sens" type="number" min="0.01" max="100" step="0.01" value="1.5"></div>
        <div class="dpi-field"><label for="edpi-game"><?php echo $dpi_strings['lbl_game']; ?></label><select class="dpi-select" id="edpi-game" style="width:100%"><option value=""><?php echo $dpi_strings['game_any']; ?></option><option value="cs2">CS2 / CS:GO</option><option value="valorant">Valorant</option><option value="apex">Apex Legends</option><option value="fortnite">Fortnite</option><option value="overwatch">Overwatch 2</option></select></div>
        <div class="dpi-result-big"><div class="val" id="edpi-val">1200</div><div class="lbl"><?php echo $dpi_strings['edpi_lbl']; ?></div></div>
        <p class="dpi-tip"><?php echo $dpi_strings['edpi_formula']; ?></p>
      </div>
      <div class="dpi-card">
        <p class="dpi-card-title"><?php echo $dpi_strings['pro_title']; ?></p>
        <p class="dpi-tip" style="margin-bottom:10px"><?php echo $dpi_strings['pro_intro']; ?></p>
        <table class="dpi-pro-table"><thead><tr><th><?php echo $dpi_strings['pro_h1']; ?></th><th><?php echo $dpi_strings['pro_h2']; ?></th><th><?php echo $dpi_strings['pro_h3']; ?></th></tr></thead>
        <tbody id="edpi-tbody">
          <tr data-min="0" data-max="400"><td>200–400</td><td>Ultra Baixo</td><td>Pro FPS</td></tr>
          <tr data-min="400" data-max="800"><td>400–800</td><td>Baixo</td><td>FPS Competitivo</td></tr>
          <tr data-min="800" data-max="1600"><td>800–1600</td><td>Médio</td><td>Gaming Geral</td></tr>
          <tr data-min="1600" data-max="3200"><td>1600–3200</td><td>Alto</td><td>MOBA / RTS</td></tr>
          <tr data-min="3200" data-max="999999"><td>3200+</td><td>Muito Alto</td><td>Escritório, Design</td></tr>
        </tbody></table>
      </div>
    </div>
    <p class="dpi-privacy"><?php echo $dpi_strings['privacy']; ?></p>
  </div>
  <div class="dpi-panel" id="dpi-p-conv" role="tabpanel">
    <div class="dpi-grid">
      <div class="dpi-card">
        <p class="dpi-card-title"><?php echo $dpi_strings['conv_curr']; ?></p>
        <div class="dpi-field"><label for="conv-old-dpi"><?php echo $dpi_strings['lbl_old_dpi']; ?></label><input class="dpi-input full" id="conv-old-dpi" type="number" min="100" max="32000" step="100" value="400"></div>
        <div class="dpi-field"><label for="conv-old-sens"><?php echo $dpi_strings['lbl_old_s']; ?></label><input class="dpi-input full" id="conv-old-sens" type="number" min="0.01" max="100" step="0.01" value="2.0"></div>
        <p class="dpi-card-title" style="margin-top:14px"><?php echo $dpi_strings['conv_target']; ?></p>
        <div class="dpi-field"><label for="conv-new-dpi"><?php echo $dpi_strings['lbl_new_dpi']; ?></label><input class="dpi-input full" id="conv-new-dpi" type="number" min="100" max="32000" step="100" value="800"></div>
        <div class="dpi-conv-result"><p class="dpi-conv-formula" id="conv-formula">nova_sens = (400 &times; 2.0) / 800</p><div class="dpi-conv-val" id="conv-val">1.0000</div><p class="dpi-conv-sub"><?php echo $dpi_strings['conv_sub']; ?></p></div>
      </div>
      <div class="dpi-card">
        <p class="dpi-card-title"><?php echo $dpi_strings['conv_how']; ?></p>
        <p class="dpi-tip"><?php echo $dpi_strings['conv_exp1']; ?></p>
        <div class="dpi-code-block"><?php echo $dpi_strings['conv_formula']; ?></div>
        <p class="dpi-tip" style="margin-top:10px"><?php echo $dpi_strings['conv_exp2']; ?></p>
      </div>
    </div>
    <p class="dpi-privacy"><?php echo $dpi_strings['privacy']; ?></p>
  </div>
</div>
<script>
(function(){
var S=<?php echo json_encode(['run_n'=>$dpi_strings['run_n'],'run_avg'=>$dpi_strings['run_avg'],'run_more'=>$dpi_strings['run_more'],'run_done'=>$dpi_strings['run_done'],'track_ready'=>$dpi_strings['track_ready'],'track_idle'=>$dpi_strings['track_idle'],'btn_start'=>$dpi_strings['btn_start'],'acc_exc'=>'Excelente ✓','acc_good'=>'Bom ✓','acc_fair'=>'Regular','acc_poor'=>'Ruim']); ?>;
var MAX=5;
document.querySelectorAll('.dpi-tab-btn').forEach(function(b){b.addEventListener('click',function(){document.querySelectorAll('.dpi-tab-btn').forEach(function(x){x.classList.remove('active');x.setAttribute('aria-selected','false')});document.querySelectorAll('.dpi-panel').forEach(function(p){p.classList.remove('active')});b.classList.add('active');b.setAttribute('aria-selected','true');var p=document.getElementById(b.dataset.panel);if(p)p.classList.add('active')})});
document.querySelectorAll('.dpi-mode-btn').forEach(function(b){b.addEventListener('click',function(){document.querySelectorAll('.dpi-mode-btn').forEach(function(x){x.classList.remove('active')});b.classList.add('active');var a=document.getElementById('dpi-adv');if(a)a.classList.toggle('shown',b.dataset.mode==='advanced')})});
var distEl=document.getElementById('dpi-distance'),unitEl=document.getElementById('dpi-unit'),expEl=document.getElementById('dpi-expected'),axisEl=document.getElementById('dpi-axis'),startBtn=document.getElementById('dpi-start'),resetBtn=document.getElementById('dpi-reset'),track=document.getElementById('dpi-track'),trackMsg=document.getElementById('dpi-track-msg'),pbar=document.getElementById('dpi-pbar'),pixelsEl=document.getElementById('dpi-pixels'),resultEl=document.getElementById('dpi-result'),devStat=document.getElementById('dpi-dev-stat'),devEl=document.getElementById('dpi-dev'),accStat=document.getElementById('dpi-acc-stat'),accEl=document.getElementById('dpi-acc'),runsEl=document.getElementById('dpi-runs'),chipsEl=document.getElementById('dpi-chips');
var active=false,tracking=false,totalPx=0,lastX=0,lastY=0,runs=[];
function getInches(){var d=parseFloat(distEl.value);return(!d||d<=0)?0:(unitEl.value==='cm'?d/2.54:d);}
function calcDPI(px){var i=getInches();return i>0?px/i:0;}
function accuracy(p){if(p<=2)return{label:S.acc_exc,cls:'s-good'};if(p<=5)return{label:S.acc_good,cls:'s-good'};if(p<=10)return{label:S.acc_fair,cls:'s-warn'};return{label:S.acc_poor,cls:'s-bad'};}
function refresh(){pixelsEl.textContent=Math.round(totalPx)+' px';var dpi=calcDPI(totalPx);resultEl.textContent=dpi?Math.round(dpi)+' DPI':'--';var exp=parseFloat(expEl.value);if(dpi&&exp>0){var pct=Math.abs((dpi-exp)/exp*100);devEl.textContent=(dpi>=exp?'+':'-')+pct.toFixed(1)+'%';var r=accuracy(pct);accEl.textContent=r.label;accStat.className='dpi-stat '+r.cls;devStat.style.display='block';accStat.style.display='block';}else{devStat.style.display='none';accStat.style.display='none';}var expDpi=parseFloat(expEl.value)||800,inches=getInches()||4;pbar.style.width=Math.min(100,(totalPx/(expDpi*inches))*100)+'%';}
function renderChips(){chipsEl.innerHTML='';var sum=0;runs.forEach(function(r,i){var c=document.createElement('span');c.className='dpi-chip';c.textContent=S.run_n+' '+(i+1)+': '+Math.round(r)+' DPI';chipsEl.appendChild(c);sum+=r;});if(runs.length>1){var a=document.createElement('span');a.className='dpi-chip c-avg';a.textContent=S.run_avg+' '+Math.round(sum/runs.length)+' DPI';chipsEl.appendChild(a);}runsEl.style.display=runs.length?'block':'none';}
function setActive(on){active=on;if(on){startBtn.textContent='⏺ ...';startBtn.classList.add('measuring');startBtn.disabled=true;track.classList.add('t-ready');track.classList.remove('t-active');trackMsg.textContent=S.track_ready;}else{startBtn.textContent=S.btn_start;startBtn.classList.remove('measuring');startBtn.disabled=false;track.classList.remove('t-ready','t-active');trackMsg.textContent=S.track_idle;pbar.style.width='0%';}}
startBtn.addEventListener('click',function(){if(runs.length>=MAX)runs=[];totalPx=0;refresh();setActive(true);});
resetBtn.addEventListener('click',function(){tracking=false;totalPx=0;runs=[];refresh();renderChips();setActive(false);devStat.style.display='none';accStat.style.display='none';});
track.addEventListener('pointerdown',function(e){if(!active)return;tracking=true;totalPx=0;lastX=e.clientX;lastY=e.clientY;track.setPointerCapture(e.pointerId);track.classList.add('t-active');refresh();});
track.addEventListener('pointermove',function(e){if(!tracking)return;var dx=e.clientX-lastX,dy=e.clientY-lastY,ax=axisEl?axisEl.value:'both';totalPx+=ax==='x'?Math.abs(dx):ax==='y'?Math.abs(dy):Math.hypot(dx,dy);lastX=e.clientX;lastY=e.clientY;refresh();});
function endDrag(){if(!tracking)return;tracking=false;track.classList.remove('t-active');var dpi=calcDPI(totalPx);if(dpi>0){runs.push(dpi);renderChips();addLogEntry(dpi,runs.length);if(runs.length<MAX){totalPx=0;refresh();trackMsg.textContent=S.run_n+' '+(runs.length+1)+S.run_more.replace('%d',MAX);}else{setActive(false);trackMsg.textContent=S.run_done;}}}
track.addEventListener('pointerup',endDrag);track.addEventListener('lostpointercapture',endDrag);
distEl.addEventListener('input',refresh);unitEl.addEventListener('change',refresh);expEl.addEventListener('input',refresh);
var eDpi=document.getElementById('edpi-dpi'),eSens=document.getElementById('edpi-sens'),eVal=document.getElementById('edpi-val'),eTbody=document.getElementById('edpi-tbody');
function updEdpi(){var d=parseFloat(eDpi.value)||0,s=parseFloat(eSens.value)||0,e=d*s;eVal.textContent=e>0?Math.round(e):'--';if(eTbody)Array.from(eTbody.rows).forEach(function(r){r.classList.toggle('t-match',e>=parseFloat(r.dataset.min)&&e<parseFloat(r.dataset.max));});}
if(eDpi)eDpi.addEventListener('input',updEdpi);if(eSens)eSens.addEventListener('input',updEdpi);updEdpi();
var cOd=document.getElementById('conv-old-dpi'),cOs=document.getElementById('conv-old-sens'),cNd=document.getElementById('conv-new-dpi'),cFm=document.getElementById('conv-formula'),cVl=document.getElementById('conv-val');
function updConv(){var od=parseFloat(cOd.value)||0,os=parseFloat(cOs.value)||0,nd=parseFloat(cNd.value)||0;if(od&&os&&nd){cFm.innerHTML='nova_sens = ('+od+' &times; '+os+') / '+nd;cVl.textContent=((od*os)/nd).toFixed(4);}else{cVl.textContent='--';}}
if(cOd)cOd.addEventListener('input',updConv);if(cOs)cOs.addEventListener('input',updConv);if(cNd)cNd.addEventListener('input',updConv);updConv();
var logData=[],logEntriesEl=document.getElementById('dpi-log-entries'),logEmptyEl=document.getElementById('dpi-log-empty'),logDlBtn=document.getElementById('dpi-log-download');
function lpad(n){return(n<10?'0':'')+n;}function nowStr(){var d=new Date();return lpad(d.getHours())+':'+lpad(d.getMinutes())+':'+lpad(d.getSeconds());}
function addLogEntry(dpi,runNum){var ts=nowStr(),dist=parseFloat(distEl.value)||0,unit=unitEl?unitEl.value:'cm',exp=parseFloat(expEl.value)||0,devStr='',devCls='';if(exp>0){var pct=Math.abs((dpi-exp)/exp*100),sign=dpi>=exp?'+':'-';devStr=sign+pct.toFixed(1)+'%';devCls=pct<=5?'dpi-log-good':pct<=10?'dpi-log-warn':'dpi-log-bad';}var entry={ts:ts,run:runNum,dpi:Math.round(dpi),dist:dist,unit:unit,exp:exp>0?exp+' DPI':'N/A',devStr:devStr,devCls:devCls};logData.push(entry);var row=document.createElement('div');row.className='dpi-log-entry';var devPart=devStr?'| Desv: <span class="'+devCls+'">'+devStr+'</span>':'';row.innerHTML='<span class="dpi-log-ts">['+ts+']</span> #'+runNum+' \u2014 <span class="dpi-log-dpi">'+entry.dpi+' DPI</span> | '+dist+'\u202f'+unit+' | '+entry.exp+' '+devPart;logEntriesEl.appendChild(row);var box=document.getElementById('dpi-log-box');if(box)box.scrollTop=box.scrollHeight;if(logEmptyEl)logEmptyEl.style.display='none';if(logDlBtn)logDlBtn.disabled=false;}
if(logDlBtn){logDlBtn.addEventListener('click',function(){var lines=['KeyboardTester.click \u2014 Registro DPI','URL: https://keyboardtester.click/mouse_sensitivity_DPI_tester.php','Gerado: '+new Date().toLocaleString(),'','--- MEDI\u00c7\u00d5ES ---'];logData.forEach(function(e){lines.push('['+e.ts+'] #'+e.run+' \u2014 '+e.dpi+' DPI | '+e.dist+' '+e.unit+' | Esperado: '+e.exp+(e.devStr?' | Desv: '+e.devStr:''));});lines.push('','--- FIM ---');var blob=new Blob([lines.join('\r\n')],{type:'text/plain'}),url=URL.createObjectURL(blob),a=document.createElement('a');a.href=url;a.download='dpi-log-'+new Date().toISOString().slice(0,10)+'.txt';a.click();URL.revokeObjectURL(url);});}
})();
</script>
