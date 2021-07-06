<?php
    //外部ファイルの読み込み
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    require_once 'filters/LoginFilter.php';
    //セッション開始
    session_start();
    
    //OilDAOを使用して、オイル一覧を取得
    $oils = OilDAO::get_all_oils_sort();
    
    //EffectDAOを使用して、効能一覧を取得
    $effects = EffectDAO::get_all_effects();
    
    //セッションからerrorを取得
    $errors = $_SESSION['errors'];
    //セッション情報の破棄
    $_SESSION['errors'] = null;
    
    //遷移前のページを取得
    $page = $_GET['page'];
    
    //View表示
    include_once 'views/relation_register_view.php';