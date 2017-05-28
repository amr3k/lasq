<?php
$get_lang       =   substr(preg_replace('/[^a-z]/', '', filter_input(INPUT_GET, 'lang',FILTER_SANITIZE_STRING)),0,2);
if($get_lang    ===   'ar'){
    setcookie('lasq_lang','ar', time()+2592000,'/');
    $_SESSION['lang']   =   'ar';
    header("location: ../../");
    exit();
}elseif($get_lang   === 'en'){
    setcookie('lasq_lang','en', time()+2592000,'/');
    $_SESSION['lang']   =   'en';
    header("location: ../../");
    exit();
} else {
    header("location: ../../");
    exit();
}
ob_flush();
?>