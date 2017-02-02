<?php
session_start();
require('../../Main/conf.php');
if(isset($_SESSION['non_reg'])){
  $id = $_SESSION['id'];
  $date = $_SESSION['date'];
  $rand = $_SESSION['rand'];
  $file_name = ("../unregistered/" . $id . "_" . $date . "_" . $rand . ".php");
  $oquery = mysqli_query($db,"SELECT `title` , `text` FROM `non_reg` WHERE `id` = '$id' AND `datetime` = '$date' AND `signature` = '$rand'");
  if(mysqli_affected_rows($db) == false){
    $msg = "This file is outdated";
  }else{
    while($oquery_f = mysqli_fetch_assoc($oquery)){
      $otitle  =  $oquery_f['title'];
      $otext   =  $oquery_f['text'];
    }
    echo "<pre>";
    print_r($oquery_f);
    echo "</pre>";

      if(isset($_POST['send'])){
      $ntitle = $_POST['title'];
      $ntext  = $_POST['text'];
      $updque = "UPDATE `non_reg` SET `title` = '$ntitle' , `text` = '$ntext' WHERE `id` = '$id' AND `datetime` = '$date' AND `signature` = '$rand'";
      $update = mysqli_query($db,$updque);
        if(mysqli_affected_rows($db) == false){
          $msg = 'Error while updating data';
        }else{
          $msg='Code updated successfully';
          $otitle = $ntitle;
          $otext  = $ntext;
        }
      }
    require('../../Base/html/home/edit_container.php');
  }
}
else{
  $msg = "YOU ARE NOT ALLOWED TO VIEW THIS PAGE";
}
if(isset($msg)){
  echo $msg;
}
dbc();
