<?php
define('host', 'mysql:host=localhost;dbname=lasq');
define('user', 'root');
define('pass', '');
$utf    =   [PDO::MYSQL_ATTR_INIT_COMMAND    =>  'SET NAMES utf8'];
try {
    $con    =   new PDO(host,user,pass,$utf);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'connected';
} catch (Exception $e) {
    die("Sorry, We have encountered some problems while attempting to connect to database");
}