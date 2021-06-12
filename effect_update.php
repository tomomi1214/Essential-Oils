<?php
    require_once 'DAOs/EffectDAO.php';
    require_once 'models/Effect.php';
    session_start();
    
    //フォームから入力値を取得
    $id = $_POST['id'];
    
    //編集するEffectインスタンス取得
    $effect = EffectDAO::get_effect_by_id($id);
    //var_dump($effect);
    
    
    if($effect !== false){
    
        //入力情報取得
        $effect = $_POST['effect'];
        $content = $_POST['content'];
        $caution = $_POST['caution'];
        $login_user = $_SESSION['login_user'];
        //var_dump($_POST);
        
        $effect = new Effect($effect, $content, $caution, $login_user->id);
        //var_dump($effect);
        
        // 入力チェック
        $errors = $effect->validate($effect);
        //var_dump($errors);
    
        if(count($errors) === 0){
            
            $flash_message = EffectDAO::update($effect);
            $_SESSION['flash_message'] = $flash_message;
            
            /*
            EffectDAO::update($effect);
            
            $_SESSION['flash_message'] = $effect->effect . 'の情報を更新しました！';
*/
            header('Location: effect_detail_for_user.php?id=' . $id);
            exit;
            
        }else{
            $_SESSION['errors'] = $errors;
            
            header('Location: effect_edit.php?id='. $id);
            exit;
        }
    }else{
        $_SESSION['error'] = '存在しないぺーじです。';
        header('Location: mypage_top.php');
        exit;
    }
   