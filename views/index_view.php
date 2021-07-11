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
        <title>Aroma Knowledge</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="header" style="background-image:url(images/top1.jpg)">
            <h1><a href="index.php">Aroma Knowledge</h1></a>
        </div>
        <div class="container">
            <!-- For PC -->
            <div class="ForPC mt-4">
                <div class="text-right ml-1">
                    <a class="btn btn-sm btn-outline-success col-sm-1" href="user_register.php" role="button">会員登録</a>
                    <a class="btn btn-sm btn-outline-primary col-sm-1" href="login.php" role="button">Login</a>
                </div>
            </div>
            <!-- For Mobile -->
            <div class="ForMobile mt-4">
                <div class="text-right">
                    <a class="btn btn-sm btn-outline-success px-1" href="user_register.php" role="button">会員登録</a>
                    <a class="btn btn-sm btn-outline-primary px-1" href="login.php" role="button">Login</a>
                </div>
            </div>
        </div>
            
        <div class="FlashMessage">
            <?php if($flash_message !== null): ?>
            <p><?= $flash_message ?></p>
            <?php endif; ?>
        </div>
        
        <div class="toptext">
            <p>アロマには香り以外の可能性も。</p>
            <p>ふと身体の不調を感じたと時にそっと寄り添ってくれるアロマオイルがあれば</p>
            <p>より健やかな日々になるはずです。</p>
        </div>
        
        <div class="essential_oils">
            <h2 class="title">Essential Oils</h2>
            <!---オイル検索--->
            <form class="SearchOil" action="search_oils.php">
                <input type="search" name="keyword" placeholder="オイル名">
                <button type="submit">検索</button>
                <?php if($flash_message_ForOil !== null): ?>
                <br>
                <p2><?= $flash_message_ForOil ?></p2>
                <?php endif; ?>
            </form>
            <div class="EoilContent2">
                <?php $pre_letter = ''; ?>
                <?php $count = 1; ?>
                <?php foreach($oils as $oil): ?>
                    <?php $letter = strtoupper(substr($oil->english_name, 0,1)); ?>
                    <?php if($letter !== $pre_letter): ?>
                        <?php if($count !== 1): ?>
                        </div>
                    </div>
                            <?php $count = 1; ?>
                        <?php endif; ?>
                    <div class="oil">
                        <p1><?= $letter ?></p1>
                        <div class="oil_elements">
                    <?php endif; ?>
                    
                    <?php $pre_letter = $letter; ?>
                    <?php $count++; ?>
                    <div class="oilset">
                        <a href="oil_detail.php?id=<?= $oil->id ?>"><img src="<?= 'upload/' . $oil->image?>"  class="OilPic" alt="Oil"></a>
                        <a href="oil_detail.php?id=<?= $oil->id ?>" class="OilName"><?= $oil->name ?></a>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        </div>
        
        <div class="wrapper">
            <div class="effects">
                <h2 class="title">Effects</h2>
                <div class="EffectContent">
                    <?php foreach($effects as $effect): ?>
                        <a href="effect_detail.php?id=<?= $effect->id ?>" class="EffectBtn"><?= $effect->effect ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
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