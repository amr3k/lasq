<?php
require_once 'init.php';
session_start();
session_destroy();
unset($_COOKIE['lasq']);
setcookie('lasq',NULL, time()-3600,'/');
header("location: $public");
exit();
?>