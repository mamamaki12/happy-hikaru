<?php
session_start();

// 直接アクセスされた場合は入力画面に戻す
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Happy Birthday!</title>
    <style>
        body { font-family: 'Hiragino Kaku Gothic ProN', sans-serif; text-align: center; background-color: #fff0f5; }
        .container { margin-top: 100px; animation: bounce 2s infinite; }
        h1 { font-size: 50px; color: #ff1493; }
        p { font-size: 24px; }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎉 Happy Birthday! 🎉</h1>
        <p>お誕生日おめでとう！<br>素敵な1年になりますように！</p>
        <p>🎂🍰🎁</p>
    </div>
</body>
</html>