<?php
    //C
    require_once 'DAOs/OilDAO.php';
    require_once 'models/Oil.php';
    session_start();
    
    $id = $_GET['id'];
    
    $oil = OilDAO::get_oil($id);
    
    include_once 'views/oil_detail_view.php';