<?php
    require_once 'DAOs/EffectDAO.php';
    require_once 'DAOs/UserDAO.php';
    require_once 'models/Effect.php';
    session_start();
    
    //フォームから入力値を取得
    $id = $_POST['id'];
    //var_dump($id);
    
    //編集するEffectインスタンス取得
    $effect = EffectDAO::get_effect_by_id($id);
    //var_dump($effect);
    
    //Effect データがぞんざいすれば
    if($effect !== false){
        //入力情報取得
        $effect = $_POST['effect'];
        $content = $_POST['content'];
        $caution = $_POST['caution'];
        //var_dump($_POST);
        $login_user = $_SESSION['login_user'];
        $effect = new Effect($effect, $content, $caution, $login_user->id);
        //var_dump($effect);
        
        //インスタンス情報の更新
        /*Oilと同じこのやり方だと編集不可
        $effect->effect = $effect;
        $effect->content = $content;
        $effect->caution = $caution;
        */
        
        // 入力チェック
        $errors = $effect->validate($effect);
        //var_dump($errors);
    
        if(count($errors) === 0){
            
            $flash_message = EffectDAO::update($effect, $id);
            $_SESSION['flash_message'] = $flash_message;
            
            header('Location: effect_detail_for_user.php?id=' . $id);
            exit;
            
        }else{
            $_SESSION['errors'] = $errors;
            
            header('Location: effect_edit.php?id='. $id);
            exit;
        }
    }else{
        $_SESSION['error'] = '存在しないページです。';
        header('Location: mypage_top.php');
        exit;
    }
   