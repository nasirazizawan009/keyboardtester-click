<?php
$wlt_labels = $wlt_labels ?? [];
$L = array_merge([
  'aria' => 'WebRTC IP leak detector.',
  'instruction' => 'WebRTC can leak your real local and public IP addresses to websites even when you are using a VPN. Click Start scan to detect what your browser exposes.',
  'start' => 'Start scan',
  'rescan' => 'Scan again',
  'public_ip' => 'Public IP',
  'public_desc' => 'The IP address websites see. With a VPN on this should match your VPN server, not your ISP.',
  'local_ips' => 'Local IPs',
  'local_desc' => 'Your private network address (192.168.x, 10.x). Modern Chrome hides this behind an mDNS hash ending in .local.',
  'ipv6' => 'IPv6',
  'ipv6_desc' => 'Your IPv6 address. If your VPN does not tunnel IPv6, this leaks even when IPv4 is protected.',
  'status' => 'Status',
  'safe' => 'Safe - no leak detected',
  'leak' => 'LEAK detected',
  'scanning' => 'Scanning...',
  'public_via' => 'Detected via STUN',
  'no_local' => 'None exposed',
  'mdns_note' => 'mDNS hash (not your real IP - safe)',
  'fix_title' => 'How to fix a WebRTC leak',
  'fix_intro' => 'If your real public IP appeared above while you had a VPN active, your VPN is leaking. Pick the section for your browser and follow the steps.',
  'fix_chrome' => 'Chrome and Edge',
  'fix_chrome_body' => 'Chrome has no built-in WebRTC toggle. Install the official "WebRTC Network Limiter" extension from the Chrome Web Store (made by Google) and set it to "Use default public and private interfaces." Or switch to a VPN with built-in WebRTC leak blocking (Mullvad, ProtonVPN, NordVPN, ExpressVPN all advertise it).',
  'fix_firefox' => 'Firefox',
  'fix_firefox_body' => 'Type about:config in the address bar and accept the warning. Search for media.peerconnection.enabled and double-click to set it to false. This disables WebRTC entirely - video calls in Google Meet, WhatsApp Web, and Discord browser will stop working until you turn it back on.',
  'fix_brave' => 'Brave',
  'fix_brave_body' => 'Paste brave://settings/privacy into the address bar, scroll to "WebRTC IP handling policy," and change it to "Disable Non-Proxied UDP." Brave is the only major browser with this option in the UI, no extension required.',
  'fix_safari' => 'Safari (macOS / iOS)',
  'fix_safari_body' => 'On macOS: Safari > Settings > Advanced > Show features for web developers > Feature Flags > disable WebRTC Platform UDP Sockets. On iOS: Settings > Safari > Advanced > Experimental Features > toggle WebRTC mDNS ICE candidates on.',
  'fix_vpn' => 'Best long-term fix: a VPN that blocks WebRTC at the app level',
  'fix_vpn_body' => 'If you need video calls to keep working, do not disable WebRTC - switch to a VPN that routes WebRTC traffic through the tunnel or blocks it at the OS level. Mullvad, ProtonVPN, NordVPN, and ExpressVPN all do this correctly. Many cheap and free VPNs do not.',
  'mdns_title' => 'Seeing a .local address? That is not a leak',
  'mdns_body' => 'Chrome replaces your real local IP with a hashed mDNS string like a1b2c3d4.local. This is a privacy feature added in Chrome 76 (2019) - the hash cannot be tracked back to your real network and does not help fingerprinting.',
  'learn_more' => 'Read the full guide: What is a WebRTC leak and how to fix it',
], $wlt_labels);
?>
<div class="wlt-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="wlt-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="wlt-controls">
    <button type="button" class="wlt-btn wlt-btn-primary" id="wlt-start"><?php echo htmlspecialchars($L['start'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
  <div class="wlt-results">
    <div class="wlt-row">
      <div class="wlt-row-head">
        <span class="wlt-label"><?php echo htmlspecialchars($L['public_ip'], ENT_QUOTES, 'UTF-8'); ?></span>
        <span class="wlt-value" id="wlt-public">-</span>
      </div>
      <div class="wlt-row-desc"><?php echo htmlspecialchars($L['public_desc'], ENT_QUOTES, 'UTF-8'); ?></div>
    </div>
    <div class="wlt-row">
      <div class="wlt-row-head">
        <span class="wlt-label"><?php echo htmlspecialchars($L['local_ips'], ENT_QUOTES, 'UTF-8'); ?></span>
        <span class="wlt-value" id="wlt-local">-</span>
      </div>
      <div class="wlt-row-desc"><?php echo htmlspecialchars($L['local_desc'], ENT_QUOTES, 'UTF-8'); ?></div>
    </div>
    <div class="wlt-row">
      <div class="wlt-row-head">
        <span class="wlt-label"><?php echo htmlspecialchars($L['ipv6'], ENT_QUOTES, 'UTF-8'); ?></span>
        <span class="wlt-value" id="wlt-ipv6">-</span>
      </div>
      <div class="wlt-row-desc"><?php echo htmlspecialchars($L['ipv6_desc'], ENT_QUOTES, 'UTF-8'); ?></div>
    </div>
    <div class="wlt-row wlt-status-row" id="wlt-status-row">
      <div class="wlt-row-head">
        <span class="wlt-label"><?php echo htmlspecialchars($L['status'], ENT_QUOTES, 'UTF-8'); ?></span>
        <span class="wlt-value" id="wlt-status">-</span>
      </div>
    </div>
  </div>

  <div class="wlt-fix" id="wlt-fix" hidden>
    <h3 class="wlt-fix-title"><?php echo htmlspecialchars($L['fix_title'], ENT_QUOTES, 'UTF-8'); ?></h3>
    <p class="wlt-fix-intro"><?php echo htmlspecialchars($L['fix_intro'], ENT_QUOTES, 'UTF-8'); ?></p>
    <details class="wlt-fix-item" open>
      <summary><?php echo htmlspecialchars($L['fix_chrome'], ENT_QUOTES, 'UTF-8'); ?></summary>
      <p><?php echo htmlspecialchars($L['fix_chrome_body'], ENT_QUOTES, 'UTF-8'); ?></p>
    </details>
    <details class="wlt-fix-item">
      <summary><?php echo htmlspecialchars($L['fix_firefox'], ENT_QUOTES, 'UTF-8'); ?></summary>
      <p><?php echo htmlspecialchars($L['fix_firefox_body'], ENT_QUOTES, 'UTF-8'); ?></p>
    </details>
    <details class="wlt-fix-item">
      <summary><?php echo htmlspecialchars($L['fix_brave'], ENT_QUOTES, 'UTF-8'); ?></summary>
      <p><?php echo htmlspecialchars($L['fix_brave_body'], ENT_QUOTES, 'UTF-8'); ?></p>
    </details>
    <details class="wlt-fix-item">
      <summary><?php echo htmlspecialchars($L['fix_safari'], ENT_QUOTES, 'UTF-8'); ?></summary>
      <p><?php echo htmlspecialchars($L['fix_safari_body'], ENT_QUOTES, 'UTF-8'); ?></p>
    </details>
    <div class="wlt-fix-vpn">
      <strong><?php echo htmlspecialchars($L['fix_vpn'], ENT_QUOTES, 'UTF-8'); ?></strong>
      <p><?php echo htmlspecialchars($L['fix_vpn_body'], ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <div class="wlt-fix-mdns">
      <strong><?php echo htmlspecialchars($L['mdns_title'], ENT_QUOTES, 'UTF-8'); ?></strong>
      <p><?php echo htmlspecialchars($L['mdns_body'], ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <a class="wlt-learn" href="<?php echo url('blog/what-is-webrtc-leak-how-to-fix-guide.php'); ?>"><?php echo htmlspecialchars($L['learn_more'], ENT_QUOTES, 'UTF-8'); ?> &rarr;</a>
  </div>
</div>
<style>
  .wlt-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .wlt-tester *{ box-sizing:border-box; }
  .wlt-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .wlt-controls { display:flex; gap:10px; justify-content:center; }
  .wlt-btn { padding:10px 24px; border-radius:999px; border:1px solid transparent; font-weight:700; cursor:pointer; font:inherit; }
  .wlt-btn-primary { background:#7c3aed; color:#fff; }
  .wlt-btn-primary:hover { transform:translateY(-1px); }
  .wlt-btn:disabled { opacity:0.55; cursor:not-allowed; transform:none; }
  .wlt-results { background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; padding:16px; }
  .wlt-row { padding:12px 0; border-bottom:1px solid var(--border-color,#f1f5f9); }
  .wlt-row:last-child { border-bottom:none; }
  .wlt-row-head { display:flex; justify-content:space-between; align-items:center; gap:12px; }
  .wlt-row-desc { margin-top:6px; font-size:0.82rem; color:var(--text-muted,#64748b); line-height:1.45; }
  .wlt-label { font-size:0.9rem; color:var(--text-color,#0f172a); font-weight:700; }
  .wlt-value { font-family:'JetBrains Mono',monospace; font-size:0.95rem; color:var(--text-color,#0f172a); word-break:break-all; text-align:right; max-width:60%; }
  .wlt-status-row .wlt-label { font-size:0.95rem; }
  .wlt-status-row.wlt-safe { background:#f0fdf4; border:1px solid #86efac; border-radius:10px; padding:12px 16px; margin-top:4px; }
  .wlt-status-row.wlt-safe .wlt-value { color:#15803d; font-weight:800; }
  .wlt-status-row.wlt-leak { background:#fef2f2; border:1px solid #fca5a5; border-radius:10px; padding:12px 16px; margin-top:4px; }
  .wlt-status-row.wlt-leak .wlt-value { color:#b91c1c; font-weight:800; }
  .wlt-fix { margin-top:8px; background:#fff7ed; border:1px solid #fed7aa; border-left:4px solid #ea580c; border-radius:12px; padding:18px 20px; }
  .wlt-fix-title { margin:0 0 8px; font-size:1.1rem; color:#9a3412; }
  .wlt-fix-intro { margin:0 0 14px; color:#7c2d12; font-size:0.95rem; }
  .wlt-fix-item { background:#fff; border:1px solid #fed7aa; border-radius:8px; padding:10px 14px; margin-bottom:8px; }
  .wlt-fix-item summary { cursor:pointer; font-weight:700; color:#0f172a; padding:4px 0; }
  .wlt-fix-item p { margin:10px 0 4px; font-size:0.92rem; color:#334155; line-height:1.55; }
  .wlt-fix-vpn, .wlt-fix-mdns { margin-top:14px; padding:12px 14px; background:#fff; border:1px solid #fde68a; border-radius:8px; }
  .wlt-fix-vpn strong, .wlt-fix-mdns strong { display:block; color:#92400e; margin-bottom:4px; font-size:0.95rem; }
  .wlt-fix-vpn p, .wlt-fix-mdns p { margin:0; font-size:0.88rem; color:#475569; line-height:1.5; }
  .wlt-learn { display:inline-block; margin-top:14px; color:#2563eb; font-weight:700; text-decoration:none; font-size:0.95rem; }
  .wlt-learn:hover { text-decoration:underline; }
  .wlt-value.is-mdns-note { color:#16a34a; font-size:0.82rem; font-family:-apple-system,sans-serif; }
</style>
<script>
(function(){
  var startBtn = document.getElementById('wlt-start');
  var pubEl = document.getElementById('wlt-public');
  var locEl = document.getElementById('wlt-local');
  var v6El = document.getElementById('wlt-ipv6');
  var statusEl = document.getElementById('wlt-status');
  var statusRow = document.getElementById('wlt-status-row');
  var fixPanel = document.getElementById('wlt-fix');
  var L = {
    scanning: <?php echo json_encode($L['scanning']); ?>,
    safe: <?php echo json_encode($L['safe']); ?>,
    leak: <?php echo json_encode($L['leak']); ?>,
    no_local: <?php echo json_encode($L['no_local']); ?>,
    mdns_note: <?php echo json_encode($L['mdns_note']); ?>,
    rescan: <?php echo json_encode($L['rescan']); ?>,
    start: <?php echo json_encode($L['start']); ?>
  };

  function detect() {
    startBtn.disabled = true;
    pubEl.textContent = locEl.textContent = v6El.textContent = '-';
    locEl.classList.remove('is-mdns-note');
    statusEl.textContent = L.scanning;
    statusRow.classList.remove('wlt-safe','wlt-leak');
    fixPanel.hidden = true;
    var locals = new Set(), publics = new Set(), v6s = new Set(), mdnsHashes = new Set();
    var pc;
    try {
      pc = new RTCPeerConnection({iceServers:[{urls:'stun:stun.l.google.com:19302'}]});
    } catch(e) {
      statusEl.textContent = 'WebRTC unavailable: '+e.message;
      startBtn.disabled = false;
      return;
    }
    pc.createDataChannel('');
    pc.onicecandidate = function(e){
      if (!e.candidate) { finalize(); return; }
      var s = e.candidate.candidate;
      var mdnsMatch = s.match(/([a-f0-9-]{8,}\.local)/i);
      if (mdnsMatch) mdnsHashes.add(mdnsMatch[1]);
      var ipMatch = s.match(/(\d+\.\d+\.\d+\.\d+)/g);
      var v6Match = s.match(/([a-f0-9:]+:+)+[a-f0-9]+/gi);
      if (ipMatch) ipMatch.forEach(function(ip){
        if (s.indexOf('typ host') !== -1) locals.add(ip);
        else if (s.indexOf('typ srflx') !== -1) publics.add(ip);
      });
      if (v6Match) v6Match.forEach(function(v6){ if (v6.indexOf(':') !== -1 && v6.length > 8) v6s.add(v6); });
    };
    pc.createOffer().then(function(offer){ return pc.setLocalDescription(offer); }).catch(function(){});
    setTimeout(finalize, 3000);
    var done = false;
    function finalize(){
      if (done) return; done = true;
      try { pc.close(); } catch(e) {}
      pubEl.textContent = publics.size ? Array.from(publics).join(', ') : L.no_local;
      if (locals.size) {
        locEl.textContent = Array.from(locals).join(', ');
      } else if (mdnsHashes.size) {
        locEl.textContent = L.mdns_note;
        locEl.classList.add('is-mdns-note');
      } else {
        locEl.textContent = L.no_local;
      }
      v6El.textContent = v6s.size ? Array.from(v6s).join(', ') : L.no_local;
      var leak = publics.size > 0 || locals.size > 0 || v6s.size > 0;
      statusEl.textContent = leak ? L.leak : L.safe;
      statusRow.classList.add(leak ? 'wlt-leak' : 'wlt-safe');
      fixPanel.hidden = !leak;
      startBtn.disabled = false;
      startBtn.textContent = L.rescan;
    }
  }

  startBtn.addEventListener('click', detect);
})();
</script>
