<?php
    //外部ファイルの読み込み
    require_once 'DAOs/EffectDAO.php';
    require_once 'DAOs/OilDAO.php';
    //セッション開始
    session_start();
    
    //選択したid値を取得
    $id= $_GET['id'];
    
    //EffectDAOを使用して、$idの効能情報を取得
    $effect = EffectDAO::get_effect($id);
    
    //OilDAOを使用して、選択された効能に紐づくオイル情報一覧を取得
    $oils = OilDAO::get_all_oils_by_effect_id($id);
    
    //View表示
    include_once 'views/effect_detail_view.php';