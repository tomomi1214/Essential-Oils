<?php
    //外部ファイルの読み込み
    require_once 'models/User.php';
    //セッション開始
    session_start();
    
    //セッション情報を取得
    $login_user = $_SESSION['login_user'];
    
    //セッションの中にLogin_userというキーワードで保存されていない場合
    if($login_user === null){
        //画面遷移
        header('Location: index.php');
        exit;
    }