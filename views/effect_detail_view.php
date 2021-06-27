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
        <title>Effect Detail Page</title>
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
        <div class="effects">
            <h2 class="title">Effect</h1>
            <h2 class="subtitle"><?= $effect->effect ?></h2>
            <div class="EffectDetail">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width: 5%">効能</th>
                            <td style="width: 20%"><?= $effect->effect ?></td>
                        </tr>
                        <tr>
                            <th>詳細</th>
                            <td><?= $effect->content ?></td>
                        </tr>
                        <tr>
                            <th>注意事項</th>
                            <td><?= $effect->caution ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="essential_oils">
            <h2 class="title">Essential Oil</h1>
            <div class="EffectContent">
                <?php foreach($oils as $oil): ?>
                    <a href="oil_detail.php?id=<?= $oil->id ?>" class="OilBtn"><?= $oil->name ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="nav">
            <a href="index.php">Back to TOP</a><br>
        </div>
        <div class="footer" style="background-image:url(images/footer.jpg)">
            <h1 class="logo">Aroma Knowledge</h1>
            <p class="copylight">COPYRIGHT © All rights Reserved.</p>
        </div>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </body>
</html>