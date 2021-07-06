<?php
    //外部ファイルの読み込み
    require_once 'DAOs/EffectDAO.php';
    require_once 'DAOs/UserDAO.php';
    require_once 'models/Effect.php';
    require_once 'filters/LoginFilter.php';
    //セッション開始
    session_start();
    
    //選択した$id値を取得
    $id = $_POST['id'];
    
    //編集する効能情報を取得
    $effect = EffectDAO::get_effect($id);
    
    //効能データが存在する場合
    if($effect !== false){
        //入力情報を取得
        $effect = $_POST['effect'];
        $content = $_POST['content'];
        $caution = $_POST['caution'];
        
        //セッションからlogin_userを取得
        $login_user = $_SESSION['login_user'];
        
        //取得した情報で効能インスタンスを取得
        $effect = new Effect($effect, $content, $caution, $login_user->id);
        
        //入力値をバリデーションチェック
        $errors = $effect->validate($effect);
        
        //エラーがない場合
        if(count($errors) === 0){
            //EffectDAOを使用して効能情報を更新し、メッセージをを取得
            $flash_message = EffectDAO::update($effect, $id);
            //セッション情報に$flash_messageを渡す
            $_SESSION['flash_message'] = $flash_message;
            //画面遷移
            header('Location: effect_detail_for_user.php?id=' . $id);
            exit;
            
        }else{ //エラーがある場合
            //セッションにエラーメッセージを渡す
            $_SESSION['errors'] = $errors;
            //画面遷移
            header('Location: effect_edit.php?id='. $id);
            exit;
        }
    }
   