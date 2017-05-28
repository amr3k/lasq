<?php
session_start();
// $_COOKIE data validation:
$cId     =   filter_input(INPUT_COOKIE, 'lasq',FILTER_SANITIZE_NUMBER_INT);
// $_SESSION data:
if(isset($_SESSION['userId']) && isset($_SESSION['userName'])){
$sId    =   $_SESSION['userId'];
$sUser  =   $_SESSION['userName'];
}
// $_SERVER data:
$SRM    = filter_input(INPUT_SERVER, 'REQUEST_METHOD');    // SRMP : Server Request Method
// $_POST data filteration:
$post_user      =   filter_input(INPUT_POST, 'user');
$post_pass      =   filter_input(INPUT_POST, 'pass');
$post_search    =   filter_input(INPUT_POST, 'search',FILTER_SANITIZE_STRING);
$post_title     =   filter_input(INPUT_POST, 'title',FILTER_SANITIZE_STRING);
$post_text      =   filter_input(INPUT_POST, 'text',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$post_recaptcha =   filter_input(INPUT_POST, 'g-recaptcha-response');
// $_GET data filteration:
$get_do     =   filter_input(INPUT_GET, 'do', FILTER_SANITIZE_STRING);
$get_id     =   filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$get_page   =   filter_input(INPUT_GET, 'page',FILTER_SANITIZE_NUMBER_INT);
$get_search =   filter_input(INPUT_GET, 'search',FILTER_SANITIZE_STRING);
// REGULAR EXPRESSIONS:
$user_regex     =   '/([\w\d]{3,20})/';
$pass_regex     =   '/(?=.*[a-z]).{6,128}/';
$email_regex    =   '/[a-zA-Z0-9_.-]+@[a-z-]+(\.[a-z]{2,4})(\.[a-z]{2,4})?/i';
$name_regex     =   '/([A-Za-z]{6,32})/g';
// Other variables:
$date   =   date("Y-m-d");
$time   =   date("H:i:s");
// Errors array:
$err    =   array();
// Require necessary files:
require_once '../con.php';
$public =   '../';
define('admin', '../../admin/');
define('lang', '../inc/lang/');
define('func', '../inc/func/');
define('tmp', '../inc/tmp/');
define('css', '../assets/css/');
define('img', '../assets/img/');
define('js', '../assets/js/');
$def_paste  =   tmp . 'defaultPaste.php';
require_once lang . 'en.php';
require_once func . 'functions.php';
require_once tmp . 'head.php';
$defaultPaste   =   tmp . 'defaultPaste.php';
if(isset($cId)){
    $sId    =   $cId;
    $sUserf   =   search_db('user', 'users', "WHERE id = $cId");
    $sUser    =   $sUserf->user;
}
if (!isset($nonavbar)){
	require_once '../inc/tmp/navbar.php';
}