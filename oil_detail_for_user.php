<?php
    //C
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    require_once 'models/Relation.php';
    
    session_start();
    
    $login_user = $_SESSION['login_user'];
    
    $id = $_GET['id'];
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $oil = OilDAO::find($id);
    $effects = EffectDAO::get_all_effects_by_oil_id($id);
    //var_dump($effects);
    
    include_once 'views/oil_detail_for_user_view.php';