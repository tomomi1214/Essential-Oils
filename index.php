<?php
    
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    
    //OilDAOを使用してオイル一覧を取得
    $oils = OilDAO::get_all_oils();
    $effects = EffectDAO::get_all_effects();
    
    //var_dump($oils);
    include_once 'views/index_view.php';