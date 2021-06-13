<?php
    
    require_once 'DAOs/OilDAO.php';
    session_start();
    
    $id = $_POST['id'];
    //var_dump($id);
    
    
    if($id === ""){
        $_SESSION['error'] = '不正アクセスです';
        header ('Location: mypage_top.php');
        exit;
    }
    
    $oil = OilDAO::get_oil_by_id($id);
    
    if($effect !== false){
        $flash_message = OilDAO::delete($id);
        $_SESSION['flash_message'] = $flash_message;
        
        header('Location: mypage_top.php');
        exit;
    }else{
        $_SESSION['error'] = '存在しないぺーじです';
        header('Location: mypage_top.php');
        exit;
    }