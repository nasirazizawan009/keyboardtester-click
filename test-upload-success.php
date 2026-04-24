<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>SFTP Upload Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .container {
            background: rgba(0,0,0,0.3);
            padding: 40px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #00ff00;
            font-size: 2.5em;
            margin: 0;
        }
        p {
            font-size: 1.2em;
            margin: 20px 0;
        }
        .success {
            color: #00ff00;
            font-weight: bold;
        }
        .info {
            background: rgba(255,255,255,0.1);
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .time {
            font-size: 0.9em;
            color: #ffff00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>✅ SFTP Upload Working!</h1>
        <p class="success">Your SFTP configuration is correct!</p>
        
        <div class="info">
            <p><strong>Server Time:</strong> <span class="time"><?php echo date('Y-m-d H:i:s'); ?></span></p>
            <p><strong>Domain:</strong> keyboardtester.click</p>
            <p><strong>Path:</strong> /home2/keyboard1/public_html/</p>
            <p><strong>Status:</strong> <span class="success">LIVE & CORRECT ✓</span></p>
        </div>

        <p>File uploaded to the correct directory!</p>
        <p style="font-size: 0.9em; color: #cccccc;">Now you can make changes to your site and upload them.</p>
    </div>
</body>
</html>