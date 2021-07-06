<?php
    //外部ファイルの読み込み
    require_once 'DAOs/EffectDAO.php';
    require_once 'DAOs/UserDAO.php';
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/RelationDAO.php';
    require_once 'filters/LoginFilter.php';
    //セッション開始
    session_start();
    
    //セッションからflash_messageを取得 
    $flash_message = $_SESSION['flash_message'];
    //セッション情報の破棄
    $_SESSION['flash_message'] = null;

    //セッションからlogin_userを取得
    $login_user = $_SESSION['login_user'];
    
    //$user_idに$login_userのidを格納
    $user_id = $login_user->id;
    
    //ログインユーザが登録したオイル情報一覧を取得
    $oils = OilDAO::get_all_oils_by_user_id($user_id);

    //ログインユーザが登録した効能情報一覧を取得
    $effects = EffectDAO::get_all_effects_by_user_id($user_id);
    
    //ログインユーザが登録した関連情報一覧を取得
    $relations = RelationDAO::get_all_relations_by_user_id($user_id);
    
    //View表示
    include_once 'views/register_list_view.php';
    
    