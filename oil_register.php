<?php

    require_once 'filters/LoginFilter.php';
    
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    $page = $_GET['page'];
    //var_dump($page);
    
    include_once 'views/oil_register_view.php';