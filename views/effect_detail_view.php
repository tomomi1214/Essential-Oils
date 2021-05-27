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
            <h2><?= $effect->name ?></h2>
            <ul>
                <li><?= $effect->id ?></li>
                <li>効果：<?= $effect->name ?></li>
                <li>エッセンシャルオイル：<?= $effect->essential_oils ?></li>
                <li>使い方：<?= $effect->how_to_use ?></li>
                <li>注意事項：<?= $effect->caution ?></li>
            </ul>
            <p1><a href="index.php">Back to Top</a></p1>
        </div>
    </body>
</html>