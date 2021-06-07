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
        <title>Effect登録</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </head>
    <body>
        <h2>効果登録</h2>
        <div class="effects">
            <form action="effect_create.php" method="POST" enctype="multipart/form-data">
                効果：<input type="text" name="effect"><br>
                詳細：<input type="text" name="content"><br>
                注意事項：<input type="text" name="caution"><br>
                <button type="submit">登録</button>
            </form>
            <br><br>
            <p1><a href="mypage_top.php">トップページへ</a></p1>
            
        </div>
    </body>
</html>