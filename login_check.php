<?php
    //外部ファイルの読み込み
    require_once 'DAOs/UserDAO.php';
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //DAOを使用して、ユーザがいるかDBを検索
    //いれば、そのユーザのインスタンスを取得
    $login_user = UserDAO::login($email, $password);
    //var_dump($login_user);
   
    //そんな人がDBに存在すれば
    if($login_user !== false){
        $_SESSION['login_user'] = $login_user;
        
        header('Location: mypage_top.php');
        exit;
    }else{
        $flash_message = '登録済みのメールアドレス、パスワードを入力してください。';
        $_SESSION['flash_message'] = $flash_message;
        //var_dump($_SESSION);
        
        header('Location: login.php');
        exit;
    }