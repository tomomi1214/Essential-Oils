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
        <script src="js/script.js"></script>
    </head>
    <body>
        <h1>Essential Oils</h1>
        <div class="essential_oils">
            <h2><?= $oil->name ?>詳細</h2>
            <ul>
                <li><?= $oil->image ?></li>
                <li><?= $oil->id ?></li>
                <li>名前：<?= $oil->name ?></li>
                <li>学名：<?= $oil->scientific_name ?></li>
                <li>科名：<?= $oil->plant_name ?></li>
                <li>抽出方法：<?= $oil->extraction ?></li>
                <li>香り：<?= $oil->aroma ?></li>
                <li>効果：<?= $oil->effect ?></li>
                <li>注意事項：<?= $oil->caution ?></li>
            </ul>
            <p1><a href="index.php">Back to Top</a></p1>
        </div>
    </body>
</html>