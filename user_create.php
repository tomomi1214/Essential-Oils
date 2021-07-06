<?php
    //外部ファイルの読み込み
    require_once 'DAOs/UserDAO.php';
    //セッション開始
    session_start();

    //入力された情報をそれぞれ取得
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //入力された情報からUserインスタンスを作成
    $user = new User($name, $email, $password);
    //入力項目エラーがないかバリデーションチェック
    $errors = $user->validate($user);
    
    //エラーがない場合
    if(count($errors) === 0){
        //UserDAOをもいいて、新規ユーザを登録
        $flash_message = UserDAO::insert($user);
        //セッションに$flash_messageを渡す
        $_SESSION['flash_message'] = $flash_message;
        //画面遷移
        header('Location: index.php');
        exit;
    }else{//エラーが一つでもあれば
        //エラーメッセージをセッションに渡す
        $_SESSION['errors'] = $errors;
        
        //画面遷移
        header('Location: user_register.php');
        exit;
    }
    