<?php
    //外部ファイルの読み込み
    require_once 'DAOs/UserDAO.php';
    require_once 'DAOs/OilDAO.php';
    require_once 'models/Oil.php';
    //セッション開始
    session_start();
    
    //選択した$id値を取得
    $id = $_POST['id'];

    //編集するオイル情報を取得
    $oil = OilDAO::get_oil($id);
    
    //オイルデータが存在する場合
    if($oil !== false){
        //入力情報取得
        $name = $_POST['name'];
        $scientific_name = $_POST['scientific_name'];
        $plant_name = $_POST['plant_name'];
        $extraction = $_POST['extraction'];
        $aroma = $_POST['aroma'];
        $caution = $_POST['caution'];
        $english_name = $_POST['english_name'];
        
        //画像が選択されてる場合
        if($_FILES['image']['size'] !== 0){
            // 画像ファイルの物理的アップロード処理
            $image = OilDAO::upload();
            //var_dump($image);
        }else{
            $image = $oil->image;
        }
        
        //インスタンス情報の更新
        $oil->name = $name;
        $oil->scientific_name = $scientific_name;
        $oil->plant_name = $plant_name;
        $oil->extraction = $extraction;
        $oil->aroma = $aroma;
        $oil->caution = $caution;
        $oil->english_name = $english_name;
        $oil->image = $image;
    
        
        //入力値をバリデーションチェック
        $errors = $oil->validate($oil);
        
        //エラーがない場合
        if(count($errors) === 0){
            //OilDAOを使用してオイル情報を更新し、メッセージをを取得
            $flash_message = OilDAO::update($oil, $id);
            //セッション情報に$flash_messageを渡す
            $_SESSION['flash_message'] = $flash_message;
            //画面遷移
            header('Location: oil_detail_for_user.php?id=' . $id);
            exit;
        }else{
            $_SESSION['errors'] = $errors;
            
            header('Location: oil_edit.php?id=' . $id);
            exit;
        }
    }
    
    
    
