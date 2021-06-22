<?php
    require_once 'filters/LoginFilter.php';
    require_once 'DAOs/EffectDAO.php';
    session_start();
    
    $id = $_GET['id'];
    $login_user = $_SESSION['login_user'];
        
    $effect = EffectDAO::get_effect_by_id($id);
    
    //セッションに保存したエラー配列を取得
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    //Page設定
    $page = $_GET['page'];

    
    //effect情報が存在すれば
    if($effect !== false){
        include_once 'views/effect_edit_view.php';
        exit;
    }else{
        $_SESSION['error'] = '存在しません';
        header('Location: mypage_top.php');
        exit;
    }
    
