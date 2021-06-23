<?php
    //C
    session_start();
    //Viewを表示
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    include_once 'views/login_view.php';
    