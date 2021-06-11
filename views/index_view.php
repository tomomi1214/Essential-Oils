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
        <h1>Aroma Knowledge</h1>
        <?php if($flash_message !== null): ?>
        <p><?= $flash_message ?></p>
        <?php endif; ?>
        <div class="main">
            <p><a href="user_register.php">会員登録</a></p>
            <p><a href="login.php">Login</a></p>
        </div>
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
                <li><a href="oil_detail.php?id=<?= $oil->id ?>"><?= $oil->name ?></a></li>
            </ul>
            <?php endforeach; ?>
        </div>
        <div class="effects">
            <h2>Effects</h2>
            <?php foreach($effects as $effect): ?>
            <ul>
                <li><a href="effect_detail.php?id=<?= $effect->id ?>"><?= $effect->effect ?></a></li>
            </ul>
            <?php endforeach; ?>
        </div>
    </body>
</html>