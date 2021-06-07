<?php
    session_start();
    $login_user = $_SESSION['login_user'];

    include_once 'views/oil_register_view.php';