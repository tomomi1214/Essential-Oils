<?php
    //セッション開始
    session_start();
    
    //セッション情報の破棄
    $_SESSION['login_user'] = null;
    
    //セッション終了
    session_destroy();
    
    //画面遷移
    header('Location: index.php');
    exit;
    