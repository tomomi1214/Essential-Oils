<?php
    //C
    require_once 'DAOs/EffectDAO.php';
    require_once 'DAOs/OilDAO.php';
    session_start();
    
    //var_dump($_GET);
    $id= $_GET['id'];
    
    $effect = EffectDAO::get_effect($id);
    //var_dump($effect);
    
    $oils = OilDAO::get_all_oils_by_effect_id($id);
    //var_dump($oils);
    
    include_once 'views/effect_detail_view.php';