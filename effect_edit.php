<?php
    //外部ファイルの読み込み
    require_once 'filters/LoginFilter.php';
    require_once 'DAOs/EffectDAO.php';
    //セッション開始
    session_start();
    
    //セッションからflash_messageを取得
    $login_user = $_SESSION['login_user'];
    //選択した効能の$id値を取得
    $id = $_GET['id'];
    
    //EffectDAOを使用して、指定した$idの効能情報を取得
    $effect = EffectDAO::get_effect($id);
    
    //セッションからerrorを取得
    $errors = $_SESSION['errors'];
    //セッション情報の破棄
    $_SESSION['errors'] = null;
    
    //編集ページ遷移前のpage情報を取得
    $page = $_GET['page'];

    
    //効能情報が存在する場合
    if($effect !== false){
        //編集ページに画面遷移
        include_once 'views/effect_edit_view.php';
        exit;
    }else{ //それ以外の場合
        //セッションにエラーメッセージを渡す
        $_SESSION['error'] = '存在しません';
        //画面遷移
        header('Location: mypage_top.php');
        exit;
    }
    
