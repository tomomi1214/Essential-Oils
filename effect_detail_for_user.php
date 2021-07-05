<?php
    //C
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    require_once 'filters/LoginFilter.php';
    session_start();

    $login_user = $_SESSION['login_user'];
    $id = $_GET['id'];
    //var_dump($id);
    
    //$idがDBに存在するか確認
    $effect = EffectDAO::get_effect($id);
    if($oil === false){
        $_SESSION['flash_message'] = $id . 'のIDを持つ効能は存在しません。';
        
        header('Location: mypage_top.php');
        exit;
    }
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $effect = EffectDAO::find($id);
    //var_dump($effect);

    $oils = OilDAO::get_all_oils_by_effect_id($id);
    //var_dump($effects);
    
    
    include_once 'views/effect_detail_for_user_view.php';