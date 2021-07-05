<?php
    //C
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/RelationDAO.php';
    require_once 'DAOs/EffectDAO.php';
    require_once 'models/Relation.php';
    require_once 'filters/LoginFilter.php';
    
    session_start();
    
    $login_user = $_SESSION['login_user'];
    
    $id = $_GET['id'];
    
    //$idがDBに存在するか確認
    $oil = OilDAO::get_oil($id);
    if($oil === false){
        $_SESSION['flash_message'] = $id . 'のIDを持つエッセンシャルオイルは存在しません。';
        
        header('Location: mypage_top.php');
        exit;
    }
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $oil = OilDAO::find($id);
    $effects = EffectDAO::get_all_effects_by_oil_id($id);
    //var_dump($effects);
    
    $relations = RelationDAO::get_relation_detail_by_oil_id($id);
    //var_dump($relations);


    include_once 'views/oil_detail_for_user_view.php';