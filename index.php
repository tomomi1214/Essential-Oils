<?php
    
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    session_start();
    
    //OilDAOを使用してオイル一覧を取得
    $oils = OilDAO::get_all_oils_sort();
    $effects = EffectDAO::get_all_effects();
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    //var_dump($oils);
    include_once 'views/index_view.php';