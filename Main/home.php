<?php
session_start();
if(isset($_COOKIE['logged'])){
  session_destroy();
  session_start();
  $_SESSION['logged'] = $_COOKIE['logged'];
}
#session_destroy();
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
require_once('conf.php');
if(isset($_POST['send'])){
  $title  = $_POST['title'];
  $title  = strip_tags($title);
  $text  = htmlspecialchars($_POST['text']);
  if(strlen($title) >= 32 || strlen($title) <= 6){
    $msg = 'Title must be between 6-32 charachters in length';
  }
  elseif(strlen($text) >= 10000 || strlen($text) <= 6){
    $msg = 'Text must be between 6 - 10000 charachters in length';
  }
  else{
    if(isset($_SESSION['logged'])){
    	$user_id_name	=	$_SESSION['logged'];
    	$user_id	=	strstr($user_id_name,'_',true);
		$ins		=	"INSERT INTO `members_text` (`id` , `user_id` , `title` , `text`) VALUES (NULL , '$user_id' , '$title' , '$text')";
		$insq		=	mysqli_query($db , $ins);
		if (mysqli_affected_rows($db) === false){
			$msg	=	"Sorry , We have encountered some issues with database";
		}else{
			$msg		=	'Success';
			$text_id	=	mysqli_query($db, "SELECT `id` FROM `members_text` WHERE `user_id` = '$user_id' AND `title` = '$title' AND `text` = '$text'");
			$text_id	=	mysqli_fetch_assoc($text_id);
			$text_id	=	$text_id['id'];
      $text1    = "<?php session_start();
      require_once('../../../Main/conf.php');
      \$text_id=$text_id;
      \$selq    = \"SELECT `title` , `text` FROM `members_text` WHERE `id` = '\$text_id'\";
      \$selq    = mysqli_query(\$db,\$selq);
      \$res     = mysqli_fetch_assoc(\$selq);
      \$title   = \$res['title'];
      \$text    = \$res['text'];
      require_once('../../../Base/html/view/container.php');
      dbc();
      ";
      $date   = date('ymdHis');
      $file_name  = ("../Files/members/" . $user_id_name . "/" . $date  . ".php");
      $usr_o  = fopen($file_name , "w+");
      $usr_w  = fwrite($usr_o , $text1);
      $usr_c  = fclose($usr_o);
      $msg  = "
        Success !<a href='" . $file_name . "' target='_blank'> View your paste ?</a>
      ";
		}
    }else{
    	$rand   = rand(99999,999999);
    	$date   = date('ymdHi');
    	$data_saving = mysqli_query($db,"INSERT INTO `non_reg` (`id` , `title` , `text` , `datetime` , `signature`) VALUES ('NULL' , '$title' , '$text' , '$date' , '$rand')");
    	$idsq = "SELECT `id` FROM `non_reg` WHERE `datetime` = '$date' AND `signature` = '$rand'";
    	$idq = mysqli_query($db,$idsq);
    	$id = mysqli_fetch_assoc($idq);
    	$id = $id['id'];
    	$file_name = ( "../Files/unregistered/" . $id . "_" . $date . "_" . $rand . ".php");
    	$_SESSION['non_reg'] = ($id."_".$date."_".$rand . ".php");
    	$text1  = "<?php session_start();\$id=$id;\$rand=$rand;\$date=$date;";
    	$text2  = file_get_contents('../Files/functions/non_reg_content.txt');
    	$fileo = fopen($file_name , 'w+');
    	$filew = fwrite($fileo ,($text1 . $text2));
    	$filec = fclose($fileo);
    	$msg   = "Success .. <a href='$file_name' target='_blank'>View your text now</a>";
    }

  }
}
if(isset($msg)){
  echo $msg;
}
require_once('../Base/html/home/header.html');
require_once('../Base/html/home/container.html');
require_once('../Base/html/home/footer.html');
dbc();
?>
