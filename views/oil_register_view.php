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
        <h2>新規エッセンシャルオイル登録</h2>
        <div class="essential_oils">
            <form action="oil_create.php" method="POST" enctype="multipart/form-data">
                名前：<input type="text" name="name"><br>
                学名：<input type="text" name="scientific_name"><br>
                科名：<input type="text" name="plant_name"><br>
                抽出方法：<input type="text" name="extraction"><br>
                香り：<input type="text" name="aroma"><br>
                注意事項：<input type="text" name="caution"><br>
                英名：<input type="text" name="english_name"><br>
                画像：<input type="file" name="image"><br>
                <button type="submit">登録</button>
            </form>
            <br><br>
            <p1><a href="index.php">Essential Oils Topへ</a></p1><br>
            <p1><a href="index.php">トップページへ戻る</a></p1>
        </div>
    </body>
</html>