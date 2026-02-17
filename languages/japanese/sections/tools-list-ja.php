<?php
/**
 * Tools List Component
 * Localized (ja) - Updated with Japanese tool links
 */
if (!function_exists('url')) {
    require_once __DIR__ . '/../../../config.php';
}
?>

<section class="tools-list-section" id="tools" aria-labelledby="tools-hub-title">
    <div class="container">
        <h2 id="tools-hub-title">その他のテストツール</h2>
        <p class="section-subtitle">キーボード、マウス、オーディオ、ユーティリティの完全なツールスイートをご覧ください。</p>
        <p class="language-note">すべてのツールは日本語インターフェースで利用可能です。</p>

        <div class="tools-grid">
            <a href="<?php echo url('languages/japanese/'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="2" y="6" width="20" height="12" rx="2"/>
                                    <path d="M6 10h1M9 10h1M12 10h1M15 10h1M18 10h1"/>
                                    <path d="M6 13h1M9 13h1M12 13h6"/>
                                    <path d="M6 16h8"/>
                                </svg>
                            </div>
                <h3>キーボードテスター</h3>
                <p>キーボードテスト、ゴースト検出、レイテンシー測定</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/mouse-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="9" y="2" width="6" height="10" rx="3"/>
                                    <path d="M9 7h6"/>
                                    <path d="M6 12v4a6 6 0 0 0 12 0v-4"/>
                                </svg>
                            </div>
                <h3>マウステスター</h3>
                <p>ボタン、スクロールホイール、動作をチェック</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/click-speed.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/>
                                </svg>
                            </div>
                <h3>クリック速度テスト</h3>
                <p>タイマー付きテストでクリック速度（CPS）を測定</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/dpi-tester.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <circle cx="12" cy="12" r="3"/>
                                    <path d="M12 4v2M12 18v2M4 12h2M18 12h2"/>
                                </svg>
                            </div>
                <h3>感度 / DPIテスト</h3>
                <p>DPI、感度、トラッキング精度をテスト</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/ghost-click.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                                    <circle cx="10" cy="10" r="1"/>
                                    <circle cx="14" cy="10" r="1"/>
                                </svg>
                            </div>
                <h3>ゴーストクリック検出器</h3>
                <p>意図しないクリックやゴーストクリックを検出</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/typing-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 6h16"/>
                                    <path d="M7 10h10"/>
                                    <path d="M9 14h6"/>
                                    <path d="M11 18h2"/>
                                </svg>
                            </div>
                <h3>タイピング速度テスト</h3>
                <p>WPM、精度、タイピングの一貫性を測定</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/screen-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="5" width="18" height="12" rx="2"/>
                                    <path d="M8 21h8"/>
                                    <path d="M12 17v4"/>
                                </svg>
                            </div>
                <h3>スクリーンテスト</h3>
                <p>デッドピクセル、スタックピクセル、ホットピクセルを検出</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/mic-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="9" y="2" width="6" height="10" rx="3"/>
                                    <path d="M5 11a7 7 0 0 0 14 0"/>
                                    <path d="M12 18v4"/>
                                    <path d="M8 22h8"/>
                                </svg>
                            </div>
                <h3>マイクテスト</h3>
                <p>マイク入力とオーディオレベルをチェック</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/mouse-trail.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 18c4-6 8-8 16-10"/>
                                    <circle cx="6" cy="16" r="1"/>
                                    <circle cx="10" cy="13" r="1"/>
                                    <circle cx="14" cy="11" r="1"/>
                                </svg>
                            </div>
                <h3>マウストレイル</h3>
                <p>マウスの軌跡と精度を可視化</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/latency-checker.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <path d="M12 8v5l3 2"/>
                                </svg>
                            </div>
                <h3>レイテンシーチェッカー</h3>
                <p>レイテンシーと反応時間をテスト</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/webcam-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="7" width="14" height="10" rx="2"/>
                                    <path d="M17 10l4-3v10l-4-3"/>
                                </svg>
                            </div>
                <h3>ウェブカメラテスト</h3>
                <p>画質、解像度、キャプチャをチェック</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/headphone-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 12a8 8 0 0 1 16 0"/>
                                    <rect x="3" y="12" width="4" height="7" rx="2"/>
                                    <rect x="17" y="12" width="4" height="7" rx="2"/>
                                </svg>
                            </div>
                <h3>ヘッドホンテスト</h3>
                <p>ステレオチャンネルとオーディオ出力をテスト</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/ocr-tool.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 7V4h3"/>
                                    <path d="M20 7V4h-3"/>
                                    <path d="M4 17v3h3"/>
                                    <path d="M20 17v3h-3"/>
                                    <path d="M8 12h8"/>
                                    <path d="M10 9h4"/>
                                    <path d="M10 15h4"/>
                                </svg>
                            </div>
                <h3>OCRツール</h3>
                <p>画像からテキストを素早く抽出</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/qr-reader.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="6" height="6"/>
                                    <rect x="15" y="3" width="6" height="6"/>
                                    <rect x="3" y="15" width="6" height="6"/>
                                    <path d="M15 15h6v6h-6z"/>
                                    <path d="M12 12h2"/>
                                    <path d="M12 8h2"/>
                                    <path d="M8 12h2"/>
                                </svg>
                            </div>
                <h3>QRコードリーダー</h3>
                <p>カメラまたは画像からQRコードをスキャン</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/qr-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="6" height="6"/>
                                    <rect x="15" y="3" width="6" height="6"/>
                                    <rect x="3" y="15" width="6" height="6"/>
                                    <path d="M14 14h7v7h-7z"/>
                                    <path d="M9 9h6"/>
                                </svg>
                            </div>
                <h3>QRコード生成器</h3>
                <p>カスタムQRコードを即座に作成</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/japanese/password-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="5" y="10" width="14" height="10" rx="2"/>
                                    <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                                    <circle cx="12" cy="15" r="1.5"/>
                                </svg>
                            </div>
                <h3>パスワード生成器</h3>
                <p>強力で安全なパスワードを即座に作成</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../../includes/components/tools-list-styles.php'; ?>
