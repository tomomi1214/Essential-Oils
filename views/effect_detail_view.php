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
        <title>Effects Page</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </head>
    <body>
        <h1>Effects</h1>
        <div class="effects">
            <h2><?= $effect->effect ?></h2>
            <ul>
                <li><?= $effect->id ?></li>
                <li>効果：<?= $effect->effect ?></li>
                <li>エッセンシャルオイル：<?= $effect->oil()->name ?></li>
                <li>詳細：<?= $effect->content ?></li>
                <li>注意事項：<?= $effect->caution ?></li>
            </ul>
            <p1><a href="index.php">Back to Top</a></p1><br>
            <p1><a href="effects_top.php">Back to Effects Top</a></p1>
        </div>
    </body>
</html>