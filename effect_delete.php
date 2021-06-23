<?php
    
    require_once 'DAOs/EffectDAO.php';
    session_start();
    
    $id = $_POST['id'];
    //var_dump($id);
    $page = $_POST['page'];
    
    if($id === ""){
        $_SESSION['error'] = '不正アクセスです';
        header ('Location: mypage_top.php');
        exit;
    }
    
    $effect = EffectDAO::get_effect_by_id($id);
    //Effectが存在すれば
    if($effect !== false){
        $flash_message = EffectDAO::delete($id);
        $_SESSION['flash_message'] = $flash_message;
        
        if($page === 'top'){
            header('Location: mypage_top.php');
            exit;
        }else{
            header('Location: register_list.php');
            exit;
        }
        
    }else{
        $_SESSION['error'] = '存在しないぺーじです';
        header('Location: mypage_top.php');
        exit;
    }