<?php
    //セッション開始
    session_start();

    //セッションからflash_messageを取得 
    $flash_message = $_SESSION['flash_message'];
    //セッション情報の破棄
    $_SESSION['flash_message'] = null;
    
    //View表示
    include_once 'views/login_view.php';
    