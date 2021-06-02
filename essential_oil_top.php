<?php
    
    require_once 'DAOs/OilDAO.php';

    //OilDAOを使用してオイル一覧を取得
    $oils = OilDAO::get_all_oils_sort();
    
    //var_dump($oils);
    include_once 'views/essential_oil_top_view.php';