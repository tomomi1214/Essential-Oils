<?php
    //外部ファイルの読み込み
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    //セッション開始
    session_start();
    
    //OilDAOを使用して、オイル一覧を取得
    $oils = OilDAO::get_all_oils_sort();
    //EffectDAOを使用して、効能一覧を取得
    $effects = EffectDAO::get_all_effects();
    
    //セッションからflash_messageを取得 
    $flash_message = $_SESSION['flash_message'];
    //セッション情報の破棄
    $_SESSION['flash_message'] = null;
    
    //View表示
    include_once 'views/index_view.php';