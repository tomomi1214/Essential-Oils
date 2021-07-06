<?php
    //外部ファイルの読み込み
    require_once 'DAOs/UserDAO.php';
    require_once 'DAOs/OilDAO.php';
    require_once 'models/Oil.php';
    //セッション開始
    session_start();
    

    //入力された情報をそれぞれ取得
    $name = $_POST['name'];
    $scientific_name = $_POST['scientific_name'];
    $plant_name = $_POST['plant_name'];
    $extraction = $_POST['extraction'];
    $aroma = $_POST['aroma'];
    $caution = $_POST['caution'];
    $english_name = $_POST['english_name'];
    
    //セッションからlogin_userを取得
    $login_user = $_SESSION['login_user'];
    
    //画像が選択されている場合
    if($_FILES['image']['size'] !==0){
        //画像ファイルの物理アップロード処理
        $image = OilDAO::upload();
    }else{
        $image = "";
    }
    
    //遷移前のページを取得
    $page = $_POST['page'];
    //入力された情報から、Oilインスタンスを作成
    $oil = new Oil($name, $scientific_name, $plant_name, $extraction, $aroma, $caution, $english_name, $login_user->id, $image);
    
    //入力項目にエラーがないかバリデーションチェック
    $errors = $oil->validate($oil);
    //エラーがない場合
    if(count($errors) === 0){
        //OilDAOを使用して新規オイルを登録し、メッセージを$flash_messageに格納
        $flash_message = OilDAO::insert($oil);
        //セッション情報に$flash_messageを渡す
        $_SESSION['flash_message'] = $flash_message;
        
       //登録リンクに遷移する前のpageがtopであれば
        if($page === 'top'){
            //画面遷移
            header('Location: mypage_top.php');
            exit;
        }else {
            //画面遷移
            header('Location: register_list.php');
            exit;
        }
        
    }else{ //エラーが存在する場合
        //エラーメッセージをセッションに渡す
        $_SESSION['errors'] = $errors;
        //画面遷移
        header('Location: oil_register.php');
        exit;
    }
