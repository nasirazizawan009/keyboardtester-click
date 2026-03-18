<?php

return [
    'korean' => [
        'htmlLang' => 'ko',
        'hreflang' => 'ko',
        'ogLocale' => 'ko_KR',
        'dir' => 'ltr',
        'mainClass' => 'landing-main',
        'configInclude' => 'languages/korean/config-ko.php',
        'headerInclude' => 'languages/korean/header-ko.php',
        'footerInclude' => 'languages/korean/footer-ko.php',
        'toolsListInclude' => 'languages/korean/sections/tools-list-ko.php',
        'fontHref' => 'https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;600;700&display=swap',
        'bodyFontFamily' => '\'Noto Sans KR\', \'Space Grotesk\', sans-serif',
        'clusterKicker' => '관련 페이지',
        'openPageLabel' => '페이지 열기',
        'clusters' => [
            'screen' => [
                'title' => '관련 화면 테스트',
                'intro' => '같은 화면 테스트 도구로 불량 화소와 다른 화면 이상을 함께 확인할 수 있습니다.',
                'pages' => [
                    [
                        'key' => 'screen-test',
                        'path' => 'languages/korean/screen-test.php',
                        'name' => '화면 테스터',
                        'description' => '단색 화면과 전체 화면 모드로 밝기 균일도와 패널 결함을 점검합니다.'
                    ],
                    [
                        'key' => 'dead-pixel-test',
                        'path' => 'languages/korean/dead-pixel-test.php',
                        'name' => '불량 화소 테스트',
                        'description' => '색상을 바꾸면서 계속 어둡게 남는 점이나 반응하지 않는 서브픽셀을 찾습니다.'
                    ]
                ]
            ],
            'mic' => [
                'title' => '관련 마이크 테스트',
                'intro' => '같은 마이크 테스트 도구로 기본 동작 확인과 실시간 입력 레벨 확인을 모두 할 수 있습니다.',
                'pages' => [
                    [
                        'key' => 'mic-test',
                        'path' => 'languages/korean/mic-test.php',
                        'name' => '마이크 테스터',
                        'description' => '브라우저에서 권한, 오디오 입력, 마이크 반응을 바로 확인할 수 있습니다.'
                    ],
                    [
                        'key' => 'microphone-volume-test',
                        'path' => 'languages/korean/microphone-volume-test.php',
                        'name' => '마이크 볼륨 테스트',
                        'description' => '실시간 미터로 입력 레벨과 피크 값을 확인합니다.'
                    ]
                ]
            ],
            'webcam' => [
                'title' => '관련 카메라 테스트',
                'intro' => '같은 웹캠 도구로 브라우저에서 실제 해상도까지 확인할 수 있습니다.',
                'pages' => [
                    [
                        'key' => 'webcam-test',
                        'path' => 'languages/korean/webcam-test.php',
                        'name' => '웹캠 테스터',
                        'description' => '미리보기를 열고 카메라를 바꾸며 브라우저가 장치를 감지하는지 확인합니다.'
                    ],
                    [
                        'key' => 'camera-resolution-test',
                        'path' => 'languages/korean/camera-resolution-test.php',
                        'name' => '카메라 해상도 테스트',
                        'description' => '브라우저에서 웹캠이 실제로 480p, 720p, 1080p를 제공하는지 확인합니다.'
                    ]
                ]
            ],
            'qr-reader' => [
                'title' => '관련 QR 테스트',
                'intro' => '같은 QR 리더로 라이브 스캔과 이미지 파일 속 QR 읽기를 모두 처리할 수 있습니다.',
                'pages' => [
                    [
                        'key' => 'qr-reader',
                        'path' => 'languages/korean/qr-reader.php',
                        'name' => 'QR 코드 리더',
                        'description' => '카메라 또는 이미지 업로드로 QR 코드를 읽습니다.'
                    ],
                    [
                        'key' => 'scan-qr-from-image',
                        'path' => 'languages/korean/scan-qr-from-image.php',
                        'name' => '이미지에서 QR 스캔',
                        'description' => '스크린샷, 사진, 저장한 파일을 업로드해 몇 초 안에 QR을 해독합니다.'
                    ]
                ]
            ]
        ],
        'pages' => [
            'dead-pixel-test' => [
                'path' => 'languages/korean/dead-pixel-test.php',
                'englishPath' => 'dead-pixel-test.php',
                'cluster' => 'screen',
                'toolInclude' => 'languages/korean/tools/screen-test-tool.php',
                'toolAnchor' => 'screen-test',
                'meta' => [
                    'title' => '불량 화소 테스트 | KeyboardTester.click',
                    'description' => '단색 화면과 전체 화면 모드로 모니터의 불량 화소를 확인하세요. 모니터, 노트북, 외부 디스플레이를 브라우저에서 바로 점검할 수 있습니다.',
                    'keywords' => '불량 화소 테스트, 데드 픽셀 확인, 모니터 테스트, 화면 결함 점검',
                    'ogImage' => 'images/screen-test/hero.svg'
                ],
                'hero' => [
                    'title' => '불량 화소 테스트',
                    'lede' => '검정, 흰색, 단색 화면을 띄워 항상 어둡게 남는 점을 찾습니다.',
                    'primaryCta' => '화면 확인',
                    'secondaryCta' => '확인 방법'
                ],
                'toolSection' => [
                    'kicker' => '주요 도구',
                    'title' => '불량 화소 검사기',
                    'lede' => '같은 화면 테스트 도구로 모니터, 노트북, 외부 디스플레이를 전체 화면으로 점검할 수 있습니다.'
                ],
                'trustItems' => [
                    ['title' => '전체 화면', 'desc' => '더 선명한 점검'],
                    ['title' => '단색 표시', 'desc' => '검정, 흰색, RGB'],
                    ['title' => '설치 불필요', 'desc' => '브라우저에서 바로'],
                    ['title' => '빠른 전환', 'desc' => '배경 즉시 변경']
                ],
                'guide' => [
                    'kicker' => '빠른 가이드',
                    'title' => '불량 화소 확인 방법',
                    'steps' => [
                        ['title' => '도구 열기', 'text' => '확인할 화면을 준비한 뒤 테스트를 엽니다.'],
                        ['title' => '전체 화면으로 전환', 'text' => '가장자리와 이상한 점을 잘 보기 위해 전체 화면 모드를 사용합니다.'],
                        ['title' => '색상 바꾸기', 'text' => '검정, 흰색, 빨강, 초록, 파랑을 바꾸며 반응하지 않는 화소를 찾습니다.'],
                        ['title' => '결함 확인', 'text' => '색상을 다시 바꿔도 어두운 점이 같은 위치에 남는지 확인합니다.']
                    ]
                ],
                'schema' => [
                    'name' => '불량 화소 테스트',
                    'description' => '단색 화면과 전체 화면 모드로 불량 화소를 확인하는 온라인 도구입니다.',
                    'url' => 'languages/korean/dead-pixel-test.php',
                    'category' => 'UtilityApplication',
                    'screenshot' => 'images/screen-test/hero.svg',
                    'features' => ['전체 화면', '단색 표시', '시각 점검', '빠른 배경 전환']
                ],
                'breadcrumbs' => [
                    ['name' => '홈', 'url' => '/languages/korean/'],
                    ['name' => '불량 화소 테스트', 'url' => '']
                ],
                'priority' => '0.74',
                'changefreq' => 'weekly'
            ],
            'microphone-volume-test' => [
                'path' => 'languages/korean/microphone-volume-test.php',
                'englishPath' => 'microphone-volume-test.php',
                'cluster' => 'mic',
                'toolInclude' => 'languages/korean/tools/mic-test-tool.php',
                'toolAnchor' => 'mic-test',
                'meta' => [
                    'title' => '마이크 볼륨 테스트 | KeyboardTester.click',
                    'description' => '실시간 미터로 마이크 입력 레벨과 피크 값을 확인하세요. 회의, 방송, 녹음 전 점검에 유용합니다.',
                    'keywords' => '마이크 볼륨 테스트, 마이크 입력 레벨, 마이크 피크 확인, 마이크 미터',
                    'ogImage' => 'images/mic-test/hero.svg'
                ],
                'hero' => [
                    'title' => '마이크 볼륨 테스트',
                    'lede' => '브라우저의 실시간 미터로 마이크 입력 레벨과 피크 값을 확인합니다.',
                    'primaryCta' => '마이크 측정',
                    'secondaryCta' => '사용 방법'
                ],
                'toolSection' => [
                    'kicker' => '주요 도구',
                    'title' => '마이크 볼륨 미터',
                    'lede' => '같은 마이크 테스트 도구로 평소 목소리와 큰 목소리에서 입력 레벨이 어떻게 바뀌는지 확인합니다.'
                ],
                'trustItems' => [
                    ['title' => '실시간 미터', 'desc' => '즉시 반응'],
                    ['title' => '피크 표시', 'desc' => '최대값 확인'],
                    ['title' => '개인정보 보호', 'desc' => '오디오는 업로드 안 함'],
                    ['title' => '녹음 없음', 'desc' => '진단 전용']
                ],
                'guide' => [
                    'kicker' => '빠른 가이드',
                    'title' => '마이크 볼륨 확인 방법',
                    'steps' => [
                        ['title' => '접근 허용', 'text' => '브라우저가 마이크를 사용할 수 있도록 허용합니다.'],
                        ['title' => '보통 목소리로 말하기', 'text' => '짧게 말해 보고 미터가 움직이는지 확인합니다.'],
                        ['title' => '피크 확인', 'text' => '조금 더 크게 말해 최대값이 어디까지 올라가는지 확인합니다.'],
                        ['title' => '게인 조정', 'text' => '신호가 너무 작거나 찢어지면 시스템 입력 레벨을 조정한 뒤 다시 테스트합니다.']
                    ]
                ],
                'schema' => [
                    'name' => '마이크 볼륨 테스트',
                    'description' => '브라우저에서 마이크 입력 레벨과 피크를 확인할 수 있는 온라인 도구입니다.',
                    'url' => 'languages/korean/microphone-volume-test.php',
                    'category' => 'UtilityApplication',
                    'screenshot' => 'images/mic-test/hero.svg',
                    'features' => ['실시간 미터', '피크 표시', '브라우저 권한 확인', '녹음 없음']
                ],
                'breadcrumbs' => [
                    ['name' => '홈', 'url' => '/languages/korean/'],
                    ['name' => '마이크 볼륨 테스트', 'url' => '']
                ],
                'priority' => '0.73',
                'changefreq' => 'weekly'
            ],
            'camera-resolution-test' => [
                'path' => 'languages/korean/camera-resolution-test.php',
                'englishPath' => 'camera-resolution-test.php',
                'cluster' => 'webcam',
                'toolInclude' => 'languages/korean/tools/webcam-test-tool.php',
                'toolAnchor' => 'webcam-test',
                'meta' => [
                    'title' => '카메라 해상도 테스트 | KeyboardTester.click',
                    'description' => '브라우저에서 웹캠이 480p, 720p, 1080p를 실제로 제공하는지 확인할 수 있습니다. 해상도를 바꾸고 실제 영상 크기를 비교하세요.',
                    'keywords' => '카메라 해상도 테스트, 웹캠 해상도 확인, 웹캠 720p 테스트, 웹캠 1080p 테스트',
                    'ogImage' => 'images/webcam-test/hero.svg'
                ],
                'hero' => [
                    'title' => '카메라 해상도 테스트',
                    'lede' => '브라우저에서 웹캠이 실제로 480p, 720p, 1080p를 제공하는지 확인합니다.',
                    'primaryCta' => '카메라 확인',
                    'secondaryCta' => '빠른 가이드'
                ],
                'toolSection' => [
                    'kicker' => '주요 도구',
                    'title' => '카메라 해상도 검사기',
                    'lede' => '같은 웹캠 도구에서 해상도를 바꾸고 결과를 비교해 실제 영상 크기를 확인할 수 있습니다.'
                ],
                'trustItems' => [
                    ['title' => '라이브 미리보기', 'desc' => '실시간 영상'],
                    ['title' => '여러 해상도', 'desc' => '480p, 720p 이상'],
                    ['title' => '실제 크기', 'desc' => '보고된 값 확인'],
                    ['title' => '설치 불필요', 'desc' => '브라우저에서 바로']
                ],
                'guide' => [
                    'kicker' => '빠른 가이드',
                    'title' => '카메라 해상도 확인 방법',
                    'steps' => [
                        ['title' => '카메라 허용', 'text' => '브라우저에 웹캠 접근 권한을 허용합니다.'],
                        ['title' => '해상도 선택', 'text' => '480p, 720p, 1080p 같은 설정을 고른 뒤 테스트를 시작합니다.'],
                        ['title' => '실제 크기 확인', 'text' => '카메라가 켜진 뒤 도구가 표시하는 해상도를 확인합니다.'],
                        ['title' => '여러 모드 비교', 'text' => '다른 해상도로 반복해 실제 지원되는 모드를 확인합니다.']
                    ]
                ],
                'schema' => [
                    'name' => '카메라 해상도 테스트',
                    'description' => '웹캠이 실제로 출력하는 해상도를 확인할 수 있는 온라인 도구입니다.',
                    'url' => 'languages/korean/camera-resolution-test.php',
                    'category' => 'UtilityApplication',
                    'screenshot' => 'images/webcam-test/hero.svg',
                    'features' => ['라이브 미리보기', '해상도 프리셋', '실제 영상 크기', '장치 전환']
                ],
                'breadcrumbs' => [
                    ['name' => '홈', 'url' => '/languages/korean/'],
                    ['name' => '카메라 해상도 테스트', 'url' => '']
                ],
                'priority' => '0.73',
                'changefreq' => 'weekly'
            ],
            'scan-qr-from-image' => [
                'path' => 'languages/korean/scan-qr-from-image.php',
                'englishPath' => 'scan-qr-from-image.php',
                'cluster' => 'qr-reader',
                'toolInclude' => 'languages/korean/tools/qr-reader-tool.php',
                'toolAnchor' => 'qr-reader',
                'meta' => [
                    'title' => '이미지에서 QR 스캔 | KeyboardTester.click',
                    'description' => '스크린샷, 사진, 저장한 파일을 업로드해 온라인으로 QR 코드를 읽을 수 있습니다. 앱 설치 없이 이미지에서 QR을 해독하세요.',
                    'keywords' => '이미지 qr 스캔, 스크린샷 qr 읽기, 사진 qr 해독, 파일 qr 리더',
                    'ogImage' => 'images/qr-reader/hero.svg'
                ],
                'hero' => [
                    'title' => '이미지에서 QR 스캔',
                    'lede' => '스크린샷, 사진, 저장한 파일을 업로드해 브라우저에서 바로 QR을 읽을 수 있습니다.',
                    'primaryCta' => '이미지 QR 읽기',
                    'secondaryCta' => '작동 방식'
                ],
                'toolSection' => [
                    'kicker' => '주요 도구',
                    'title' => '이미지용 QR 리더',
                    'lede' => '같은 QR 리더를 이용해 스크린샷, 인쇄물, 저장된 파일 속 QR 코드를 읽을 수 있습니다.'
                ],
                'trustItems' => [
                    ['title' => '이미지 업로드', 'desc' => '스크린샷과 사진 지원'],
                    ['title' => '로컬 해독', 'desc' => '외부 앱 불필요'],
                    ['title' => '빠른 결과', 'desc' => '텍스트 또는 링크'],
                    ['title' => '개인정보 보호', 'desc' => '브라우저 안에서 처리']
                ],
                'guide' => [
                    'kicker' => '빠른 가이드',
                    'title' => '이미지에서 QR 읽는 방법',
                    'steps' => [
                        ['title' => '이미지 업로드', 'text' => 'QR 코드가 선명하게 보이는 스크린샷, 사진, 파일을 선택합니다.'],
                        ['title' => '분석 대기', 'text' => '도구가 이미지를 자동으로 분석해 QR 코드를 찾습니다.'],
                        ['title' => '결과 확인', 'text' => '읽기에 성공하면 텍스트를 복사하거나 링크를 엽니다.'],
                        ['title' => '더 선명한 이미지로 재시도', 'text' => '실패하면 더 선명한 이미지나 QR에 더 가깝게 자른 파일을 사용합니다.']
                    ]
                ],
                'schema' => [
                    'name' => '이미지에서 QR 스캔',
                    'description' => '이미지, 스크린샷, 저장된 파일에서 QR 코드를 읽는 온라인 도구입니다.',
                    'url' => 'languages/korean/scan-qr-from-image.php',
                    'category' => 'UtilityApplication',
                    'screenshot' => 'images/qr-reader/hero.svg',
                    'features' => ['이미지 업로드', '로컬 해독', '빠른 결과', '앱 설치 불필요']
                ],
                'breadcrumbs' => [
                    ['name' => '홈', 'url' => '/languages/korean/'],
                    ['name' => '이미지에서 QR 스캔', 'url' => '']
                ],
                'priority' => '0.72',
                'changefreq' => 'weekly'
            ]
        ]
    ]
];
