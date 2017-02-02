<?php
$db_host   =   '127.0.0.1';
$db_name=   'lasq';
$db_username  = 'root';
$db_password  = '';
$db   =   mysqli_connect($db_host,$db_username,$db_password,$db_name);
mysqli_set_charset($db,'utf8');
function dbc(){
  global $db;
  mysqli_close($db);
}
?>
