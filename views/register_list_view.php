<!DOCTYPE html>
<html lag="ja">
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
        <title>Registered items</title>
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
        
        <div class="MypageMain">
            <h2><?= $login_user->name; ?>'s Registered items</h2>
            <?php if($flash_message !== null): ?>
            <p><?= $flash_message ?></p>
            <?php endif; ?>
        </div>
        
        <div class="container">
            <!-- For PC -->
            <div class="ForPC mt-4">
                <div class="text-right">
                    <a class="btn btn-sm btn-outline-secondary col-sm-1" href="logout.php" role="button">Logout</a>
                </div>
            </div>
            <!- For Mobile -->
            <div class="ForMobile">
                <div class="text-right">
                    <a class="btn btn-sm btn-outline-secondary col-sm-1 w-auto" href="logout.php" role="button">Logout</a>
                </div>
            </div>
        </div>
        
        <div class="essential_oils">
            <h2 class="title">Essential Oils</h2>
            <div class="container">
                <div class="form-group row">
                    <div class="offset-2 col-10">                    
                        <a class="btn btn-outline-danger" href="oil_register.php" role="button">Add New Essential Oil</a>
                    </div>
                </div>
            </div>
            
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
                        <a href="oil_detail_for_user.php?id=<?= $oil->id ?>"><img src="<?= 'upload/' . $oil->image ?>"  class="OilPic" alt="Oil"></a>
                        <a href="oil_detail_for_user.php?id=<?= $oil->id ?>" class="OilName"><?= $oil->name ?></a>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        </div>
        <div class="wrapper">
            <div class="effects">
                <h2 class="title">Effects</h2>
                <div class="container">
                    <div class="form-group row">
                        <div class="offset-2 col-10 mt-4">
                            <a class="btn btn-outline-danger" href="effect_register.php" role="button">Create New Effect info</a>
                        </div>
                    </div>
                </div>
                <div class="EffectContent">
                    <?php foreach($effects as $effect): ?>
                    <a href="effect_detail_for_user.php?id=<?= $effect->id ?>" class="EffectBtn"><?= $effect->effect ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <div class="relations">
            <h2 class="title">Relations</h1>
            <div class="container">
                <div class="form-group row">
                    <div class="offset-2 col-10 mt-4">
                        <a class="btn btn-outline-danger" href="relation_register.php" role="button">Create New Relation</a>
                    </div>
                </div>
            </div>
            
            <?php if($relations !== null): ?>
            <div class="RelationContent">
                <!--For PC--->
                <form action="relation_delete.php" method="POST" class="RelationTable ForPC">
                    <table class="table table-borderless table-hover offset-md-3" style="width: 60%">
                        <thead>
                            <tr>
                                <th style="width: 15%"></th>
                                <th style="width: 25%">Essential oil</th>
                                <th style="width: 25%">Effect</th>
                            </tr>
                        </thead>
                        <?php foreach($relations as $relation): ?>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <input type="checkbox" name="id[]" value="<?= $relation->id ?>">
                                </th>
                                <td><?= $relation->essential_oil_name ?></td>
                                <td><?= $relation->effect ?></td>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                    <div class="container">
                        <div class="row offset-md-5">
                            <button type="submit" class="btn btn-outline-dark col-3" onclick="return confirm('関連情報を削除します。よろしいですか？')">Delete</button>
                        </div>
                    </div>
                </form>
            </div> 
            <div class="RelationContent">
                <!--ForMobile--->
                <form action="relation_delete.php" method="POST" class="RelationTable ForMobile">
                    <table class="table table-borderless table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width: 15%"></th>
                                <th style="width: 25%">Essential oil</th>
                                <th style="width: 25%">Effect</th>
                            </tr>
                        </thead>
                        <?php foreach($relations as $relation): ?>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <input type="checkbox" name="id[]" value="<?= $relation->id ?>">
                                </th>
                                <td><?= $relation->essential_oil_name ?></td>
                                <td><?= $relation->effect ?></td>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                    <div class="container">
                        <div class="form-group row">
                            <div class="offset-4 col-10 mt-4">
                                <button type="submit" class="btn btn-outline-dark" onclick="return confirm('関連情報を削除します。よろしいですか？')">Delete</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php endif; ?>
        </div>
        
        <div class="nav">
            <a href="mypage_top.php">Back to TOP</a><br>
        </div>
        
        <div class="footer" style="background-image:url(images/footer.jpg)">
            <h1 class="logo">Aroma Knowledge</h1>
            <p class="copylight">COPYRIGHT © All rights Reserved.</p>
        </div>
        
    </body>
</html>