<?php
    require_once 'filters/LoginFilter.php';
    require_once 'DAOs/EffectDAO.php';
    
    $id = $_GET['id'];
    $login_user = $_SESSION['login_user'];
        
    if($id ==='' || $id === null){
        $_SESSION['error'] = 'IDが指定されていません';
        
        header('Location: mypage_top.php');
    }
    
    $effect = EffectDAO::get_effect($id);
    
    //セッションに保存したエラー配列を取得
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    
    //effect情報が存在すれば
    if($effect !== false){
        include_once 'views/effect_edit_view.php';
        exit;
    }else{
        $_SESSION['error'] = '存在しません';
        header('Location: mypage_top.php');
        exit;
    }
    
