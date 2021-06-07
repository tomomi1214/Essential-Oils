<?php
    require_once 'DAOs/UserDAO.php';
    require_once 'DAOs/OilDAO.php';
    require_once 'models/Oil.php';
    session_start();
    

    //var_dump($_POST);
    $name = $_POST['name'];
    //var_dump($name);    
    $scientific_name = $_POST['scientific_name'];
    $plant_name = $_POST['plant_name'];
    $extraction = $_POST['extraction'];
    $aroma = $_POST['aroma'];
    $caution = $_POST['caution'];
    $english_name = $_POST['english_name'];
    
    $login_user = $_SESSION['login_user'];

    $image = $_FILES['image']['name'];
    
    $oil = new Oil($name, $scientific_name, $plant_name, $extraction, $aroma, $caution, $english_name, $login_user->user_id, $image);
    var_dump($oil);
    
    OilDAO::insert($oil);
    //var_dump($oil);
    
    $file = 'images/' . $image;
    
    move_uploaded_file($_FILES['image']['tmp_name'], $file);
    
    header('Location: mypage_top.php');
    exit;
    