<?php
    //外部ファイルの読み込み
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    require_once 'models/Relation.php';
    //セッション開始
    session_start();

    //選択したid値を取得
    $id = $_GET['id'];
    
    //OilDAOを使用して、$idのオイル情報を取得
    $oil = OilDAO::get_oil($id);
    
    //存在しない場合
    if($oil === false){
        //セッションにエラーメッセージを格納
        $_SESSION['flash_message'] = $id . 'のIDを持つエッセンシャルオイルは存在しません。';
        //画面遷移
        header('Location: index_view.php');
        exit;
    }
    
    //EffectDAOを使用して、オイル情報と紐づく効能情報一覧を取得
    $effects = EffectDAO::get_relation_detail_by_oil_id($id);
    
    //View表示
    include_once 'views/oil_detail_view.php';