<?php
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    
    $oils = OilDAO::get_all_oils_sort();
    //var_dump($oils);
    
    $effects = EffectDAO::get_all_effects();
    
    include_once 'views/relation_register_view.php';