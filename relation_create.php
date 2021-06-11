<?php
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    require_once 'DAOs/RelationDAO.php';
    require_once 'models/Relation.php';

    session_start();
    
    //var_dump($_POST);
    if(!isset($_POST['oil'])){
        $oil_id = null;
        var_dump($oil_id);
    } else if($_POST['oil'] === null){
        $oil_id = $_POST['oil'];
        var_dump($oil_id);
    }
    if(!isset($_POST['effect'])){
        $effect_id = null;
        var_dump($effect_id);
    }else{
        $effect_id = $_POST['effect'];
        var_dump($effect_id);
    }
    $howto = $_POST['howto'];
    $content = $_POST['content'];

    $caution = $_POST['caution'];
    
    $login_user = $_SESSION['login_user'];

    $relation = new Relation($oil_id, $effect_id, $howto, $content, $caution, $login_user->id);
    //var_dump($relation);
    
    $errors = $relation->validate($relation);
    
    if(count($errors) === 0){
        
        $flash_message = RelationDAO::insert($relation);
        $_SESSION['flash_message'] = $flash_message;
        
        header('Location: mypage_top.php');
        exit;
    }else{
        $_SESSION['errors'] = $errors;
        
        header('Location: relation_register.php');
        exit;
        
    }
    