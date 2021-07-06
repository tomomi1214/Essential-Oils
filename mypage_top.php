<?php
    //外部ファイルの読み込み
    require_once 'filters/LoginFilter.php';
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    //セッション開始
    session_start();
    
    //セッションからlogin_userを取得
    $login_user = $_SESSION['login_user'];
    
    //セッションからflash_messageを取得 
    $flash_message = $_SESSION['flash_message'];
    //セッション情報の破棄
    $_SESSION['flash_message'] = null;
    
    //OilDAOを使用してオイル一覧を取得
    $oils = OilDAO::get_all_oils_sort();
    //EffectDAOを使用して効能一覧を取得
    $effects = EffectDAO::get_all_effects();

    //View表示
    include_once 'views/mypage_top_view.php';
    