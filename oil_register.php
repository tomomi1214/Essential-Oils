<?php
    //外部ファイルの読み込み
    require_once 'filters/LoginFilter.php';
    
    //セッションからerrorを取得
    $errors = $_SESSION['errors'];
    //セッション情報の破棄
    $_SESSION['errors'] = null;
    
    //$pageを取得
    $page = $_GET['page'];
    
    //View表示
    include_once 'views/oil_register_view.php';