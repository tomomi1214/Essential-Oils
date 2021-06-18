<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <!-- ViewPort Setting -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- Original CSS -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Favicon -->
        <link rel="icon" href="images/favicon.ico">
        <title>Essential Oil登録</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </head>
    <body>
        <h2>関連登録</h2>
        <?php if($errors !== null): ?>
        <ul>
            <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <div class="relations">
            <form action="relation_create.php" method="POST" >
                エッセンシャルオイル：
                <?php foreach($oils as $oil): ?>
                <input type="radio" name="oil" value="<?= $oil->id ?>"><?= $oil->name ?>&nbsp;                    
                <?php endforeach; ?>
                <br>
                効果：
                <?php foreach($effects as $effect): ?>
                <input type="radio" name="effect" value="<?= $effect->id ?>"><?= $effect->effect ?>&nbsp;
                <?php endforeach; ?>
                <br>
                使用方法：<input type="text" name="howto"><br>
                詳細：<input type="text" name="content"><br>
                注意事項：<input type="text" name="caution"><br>
                <input type="hidden" name="page" value="<?= $page ?>">
                <button type="submit">登録</button>
            </form>
            <br><br>
            <p1><a href="mypage_top.php">トップページへ</a></p1>
        </div>
    </body>
</html>