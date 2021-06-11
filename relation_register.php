<?php
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    session_start();
    
    $oils = OilDAO::get_all_oils_sort();
    //var_dump($oils);
    
    $effects = EffectDAO::get_all_effects();
    
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    include_once 'views/relation_register_view.php';