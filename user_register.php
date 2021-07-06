<?php
    //C
    session_start();
    //セッションからerrorを取得
    $errors = $_SESSION['errors'];
    //セッション情報の破棄
    $_SESSION['errors'] = null;
    
    include_once 'views/user_register_view.php';
    