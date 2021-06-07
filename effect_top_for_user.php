<?php
    
    require_once 'DAOs/EffectDAO.php';
    
    //effectDAOを使用して効果一覧を取得
    $effects = EffectDAO::get_all_effects();
    
    
    
    //var_dump($effects);
    include_once 'views/effect_top_for_user_view.php';