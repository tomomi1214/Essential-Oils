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
    </head>
    <body>
        <div class="header" style="background-image:url(images/top1.jpg)">
            <h1><a href="index.php">Aroma Knowledge</a></h1>
        </div>
        <div class="essential_oils">
            <h2 class="title">Essential Oil</h2>
            <h2 class="subtitle"><?= $oil->name ?></h2>
            
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
        </div>
        
        <div class="effects">
            <h2 class="title">Effects</h2>
            <div class="EffectContent">
                <?php foreach($effects as $effect): ?>
                <div class="effectset">
                    <a href="effect_detail.php?id=<?= $effect->effect_id ?>" class="EffectBtn-2"><?= $effect->effect ?></a></br>
                    <span><?= $effect->howto ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>


        
        <div class="nav">
            <a href="index.php">Back to TOP</a>
        </div>
        <div class="footer" style="background-image:url(images/footer.jpg)">
            <h1 class="logo">Aroma Knowledge</h1>
            <p class="copylight">COPYRIGHT © All rights Reserved.</p>
        </div>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </body>
</html>