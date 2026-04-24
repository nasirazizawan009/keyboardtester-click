<?php
// gamertag_tool.php – embeddable Gamertag Generator
// Pure JS, adjective + noun + number pools per style
?>
<style>
  .gt-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px);--gt-primary:#4b5eaa;--gt-primary-2:#7d8bc1;--gt-accent:#f59e0b;--gt-success:#10b981;--gt-danger:#ef4444;--gt-border:#e2e8f0;--gt-muted:#64748b;--gt-text:#0f172a;--gt-card:#fff}
  .gt-card{background:var(--gt-card);border:1px solid var(--gt-border);border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .gt-card h3{margin:0 0 12px;font-size:16px}
  .gt-controls{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:12px}
  .gt-field label{display:block;font-size:12px;font-weight:700;color:var(--gt-muted);text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px}
  .gt-field select,.gt-field input{width:100%;padding:10px 12px;border:1px solid var(--gt-border);border-radius:8px;font-size:14px;background:#fff}
  .gt-btn{appearance:none;border:none;padding:12px 18px;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px}
  .gt-btn-primary{background:linear-gradient(180deg,var(--gt-primary),var(--gt-primary-2));color:#fff}
  .gt-btn-ghost{background:#f1f5f9;color:var(--gt-text);border:1px solid var(--gt-border)}
  .gt-actions{display:flex;flex-wrap:wrap;gap:10px;margin-top:14px}
  .gt-list{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:10px;margin-top:16px}
  .gt-item{display:flex;justify-content:space-between;align-items:center;padding:12px 14px;background:#f8fafc;border:1px solid var(--gt-border);border-radius:10px;cursor:pointer;transition:all .15s}
  .gt-item:hover{background:#eef2ff;transform:translateY(-1px)}
  .gt-item-name{font-weight:700;color:var(--gt-text);font-size:15px;word-break:break-all}
  .gt-item-actions{display:flex;gap:6px;flex-shrink:0;margin-left:8px}
  .gt-icon-btn{appearance:none;background:transparent;border:none;cursor:pointer;font-size:18px;padding:4px;line-height:1;color:var(--gt-muted)}
  .gt-icon-btn:hover{color:var(--gt-accent)}
  .gt-icon-btn.favored{color:var(--gt-accent)}
  .gt-copied-toast{position:fixed;bottom:20px;left:50%;transform:translateX(-50%);background:var(--gt-success);color:#fff;padding:10px 20px;border-radius:8px;font-weight:700;font-size:14px;box-shadow:0 10px 25px rgba(0,0,0,.2);opacity:0;pointer-events:none;transition:opacity .2s;z-index:9999}
  .gt-copied-toast.show{opacity:1}
  .gt-favs{padding:12px;background:#fef3c7;border:1px dashed #fde68a;border-radius:10px;margin-top:8px}
  .gt-favs h4{margin:0 0 8px;font-size:13px;color:#92400e;text-transform:uppercase;letter-spacing:.5px}
  .gt-platform-info{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:10px;margin-top:14px}
  .gt-platform{background:#f8fafc;border:1px solid var(--gt-border);border-radius:8px;padding:10px 12px;font-size:12px}
  .gt-platform b{display:block;color:var(--gt-text);font-size:14px;margin-bottom:2px}
  .gt-empty{color:var(--gt-muted);font-size:13px;padding:8px 4px}
</style>

<div class="gt-wrap">
  <div class="gt-card">
    <h3>Generate new gamertags</h3>
    <div class="gt-controls">
      <div class="gt-field">
        <label for="gt-style">Style</label>
        <select id="gt-style">
          <option value="edgy">Edgy / dark</option>
          <option value="funny">Funny / meme</option>
          <option value="cute">Cute / wholesome</option>
          <option value="pro" selected>Pro / esports</option>
          <option value="fantasy">Fantasy / RPG</option>
          <option value="cyber">Cyber / hacker</option>
        </select>
      </div>
      <div class="gt-field">
        <label for="gt-count">How many</label>
        <select id="gt-count">
          <option value="10" selected>10</option>
          <option value="20">20</option>
          <option value="50">50</option>
        </select>
      </div>
      <div class="gt-field">
        <label for="gt-maxlen">Max length</label>
        <input id="gt-maxlen" type="number" min="6" max="32" value="15">
      </div>
      <div class="gt-field">
        <label for="gt-numbers">Include numbers</label>
        <select id="gt-numbers"><option value="yes" selected>Yes</option><option value="no">No</option></select>
      </div>
    </div>
    <div class="gt-actions">
      <button id="gt-generate" class="gt-btn gt-btn-primary">Generate</button>
      <button id="gt-clearFavs" class="gt-btn gt-btn-ghost">Clear favorites</button>
    </div>
    <div class="gt-platform-info">
      <div class="gt-platform"><b>Xbox</b>3-12 chars, letters, numbers, spaces</div>
      <div class="gt-platform"><b>PSN</b>3-16 chars, letters, numbers, _ and -</div>
      <div class="gt-platform"><b>Steam</b>2-32 chars, most characters allowed</div>
      <div class="gt-platform"><b>Discord</b>2-32 chars, lowercase, .  and _</div>
    </div>
  </div>

  <div class="gt-card">
    <h3>Generated names</h3>
    <div id="gt-list" class="gt-list"></div>
  </div>

  <div class="gt-card">
    <h3>⭐ Favorites</h3>
    <div id="gt-favs" class="gt-list"></div>
  </div>
</div>

<div id="gt-toast" class="gt-copied-toast">Copied!</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const POOLS={
    edgy:{
      adj:['Dark','Shadow','Grim','Cursed','Blood','Rogue','Savage','Feral','Venom','Dread','Toxic','Vile','Ruin','Brutal','Abyss','Plague','Reaper','Demon','Raven','Iron'],
      noun:['Slayer','Wraith','Ghost','Knight','Hunter','Blade','Phantom','Reaper','Crow','Wolf','Viper','Specter','Nightmare','Mortis','Fang','Skull','Serpent','Inferno','Hex','Rift']
    },
    funny:{
      adj:['Sneaky','Chunky','Salty','Soggy','Loud','Sticky','Crusty','Grumpy','Chubby','Wobbly','Spicy','Derpy','Crispy','Bouncy','Silly','Clumsy','Goofy','Nerdy','Fluffy','Sassy'],
      noun:['Pickle','Potato','Waffle','Toast','Taco','Nugget','Cactus','Muffin','Penguin','Goose','Pancake','Biscuit','Gecko','Llama','Walrus','Donut','Pigeon','Sloth','Ostrich','Banana']
    },
    cute:{
      adj:['Fluffy','Sunny','Happy','Sweet','Tiny','Cozy','Sparkly','Cuddly','Gentle','Bubbly','Starry','Peachy','Misty','Breezy','Honey','Dreamy','Pastel','Lovely','Snuggly','Soft'],
      noun:['Bunny','Kitten','Panda','Fox','Daisy','Cloud','Star','Moon','Petal','Muffin','Koala','Bee','Cherry','Puff','Berry','Tulip','Wish','Lily','Dewdrop','Pixie']
    },
    pro:{
      adj:['Apex','Neon','Prime','Quantum','Vortex','Alpha','Zero','Nova','Rapid','Lethal','Elite','Titan','Frost','Blaze','Arc','Phantom','Viper','Storm','Nitro','Pulse'],
      noun:['Strike','Flux','Gale','Fury','Edge','Rift','Blast','Shot','Spark','Wolf','Vex','Krait','Ronin','Drax','Orion','Sable','Kraken','Zenith','Jaeger','Aether']
    },
    fantasy:{
      adj:['Dragon','Elven','Arcane','Mystic','Runic','Celestial','Shadow','Flame','Storm','Ancient','Sacred','Moonlit','Ember','Starforged','Silver','Golden','Nether','Crystal','Eldritch','Wyrm'],
      noun:['Mage','Paladin','Rogue','Warden','Sorceress','Druid','Knight','Bard','Hunter','Reaver','Scribe','Champion','Oracle','Templar','Warlock','Summoner','Seeker','Ranger','Spellblade','Warrior']
    },
    cyber:{
      adj:['Neo','Null','Ghost','Vapor','Neon','Chrome','Pixel','Byte','Glitch','Sync','Quantum','Binary','Cipher','Phase','Mesh','Data','Wire','Signal','Nexus','Zero'],
      noun:['Code','Hack','Byte','Core','Matrix','Node','Drift','Shift','Zero','Proxy','Shell','Daemon','Stack','Frame','Bit','Mod','Circuit','Protocol','Engine','Kernel']
    }
  };

  const listEl=$('gt-list'),favsEl=$('gt-favs'),toast=$('gt-toast');
  const styleSel=$('gt-style'),countSel=$('gt-count'),maxIn=$('gt-maxlen'),numSel=$('gt-numbers');

  const FAV_KEY='kbtGamertagFavs';
  function loadFavs(){ try{return JSON.parse(localStorage.getItem(FAV_KEY)||'[]');}catch(e){return [];} }
  function saveFavs(f){ localStorage.setItem(FAV_KEY,JSON.stringify(f)); }
  let favs=loadFavs();

  function pick(a){ return a[Math.floor(Math.random()*a.length)]; }
  function makeName(){
    const pool=POOLS[styleSel.value];
    const wantNum=numSel.value==='yes';
    const maxLen=Math.max(6,Math.min(32,parseInt(maxIn.value,10)||15));
    for(let attempt=0;attempt<20;attempt++){
      const a=pick(pool.adj), n=pick(pool.noun);
      const variantPick = Math.random();
      let name;
      if(variantPick<0.34) name=a+n;
      else if(variantPick<0.67) name=a+'_'+n;
      else name=a+n;
      if(wantNum && Math.random()<0.7){
        const nn=Math.random()<0.5?String(Math.floor(Math.random()*99)+1):String(Math.floor(Math.random()*9999)).padStart(2,'0');
        name+=nn;
      }
      if(name.length<=maxLen) return name;
    }
    return pick(pool.adj)+pick(pool.noun);
  }
  function isFav(name){ return favs.includes(name); }
  function toggleFav(name){
    if(isFav(name)) favs=favs.filter(x=>x!==name);
    else favs=[name,...favs].slice(0,50);
    saveFavs(favs);
    render();
  }
  function copy(name){
    if(navigator.clipboard){ navigator.clipboard.writeText(name); }
    else{ const t=document.createElement('textarea'); t.value=name; document.body.appendChild(t); t.select(); document.execCommand('copy'); t.remove(); }
    toast.textContent='Copied: '+name; toast.classList.add('show');
    clearTimeout(copy._t); copy._t=setTimeout(()=>toast.classList.remove('show'),1400);
  }
  function itemHtml(name){
    return `<div class="gt-item" data-name="${name}">
      <span class="gt-item-name">${name}</span>
      <span class="gt-item-actions">
        <button class="gt-icon-btn ${isFav(name)?'favored':''}" data-act="fav" title="Favorite">${isFav(name)?'⭐':'☆'}</button>
        <button class="gt-icon-btn" data-act="copy" title="Copy">📋</button>
      </span>
    </div>`;
  }
  let current=[];
  function render(){
    listEl.innerHTML = current.length ? current.map(itemHtml).join('') : '<div class="gt-empty">Click "Generate" to create names.</div>';
    favsEl.innerHTML = favs.length ? favs.map(itemHtml).join('') : '<div class="gt-empty">No favorites yet. Click ☆ on any generated name to save it.</div>';
  }
  function generate(){
    const n=parseInt(countSel.value,10);
    const set=new Set();
    while(set.size<n){ set.add(makeName()); if(set.size<n && set.size>n*5) break; }
    current=Array.from(set);
    render();
  }
  document.body.addEventListener('click',e=>{
    const btn=e.target.closest('[data-act]'); if(!btn) return;
    const item=e.target.closest('.gt-item'); if(!item) return;
    const name=item.dataset.name;
    if(btn.dataset.act==='fav') toggleFav(name);
    else if(btn.dataset.act==='copy') copy(name);
  });
  document.body.addEventListener('click',e=>{
    const item=e.target.closest('.gt-item');
    if(item && !e.target.closest('[data-act]')) copy(item.dataset.name);
  });
  $('gt-generate').addEventListener('click',generate);
  $('gt-clearFavs').addEventListener('click',()=>{ favs=[]; saveFavs(favs); render(); });
  generate();
})();
</script>
