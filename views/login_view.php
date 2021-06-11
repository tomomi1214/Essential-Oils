<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ログイン</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>ログイン</h1>
        <?php if(flash_message !== ull): ?>
        <p><?= $flash_message ?></p>
        <?php endif; ?>
        <form action="login_check.php" method="POST">
            メールアドレス:<input type="email" name="email"><br>
            パスワード:<input type="password" name="password"><br>
            <button type="submit">ログイン</button>
        </form>
        <p><a href="index.php">トップページへ</a></p>

    </body>
</html>