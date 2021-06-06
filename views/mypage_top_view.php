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
        <p><?= $login_user->name ?>さん、ようこそ！</p>

        <div class="essential_oils">
            <h2>Essential Oils</h2>
            <?php foreach($oils as $oil): ?>
            <ul>
                    <h3><?= strtoupper(substr($oil->english_name, 0,1)) ?></h3>
                    <li><a href="oil_detail.php?id=<?= $oil->id ?>"><?= $oil->name ?></a></li>
            </ul>
            <?php endforeach; ?>
            
            <p><a href="essential_oil_top_for_user.php">>>See More</a></p>
        </div>
        <div class="effects">
            <h2>Effects</h2>
            <?php foreach($effects as $effect): ?>
            <ul>
                <li><a href="effect_detail.php?id=<?= $effect->id ?>"><?= $effect->id ?></a></li>
                <li><?= $effect->effect ?></li>
            </ul>
            <?php endforeach; ?>
            <p><a href="effect_top_for_user.php">>>See More</a></p>
        </div>
        <p><a href="logout.php">ログアウト</a></p>
    </body>
</html>