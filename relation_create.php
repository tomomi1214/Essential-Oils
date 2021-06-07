<?php
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    require_once 'DAOs/RelationDAO.php';
    require_once 'models/Relation.php';

    session_start();
    
    //var_dump($_POST);
    $oil_id = $_POST['oil'];
    //var_dump($oil);
    
    $effect_id = $_POST['effect'];
    //var_dump($effect);
    
    $howto = $_POST['howto'];
    $content = $_POST['content'];

    $caution = $_POST['caution'];

    $relation = new Relation($oil_id, $effect_id, $howto, $content, $caution);
    //var_dump($oil);
    
    RelationDAO::insert($relation);
    //var_dump($oil);

    header('Location: mypage_top.php');
    exit;
    