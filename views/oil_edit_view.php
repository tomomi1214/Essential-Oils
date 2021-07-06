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
        <title>Essential Oil Edit</title>
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
        <div class="essential_oils">
            <h2 class="title">Essential Oil</h2>
            <h2 class="subtitle"><?= $oil->name ?> 編集</h2>
            <?php if($errors !== null): ?>
            <ul>
                <?php foreach($errors as $error): ?>
                <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            
            <!---For PC--->
            <div class="OilDetail ForPC">
                <form class="col-sm-12" action="oil_update.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">名前</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="<?= $oil->name ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">学名</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="scientific_name" value="<?= $oil->scientific_name ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">科名</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="plant_name" value="<?= $oil->plant_name ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">抽出方法</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="extraction" value="<?= $oil->extraction ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">香り</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="aroma" value="<?= $oil->aroma ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">注意事項</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="caution" value="<?= $oil->caution ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">英名</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="english_name" value="<?= $oil->english_name ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">現在の画像</label>
                        <div class="col-10">
                            <img src="<?= 'upload/' . $oil->image ?>" alt="表示する画像がありません。" style="max-width:300px">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">画像アップロード</label>
                        <div class="col-3">
                            <input type="file" name="image" accept='images/*' onchange="previewImage(this);">
                        </div>
                        <div class="col-3">
                            <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:300px;">
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
            
            <!--- For Mobile--->  
             <div class="OilDetail ForMobile">
                <form class="col-sm-12" action="oil_update.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">名前</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="<?= $oil->name ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">学名</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="scientific_name" value="<?= $oil->scientific_name ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">科名</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="plant_name" value="<?= $oil->plant_name ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">抽出方法</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="extraction" value="<?= $oil->extraction ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">香り</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="aroma" value="<?= $oil->aroma ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">注意事項</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="caution" value="<?= $oil->caution ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">英名</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="english_name" value="<?= $oil->english_name ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-4 col-form-label">現在の画像</label>
                        <div class="col-10">
                            <img src="<?= 'upload/' . $oil->image ?>" alt="表示する画像がありません。" style="max-width:200px">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-5 col-form-label">画像アップロード</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" accept='images/*' onchange="previewImage(this);">
                        </div>
                        <div class="col-3">
                            <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
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
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>