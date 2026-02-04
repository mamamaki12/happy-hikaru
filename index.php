<?php
session_start();
$correct_pin = "831073"; // お好きな番号に変えてください
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['pin'] === $correct_pin) {
        $_SESSION['auth'] = true;
        header("Location: /happy-hikaru/celebration.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Message</title>
    <style>
        body { 
            font-family: 'Helvetica Neue', Arial, sans-serif; 
            text-align: center; 
            background-color: #f0f2f5; 
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .card {
            background: white;
            padding: 40px 20px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 85%;
            max-width: 350px;
        }
        h1 { color: #333; font-size: 1.5rem; margin-bottom: 20px; }
        input[type="password"] { 
            font-size: 24px; 
            padding: 12px; 
            width: 80%; 
            text-align: center; 
            border: 2px solid #ddd;
            border-radius: 10px;
            outline: none;
            -webkit-appearance: none; /* iOS対策 */
        }
        input:focus { border-color: #ff69b4; }
        button { 
            margin-top: 20px;
            font-size: 18px; 
            font-weight: bold;
            padding: 12px 40px; 
            cursor: pointer; 
            background: linear-gradient(45deg, #ff69b4, #ff8c00); 
            color: white; 
            border: none; 
            border-radius: 50px;
            width: 80%;
            box-shadow: 0 4px 10px rgba(255, 105, 180, 0.4);
        }
        .error { color: #ff4757; margin-top: 15px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="card">
        <h1>🔓 暗証番号入力</h1>
        <p style="color: #666;">PINコードを入力してね</p>
        <form method="POST">
            <input type="password" name="pin" inputmode="numeric" maxlength="6" placeholder="****" required>
            <br>
            <button type="submit">あける</button>
        </form>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>