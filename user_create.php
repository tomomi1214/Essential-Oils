<?php
    //外部ファイルの読み込み
    require_once 'DAOs/UserDAO.php';
    session_start();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = new User($name, $email, $password);
    //入力チェック
    $errors = $user->validate($user);
    
    //エラーが一つもなければ
    if(count($errors) === 0){
        //DAOを使用して新規ユーザをデータベースに保存する
        $flash_message = UserDAO::insert($user);
        
        $_SESSION['flash_message'] = $flash_message;

        header('Location: index.php');
        exit;
    }else{//エラーが一つでもあれば
        $_SESSION['errors'] = $errors;
        
        //画面遷移
        header('Location: user_register.php');
        exit;
    }
    