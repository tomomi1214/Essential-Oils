<?php
    //外部ファイルの読み込み
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    require_once 'DAOs/RelationDAO.php';
    require_once 'models/Relation.php';
    require_once 'filters/LoginFilter.php';
    //セッション開始
    session_start();
    
    //入力された情報をそれぞれ取得
    $oil_id = $_POST['oil'];
    $effect_id = $_POST['effect'];
    $howto = $_POST['howto'];
    $caution = $_POST['caution'];
    
    //セッションからlogin_userを取得
    $login_user = $_SESSION['login_user'];
    //遷移前のページを取得
    $page = $_POST['page'];

    //入力された情報からRelationインスタンスを作成
    $relation = new Relation($oil_id, $effect_id, $howto, $caution, $login_user->id);
    
    //入力項目エラーがないかバリデーションチェック
    $errors = $relation->validate($relation);
    //エラーがない場合
    if(count($errors) === 0){
        //RelationDAOを使用して新規関連を登録し、メッセージを$flash_messageに格納
        $flash_message = RelationDAO::insert($relation);
        //セッション情報に$flash_messageを渡す
        $_SESSION['flash_message'] = $flash_message;
        //登録リンクに遷移する前のpageがtopであれば
        if($page === 'top'){
            //画面遷移
            header('Location: mypage_top.php');
            exit;
        }else{
            //画面遷移
            header('Location: register_list.php');
            exit;
        }
    }else{//エラーが存在する場合
        //エラーメッセージをセッションに渡す
        $_SESSION['errors'] = $errors;
        
        //画面遷移
        header('Location: relation_register.php');
        exit;
        
    }
    