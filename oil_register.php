<?php

    require_once 'filters/LoginFilter.php';
    
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    include_once 'views/oil_register_view.php';