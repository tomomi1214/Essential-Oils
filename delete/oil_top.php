<?php
    
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/UserDAO.php';
    session_start();
    

    //OilDAOを使用してオイル一覧を取得
    $oils = OilDAO::get_all_oils_sort();
    
    
    //var_dump($oils);
    include_once 'views/oil_top_view.php';