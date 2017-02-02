<?php
session_start();
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
require('conf.php');
if(isset($_COOKIE['logged'])){
  session_destroy();
  session_start();
  $_SESSION['logged'] = $_COOKIE['logged'];
}
if(isset($_SESSION['logged'])){
  $msg = 'You are already logged in';
?>
  <head>
  <meta http-equiv='refresh' content='0 ; url=home.php' />
  </head>
<?php
}
else{
  if(isset($_POST['send'])){
    $user     = $_POST['user'];
    $password = $_POST['pass'];
    $userss = "SELECT `user` FROM `members` WHERE `user` = '$user'";
    $passss = "SELECT `pass` FROM `members` WHERE `user` = '$user'";
    $userq  = mysqli_query($db,$userss);
    $passq  = mysqli_query($db,$passss);
    if(mysqli_num_rows($userq) != 1){
      $msg  = 'The username and password don\'t match';
    }elseif(mysqli_num_rows($passq) != 1){
      $msg  = 'The username and password don\'t match';
    }else{
    	$user_id	=	"SELECT `id` FROM `members` WHERE `user` = '$user'";
    	$user_id	=	mysqli_query($db , $user_id);
    	$user_id	=	mysqli_fetch_assoc($user_id);
      $user_id	=	$user_id['id'];
      if(isset($_POST['remember']) && $_POST['remember'] == 'remember' ){
        $remember = $_POST['remember'];
        setcookie('logged',"$user",time()+(3600*24*30));
        session_destroy();
        session_start();
        $_SESSION['logged'] = ($user_id . "_" . $user);
      }
      session_destroy();
      session_start();
      $_SESSION['logged'] = ($user_id . "_" . $user);    }
  }
  if(isset($msg)){
    echo $msg;
  }
  require('../Base/html/login/container.html');
}
dbc();
