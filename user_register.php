<?php
    //C
    session_start();
    //セッションに保存したエラー配列を取得
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    include_once 'views/user_register_view.php';
    