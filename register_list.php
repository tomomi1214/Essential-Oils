<?php
    
    require_once 'DAOs/EffectDAO.php';
    require_once 'DAOs/UserDAO.php';
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/RelationDAO.php';
    session_start();
    
    $login_user = $_SESSION['login_user'];
    
    $user_id = $login_user->id;
    //var_dump($login_user->id);
    $oils = OilDAO::get_all_oils_by_user_id($user_id);
    //var_dump($oils);
    
    $effects = EffectDAO::get_all_effects_by_user_id($user_id);
    //var_dump($effects);
    
    $relations = RelationDAO::get_all_relations_by_user_id($user_id);
    //var_dump($relations);
    
    $OilByRelations = OilDAO::get_all_oils_by_user_id_for_relations($user_id);
    //var_dump($OilByRelations);
    $EffectByRelations = EffectDAO::get_all_effects_by_user_id_for_relations($user_id);
    //var_dump($EffectByRelations);
    

    include_once 'views/register_list_view.php';
    
    