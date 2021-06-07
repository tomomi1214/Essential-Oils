<?php
    
    require_once 'DAOs/EffectDAO.php';
    session_start();
    
    $effect = $_POST['effect'];
    $content = $_POST['content'];
    $caution = $_POST['caution'];
    
    $login_user = $_SESSION['login_user'];

    $effect = new Effect($effect,$content, $caution, $login_user->id);

    EffectDAO::insert($effect);

    header('Location: mypage_top.php');
    exit;
    