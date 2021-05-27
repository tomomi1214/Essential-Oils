<?php
    //C
    require_once 'DAOs/EffectDAO.php';
    require_once 'models/Effect.php';
    session_start();
    
    $id = $_GET['id'];
    
    $effect = EffectDAO::get_effect($id);
    
    include_once 'views/effect_detail_view.php';