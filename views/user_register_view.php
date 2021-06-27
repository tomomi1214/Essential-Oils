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
        <title>Create Account</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="CreateAccount">
            <div class="header" style="background-image:url(images/top1.jpg)">
                <h1>Aroma Knowledge</h1>
            </div>
            <div class="CreateMain">
                <h1 class="title">Create Account</h1>
                <!---エラーメッセージ--->
                <?php if($errors !== null): ?>
                <ul>
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
                <?php endif; ?>
                </ul>
            
                <!---div class="users">
                    <form action="user_create.php" method="POST">
                        名前:<input type="text" name="name"><br>
                        メールアドレス:<input type="email" name="email"><br>
                        パスワード:<input type="password" name="password"><br>
                        <button type="submit">登録</button>
                    </form>
                </div--->
                <div class="row mt-3">
                    <form class="col-sm-10" action="user_create.php" method="POST">
                        <!-- 1行 -->
                    <div class="form-group row offset-md-4">
                        <label class="col-4 col-form-label">Name</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <!-- 1行 -->
                    <div class="form-group row offset-md-4">
                        <label class="col-4 col-form-label">Email Address</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <!-- 1行 -->
                    <div class="form-group row offset-md-4">
                        <label class="col-4 col-form-label">Password</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <!-- 1行 -->
                    <div class="form-group row">
                        <div class="offset-7 col-10">
                            <button type="submit" class="btn btn-primary">CREATE</button>                        
                        </div>
                    </div>
                    </form>
                </div>
                <div class="nav">
                    <a href="index.php">Back to TOP</a>
                </div>
            </div>
            <div class="footer2" style="background-image:url(images/footer.jpg)">
                <p class="copylight2">COPYRIGHT © All rights Reserved.</p>
            </div>
        </div>
    </body>
</html>