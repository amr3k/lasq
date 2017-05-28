<?php
require_once 'init.php';
if($get_lang    ===   'ar'){
    setcookie('lasq_lang','ar', time()+2592000,'/');
    $_SESSION['lang']   =   'ar';
    header("location: $public");
    exit();
}elseif($get_lang   === 'en'){
    setcookie('lasq_lang','en', time()+2592000,'/');
    $_SESSION['lang']   =   'en';
    header("location: $public");
    exit();
} else {
    header("location: $public");
    exit();
}
ob_flush();
?>