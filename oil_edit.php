<?php
    //C
    require_once 'DAOs/OilDAO.php';
    session_start();

    $id = $_GET['id'];
    $login_user = $_SESSION['login_user'];
    
    $oil = OilDAO::get_oil_by_id($id);
    
    // セッションからエラーメッセージの取得、削除
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    
    //Oil情報が存在すれば
    if($oil !== false){
        include_once 'views/oil_edit_view.php';
        exit;
    }else{
        $_SESSION['error'] = '存在しません';
        header('Location: mypage_top.php');
        exit;
    }