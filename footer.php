<?php
if (!isset($baseUrl)) {
    include_once __DIR__ . '/config.php';
}

require_once __DIR__ . '/includes/components/site-chrome.php';
require_once __DIR__ . '/includes/components/adsense-slot.php';

$siteChromeLocale = $siteChromeLocale ?? 'en';
if (empty($kbtSuppressFooterAd)) {
    kbtRenderAdSlot('site_before_footer', ['class' => 'kbt-ad-slot--leaderboard kbt-ad-slot--site-footer', 'format' => 'horizontal', 'full_width_responsive' => false]);
}

kbtRenderSiteFooter($siteChromeLocale);

// AI Chat Widget
$aiEndpoint = htmlspecialchars(url('ai-chat.php'), ENT_QUOTES, 'UTF-8');
$aiScript   = htmlspecialchars(url('assets/js/ai-chat.min.js'), ENT_QUOTES, 'UTF-8') . '?v=2.4';
$aiRobot    = htmlspecialchars(url('images/robot_18357793.png'), ENT_QUOTES, 'UTF-8') . '?v=2';
echo '<script>window.KBT_CHAT_ENDPOINT="' . $aiEndpoint . '";window.KBT_ROBOT_IMG="' . $aiRobot . '";</script>';
echo '<script src="' . $aiScript . '" defer></script>';

// Hero YouTube facade — click-to-play to avoid ~788KB base.js on initial load
?>
<script>
(function(){
  function loadHeroYt(el){
    if(el.dataset.loaded==='1')return;
    el.dataset.loaded='1';
    var id=el.dataset.ytId; if(!id)return;
    var title=el.dataset.ytTitle||'YouTube video';
    var ifr=document.createElement('iframe');
    ifr.src='https://www.youtube-nocookie.com/embed/'+id+'?autoplay=1&rel=0&modestbranding=1';
    ifr.title=title;
    ifr.setAttribute('allow','accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
    ifr.setAttribute('allowfullscreen','');
    ifr.loading='lazy';
    el.appendChild(ifr);
    var t=el.querySelector('.hero-yt-thumb'); if(t)t.style.display='none';
    var p=el.querySelector('.hero-yt-play'); if(p)p.style.display='none';
    el.style.cursor='default';
  }
  document.querySelectorAll('.hero-yt-facade[data-yt-id]').forEach(function(el){
    el.addEventListener('click',function(){loadHeroYt(el);});
    el.addEventListener('keydown',function(e){ if(e.key==='Enter'||e.key===' '){e.preventDefault();loadHeroYt(el);} });
  });
})();
</script>
<?php
