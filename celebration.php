<?php
session_start();

// 1. ログイン認証チェック
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    header("Location: index.php");
    exit;
}

// 2. 日付チェックの設定
date_default_timezone_set('Asia/Tokyo'); // 日本時間に設定
$today = date('Y-m-d');
$birthday = '2026-02-06'; // ★ここに解禁したい日付を設定（西暦-月-日）

// 3. 誕生日前の場合の表示
if ($today < $birthday) {
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ちょっと待ってね</title>
    <style>
        body {
            font-family: 'Hiragino Kaku Gothic ProN', sans-serif;
            text-align: center;
            background-color: #f0f8ff;
            color: #333;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        h1 { font-size: 1.5rem; margin-bottom: 20px; color: #555; }
        .icon { font-size: 80px; margin-bottom: 20px; animation: pulse 2s infinite; }
        p { font-size: 1rem; line-height: 1.8; }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="icon">🤫</div>
    <h1>まだ誕生日じゃないよ</h1>
    <p>誕生日になったらまた来てね。</p>
</body>
</html>
<?php
    exit; // ここで処理を止めて、下の誕生日画面を表示させない
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday!</title>
    <style>
        body { 
            font-family: 'Hiragino Kaku Gothic ProN', sans-serif; 
            text-align: center; 
            background: linear-gradient(135deg, #fff0f5 0%, #ffe4e1 100%); 
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #444;
        }
        .container { 
            padding: 20px;
            width: 100%;
            box-sizing: border-box;
            animation: fadeIn 1.5s ease-out;
            position: relative;
        }
        h1 { 
            font-size: 2.8rem; 
            color: #ff1493; 
            text-shadow: 2px 2px 0px #fff, 4px 4px 0px rgba(0,0,0,0.1);
            margin: 10px 0;
            line-height: 1.2;
            letter-spacing: 0.05em;
        }
        .decoration {
            font-size: 2rem;
            margin-bottom: -10px;
            display: block;
        }
        p { 
            font-size: 1.1rem; 
            line-height: 1.8; 
            margin-top: 20px;
        }
        .cake { 
            font-size: 80px; 
            margin: 10px 0; 
            animation: bounce 2s infinite; 
            display: inline-block; 
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes bounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="decoration">🎉✨</div>
        
        <h1>Happy<br>Birthday!</h1>
        
        <div class="cake">🎂</div>
        
        <p>
            ひかるくん（ちゃん）、<br>
            お誕生日おめでとう！<br>
            最高にハッピーな<br>
            1年になりますように！
        </p>
        <p>🎁🥂✨</p>
    </div>
</body>
</html>