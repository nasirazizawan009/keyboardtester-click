<?php
// guild_name_generator_tool.php – embeddable Guild Name Generator
?>
<style>
  .gn-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px);--gn-primary:#6d28d9;--gn-primary-2:#a78bfa;--gn-accent:#f59e0b;--gn-success:#10b981;--gn-border:#e2e8f0;--gn-muted:#64748b;--gn-text:#0f172a;--gn-card:#fff}
  .gn-card{background:var(--gn-card);border:1px solid var(--gn-border);border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .gn-card h3{margin:0 0 12px;font-size:16px}
  .gn-controls{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:12px}
  .gn-field label{display:block;font-size:12px;font-weight:700;color:var(--gn-muted);text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px}
  .gn-field select,.gn-field input{width:100%;padding:10px 12px;border:1px solid var(--gn-border);border-radius:8px;font-size:14px;background:#fff}
  .gn-btn{appearance:none;border:none;padding:12px 18px;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px}
  .gn-btn-primary{background:linear-gradient(180deg,var(--gn-primary),var(--gn-primary-2));color:#fff}
  .gn-btn-ghost{background:#f1f5f9;color:var(--gn-text);border:1px solid var(--gn-border)}
  .gn-actions{display:flex;flex-wrap:wrap;gap:10px;margin-top:14px}
  .gn-list{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:10px;margin-top:16px}
  .gn-item{display:flex;justify-content:space-between;align-items:center;padding:12px 14px;background:#f8fafc;border:1px solid var(--gn-border);border-radius:10px;cursor:pointer;transition:all .15s}
  .gn-item:hover{background:#f5f3ff;transform:translateY(-1px)}
  .gn-item-name{font-weight:700;color:var(--gn-text);font-size:15px;word-break:break-word}
  .gn-item-actions{display:flex;gap:6px;flex-shrink:0;margin-left:8px}
  .gn-icon-btn{appearance:none;background:transparent;border:none;cursor:pointer;font-size:18px;padding:4px;line-height:1;color:var(--gn-muted)}
  .gn-icon-btn:hover{color:var(--gn-accent)}
  .gn-icon-btn.favored{color:var(--gn-accent)}
  .gn-toast{position:fixed;bottom:20px;left:50%;transform:translateX(-50%);background:var(--gn-success);color:#fff;padding:10px 20px;border-radius:8px;font-weight:700;font-size:14px;box-shadow:0 10px 25px rgba(0,0,0,.2);opacity:0;pointer-events:none;transition:opacity .2s;z-index:9999}
  .gn-toast.show{opacity:1}
  .gn-platform-info{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:10px;margin-top:14px}
  .gn-platform{background:#f8fafc;border:1px solid var(--gn-border);border-radius:8px;padding:10px 12px;font-size:12px}
  .gn-platform b{display:block;color:var(--gn-text);font-size:14px;margin-bottom:2px}
  .gn-empty{color:var(--gn-muted);font-size:13px;padding:8px 4px}
</style>

<div class="gn-wrap">
  <div class="gn-card">
    <h3>Generate new guild names</h3>
    <div class="gn-controls">
      <div class="gn-field">
        <label for="gn-theme">Theme</label>
        <select id="gn-theme">
          <option value="fantasy" selected>Fantasy</option>
          <option value="scifi">Sci-fi</option>
          <option value="dark">Dark / evil</option>
          <option value="noble">Noble / heroic</option>
          <option value="rogue">Rogue / outlaw</option>
          <option value="mythic">Mythic / legendary</option>
        </select>
      </div>
      <div class="gn-field">
        <label for="gn-template">Template</label>
        <select id="gn-template">
          <option value="mix" selected>Mix it up</option>
          <option value="order">Order of the X</option>
          <option value="house">House of X</option>
          <option value="thes">The X-s</option>
          <option value="adjn">Adjective + Noun</option>
          <option value="xofy">X of Y</option>
        </select>
      </div>
      <div class="gn-field">
        <label for="gn-count">How many</label>
        <select id="gn-count">
          <option value="10" selected>10</option>
          <option value="20">20</option>
          <option value="50">50</option>
        </select>
      </div>
      <div class="gn-field">
        <label for="gn-maxlen">Max length</label>
        <input id="gn-maxlen" type="number" min="10" max="40" value="24">
      </div>
    </div>
    <div class="gn-actions">
      <button id="gn-generate" class="gn-btn gn-btn-primary">Generate</button>
      <button id="gn-clearFavs" class="gn-btn gn-btn-ghost">Clear favorites</button>
    </div>
    <div class="gn-platform-info">
      <div class="gn-platform"><b>WoW</b>2-24 chars, letters + apostrophe/space</div>
      <div class="gn-platform"><b>FFXIV Free Company</b>4-20 chars, letters, digits</div>
      <div class="gn-platform"><b>Destiny 2 Clan</b>3-32 chars, most chars allowed</div>
      <div class="gn-platform"><b>Discord server</b>2-100 chars, Unicode</div>
    </div>
  </div>

  <div class="gn-card">
    <h3>Generated names</h3>
    <div id="gn-list" class="gn-list"></div>
  </div>

  <div class="gn-card">
    <h3>⭐ Favorites</h3>
    <div id="gn-favs" class="gn-list"></div>
  </div>
</div>

<div id="gn-toast" class="gn-toast">Copied!</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const POOLS={
    fantasy:{
      adj:['Ancient','Silver','Golden','Emerald','Crystal','Mystic','Runic','Eternal','Verdant','Crimson','Azure','Celestial','Arcane','Sacred','Moonlit'],
      noun:['Phoenix','Griffin','Wyrm','Dragon','Wolves','Stag','Rose','Oak','Flame','Star','Blade','Dawn','Storm','Rune','Tide'],
      place:['Eldoria','Avalon','Silverhold','Ironvale','Goldspire','Ravenrock','Stormreach','Mistwood','Shadowfen','Highforge']
    },
    scifi:{
      adj:['Orbital','Quantum','Nebula','Binary','Void','Nova','Cyber','Neon','Chrome','Plasma','Solar','Stellar','Zero','Pulse','Flux'],
      noun:['Vanguard','Wardens','Legion','Sentinels','Corsairs','Reapers','Syndicate','Collective','Alliance','Armada','Hunters','Wolves','Phantoms','Strikers','Titans'],
      place:['Helios','Andromeda','Proxima','Centauri','Orion','Rigel','Sirius','Kronos','Europa','Titan-IX']
    },
    dark:{
      adj:['Black','Shadow','Cursed','Grim','Bloody','Dark','Infernal','Fallen','Dread','Vile','Wicked','Doomed','Sinister','Obsidian','Necro'],
      noun:['Covenant','Ravens','Reapers','Wraiths','Demons','Legion','Hounds','Serpents','Talons','Blades','Hand','Order','Circle','Cult','Brood'],
      place:['Mordor','Shadowmoor','Blackreach','Duskfall','Nihilus','Drakenhold','Abyssus','Nightshade','Ruinfell','Deadmarch']
    },
    noble:{
      adj:['Valiant','Noble','Radiant','True','Golden','Honored','Loyal','Brave','Righteous','Stalwart','Bright','Pure','Bold','Glorious','Sovereign'],
      noun:['Knights','Lions','Guard','Paladins','Templars','Defenders','Stewards','Wardens','Champions','Brotherhood','Vanguard','Crusade','Honor','Sentinels','Order'],
      place:['Stormwind','Lionmane','Sunspire','Lightholme','Highgarden','Valinor','Rhodas','Kael','Andoria','Thaldorin']
    },
    rogue:{
      adj:['Silent','Shadow','Hidden','Rogue','Crooked','Lost','Sly','Stealthy','Mask','Phantom','Vagabond','Nameless','Wandering','Outlaw','Raider'],
      noun:['Thieves','Daggers','Shadows','Fangs','Crows','Foxes','Jackals','Bandits','Smugglers','Corsairs','Scoundrels','Rogues','Wanderers','Ghosts','Syndicate'],
      place:['Blackport','Thornhold','Wayward','Crossroads','Ironmoor','Cutthroat','Smokehollow','Fenmire','Undercrag','Riversong']
    },
    mythic:{
      adj:['Eternal','Immortal','Primordial','Titan','Legendary','Infinite','Ascendant','Divine','Heavenly','Sovereign','Epochal','Timeless','Stellar','Astral','Cosmic'],
      noun:['Ascendants','Gods','Titans','Primarchs','Watchers','Oracles','Pantheon','Immortals','Ancients','Forsaken','Dawnbringers','Skywalkers','Starborn','Runebearers','Chosen'],
      place:['Valhalla','Asgard','Olympus','Elysium','Celestia','Empyrean','Ether','Aetherium','Godsreach','Primeval']
    }
  };

  const listEl=$('gn-list'),favsEl=$('gn-favs'),toast=$('gn-toast');
  const themeSel=$('gn-theme'),tmplSel=$('gn-template'),countSel=$('gn-count'),maxIn=$('gn-maxlen');

  const FAV_KEY='kbtGuildNameFavs';
  function loadFavs(){ try{return JSON.parse(localStorage.getItem(FAV_KEY)||'[]');}catch(e){return [];} }
  function saveFavs(f){ localStorage.setItem(FAV_KEY,JSON.stringify(f)); }
  let favs=loadFavs();

  function pick(a){ return a[Math.floor(Math.random()*a.length)]; }
  function makeName(){
    const pool=POOLS[themeSel.value];
    const maxLen=Math.max(10,Math.min(40,parseInt(maxIn.value,10)||24));
    const tmpl=tmplSel.value;
    const templates=tmpl==='mix'?['order','house','thes','adjn','xofy']:[tmpl];
    for(let attempt=0;attempt<20;attempt++){
      const t=pick(templates);
      let name;
      if(t==='order') name='Order of the '+pick(pool.noun);
      else if(t==='house') name='House '+pick(pool.place);
      else if(t==='thes'){ const n=pick(pool.noun); name='The '+(n.endsWith('s')?n:n+'s'); }
      else if(t==='adjn') name=pick(pool.adj)+' '+pick(pool.noun);
      else if(t==='xofy') name=pick(pool.noun)+' of '+pick(pool.place);
      else name=pick(pool.adj)+' '+pick(pool.noun);
      if(name.length<=maxLen) return name;
    }
    return pick(pool.adj)+' '+pick(pool.noun);
  }
  function isFav(n){ return favs.includes(n); }
  function toggleFav(n){ if(isFav(n)) favs=favs.filter(x=>x!==n); else favs=[n,...favs].slice(0,50); saveFavs(favs); render(); }
  function copy(n){
    if(navigator.clipboard) navigator.clipboard.writeText(n);
    else{ const t=document.createElement('textarea'); t.value=n; document.body.appendChild(t); t.select(); document.execCommand('copy'); t.remove(); }
    toast.textContent='Copied: '+n; toast.classList.add('show');
    clearTimeout(copy._t); copy._t=setTimeout(()=>toast.classList.remove('show'),1400);
  }
  function esc(s){ return s.replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c])); }
  function itemHtml(n){
    const e=esc(n);
    return `<div class="gn-item" data-name="${e}">
      <span class="gn-item-name">${e}</span>
      <span class="gn-item-actions">
        <button class="gn-icon-btn ${isFav(n)?'favored':''}" data-act="fav" title="Favorite">${isFav(n)?'⭐':'☆'}</button>
        <button class="gn-icon-btn" data-act="copy" title="Copy">📋</button>
      </span>
    </div>`;
  }
  let current=[];
  function render(){
    listEl.innerHTML = current.length ? current.map(itemHtml).join('') : '<div class="gn-empty">Click "Generate" to create guild names.</div>';
    favsEl.innerHTML = favs.length ? favs.map(itemHtml).join('') : '<div class="gn-empty">No favorites yet. Click ☆ on any name to save it.</div>';
  }
  function generate(){
    const n=parseInt(countSel.value,10);
    const set=new Set();
    let guard=0;
    while(set.size<n && guard<n*10){ set.add(makeName()); guard++; }
    current=Array.from(set);
    render();
  }
  document.body.addEventListener('click',e=>{
    const btn=e.target.closest('[data-act]'); const item=e.target.closest('.gn-item');
    if(!item) return;
    const name=item.dataset.name;
    if(btn){ if(btn.dataset.act==='fav') toggleFav(name); else if(btn.dataset.act==='copy') copy(name); }
    else copy(name);
  });
  $('gn-generate').addEventListener('click',generate);
  $('gn-clearFavs').addEventListener('click',()=>{ favs=[]; saveFavs(favs); render(); });
  generate();
})();
</script>
