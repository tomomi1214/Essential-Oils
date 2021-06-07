<?php
    
    require_once 'DAOs/EffectDAO.php';

    $effect = $_POST['effect'];
    $content = $_POST['content'];
    $caution = $_POST['caution'];

    $effect = new Effect($effect,$content, $caution);

    EffectDAO::insert($effect);

    header('Location: mypage_top.php');
    exit;
    