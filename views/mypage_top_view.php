<!DOCTYPE html>
<html lag="ja">
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
        <title>Aroma Knowledge</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </head>    
    <body>
        <h1>Aroma Knowledge</h1>
        <p>Hello <?= $login_user->name ?> !</p>
        <p><a href="logout.php">ログアウト</a></p>
        
        <?php if($flash_message !== null): ?>
        <p><?= $flash_message ?></p>
        <?php endif; ?>

        <div class="essential_oils">
            <h2>Essential Oils</h2>
            <?php $pre_letter = ''; ?>
            <?php foreach($oils as $oil): ?>
            <ul>
                <?php $letter = strtoupper(substr($oil->english_name, 0,1)); ?>
                <?php if($letter !== $pre_letter): ?>
                <h3><?= $letter ?></h3>
                <?php endif; ?>
                <?php $pre_letter = $letter; ?>
                <li><a href="oil_detail_for_user.php?id=<?= $oil->id ?>"><?= $oil->name ?></a></li>
            </ul>
            <?php endforeach; ?>

            <p1><a href="oil_register.php">エッセンシャルオイル登録</a></p1><br>
        </div>
        <div class="effects">
            <h2>Effects</h2>
            <?php foreach($effects as $effect): ?>
            <ul>
                <li><a href="effect_detail_for_user.php?id=<?= $effect->id ?>"><?= $effect->effect ?></a></li>
            </ul>
            <?php endforeach; ?>
            <p1><a href="effect_register.php">効果登録</a></p1><br>
            <p1><a href="relation_register.php">関連登録</a></p1><br>
        </div>
    </body>
</html>