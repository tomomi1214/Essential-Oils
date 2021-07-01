<?php
    
    require_once 'DAOs/EffectDAO.php';
    require_once 'DAOs/UserDAO.php';
    require_once 'models/Effect.php';
    require_once 'filters/LoginFilter.php';

    session_start();
    
    $effect = $_POST['effect'];
    $content = $_POST['content'];
    $caution = $_POST['caution'];
    $page = $_POST['page'];
    
    $login_user = $_SESSION['login_user'];

    $effect = new Effect($effect, $content, $caution, $login_user->id);
    //var_dump($effect);


    $errors = $effect->validate($effect);
    //エラーがなければ
    if(count($errors) === 0){
        $flash_message = EffectDAO::insert($effect);
        
        $_SESSION['flash_message'] = $flash_message;
        
        if($page === 'top'){
            header('Location: mypage_top.php');
            exit;
        }else{
            header('Location: register_list.php');
            exit;
        }
    }else{
        $_SESSION['errors'] = $errors;
        
        header('Location: effect_register.php');
        exit;
    }
    