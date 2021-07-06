<?php
    //外部ファイルの読み込み
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    require_once 'filters/LoginFilter.php';
    //セッション開始
    session_start();
    
    //ログインユーザを取得
    $login_user = $_SESSION['login_user'];
    //選択した効能の$id値を取得
    $id = $_GET['id'];
    
    //OilDAOを使用して、指定した$idのオイル情報を取得
    $oil = OilDAO::get_oil($id);
    
    //存在しない場合
    if($oil === false){
        //セッションにエラーメッセージを格納
        $_SESSION['flash_message'] = $id . 'のIDを持つエッセンシャルオイルは存在しません。';
        //画面遷移
        header('Location: mypage_top.php');
        exit;
    }
    // セッションからflash_messageを取得 
    $flash_message = $_SESSION['flash_message'];
    // セッション情報の破棄
    $_SESSION['flash_message'] = null;
    
    //EffectDAOを使用して、オイル情報と紐づく効能情報一覧を取得
    $effects = EffectDAO::get_relation_detail_by_oil_id($id);

    //View表示
    include_once 'views/oil_detail_for_user_view.php';