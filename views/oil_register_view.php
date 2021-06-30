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
        <title>Create new Essential Oil</title>
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
            <h2 class="subtitle">Create New Essential Oil</h2>
            <?php if($errors !== null): ?>
            <ul>
                <?php foreach($errors as $error): ?>
                <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <!---ForPC--->
            <div class="OilDetail ForPC">
                <form class="col-sm-12" action="oil_create.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">名前</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">学名</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="scientific_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">科名</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="plant_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">抽出方法</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="extraction">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">香り</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="aroma">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">注意事項</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="caution">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">英名</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="english_name" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">画像</label>
                        <div class="col-3">
                            <input type="file" name="image" accept='image/*' onchange="previewImage(this);">
                        </div>
                        <div class="col-7">
                            <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width: 400px">
                        </div>
                    </div>
                    <div class="row">
                        <input type="hidden" name="page" value="<?= $page ?>">
                    </div>
                    <div class="row">
                        <input type="hidden" name="id" value="<?= $id ?>">
                    </div>
                    
                    <div class="form-group row">
                        <div class="offset-sm-5 col-sm-2">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>   
            </div>
            
            <!---ForMobile--->
            <div class="ForMobile">
                <form class="col-sm-12" action="oil_create.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-2 col-form-label">名前</label>
                        <div class="col-10">
                          <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-2 col-form-label">学名</label>
                        <div class="col-10">
                          <input type="text" class="form-control" name="scientific_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-2 col-form-label">科名</label>
                        <div class="col-10">
                          <input type="text" class="form-control" name="plant_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-3 col-form-label">抽出方法</label>
                        <div class="col-9">
                          <input type="text" class="form-control" name="extraction">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-2 col-form-label">香り</label>
                        <div class="col-10">
                          <input type="text" class="form-control" name="aroma">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-3 col-form-label">注意事項</label>
                        <div class="col-9">
                          <input type="text" class="form-control" name="caution">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-2 col-form-label">英名</label>
                        <div class="col-10">
                          <input type="text" class="form-control" name="english_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">画像</label>
                        <div class="col-3">
                            <input type="file" name="image" accept='image/*' onchange="previewImage(this);">
                        </div>
                        <div class="col-7">
                            <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:20px;">
                        </div>
                    </div>
                    <div class="row">
                        <input type="hidden" name="page" value="<?= $page ?>">
                    </div>
                    <div class="row">
                        <input type="hidden" name="id" value="<?= $id ?>">
                    </div>
                    
                    <div class="form-group row">
                        <div class="offset-sm-5 col-sm-2">
                            <button type="submit" class="btn btn-success">Create</button>
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
         <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </body>
</html>