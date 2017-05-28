<?php
ob_start();
session_start();
// REGULAR EXPRESSIONS:
$user_regex     =   '/([\w\d]{3,20})/';         // You'll need it when you add signup ability.
$pass_regex     =   '/(?=.*[a-z]).{6,128}/';    // You'll need it when you add signup ability.
$email_regex    =   '/[a-zA-Z0-9_.-]+@[a-z-]+(\.[a-z]{2,4})(\.[a-z]{2,4})?/i'; // You'll need it when you add signup ability.
$name_regex     =   '/([A-Za-z]{6,32})/g';      // You'll need it when you add signup ability.
$string_regex   =   '/[^A-Za-z0-9 ]/';
// Other variables:
$date           =   date("Y-m-d");
$time           =   date("H:i:s");
// Errors array:
$err            =   array();
// $_COOKIE data validation:
$cId            =   filter_input(INPUT_COOKIE, 'lasq',FILTER_SANITIZE_NUMBER_INT);
$cLang          =   substr(preg_replace('/[^a-z]/', '', filter_input(INPUT_COOKIE, 'lasq_lang',FILTER_SANITIZE_STRING)),0,2);
// $_SESSION data:
if(isset($_SESSION['userId']) && isset($_SESSION['userName'])){
$sId            =   $_SESSION['userId'];
$sUser          =   $_SESSION['userName'];
}
if(isset($cLang)){
    $_SESSION['lang']   =   $cLang;
}
$sLang  =   $_SESSION['lang'];
// $_SERVER data:
$SRM            =   filter_input(INPUT_SERVER, 'REQUEST_METHOD');    // SRM : Server Request Method
// $_POST data filteration:
$post_user      =   preg_replace('/[^a-zA-Z0-9_]/','',filter_input(INPUT_POST, 'user'));
$post_pass      =   filter_input(INPUT_POST, 'pass');
$post_search    =   str_replace(' ','',preg_replace($string_regex, '', filter_input(INPUT_POST, 'search',FILTER_SANITIZE_STRING)));
$post_title     =   str_replace(' ','',preg_replace($string_regex, '', filter_input(INPUT_POST, 'title',FILTER_SANITIZE_STRING)));
$post_text      =   htmlspecialchars(filter_input(INPUT_POST, 'text',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$post_recaptcha =   filter_input(INPUT_POST, 'g-recaptcha-response');
// $_GET data filteration:
$get_do         =   preg_replace('/[^a-z]/','',filter_input(INPUT_GET, 'do', FILTER_SANITIZE_STRING));
$get_id         =   preg_replace('/[^0-9]/','',filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$get_page       =   preg_replace('/[^0-9]/','',filter_input(INPUT_GET, 'page',FILTER_SANITIZE_NUMBER_INT));
$get_search     =   str_replace(' ','',preg_replace($string_regex, '', filter_input(INPUT_GET, 'search',FILTER_SANITIZE_STRING)));
$get_stamp      =   substr(preg_replace('/[^A-Za-z0-9]/','',filter_input(INPUT_GET, 'stamp',FILTER_SANITIZE_STRING)),0,10);
$get_lang       =   substr(preg_replace('/[^a-z]/', '', filter_input(INPUT_GET, 'lang',FILTER_SANITIZE_STRING)),0,2);
// Require necessary files:
require_once 'con.php';
$public         =   '../public/';
define('admin', '../admin/');
define('lang', 'inc/lang/');
define('func', 'inc/func/');
define('tmp', 'inc/tmp/');
define('css', 'assets/css/');
define('img', 'assets/img/');
define('js', 'assets/js/');
$def_paste      =   tmp     .   'defaultPaste.php';
$def_paste_txt  =   tmp     .   'defaultPastetxt.php';
if($sLang === 'ar'){
    require_once        lang    .   'ar.php';
}else{
    require_once        lang    .   'en.php';
}
require_once        func    .   'functions.php';
require_once        tmp     .   'head.php';
$defaultPaste   =   tmp     .   'defaultPaste.php';
if(isset($cId)){
    $sId        =   $cId;
    $sUserf     =   search_db('user', 'users', "WHERE id = $cId");
    $sUser      =   $sUserf['user'];
}
if (!isset($nonavbar)){
	require_once 'inc/tmp/navbar.php';
}