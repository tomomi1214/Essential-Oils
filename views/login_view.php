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
        <link rel="stylesheet" href="css/style2.css">
        <!-- Favicon -->
        <link rel="icon" href="images/favicon.ico">
        <title>Login</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="Login">
        <div class="header" style="background-image:url(images/top1.jpg)">
            <h1>Aroma Knowledge</h1>
        </div>
        <div class="LoginMain">
            <h1 class="title">Login</h1>
            <?php if(flash_message !== null): ?>
            <p><?= $flash_message ?></p>
            <?php endif; ?>
        </div>
        <div class="container">
            <div class="row mt-2">
                <form class="col-sm-12" action="login_check.php" method="POST">
                <!-- 1行 -->
                <div class="form-group row offset-md-2">
                    <label class="col-3 col-form-label">Email Address</label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                    </div>
                </div>
                <!-- 1行 -->
                <div class="form-group row offset-md-2">
                    <label class="col-3 col-form-label">Password</label>
                    <div class="col-7">     
                        <input type="text" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <!-- 1行 -->
                <div class="form-group row offset-md-5">
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary">Login</button>                        
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="nav">
            <a href="index.php">Back to TOP</a>
        </div>
        <div class="footer2" style="background-image:url(images/footer.jpg)">
            <p class="copylight2">COPYRIGHT © All rights Reserved.</p>
        </div>
        </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>