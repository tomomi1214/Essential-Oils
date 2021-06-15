<?php
    
    require_once 'DAOs/RelationDAO.php';
    session_start();
    
    $id = $_POST['id'];
    var_dump($id);
    
    /*
    if($id === ""){
        $_SESSION['error'] = '不正アクセスです';
        header ('Location: register_list.php');
        exit;
    }
    $relation = RelationDAO:: get_relation_by_id($id);  

    if($relation !== false){
        $flash_message = RelationDAO::delete($id);
        $_SESSION['flash_message'] = $flash_message;
        
        header('Location: register_list.php');
        exit;
    }else{
        $_SESSION['error'] = '存在しないページです';
        header('Location: register_list.php');
        exit;
    }
    */