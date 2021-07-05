<?php
    //C
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    session_start();
    
    $keyword = $_GET['keyword'];
    //var_dump($keyword);
    
    if($keyword === ''){
        $oils = OilDAO::get_all_oils_sort();
        $flash_message_ForOil = '検索ワードを入力してください。';
    }else{
        $oils = OilDAO::search($keyword);
        $flash_message_ForOil = 'キーワード「' . $keyword . '」の検索に' . count($oils) . '件ヒットしました。';
    }
    
    $page = $_POST['page'];
    //var_dump($page);
    
    
    if($page === 'mypage'){
        
        include_once 'views/mypage_top.php';
    }else {

        $effects = EffectDAO::get_all_effects();
        //var_dump($oils);
        include_once 'views/index_view.php';
    }
    