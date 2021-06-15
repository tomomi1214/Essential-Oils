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
        <title>Essential Oil Page</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
    </head>
    <body>
        <h1>Essential Oils</h1>
        <div class="essential_oils">
            <h2><?= $oil->name ?>詳細</h2>
            
            <?php if($flash_message !== null): ?>
            <p><?= $flash_message ?></p>
            <?php endif; ?>
            <ul>
                <li><img src="<?= $oil->image ?>" style="max-width: 400px"></li>
                <li>名前：<?= $oil->name ?></li>
                <li>学名：<?= $oil->scientific_name ?></li>
                <li>科名：<?= $oil->plant_name ?></li>
                <li>抽出方法：<?= $oil->extraction ?></li>
                <li>香り：<?= $oil->aroma ?></li>
                <li>注意事項：<?= $oil->caution ?></li>
            </ul>
            <?php if($login_user->id === $oil->user_id): ?>
            <p><a href="oil_edit.php?id=<?= $id ?>">編集</a></p>
            <form action="oil_delete.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id?>">
                <button type="submit" onclick="return confirm('エッセンシャルオイル情報を削除します。よろしいですか？')">削除</button>
            </form>
            <?php endif; ?>
            <h3>効果</h3>
            <ul>
            <?php foreach($effects as $effect): ?>
                <li><a href="effect_detail_for_user.php?id=<?= $effect->id ?>"><?= $effect->effect ?></a></li>
            <?php endforeach; ?>
            </ul>
            <?php if($login_user->id === $relation->user_id): ?>
            <p><a href="relation_edit.php?id=<?= $id ?>">編集</a></p>
            <?php endif; ?>
            <br>
            <p1><a href="mypage_top.php">トップページへ</a></p1>
        </div>
        <script src="js/script.js"></script>

    </body>
</html>
