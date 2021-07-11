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
        <title>Create New Relation</title>
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
        <div class="relations">
            <h2 class="title">Relation</h2>
            <h2 class="subtitle">Create New Relation</h2>
            <?php if($errors !== null): ?>
            <ul>
                <?php foreach($errors as $error): ?>
                <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <!---For PC--->
            <div class="RelationDetail ForPC">
                <div class="container">
                    <form action="relation_create.php" method="POST">
                        <div class="row">
                            <label for="colFormLabel" class="col-form-label m-1">エッセンシャルオイル:</label>
                        </div>
                        <?php foreach($oils as $oil): ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="oil" value="<?= $oil->id?>">
                            <label class="form-check-label" for="oil"><?= $oil->name ?></label>
                        </div>
                        <?php endforeach; ?>
                        
                        <div class="row">
                            <label for="colFormLabel" class="col-form-label m-1">効能:</label>
                        </div>
                        <?php foreach($effects as $effect): ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="effect" value="<?= $effect->id?>">
                            <label class="form-check-label" for="effect"><?= $effect->effect ?></label>
                        </div>
                        <?php endforeach; ?>
                        <br>
                        <!--1行--->
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-2 col-form-label">使用方法</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="howto">
                            </div>
                        </div>
                        <!--1行--->
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-2 col-form-label">注意事項</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="caution">
                            </div>
                        </div>
                        
                        <div class="row">
                            <input type="hidden" name="page" value="<?= $page ?>">
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-5 col-sm-1">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            
            <!---For Mobile--->
            <div class="RelationDetail ForMobile">
                <div class="container">
                    <form action="relation_create.php" method="POST">
                        <div class="row">
                            <label for="colFormLabel" class="col-form-label m-1">エッセンシャルオイル:</label>
                        </div>
                        <?php foreach($oils as $oil): ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="oil" value="<?= $oil->id?>">
                            <label class="form-check-label" for="oil"><?= $oil->name ?></label>
                        </div>
                        <?php endforeach; ?>
                        
                        <div class="row">
                            <label for="colFormLabel" class="col-form-label m-1">効能:</label>
                        </div>
                        <?php foreach($effects as $effect): ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="effect" value="<?= $effect->id?>">
                            <label class="form-check-label" for="effect"><?= $effect->effect ?></label>
                        </div>
                        <?php endforeach; ?>
                        <br>
                        
                        <!--1行--->
                        <div class="form-group row mt-2">
                            <label for="colFormLabel" class="col-3 col-form-label">使用方法</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="howto">
                            </div>
                        </div>
                        <!--1行--->
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-3 col-form-label">注意事項</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="caution">
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="page" value="<?= $page ?>">
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-5 col-sm-1">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
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