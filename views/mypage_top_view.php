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
        <title>My Page</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </head>    
    <body>
        <div class="header" style="background-image:url(images/top1.jpg)">
            <h1>Aroma Knowledge</h1>
        </div>
        <div class="MypageMain">
            <h2><?= $login_user->name; ?>, Thank you for comming!</h2>
            <a href="logout.php">Logout</a>
            <?php if($flash_message !== null): ?>
            <p><?= $flash_message ?></p>
            <?php endif; ?>
        </div>
        
        <div class="essential_oils">
            <h2 class="title">Essential Oils</h2>
            <div class="form-group row">
                <div class="offset-2 col-10">                    
                    <a class="btn btn-outline-danger" href="oil_register.php?page=top" role="button">Create New Essential Oil</a>
                </div>
            </div>

            <div class="EoilContent">
                <?php $pre_letter = ''; ?>
                <?php $count = 1; ?>
                <?php foreach($oils as $oil): ?>
                    <?php $letter = strtoupper(substr($oil->english_name, 0,1)); ?>
                    <?php if($letter !== $pre_letter): ?>
                        <?php if($count !== 1): ?>
                    </div>
                            <?php $count = 1; ?>
                        <?php endif; ?>
                    <div class="oil">
                        <p1><?= $letter ?></p1>
                    <?php endif; ?>
                    
                    <?php $pre_letter = $letter; ?>
                    <?php $count++; ?>
                    <div class="oilset">
                        <a href="oil_detail_for_user.php?id=<?= $oil->id ?>"><img src="<?= 'upload/' . $oil->image ?>"  class="OilPic" alt="Oil"></a>
                        <a href="oil_detail_for_user.php?id=<?= $oil->id ?>" class="OilName"><?= $oil->name ?></a>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="form-group row OilcreateBtn">
                <div class="offset-10 col-10">
                    <a class="btn btn-outline-danger" href="oil_register.php?page=top" role="button">Create New Essential Oil</a>
                </div>
            </div>
        </div>
        
        <div class="wrapper">
            <div class="effects">
                <h2 class="title">Effects</h2>
                <div class="form-group row">
                    <div class="offset-2 col-10 mt-1">
                        <a class="btn btn-outline-danger" href="effect_register.php?page=top" role="button">Create New Effect info.</a>
                    </div>
                </div>
                <div class="EffectContent">
                    <?php foreach($effects as $effect): ?>
                        <a href="effect_detail_for_user.php?id=<?= $effect->id ?>" class="EffectBtn"><?= $effect->effect ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <div class="other">
            <h2 class="title">Other</h2>
            <!---関連登録ボタン For PC--->
            <div class="form-group row ForPC">
                <div class="offset-2 col-10 mt-4">
                    <a class="btn btn-outline-success" href="relation_register.php" role="button">Create New Relation</a>
                    <label class="col-8 col-form-label">エッセンシャルオイルに効果を登録することができます。</label>
                 </div>
            </div>
            <!---登録一覧ページへ for PC--->
            <div class="form-group row ForPC">
                <div class="offset-2 col-10 mt-4">
                    <a class="btn btn btn-outline-warning" href="register_list.php" role="button">Go to Register List</a>
                    <label class="col-8 col-form-label">登録した情報一覧が確認できます。ここから編集/削除もできます。</label>
                </div>
            </div>
            
            <!---関連登録ボタン For Mobile--->
            <div class="form-group row ForMobile">
                <div class="offset-1 col-10 mt-2">
                    <a class="btn btn-outline-success" href="relation_register.php" role="button">Create New Relation</a><br>
                    <label class="col-12 col-form-label">エッセンシャルオイルに効果を登録することができます。</label>
                 </div>
            </div>
            <!---登録一覧ページへ for Mobile--->
            <div class="form-group row ForMobile">
                <div class="offset-1 col-10 mt-2">
                    <a class="btn btn btn-outline-warning" href="register_list.php" role="button">Go to Register List</a><br>
                    <label class="col-12 col-form-label">登録した情報一覧が確認できます。ここから編集/削除もできます。</label>
                </div>
            </div>
        </div>
        
        <div class="footer" style="background-image:url(images/footer.jpg)">
            <h1 class="logo">Aroma Knowledge</h1>
            <p class="copylight">COPYRIGHT © All rights Reserved.</p>
        </div>

    </body>
</html>