<?php
    //外部ファイルの読み込み
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    //セッション開始
    session_start();
    
    //入力したkeywordを取得
    $keyword = $_GET['keyword'];
   
   //keywordが空の場合
    if($keyword === ''){
        //OilDAOを使用して、オイル一覧を取得
        $oils = OilDAO::get_all_oils_sort();
        //flash_message_ForOilにメッセージを格納
        $flash_message_ForOil = '検索ワードを入力してください。';
    }else{
        //OilDAOを使用して、該当のオイルを取得
        $oils = OilDAO::search($keyword);
        //flash_message_ForOilにメッセージを格納
        $flash_message_ForOil = 'キーワード「' . $keyword . '」の検索に' . count($oils) . '件ヒットしました。';
    }
    //遷移前のページを取得
    $page = $_GET['page'];
    
    //登録リンクに遷移する前のpageがtopの場合
    if($page === 'mypage'){
        //セッション情報を格納する
        $login_user = $_SESSION['login_user'];
        //EffectDAOを用いて効能一覧を取得
        $effects = EffectDAO::get_all_effects();
        //画面遷移
        include_once 'views/mypage_top_view.php';
    }else {
        //EffectDAOを用いて効能一覧を取得
        $effects = EffectDAO::get_all_effects();
        //画面遷移
        include_once 'views/index_view.php';
    }