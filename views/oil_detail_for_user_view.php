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
        <title>Essential Oil Page</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
        <style>
            form.col-sm-5 {
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div class="header" style="background-image:url(images/top1.jpg)">
            <h1><a href="mypage_top.php">Aroma Knowledge</a></h1>
        </div>
        <div class="essential_oils">
            <h2 class="title">Essential Oil</h2>
            <h2 class="subtitle"><?= $oil->name ?></h2>
            <?php if($flash_message !== null): ?>
            <p><?= $flash_message ?></p>
            <?php endif; ?>
            
            <div class="OilDetail">
                <img src="<?= 'upload/' . $oil->image ?>">
            
            <table class="table table-size">
                    <tbody>
                        <tr>
                            <th style="width: 5%">名前</th>
                            <td style="width: 20%"><?= $oil->name ?></td>
                        </tr>
                        <tr>
                            <th>学名</th>
                            <td><?= $oil->scientific_name ?></td>
                        </tr>
                        <tr>
                            <th>科名</th>
                            <td><?= $oil->plant_name ?></td>
                        </tr>
                        <tr>
                            <th>抽出方法</th>
                            <td><?= $oil->extraction ?></td>
                        </tr>
                        <tr>
                            <th>香り</th>
                            <td><?= $oil->aroma ?></td>
                        </tr>
                        <tr>
                            <th>注意事項</th>
                            <td><?= $oil->caution ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <?php if($login_user->id === $oil->user_id): ?>
            <!-- For PC -->
            <div class="container">
                <div class="row ForPC">
                    <a href="oil_edit.php?id=<?= $id ?>" class="offset-sm-3 btn btn-outline-info col-sm-3">Edit</a>
                    <form class="col-sm-5 row" action="oil_delete.php" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="hidden" name="top" value="top"> 
                        <button type="submit" class="btn btn-outline-dark offset-sm-1 col-sm-8" onclick="return confirm('エッセンシャルオイル情報を削除します。よろしいですか？')">Delete</button>
                    </form>
                </div>
                
                <!-- For Mobile -->
                <div class="row ForMobile">
                    <a href="oil_edit.php?id=<?= $id ?>" class="col-sm-12 btn btn-outline-info">Edit</a>
                </div>  
                    <form class="row mt-2 ForMobile" action="oil_delete.php" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="hidden" name="top" value="top"> 
                        <button type="submit" class="btn btn-outline-dark col-sm-12" onclick="return confirm('エッセンシャルオイル情報を削除します。よろしいですか？')">Delete</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="effects">
            <h2 class="title">Effects</h2>
            <div class="EffectContent">
                <?php foreach($effects as $effect): ?>
                <div class="effectset">
                    <a href="effect_detail_for_user.php?id=<?= $effect->effect_id ?>" class="EffectBtn-2"><?= $effect->effect ?></a></br>
                    <span><?= $effect->howto ?></span>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="form-group row">
                <div class="col-8 mt-5">
                    <a class="btn btn-outline-danger col-sm-3" href="relation_register.php" role="button">Create New Relation</a>
                </div>
            </div>
        </div>
        
        <div class="nav">
            <a href="mypage_top.php">Back to TOP</a><br>
            <a href="register_list.php">See Registered items</a>
        </div>
        <div class="footer" style="background-image:url(images/footer.jpg)">
            <h1 class="logo">Aroma Knowledge</h1>
            <p class="copylight">COPYRIGHT © All rights Reserved.</p>
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