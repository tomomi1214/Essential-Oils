<?php
    //C
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    require_once 'models/Relation.php';
    session_start();
    $login_user = $_SESSION['login_user'];
    
    $id = $_GET['id'];
    
    $oil = OilDAO::find($id);
    
    //$relation = RelationDAO::get_all_relations_by_oil_id($id);
    //var_dump($relation);
    
    $effects = EffectDAO::get_all_effects_by_oil_id($id);
    //var_dump($effects);
    
    include_once 'views/oil_detail_view.php';