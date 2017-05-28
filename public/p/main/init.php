<?php
session_start();
// $_COOKIE data validation:
$cId     =   filter_input(INPUT_COOKIE, 'lasq',FILTER_SANITIZE_NUMBER_INT);
$cLang          =   substr(preg_replace('/[^a-z]/', '', filter_input(INPUT_COOKIE, 'lasq_lang',FILTER_SANITIZE_STRING)),0,2);
// $_SESSION data:
if(isset($_SESSION['userId']) && isset($_SESSION['userName'])){
$sId    =   $_SESSION['userId'];
$sUser  =   $_SESSION['userName'];
}
if(isset($cLang)){
    $_SESSION['lang']   =   $cLang;
}
$sLang  =   $_SESSION['lang'];
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
$get_lang       =   substr(preg_replace('/[^a-z]/', '', filter_input(INPUT_GET, 'lang',FILTER_SANITIZE_STRING)),0,2);
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
require_once 'con.php';
$public =   '../';
define('admin', '../../admin/');
define('lang', 'main/inc/lang/');
define('func', 'main/inc/func/');
define('tmp', 'main/inc/tmp/');
define('css', 'main/assets/css/');
define('img', 'main/assets/img/');
define('js', 'main/assets/js/');
$def_paste  =   'main/'.tmp . 'defaultPaste.php';
if($sLang === 'ar'){
    require_once        lang    .   'ar.php';
}else{
    require_once        lang    .   'en.php';
}
require_once func . 'functions.php';
require_once tmp . 'head.php';
$defaultPaste   =   tmp . 'defaultPaste.php';
if(isset($cId)){
    $sId        =   $cId;
    $sUserf     =   search_db('user', 'users', "WHERE id = $cId");
    $sUser      =   $sUserf->user;
}
if (!isset($nonavbar)){
	require_once 'inc/tmp/navbar.php';
}