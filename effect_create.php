<?php
    //外部ファイルの読み込み
    require_once 'DAOs/EffectDAO.php';
    require_once 'DAOs/UserDAO.php';
    require_once 'models/Effect.php';
    require_once 'filters/LoginFilter.php';
    //セッション開始
    session_start();
    
    //入力された情報をそれぞれ取得
    $effect = $_POST['effect'];
    $content = $_POST['content'];
    $caution = $_POST['caution'];
    
    //遷移前のページを取得
    $page = $_POST['page'];
    
    //セッションからlogin_userを取得
    $login_user = $_SESSION['login_user'];
    
    //入力された情報からEffectインスタンスを作成
    $effect = new Effect($effect, $content, $caution, $login_user->id);
    
    //入力項目エラーがないかバリデーションチェック
    $errors = $effect->validate($effect);
    //エラーがない場合
    if(count($errors) === 0){
        //EffectDAOを使用して新規効能を登録し、メッセージを$flash_messageに格納
        $flash_message = EffectDAO::insert($effect);
        //セッション情報に$flash_messageを渡す
        $_SESSION['flash_message'] = $flash_message;
        
        //登録リンクに遷移する前のpageがtopの場合
        if($page === 'top'){
            //画面遷移
            header('Location: mypage_top.php');
            exit;
        }else{ //それ以外の場合
            //画面遷移
            header('Location: register_list.php');
            exit;
        }
    }else{ //エラーが存在する場合
        //エラーメッセージをセッションに渡す
        $_SESSION['errors'] = $errors;
        
        //画面遷移
        header('Location: effect_register.php');
        exit;
    }
    