<?php
    class DAO {
        protected static function get_connection(){
            //接続オプション設定
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            );
            //Cloud9
            $pdo = new PDO('mysql:host=localhost;dbname=Eoil_app', 'root', '', $options);
            //Xfree
            //$pdo = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=aroma2021_eoil', 'aroma2021_eoil', 'kCxpw3y4', $options);
            return $pdo;
        }
        //DBと切断
        protected static function close_connection($pdo, $stmt){
            $pdo = null;
            $stmt = null;
        }
        
    }