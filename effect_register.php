<?php
    require_once 'filters/LoginFilter.php';
    
    //セッションに保存したエラー配列を取得
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    //Page設定
    $page = $_GET['page'];
    //var_dump($page);
    
    include_once 'views/effect_register_view.php';