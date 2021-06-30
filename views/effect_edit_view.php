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
        <title>Effect Edit</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="header" style="background-image:url(images/top1.jpg)">
            <h1><a href="mypage_top.php">Aroma Knowledge</h1></a>
        </div>
        <div class="effects">
            <h2 class="title">Effect</h1>
            <h2 class="subtitle"><?= $effect->effect ?> 編集</h2>
            <?php if($errors !== null): ?>
            <ul>
                <?php foreach($errors as $error): ?>
                <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <div class="EffectDetail">
                <form class="col-sm-12" action="effect_update.php" method="POST">
                    <!--1行--->
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">効能</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="effect" value="<?= $effect->effect ?>">
                        </div>
                    </div>
                    <!--1行--->
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">詳細</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="content" value="<?= $effect->content ?>">
                        </div>
                    </div>
                    <!--1行--->
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">注意事項</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="caution" value="<?= $effect->caution ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <input type="hidden" name="id" value="<?= $id ?>">
                    </div>
                    
                    <div class="form-group row">
                        <div class="offset-sm-5 col-sm-1">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
                
        <div class="nav">
        <a href="mypage_top.php">Back to TOP</a><br>
        <a href="register_list.php">Go to Register List</a>
        </div>
        <div class="footer" style="background-image:url(images/footer.jpg)">
            <h1 class="logo">Aroma Knowledge</h1>
            <p class="copylight">COPYRIGHT © All rights Reserved.</p>
        </div>
    </body>
</html>