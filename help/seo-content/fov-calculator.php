<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>What Is Field of View (FoV)?</h2>
      <p>FoV is the angle (in degrees) of the game world visible on screen. A wider FoV shows more around you but makes targets look smaller and farther away. A narrower FoV zooms in but hides peripheral threats. Every FPS engine measures FoV slightly differently - some report horizontal, some vertical, and CoD famously reports 4:3 horizontal even on 16:9 monitors. This calculator converts between all of them.</p>
    </article>
    <article class="seo-article">
      <h2>Horizontal vs Vertical vs Diagonal FoV</h2>
      <ul>
        <li><strong>Horizontal (hFoV):</strong> angle left to right. Used by CS2, Valorant, Fortnite, Unreal-based games.</li>
        <li><strong>Vertical (vFoV):</strong> angle top to bottom. Used by Apex Legends, Overwatch, Quake/idTech engine.</li>
        <li><strong>Diagonal (dFoV):</strong> angle corner to corner. Less common but used in some cinematic games.</li>
      </ul>
      <p>The three are linked by pure trigonometry. At 16:9 and 90 hFoV, you get about 59 vFoV and about 97 diagonal. At 16:9 and 90 vFoV, you get about 121 hFoV.</p>
    </article>
    <article class="seo-article">
      <h2>Hor+ vs Vert- Scaling</h2>
      <p>When you move from 16:9 to 21:9 (ultrawide), modern FPS games use <strong>Hor+</strong> scaling: they keep the vertical FoV constant and extend the horizontal view to fill the extra width. That gives ultrawide players a real peripheral advantage. Older or console-ported games may use <strong>Vert-</strong> (cropping the top and bottom to preserve horizontal), which is penalizing on ultrawide. Our calculator assumes Hor+ - the standard for competitive FPS.</p>
    </article>
    <article class="seo-article">
      <h2>Common FoV Values By Game</h2>
      <ul>
        <li><strong>CS2 / CS:GO:</strong> 106 hFoV locked at 16:9 (game stores 90 internally on 4:3).</li>
        <li><strong>Valorant:</strong> 103 hFoV at 16:9 (fixed, no in-game slider).</li>
        <li><strong>Apex Legends:</strong> 70-110 vFoV, most pros at 90-104.</li>
        <li><strong>Call of Duty (MW series):</strong> 80-120 in 4:3 hFoV notation.</li>
        <li><strong>Fortnite:</strong> 80-90 hFoV most common.</li>
        <li><strong>Overwatch 2:</strong> 80-103 vFoV.</li>
      </ul>
    </article>
    <article class="seo-article">
      <h2>Further Reading</h2>
      <p>FoV is one leg of the aim stack. The other three are accurate DPI, a stable crosshair, and muscle memory. See <a href="<?php echo url('blog/how-to-copy-pro-crosshair-cs2-valorant-generator-guide.php'); ?>">how to copy a pro's crosshair in CS2 and Valorant</a> and lock in the visual target that matches the FoV you just calculated.</p>
    </article>
    <article class="seo-article">
      <h2>Related Tools</h2>
      <ul>
        <li><a href="<?php echo url('edpi-calculator.php'); ?>">eDPI Calculator</a></li>
        <li><a href="<?php echo url('mouse-dpi-calculator.php'); ?>">Mouse DPI Calculator</a></li>
        <li><a href="<?php echo url('mouse-accuracy-test.php'); ?>">Mouse Accuracy Test</a></li>
      </ul>
    </article>
  </div>
</section>
