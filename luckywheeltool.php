<?php
// luckywheeltool.php — embeddable Lucky Name Wheel module (no <html> shell)
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
    --ring: rgba(125,139,193,0.35);
    --border: #e2e8f0;
    --shadow: 0 10px 25px rgba(17, 24, 39, 0.08);
  }
  .lw-container { max-width: 1200px; margin: 0 auto; padding: clamp(8px, 1.5vw, 16px); }
  .lw-title { display: flex; align-items: center; gap: 12px; margin: 4px 0 12px; }
  .lw-badge { padding: 6px 10px; border-radius: 8px; font-weight: 700; font-size: 12px; letter-spacing: .08em; text-transform: uppercase; background: linear-gradient(90deg, var(--primary), var(--primary-2)); color: #fff; box-shadow: var(--shadow); }
  .lw-title h1 { font-size: clamp(20px, 2.2vw, 30px); margin: 0; line-height: 1.2; }
  .lw-sub { color: var(--muted); margin: 4px 0 12px; }

  .lw-grid { display: grid; grid-template-columns: 1fr 1fr; gap: clamp(12px, 2.2vw, 24px); align-items: start; }
  @media (max-width: 1080px) { .lw-grid { grid-template-columns: 1fr; } }

  .lw-card { background: var(--card); border: 1px solid var(--border); border-radius: 16px; box-shadow: var(--shadow); }

  .lw-input { padding: 16px; }
  .lw-row { display: grid; grid-template-columns: 1fr auto; gap: 10px; }
  .lw-stack { display: grid; gap: 12px; }

  .lw-label { font-size: 14px; color: var(--muted); }

  .lw-field { width: 100%; padding: 11px 13px; border-radius: 10px; border: 1px solid var(--border); outline: none; background: #fff; color: var(--text); box-shadow: 0 0 0 0 var(--ring); transition: box-shadow .2s, border-color .2s; }
  .lw-field:focus { border-color: var(--primary-2); box-shadow: 0 0 0 4px var(--ring); }

  .lw-btn { appearance: none; border: none; padding: 11px 15px; border-radius: 10px; font-weight: 700; cursor: pointer; transition: transform .05s ease, filter .2s ease, opacity .2s ease; }
  .lw-btn:active { transform: translateY(1px); }
  .lw-btn-primary { background: linear-gradient(180deg, var(--primary), var(--primary-2)); color: #fff; }
  .lw-btn-ghost { background: #fff; color: var(--primary); border: 1px solid var(--border); }
  .lw-btn-accent { background: var(--accent); color: #111827; }
  .lw-btn-danger { background: var(--danger); color: #fff; }

  .lw-list { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 10px; margin-top: 10px; }

  .lw-chip { display: inline-flex; align-items: center; gap: 8px; padding: 8px 12px; border-radius: 999px; border: 1px solid var(--border); background: #fff; color: var(--muted); font-size: 12px; }
  .lw-chip b { color: var(--text); font-weight: 700; font-size: 13px; }

  .lw-wheel-card { padding: 14px; display: grid; gap: 10px; align-items: center; justify-items: center; position: relative; }
  .lw-wheel-wrap { position: relative; width: min(520px, 85vw); aspect-ratio: 1; }
  @media (min-height: 700px) { .lw-wheel-wrap { width: min(580px, 78vw); } }
  canvas#lw-wheel { width: 100%; height: 100%; display: block; }
  .lw-needle { position: absolute; top: -6px; left: 50%; transform: translateX(-50%); width: 0; height: 0; border-left: 12px solid transparent; border-right: 12px solid transparent; border-bottom: 18px solid var(--accent); filter: drop-shadow(0 6px 10px rgba(0,0,0,.15)); }

  .lw-controls { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
  .lw-inline { display: inline-flex; align-items: center; gap: 8px; }
  .lw-toggle { width: 46px; height: 28px; background: #e5e7eb; border-radius: 999px; position: relative; transition: background .2s; border: 1px solid var(--border); }
  .lw-toggle[data-on="true"] { background: rgba(16,185,129,.20); border-color: rgba(16,185,129,.35); }
  .lw-knob { position: absolute; top: 3px; left: 3px; width: 22px; height: 22px; background: #fff; border-radius: 999px; box-shadow: var(--shadow); transition: left .2s; }
  .lw-toggle[data-on="true"] .lw-knob { left: 21px; }

  .lw-status { text-align: center; color: var(--muted); min-height: 22px; }
  .lw-winner { font-weight: 800; color: var(--success); }

  .lw-footer-actions { display: flex; gap: 10px; flex-wrap: wrap; justify-content: space-between; align-items: center; padding-top: 8px; border-top: 1px dashed var(--border); }

  .lw-legend { display: flex; flex-wrap: wrap; gap: 6px; align-items: center; color: var(--muted); font-size: 12px; }
  .lw-legend .swatch { width: 10px; height: 10px; border-radius: 2px; display: inline-block; }
  .lw-legend .out { background: #e5e7eb; }
  .lw-legend .in { background: #dbeafe; }

  .lw-leader { padding: 16px; }
  .lw-leader-head { display:flex; align-items:center; justify-content:space-between; gap:10px; }
  .lw-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
  .lw-table th, .lw-table td { font-size: 13px; text-align: left; padding: 8px 10px; border-bottom: 1px solid var(--border); }
  .lw-table th { color: var(--muted); font-weight: 700; }
  .lw-pos-1 { background: #ecfdf5; }
  .lw-pos-2 { background: #eff6ff; }
  .lw-pos-3 { background: #fff7ed; }

  .lw-pill { padding: 4px 8px; border-radius: 999px; font-size: 12px; border:1px solid var(--border); }
  .lw-pill-fun { background:#fffbeb; color:#92400e; border-color:#fde68a; }

  .lw-confetti { pointer-events:none; position:fixed; inset:0; overflow:hidden; z-index: 50; }
  .lw-confetti span { position:absolute; top:-10vh; font-size: 20px; animation: lw-fall linear forwards; }
  @keyframes lw-fall { to { transform: translateY(110vh) rotate(720deg); opacity: .9; } }

  /* Guidelines Section - Matching Site Theme */
  .lw-guidelines {
    max-width: 1200px;
    margin: 20px auto 10px;
    padding: 25px;
    background: linear-gradient(135deg, #1e1e2f, #2a2a3d);
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    color: #ffffff;
  }

  .lw-guidelines h2 {
    font-size: 2rem;
    color: #f59e0b;
    margin-top: 0;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .lw-guidelines h3 {
    font-size: 1.5rem;
    color: #4b5eaa;
    margin-top: 25px;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .lw-guidelines p {
    font-size: 1rem;
    line-height: 1.7;
    margin-bottom: 15px;
    color: #e2e8f0;
  }

  .lw-guidelines ul {
    list-style: none;
    padding: 0;
    margin: 15px 0;
  }

  .lw-guidelines li {
    margin-bottom: 12px;
    padding-left: 5px;
    line-height: 1.6;
  }

  .lw-guidelines li span.highlight {
    color: #f59e0b;
    font-weight: bold;
  }

  .lw-guidelines a {
    color: #7d8bc1;
    text-decoration: none;
    transition: color 0.3s;
    font-weight: 500;
  }

  .lw-guidelines a:hover {
    color: #f59e0b;
    text-decoration: underline;
  }

  .lw-guidelines .tip-box {
    background: rgba(75, 94, 170, 0.15);
    border-left: 4px solid #4b5eaa;
    padding: 15px 20px;
    margin: 20px 0;
    border-radius: 8px;
  }

  .lw-guidelines .feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin: 20px 0;
  }

  .lw-guidelines .feature-card {
    background: rgba(255, 255, 255, 0.05);
    padding: 15px;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
  }

  .lw-guidelines .feature-card strong {
    color: #f59e0b;
    display: block;
    margin-bottom: 8px;
    font-size: 1.1rem;
  }

  @media (max-width: 768px) {
    .lw-guidelines {
      padding: 20px;
      margin: 20px 10px;
    }
    
    .lw-guidelines h2 {
      font-size: 1.6rem;
    }
    
    .lw-guidelines h3 {
      font-size: 1.3rem;
    }
    
    .lw-guidelines .feature-grid {
      grid-template-columns: 1fr;
    }
  }
</style>

<div class="lw-container">
  <div class="lw-grid">
    <section class="lw-card lw-input">
      <div class="lw-stack">
        <div class="lw-inline" style="justify-content:space-between">
          <div style="flex:1">
            <label class="lw-label" for="lw-count">How many participants?</label>
            <div class="lw-row">
              <input id="lw-count" class="lw-field" type="number" min="1" max="500" placeholder="e.g. 6"/>
              <button id="lw-generate" class="lw-btn lw-btn-ghost" type="button">Generate</button>
            </div>
          </div>
          <span class="lw-pill lw-pill-fun" title="Adds emoji & nicknames">Fun mode ON</span>
        </div>

        <div id="lw-namesWrapper" class="lw-stack" style="display:none">
          <label class="lw-label">Enter names</label>
          <div id="lw-names" class="lw-list"></div>
          <div class="lw-controls" style="justify-content:flex-end">
            <button id="lw-fillDemo" class="lw-btn lw-btn-ghost" type="button" title="Fill with demo names">Demo</button>
            <button id="lw-toWheel" class="lw-btn lw-btn-primary" type="button">Build Wheel</button>
          </div>
        </div>

        <div id="lw-activeList" class="lw-stack" style="display:none">
          <label class="lw-label">Participants (live)</label>
          <div id="lw-chips" class="lw-list"></div>
          <div class="lw-footer-actions">
            <div class="lw-legend">
              <span class="swatch in"></span> In the wheel
              <span class="swatch out"></span> Eliminated
            </div>
            <div class="lw-inline">
              <div id="lw-autoplay" class="lw-toggle" role="switch" aria-checked="false" tabindex="0"><span class="lw-knob"></span></div>
              <small>Auto-continue until last name</small>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="lw-card lw-wheel-card">
      <div class="lw-wheel-wrap" id="lw-wheelWrap">
        <div class="lw-needle"></div>
        <canvas id="lw-wheel" width="1000" height="1000" aria-label="Name wheel"></canvas>
      </div>
      <div class="lw-controls">
        <button id="lw-spin" class="lw-btn lw-btn-accent" type="button" disabled>Spin</button>
        <button id="lw-reset" class="lw-btn lw-btn-danger" type="button" disabled>Reset</button>
        <button id="lw-exportCsv" class="lw-btn lw-btn-ghost" type="button" disabled>Export CSV</button>
        <button id="lw-copyBoard" class="lw-btn lw-btn-ghost" type="button" disabled>Copy Leaderboard</button>
      </div>
      <div class="lw-status" id="lw-status">Add names to begin.</div>
    </section>

    <section class="lw-card lw-leader">
      <div class="lw-leader-head">
        <h3 style="margin:0;font-size:16px">Leaderboard (live positions)</h3>
        <small id="lw-leaderCount" class="muted"></small>
      </div>
      <table class="lw-table" id="lw-leaderTable" aria-label="Leaderboard">
        <thead>
          <tr><th>Pos</th><th>Name</th><th>Alias</th><th>Status</th></tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>
  </div>
</div>
<div id="lw-confetti" class="lw-confetti" style="display:none"></div>

<!-- SEO-Optimized Guidelines and Help Section -->
<div class="lw-guidelines">
  <h2>🎯 Lucky Name Wheel - Complete Guide</h2>
  <p>Welcome to the Lucky Name Wheel, your go-to random name picker for making fair decisions, running contests, selecting teams, and more. This interactive spinning wheel tool eliminates names one by one until a final winner emerges. Perfect for educators, event organizers, content creators, and anyone who needs an unbiased selection method.</p>

  <h3 id="how-to-use">🛠️ How to Use the Lucky Name Wheel</h3>
  <ul>
    <li><span class="highlight">✦ Enter Participant Count:</span> Type the number of participants (1-500) in the input field and click "Generate" to create name input fields.</li>
    <li><span class="highlight">✦ Add Names:</span> Fill in each participant's name. You can manually enter names or click "Demo" to auto-fill with sample names for testing.</li>
    <li><span class="highlight">✦ Build the Wheel:</span> Click "Build Wheel" to create your colorful spinning wheel with all participants displayed.</li>
    <li><span class="highlight">✦ Spin to Select:</span> Press the "Spin" button to randomly select and eliminate one name. Watch the wheel spin with realistic physics!</li>
    <li><span class="highlight">✦ Auto-Play Mode:</span> Toggle the auto-continue switch to automatically spin until only one winner remains.</li>
    <li><span class="highlight">✦ Track Progress:</span> Monitor eliminated participants in real-time with visual indicators (blue = active, gray = eliminated).</li>
    <li><span class="highlight">✦ Export Results:</span> Download your results as CSV or copy the leaderboard to share with others.</li>
    <li><span class="highlight">✦ Reset Anytime:</span> Click "Reset" to start over with new participants or run the selection again.</li>
  </ul>

  <h3>✨ Key Features & Benefits</h3>
  <div class="feature-grid">
    <div class="feature-card">
      <strong>🎨 Fun Emoji Mode</strong>
      <p>Each participant gets assigned a random emoji and fun nickname, making the experience more engaging and entertaining.</p>
    </div>
    <div class="feature-card">
      <strong>📊 Live Leaderboard</strong>
      <p>Track elimination order in real-time with a dynamic leaderboard showing positions, names, and status updates.</p>
    </div>
    <div class="feature-card">
      <strong>🎪 Smooth Animations</strong>
      <p>Enjoy realistic wheel spinning with smooth physics, suspenseful rotations, and celebratory confetti for the winner!</p>
    </div>
    <div class="feature-card">
      <strong>💾 Export Options</strong>
      <p>Export results to CSV format or copy leaderboard text to clipboard for easy sharing and record-keeping.</p>
    </div>
    <div class="feature-card">
      <strong>⚡ Auto-Continue Mode</strong>
      <p>Enable auto-play to automatically eliminate participants until one champion remains - perfect for quick selections.</p>
    </div>
    <div class="feature-card">
      <strong>📱 Fully Responsive</strong>
      <p>Works seamlessly on desktop, tablet, and mobile devices with optimized touch controls and scaling.</p>
    </div>
  </div>

  <h3>🎯 Perfect Use Cases</h3>
  <ul>
    <li><span class="highlight">✦ Social Media Giveaways:</span> Fairly select winners from contest entries, Instagram comments, or Twitter followers.</li>
    <li><span class="highlight">✦ Classroom Activities:</span> Choose students for presentations, group leaders, or answering questions randomly.</li>
    <li><span class="highlight">✦ Team Building:</span> Create random teams, assign roles, or pick volunteers for activities and events.</li>
    <li><span class="highlight">✦ Prize Drawings:</span> Conduct transparent and exciting prize draws at corporate events, parties, or fundraisers.</li>
    <li><span class="highlight">✦ Decision Making:</span> Break ties, choose between options, or make group decisions in a fun, unbiased way.</li>
    <li><span class="highlight">✦ Tournament Brackets:</span> Generate elimination orders for gaming tournaments, sports competitions, or contests.</li>
    <li><span class="highlight">✦ Live Streaming:</span> Engage viewers by spinning the wheel live to select chat participants, donate prizes, or play games.</li>
  </ul>

  <div class="tip-box">
    <strong>💡 Pro Tip:</strong> For maximum fairness and transparency, share your screen or record the spinning process when conducting official contests or giveaways. The live leaderboard and export features help maintain clear records of all eliminations.
  </div>

  <h3>🔧 Tips for Best Results</h3>
  <ul>
    <li><span class="highlight">✦ Test First:</span> Use the "Demo" button to test the wheel with sample names before your actual event.</li>
    <li><span class="highlight">✦ Clear Names:</span> Enter distinct, readable names to avoid confusion in results and leaderboards.</li>
    <li><span class="highlight">✦ Save Records:</span> Export results to CSV immediately after completion to maintain accurate records.</li>
    <li><span class="highlight">✦ Build Suspense:</span> Disable auto-play and manually spin for each elimination to create excitement.</li>
    <li><span class="highlight">✦ Mobile Friendly:</span> The wheel works great on mobile devices - perfect for on-the-go selections.</li>
    <li><span class="highlight">✦ Multiple Rounds:</span> Click "Reset" to run multiple rounds with the same or different participants.</li>
  </ul>

  <h3>🚀 Why Choose Lucky Name Wheel?</h3>
  <p>Unlike simple random name pickers, our Lucky Name Wheel provides a visually engaging, interactive experience that builds anticipation and excitement. The elimination format ensures everyone sees when and how participants are selected, making the process completely transparent and fair. With features like emoji mode, live leaderboards, and export options, it's the most comprehensive free random name picker available online.</p>

  <p><strong>Key Advantages:</strong></p>
  <ul>
    <li><span class="highlight">✦ 100% Free:</span> No registration, downloads, or hidden costs required.</li>
    <li><span class="highlight">✦ Privacy First:</span> All processing happens in your browser - no data is sent to servers.</li>
    <li><span class="highlight">✦ No Installation:</span> Works instantly in any modern web browser without plugins or apps.</li>
    <li><span class="highlight">✦ Unlimited Uses:</span> Spin as many times as you want with unlimited participants.</li>
    <li><span class="highlight">✦ Professional Results:</span> Generate shareable, documented results for official purposes.</li>
  </ul>

  <h3>🔗 Explore More Tools</h3>
  <p>Enhance your workflow with other free tools on <a href="https://www.keyboardtester.click/">KeyboardTester.click</a>:</p>
  <ul>
    <li><span class="highlight">✦ <a href="https://www.keyboardtester.click/">Keyboard Tester</a>:</span> Test all keyboard keys and troubleshoot issues online.</li>
    <li><span class="highlight">✦ <a href="https://www.keyboardtester.click/keyboard_typing_test.html">Typing Speed Test</a>:</span> Measure your WPM and accuracy with customizable tests.</li>
    <li><span class="highlight">✦ <a href="https://www.keyboardtester.click/mouse-test.html">Mouse Tester</a>:</span> Check mouse buttons, scroll wheel, and movement accuracy.</li>
    <li><span class="highlight">✦ <a href="https://www.keyboardtester.click/mouse_speed_tester.html">Click Speed Test</a>:</span> Measure your clicks per second (CPS) for gaming.</li>
    <li><span class="highlight">✦ <a href="https://www.keyboardtester.click/QR_code_generator_scanner.html">QR Code Generator</a>:</span> Create custom QR codes instantly for any purpose.</li>
    <li><span class="highlight">✦ <a href="https://www.keyboardtester.click/whatsapp-link-generator.html">WhatsApp Link Generator</a>:</span> Generate direct chat links and QR codes.</li>
  </ul>

  <h3>❓ Frequently Asked Questions</h3>
  <p><strong>Q: Is the Lucky Name Wheel truly random?</strong><br>
  A: Yes! The wheel uses JavaScript's built-in random number generator to ensure each spin is completely random and unbiased.</p>

  <p><strong>Q: How many names can I add to the wheel?</strong><br>
  A: You can add up to 500 participants. For best visual results, 3-50 names work optimally.</p>

  <p><strong>Q: Can I use this for official contests?</strong><br>
  A: Absolutely! The export and leaderboard features provide transparent documentation for official use.</p>

  <p><strong>Q: Does the wheel work on mobile devices?</strong><br>
  A: Yes, the Lucky Name Wheel is fully responsive and works perfectly on smartphones and tablets.</p>

  <p><strong>Q: Is my data stored or shared?</strong><br>
  A: No. All processing happens locally in your browser. We don't collect, store, or share any data.</p>

  <h3>🆘 Need Help?</h3>
  <p>Have questions or need assistance? Visit our <a href="https://www.keyboardtester.click/about-us.html">About Us</a> page or check out our <a href="https://keyboardtester.click/blog/">Blog</a> for detailed guides and tips. Follow us on <a href="https://x.com/keyboardtester" target="_blank" rel="noopener">Twitter</a> for updates!</p>
</div>

<script>
(()=>{
  'use strict';
  const countEl = document.getElementById('lw-count');
  const generateBtn = document.getElementById('lw-generate');
  const namesWrapper = document.getElementById('lw-namesWrapper');
  const namesDiv = document.getElementById('lw-names');
  const fillDemoBtn = document.getElementById('lw-fillDemo');
  const toWheelBtn = document.getElementById('lw-toWheel');
  const activeList = document.getElementById('lw-activeList');
  const chipsDiv = document.getElementById('lw-chips');
  const canvas = document.getElementById('lw-wheel');
  const ctx = canvas.getContext('2d');
  const status = document.getElementById('lw-status');
  const spinBtn = document.getElementById('lw-spin');
  const resetBtn = document.getElementById('lw-reset');
  const exportCsv = document.getElementById('lw-exportCsv');
  const copyBoard = document.getElementById('lw-copyBoard');
  const autoplay = document.getElementById('lw-autoplay');
  const leaderTable = document.getElementById('lw-leaderTable').querySelector('tbody');
  const leaderCount = document.getElementById('lw-leaderCount');
  const confetti = document.getElementById('lw-confetti');

  let entries = [], eliminated = [], angle = 0, spinning = false;
  const emojis = ['😀','😁','😂','🤣','😃','😄','😅','😆','😉','😊','😋','😎','😍','😘','😗','😙','😚','🙂','🤗','🤩','🤔','🤨','😐','😑','😶','🙄','😏','😣','😥','😮','🤐','😯','😪','😫','😴','😌','😛','😜','😝','🤤','😒','😓','😔','😕','🙃','🤑','😲','☹️','🙁','😖','😞','😟','😤','😢','😭','😦','😧','😨','😩','🤯','😬','😰','😱','🥵','🥶','😳','🤪','😵','😡','😠','🤬','🥺','👻','💀','💩','🤡','👹','👺','👽','🤖','🎃','😺','😸','😹','😻','😼','😽','🙀','😿','😾'];
  const nicks = ['The Bold','The Swift','The Brave','The Mighty','Champion','Hero','Star','Legend','Tiger','Dragon','Eagle','Falcon','Wolf','Lion','Bear','Fox','Shadow','Thunder','Lightning','Storm','Phoenix','Warrior','Knight','Wizard','Ninja','Samurai','Viking','Pirate','Gladiator','Ace','King','Queen','Prince','Princess','Boss','Chief','Captain','Master','Guru','Sage'];

  function randomEmoji(){ return emojis[Math.floor(Math.random()*emojis.length)]; }
  function randomNick(){ return nicks[Math.floor(Math.random()*nicks.length)]; }
  function alive(){ return entries.filter(e=>e.alive); }

  generateBtn.addEventListener('click', ()=>{
    const count = parseInt(countEl.value) || 0;
    if (count < 1 || count > 500){ alert('Enter 1–500'); return; }
    namesDiv.innerHTML = '';
    for (let i=0; i<count; i++){
      const inp = document.createElement('input');
      inp.type = 'text'; inp.className = 'lw-field'; inp.placeholder = `Name ${i+1}`;
      namesDiv.appendChild(inp);
    }
    namesWrapper.style.display = 'grid';
    activeList.style.display = 'none';
    status.textContent = 'Add names to begin.';
  });

  const demos = ['Alice','Bob','Charlie','Diana','Eve','Frank','Grace','Henry','Ivy','Jack','Karen','Leo','Mia','Nina','Oscar','Paul','Quinn','Rita','Sam','Tina','Uma','Victor','Wendy','Xander','Yara','Zane'];
  fillDemoBtn.addEventListener('click', ()=>{
    const inps = namesDiv.querySelectorAll('input');
    inps.forEach((inp,i)=>{ inp.value = demos[i % demos.length]; });
  });

  toWheelBtn.addEventListener('click', ()=>{
    const inps = Array.from(namesDiv.querySelectorAll('input')).map(inp=>inp.value.trim()).filter(x=>x);
    if (!inps.length){ alert('Enter at least one name!'); return; }
    entries = inps.map(name=>({ name, alias:{ emoji:randomEmoji(), nick:randomNick() }, alive:true }));
    eliminated = [];
    buildChips();
    draw();
    namesWrapper.style.display = 'none';
    activeList.style.display = 'grid';
    spinBtn.disabled = false;
    resetBtn.disabled = false;
    exportCsv.disabled = false;
    copyBoard.disabled = false;
    status.textContent = `Wheel ready! ${entries.length} participants.`;
    updateLeaderboard();
  });

  resetBtn.addEventListener('click', ()=>{
    entries = []; eliminated = []; angle = 0; spinning = false;
    namesWrapper.style.display = 'none';
    activeList.style.display = 'none';
    spinBtn.disabled = true; resetBtn.disabled = true; exportCsv.disabled = true; copyBoard.disabled = true;
    status.textContent = 'Add names to begin.';
    draw();
    updateLeaderboard();
  });

  autoplay.addEventListener('click', ()=>{
    const on = autoplay.getAttribute('data-on') === 'true';
    autoplay.setAttribute('data-on', (!on).toString());
    autoplay.setAttribute('aria-checked', (!on).toString());
  });

  function buildChips(){
    chipsDiv.innerHTML = '';
    entries.forEach(e=>{
      const chip = document.createElement('div');
      chip.className = 'lw-chip';
      chip.style.background = e.alive ? '#dbeafe' : '#e5e7eb';
      chip.innerHTML = `<b>${e.name}</b> ${e.alias.emoji}`;
      chipsDiv.appendChild(chip);
    });
  }

  function resizeWheel(){
    const size = canvas.width = canvas.height = 1000; draw();
  }
  window.addEventListener('resize', resizeWheel);

  function draw(){
    const aliveNow = alive();
    ctx.clearRect(0,0,canvas.width,canvas.height);
    
    // If no entries, draw a default demo wheel
    if (aliveNow.length === 0){ 
      drawDefaultWheel();
      return;
    }
    
    const w = canvas.width, h = canvas.height, cx = w/2, cy = h/2, r = Math.min(w,h)/2 - 20;
    const slice = 2 * Math.PI / aliveNow.length;
    ctx.save(); ctx.translate(cx,cy); ctx.rotate(angle);

    // More vibrant colors
    const cols = ['#ff0080','#00d4ff','#ffaa00','#00ff88','#ff3366','#9d4edd','#06ffa5','#ffd60a','#ff006e','#4cc9f0','#7209b7','#f72585','#4361ee','#4cc9f0'];
    for (let i=0; i<aliveNow.length; i++){
      const start = i * slice, end = (i+1) * slice;
      const grad = ctx.createRadialGradient(0,0,0,0,0,r);
      grad.addColorStop(0, cols[i % cols.length]); 
      grad.addColorStop(0.7, cols[i % cols.length]);
      grad.addColorStop(1, 'rgba(255,255,255,.3)');
      ctx.beginPath(); ctx.moveTo(0,0); ctx.arc(0,0,r-10,start,end); ctx.closePath();
      ctx.fillStyle = grad; ctx.fill();
      ctx.lineWidth = 3; ctx.strokeStyle = 'rgba(255,255,255,.95)'; ctx.stroke();

      ctx.save();
      ctx.rotate(start + (end-start)/2);
      ctx.textAlign = 'right';
      ctx.textBaseline = 'middle';
      ctx.fillStyle = '#ffffff';
      ctx.font = `bold ${Math.max(16, r/16)}px Inter, system-ui, sans-serif`;
      ctx.shadowColor = 'rgba(0,0,0,0.5)';
      ctx.shadowBlur = 4;
      const txt = aliveNow[i]?.name ?? '';
      const emoji = aliveNow[i]?.alias?.emoji ?? '';
      ctx.fillText(`${txt} ${emoji}`, r-28, 0);
      ctx.shadowBlur = 0;
      ctx.restore();
    }

    ctx.beginPath(); ctx.arc(0,0, 28, 0, 2*Math.PI); ctx.fillStyle = '#fff'; ctx.fill();
    ctx.lineWidth = 4; ctx.strokeStyle = '#f59e0b'; ctx.stroke();

    ctx.restore();
  }

  function drawDefaultWheel(){
    const w = canvas.width, h = canvas.height, cx = w/2, cy = h/2, r = Math.min(w,h)/2 - 20;
    const demoSlices = ['Start', 'Add', 'Your', 'Names', 'Here', '🎯'];
    const slice = 2 * Math.PI / demoSlices.length;
    
    ctx.save(); 
    ctx.translate(cx,cy);
    
    const cols = ['#ff0080','#00d4ff','#ffaa00','#00ff88','#ff3366','#9d4edd'];
    for (let i=0; i<demoSlices.length; i++){
      const start = i * slice, end = (i+1) * slice;
      const grad = ctx.createRadialGradient(0,0,0,0,0,r);
      grad.addColorStop(0, cols[i % cols.length]); 
      grad.addColorStop(0.7, cols[i % cols.length]);
      grad.addColorStop(1, 'rgba(255,255,255,.3)');
      
      ctx.beginPath(); 
      ctx.moveTo(0,0); 
      ctx.arc(0,0,r-10,start,end); 
      ctx.closePath();
      ctx.fillStyle = grad; 
      ctx.fill();
      ctx.lineWidth = 3; 
      ctx.strokeStyle = 'rgba(255,255,255,.95)'; 
      ctx.stroke();

      ctx.save();
      ctx.rotate(start + (end-start)/2);
      ctx.textAlign = 'right';
      ctx.textBaseline = 'middle';
      ctx.fillStyle = '#ffffff';
      ctx.font = `bold ${Math.max(18, r/14)}px Inter, system-ui, sans-serif`;
      ctx.shadowColor = 'rgba(0,0,0,0.5)';
      ctx.shadowBlur = 4;
      ctx.fillText(demoSlices[i], r-28, 0);
      ctx.shadowBlur = 0;
      ctx.restore();
    }

    ctx.beginPath(); 
    ctx.arc(0,0, 28, 0, 2*Math.PI); 
    ctx.fillStyle = '#fff'; 
    ctx.fill();
    ctx.lineWidth = 4; 
    ctx.strokeStyle = '#f59e0b'; 
    ctx.stroke();

    ctx.restore();
  }

  function spinOnce(){
    if (spinning) return;
    const aliveNow = alive();
    if (aliveNow.length <= 1){
      if (aliveNow.length === 1) status.innerHTML = `Final winner: <span class=\"lw-winner\">${aliveNow[0].name} ${aliveNow[0].alias.emoji}</span>`;
      spinBtn.disabled = true; return;
    }
    spinning = true; spinBtn.disabled = true;

    const count = aliveNow.length;
    const chosen = Math.floor(Math.random() * count);
    const slice = 2 * Math.PI / count;
    const targetMid = (chosen + 0.5) * slice;
    let delta = (2*Math.PI - ((angle % (2*Math.PI)) + targetMid)) % (2*Math.PI);
    const extra = (Math.floor(Math.random()*3) + 4) * 2 * Math.PI; // 4–6 spins
    const total = delta + extra;
    const dur = 3200 + Math.random()*700; // 3.2–3.9s
    const start = performance.now();
    const startAngle = angle; const endAngle = angle + total;
    const easeOut = (t)=>1-Math.pow(1-t,3);

    function frame(now){
      const p = Math.min(1, (now - start) / dur);
      angle = startAngle + (endAngle - startAngle) * easeOut(p);
      draw();
      if (p < 1) requestAnimationFrame(frame); else landed();
    }
    requestAnimationFrame(frame);

    function landed(){
      const winner = aliveNow[chosen];
      winner.alive = false;
      eliminated.push(winner);
      buildChips();
      draw();
      const remaining = alive().length;
      status.innerHTML = `Selected: <b>${winner.name}</b> ${winner.alias.emoji} — ${remaining} left`;
      updateLeaderboard();
      spinning = false;
      if (remaining <= 1){
        const last = alive()[0];
        status.innerHTML = `Final winner: <span class=\"lw-winner\">${last.name} ${last.alias.emoji}</span>`;
        spinBtn.disabled = true;
        showConfetti();
      } else if (autoplay.getAttribute('data-on') === 'true') {
        setTimeout(() => { spinBtn.disabled = false; spinOnce(); }, 800);
      } else {
        spinBtn.disabled = false;
      }
    }
  }

  spinBtn.addEventListener('click', spinOnce);

  function currentLeaderboard(){
    const aliveNow = alive();
    const list = [];
    if (aliveNow.length === 1) list.push(aliveNow[0]);
    list.push(...[...eliminated].reverse());
    return list;
  }

  function updateLeaderboard(){
    const aliveNow = alive();
    const total = entries.length;
    leaderCount.textContent = total ? `${total - aliveNow.length} / ${total} decided` : '';
    const board = currentLeaderboard();
    leaderTable.innerHTML = '';
    if (!total) return;

    const rows = [];
    const finalKnown = aliveNow.length === 1;
    if (finalKnown){
      board.forEach((e, idx) => rows.push(rowFor(idx+1, e, 'Finalized')));
    } else {
      const provisional = [...eliminated].reverse();
      provisional.forEach((e, idx) => rows.push(rowFor(idx+1, e, 'Eliminated order')));
      aliveNow.forEach(e => rows.push(rowFor('-', e, 'Still in play')));
    }
    leaderTable.append(...rows);
  }

  function rowFor(pos, e, statusTxt){
    const tr = document.createElement('tr');
    if (pos === 1) tr.classList.add('lw-pos-1');
    if (pos === 2) tr.classList.add('lw-pos-2');
    if (pos === 3) tr.classList.add('lw-pos-3');
    tr.innerHTML = `<td style="width:60px">${pos}</td><td>${e.name}</td><td>${e.alias.emoji} ${e.alias.nick}</td><td>${statusTxt}</td>`;
    return tr;
  }

  exportCsv.addEventListener('click', () => {
    const aliveNow = alive();
    const finalKnown = aliveNow.length === 1;
    let board = [];
    if (finalKnown) board = currentLeaderboard();
    else board = [...eliminated].reverse();

    const lines = [['position','name','emoji','nickname','status']];
    if (finalKnown){
      board.forEach((e, i) => lines.push([i+1, e.name, e.alias.emoji, e.alias.nick, 'final']));
    } else {
      board.forEach((e, i) => lines.push([i+1, e.name, e.alias.emoji, e.alias.nick, 'eliminated']));
      aliveNow.forEach(e => lines.push(['-', e.name, e.alias.emoji, e.alias.nick, 'still in play']));
    }
    const csv = lines.map(r => r.map(x => '"'+String(x).replaceAll('"','""')+'"').join(',')).join('\n');
    const blob = new Blob([csv], {type:'text/csv'});
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url; a.download = 'lucky-wheel-results.csv'; a.click();
    URL.revokeObjectURL(url);
  });

  copyBoard.addEventListener('click', () => {
    const aliveNow = alive();
    const finalKnown = aliveNow.length === 1;
    const board = finalKnown ? currentLeaderboard() : [...eliminated].reverse();
    const lines = [];
    if (finalKnown) lines.push('Leaderboard (final)'); else lines.push('Leaderboard (in progress)');
    board.forEach((e, i) => lines.push(`${i+1}. ${e.name} ${e.alias.emoji} — ${e.alias.nick}`));
    if (!finalKnown) aliveNow.forEach(e => lines.push(`-. ${e.name} ${e.alias.emoji} — ${e.alias.nick} (still in play)`));
    navigator.clipboard.writeText(lines.join('\n')).then(()=>{ status.textContent = 'Leaderboard copied to clipboard!'; setTimeout(()=>status.textContent='',1200); });
  });

  function showConfetti(){
    confetti.innerHTML = '';
    confetti.style.display = 'block';
    const pieces = 80;
    const icons = ['🎉','🎊','✨','💥','🌟','🥳'];
    for (let i=0;i<pieces;i++){
      const span = document.createElement('span');
      span.textContent = icons[i % icons.length];
      span.style.left = (Math.random()*100)+'vw';
      span.style.animationDuration = (3 + Math.random()*2)+'s';
      span.style.animationDelay = (Math.random()*0.8)+'s';
      confetti.appendChild(span);
    }
    setTimeout(hideConfetti, 5200);
  }
  function hideConfetti(){ confetti.style.display = 'none'; confetti.innerHTML = ''; }

  resizeWheel();
})();
</script>