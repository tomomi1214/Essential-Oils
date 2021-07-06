<?php
    //外部ファイルの読み込み
    require_once 'DAOs/UserDAO.php';
    //セッション開始
    session_start();
    
    //入力されたアドレスを$emailに格納
    $email = $_POST['email'];
    //入力されたパスワードを$passwordに格納
    $password = $_POST['password'];
    
    //UserDAOを使用して、上記情報のユーザが登録されているか確認
    $login_user = UserDAO::login($email, $password);
    //$login_userが存在すればユーザートップページへ画面遷移遷移
    if($login_user !== false){
        //セッションにログインユーザ情報を渡す
        $_SESSION['login_user'] = $login_user;
        //画面遷移
        header('Location: mypage_top.php');
        exit;
        
    }else{
        //該当ユーザがいなければ、メッセージを表示し、画面は変わらない
        $flash_message = '登録済みのメールアドレス、パスワードを入力してください。';
        $_SESSION['flash_message'] = $flash_message;
        //画面遷移
        header('Location: login.php');
        exit;
    }