<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>新規ユーザ登録</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>新規ユーザ登録</h1>
        <?php if($errors !== null): ?>
        <ul>
            <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <div class="users">
            <form action="user_create.php" method="POST">
                名前:<input type="text" name="name"><br>
                メールアドレス:<input type="email" name="email"><br>
                パスワード:<input type="password" name="password"><br>
                <button type="submit">登録</button>
            </form>
        </div>
        <p><a href="index.php">トップページへ</a></p>

    </body>
</html>