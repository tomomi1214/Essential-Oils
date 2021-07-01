<?php
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    require_once 'DAOs/RelationDAO.php';
    require_once 'models/Relation.php';
    require_once 'filters/LoginFilter.php';
    session_start();
    
    $oil_id = $_POST['oil'];
    $effect_id = $_POST['effect'];
    $howto = $_POST['howto'];
    $caution = $_POST['caution'];
    $login_user = $_SESSION['login_user'];
    
    $page = $_POST['page'];

    $relation = new Relation($oil_id, $effect_id, $howto, $caution, $login_user->id);
    //var_dump($relation);
    
    $errors = $relation->validate($relation);
   // var_dump($errors);
    
    if(count($errors) === 0){
        
        $flash_message = RelationDAO::insert($relation);
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
        
        header('Location: relation_register.php');
        exit;
        
    }
    