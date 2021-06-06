<?php
    
    require_once 'DAOs/OilDAO.php';

    //var_dump($_POST);
    $name = $_POST['name'];
    //var_dump($name);    
    $scientific_name = $_POST['scientific_name'];
    $plant_name = $_POST['plant_name'];
    $extraction = $_POST['extraction'];
    $aroma = $_POST['aroma'];
    $caution = $_POST['caution'];
    $english_name = $_POST['english_name'];

    $image = $_FILES['image']['name'];
    
    $oil = new Oil($name, $scientific_name, $plant_name, $extraction, $aroma, $caution, $english_name, $image);
    //var_dump($oil);
    
    OilDAO::insert($oil);
    //var_dump($oil);
    
    $file = 'upload/' . $image;
    
    move_uploaded_file($_FILES['image']['tmp_name'], $file);
    
    header('Location: essential_oil_top.php');
    exit;
    