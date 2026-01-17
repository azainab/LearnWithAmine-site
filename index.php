<?php echo 'Renamed site OK - ' . date('Y-m-d H:i:s'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnWithAmine</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; background: #f4f4f4; }
        h1 { color: #333; text-align: center; }
        .youtube { display: block; margin: 20px auto; text-align: center; font-size: 24px; }
        footer { text-align: center; margin-top: 40px; color: #666; }
    </style>
</head>
<body>
    <h1>🚀 Welcome to LearnWithAmine</h1>
    <p style="text-align: center;">Master AI, ML & Data Science with hands-on courses.</p>

    <a href="https://youtube.com/@learnwithamine" class="youtube" target="_blank">
        📺 Watch on YouTube
    </a>

    <footer>
        <?php echo 'Server: ' . php_uname('n') . ' | Time: ' . date('Y-m-d H:i:s T'); ?>
        | <a href="/github-webhook.php">Webhook Active</a>
    </footer>
</body>
</html>
