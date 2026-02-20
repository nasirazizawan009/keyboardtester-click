<?php
/**
 * Japanese Keyboard Tester - Hero Section
 */
?>

<section class="landing-hero">
    <div class="container landing-hero-grid">
        <div class="hero-copy">
            <p class="hero-kicker">キーボード診断ツール</p>
            <h1 class="hero-title">瞬時のフィードバックで全てのキーをテスト</h1>
            <p class="hero-lede">キーのハイライト表示、レイアウト切り替え、ゴースティングテスト、レポートエクスポート。インストール不要。登録不要。</p>
            <div class="hero-actions">
                <a class="landing-btn landing-btn-primary" href="#keyboard-tester">キーボードテストを開始</a>
                <a class="landing-btn landing-btn-ghost" href="#tools">全てのツールを見る</a>
            </div>
            <div class="hero-badges">
                <span class="hero-badge">インストール不要</span>
                <span class="hero-badge">複数レイアウト対応</span>
                <span class="hero-badge">完全プライバシー</span>
            </div>
            <div class="hero-metrics">
                <div class="metric-card">
                    <span class="metric-value">109+</span>
                    <span class="metric-label">対応キー数</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">5</span>
                    <span class="metric-label">テーマ数</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">2</span>
                    <span class="metric-label">OS対応</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="hero-shot">
                <picture>
                    <source type="image/webp" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.webp'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.webp'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <source type="image/png" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.png'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <img src="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?>" width="900" height="600" alt="日本語キーボードテスターインターフェース" loading="eager" decoding="async" fetchpriority="high">
                </picture>
            </div>
            <div class="hero-stack">
                <div class="mini-card">
                    <div class="mini-title">ライブ診断</div>
                    <p>キー押下、ヒートマップ密度、応答時間をリアルタイムで確認。</p>
                </div>
                <div class="mini-card">
                    <div class="mini-title">レイアウト切替</div>
                    <p>セッションを失わずにレイアウトとOSラベルを切り替え。</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Stage -->
<section class="tool-stage" aria-labelledby="tool-stage-title-ja">
    <div class="container tool-stage-header">
        <div>
            <p class="section-kicker">メインツール</p>
            <h2 id="tool-stage-title-ja">キーボードテスター</h2>
            <p class="section-lede">以下のツールを使用して、各キーのテスト、レイアウトの確認、レイテンシーの測定ができます。</p>
        </div>
        <div class="tool-stage-actions">
            <a class="landing-btn landing-btn-ghost" href="#guidelines">クイックヒントを見る</a>
        </div>
    </div>
    <div class="tool-shell">
        <?php include __DIR__ . '/tool.php'; ?>
    </div>
</section>

<!-- Trust Strip -->
<section class="trust-strip" aria-label="主な機能">
    <div class="container trust-grid">
        <div class="trust-item">
            <div class="trust-title">インストール不要</div>
            <div class="trust-desc">ブラウザで完全に動作</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">レイアウト対応</div>
            <div class="trust-desc">JIS、QWERTY、AZERTY、Dvorak</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">ライブ診断</div>
            <div class="trust-desc">キーデータ、ヒートマップ、レイテンシー即時表示</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">プライバシー最優先</div>
            <div class="trust-desc">データはデバイスから送信されません</div>
        </div>
    </div>
</section>

<!-- Feature Band -->
<section class="feature-band" aria-labelledby="feature-title-ja">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">高速診断のために設計</p>
            <h2 id="feature-title-ja">キーボード検証に必要な全て</h2>
            <p class="section-lede">日常のチェック、サポートチケット、ハードウェアトラブルシューティングのためのツールセット。</p>
        </div>
        <div class="landing-feature-grid">
            <article class="landing-feature-card">
                <h3>ライブキーマップ</h3>
                <p>全てのキー押下をカラーフィードバックとキー履歴で即座にハイライト表示。</p>
            </article>
            <article class="landing-feature-card">
                <h3>ゴースティング＆レイテンシー</h3>
                <p>応答時間を測定し、ゴースト入力を検出する内蔵ツール。</p>
            </article>
            <article class="landing-feature-card">
                <h3>マルチデバイス対応</h3>
                <p>ページを離れずにレイアウトとOSラベルを即座に切り替え。</p>
            </article>
            <article class="landing-feature-card">
                <h3>エクスポート可能</h3>
                <p>QCノートやサポートドキュメント用にセッションレポートを保存。</p>
            </article>
        </div>
    </div>
</section>

<!-- Process Band -->
<section class="process-band" aria-labelledby="process-title-ja">
    <div class="container">
        <div class="section-head split">
            <div>
                <p class="section-kicker">シンプルなワークフロー</p>
                <h2 id="process-title-ja">3ステップでキーボードを検証</h2>
            </div>
            <p class="section-lede">1分以内に完全なチェックを実行し、必要に応じて結果をエクスポート。</p>
        </div>
        <div class="process-grid">
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/Press-any-key-512.webp'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.webp'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/Press-any-key-512.png'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.png'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/Press-any-key-512.png'); ?>" width="512" height="768" alt="任意のキーを押してテスト開始" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">01</div>
                    <h3>任意のキーを押す</h3>
                    <p>入力を開始し、キーマップがリアルタイムで反応するのを確認。</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/special-keys-layout-640.webp'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?>" width="640" height="426" alt="特殊キーとキーボードレイアウト" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">02</div>
                    <h3>分析を確認</h3>
                    <p>高度なオプションでヒートマップ、統計、ゴースティングテストを開く。</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/color-system-guide-640.webp'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/color-system-guide-640.png'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/color-system-guide-640.png'); ?>" width="640" height="426" alt="カラーシステムとエクスポート結果" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">03</div>
                    <h3>セッションをエクスポート</h3>
                    <p>診断を整理するためにレポートをダウンロード。</p>
                </div>
            </article>
        </div>
    </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "日本語キーボードテスター",
  "description": "無料オンライン日本語キーボードテストツール",
  "url": "<?php echo url('languages/japanese/'); ?>",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "Any",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" },
  "inLanguage": "ja"
}
</script>
