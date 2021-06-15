<?php
    require_once 'DAOs/UserDAO.php';
    require_once 'DAOs/OilDAO.php';
    require_once 'models/Oil.php';
    session_start();
    
    //var_dump($_POST);
    //編集するOilIDを取得する
    $id = $_POST['id'];
    //var_dump($id);
    
    //Oilの前の情報を取得
    $oil = OilDAO::get_oil_by_id($id);
    //var_dump($oil);
    
    //オイルデータが存在すれば
    if($oil !== false){
        //入力した編集するデータの取得
        $name = $_POST['name'];
        $scientific_name = $_POST['scientific_name'];
        $plant_name = $_POST['plant_name'];
        $extraction = $_POST['extraction'];
        $aroma = $_POST['aroma'];
        $caution = $_POST['caution'];
        $english_name = $_POST['english_name'];
        
        //$login_user = $_SESSION['login_user'];
    
        //画像が選択されていれば
        if($_FILES['image']['size'] !== 0){
            // 画像ファイルの物理的アップロード処理
            $image = $_FILES['image']['name'];
            $file = 'images/' . $image;

            //var_dump($image);
        }else{
            $file = $oil->image;
            //var_dump($image);
        }
        
        //インスタンス情報の更新
        $oil->name = $name;
        $oil->scientific_name = $scientific_name;
        $oil->plant_name = $plant_name;
        $oil->extraction = $extraction;
        $oil->aroma = $aroma;
        $oil->caution = $caution;
        $oil->english_name = $english_name;
        $oil->image = $file;
    
        //var_dump($oil);

        move_uploaded_file($_FILES['image']['tmp_name'], $file);

        
        //入力チェック
        $errors = $oil->validate($oil);
        //var_dump($errors);
        
        if(count($errors) === 0){
            $flash_message = OilDAO::update($oil, $id);
            
            $_SESSION['flash_message'] = $flash_message;
        
            header('Location: oil_detail_for_user.php?id=' . $id);
            exit;
        }else{
            $_SESSION['errors'] = $errors;
            
            header('Location: oil_edit.php?id=' . $id);
            exit;
        }
    }else{
        $_SESSION['error'] = '存在しないページです。';
        header('Location: mypage_top.php');
        exit;
    }
    
