<?php
// screen-test-tool.php - embeddable Screen Test module (French version)
?>
<style>
  :root {
    --bg: #f6f8fc;
    --card: #ffffff;
    --text: #0f172a;
    --muted: #64748b;
    --primary: #4b5eaa;
    --primary-2: #7d8bc1;
    --accent: #f59e0b;
    --success: #10b981;
    --danger: #ef4444;
    --warning: #f59e0b;
    --ring: rgba(125,139,193,0.35);
    --border: #e2e8f0;
    --shadow: 0 10px 25px rgba(17, 24, 39, 0.08);
  }

  .st-container { max-width: 1200px; margin: 0 auto; padding: clamp(8px, 1.5vw, 16px); }

  .st-grid { display: grid; grid-template-columns: 2fr 1fr; gap: clamp(12px, 2.2vw, 24px); align-items: start; }
  @media (max-width: 968px) { .st-grid { grid-template-columns: 1fr; } }

  .st-card { background: var(--card); border: 1px solid var(--border); border-radius: 16px; box-shadow: var(--shadow); padding: 20px; }

  .st-preview-container { position: relative; width: 100%; background: #000; border-radius: 12px; overflow: hidden; aspect-ratio: 16/9; display: flex; align-items: center; justify-content: center; border: 3px solid var(--border); cursor: pointer; transition: border-color 0.3s; }
  .st-preview-container:hover { border-color: var(--primary); }

  .st-preview { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 600; color: #fff; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); }

  .st-overlay { position: absolute; bottom: 12px; left: 12px; right: 12px; display: flex; justify-content: space-between; align-items: center; z-index: 10; }
  .st-badge { background: rgba(0,0,0,0.75); color: #fff; padding: 8px 14px; border-radius: 8px; font-size: 13px; backdrop-filter: blur(10px); font-weight: 500; }

  .st-colors-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(90px, 1fr)); gap: 12px; margin-top: 16px; }
  .st-color-btn { appearance: none; border: 2px solid var(--border); border-radius: 10px; padding: 0; height: 70px; cursor: pointer; position: relative; overflow: hidden; transition: all 0.3s; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 600; color: #fff; text-shadow: 1px 1px 2px rgba(0,0,0,0.5); }
  .st-color-btn:hover { transform: translateY(-2px); box-shadow: 0 6px 15px rgba(0,0,0,0.2); border-color: var(--primary); }
  .st-color-btn:active { transform: translateY(0); }

  .st-fullscreen-test { position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; display: none; align-items: center; justify-content: center; cursor: pointer; }
  .st-fullscreen-test.active { display: flex; }

  .st-fs-instructions { position: absolute; top: 20px; left: 50%; transform: translateX(-50%); background: rgba(0,0,0,0.85); color: #fff; padding: 15px 25px; border-radius: 10px; backdrop-filter: blur(10px); text-align: center; font-size: 14px; max-width: 90%; animation: st-fade-in 0.5s; }
  @keyframes st-fade-in { from { opacity: 0; transform: translateX(-50%) translateY(-10px); } to { opacity: 1; transform: translateX(-50%) translateY(0); } }

  .st-fs-controls { position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); display: flex; gap: 15px; animation: st-fade-in 0.5s 0.2s backwards; }
  .st-fs-btn { background: rgba(0,0,0,0.85); color: #fff; border: 2px solid rgba(255,255,255,0.3); padding: 12px 24px; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; backdrop-filter: blur(10px); transition: all 0.3s; }
  .st-fs-btn:hover { background: rgba(255,255,255,0.2); border-color: rgba(255,255,255,0.6); }

  .st-info-section { margin-top: 12px; }
  .st-info-label { font-size: 12px; color: var(--muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px; }
  .st-info-value { font-size: 16px; color: var(--text); font-weight: 600; }

  .st-section { margin-top: 20px; padding-top: 20px; border-top: 1px solid var(--border); }
  .st-section h3 { font-size: 16px; margin: 0 0 12px 0; color: var(--text); display: flex; align-items: center; gap: 8px; }

  .st-alert { padding: 12px 16px; border-radius: 8px; font-size: 13px; line-height: 1.6; margin-top: 16px; }
  .st-alert-info { background: #dbeafe; border: 1px solid #93c5fd; color: #1e40af; }
  .st-alert-warning { background: #fef3c7; border: 1px solid #fcd34d; color: #92400e; }
  .st-alert-success { background: #d1fae5; border: 1px solid #6ee7b7; color: #065f46; }

  .st-icon { font-size: 18px; }

  .st-tips-list { list-style: none; padding: 0; margin: 10px 0 0 0; }
  .st-tips-list li { padding: 8px 0; padding-left: 24px; position: relative; font-size: 13px; color: var(--muted); line-height: 1.5; }
  .st-tips-list li:before { content: ""; position: absolute; left: 0; color: var(--success); font-weight: bold; }

  .st-stats-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 12px; }
  .st-stat-card { background: var(--bg); padding: 12px; border-radius: 8px; text-align: center; }
  .st-stat-card .label { font-size: 11px; color: var(--muted); text-transform: uppercase; letter-spacing: 0.5px; }
  .st-stat-card .value { font-size: 24px; font-weight: 700; color: var(--primary); margin-top: 4px; }

  @media (max-width: 640px) {
    .st-colors-grid { grid-template-columns: repeat(3, 1fr); gap: 8px; }
    .st-color-btn { height: 60px; font-size: 11px; }
    .st-fs-instructions { font-size: 12px; padding: 12px 18px; }
    .st-fs-btn { padding: 10px 18px; font-size: 13px; }
  }
</style>

<div class="st-container">
  <div class="st-grid">
    <!-- Left Column: Screen Test Preview & Controls -->
    <div>
      <div class="st-card">
        <h2 style="margin: 0 0 16px 0; font-size: 20px; color: var(--text); display: flex; align-items: center; gap: 10px;">
          <span class="st-icon">🖥️</span>
          Apercu du Test d'Ecran
        </h2>

        <div class="st-preview-container" id="st-preview-box" onclick="startScreenTest()">
          <div class="st-preview" id="st-preview-display" style="background: #000;">
            Cliquez pour demarrer le test en plein ecran
          </div>
          <div class="st-overlay">
            <div class="st-badge">
              <span id="st-current-color">Pret</span>
            </div>
            <div class="st-badge">
              Cliquez n'importe ou pour tester
            </div>
          </div>
        </div>

        <div class="st-colors-grid">
          <button class="st-color-btn" style="background: #000;" onclick="setPreviewColor('#000000', 'Noir')" title="Noir - Ideal pour trouver les pixels morts">
            Noir
          </button>
          <button class="st-color-btn" style="background: #fff; color: #000; text-shadow: none;" onclick="setPreviewColor('#FFFFFF', 'Blanc')" title="Blanc - Ideal pour trouver les pixels coinces">
            Blanc
          </button>
          <button class="st-color-btn" style="background: #ff0000;" onclick="setPreviewColor('#FF0000', 'Rouge')" title="Rouge - Verifier les sous-pixels rouges">
            Rouge
          </button>
          <button class="st-color-btn" style="background: #00ff00;" onclick="setPreviewColor('#00FF00', 'Vert')" title="Vert - Verifier les sous-pixels verts">
            Vert
          </button>
          <button class="st-color-btn" style="background: #0000ff;" onclick="setPreviewColor('#0000FF', 'Bleu')" title="Bleu - Verifier les sous-pixels bleus">
            Bleu
          </button>
          <button class="st-color-btn" style="background: #ffff00; color: #000; text-shadow: none;" onclick="setPreviewColor('#FFFF00', 'Jaune')" title="Jaune - Sous-pixels R+V">
            Jaune
          </button>
          <button class="st-color-btn" style="background: #ff00ff;" onclick="setPreviewColor('#FF00FF', 'Magenta')" title="Magenta - Sous-pixels R+B">
            Magenta
          </button>
          <button class="st-color-btn" style="background: #00ffff; color: #000; text-shadow: none;" onclick="setPreviewColor('#00FFFF', 'Cyan')" title="Cyan - Sous-pixels V+B">
            Cyan
          </button>
        </div>

        <div class="st-alert st-alert-info">
          <strong>Conseil:</strong> Nettoyez votre ecran d'abord! Utilisez les fleches (gauche droite) ou cliquez pour changer de couleur en plein ecran. Appuyez sur Echap pour quitter.
        </div>
      </div>
    </div>

    <!-- Right Column: Information & Guide -->
    <div>
      <div class="st-card">
        <h3 style="margin: 0 0 16px 0; font-size: 18px; color: var(--text);">
          <span class="st-icon">📊</span>
          Statistiques du Test
        </h3>

        <div class="st-stats-grid">
          <div class="st-stat-card">
            <div class="label">Tests Effectues</div>
            <div class="value" id="st-test-count">0</div>
          </div>
          <div class="st-stat-card">
            <div class="label">Couleurs Testees</div>
            <div class="value" id="st-color-count">0</div>
          </div>
        </div>

        <div class="st-section">
          <h3>
            <span class="st-icon">🎯</span>
            Que Rechercher
          </h3>
          <ul class="st-tips-list">
            <li><strong>Pixels Morts:</strong> Points noirs permanents (sur toutes les couleurs)</li>
            <li><strong>Pixels Coinces:</strong> Points fixes d'une seule couleur (rouge/vert/bleu)</li>
            <li><strong>Pixels Chauds:</strong> Pixels toujours blancs</li>
            <li><strong>Uniformite:</strong> Couleur uniforme sur tout l'ecran</li>
          </ul>
        </div>

        <div class="st-section">
          <h3>
            <span class="st-icon">✅</span>
            Meilleures Pratiques
          </h3>
          <ul class="st-tips-list">
            <li>Nettoyez votre ecran avec un chiffon microfibre</li>
            <li>Testez dans une piece sombre ou faiblement eclairee</li>
            <li>Regardez depuis votre distance normale</li>
            <li>Testez les 8 couleurs completement</li>
            <li>Verifiez soigneusement les bords et coins</li>
            <li>Prenez votre temps - ne vous precipitez pas</li>
          </ul>
        </div>

        <div class="st-alert st-alert-success">
          <strong>Confidentialite:</strong> Ce test s'execute entierement dans votre navigateur. Aucune donnee n'est collectee ni envoyee a un serveur.
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Full Screen Test Mode -->
<div class="st-fullscreen-test" id="st-fullscreen-test">
  <div class="st-fs-instructions" id="st-fs-instructions">
    <div style="font-weight: 600; margin-bottom: 8px;">Test d'Ecran Actif</div>
    <div style="font-size: 12px;">Utilisez les fleches (gauche droite) ou cliquez pour changer de couleur - Appuyez sur Echap pour quitter</div>
  </div>
  <div class="st-fs-controls">
    <button class="st-fs-btn" onclick="previousColor()">Precedent</button>
    <button class="st-fs-btn" onclick="nextColor()">Suivant</button>
    <button class="st-fs-btn" onclick="exitFullScreen()">Quitter (Echap)</button>
  </div>
</div>

<script>
  const colors = [
    { hex: '#000000', name: 'Noir', desc: 'Cherchez les pixels morts (points noirs)' },
    { hex: '#FFFFFF', name: 'Blanc', desc: 'Cherchez les pixels coinces (points de couleur)' },
    { hex: '#FF0000', name: 'Rouge', desc: 'Verifiez les sous-pixels rouges' },
    { hex: '#00FF00', name: 'Vert', desc: 'Verifiez les sous-pixels verts' },
    { hex: '#0000FF', name: 'Bleu', desc: 'Verifiez les sous-pixels bleus' },
    { hex: '#FFFF00', name: 'Jaune', desc: 'Sous-pixels Rouge + Vert' },
    { hex: '#FF00FF', name: 'Magenta', desc: 'Sous-pixels Rouge + Bleu' },
    { hex: '#00FFFF', name: 'Cyan', desc: 'Sous-pixels Vert + Bleu' }
  ];

  let currentColorIndex = 0;
  let testCount = parseInt(localStorage.getItem('st_test_count') || '0');
  let colorsTested = new Set(JSON.parse(localStorage.getItem('st_colors_tested') || '[]'));
  let isFullScreen = false;

  // Update stats display
  function updateStats() {
    document.getElementById('st-test-count').textContent = testCount;
    document.getElementById('st-color-count').textContent = colorsTested.size;
  }

  // Set preview color
  function setPreviewColor(hex, name) {
    document.getElementById('st-preview-display').style.background = hex;
    document.getElementById('st-current-color').textContent = name;
    currentColorIndex = colors.findIndex(c => c.hex === hex);

    colorsTested.add(hex);
    localStorage.setItem('st_colors_tested', JSON.stringify([...colorsTested]));
    updateStats();
  }

  // Start full screen test
  function startScreenTest() {
    const fsTest = document.getElementById('st-fullscreen-test');
    fsTest.classList.add('active');
    isFullScreen = true;
    testCount++;
    localStorage.setItem('st_test_count', testCount.toString());
    updateStats();

    // Set initial color
    updateFullScreenColor();

    // Hide instructions after 3 seconds
    setTimeout(() => {
      const instructions = document.getElementById('st-fs-instructions');
      if (instructions) instructions.style.display = 'none';
    }, 3000);
  }

  // Update full screen color
  function updateFullScreenColor() {
    const fsTest = document.getElementById('st-fullscreen-test');
    const color = colors[currentColorIndex];
    fsTest.style.background = color.hex;

    colorsTested.add(color.hex);
    localStorage.setItem('st_colors_tested', JSON.stringify([...colorsTested]));
    updateStats();
  }

  // Next color
  function nextColor() {
    currentColorIndex = (currentColorIndex + 1) % colors.length;
    updateFullScreenColor();
  }

  // Previous color
  function previousColor() {
    currentColorIndex = (currentColorIndex - 1 + colors.length) % colors.length;
    updateFullScreenColor();
  }

  // Exit full screen
  function exitFullScreen() {
    document.getElementById('st-fullscreen-test').classList.remove('active');
    document.getElementById('st-fs-instructions').style.display = 'block';
    isFullScreen = false;
  }

  // Keyboard controls
  document.addEventListener('keydown', (e) => {
    if (!isFullScreen) return;

    if (e.key === 'Escape') {
      exitFullScreen();
    } else if (e.key === 'ArrowRight') {
      nextColor();
    } else if (e.key === 'ArrowLeft') {
      previousColor();
    }
  });

  // Click to cycle colors in full screen
  document.getElementById('st-fullscreen-test').addEventListener('click', (e) => {
    if (e.target.tagName !== 'BUTTON') {
      nextColor();
    }
  });

  // Initialize stats
  updateStats();
</script>
