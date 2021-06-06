<?php
    //C
    require_once 'filters/LoginFilter.php';
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    session_start();
    
    $login_user = $_SESSION['login_user'];
    
    
    //OilDAOを使用してオイル一覧を取得
    $oils = OilDAO::get_all_oils_sort();
    $effects = EffectDAO::get_all_effects();
    
    
    
    
    //View表示
    include_once 'views/mypage_top_view.php';
    