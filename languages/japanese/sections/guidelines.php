<?php
/**
 * Japanese Keyboard Tester - Guidelines Section
 */
?>

<section class="guidelines-section" id="guidelines" aria-labelledby="guidelines-title-ja">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">使用ガイド</p>
            <h2 id="guidelines-title-ja">キーボードテスターの使い方</h2>
            <p class="section-lede">キーボードテストで最良の結果を得るための手順をご紹介します。</p>
        </div>

        <div class="guidelines-grid">
            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                    </svg>
                </div>
                <h3>全てのキーをテスト</h3>
                <p>キーボードの各キーを押して、正しく反応するか確認します。テスト済みのキーは色が変わります。</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                </div>
                <h3>レイテンシーを測定</h3>
                <p>レイテンシーモードを有効にして、各キーの応答時間を確認。値が低いほど良いパフォーマンスです。</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                        <circle cx="10" cy="10" r="1"/>
                        <circle cx="14" cy="10" r="1"/>
                    </svg>
                </div>
                <h3>ゴースティングを検出</h3>
                <p>複数のキーを同時に押してゴースティング問題を検出。登録されないキーがある場合、ハードウェアの制限がある可能性があります。</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <path d="M9 9h6v6H9z"/>
                    </svg>
                </div>
                <h3>固着キーを確認</h3>
                <p>押していないのにキーが点灯したままの場合、固着または故障の可能性があります。該当キーの清掃または交換をお勧めします。</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                </div>
                <h3>結果をエクスポート</h3>
                <p>テストセッションのレポートを保存して、ドキュメント化やテクニカルサポートとの共有に活用できます。</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <h3>完全なプライバシー</h3>
                <p>全てのテストはブラウザ内でローカルに実行されます。キー押下データがサーバーに送信されることはありません。</p>
            </article>
        </div>

        <div class="faq-section">
            <h3>よくある質問</h3>
            <div class="faq-grid">
                <details class="faq-item">
                    <summary>一部のキーが登録されないのはなぜですか？</summary>
                    <p>一部のキーの組み合わせは、ハードウェアの制限（ゴースティング）により登録されない場合があります。これはメンブレンキーボードでよく見られます。</p>
                </details>
                <details class="faq-item">
                    <summary>異なる色は何を意味しますか？</summary>
                    <p>各色は押下レベルを表します：シアン（1）、ゴールド（2）、グリーン（3）、レッド（4）、パープル（5）、その後サイクルが繰り返されます。</p>
                </details>
                <details class="faq-item">
                    <summary>良いレイテンシーとはどれくらいですか？</summary>
                    <p>50ms未満のレイテンシーは優秀です。50-100msは許容範囲です。100msを超える場合は、接続またはハードウェアの問題を示している可能性があります。</p>
                </details>
                <details class="faq-item">
                    <summary>Bluetoothキーボードでも動作しますか？</summary>
                    <p>はい、このテスターはBluetoothやUSBを含む、コンピュータに接続されたあらゆるタイプのキーボードで動作します。</p>
                </details>
            </div>
        </div>
    </div>
</section>

<style>
.guidelines-section {
    padding: 80px 0;
    background: var(--bg-secondary, #1a1a24);
}

.guidelines-section .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.guidelines-section .section-head {
    text-align: center;
    margin-bottom: 48px;
}

.guidelines-section .section-kicker {
    font-size: 0.875rem;
    font-weight: 600;
    color: #00d4ff;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 8px;
}

.guidelines-section h2 {
    font-size: clamp(1.8rem, 3vw, 2.4rem);
    color: var(--text-color, #e2e8f0);
    margin-bottom: 12px;
}

.guidelines-section .section-lede {
    color: var(--text-muted, #94a3b8);
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
}

.guidelines-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
    margin-bottom: 60px;
}

.guideline-card {
    background: var(--card-bg, rgba(30, 41, 59, 0.6));
    border: 1px solid var(--card-border, rgba(148, 163, 184, 0.15));
    border-radius: 16px;
    padding: 28px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.guideline-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2);
}

.guideline-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: rgba(0, 212, 255, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    color: #00d4ff;
}

.guideline-card h3 {
    font-size: 1.15rem;
    color: var(--text-color, #e2e8f0);
    margin-bottom: 10px;
}

.guideline-card p {
    color: var(--text-muted, #94a3b8);
    line-height: 1.6;
    font-size: 0.95rem;
}

.faq-section {
    max-width: 800px;
    margin: 0 auto;
}

.faq-section h3 {
    font-size: 1.5rem;
    color: var(--text-color, #e2e8f0);
    text-align: center;
    margin-bottom: 24px;
}

.faq-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.faq-item {
    background: var(--card-bg, rgba(30, 41, 59, 0.6));
    border: 1px solid var(--card-border, rgba(148, 163, 184, 0.15));
    border-radius: 12px;
    overflow: hidden;
}

.faq-item summary {
    padding: 18px 24px;
    cursor: pointer;
    font-weight: 600;
    color: var(--text-color, #e2e8f0);
    list-style: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.faq-item summary::-webkit-details-marker {
    display: none;
}

.faq-item summary::after {
    content: '+';
    font-size: 1.5rem;
    color: #00d4ff;
    transition: transform 0.2s ease;
}

.faq-item[open] summary::after {
    transform: rotate(45deg);
}

.faq-item p {
    padding: 0 24px 18px;
    color: var(--text-muted, #94a3b8);
    line-height: 1.6;
}

@media (max-width: 768px) {
    .guidelines-grid {
        grid-template-columns: 1fr;
    }
}
</style>
