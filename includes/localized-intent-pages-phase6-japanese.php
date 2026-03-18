<?php

return [
    'japanese' => [
        'htmlLang' => 'ja',
        'hreflang' => 'ja',
        'ogLocale' => 'ja_JP',
        'dir' => 'ltr',
        'mainClass' => 'landing-main',
        'configInclude' => 'languages/japanese/config-ja.php',
        'headerInclude' => 'languages/japanese/header-ja.php',
        'footerInclude' => 'languages/japanese/footer-ja.php',
        'toolsListInclude' => 'languages/japanese/sections/tools-list-ja.php',
        'fontHref' => 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap',
        'bodyFontFamily' => '\'Noto Sans JP\', \'Space Grotesk\', sans-serif',
        'clusterKicker' => '関連ページ',
        'openPageLabel' => 'ページを開く',
        'clusters' => [
            'screen' => [
                'title' => '関連スクリーンテスト',
                'intro' => '同じスクリーンテストで、ドット抜けや見える不具合をまとめて確認できます。',
                'pages' => [
                    [
                        'key' => 'screen-test',
                        'path' => 'languages/japanese/screen-test.php',
                        'name' => 'スクリーンテスト',
                        'description' => '単色表示とフルスクリーンで、輝度むらや表示欠陥をチェックします。'
                    ],
                    [
                        'key' => 'dead-pixel-test',
                        'path' => 'languages/japanese/dead-pixel-test.php',
                        'name' => 'ドット抜けテスト',
                        'description' => '色を切り替えながら、常に暗いままの画素や反応しないサブピクセルを探します。'
                    ]
                ]
            ],
            'mic' => [
                'title' => '関連マイクテスト',
                'intro' => '同じマイクテストで、基本動作の確認にも入力レベルの確認にも使えます。',
                'pages' => [
                    [
                        'key' => 'mic-test',
                        'path' => 'languages/japanese/mic-test.php',
                        'name' => 'マイクテスター',
                        'description' => 'ブラウザ内で権限、音声入力、マイクの反応を確認できます。'
                    ],
                    [
                        'key' => 'microphone-volume-test',
                        'path' => 'languages/japanese/microphone-volume-test.php',
                        'name' => 'マイク音量テスト',
                        'description' => 'ライブメーターで入力レベルとピーク値を確認できます。'
                    ]
                ]
            ],
            'webcam' => [
                'title' => '関連カメラテスト',
                'intro' => '同じウェブカメラツールで、実際に出ている解像度も確認できます。',
                'pages' => [
                    [
                        'key' => 'webcam-test',
                        'path' => 'languages/japanese/webcam-test.php',
                        'name' => 'ウェブカメラテスター',
                        'description' => 'プレビューを開き、カメラを切り替え、ブラウザが機器を認識しているか確認できます。'
                    ],
                    [
                        'key' => 'camera-resolution-test',
                        'path' => 'languages/japanese/camera-resolution-test.php',
                        'name' => 'カメラ解像度テスト',
                        'description' => 'ブラウザ上でウェブカメラが本当に480p、720p、1080pを出せるか確認します。'
                    ]
                ]
            ],
            'qr-reader' => [
                'title' => '関連QRテスト',
                'intro' => '同じQRリーダーで、ライブスキャンにも画像ファイル内のQR読み取りにも対応します。',
                'pages' => [
                    [
                        'key' => 'qr-reader',
                        'path' => 'languages/japanese/qr-reader.php',
                        'name' => 'QRコードリーダー',
                        'description' => 'カメラまたは画像アップロードでQRコードを読み取ります。'
                    ],
                    [
                        'key' => 'scan-qr-from-image',
                        'path' => 'languages/japanese/scan-qr-from-image.php',
                        'name' => '画像からQRを読み取る',
                        'description' => 'スクリーンショット、写真、保存済みファイルをアップロードしてQRをすばやくデコードします。'
                    ]
                ]
            ]
        ],
        'pages' => [
            'dead-pixel-test' => [
                'path' => 'languages/japanese/dead-pixel-test.php',
                'englishPath' => 'dead-pixel-test.php',
                'cluster' => 'screen',
                'toolInclude' => 'languages/japanese/tools/screen-test-tool.php',
                'toolAnchor' => 'screen-test',
                'meta' => [
                    'title' => 'ドット抜けテスト | KeyboardTester.click',
                    'description' => '単色表示とフルスクリーンでモニターのドット抜けを確認できます。ディスプレイ、ノートPC、外部モニターをブラウザですぐ検査できます。',
                    'keywords' => 'ドット抜けテスト, デッドピクセル確認, モニターテスト, 画面不良チェック',
                    'ogImage' => 'images/screen-test/hero.svg'
                ],
                'hero' => [
                    'title' => 'ドット抜けテスト',
                    'lede' => '黒、白、単色を表示して、常に暗いままの点を見つけます。',
                    'primaryCta' => '画面を確認',
                    'secondaryCta' => '確認方法'
                ],
                'toolSection' => [
                    'kicker' => 'メインツール',
                    'title' => 'ドット抜けチェッカー',
                    'lede' => '同じスクリーンテストを使って、モニターやノートPCをフルスクリーンで目視確認できます。'
                ],
                'trustItems' => [
                    ['title' => 'フルスクリーン', 'desc' => '見やすく確認'],
                    ['title' => '単色表示', 'desc' => '黒、白、RGB'],
                    ['title' => 'インストール不要', 'desc' => 'ブラウザだけで完了'],
                    ['title' => '即切替', 'desc' => '背景をすぐ変更']
                ],
                'guide' => [
                    'kicker' => 'クイックガイド',
                    'title' => 'ドット抜けの確認方法',
                    'steps' => [
                        ['title' => 'ツールを開く', 'text' => '確認したい画面を用意してテストを開きます。'],
                        ['title' => 'フルスクリーンにする', 'text' => '端や隅まで見やすいようにフルスクリーンに切り替えます。'],
                        ['title' => '色を切り替える', 'text' => '黒、白、赤、緑、青を切り替えて反応しない画素を探します。'],
                        ['title' => '不具合を確認する', 'text' => '色を何度か切り替えて、暗い点が同じ位置に残るか確認します。']
                    ]
                ],
                'schema' => [
                    'name' => 'ドット抜けテスト',
                    'description' => '単色表示とフルスクリーンでドット抜けを確認できるオンラインツールです。',
                    'url' => 'languages/japanese/dead-pixel-test.php',
                    'category' => 'UtilityApplication',
                    'screenshot' => 'images/screen-test/hero.svg',
                    'features' => ['フルスクリーン', '単色表示', '目視チェック', '背景の即切替']
                ],
                'breadcrumbs' => [
                    ['name' => 'ホーム', 'url' => '/languages/japanese/'],
                    ['name' => 'ドット抜けテスト', 'url' => '']
                ],
                'priority' => '0.74',
                'changefreq' => 'weekly'
            ],
            'microphone-volume-test' => [
                'path' => 'languages/japanese/microphone-volume-test.php',
                'englishPath' => 'microphone-volume-test.php',
                'cluster' => 'mic',
                'toolInclude' => 'languages/japanese/tools/mic-test-tool.php',
                'toolAnchor' => 'mic-test',
                'meta' => [
                    'title' => 'マイク音量テスト | KeyboardTester.click',
                    'description' => 'ライブメーターでマイク入力レベルとピーク値を確認できます。会議、配信、録音前のチェックに便利です。',
                    'keywords' => 'マイク音量テスト, マイク入力レベル, マイクピーク確認, マイクメーター',
                    'ogImage' => 'images/mic-test/hero.svg'
                ],
                'hero' => [
                    'title' => 'マイク音量テスト',
                    'lede' => 'ブラウザ上のライブメーターでマイク入力レベルとピーク値を確認できます。',
                    'primaryCta' => 'マイクを測定',
                    'secondaryCta' => '使い方'
                ],
                'toolSection' => [
                    'kicker' => 'メインツール',
                    'title' => 'マイク音量メーター',
                    'lede' => '同じマイクテストを使って、普通の声や大きめの声で入力レベルがどう変わるか確認します。'
                ],
                'trustItems' => [
                    ['title' => 'ライブメーター', 'desc' => 'すぐ反応'],
                    ['title' => 'ピーク表示', 'desc' => '最大値が見える'],
                    ['title' => 'プライベート', 'desc' => '音声は送信しない'],
                    ['title' => '録音なし', 'desc' => '診断専用']
                ],
                'guide' => [
                    'kicker' => 'クイックガイド',
                    'title' => 'マイク音量の確認方法',
                    'steps' => [
                        ['title' => 'アクセスを許可', 'text' => 'ブラウザにマイク使用を許可します。'],
                        ['title' => '普通の声で話す', 'text' => '短いフレーズを話し、メーターが動くか確認します。'],
                        ['title' => 'ピークを確認', 'text' => '少し大きめの声でも話して最大値を確認します。'],
                        ['title' => 'ゲインを調整', 'text' => '小さすぎる、または割れる場合はシステム側のレベルを調整して再確認します。']
                    ]
                ],
                'schema' => [
                    'name' => 'マイク音量テスト',
                    'description' => 'ブラウザでマイクの入力レベルとピークを確認できるオンラインツールです。',
                    'url' => 'languages/japanese/microphone-volume-test.php',
                    'category' => 'UtilityApplication',
                    'screenshot' => 'images/mic-test/hero.svg',
                    'features' => ['ライブメーター', 'ピーク表示', 'ブラウザ権限確認', '録音なし']
                ],
                'breadcrumbs' => [
                    ['name' => 'ホーム', 'url' => '/languages/japanese/'],
                    ['name' => 'マイク音量テスト', 'url' => '']
                ],
                'priority' => '0.73',
                'changefreq' => 'weekly'
            ],
            'camera-resolution-test' => [
                'path' => 'languages/japanese/camera-resolution-test.php',
                'englishPath' => 'camera-resolution-test.php',
                'cluster' => 'webcam',
                'toolInclude' => 'languages/japanese/tools/webcam-test-tool.php',
                'toolAnchor' => 'webcam-test',
                'meta' => [
                    'title' => 'カメラ解像度テスト | KeyboardTester.click',
                    'description' => 'ブラウザでウェブカメラが480p、720p、1080pを本当に出せるか確認できます。解像度を切り替えて実際の動画サイズを比較できます。',
                    'keywords' => 'カメラ解像度テスト, webcam 720p テスト, webcam 1080p テスト, 実解像度確認',
                    'ogImage' => 'images/webcam-test/hero.svg'
                ],
                'hero' => [
                    'title' => 'カメラ解像度テスト',
                    'lede' => 'ブラウザ上でウェブカメラが本当に480p、720p、1080pを出せるか確認します。',
                    'primaryCta' => 'カメラを確認',
                    'secondaryCta' => 'クイックガイド'
                ],
                'toolSection' => [
                    'kicker' => 'メインツール',
                    'title' => 'カメラ解像度チェッカー',
                    'lede' => '同じウェブカメラツールで解像度を切り替え、結果を比較し、実際の動画サイズを確認できます。'
                ],
                'trustItems' => [
                    ['title' => 'ライブプレビュー', 'desc' => '映像をその場で確認'],
                    ['title' => '複数解像度', 'desc' => '480p、720p以上'],
                    ['title' => '実サイズ表示', 'desc' => '実際の値を確認'],
                    ['title' => 'インストール不要', 'desc' => 'ブラウザで完結']
                ],
                'guide' => [
                    'kicker' => 'クイックガイド',
                    'title' => 'カメラ解像度の確認方法',
                    'steps' => [
                        ['title' => 'カメラを許可', 'text' => 'ブラウザにウェブカメラへのアクセスを許可します。'],
                        ['title' => '解像度を選ぶ', 'text' => '480p、720p、1080pなどの設定を選んでから開始します。'],
                        ['title' => '実際のサイズを見る', 'text' => 'カメラ起動後に表示される解像度を確認します。'],
                        ['title' => '複数設定を比較', 'text' => '別の解像度でも繰り返し試して、実際に対応するモードを確認します。']
                    ]
                ],
                'schema' => [
                    'name' => 'カメラ解像度テスト',
                    'description' => 'ウェブカメラが実際に出力している解像度を確認できるオンラインツールです。',
                    'url' => 'languages/japanese/camera-resolution-test.php',
                    'category' => 'UtilityApplication',
                    'screenshot' => 'images/webcam-test/hero.svg',
                    'features' => ['ライブプレビュー', '解像度プリセット', '実際の動画サイズ', 'デバイス切替']
                ],
                'breadcrumbs' => [
                    ['name' => 'ホーム', 'url' => '/languages/japanese/'],
                    ['name' => 'カメラ解像度テスト', 'url' => '']
                ],
                'priority' => '0.73',
                'changefreq' => 'weekly'
            ],
            'scan-qr-from-image' => [
                'path' => 'languages/japanese/scan-qr-from-image.php',
                'englishPath' => 'scan-qr-from-image.php',
                'cluster' => 'qr-reader',
                'toolInclude' => 'languages/japanese/tools/qr-reader-tool.php',
                'toolAnchor' => 'qr-reader',
                'meta' => [
                    'title' => '画像からQRを読み取る | KeyboardTester.click',
                    'description' => 'スクリーンショット、写真、保存済みファイルをアップロードしてQRコードをオンラインで読み取れます。アプリなしで画像からQRをデコードできます。',
                    'keywords' => '画像 qr 読み取り, スクリーンショット qr, 写真 qr デコード, qr ファイル 読み取り',
                    'ogImage' => 'images/qr-reader/hero.svg'
                ],
                'hero' => [
                    'title' => '画像からQRを読み取る',
                    'lede' => 'スクリーンショット、写真、保存済みファイルをアップロードしてQRをブラウザですぐ読み取れます。',
                    'primaryCta' => '画像のQRを読む',
                    'secondaryCta' => '仕組みを見る'
                ],
                'toolSection' => [
                    'kicker' => 'メインツール',
                    'title' => '画像用QRリーダー',
                    'lede' => '同じQRリーダーを使って、スクリーンショット、印刷物、保存済みファイルからQRを読み取れます。'
                ],
                'trustItems' => [
                    ['title' => '画像アップロード', 'desc' => 'スクリーンショットと写真対応'],
                    ['title' => 'ローカル解析', 'desc' => '外部アプリ不要'],
                    ['title' => 'すばやい結果', 'desc' => '文字列またはURL'],
                    ['title' => 'プライベート', 'desc' => '処理はブラウザ内']
                ],
                'guide' => [
                    'kicker' => 'クイックガイド',
                    'title' => '画像からQRを読む方法',
                    'steps' => [
                        ['title' => '画像をアップロード', 'text' => 'QRコードがはっきり写っているスクリーンショット、写真、ファイルを選びます。'],
                        ['title' => '解析を待つ', 'text' => 'ツールが画像を自動解析してQRコードを探します。'],
                        ['title' => '結果を確認', 'text' => '読み取りに成功したら、文字列をコピーするかURLを開きます。'],
                        ['title' => 'より鮮明な画像で再試行', 'text' => '失敗した場合は、より鮮明な画像やQRに寄った切り抜きを試します。']
                    ]
                ],
                'schema' => [
                    'name' => '画像からQRを読み取る',
                    'description' => '画像、スクリーンショット、保存済みファイルからQRコードを読むオンラインツールです。',
                    'url' => 'languages/japanese/scan-qr-from-image.php',
                    'category' => 'UtilityApplication',
                    'screenshot' => 'images/qr-reader/hero.svg',
                    'features' => ['画像アップロード', 'ローカル解析', 'すばやい結果', 'アプリ不要']
                ],
                'breadcrumbs' => [
                    ['name' => 'ホーム', 'url' => '/languages/japanese/'],
                    ['name' => '画像からQRを読み取る', 'url' => '']
                ],
                'priority' => '0.72',
                'changefreq' => 'weekly'
            ]
        ]
    ]
];
