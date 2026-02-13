<?php
/**
 * Tools List Component
 * Localized (ja)
 */
if (!function_exists('url')) {
    require_once __DIR__ . '/../../../config.php';
}
?>

<section class="tools-list-section" id="tools" aria-labelledby="tools-hub-title">
    <div class="container">
        <h2 id="tools-hub-title">その他のテストツール</h2>
        <p class="section-subtitle">キーボード、マウス、オーディオ、ユーティリティの全ツールを確認できます。</p>
        <p class="language-note">言語対応：翻訳済みインターフェースがあるのはキーボードテスターのみです（アラビア語、ロシア語、スペイン語、フランス語、ポルトガル語、日本語、ドイツ語、韓国語）。その他のツールは現在英語のみです。</p>

        <div class="tools-grid">
            <a href="<?php echo url('tools/keyboard-tester/'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="2" y="6" width="20" height="12" rx="2"/>
                                    <path d="M6 10h1M9 10h1M12 10h1M15 10h1M18 10h1"/>
                                    <path d="M6 13h1M9 13h1M12 13h6"/>
                                    <path d="M6 16h8"/>
                                </svg>
                            </div>
                <h3>キーボードテスター</h3>
                <p>キーボードの動作をテストし、ゴースト入力の検出や遅延計測、キーの固着確認ができます</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('languages/arabic/'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="2" y="6" width="20" height="12" rx="2"/>
                                    <path d="M6 10h1M9 10h1M12 10h1M15 10h1M18 10h1"/>
                                    <path d="M6 13h1M9 13h1M12 13h6"/>
                                    <path d="M6 16h8"/>
                                </svg>
                            </div>
                <h3>アラビア語キーボードテスター</h3>
                <p>アラビア語配列とキー反応をアラビア語UIでテスト</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('mouse-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="9" y="2" width="6" height="10" rx="3"/>
                                    <path d="M9 7h6"/>
                                    <path d="M6 12v4a6 6 0 0 0 12 0v-4"/>
                                </svg>
                            </div>
                <h3>マウステスター</h3>
                <p>ボタン、スクロール、カーソル移動、反応をチェック</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('mouse_speed_tester.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/>
                                </svg>
                            </div>
                <h3>クリック速度テスト</h3>
                <p>クリック速度（CPM/CPS）をタイマーで計測</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <circle cx="12" cy="12" r="3"/>
                                    <path d="M12 4v2M12 18v2M4 12h2M18 12h2"/>
                                </svg>
                            </div>
                <h3>マウス感度 / DPI</h3>
                <p>DPI、感度、トラッキング精度をテスト</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('mouse-trail.php'); ?>" class="tool-card">
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
            <a href="<?php echo url('ghost-click-detector.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                                    <circle cx="10" cy="10" r="1"/>
                                    <circle cx="14" cy="10" r="1"/>
                                </svg>
                            </div>
                <h3>ゴーストクリック検出</h3>
                <p>意図しないクリックを検出</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('keyboard_typing_test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 6h16"/>
                                    <path d="M7 10h10"/>
                                    <path d="M9 14h6"/>
                                    <path d="M11 18h2"/>
                                </svg>
                            </div>
                <h3>タイピング速度テスト</h3>
                <p>WPM、精度、タイピングの安定性を測定</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('latency-checker.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <path d="M12 8v5l3 2"/>
                                </svg>
                            </div>
                <h3>レイテンシーチェッカー</h3>
                <p>ブラウザでデバイス/入力の遅延をテスト</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('screentestindex.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="5" width="18" height="12" rx="2"/>
                                    <path d="M8 21h8"/>
                                    <path d="M12 17v4"/>
                                </svg>
                            </div>
                <h3>スクリーンテスター</h3>
                <p>ドット抜け・固着・ホットピクセルを検出</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('webcamtesterindex.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="7" width="14" height="10" rx="2"/>
                                    <path d="M17 10l4-3v10l-4-3"/>
                                </svg>
                            </div>
                <h3>ウェブカメラテスター</h3>
                <p>画質、解像度、スナップショットを確認</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('mic-tester.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="9" y="2" width="6" height="10" rx="3"/>
                                    <path d="M5 11a7 7 0 0 0 14 0"/>
                                    <path d="M12 18v4"/>
                                    <path d="M8 22h8"/>
                                </svg>
                            </div>
                <h3>マイクテスター</h3>
                <p>マイク入力と音量レベルを確認</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('headphone_speaker_tester_index.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 12a8 8 0 0 1 16 0"/>
                                    <rect x="3" y="12" width="4" height="7" rx="2"/>
                                    <rect x="17" y="12" width="4" height="7" rx="2"/>
                                </svg>
                            </div>
                <h3>ヘッドホン / スピーカーテスター</h3>
                <p>ステレオチャンネルと音声出力をテスト</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('ocr-tool.php'); ?>" class="tool-card">
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
            <a href="<?php echo url('qr-code-reader.php'); ?>" class="tool-card">
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
                <p>カメラまたは画像でQRコードを読み取り</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('QR_code_generator_scanner.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="6" height="6"/>
                                    <rect x="15" y="3" width="6" height="6"/>
                                    <rect x="3" y="15" width="6" height="6"/>
                                    <path d="M14 14h7v7h-7z"/>
                                    <path d="M9 9h6"/>
                                </svg>
                            </div>
                <h3>QRコード生成</h3>
                <p>カスタムQRコードをすぐ作成</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('whatsapp-link-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 6a8 8 0 0 1 16 6 8 8 0 0 1-8 6 8 8 0 0 1-4-.9L4 19l1.9-3.1A8 8 0 0 1 4 6z"/>
                                    <path d="M9 10l2 2 4-4"/>
                                </svg>
                            </div>
                <h3>WhatsAppリンク生成</h3>
                <p>クリック可能なWhatsAppチャットリンクを作成</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('whatsapp-Brand-link-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 7a3 3 0 0 1 3-3h6l7 7-7 7H7a3 3 0 0 1-3-3z"/>
                                    <circle cx="10" cy="9" r="1.5"/>
                                </svg>
                            </div>
                <h3>WhatsAppブランドリンク</h3>
                <p>ブランド用WhatsAppリンクとQRコードを作成</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('whatsapp-sentiment-analyzer.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <circle cx="9" cy="10" r="1"/>
                                    <circle cx="15" cy="10" r="1"/>
                                    <path d="M9 15c1.5 1.2 4.5 1.2 6 0"/>
                                </svg>
                            </div>
                <h3>WhatsApp感情分析</h3>
                <p>チャットの感情とトーンを分析</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
            <a href="<?php echo url('auto-password-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="5" y="10" width="14" height="10" rx="2"/>
                                    <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                                    <circle cx="12" cy="15" r="1.5"/>
                                </svg>
                            </div>
                <h3>パスワード生成</h3>
                <p>強力で安全なパスワードを即作成</p>
                <span class="tool-card-link">ツールを開く</span>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../../includes/components/tools-list-styles.php'; ?>
