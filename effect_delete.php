<?php
    //外部ファイルの読み込み
    require_once 'DAOs/EffectDAO.php';
    require_once 'filters/LoginFilter.php';
    //セッション開始
    session_start();
    
    //選択した$id値を取得
    $id = $_POST['id'];
    
    //遷移前のページを取得
    $page = $_POST['page'];
    
    //$idが空でないか、不正でないかを確認する
    if($id === ""){
        //セッションにエラーメッセージを渡す
        $_SESSION['error'] = '不正アクセスです';
        //画面遷移
        header ('Location: mypage_top.php');
        exit;
    }
    
    //EffectDAOを使用して、指定された$id値の効能情報を取得
    $effect = EffectDAO::get_effect($id);
    
    //指定した効能情報が存在すれば
    if($effect !== false){
        //EffectDAOを使用して指定効能を削除し、メッセージを$flash_messageに格納
        $flash_message = EffectDAO::delete($id);
        //セッション情報に$flash_messageを渡す
        $_SESSION['flash_message'] = $flash_message;
        
        //削除リンクに遷移する前のpageがtopであれば
        if($page === 'top'){
            //mypage topに画面遷移
            header('Location: mypage_top.php');
            exit;
        }else{ //それ以外の場合
            //登録一覧ページに画面遷移
            header('Location: register_list.php');
            exit;
        }
        
    }else{ //指定した効能情報が存在しない、それ以外の場合
        //エラーメッセージをセッションに渡す
        $_SESSION['error'] = '存在しないページです';
        //画面遷移
        header('Location: mypage_top.php');
        exit;
    }