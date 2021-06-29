<?php
    
    require_once 'DAOs/RelationDAO.php';
    session_start();
    
    //var_dump($id);
    
    
    $ids = $_POST['id'];
    
    if(count($ids) === 0){
        // エラーメッセージのセット
        $flash_message = RelationDAO::delete($id);
        $_SESSION['flash_message'] = $flash_message;
      
    }else{
        foreach($ids as $id){
            // print $id;
            // $relation = RelationDAO:: get_relation_by_id($id);
            RelationDAO::delete($id);
        }
        
        $_SESSION['flash_message'] = '関連性を削除しました。';
    }
    
    header('Location: register_list.php');
    exit;