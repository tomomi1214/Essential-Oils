<?php
    //C
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/RelationDAO.php';
    require_once 'models/Relation.php';
    session_start();
    
    $id = $_GET['id'];
    
    $oil = OilDAO::find($id);
    
    $relation = RelationDAO::get_all_relations_by_oil_id($id);
    var_dump($relation);
    
    include_once 'views/oil_detail_view.php';