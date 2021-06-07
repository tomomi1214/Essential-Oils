<?php
    require_once 'DAOs/RelationDAO.php';
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    session_start();
    
    $login_user = $_SESSION['login_user'];

    $oils = OilDAO::get_all_oils_sort();
    //var_dump($oils);
    
    $effects = EffectDAO::get_all_effects();
    
    include_once 'views/relation_register_view.php';