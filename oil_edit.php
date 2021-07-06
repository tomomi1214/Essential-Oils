<?php
    //外部ファイルの読み込み
    require_once 'DAOs/OilDAO.php';
    require_once 'filters/LoginFilter.php';
    //セッション開始
    session_start();
    
    //セッションからlogin_userを取得
    $login_user = $_SESSION['login_user'];
    //選択した効能の$id値を取得
    $id = $_GET['id'];
    
    //OilDAOを使用して、指定した$idのオイル情報を取得
    $oil = OilDAO::get_oil($id);
    
    //セッションに保存したエラー配列を取得
    $errors = $_SESSION['errors'];
    //セッション情報の破棄
    $_SESSION['errors'] = null;
    
    
    //オイル情報が存在する場合
    if($oil !== false){
        //編集ページに画面遷移
        include_once 'views/oil_edit_view.php';
        exit;
    }else{ //それ以外の場合
        //セッションにエラーメッセージを渡す
        $_SESSION['error'] = '存在しません';
        //画面遷移
        header('Location: mypage_top.php');
        exit;
    }
    