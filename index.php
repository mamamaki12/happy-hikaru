<?php
session_start();

// 正解のPINコードを設定（例：誕生日の0520など）
$correct_pin = "1234"; 
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['pin'] === $correct_pin) {
        $_SESSION['auth'] = true; // 認証成功のフラグをセッションに保存
        header("Location: celebration.php");
        exit;
    } else {
        $error = "コードが違います。もう一度試してみて！";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Secret Message for You</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding-top: 100px; background-color: #f0f8ff; }
        input { font-size: 20px; padding: 10px; width: 100px; text-align: center; }
        button { font-size: 20px; padding: 10px 20px; cursor: pointer; background: #ff69b4; color: white; border: none; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>🔓 秘密のメッセージ</h1>
    <p>4桁のPINコードを入力してね</p>
    <form method="POST">
        <input type="password" name="pin" maxlength="4" required>
        <br><br>
        <button type="submit">開ける</button>
    </form>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>