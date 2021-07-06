<?php
    //外部ファイルの読み込み
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    require_once 'filters/LoginFilter.php';
    //セッション開始
    session_start();
    
    //セッションからflash_messageを取得
    $login_user = $_SESSION['login_user'];
    //選択した効能の$id値を取得
    $id = $_GET['id'];

    //EffectDAOを使用して、指定した$idの効能情報を取得
    $effect = EffectDAO::get_effect($id);
    
    //存在しない場合
    if($effect === false){
        //セッションにエラーメッセージを格納
        $_SESSION['flash_message'] = $id . 'のIDを持つ効能は存在しません。';
        //画面遷移
        header('Location: mypage_top.php');
        exit;
        
    }
    // セッションからflash_messageを取得 
    $flash_message = $_SESSION['flash_message'];
    // セッション情報の破棄
    $_SESSION['flash_message'] = null;
    
    //OilDAOを使用して、効能情報と紐づくオイル情報一覧を取得
    $oils = OilDAO::get_all_oils_by_effect_id($id);

    //View表示
    include_once 'views/effect_detail_for_user_view.php';