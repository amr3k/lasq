<?php
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
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
require('conf.php');
if(isset($_POST['sent'])){
  $email  = $_POST['email'];
  $user  = $_POST['user'];
  $pass  = $_POST['pass'];
  $email_q =  "SELECT `email` FROM `members` WHERE `email` = '$email'";
  $email_sq = mysqli_query($db,$email_q);
  $user_q = "SELECT `user` FROM `members` WHERE `user` = '$user'";
  $user_sq= mysqli_query($db,$user_q);
  if(mysqli_num_rows($email_sq) == 1){
    $msg = 'This email is alredy registered';
  }elseif(mysqli_num_rows($user_sq) == 1){
    $msg = 'This username is already taken';
  }else{
    $regq = "INSERT INTO `members` (`id` , `email` , `user` , `pass`) VALUES (NULL , '$email' , '$user' , '$pass')";
    $regins = mysqli_query($db,$regq);
    if(mysqli_affected_rows($db) == false){
      $msg = 'Sorry , We have encountered some issues while adding your as a member in our database';
    }else{
      $msg = 'Thanks for registering , You have unlocked all features';
      $user_id	=	"SELECT `id` FROM `members` WHERE `user` = '$user'";
      $user_id	=	mysqli_query($db , $user_id);
      $user_id	=	mysqli_fetch_assoc($user_id);
      $user_id	=	$user_id['id'];
      session_destroy();
      session_start();
      $_SESSION['logged'] = ($user_id . "_" . $user);
      $usrdir	=	mkdir("../Files/members/" . $_SESSION['logged'] , 0777);
    }
  }
}
if(isset($msg)){
  echo $msg;
}
require('../Base/html/register/container.html');
dbc();
}
