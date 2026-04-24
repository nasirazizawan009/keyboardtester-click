<?php
/**
 * Japanese Mouse Accuracy Test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'マウス精度テスト - オンラインエイムトレーナー';
$pageDescription = '無料オンラインマウス精度テスト。命中率、平均ピクセル誤差、ターゲットごとの反応時間を測定。実データでDPIと感度をキャリブレーション。';
$pageKeywords = 'マウス精度テスト, エイムトレーナー, aim trainer';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">エイムトレーナー</p>
          <h1 class="hero-title" id="hero-title">マウス精度テスト - エイムトレーナー</h1>
          <p class="hero-lede">クリックの精度、平均ピクセル誤差、ターゲットごとの反応時間を測定します。実データでDPIと感度を調整できます。</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-accuracy-test">テスト開始</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">使い方</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">ピクセル精度</span>
            <span class="hero-badge">反応時間</span>
            <span class="hero-badge">DPIキャリブレーション</span>
          </div>
          <div class="hero-metrics">
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">エイムトレーナー</span></div>
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">ターゲットサイズ</span></div>
            <div class="metric-card"><span class="metric-value">0</span><span class="metric-label">インストール不要</span></div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <picture>
              <img src="<?php echo url('blog/images/keyboard-ghosting-mechanical-rgb-hero.jpg'); ?>" width="1280" height="720" alt="マウス精度テスト - エイムトレーナー" loading="eager" decoding="async" fetchpriority="high">
            </picture>
          </div>
          <div class="hero-stack">
            <div class="mini-card"><div class="mini-title">リアルなエイムデータ</div><p>セッションごとの命中率と平均誤差を追跡。</p></div>
            <div class="mini-card"><div class="mini-title">DPIループ</div><p>テスト、DPI変更、再テスト - 精度の変化を確認。</p></div>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-accuracy-test" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">エイムトレーナー</p>
          <h2 id="tool-stage-title">エイムトレーナー</h2>
          <p class="section-lede">可能な限り速く正確にすべてのターゲットをクリックしてください。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="mouse-accuracy-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-accuracy-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="精度テストの使い方">
      <div class="container trust-grid">
        <div class="trust-item"><div class="trust-title">ピクセル精度</div><div class="trust-desc">各クリックをターゲット中心から測定</div></div>
        <div class="trust-item"><div class="trust-title">反応時間</div><div class="trust-desc">出現からクリックまでのミリ秒</div></div>
        <div class="trust-item"><div class="trust-title">DPIキャリブレーション</div><div class="trust-desc">設定を客観的なデータで比較</div></div>
        <div class="trust-item"><div class="trust-title">ローカル・登録不要</div><div class="trust-desc">ダウンロードやトラッキングなし</div></div>
      </div>
    </section>

    <?php $currentTool = 'mouse-accuracy'; $__ls = __DIR__ . '/sections/tools-list-ja.php'; if (file_exists($__ls)) include $__ls; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>精度テストの使い方</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. セッションを設定</h3><p>時間（30秒/60秒/120秒）とターゲットサイズを選択。</p></div>
          <div class="guideline-card"><h3>2. 各ターゲットをクリック</h3><p>緑のターゲットをすぐにクリック。</p></div>
          <div class="guideline-card"><h3>3. 結果を確認</h3><p>命中率、平均誤差、時間。</p></div>
          <div class="guideline-card"><h3>4. 調整して再テスト</h3><p>DPIや感度を変えて再度テスト。</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
