<?php
    //C
    require_once 'DAOs/OilDAO.php';
    session_start();
    
    // セッションからエラーメッセージの取得、削除
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    //編集するOilIDを取得
    $id = $_GET['id'];
    //var_dump($id);
    
    if($id ==='' || $id === null){
        $_SESSION['error'] = 'IDが指定されていません';
        
        header('Location: mypage_top.php');
    }
    $oil = OilDAO::get_oil($id);
    //var_dump($oil);
    
    //Oil情報が存在すれば
    if($oil !== false){
        include_once 'views/oil_edit_view.php';
        exit;
    }else{
        $_SESSION['error'] = '存在しません';
        header('Location: mypage_top.php');
        exit;
    }