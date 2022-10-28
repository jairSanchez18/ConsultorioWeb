<?php

include 'config/config.php';

class DB{
    public static function Connect(){
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::MYSQL_ATTR_SSL_CA => 'public/ssl/DigiCertGlobalRootCA.crt.pem',
            PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false);

        $pdo = new PDO('mysql:host='.constant('DB_HOST').';dbname='.constant('DB').';charset=utf8',''.constant('DB_USER').'', ''.constant('DB_PASS').'');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}