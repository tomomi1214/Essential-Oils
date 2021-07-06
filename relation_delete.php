<?php
    //外部ファイルの読み込み
    require_once 'DAOs/RelationDAO.php';
    require_once 'filters/LoginFilter.php';
    //セッション開始
    session_start();
    
    //選択した$id値を取得
    $ids = $_POST['id'];
    
    //選択した$idsの個数が0の場合
    if(count($ids) === 0){
        //RelationDAOを使用して指定関連を削除し、メッセージを$flash_messageに格納
        $flash_message = RelationDAO::delete($id);
        //セッション情報に$flash_messageを渡す
        $_SESSION['flash_message'] = $flash_message;
      
    }else{
        foreach($ids as $id){
            //RelationDAOを使用して指定関連を削除
            RelationDAO::delete($id);
        }
        //セッション情報にメッセージを渡す
        $_SESSION['flash_message'] = '関連性を削除しました。';
    }
    //画面遷移
    header('Location: register_list.php');
    exit;