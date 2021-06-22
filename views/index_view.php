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
        <title>Aroma Knowledge</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="header">
            <h1>Aroma Knowledge</h1>
        </div>
        <?php if($flash_message !== null): ?>
        <p><?= $flash_message ?></p>
        <?php endif; ?>
        <div class="main">
            <span><a href="user_register.php">会員登録</a></span>
            <span> / </span>
            <span><a href="login.php">Login</a></span>
        </div>
        <div class="essential_oils">
            <h2 class="title">Essential Oils</h2>
            <div class="EoilContent">
                <?php $pre_letter = ''; ?>
                <?php foreach($oils as $oil): ?>
                <?php $letter = strtoupper(substr($oil->english_name, 0,1)); ?>
                <?php if($letter !== $pre_letter): ?>
                <p><?= $letter ?></p>
                <?php endif; ?>
                <?php $pre_letter = $letter; ?>
                <a href="oil_detail.php?id=<?= $oil->id ?>"><?= $oil->name ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="effects">
            <h2 class="title">Effects</h2>
            <div class="EffectContent">
            <?php foreach($effects as $effect): ?>
                <a href="effect_detail.php?id=<?= $effect->id ?>" class="EffectBtn"><?= $effect->effect ?></a>
            <?php endforeach; ?>
            </div>
        </div>
        <div class="footer">
            <h1 class="logo">Aroma Knowledge</h1>
            <div class="nav">
                <ul>
                    <li><a href="#">Essential Oils</a></li>
                    <li><a href="#">Effects</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">My Page</a></li>
                </ul>
            </div>
            <p class="copylight">COPYRIGHT © All rights Reserved.</p>
        </div>
    </body>
</html>